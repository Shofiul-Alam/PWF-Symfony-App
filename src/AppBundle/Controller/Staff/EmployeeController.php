<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/11/2017
 * Time: 10:21 AM
 */

namespace AppBundle\Controller\Staff;


use AppBundle\Services\Helpers;
use AppBundle\Services\Twilio\TwilioConfig;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use BackendBundle\Entity\Employee;
use AppBundle\Controller\Core\AController;

class EmployeeController extends AController
{
    private $error = array();

    public function newAction(Request $request)
    {

        $createdAt = new \DateTime("now");
        $helpers = $this->get(Helpers::class);
        $json = urldecode($request->get('json', null));
        $params = json_decode($json);

        $data = $this->CreateUser($params->user);

        if($data['status'] === 'success' && $data['user'] != null) {
            $this->entity = new Employee();
            $user = $data['user'];
            $this->entity->setUser($user);

            $request->authorisation = $data['token'];

            return $this->registerEmployee($request, $user);
        } else {
            return $helpers->json($this->registrationError);
        }



    }

    public function listAction(Request $request) {
        $this->entity = new Employee();

        return parent::listAction($request);
    }


    public function editAction(Request $request)
    {
        $this->entity = new Employee();
        return parent::editAction($request);
    }

    public function addCompitencyAction (Request $request) {


        return parent::addEmployeeSkillDocument($request);
    }

    public function registerEmployee(Request $request, $user)
    {

        $helpers = $this->get(Helpers::class);
        $json = $request->get('json', null);
        $params = json_decode($json);
        $token = $request->authorisation;


        if($this->isAuthenticated($token)) {
            $create = true;

            if ($create) {
                $this->prepareEntityData($this->entity, $params);
            }

            $this->entity->setUser($user);

            $em = $this->getDoctrine()->getManager();


            $entityName = $this->entity->getEntityClassName();
            $uniqueIdentifire = $this->getUniqueIdentifier($entityName);


            $persist = false;

            if($this->entity->{'get'.ucwords($uniqueIdentifire)}()!= null) {
                $isset_entity = $em->getRepository('BackendBundle:'.$entityName)->findBy(array(
                    $uniqueIdentifire => $this->entity->{'get'.ucwords($uniqueIdentifire)}()
                ));
            } else {
                $persist = true;
            }


            if (count($this->error) > 0) {
                $create = false;
            }


            if (count($isset_entity) == 0 || $persist) {
                if ($create) {
                    $em->persist($this->entity);
                    $em->flush();

                    $data = array(
                        'status' => "success",
                        'code' => 200,
                        'msg' => $entityName. ' is Successfully Created!!!',
                        $entityName => $this->entity
                    );
                } else {
                    $data = array_merge($this->duplicateError, array(
                        'error_data' => $this->error
                    ));

                }

            } else {
                $data = array_merge($this->duplicateError, array(
                    'error_data' => $this->error
                ));
            }

        } else {
            return $helpers->json($this->accessError);
        }

        $mailer = $this->get('mailer');
        $mailTo = $this->entity->getUser()->getEmail();
        $receiverName = $this->entity->getUser()->getLastName();


        $res = $this->sendEmail($mailer, $mailTo, $receiverName);
        $res2 = $this->sendEmailToAdmin($mailer, 'info@pwfhire.com.au', $this->entity);



        $mobileNo = $this->formatMobileNo($this->entity->getUser()->getMobile());

        if($mobileNo) {
            $sms = 'Dear '. $this->entity->getUser()->getLastName() .' Welcome to PWF Hire. We really appriciate your interest to our business. 
                                                            Please login to your account by visiting https://app.pwfhire.com.au/login and upload your documents.';

            try {
                $this->sendSMS($em, $sms, $mobileNo);
            } catch (\Exception $e) {

            }
        }


        return $helpers->json($data);
    }

    public function getSkillCompetencyDocumentsAction(Request $request) {
        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);


