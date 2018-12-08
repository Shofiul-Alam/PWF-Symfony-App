<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/11/2017
 * Time: 10:21 AM
 */

namespace AppBundle\Controller\Admin;


use AppBundle\Controller\Admin\AAdmin;
use AppBundle\Entity\EmployeeView;
use AppBundle\Entity\TimesheetView;
use AppBundle\Services\Helpers;
use BackendBundle\Entity\EmployeeTimesheetDocument;
use BackendBundle\Entity\Invoice;
use BackendBundle\Entity\InvoiceItem;
use BackendBundle\Entity\InvoiceSubitem;
use BackendBundle\Entity\TimeSheet;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Controller\UserController;

class ManageInvoiceController extends AAdmin
{
    private $error = array();


    public function findTimesheetsFromDateRangeAction(Request $request) {

        $token = $request->get('authorisation', null);
        $json = json_decode(urldecode($request->get('json', null)));
        $helpers = $this->get(Helpers::class);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $id = $json->employeeId;

            $em = $this->getDoctrine()->getManager();
            $startDate = $this->processDate($json->startDate);
            $endDate = $this->processDate($json->endDate);
            $employee = $em->getRepository('BackendBundle:Employee')->find($id);
            $timesheets = $em->getRepository('BackendBundle:TimeSheet')->findTimesheetsFromDates($em, $employee, $startDate, $endDate);

            $modifiedTimeSheets = array();

            if(count($timesheets) > 0) {
                foreach ($timesheets as $timesheet) {
                    $modifiedTimeSheet = new TimesheetView($timesheet);
                    array_push($modifiedTimeSheets, $modifiedTimeSheet);
                }
            }

            $data = array(
                'status' => "success",
                'code' => 200,
                'msg' => 'Successfully retrived timesheets !!!',
                'data' => $modifiedTimeSheets
            );

        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }

    public function getEmplopyessHaveTimesheetAction(Request $request) {
        $token = $request->get('authorisation', null);
        $helpers = $this->get(Helpers::class);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $em = $this->getDoctrine()->getManager();

            $employees = $em->getRepository('BackendBundle:TimeSheet')->findUniqEmployees($em);

            $modifiedEmployees = array();

            if(count($employees) > 0) {

                foreach ($employees as $employee) {
                    $invoices = $em->getRepository('BackendBundle:Invoice')->findBy(array('employee' => $employee['id']), array('id' => 'DESC'));
                    if($invoices[0]) {
                        $lastInvoiceId = $this->getEnitityId($invoices[0]->getId());
                    } else {
                        $lastInvoiceId = 1;
                    }
                    $employee['text'] = $employee['firstName']. ' ' . $employee['lastName'];
                    $employee['lastInvoiceNo'] = $lastInvoiceId;
                    array_push($modifiedEmployees, $employee);
                }
            }

            $data = array(
                'status' => "success",
                'code' => 200,
                'msg' => 'Successfully retrived timesheets !!!',
                'data' => $modifiedEmployees
            );

        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }

    public function createInvoiceAction(Request $request) {

        $token = $request->get('authorisation', null);
        $employee = json_decode(urldecode($request->get('employee', null)));
        $config = json_decode(urldecode($request->get('config', null)));
        $invoiceItems = json_decode(urldecode($request->get('invoiceItems', null)));
        $helpers = $this->get(Helpers::class);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $id = $config->employeeId;

            $em = $this->getDoctrine()->getManager();
            $startDate = $this->getDateObject($config->startDate);
            $endDate = $this->getDateObject($config->endDate);
            $date = $this->getDateObject($config->invoiceDate);
            $employee = $em->getRepository('BackendBundle:Employee')->find($id);

            $invoice = new Invoice();
            $invoice->setEmployee($employee);
            $invoice->setInvoiceDate($date);
            $invoice->setStartDate($startDate);
            $invoice->setEndDate($endDate);

            $em->persist($invoice);
            $em->flush();

            $grandTotal = 0;


            $invoiceItemArr = array();

            if(count($invoiceItems) > 0) {
                foreach ($invoiceItems as $invoiceItem) {
                    $newInvoiceItem = new InvoiceItem();
                    if($invoiceItem->date->timestamp) {
                        $itemDate = new \DateTime();
                        $itemDate->setTimestamp($invoiceItem->date->timestamp);
                        $newInvoiceItem->setDate($itemDate);
                    }

                    $newInvoiceItem->setDay($invoiceItem->hourEntries[0]->day);
                    $newInvoiceItem->setDetails($invoiceItem->position. "<br/>" . $invoiceItem->address);
                    $newInvoiceItem->setInvoice($invoice);
                    $em->persist($newInvoiceItem);
                    $em->flush();
                    $itemTotal = 0;
                    $subitems = $invoiceItem->hourEntires;
                    if(count($subitems) > 0) {
                        foreach($subitems as $subitem) {
                            $newSubItem = new InvoiceSubitem();
                            $newSubItem->setDetails($subitem->timeCategory);
                            $newSubItem->setInvoiceItem($newInvoiceItem);
                            $newSubItem->setRate($subitem->rate);
                            if($subitem->minutes>=30) {
                                $qty = $subitem->hours + ($subitem->minutes/60);
                            } else {
                                $qty = $subitem->hours;
                            }
                            $newSubItem->setQuantity($qty);
                            $price = $subitem->rate * $qty;
                            $newSubItem->setPrice($price);
                            $itemTotal += $price;


                            $em->persist($newSubItem);
                            $em->flush();
                            $newInvoiceItem->addInvoiceSubitem($newSubItem);
                        }
                    }
                    $newInvoiceItem->setItemTotal($itemTotal);

                    $em->persist($newInvoiceItem);
                    $em->flush();
                    $invoice->addInvoiceItem($newInvoiceItem);
                    $grandTotal += $itemTotal;
                }
                $invoice->setTotal($grandTotal);
                $em->persist($invoice);
                $em->flush();

            }

            $data = array(
                'status' => "success",
                'code' => 200,
                'msg' => 'Invoice has been successfully stored !!!',
                'data' => $invoice
            );

        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }

    public function getAllInvoiceAction(Request $request) {

        $token = $request->get('authorisation', null);
        $helpers = $this->get(Helpers::class);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {


            $em = $this->getDoctrine()->getManager();
            $invoices = $em->getRepository("BackendBundle:Invoice")->findAll();

//            $dql = "SELECT c FROM BackendBundle:Invoice c ORDER BY c.id DESC";
//
//
//
//            $query = $em->createQuery($dql);
//
//
//            $page = $request->query->getInt('page', 1);
//
//            $paginator = $this->get('knp_paginator');
//            $items_perPage = 10;
//            $pagination = $paginator->paginate($query, $page, $items_perPage);
//            $total_items_count = $pagination->getTotalItemCount();


            $data = array(
                "status" => "success",
                'code'  => 200,
//                'total_items_count'   => $total_items_count,
//                'page_actual' => $page,
//                'items_per_page' => $items_perPage,
//                'total_pages'   => ceil($total_items_count / $items_perPage),
                'data' => $invoices

            );

        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }


    private function processDate($dob) {

        if($dob != null && $dob->year != null) {
            $formatedDob = $dob->year . '/' . $dob->month . '/' . $dob->day;
            $sql_dob = new \DateTime($formatedDob);

        }

        return date_format($sql_dob, 'Y-m-d H:i:s');

    }
    private function getDateObject($dob) {

        if($dob != null && $dob->year != null) {
            $formatedDob = $dob->year . '/' . $dob->month . '/' . $dob->day;
            $sql_dob = new \DateTime($formatedDob);

        }

        return $sql_dob;

    }




}