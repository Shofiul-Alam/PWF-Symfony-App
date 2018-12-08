<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/11/2017
 * Time: 10:21 AM
 */

namespace AppBundle\Controller\Staff;


use AppBundle\Controller\Core\AEmployeeController;
use AppBundle\Services\Helpers;
use BackendBundle\Entity\Employee;
use BackendBundle\Entity\EmployeeInduction;
use BackendBundle\Entity\Field;
use BackendBundle\Entity\Form;
use BackendBundle\Entity\Induction;
use BackendBundle\Entity\User;
use BackendBundle\Entity\UserInductionData;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use BackendBundle\Entity\Client;
use AppBundle\Controller\UserController;

class FormController extends AEmployeeController
{
    private $error = array();

    public function getFormsAction(Request $request)
    {

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', false);


        if($this->isAuthenticated($token)) {
            $create = true;
            $identity = $this->getIdentity($request);


            $em = $this->getDoctrine()->getManager();
            $forms = $em->getRepository('BackendBundle:Form')->findBy(array('id' => 20));


//            $forms = array();
//
//            if(count($inductions) > 0) {
//                foreach($inductions as $induction) {
//
//                    array_push($inductionArr, $induction);
//                }
//            }



            $data = array(
                'status' => "success",
                'code' => 200,
                'msg' => ' All Accessable Forms!!!',
                'data' => $forms
            );

        } else {
            $data = array_merge($this->duplicateError, array(
                'error_data' => $this->error
            ));
        }


        return $helpers->json($data);


    }





}