        if($this->isAuthenticated($token)) {

            $identity = $this->getIdentity($request);

            $em = $this->getDoctrine()->getManager();
            $employee = $em->getRepository('BackendBundle:Employee')->findBy(array('user'=>$identity->sub));
            $empId = $this->getEnitityId($employee[0]->getId());

//            $employeeSkillDocuments = $em->getRepository('BackendBundle:EmployeeSkillCompetencyDocument')->findBy(array('employee' => $employee[0]));
//
//            $entityName = $this->entity->getEntityClassName();

            $dql = "SELECT c FROM BackendBundle:EmployeeSkillCompetencyDocument c WHERE c.employee = $empId ORDER BY c.id ASC";


            $query = $em->createQuery($dql);

            $page = $request->query->getInt('page', 1);

            $paginator = $this->get('knp_paginator');
            $items_perPage = 10;
            $pagination = $paginator->paginate($query, $page, $items_perPage);
            $total_items_count = $pagination->getTotalItemCount();

            $dql2 = "SELECT i FROM BackendBundle:EmployeeInduction i WHERE i.employee = $empId ORDER BY i.id ASC";

            $query2 = $em->createQuery($dql2);

            $paginator2 = $this->get('knp_paginator');
            $pagination2 = $paginator2->paginate($query2, $page, $items_perPage);
            $total_items_count2 = $pagination2->getTotalItemCount();

            $obj = new \stdClass();
            $documentsArr = array();
            if(count($pagination->getItems()) > 0) {
                foreach ($pagination->getItems() as $item) {
                    $obj->skillCompetencyDocId = $item->getId();
                    $obj->issueDate = $item->getIssueDate();
                    $obj->expiryDate = $item->getExpiryDate();
                    $obj->description = $item->getDescription();
                    $obj->employeeId = $item->getEmployee()->getId();
                    $obj->employeeName = $item->getEmployee()->getUser()->getFirstName(). " " . $item->getEmployee()->getUser()->getLastName();
                    $obj->skillId = $item->getSkillCompetencyList()->getId();
                    $obj->skillName = $item->getSkillCompetencyList()->getName();
                    $firstDoc = $item->getDocuments()[0];
                    if($firstDoc != null) {
                        $obj->documentId = $firstDoc->getId();
                        $obj->documentPath = $firstDoc->getPath();
                        $obj->documentName = $firstDoc->getFileName();
                    }

                    array_push($documentsArr, $this->objectToArray($obj));

                    $obj = new \stdClass();


                }
            }
            if(count($pagination2->getItems()) > 0) {
                foreach ($pagination2->getItems() as $item) {

                    $obj->employeeId = $item->getEmployee()->getId();
                    $obj->employeeName = $item->getEmployee()->getUser()->getFirstName(). " " . $item->getEmployee()->getUser()->getLastName();
                    $obj->inductionId = $item->getInduction()->getId();
                    $obj->inductionName = $item->getInduction()->getName();
                    $obj->description = $item->getDescription();
                    $obj->id = $item->getId();
                    $firstDoc = $item->getEmployeeSkillDocument();
                    if($firstDoc != null) {
                        $obj->documentId = $firstDoc->getId();
                        $obj->documentPath = $firstDoc->getPath();
                        $obj->documentName = $firstDoc->getFileName();
                    }

                    array_push($documentsArr, $this->objectToArray($obj));


                }
            }



//            $data = $this->getModifiedData($pagination->getItems());

            if($total_items_count > $total_items_count2) {
                $total_items_count = $total_items_count;
            } else {
                $total_items_count = $total_items_count2;
            }

            $data = array(
                "status" => "success",
                'code'  => 200,
                'total_items_count'   => $total_items_count,
                'page_actual' => $page,
                'items_per_page' => $items_perPage,
                'total_pages'   => ceil($total_items_count / $items_perPage),
                'data' => $documentsArr

            );
        } else {
            $data = array(
                "status" => "error",
                'code'  => 400,
                'msg'   => 'Authorization not valid'
            );
        }

