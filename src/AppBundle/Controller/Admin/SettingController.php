<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/11/2017
 * Time: 8:15 PM
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Services\Helpers;
use BackendBundle\Entity\Admin;
use BackendBundle\Entity\SkillCompetencyList;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use BackendBundle\Entity\Employee;


class SettingController extends AAdmin
{
    private $error = array();

    public function addSkillCompetencyAction(Request $request) {
        $this->entity = new SkillCompetencyList();
        return parent::newAction($request);
    }
    public function skillCompetencyListAction (Request $request) {
        $this->entity = new SkillCompetencyList();

        $helpers = $this->get(Helpers::class);
        $token = $request->get('authorisation', null);
        $filters = urldecode($request->get('filters', null));
        $filterParams = json_decode($filters);



        if($this->isAuthenticated($token) && $this->isAdmin($token)) {

            $entity = $this->entity;

            $em = $this->getDoctrine()->getManager();

            $entityName = $this->entity->getEntityClassName();


            $result = $em->getRepository('BackendBundle:'.$entityName)->findBy(array(),array('name' => 'ASC'));




            $data = array(
                "status" => "success",
                'code'  => 200,
                'data' => $result

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
    public function editSkillCompetencyAction (Request $request) {
        $this->entity = new SkillCompetencyList();
        return parent::editAction($request);
    }


}