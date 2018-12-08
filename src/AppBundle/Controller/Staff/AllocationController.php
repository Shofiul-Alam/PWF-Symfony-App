<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/11/2017
 * Time: 10:21 AM
 */

namespace AppBundle\Controller\Staff;


use AppBundle\Entity\EmployeeAllocations;
use AppBundle\Services\Helpers;
use AppBundle\Services\Twilio\TwilioConfig;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Controller\Core\AController;

class AllocationController extends AController
{
    private $error = array();



    public function getEmployeeAllocationsAction(Request $request)
    {

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', false);


        if($this->isAuthenticated($token)) {
            $create = true;
            $identity = $this->getIdentity($request);


            $em = $this->getDoctrine()->getManager();
            $employee = $em->getRepository('BackendBundle:Employee')->findBy(array('user'=>$identity->sub));
            $allocations = $em->getRepository('BackendBundle:AllocatedDates')->findEmployeeAllocations($em, $employee[0]);

            $allocationArr = array();

            if(count($allocations) > 0) {
                foreach($allocations as $allocation) {
                    $newEmpAlloc = new EmployeeAllocations($allocation->getEmployeeAllocation());
                    $allocation->setEmployeeAllocation($newEmpAlloc->employeeAllocation);
                    $siteArrival = $em->getRepository('BackendBundle:SiteArrival')->findBy(array('allocatedDates' => $this->getEnitityId($allocation->getId())));
                    if($siteArrival[0]) {
                        $allocation->setSiteArrivalId($siteArrival[0]->getId());
                    }
                    array_push($allocationArr, $allocation);
                }
            }




                    $data = array(
                        'status' => "success",
                        'code' => 200,
                        'msg' => ' All employee allocations!!!',
                        'data' => $allocationArr
                    );

            } else {
                $data = array_merge($this->duplicateError, array(
                    'error_data' => $this->error
                ));
            }


        return $helpers->json($data);
    }


    public function getEmployeePendingAllocationsAction(Request $request)
    {

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', false);


        if($this->isAuthenticated($token)) {
            $create = true;
            $identity = $this->getIdentity($request);


            $em = $this->getDoctrine()->getManager();
            $employee = $em->getRepository('BackendBundle:Employee')->findBy(array('user'=>$identity->sub));
            $allocations = $em->getRepository('BackendBundle:AllocatedDates')->findEmployeePendingAllocations($em, $employee[0]);

            $allocationArr = array();

            if(count($allocations) > 0) {
                foreach($allocations as $allocation) {
                    $newEmpAlloc = new EmployeeAllocations($allocation->getEmployeeAllocation());
                    $allocation->setEmployeeAllocation($newEmpAlloc->employeeAllocation);
                    $siteArrival = $em->getRepository('BackendBundle:SiteArrival')->findBy(array('allocatedDates' => $this->getEnitityId($allocation->getId())));
                    if($siteArrival[0]) {
                        $allocation->setSiteArrivalId($siteArrival[0]->getId());
                    }
                    array_push($allocationArr, $allocation);
                }
            }




            $data = array(
                'status' => "success",
                'code' => 200,
                'msg' => ' All employee allocations!!!',
                'data' => $allocationArr
            );

        } else {
            $data = array_merge($this->duplicateError, array(
                'error_data' => $this->error
            ));
        }


        return $helpers->json($data);
    }

    public function getEmployeeAcceptedAllocationsAction(Request $request)
    {

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', false);


        if($this->isAuthenticated($token)) {
            $create = true;
            $em = $this->getDoctrine()->getManager();
            if($this->isAdmin($token)){
                $id = $request->get('employeeId', false);
                $employee = $em->getRepository('BackendBundle:Employee')->find($id);
            } else {
                $identity = $this->getIdentity($request);
                $employee = $em->getRepository('BackendBundle:Employee')->findBy(array('user'=>$identity->sub));
                $employee = $employee[0];
            }


            $allocations = $em->getRepository('BackendBundle:AllocatedDates')->findEmployeeAcceptedAllocations($em, $employee);

            $allocationArr = array();

            if(count($allocations) > 0) {
                foreach($allocations as $allocation) {
                    $newEmpAlloc = new EmployeeAllocations($allocation->getEmployeeAllocation());
                    $allocation->setEmployeeAllocation($newEmpAlloc->employeeAllocation);
                    $siteArrival = $em->getRepository('BackendBundle:SiteArrival')->findBy(array('allocatedDates' => $this->getEnitityId($allocation->getId())));
                    if($siteArrival[0]) {
                        $allocation->setSiteArrivalId($siteArrival[0]->getId());
                    }
                    array_push($allocationArr, $allocation);
                }
            }




            $data = array(
                'status' => "success",
                'code' => 200,
                'msg' => ' All employee allocations!!!',
                'data' => $allocationArr
            );

        } else {
            $data = array_merge($this->duplicateError, array(
                'error_data' => $this->error
            ));
        }


        return $helpers->json($data);
    }

