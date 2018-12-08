<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/11/2017
 * Time: 8:15 PM
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\EmployeeDocWithBookedDate;
use AppBundle\Services\Helpers;
use AppBundle\Services\JwtAuth;
use AppBundle\Services\Twilio\TwilioConfig;
use BackendBundle\Entity\AllocatedDates;
use BackendBundle\Entity\EmployeeAllocation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\Allocation;
use AppBundle\Entity\EmployeeAllocationView;



class ManageAllocationController extends AAdmin
{
    private $error = array();

    public function listAction(Request $request) {
        $this->entity = new EmployeeAllocation();

        return parent::listAction($request);
    }
    public function modifiedAllocationListAction(Request $request) {
        $this->entity = new AllocatedDates();

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);
        $filters = urldecode($request->get('filters', null));
        $filterParams = json_decode($filters);
        $jwt_auth = $this->get(JwtAuth::class);



        if($this->isAuthenticated($token) && $this->isAdmin($token)) {


            $em = $this->getDoctrine()->getManager();
            $queryBuilder = $em->createQueryBuilder();

            $entityName = $this->entity->getEntityClassName();


            $dql = "SELECT c FROM BackendBundle:$entityName c ORDER BY c.id DESC";

            $query = $em->createQuery($dql);


            $page = $request->query->getInt('page', 1);

            $paginator = $this->get('knp_paginator');
            $items_perPage = 10;
            $pagination = $paginator->paginate($query, $page, $items_perPage);
            $modifiedAllocationList = array();

//            foreach ($pagination as $item) {
            $modifiedAllocationList = new EmployeeAllocationView($pagination->getItems());
//                array_push($modifiedAllocationList, $newEmpAlloc);
//            }
            $total_items_count = $pagination->getTotalItemCount();

//            $data = $this->getModifiedData($pagination->getItems());

            $data = array(
                "status" => "success",
                'code'  => 200,
                'total_items_count'   => $total_items_count,
                'page_actual' => $page,
                'items_per_page' => $items_perPage,
                'total_pages'   => ceil($total_items_count / $items_perPage),
                'data' => $modifiedAllocationList

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

    public function sendAllocationsAction(Request $request)
    {

        $helpers = $this->get(Helpers::class);
        $json = urldecode($request->get('json', null));
        $newEmployeeAllocationsArr = json_decode($json);
        $taskId = $request->get('taskId', null);
        if($taskId) {
            $taskId = $this->getEnitityId($taskId);
        }

        $token = $request->get('authorisation', null);
        $mailer = $this->get('mailer');


        if($this->isAuthenticated($token) && $this->isAdmin($token)) {
            $em = $this->getDoctrine()->getManager();
            foreach ($newEmployeeAllocationsArr as $newEmployeeAllocation) {
                $task = $em->getRepository('BackendBundle:Task')->find($this->getEnitityId($newEmployeeAllocation->task->id));
                $employee = $em->getRepository('BackendBundle:Employee')->find($this->getEnitityId($newEmployeeAllocation->employee->id));
                $employeeId = $this->getEnitityId($employee->getId());

                $newAllocation = $em->getRepository('BackendBundle:EmployeeAllocation')->findDuplicateAllocation($em, $employee, $task);


                $allocatedDatesParams = $newEmployeeAllocation->allocatedDates;
                $date = $allocatedDatesParams[0]->date->year."-".$allocatedDatesParams[0]->date->month."-".$allocatedDatesParams[0]->date->day;
                $date = new \DateTime($date);
                $prevAllocatedDates = $em->getRepository('BackendBundle:AllocatedDates')->findEmployeeAllocationsByDate($em, $date, $employeeId);
                if(count($prevAllocatedDates) > 0) {
                    foreach ($prevAllocatedDates as $prevAllocatedDate)
                        $prevAllocatedDate->setReAllocated(true);
                    $em->persist($prevAllocatedDate);
                    $em->flush();
                }

                if($newAllocation) {
                    $newAllocation = $newAllocation[0];
                    foreach($allocatedDatesParams as $allocatedDatesParam) {
                        if($allocatedDatesParam->id == '0' || $allocatedDatesParam->id == null) {
                            $newAllocatedDate = new AllocatedDates();
                            $newAllocatedDate->setEmployeeAllocation($newAllocation);
                            $this->prepareEntityData($newAllocatedDate, $allocatedDatesParam);
                            $newAllocatedDate->setSms($newAllocation->getSms());
                            $newAllocation->addAllocatedDates($newAllocatedDate);
                        }
                    }

                }
                elseif($newEmployeeAllocation->id == 0) {
                    $newAllocation = new EmployeeAllocation();
                    $this->prepareEntityData($newAllocation, $newEmployeeAllocation);
                }
                else {
                    $employeeAllocId = $this->getEnitityId($newEmployeeAllocation->id);
                    $newAllocation = $em->getRepository('BackendBundle:EmployeeAllocation')->find($employeeAllocId);
                    $this->prepareEntityData($newAllocation, $newEmployeeAllocation);

                }

                $mailTo = $newAllocation->getEmployee()->getUser()->getEmail();
                $body = $newAllocation->getSms();
                $taskDates = $newAllocation->getTask()->getEndDate()->diff($newAllocation->getTask()->getStartDate())->days;
                $allocatedDates = count($newAllocation->getAllocatedDates());

                if($taskDates == $allocatedDates) {
                    $fullAlloc = true;
                } else {
                    $partiallyAlloc = true;
                }

                $res = $this->sendEmail($mailer, $mailTo, $body);
                if($res && $fullAlloc) {
                    $newAllocation->setRequestsendall(true);
                } elseif($res && $partiallyAlloc) {
                    $newAllocation->setRequestsendpartially(true);
                }

                $mobileNo = $this->formatMobileNo($newAllocation->getEmployee()->getUser()->getMobile());
                $this->sendSMS($em, $body, $mobileNo);


                $em->persist($newAllocation);
                $em->flush();



            }


            $allocations = $em->getRepository('BackendBundle:EmployeeAllocation')->findBy(array('task' => $taskId));

            if($allocations) {
//                $em->persist($task);
//                $em->flush();



                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' => 'Allocation successfully distributed!!!',
                    'allocations' => $allocations
                );
            } else {
                $data = $this->error;
            }


        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }


    public function getAllocationsForTaskAction(Request $request) {
        $token = $request->get('authorisation', null);
        $json = json_decode(urldecode($request->get('json', null)));
        $helpers = $this->get(Helpers::class);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $id = $this->getEnitityId($json->id);

            $em = $this->getDoctrine()->getManager();
            $task = $em->getRepository('BackendBundle:Task')->find($id);

            $allocations = $em->getRepository('BackendBundle:EmployeeAllocation')->findTaskAllocations($em, $task);


            if(count($allocations) > 0) {
//                $em->persist($task);
//                $em->flush();



                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' => 'Assigned Allocations!!!',
                    'employeeAllocations' => $allocations
                );
            } else {
                $queryBuilder = $em->createQueryBuilder();


                $jwt = $this->get(JwtAuth::class);

                $allocations = $em->getRepository('BackendBundle:Task')->findEmployeeForTask($queryBuilder, $task, $jwt, $em);

                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' => 'Assigne new Allocation for the task!!!',
                    'allocations' => $allocations
                );
            }


        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }

