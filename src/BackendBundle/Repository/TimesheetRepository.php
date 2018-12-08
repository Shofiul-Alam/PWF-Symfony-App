<?php
/**
 * Created by Shofiul Alam.
 * User: Shofiul
 * Date: 4/10/2018
 * Time: 4:07 PM
 */

namespace BackendBundle\Repository;

use AppBundle\Entity\TimeSheetFilter;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class TimesheetRepository extends EntityRepository
{
    public function findTimesheetsFromDates(EntityManager $em, $employee, $startDate, $endDate) {


        $queryBuilder = $em->createQueryBuilder();


            $timesheets = $queryBuilder
                ->select("ts")
                ->from('BackendBundle:Timesheet', 'ts')
                ->where('ts.employee = :employee')
                ->andWhere('ts.date >= :startDate')
                ->andWhere('ts.date < :endDate')
                ->andWhere(('SIZE(ts.timesheetHourEntry) > 0'))
//                ->andWhere('ts.approved = 1')
                ->setParameter('startDate', $startDate)
                ->setParameter('endDate', $endDate)
                ->setParameter('employee', $employee)
                ->orderBy("ts.id", "DESC")
                ->getQuery();

            $result = $timesheets->getResult();


        return $result;

    }

    public function findUniqEmployees(EntityManager $em) {
        $queryBuilder = $em->createQueryBuilder();


        $employees = $queryBuilder
            ->select("em.id, em.abnNo, u.firstName, u.lastName, u.mobile, u.email")
            ->from('BackendBundle:Timesheet', 'ts')
            ->join('ts.employee', 'em')
            ->join('em.user', 'u')
            ->distinct()
            ->getQuery();

        $result = $employees->getResult();


        return $result;
    }

    public function searchTimeSheet(\Doctrine\ORM\QueryBuilder $queryBuilder, TimesheetFilter $timeSheetFilter) {

        $queryBuilder
            ->select('t')
            ->from('BackendBundle:TimeSheet', 't');



        if($timeSheetFilter->employee != null){
            $queryBuilder->leftJoin('t.employee', 'te')
                ->andWhere('te.id = :empId')
                ->setParameter('empId', $timeSheetFilter->employee);
        }
        if($timeSheetFilter->startDate != null && $timeSheetFilter->endDate != null){
            $queryBuilder->andWhere('t.date >= :startDate')
                ->andWhere('t.date < :endDate')
                ->setParameter('startDate', $timeSheetFilter->startDate)
                ->setParameter('endDate', $timeSheetFilter->endDate);

        }
        if($timeSheetFilter->approved !=null){
            $queryBuilder->andWhere('t.approved = :approved')
                ->setParameter('approved', $timeSheetFilter->approved);
        }



        if($timeSheetFilter->client != null || $timeSheetFilter->project != null || $timeSheetFilter->order != null || $timeSheetFilter->task != null) {
            $queryBuilder->leftJoin('t.allocatedDates', 'tad')
                ->leftJoin('tad.employeeAllocation', 'tal')
                ->leftJoin('tal.task', 'tsk')
                ->leftJoin('tsk.order', 'to')
                ->leftJoin('to.project', 'tp')
                ->leftJoin('tp.client', 'tc');

            if($timeSheetFilter->client != null ) {
                $queryBuilder->andWhere('tc.id = :client')
                    ->setParameter('client', $timeSheetFilter->client);
            }
            if($timeSheetFilter->project != null ) {
                $queryBuilder->andwhere('tp.id = :project')
                    ->setParameter('project', $timeSheetFilter->project);
            }
            if($timeSheetFilter->order != null ) {
                $queryBuilder->andWhere('to.id =:order')
                    ->setParameter('order', $timeSheetFilter->order);
            }
            if($timeSheetFilter->task != null ) {
                $queryBuilder->andWhere('tsk.id =:task')
                    ->setParameter('task', $timeSheetFilter->task);
            }
        }

        return $queryBuilder->getQuery();
    }
}