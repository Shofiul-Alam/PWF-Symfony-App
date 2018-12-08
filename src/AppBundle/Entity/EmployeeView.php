<?php
/**
 * Created by PhpStorm.
 * User: Shofiul
 * Date: 31/08/2018
 * Time: 3:23 PM
 */


namespace AppBundle\Entity;

use BackendBundle\Entity\Employee;


class EmployeeView {

    public $id;

    public $text;

    public $mobile;

    public $email;

    public $abn;

    public $lastInvoiceNo;

    public $user = [];

    public function  __construct(Employee $employee, $lastInvoiceNo = null) {
        $this->id = $employee->getId();
        $this->text = $employee->getEmployeeName();
        $this->mobile = $employee->getUser()->getMobile();
        $this->user['firstName'] = $employee->getUser()->getFirstName();
        $this->user['lastName'] = $employee->getUser()->getLastName();
        $this->abn = $employee->getAbnNo();

        if($lastInvoiceNo != null) {
            $this->lastInvoiceNo = $lastInvoiceNo;
        }

    }
}