    public function getEmployeesForAllocationAction(Request $request) {

        $token = $request->get('authorisation', null);
        $json = json_decode(urldecode($request->get('json', null)));
        $helpers = $this->get(Helpers::class);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $id = $this->getEnitityId($json->id);

            $em = $this->getDoctrine()->getManager();
            $task = $em->getRepository('BackendBundle:Task')->find($id);


                $queryBuilder = $em->createQueryBuilder();


                $jwt = $this->get(JwtAuth::class);

                $allocations = $em->getRepository('BackendBundle:Task')->findEmployeeForTask($queryBuilder, $task, $jwt, $em);

                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' => 'Assigne new Allocation for the task!!!',
                    'allocations' => $allocations
                );


        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }

    public function getBookedEmployeesWithDoc(Request $request) {
        $token = $request->get('authorisation', null);
        $json = json_decode(urldecode($request->get('json', null)));
        $helpers = $this->get(Helpers::class);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {


        }

    }

    private function sendEmail(\Swift_Mailer $mailer, $emailTo, $body) {
        $message = (new \Swift_Message('Employee Allocation'))
            ->setFrom('info@pwfhire.com.au')
            ->setTo($emailTo)
            ->setBody(
               $body
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

    public function findEmployeeBookDateDocAction(Request $request) {

        $token = $request->get('authorisation', null);
        $json = json_decode(urldecode($request->get('json', null)));
        $helpers = $this->get(Helpers::class);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $id = $this->getEnitityId($json->id);

            $em = $this->getDoctrine()->getManager();
            $employee = $em->getRepository('BackendBundle:Employee')->find($id);
            $startDate = $this->processDate($json->startDate);
            $endDate = $this->processDate($json->endDate);
            $allocatedDates = $em->getRepository('BackendBundle:AllocatedDates')->findEmployeeAllocationFromDateRange($em, $employee, $startDate, $endDate);
            $employeeSkillDocuments = $em->getRepository('BackendBundle:EmployeeSkillCompetencyDocument')->findBy(array('employee' => $employee));

            $employeeDocWithBookedDate = new EmployeeDocWithBookedDate();
            $employeeDocWithBookedDate->docs = $employeeSkillDocuments;
            $employeeDocWithBookedDate->bookedDates = $allocatedDates;

            $data = array(
                'status' => "success",
                'code' => 200,
                'msg' => 'Successfully retrived employee booked dates and documents!!!',
                'data' => $employeeDocWithBookedDate
            );


        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }

    private function processDate($dob) {

        if($dob != null && $dob->year != null) {
            $formatedDob = $dob->year . '/' . $dob->month . '/' . $dob->day;
            $sql_dob = new \DateTime($formatedDob);

        }

        return date_format($sql_dob, 'Y-m-d H:i:s');

    }

//    public function allAllocatedDatesAction(Request $request) {
//
//        $this->entity = new AllocatedDates();
//
//        $helpers = $this->get(Helpers::class);
//        $token = $request->get('authorisation', null);
//        $filters = urldecode($request->get('filters', null));
//        $filterParams = json_decode($filters);
//
//
//
//        if($this->isAuthenticated($token) && $this->isAdmin($token)) {
//
//
//            $em = $this->getDoctrine()->getManager();
//            $queryBuilder = $em->createQueryBuilder();
//
//            $entityName = $this->entity->getEntityClassName();
//            if($filterParams == null) {
//                $allAllocatedDates = $em->getRepository('BackendBundle:'.$entityName)->findAll();
//            } else {
//                $allAllocatedDates = ''; //$em->getRepository('BackendBundle:'.$entityName)->findByParams($queryBuilder, $filterParams, $this->get('jwt'));
//            }
//
//            if(count($allAllocatedDates) > 0) {
//                foreach($allAllocatedDates as $allocation) {
//                    $siteArrival = $em->getRepository('BackendBundle:SiteArrival')->findBy(array('allocatedDates' => $this->getEnitityId($allocation->getId())));
//                    if($siteArrival[0]) {
//                        $allocation->setSiteArrivalId($siteArrival[0]->getId());
//                    }
//                }
//            }
//
////            $data = $this->getModifiedData($pagination->getItems());
//
//            $data = array(
//                "status" => "success",
//                'code'  => 200,
//                'data' => $allAllocatedDates
//
//            );
//        } else {
//            $data = array(
//                "status" => "error",
//                'code'  => 400,
//                'msg'   => 'Authorization not valid'
//            );
//        }
//
//        return $helpers->json($data);
//    }

    public function allAllocatedDatesAction(Request $request) {

        $this->entity = new AllocatedDates();

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);
        $filters = urldecode($request->get('filters', null));
        $filterParams = json_decode($filters);



        if($this->isAuthenticated($token) && $this->isAdmin($token)) {


            $em = $this->getDoctrine()->getManager();
            $queryBuilder = $em->createQueryBuilder();

            $entityName = $this->entity->getEntityClassName();
            if($filterParams == null) {
                $allAllocatedDates = $em->getRepository('BackendBundle:'.$entityName)->findAll();
            } else {
                $allAllocatedDates = ''; //$em->getRepository('BackendBundle:'.$entityName)->findByParams($queryBuilder, $filterParams, $this->get('jwt'));
            }

            if(count($allAllocatedDates) > 0) {

                $allocationArray = new EmployeeAllocationView($allAllocatedDates);
            }


            $data = array(
                "status" => "success",
                'code'  => 200,
                'data' => $allocationArray

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

    public function cancelAllocationAction(Request $request) {

        $this->entity = new AllocatedDates();

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);
        $id = $request->get('allocatedDateId', null);



        if($this->isAuthenticated($token) && $this->isAdmin($token)) {


            $em = $this->getDoctrine()->getManager();

            $allAllocatedDateId = $this->getEnitityId($id);
            $entityName = $this->entity->getEntityClassName();

            $allAllocatedDates = $em->getRepository('BackendBundle:'.$entityName)->find($allAllocatedDateId);
            $companyName = $allAllocatedDates->getEmployeeAllocation()->getTask()->getOrder()->getProject()->getClient()->getCompanyName();
            $projectAddress = $allAllocatedDates->getEmployeeAllocation()->getTask()->getOrder()->getProject()->getProjectAddress();
            $taskName = $allAllocatedDates->getEmployeeAllocation()->getTask()->getTaskName();

            $sms = 'Sorry. Due to the unexpected reason the allocation from ' .  $companyName . ' at ' . $projectAddress . ' on ' . $allAllocatedDates->getDay() . ' ' . date_format($allAllocatedDates->getDate(), 'Y-m-d') . ' is cancelled. Please wait for another allocation';

            $allAllocatedDates->setCancelAllocation(true);
            $allAllocatedDates->setDeny(false);
            $allAllocatedDates->setCancelSms($sms);

            $em->persist($allAllocatedDates);
            $em->flush();
            $allocation = $allAllocatedDates->getEmployeeAllocation();
            $mailer = $this->get('mailer');

            $mailTo = $allocation->getEmployee()->getUser()->getEmail();
            $body = $allAllocatedDates->getCancelSms();
            $res = $this->sendEmail($mailer, $mailTo, $body);

            $mobileNo = $this->formatMobileNo($allocation->getEmployee()->getUser()->getMobile());
            $this->sendSMS($em, $body, $mobileNo);

            $data = array(
                "status" => "success",
                'code'  => 200,
                'data' => $allAllocatedDates

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

    public function showNotificationsAction(Request $request) {
        $this->entity = new AllocatedDates();

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);
        $id = $request->get('allocatedDateId', null);



        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $notificationArr = array();
            $em = $this->getDoctrine()->getManager();

            $allAllocatedDateId = $this->getEnitityId($id);
            $entityName = $this->entity->getEntityClassName();

            $allAllocatedDates = $em->getRepository('BackendBundle:'.$entityName)->find($allAllocatedDateId);
//            $companyName = $allAllocatedDates->getEmployeeAllocation()->getTask()->getOrder()->getProject()->getClient()->getCompanyName();
//            $projectAddress = $allAllocatedDates->getEmployeeAllocation()->getTask()->getOrder()->getProject()->getProjectAddress();
//            $taskName = $allAllocatedDates->getEmployeeAllocation()->getTask()->getTaskName();
            $empAllocationSMS = $allAllocatedDates->getEmployeeAllocation()->getSms();
            if($empAllocationSMS) {
                array_push($notificationArr, $empAllocationSMS);
            }

            $allAllocatedDatesSms = $allAllocatedDates->getSms();
            if($allAllocatedDatesSms) {
                array_push($notificationArr, $allAllocatedDatesSms);
            }



            $data = array(
                "status" => "success",
                'code'  => 200,
                'data' => $notificationArr

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

    public function findlAllocationByIdAction(Request $request) {

        $this->entity = new AllocatedDates();

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);
        $id = $request->get('allocatedDateId', null);



        if($this->isAuthenticated($token) && $this->isAdmin($token)) {


            $em = $this->getDoctrine()->getManager();

            $allAllocatedDateId = $this->getEnitityId($id);
            $entityName = $this->entity->getEntityClassName();

            $allocatedDate = $em->getRepository('BackendBundle:'.$entityName)->find($allAllocatedDateId);

            $allocation = new Allocation();
            $allocation->getModifiedAllocation($allocatedDate);

            $data = array(
                "status" => "success",
                'code'  => 200,
                'data' => $allocation

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



}