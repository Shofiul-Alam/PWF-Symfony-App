<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/2/18
 * Time: 12:27 PM
 */
namespace BackendBundle\Repository;

use AppBundle\Entity\EmployeeFilter;
use Doctrine\ORM\EntityRepository;

class EmployeeRepository extends EntityRepository
{




    public function findClientProject(\Doctrine\ORM\QueryBuilder $queryBuilder, $client)
    {

        $query = $queryBuilder
                    ->select('p')
                    ->from('BackendBundle:Project', 'p')
                    ->andwhere('p.client = :cl')
                    ->andWhere('p.archived = 0')
                    ->orderBy('p.projectUpdated', 'DESC')
                    ->setParameter('cl', $client);

        $result = $query->getQuery()->getResult();
        return $result;
    }

    public function sortEmployeeByUserProp(\Doctrine\ORM\QueryBuilder $queryBuilder, $key, $orderBy)
    {
        $select = 'u.'.$key;
        $query = $queryBuilder
            ->select('e')
            ->from('BackendBundle:Employee', 'e')
            ->leftJoin('e.user', 'u')
            ->orderBy($select, $orderBy);

//        $result = $query->getQuery()->getResult();
        return $query->getQuery();
    }
    public function filterEmployee(\Doctrine\ORM\QueryBuilder $queryBuilder, EmployeeFilter $employeeFilter) {

       $queryBuilder
            ->select('e')
            ->from('BackendBundle:Employee', 'e');

        if($employeeFilter->firstName != null || $employeeFilter->lastName != null || $employeeFilter->email != null) {
            $queryBuilder->leftJoin('e.user', 'u');

            if($employeeFilter->firstName != null ) {
                $queryBuilder->where('u.firstName =:fName')
                            ->setParameter('fName', $employeeFilter->firstName);
            }
            if($employeeFilter->lastName != null ) {
                $queryBuilder->where('u.lastName =:lName')
                    ->setParameter('lName', $employeeFilter->lastName);
            }
            if($employeeFilter->email != null ) {
                $queryBuilder->where('u.email =:email')
                    ->setParameter('email', $employeeFilter->email);
            }
        }

        if($employeeFilter->positionName != null){
            $queryBuilder->andWhere('e.positionName = :position')
                         ->setParameter('position', $employeeFilter->positionName);

        }
        if($employeeFilter->approved != null){
            $queryBuilder->andWhere('e.approved = :approved')
                ->setParameter('approved', $employeeFilter->approved);

        }
        if($employeeFilter->orderBy !=null){
            $queryBuilder->orderBy('u.firstName', $employeeFilter->orderBy);
        }

        return $queryBuilder->getQuery();
    }

}