    public function acceptAllocationAction(Request $request) {
        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', false);
        $json = urldecode($request->get('json', false));
        $params = json_decode($json);


        if($this->isAuthenticated($token)) {
            $create = true;
            $identity = $this->getIdentity($request);
            $allocationId = $this->getEnitityId($params->id);


            $em = $this->getDoctrine()->getManager();
            $employee = $em->getRepository('BackendBundle:Employee')->findBy(array('user'=>$identity->sub));
            $allocation = $em->getRepository('BackendBundle:AllocatedDates')->find($allocationId);
            $employeeAlloction = $allocation->getEmployeeAllocation();
            $allocationEmpEncryptId = $employeeAlloction->getEmployee()->getId();

            if($employee[0]->getId() == $allocationEmpEncryptId) {

                $allocation->setAccecptallocation(true);
                $allocation->setCancelallocation(false);
                $allocation->setRequestsend(true);

                $em->persist($allocation);
                $em->flush();

                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' => ' All employee allocations!!!',
                    'data' => $allocation
                );
            } else {
                $data = array_merge($this->accessError, array(
                    'error_data' => $this->error
                ));
            }



        } else {
            $data = array_merge($this->accessError, array(
                'error_data' => $this->error
            ));
        }


        return $helpers->json($data);
    }

    public function denyAllocationAction(Request $request) {

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', false);
        $json = urldecode($request->get('json', false));
        $params = json_decode($json);
        $mailer = $this->get('mailer');


        if($this->isAuthenticated($token)) {
            $create = true;
            $identity = $this->getIdentity($request);
            $allocationId = $this->getEnitityId($params->id);


            $em = $this->getDoctrine()->getManager();
            $employee = $em->getRepository('BackendBundle:Employee')->findBy(array('user'=>$identity->sub));
            $allocation = $em->getRepository('BackendBundle:AllocatedDates')->find($allocationId);
            $employeeAlloction = $allocation->getEmployeeAllocation();
            $allocationEmpEncryptId = $employeeAlloction->getEmployee()->getId();

            if($employee[0]->getId() == $allocationEmpEncryptId) {

                $allocation->setCancelallocation(true);
                $allocation->setDeny(true);
                $allocation->setAccecptallocation(false);
                $allocation->setRequestsend(true);

                $em->persist($allocation);
                $em->flush();
                $mobileNo = $this->formatMobileNo($allocation->getEmployeeAllocation()->getEmployee()->getUser()->getMobile());

                $mailFrom = $allocation->getEmployeeAllocation()->getEmployee()->getUser()->getEmail();
                $body = "I am not able to accept job for " . $allocation->getEmployeeAllocation()->getTask()->getOrder()->getProject()->getProjectAddress() . " in " . $allocation->getDate()->format('Y-m-d') .". From : ". $allocation->getEmployeeAllocation()->getEmployee()->getUser()->getFullName() . "Mobile no - ". $mobileNo;


                $res = $this->sendEmail($mailer, $mailFrom, $body);



                $this->sendSMS($em, $body, $mobileNo);

                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' => ' All employee allocations!!!',
                    'data' => $allocation
                );
            } else {
                $data = array_merge($this->accessError, array(
                    'error_data' => $this->error
                ));
            }



        } else {
            $data = array_merge($this->accessError, array(
                'error_data' => $this->error
            ));
        }


        return $helpers->json($data);
    }

    public function getAllocationMembersAction(Request $request) {
        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', false);
        $taskId = $request->get('requestId', false);


        if($this->isAuthenticated($token)) {

            $taskId = $this->getEnitityId($taskId);


            $em = $this->getDoctrine()->getManager();
            $allocations = $em->getRepository('BackendBundle:EmployeeAllocation')->findBy(array('task' => $taskId));

            $allocattionAll = array();

            foreach ($allocations as $alloc) {

                $allocId = $this->getEnitityId($alloc->getId());

                $allocations = $em->getRepository('BackendBundle:AllocatedDates')->findBy(array('employeeAllocation' => $allocId));

                if(count($allocattionAll) > 0) {
                    foreach ($allocations as $al) {
                        array_push($allocattionAll, $al);
                    }

                }else {
                    $allocattionAll = $allocations;
                }
            }



            $employeeArr = array();
            $employees = array();

            if(count($allocattionAll) > 0) {
                foreach($allocattionAll as $allocation) {

                    $employee = $allocation->getEmployeeAllocation()->getEmployee();

                    $employeeArr[$employee->getId()] =  $employee;
                }
            }

            if(count($employeeArr) > 0) {
                foreach($employeeArr as $key=>$employee) {

                    array_push($employees, $employee);
                }
            }



            $data = array(
                'status' => "success",
                'code' => 200,
                'msg' => ' All employee allocations!!!',
                'data' => $employees
            );

        } else {
            $data = array_merge($this->duplicateError, array(
                'error_data' => $this->error
            ));
        }


        return $helpers->json($data);
    }

    function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val->{get.$key}(), $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    protected function sendSMS($em, $sms, $customerMobile) {

        $config = new TwilioConfig($em);


        $client = new \Twilio\Rest\Client($config->getTwilioSID(), $config->getTwilioToken());


        $client->messages
            ->create(
                "+61424460522",
                array(
                    "from" => $config->getTwilioalphaNumericID(),
                    "body" => $sms,
                )
            );
    }

    private function sendEmail(\Swift_Mailer $mailer, $emailFrom, $body) {
        $message = (new \Swift_Message('Employee Allocation'))
            ->setFrom($emailFrom)
            ->setTo('info@pwfhire.com.au')
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

}