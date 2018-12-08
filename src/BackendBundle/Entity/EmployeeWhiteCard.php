<?php

namespace BackendBundle\Entity;

/**
 * EmployeeWhiteCard
 */
class EmployeeWhiteCard extends \BackendBundle\Entity\AEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

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
     * Set name
     *
     * @param string $name
     *
     * @return EmployeeWhiteCard
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set employeeOtherDocument
     *
     * @param \BackendBundle\Entity\EmployeeOtherDocument $employeeOtherDocument
     *
     * @return EmployeeWhiteCard
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

