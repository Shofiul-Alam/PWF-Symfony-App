<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/11/2017
 * Time: 8:15 PM
 */

namespace AppBundle\Controller\Staff;

use AppBundle\Controller\Core\AEmployeeController;
use AppBundle\Services\Helpers;
use BackendBundle\BackendBundle;
use BackendBundle\Entity\Job;
use Symfony\Component\HttpFoundation\Request;


class JobController extends AEmployeeController
{
    private $error = array();



    public function listAction(Request $request)
    {

        $this->entity = new Job();

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);


        if($this->isAuthenticated($token)) {


            $em = $this->getDoctrine()->getManager();

            $entityName = $this->entity->getEntityClassName();

            $allPositions = $em->getRepository('BackendBundle:'.$entityName)->findBy(array("archived" => 0));



            $data = array(
                "status" => "success",
                'code'  => 200,
                'data' => $allPositions

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