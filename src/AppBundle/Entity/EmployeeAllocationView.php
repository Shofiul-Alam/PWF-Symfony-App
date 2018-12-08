<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23/2/18
 * Time: 11:03 AM
 */

namespace AppBundle\Entity;


use AppBundle\Services\JwtAuth;
use BackendBundle\Entity\Client;
use BackendBundle\Entity\EmployeeAllocation;
use BackendBundle\Entity\Order;
use BackendBundle\Entity\Project;
use BackendBundle\Entity\Task;


class EmployeeAllocationView {

    public $allocationArray;

    public function __construct($allocatedDates)
    {


        $employees= $this->unique_multidim_array($allocatedDates, 'EmployeeAllocation');

        $i = 0;
        foreach ($employees as $employee) {


            $employeeId = $employee->getId();

            $allocationByEmployee = array_filter($allocatedDates, function ($element) use ($employeeId) {
                return ($element->getEmployeeAllocation()->getEmployee()->getId() == $employeeId); } );

            $this->allocationArray[$i]['employee'] = $employeeId;
            $this->allocationArray[$i]['employeeFullName'] = $employee->getUser()->getFirstName() . " ".
                                                                $employee->getUser()->getLastName();

            foreach ($allocationByEmployee as $allocatedDate) {
                $modifiedAllocatedDate = new Allocation();
                $modifiedAllocatedDate->id = $allocatedDate->getId();
                $modifiedAllocatedDate->employeeId = $employeeId;
                $modifiedAllocatedDate->date = $allocatedDate->getDateString();
                $modifiedAllocatedDate->day = $allocatedDate->getDay();
                $modifiedAllocatedDate->respond = $allocatedDate->getRespond();
                $modifiedAllocatedDate->cancelallocation = $allocatedDate->getCancelallocation();
                $modifiedAllocatedDate->deny = $allocatedDate->isDeny();
                $modifiedAllocatedDate->reAllocated = $allocatedDate->isReAllocated();
                $modifiedAllocatedDate->sms = $allocatedDate->getSms();
                $modifiedAllocatedDate->accecptallocation = $allocatedDate->getAccecptallocation();
                $modifiedAllocatedDate->requestsend = $allocatedDate->getRequestsend();
                $modifiedAllocatedDate->task['id'] = $allocatedDate->getEmployeeAllocation()->getTask()->getId();
                $modifiedAllocatedDate->task['codename'] = $allocatedDate->getEmployeeAllocation()->getTask()->getCodeName();
                $this->allocationArray[$i]['allocatedDates'][] = (array) $modifiedAllocatedDate;

            }

            $i++;
        }


    }

    public function unique_multidim_array($array, $key) {
        $i = 0;
        $key_array = array();
        $emp_array = array();

        foreach($array as $val) {
            if (!in_array($val->{"get".$key}()->getEmployee()->getId(), $key_array)) {
                $key_array[$i] = $val->{"get".$key}()->getEmployee()->getId();
                $emp_array[$i] = $val->{"get".$key}()->getEmployee();
            }
            $i++;
        }
        return $emp_array;
    }

}