        return $helpers->json($data);
    }

    public function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            return get_object_vars($d);
        }
    }

    private function sendEmail(\Swift_Mailer $mailer, $emailTo, $receiverName) {
        $message = (new \Swift_Message('PWF New Employee Registration'))
            ->setFrom('info@pwfhire.com.au')
            ->setTo($emailTo)
            ->setBody(
               $this->renderView(
                   'Emails/registration.html.twig',
                   array('name' => $receiverName)
               ), 'text/html'
            );

        $res = $mailer->send($message);

        return $res;
    }

    private function sendEmailToAdmin(\Swift_Mailer $mailer, $emailTo, Employee $employee) {
        $message = (new \Swift_Message('PWF New Employee Registration'))
            ->setFrom($employee->getUser()->getEmail())
            ->setTo($emailTo)
            ->setBody(
                $this->renderView(
                    'Emails/registration-admin-notification.html.twig',
                    array(  'name' => $employee->getEmployeeName(),
                        'mobile' => $employee->getUser()->getMobile()
                    )
                ), 'text/html'
            );

        $res = $mailer->send($message);

        return $res;
    }

    protected function formatMobileNo($mobileNo) {
        $mobileNo = str_replace(' ', '', $mobileNo);
        if(substr($mobileNo, 0, 1) == '0') {
            $mobileNo = "+61".substr($mobileNo, 1);
        }elseif(substr($mobileNo, 0, 3) == "+61") {
            $mobileNo = $mobileNo;
        }

        return $mobileNo;
    }

    protected function sendSMS($em, $sms, $customerMobile) {

        $config = new TwilioConfig($em);


        $client = new \Twilio\Rest\Client($config->getTwilioSID(), $config->getTwilioToken());


        $client->messages
            ->create(
                $customerMobile,
                array(
                    "from" => $config->getTwilioalphaNumericID(),
                    "body" => $sms,
                )
            );
    }

    public function deleteEmployeeDocAction(Request $request)
    {
        $helpers = $this->get(Helpers::class);
        $json = urldecode($request->get('json', null));
        $params = json_decode($json);
        $token = $request->get('authorisation', null);

        if($this->isAuthenticated($token)) {
            $identity = $this->getIdentity($request);

            $em = $this->getDoctrine()->getManager();
            $employee = $em->getRepository('BackendBundle:Employee')->findBy(array('user'=>$identity->sub));
            $empId = $this->getEnitityId($employee[0]->getId());

            $em = $this->getDoctrine()->getManager();
            if($params->inductionId != null && $params->inductionName != null) {
                $entityName = 'EmployeeInduction';
                $inductionId = $this->getEnitityId($params->id);
                if($inductionId) {
                    $entity = $em->getRepository('BackendBundle:'.$entityName)->find($inductionId);
                    $skillCompetencyDoc = $entity->getEmployeeSkillDocument();
                }
                $reqEmpId = $entity->getEmployee()->getId();
            } else {
                $entityName = 'EmployeeSkillDocument';
                $id = $this->getEnitityId($params->documentId);
                if($id) {
                    $entity = $em->getRepository('BackendBundle:'.$entityName)->find($id);
                    $skillCompetencyDoc = $entity->getEmployeeSkillCompetencyDocument();
                }
                $reqEmpId = $entity->getEmployeeSkillCompetencyDocument()->getEmployee()->getId();

            }

            if($entity &&  $reqEmpId == $empId) {
                $em->persist($entity);
                $em->remove($entity);
                $em->flush();
                if($skillCompetencyDoc) {
                    $em->remove($skillCompetencyDoc);
                    $em->flush();
                }
                if($params->documentName) {
                    $fs = new Filesystem();
                    $fs->remove('documents/'.$params->documentName);
                }

                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' => 'Document is Successfully Deleted!!!',
                );
            } else {
                $data = $this->accessError;
            }


        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }



}