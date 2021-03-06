<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/11/2017
 * Time: 8:15 PM
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Services\Helpers;
use AppBundle\Services\JwtAuth;
use BackendBundle\Entity\Client;
use BackendBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;


class ManageTaskController extends AAdmin
{
    private $error = array();


    public function newAction(Request $request)
    {
        $helpers = $this->get(Helpers::class);
        $this->entity = new Task();
        return parent::newAction($request);

    }

    public function listAction(Request $request) {
        $this->entity = new Task();

        return parent::listAction($request);
    }


    public function editAction(Request $request)
    {
        $this->entity = new Task();
        return parent::editAction($request);
    }

    public function getOrderTasksAction(Request $request) {
        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);
        $filter = json_decode(urldecode($request->get('filters', null)));



        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $em = $this->getDoctrine()->getManager();
            $queryBuilder = $em->createQueryBuilder();
            if($filter->orderId) {
                $orderId = $this->getEnitityId($filter->orderId);
                $order = $em->getRepository('BackendBundle:Order')->find($orderId);
            }

            $tasks = $em->getRepository('BackendBundle:Task')->findProjectTasks($queryBuilder, $order);



            $data = array(
                "status" => "success",
                'code'  => 200,
                'total_items_count'   => count($tasks),
                'data' => $tasks

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

    public function getEmployeeForAllocationAction(Request $request) {


        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);
        $json= urldecode($request->get('json', null));
        $params = json_decode($json);

        $jwt = $this->get(JwtAuth::class);

        $id = $this->getEnitityId($params->id);
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->createQueryBuilder();
        $task = $em->getRepository('BackendBundle:Task')->find($id);

        $employees = $em->getRepository('BackendBundle:Task')->findEmployeeForTask($queryBuilder, $task, $jwt, $em);


        return $helpers->json($employees);

    }

    public function archiveTaskAction(Request $request)
    {

        $helpers = $this->get(Helpers::class);
        $json = urldecode($request->get('json', null));
        $params = json_decode($json);
        $token = $request->get('authorisation', null);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {
            $id = $this->getEnitityId($params->id);

            $em = $this->getDoctrine()->getManager();
            $task = $em->getRepository('BackendBundle:Task')->find($id);

            if($task) {
                $task->setArchived($params->archived);
                $em->persist($task);
                $em->flush();
                $data = array(
                    'status' => "success",
                    'code' => 200,
                    'msg' => 'Task is Successfully Archived!!!',
                    'task' => $task
                );
            } else {
                $data = $this->error;
            }


        } else {
            $data = $this->accessError;
        }

        return $helpers->json($data);
    }

    public function getAllTaskByClientAction(Request $request) {
        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);
        $clientId = $request->get('clientId', null);
        $date = $request->get('date', null);
        $date = new \DateTime($date);

        if($this->isAuthenticated($token) && $this->isAdmin($token)) {
            $clientRealId = $this->getEnitityId($clientId);
            $em = $this->getDoctrine()->getManager();



            $projects = $em->getRepository('BackendBundle:Project')->findBy(array('client'=>$clientRealId));
            $orders = array();

            foreach($projects as $project) {
                $queryOrders = $em->getRepository('BackendBundle:Order')->findBy(array('project'=>$this->getEnitityId($project->getId())));
                array_push($orders, $queryOrders);
            }
            $tasks = array();

            foreach ($orders as $order) {
                if(is_array($order)) {
                    foreach ($order as $o) {
                        $queryTasks = $em->getRepository('BackendBundle:Task')->findOrderTasksByDate($em, $o, $date);
                        if(is_array($queryTasks)){
                            foreach ($queryTasks as $task) {
                                array_push($tasks, $task);
                            }
                        }
                    }
                }else {
                    $queryTasks = $em->getRepository('BackendBundle:Task')->findBy(array('order'=>$this->getEnitityId($o->getId())));
                    if(is_array($queryTasks)){
                        foreach ($queryTasks as $task) {
                            array_push($tasks, $task);
                        }
                    }
                }
            }




            $data = array(
                "status" => "success",
                'code'  => 200,
                'total_items_count' => count($tasks),
                'data' => $tasks

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