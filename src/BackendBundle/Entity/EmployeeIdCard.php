<?php

namespace BackendBundle\Entity;

/**
 * EmployeeIdCard
 */
class EmployeeIdCard extends \BackendBundle\Entity\AEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $issueDate;

    /**
     * @var \DateTime
     */
    private $expiryDate;

    /**
     * @var \BackendBundle\Entity\EmployeeOtherDocument
     */
    private $employeeOtherDocument;


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
     * Set issueDate
     *
     * @param \DateTime $issueDate
     *
     * @return EmployeeIdCard
     */
    public function setIssueDate($issueDate)
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * Get issueDate
     *
     * @return \DateTime
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * Set expiryDate
     *
     * @param \DateTime $expiryDate
     *
     * @return EmployeeIdCard
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * Get expiryDate
     *
     * @return \DateTime
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * Set employeeOtherDocument
     *
     * @param \BackendBundle\Entity\EmployeeOtherDocument $employeeOtherDocument
     *
     * @return EmployeeIdCard
     */
    public function setEmployeeOtherDocument(\BackendBundle\Entity\EmployeeOtherDocument $employeeOtherDocument = null)
    {
        $this->employeeOtherDocument = $employeeOtherDocument;

        return $this;
    }

    /**
     * Get employeeOtherDocument
     *
     * @return \BackendBundle\Entity\EmployeeOtherDocument
     */
    public function getEmployeeOtherDocument()
    {
        return $this->employeeOtherDocument;
    }

    public function toArray() {
        return get_object_vars($this);
    }
}

