<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/11/2017
 * Time: 10:21 AM
 */

namespace AppBundle\Controller\Admin;


use AppBundle\Controller\Admin\AAdmin;
use AppBundle\Entity\TimeSheetFilter;
use AppBundle\Services\Helpers;
use BackendBundle\Entity\EmployeeTimesheetDocument;
use BackendBundle\Entity\TimeSheet;
use BackendBundle\Entity\TimesheetHourEntry;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Controller\UserController;

class ManageTimeSheetController extends AAdmin
{
    private $error = array();

    public function listAction(Request $request) {
        $this->entity = new TimeSheet();

        return parent::listAction($request);
    }

    public function uploadTimeSheetAction (Request $request) {

        $params = json_decode(urldecode($request->get('json', null)));
        $upload = json_decode(urldecode($request->get('upload', null)));
        $timeEntires = json_decode(urldecode($request->get('times', null)));
        $token = $request->get('authorisation', null);
        $helpers = $this->get(Helpers::class);
        $fs = new Filesystem();

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $create = true;
            $this->entity = new TimeSheet();
            $empId = $this->getEnitityId($params->employee->id);
            if(!$empId) {
                $empId = $params->employee->id;
            }
            $timesheetParams = $this->getEnitityId($params->timesheet);


            $em = $this->getDoctrine()->getManager();
            $employee = $em->getRepository('BackendBundle:Employee')->find($empId);




            if ($create) {
                $this->prepareEntityData($this->entity, $params);
            }

            $this->entity->setEmployee($employee);





            $entityName = $this->entity->getEntityClassName();



            if ($create) {

                $em->persist($this->entity);
                $em->flush();

                if($upload){
                    $document = $this->addTimeSheet($this->entity, $upload);
                    $em->persist($document);
                    $em->flush();

                    $tmpId = $this->getEnitityId($upload->id);
                    $tmpUpload = $em->getRepository('BackendBundle:Tmpimage')->find($tmpId);
                    $em->remove($tmpUpload);
                    $em->flush();
                    $fs->remove('tmp/'.$upload->name);

                }

                foreach ($timeEntires as $timeEntiry) {
                    $hourlyRate = $em->getRepository('BackendBundle:HourlyRate')->findBy(array('id' =>$timeEntiry->hourlyRate->id, 'timeCategory' => $timeEntiry->hourlyRate->timeCategory));
                    if(count($hourlyRate) > 0) {
                        $newEntry = new TimesheetHourEntry($this->entity, $timeEntiry->hours->hour, $timeEntiry->hours->minutes, $hourlyRate[0], 0);
                        $em->persist($newEntry);
                        $em->flush();
                    }

                }



                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' =>'TimeSheet is Successfully uploaded!!!',
                    'employeeTimeSheet' => $document
                );
            } else {
                $data = array_merge($this->duplicateError, array(
                    'error_data' => $this->error
                ));

            }
        } else {
            return $this->accessError;
        }

        return $helpers->json($data);

    }

    public function updateTimeSheetAction(Request $request) {



        $this->entity = new TimeSheet();


        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);
        $json = urldecode($request->get('json', null));

        $params = json_decode($json);
        $upload = json_decode(urldecode($request->get('upload', null)));
        $sqlExecute = false;


        if ($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $timeSheetId = $this->getEnitityId($params->id);

            $em = $this->getDoctrine()->getManager();


            if($timeSheetId) {
                $sqlExecute = true;
            }

            $entityClassName = $this->entity->getEntityClassName();

            if ($sqlExecute) {

                $entity = $em->getRepository('BackendBundle:'.$entityClassName)->find($timeSheetId);
                $this->prepareEntityData($entity, $params);

                if($entity->getEmployeeTimesheetDocument()) {
                    $document = $entity->getEmployeeTimesheetDocument();
                    if($upload && $upload != null) {
                        $documentEntity = $this->updateTimeSheetDocment($document, $upload);
                        $entity->setEmployeeTimeSheetDocument($documentEntity);
                        if($documentEntity->getTimeSheet() == null) {
                            $documentEntity->setTimeSheet($entity);
                        }
                    }


                } else {


                    $documentEntity = new EmployeeTimesheetDocument();
                    if($upload && $upload != null) {
                        $this->updateTimeSheetDocment($documentEntity, $upload);
                        $documentEntity->setTimeSheet($entity);
                        $entity->setEmployeeTimeSheetDocument($documentEntity);
                    }
                }


            }
            if(count($this->error) > 0) {
                $sqlExecute = false;
            }
            if ($sqlExecute) {
                $em->persist($entity);
                $em->persist($documentEntity);
                $em->flush();


//                $data = $this->getSingleModifiedData($entity);
//                if(count($this->getCollectionProperty($entity)) > 0) {
//                    $collectionProperties = $this->getCollectionProperty($entity);
//                    foreach ($collectionProperties as $prop) {
//                        if(count($entity->{'spliced'.$prop}) > 0) {
//                            foreach ($entity->{'spliced'.$prop} as $dEntity) {
//                                $em->remove($dEntity);
//                                $em->flush();
//                            }
//                        }
//                    }
//                }


                $data = array(
                    'status' => $entityClassName." is successfully updated",
                    'code' => 200,
                    'msg' => 'Updated Successfully!!!',
                    'data' => $entity
                );
            } else {

                $data = array_merge($this->updateError, array(
                    'data_error' => $this->error
                ));
            }

        } else {
            $data = $this->updateError;
        }

        return $helpers->json($data);
    }

    public function archiveTimeSheetAction(Request $request)
    {

        $helpers = $this->get(Helpers::class);
        $json = urldecode($request->get('json', null));
        $params = json_decode($json);
        $token = $request->get('authorisation', null);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $em = $this->getDoctrine()->getManager();
            $timesheetId = $this->getEnitityId($params->id);
            $timesheet = $em->getRepository('BackendBundle:TimeSheet')->find($timesheetId);


            if($timesheet) {
                $timesheet->setArchived(true);
                $em->persist($timesheet);
                $em->flush();

                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' => 'Timesheet is Successfully Archived!!!',
                    'data' => $timesheet
                );
            } else {
                $data = $this->error;
            }


        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }

    public function allTimeSheetAction (Request $request) {

        $token = $request->get('authorisation', null);
        $helpers = $this->get(Helpers::class);


        if($this->isAuthenticated($token) && $this->isEmployee($token)) {

            $identity = $this->getIdentity($request);


            $em = $this->getDoctrine()->getManager();
            $employee = $em->getRepository('BackendBundle:Employee')->findBy(array('user'=>$identity->sub));
            $employeeId = $this->getEnitityId($employee[0]->getId());

            $dql = "SELECT c FROM BackendBundle:TimeSheet c WHERE c.employee=$employeeId ORDER BY c.id ASC";


            $query = $em->createQuery($dql);


            $page = $request->query->getInt('page', 1);

            $paginator = $this->get('knp_paginator');
            $items_perPage = 10;
            $pagination = $paginator->paginate($query, $page, $items_perPage);
            $total_items_count = $pagination->getTotalItemCount();

//            $data = $this->getModifiedData($pagination->getItems());

            $data = array(
                "status" => "success",
                'code' => 200,
                'total_items_count' => $total_items_count,
                'page_actual' => $page,
                'items_per_page' => $items_perPage,
                'total_pages' => ceil($total_items_count / $items_perPage),
                'data' => $pagination

            );
        } else {
            $data = array(
                "status" => "error",
                'code'  => 400,
                'msg'   => 'Authorization not valid'
            );
        }


        return $helpers->json($data);

    }

    public function searchSheetsAction (Request $request) {

        $token = $request->get('authorisation', null);
        $searchParams = json_decode($request->get('filter', null));
        $helpers = $this->get(Helpers::class);


        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $em = $this->getDoctrine()->getManager();
            $queryBuilder = $em->createQueryBuilder();

            $searchParams->employee = $this->getEnitityId($searchParams->employee);
            $searchParams->client = $this->getEnitityId($searchParams->client);
            $searchParams->project = $this->getEnitityId($searchParams->project);
            $searchParams->order = $this->getEnitityId($searchParams->order);
            $searchParams->task = $this->getEnitityId($searchParams->task);

            $timesheetFilter = new \AppBundle\Entity\TimesheetFilter($searchParams);

            $query = $em->getRepository('BackendBundle:TimeSheet')->searchTimeSheet($queryBuilder, $timesheetFilter);


            $page = $request->query->getInt('page', 1);

            $paginator = $this->get('knp_paginator');
            $items_perPage = 10;
            $pagination = $paginator->paginate($query, $page, $items_perPage);
            $total_items_count = $pagination->getTotalItemCount();


            $data = array(
                "status" => "success",
                'code' => 200,
                'total_items_count' => $total_items_count,
                'page_actual' => $page,
                'items_per_page' => $items_perPage,
                'total_pages' => ceil($total_items_count / $items_perPage),
                'data' => $pagination

            );
        } else {
            $data = array(
                "status" => "error",
                'code'  => 400,
                'msg'   => 'Authorization not valid'
            );
        }


        return $helpers->json($data);

    }



}