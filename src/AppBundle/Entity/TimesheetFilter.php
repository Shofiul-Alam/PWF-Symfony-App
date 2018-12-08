<?php
/**
 * Created by PhpStorm.
 * User: Shofiul
 * Date: 31/08/2018
 * Time: 3:23 PM
 */


namespace AppBundle\Entity;


class TimesheetFilter {
    public $client = null;
    public $project = null;
    public $order = null;
    public $task = null;
    public $employee = null;
    public $approved = null;
    public $startDate = null;
    public $endDate = null;


    public function __construct( \stdClass $obj )
    {
        $this->client = $obj->client;
        $this->project = $obj->project;
        $this->order = $obj->order;
        $this->task = $obj->task;
        $this->employee = $obj->employee;
        $this->approved = $obj->approved;
        $this->startDate = $this->getDateObject($obj->startDate);
        $this->endDate = $this->getDateObject($obj->endDate);
    }

    private function getDateObject($dob) {

        if($dob != null) {
            $dob = explode('-', $dob);
            if(count($dob) > 0) {
                $formatedDob = $dob[0] . '/' . $dob[1] . '/' . $dob[2];
                $sql_dob = new \DateTime($formatedDob);
                return $sql_dob;
            }

        }

        return null;

    }

}