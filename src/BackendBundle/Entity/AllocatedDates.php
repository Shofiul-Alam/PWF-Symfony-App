<?php

namespace BackendBundle\Entity;

/**
 * AllocatedDates
 */
class AllocatedDates extends AEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $day;

    /**
     * @var string
     */
    private $respond;

    /**
     * @var boolean
     */
    private $cancelallocation = false;

   /**
     * @var boolean
     */
    private $deny = false;

    /**
     * @var boolean
     */
    private $accecptallocation = false;

    /**
     * @var boolean
     */
    private $requestsend = false;

    /**
     * @var \BackendBundle\Entity\EmployeeAllocation
     */
    private $employeeAllocation;

    /**
     * @var string
     */
    private $cancelSms;

    /**
     * @var string
     */
    private $sms;

    /**
     * @var boolean
     */
    private $reAllocated = false;


    private $siteArrivalId = false;


    public function setSiteArrivalId($id) {
        $this->siteArrivalId = $id;
    }
    public function getSiteArrivalId() {
        return $this->siteArrivalId;
    }

    private $siteArrival;

    /**
     * @return mixed
     */
    public function getSiteArrival()
    {
        return $this->siteArrival;
    }

    /**
     * @param mixed $siteArrival
     */
    public function setSiteArrival(SiteArrival $siteArrival)
    {
        $this->siteArrival = $siteArrival;
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return AllocatedDates
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    public function getDateString()
    {
        return $this->date->getTimestamp();
    }


    /**
     * Set day
     *
     * @param string $day
     *
     * @return AllocatedDates
     */
    public function setDay($day = null)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set respond
     *
     * @param string $respond
     *
     * @return AllocatedDates
     */
    public function setRespond($respond = null)
    {
        $this->respond = $respond;

        return $this;
    }

    /**
     * Get respond
     *
     * @return string
     */
    public function getRespond()
    {
        return $this->respond;
    }

    /**
     * Set cancelallocation
     *
     * @param boolean $cancelallocation
     *
     * @return AllocatedDates
     */
    public function setCancelallocation($cancelallocation = null)
    {
        $this->cancelallocation = $cancelallocation;

        return $this;
    }

    /**
     * Get cancelallocation
     *
     * @return boolean
     */
    public function getCancelallocation()
    {
        return $this->cancelallocation;
    }

    /**
     * @return bool
     */
    public function isReAllocated()
    {
        return $this->reAllocated;
    }

    /**
     * @param bool $reAllocated
     */
    public function setReAllocated(bool $reAllocated)
    {
        $this->reAllocated = $reAllocated;
    }

    /**
     * Set accecptallocation
     *
     * @param boolean $accecptallocation
     *
     * @return AllocatedDates
     */
    public function setAccecptallocation($accecptallocation = null)
    {
        $this->accecptallocation = $accecptallocation;

        return $this;
    }

    /**
     * Get accecptallocation
     *
     * @return boolean
     */
    public function getAccecptallocation()
    {
        return $this->accecptallocation;
    }

    /**
     * Set requestsend
     *
     * @param boolean $requestsend
     *
     * @return AllocatedDates
     */
    public function setRequestsend($requestsend = null)
    {
        $this->requestsend = $requestsend;

        return $this;
    }

    /**
     * Get requestsend
     *
     * @return boolean
     */
    public function getRequestsend()
    {
        return $this->requestsend;
    }

    /**
     * Set employeeAllocation
     *
     * @param \BackendBundle\Entity\EmployeeAllocation $employeeAllocation
     *
     * @return AllocatedDates
     */
    public function setEmployeeAllocation(\BackendBundle\Entity\EmployeeAllocation $employeeAllocation)
    {
        $this->employeeAllocation = $employeeAllocation;

        return $this;
    }

    /**
     * Get employeeAllocation
     *
     * @return \BackendBundle\Entity\EmployeeAllocation
     */
    public function getEmployeeAllocation()
    {
        return $this->employeeAllocation;
    }

    /**
     * @return string
     */
    public function getCancelSms()
    {
        return $this->cancelSms;
    }

    /**
     * @param string $sms
     */
    public function setCancelSms(string $sms)
    {
        $this->cancelSms = $sms;
    }


    public function toArray() {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function getSms()
    {
        return $this->sms;
    }

    /**
     * @param string $sms
     */
    public function setSms(string $sms)
    {
        $this->sms = $sms;
    }

    /**
     * @return bool
     */
    public function isDeny()
    {
        return $this->deny;
    }

    /**
     * @param bool $deny
     */
    public function setDeny(bool $deny)
    {
        $this->deny = $deny;
    }


}

