<?php

namespace BackendBundle\Entity;

/**
 * TimesheetHourEntry
 */
class TimesheetHourEntry extends \BackendBundle\Entity\AEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \BackendBundle\Entity\HourlyRate
     */
    private $hourlyRate;

    /**
     * @var \BackendBundle\Entity\TimeSheet
     */
    private $timeSheet;

    private $rate;

    private $hours;

    private $minutes;


    public function __construct($timesheet, $hours, $minutes, $hourlyRate, $rate)
    {
        $this->hourlyRate = $hourlyRate;
        $this->rate = $rate;
        $this->timeSheet = $timesheet;
        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->encodeId($this->id);
    }

    /**
     * Set hourlyRate
     *
     * @param \BackendBundle\Entity\HourlyRate $hourlyRate
     *
     * @return TimesheetHourEntry
     */
    public function setHourlyRate(\BackendBundle\Entity\HourlyRate $hourlyRate = null)
    {
        $this->hourlyRate = $hourlyRate;

        return $this;
    }

    /**
     * Get hourlyRate
     *
     * @return \BackendBundle\Entity\HourlyRate
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }

    /**
     * Set timeSheet
     *
     * @param \BackendBundle\Entity\TimeSheet $timeSheet
     *
     * @return TimesheetHourEntry
     */
    public function setTimeSheet(\BackendBundle\Entity\TimeSheet $timeSheet = null)
    {
        $this->timeSheet = $timeSheet;

        return $this;
    }

    /**
     * Get timeSheet
     *
     * @return \BackendBundle\Entity\TimeSheet
     */
    public function getTimeSheet()
    {
        return $this->timeSheet;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param mixed $hours
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
    }

    /**
     * @return mixed
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * @param mixed $minutes
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;
    }



    public function toArray() {
        return get_object_vars($this);
    }

}

