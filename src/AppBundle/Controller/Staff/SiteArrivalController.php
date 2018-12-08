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
use BackendBundle\Entity\SiteArrival;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Controller\Core\AController;

class SiteArrivalController extends AController
{
    private $error = array();



    public function getSiteArrivalsAction(Request $request)
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


    public function getSiteArrivalByIdAction(Request $request)
    {

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', false);
        $id = $request->get('id', false);


        if($this->isAuthenticated($token) && $this->isEmployee($token) || $this->isAdmin($token)) {
            if($id) {
                $id = $this->getEnitityId($id);
                $identity = $this->getIdentity($request);
                $em = $this->getDoctrine()->getManager();


                $belongsSiteArrival = $em->getRepository('BackendBundle:SiteArrival')->find($id);
                $requestedEmpId = false;
                if($this->isAdmin($token)) {
                    $requestedEmpId = $belongsSiteArrival->getAllocatedDates()->getEmployeeAllocation()->getEmployee()->getId();
                } else {
                    if($belongsSiteArrival) {
                        $user_id =$identity->sub;
                        $employee = $em->getRepository('BackendBundle:Employee')->findBy(array('user'=>$user_id));
                        $requestedEmpId = $belongsSiteArrival->getAllocatedDates()->getEmployeeAllocation()->getEmployee()->getId();
                    }
                }


                if($this->isAdmin($token) || $requestedEmpId && $requestedEmpId == $employee[0]->getId() ) {
                    $data = array(
                        'status' => "success",
                        'code' => 200,
                        'msg' => ' All employee allocations!!!',
                        'data' => $belongsSiteArrival
                    );
                } else {
                    $data = $this->accessError;
                }

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


        return $helpers->json($data);
    }

    public function addSiteArrivalAction(Request $request)
    {

        $helpers = $this->get(Helpers::class);
        $json = urldecode($request->get('json', null));
        $params = json_decode($json);
        $token = $request->get('authorisation', null);
        $allocatedDateId = $this->getEnitityId($params->allocatedDates->id);


        if ($this->isAuthenticated($token) && $this->isEmployee($token)) {

            $identity = $this->getIdentity($request);
            $em = $this->getDoctrine()->getManager();

            $user_id =$identity->sub;
            $employee = $em->getRepository('BackendBundle:Employee')->findBy(array('user'=>$user_id));
            $allocatedDate = $em->getRepository('BackendBundle:AllocatedDates')->find($allocatedDateId);
            $requestedEmpId = false;
            if($allocatedDate) {
                $requestedEmpId = $allocatedDate->getEmployeeAllocation()->getEmployee()->getId();
            }

            if($requestedEmpId && $requestedEmpId == $employee[0]->getId()) {
                $siteArrival = new SiteArrival();

                $this->prepareEntityData($siteArrival, $params);
                $siteArrival->setSubmitted(true);

                $em->persist($siteArrival);
                $em->flush();

                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' => ' Site Arrival Added Successfully!!!',
                    'data' => $siteArrival
                );
            } else {
                $data = $this->accessError;
            }
        } else {
            $data = $this->accessError;
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


}