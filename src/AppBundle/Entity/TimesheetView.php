<?php
/**
 * Created by PhpStorm.
 * User: Shofiul
 * Date: 31/08/2018
 * Time: 3:23 PM
 */


namespace AppBundle\Entity;

use BackendBundle\Entity\TimeSheet;

class TimesheetView {

    public $date = array();

    public $position;

    public $address;

    public $hourEntires = array();


    public function  __construct(TimeSheet $timeSheet) {
        foreach ($timeSheet->getTimesheetHourEntry() as $hourObj) {
            $timeEntry = array();
            $timeEntry['timesheet'] = $timeSheet->getId();
            $timeEntry['hours'] = $hourObj->getHours();
            $timeEntry['minutes'] = $hourObj->getMinutes();
            $timeEntry ['day'] = substr($hourObj->getHourlyRate()->getTimeCategory(), -2) == 'Ot' ? $timeSheet->getWeekDay() . " OT" : $timeSheet->getWeekDay();
            $timeEntry['timeCategory'] = $hourObj->getHourlyRate()->getTimeCategory();
            $timeEntry['timeCategory'] = $hourObj->getHourlyRate()->getTimeCategory();
            $timeEntry['rate'] = $hourObj->getRate();

            array_push($this->hourEntires, $timeEntry);
        }
        $this->date['timestamp'] = $timeSheet->getDate()->getTimestamp();
        $this->position = $timeSheet->getAllocatedDates()->getEmployeeAllocation()->getTask()->getJob()[0]->getName();
        $this->address = $timeSheet->getAllocatedDates()->getEmployeeAllocation()->getTask()->getOrder()->getProject()->getProjectAddress();

    }
}