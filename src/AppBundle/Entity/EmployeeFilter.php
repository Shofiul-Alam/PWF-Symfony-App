<?php
/**
 * Created by PhpStorm.
 * User: Shofiul
 * Date: 31/08/2018
 * Time: 3:23 PM
 */


namespace AppBundle\Entity;


class EmployeeFilter {
    public $firstName = "";
    public $lastName = "";
    public $employeeCategory = "";
    public $email = "";
    public $address = "";
    public $approved = "";
    public $positions = "";
    public $positionName = "";
    public $orderBy = "DESC";

    public function __construct( \stdClass $obj )
    {
        $this->firstName = $obj->firstName;
        $this->lastName = $obj->lastName;
        $this->employeeCategory = $obj->employeeCateogry;
        $this->email = $obj->email;
        $this->address = $obj->address;
        $this->approved = $obj->approved;
        $this->positions = $obj->positions;
        $this->positionName = $obj->positionName;
        $this->orderBy = $obj->orderBy;
    }


}