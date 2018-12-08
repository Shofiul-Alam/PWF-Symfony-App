<?php
/**
 * Created by PhpStorm.
 * User: Shofiul
 * Date: 31/08/2018
 * Time: 3:23 PM
 */


namespace AppBundle\Entity;

use BackendBundle\Entity\AllocatedDates;

class Allocation {

    public $id;

    public $employeeId;

    public $employeeFullName;

    public $task = array();

    public $allocatedDates;

    /**
     * @var string
     */
    public $date;

    /**
     * @var string
     */
    public $day;

    /**
     * @var string
     */
    public $respond;

    /**
     * @var boolean
     */
    public $cancelallocation = false;

    public $reAllocated = false;

    /**
     * @var boolean
     */
    public $accecptallocation = false;

    /**
     * @var boolean
     */
    public $requestsend = false;

    /**
     * @var string
     */
    public $cancelSms;

    /**
     * @var string
     */
    public $sms;

    public $siteArrival;

    public function  getModifiedAllocation(AllocatedDates $allocatedDates) {
        $this->id = $allocatedDates->getId();
        $this->employeeFullName = $allocatedDates->getEmployeeAllocation()->getEmployee()->getUser()->getFirstName() . " ".
            $allocatedDates->getEmployeeAllocation()->getEmployee()->getUser()->getLastName();
        $this->employeeId = $allocatedDates->getEmployeeAllocation()->getEmployee()->getId();
        $this->task = $allocatedDates->getEmployeeAllocation()->getTask();
        $this->date = $allocatedDates->getDateString();
        $this->day = $allocatedDates->getDay();
        $this->respond = $allocatedDates->getRespond();
        $this->cancelallocation = $allocatedDates->getCancelallocation();
        $this->accecptallocation = $allocatedDates->getAccecptallocation();
        $this->requestsend = $allocatedDates->getRequestsend();
        $this->cancelSms = $allocatedDates->getCancelSms();
        $this->sms = $allocatedDates->getSms();
        $this->siteArrival = $allocatedDates->getSiteArrival();
    }
}