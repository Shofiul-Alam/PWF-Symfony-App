<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        // default_index
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\DefaultController::indexAction',  '_route' => 'default_index',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_default_index;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'default_index'));
            }

            if (!in_array($canonicalMethod, array('GET'))) {
                $allow = array_merge($allow, array('GET'));
                goto not_default_index;
            }

            return $ret;
        }
        not_default_index:

        // default_login
        if ('/login' === $pathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\DefaultController::loginAction',  '_route' => 'default_login',);
            if (!in_array($requestMethod, array('POST'))) {
                $allow = array_merge($allow, array('POST'));
                goto not_default_login;
            }

            return $ret;
        }
        not_default_login:

        // default_api
        if ('/api' === $pathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\DefaultController::apiAction',  '_route' => 'default_api',);
            if (!in_array($canonicalMethod, array('GET'))) {
                $allow = array_merge($allow, array('GET'));
                goto not_default_api;
            }

            return $ret;
        }
        not_default_api:

        if (0 === strpos($pathinfo, '/admin')) {
            // admin_new
            if ('/admin/add' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManagementController::newAction',  '_route' => 'admin_new',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_new;
                }

                return $ret;
            }
            not_admin_new:

            // admin_list
            if ('/admin/list' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManagementController::listAction',  '_route' => 'admin_list',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_list;
                }

                return $ret;
            }
            not_admin_list:

            // admin_edit
            if ('/admin/edit' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManagementController::editAction',  '_route' => 'admin_edit',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_edit;
                }

                return $ret;
            }
            not_admin_edit:

            // admin_profile
            if ('/admin/profile' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManagementController::profileAction',  '_route' => 'admin_profile',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_profile;
                }

                return $ret;
            }
            not_admin_profile:

        }

        // default_token
        if ('/token' === $pathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\DefaultController::tokenAction',  '_route' => 'default_token',);
            if (!in_array($requestMethod, array('POST'))) {
                $allow = array_merge($allow, array('POST'));
                goto not_default_token;
            }

            return $ret;
        }
        not_default_token:

        if (0 === strpos($pathinfo, '/task')) {
            // task_new
            if ('/task/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\TaskController::newAction',  '_route' => 'task_new',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_task_new;
                }

                return $ret;
            }
            not_task_new:

            // task_edit
            if (0 === strpos($pathinfo, '/task/edit') && preg_match('#^/task/edit(?:/(?P<id>[^/]++))?$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'task_edit')), array (  '_controller' => 'AppBundle\\Controller\\Staff\\TaskController::newAction',  'id' => NULL,));
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_task_edit;
                }

                return $ret;
            }
            not_task_edit:

            // task_list
            if ('/task/list' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\TaskController::tasksAction',  '_route' => 'task_list',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_task_list;
                }

                return $ret;
            }
            not_task_list:

            // task_detail
            if (0 === strpos($pathinfo, '/task/detail') && preg_match('#^/task/detail(?:/(?P<id>[^/]++))?$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'task_detail')), array (  '_controller' => 'AppBundle\\Controller\\Staff\\TaskController::taskAction',  'id' => NULL,));
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_task_detail;
                }

                return $ret;
            }
            not_task_detail:

            // task_serach
            if (0 === strpos($pathinfo, '/task/search') && preg_match('#^/task/search(?:/(?P<search>[^/]++))?$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'task_serach')), array (  '_controller' => 'AppBundle\\Controller\\Staff\\TaskController::searchAction',  'search' => NULL,));
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_task_serach;
                }

                return $ret;
            }
            not_task_serach:

            // task_remove
            if (0 === strpos($pathinfo, '/task/remove') && preg_match('#^/task/remove(?:/(?P<id>[^/]++))?$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'task_remove')), array (  '_controller' => 'AppBundle\\Controller\\Staff\\TaskController::removeAction',  'id' => NULL,));
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_task_remove;
                }

                return $ret;
            }
            not_task_remove:

        }

        // default_upload
        if ('/upload' === $pathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\DefaultController::uploadAction',  '_route' => 'default_upload',);
            if (!in_array($requestMethod, array('POST'))) {
                $allow = array_merge($allow, array('POST'));
                goto not_default_upload;
            }

            return $ret;
        }
        not_default_upload:

        if (0 === strpos($pathinfo, '/user')) {
            // user_new
            if ('/user/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\UserController::newAction',  '_route' => 'user_new',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_user_new;
                }

                return $ret;
            }
            not_user_new:

            // user_edit
            if ('/user/edit' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\UserController::editAction',  '_route' => 'user_edit',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_user_edit;
                }

                return $ret;
            }
            not_user_edit:

            // user_profile
            if ('/user/profile' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\UserController::profileAction',  '_route' => 'user_profile',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_user_profile;
                }

                return $ret;
            }
            not_user_profile:

            // user_password_update
            if ('/user/update-password' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\UserController::updatePasswordAction',  '_route' => 'user_password_update',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_user_password_update;
                }

                return $ret;
            }
            not_user_password_update:

            // user_email_update
            if ('/user/update-email' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\UserController::updateEmailAction',  '_route' => 'user_email_update',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_user_email_update;
                }

                return $ret;
            }
            not_user_email_update:

        }

        elseif (0 === strpos($pathinfo, '/employee')) {
            if (0 === strpos($pathinfo, '/employee-')) {
                if (0 === strpos($pathinfo, '/employee-category')) {
                    // employeeCategory_new
                    if ('/employee-category/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeCategoryController::newAction',  '_route' => 'employeeCategory_new',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employeeCategory_new;
                        }

                        return $ret;
                    }
                    not_employeeCategory_new:

                    // employeeCategory_list
                    if ('/employee-category/list' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeCategoryController::listAction',  '_route' => 'employeeCategory_list',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employeeCategory_list;
                        }

                        return $ret;
                    }
                    not_employeeCategory_list:

                    // employeeCategory_edit
                    if ('/employee-category/edit' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeCategoryController::editAction',  '_route' => 'employeeCategory_edit',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employeeCategory_edit;
                        }

                        return $ret;
                    }
                    not_employeeCategory_edit:

                    // employeeCategory_delete
                    if ('/employee-category/delete' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeCategoryController::deleteAction',  '_route' => 'employeeCategory_delete',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employeeCategory_delete;
                        }

                        return $ret;
                    }
                    not_employeeCategory_delete:

                }

                elseif (0 === strpos($pathinfo, '/employee-order-category')) {
                    // employeeOrderCategory_new
                    if ('/employee-order-category/new' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeOrderCategroyController::newAction',  '_route' => 'employeeOrderCategory_new',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employeeOrderCategory_new;
                        }

                        return $ret;
                    }
                    not_employeeOrderCategory_new:

                    // employeeOrderCategory_list
                    if ('/employee-order-category/list' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeOrderCategroyController::listAction',  '_route' => 'employeeOrderCategory_list',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employeeOrderCategory_list;
                        }

                        return $ret;
                    }
                    not_employeeOrderCategory_list:

                    // employeeOrderCategory_edit
                    if ('/employee-order-category/edit' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeOrderCategroyController::editAction',  '_route' => 'employeeOrderCategory_edit',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employeeOrderCategory_edit;
                        }

                        return $ret;
                    }
                    not_employeeOrderCategory_edit:

                    // employeeOrderCategory_delete
                    if ('/employee-order-category/delete' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeOrderCategroyController::deleteAction',  '_route' => 'employeeOrderCategory_delete',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employeeOrderCategory_delete;
                        }

                        return $ret;
                    }
                    not_employeeOrderCategory_delete:

                }

                elseif (0 === strpos($pathinfo, '/employee-allocations')) {
                    if (0 === strpos($pathinfo, '/employee-allocations/a')) {
                        // employee_allocations
                        if ('/employee-allocations/all' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\AllocationController::getEmployeeAllocationsAction',  '_route' => 'employee_allocations',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_employee_allocations;
                            }

                            return $ret;
                        }
                        not_employee_allocations:

                        // employee_accepted_allocations
                        if ('/employee-allocations/accepted' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\AllocationController::getEmployeeAcceptedAllocationsAction',  '_route' => 'employee_accepted_allocations',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_employee_accepted_allocations;
                            }

                            return $ret;
                        }
                        not_employee_accepted_allocations:

                        // employee_accept_allocation
                        if ('/employee-allocations/accept-allocation' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\AllocationController::acceptAllocationAction',  '_route' => 'employee_accept_allocation',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_employee_accept_allocation;
                            }

                            return $ret;
                        }
                        not_employee_accept_allocation:

                    }

                    // employee_pending_allocations
                    if ('/employee-allocations/pending' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\AllocationController::getEmployeePendingAllocationsAction',  '_route' => 'employee_pending_allocations',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_pending_allocations;
                        }

                        return $ret;
                    }
                    not_employee_pending_allocations:

                    // employee_deny_allocation
                    if ('/employee-allocations/deny-allocation' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\AllocationController::denyAllocationAction',  '_route' => 'employee_deny_allocation',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_deny_allocation;
                        }

                        return $ret;
                    }
                    not_employee_deny_allocation:

                    // employee_allocation_member
                    if ('/employee-allocations/member' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\AllocationController::getAllocationMembersAction',  '_route' => 'employee_allocation_member',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_allocation_member;
                        }

                        return $ret;
                    }
                    not_employee_allocation_member:

                }

                elseif (0 === strpos($pathinfo, '/employee-induction')) {
                    // employee_induction_form
                    if ('/employee-induction/all' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\InductionController::getInductionAction',  '_route' => 'employee_induction_form',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_induction_form;
                        }

                        return $ret;
                    }
                    not_employee_induction_form:

                    // employee_induction_save_data
                    if ('/employee-induction/save-data' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\InductionController::saveInductionDataAction',  '_route' => 'employee_induction_save_data',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_induction_save_data;
                        }

                        return $ret;
                    }
                    not_employee_induction_save_data:

                    // employee_submitted_induction
                    if ('/employee-induction/submitted-inductions' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\InductionController::getEmployeeSubmittedInductionsAction',  '_route' => 'employee_submitted_induction',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_submitted_induction;
                        }

                        return $ret;
                    }
                    not_employee_submitted_induction:

                    // employee_update_induction
                    if ('/employee-induction/update-data' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\InductionController::updateInductionDataAction',  '_route' => 'employee_update_induction',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_update_induction;
                        }

                        return $ret;
                    }
                    not_employee_update_induction:

                    // employee_upload_induction
                    if ('/employee-induction/upload-induction' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\InductionController::uploadEmployeeInductionAction',  '_route' => 'employee_upload_induction',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_upload_induction;
                        }

                        return $ret;
                    }
                    not_employee_upload_induction:

                }

                elseif (0 === strpos($pathinfo, '/employee-s')) {
                    if (0 === strpos($pathinfo, '/employee-skill')) {
                        // employee_skill_competency_doc_add
                        if ('/employee-skill/add-document' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeSkillCompetencyDocumentController::addSkillCompetencyAction',  '_route' => 'employee_skill_competency_doc_add',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_employee_skill_competency_doc_add;
                            }

                            return $ret;
                        }
                        not_employee_skill_competency_doc_add:

                        // employee_skill_competency_doc_edit
                        if ('/employee-skill/edit-document' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeSkillCompetencyDocumentController::updateSkillCompetencyAction',  '_route' => 'employee_skill_competency_doc_edit',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_employee_skill_competency_doc_edit;
                            }

                            return $ret;
                        }
                        not_employee_skill_competency_doc_edit:

                        // employee_skill_competency_doc_delete
                        if ('/employee-skill/delete-document' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeSkillCompetencyDocumentController::deleteSkillCompetencyAction',  '_route' => 'employee_skill_competency_doc_delete',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_employee_skill_competency_doc_delete;
                            }

                            return $ret;
                        }
                        not_employee_skill_competency_doc_delete:

                        // employee_skill_list_for_employee
                        if ('/employee-skill/list' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeSkillCompetencyDocumentController::getSkillListAction',  '_route' => 'employee_skill_list_for_employee',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_employee_skill_list_for_employee;
                            }

                            return $ret;
                        }
                        not_employee_skill_list_for_employee:

                    }

                    // employee_site_arrival_add
                    if ('/employee-site-arrival/add-site-arrival' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\SiteArrivalController::addSiteArrivalAction',  '_route' => 'employee_site_arrival_add',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_site_arrival_add;
                        }

                        return $ret;
                    }
                    not_employee_site_arrival_add:

                    // employee_site_arrival_find
                    if ('/employee-site-arrival/find-site-arrival' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\SiteArrivalController::getSiteArrivalByIdAction',  '_route' => 'employee_site_arrival_find',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_site_arrival_find;
                        }

                        return $ret;
                    }
                    not_employee_site_arrival_find:

                }

                elseif (0 === strpos($pathinfo, '/employee-timesheet')) {
                    // employee_timesheet_add
                    if ('/employee-timesheet/add' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\TimeSheetController::uploadTimeSheetAction',  '_route' => 'employee_timesheet_add',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_timesheet_add;
                        }

                        return $ret;
                    }
                    not_employee_timesheet_add:

                    // employee_timesheet_delete
                    if ('/employee-timesheet/archive' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\TimeSheetController::archiveTimeSheetAction',  '_route' => 'employee_timesheet_delete',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_timesheet_delete;
                        }

                        return $ret;
                    }
                    not_employee_timesheet_delete:

                    // employee_timesheet_edit
                    if ('/employee-timesheet/edit' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\TimeSheetController::updateTimeSheetAction',  '_route' => 'employee_timesheet_edit',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_timesheet_edit;
                        }

                        return $ret;
                    }
                    not_employee_timesheet_edit:

                    // employee_timesheet_employee
                    if ('/employee-timesheet/list' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\TimeSheetController::allTimeSheetAction',  '_route' => 'employee_timesheet_employee',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_timesheet_employee;
                        }

                        return $ret;
                    }
                    not_employee_timesheet_employee:

                }

                // position_list
                if ('/employee-position/list' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\JobController::listAction',  '_route' => 'position_list',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_position_list;
                    }

                    return $ret;
                }
                not_position_list:

                if (0 === strpos($pathinfo, '/employee-form')) {
                    // employee_form
                    if ('/employee-form/list' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\FormController::getFormsAction',  '_route' => 'employee_form',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_form;
                        }

                        return $ret;
                    }
                    not_employee_form:

                    // employee_save_form
                    if ('/employee-form/save-data' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\FormController::saveFormAction',  '_route' => 'employee_save_form',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_save_form;
                        }

                        return $ret;
                    }
                    not_employee_save_form:

                    // employee_submitted_forms
                    if ('/employee-form/submitted-forms' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\FormController::getSubmittedFormsAction',  '_route' => 'employee_submitted_forms',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_submitted_forms;
                        }

                        return $ret;
                    }
                    not_employee_submitted_forms:

                    // employee_update_form
                    if ('/employee-form/update-data' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\FormController::updateFormDataAction',  '_route' => 'employee_update_form',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_update_form;
                        }

                        return $ret;
                    }
                    not_employee_update_form:

                }

            }

            // employee_new
            if ('/employee/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeController::newAction',  '_route' => 'employee_new',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_employee_new;
                }

                return $ret;
            }
            not_employee_new:

            // employee_list
            if ('/employee/list' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeController::listAction',  '_route' => 'employee_list',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_employee_list;
                }

                return $ret;
            }
            not_employee_list:

            // employee_edit
            if ('/employee/edit' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeController::editAction',  '_route' => 'employee_edit',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_employee_edit;
                }

                return $ret;
            }
            not_employee_edit:

            // employee_single_employee_documents
            if ('/employee/employee-documents' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeController::getSkillCompetencyDocumentsAction',  '_route' => 'employee_single_employee_documents',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_employee_single_employee_documents;
                }

                return $ret;
            }
            not_employee_single_employee_documents:

            // employee_addCompetency
            if ('/employee/add-skill-competency' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeController::addCompitencyAction',  '_route' => 'employee_addCompetency',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_employee_addCompetency;
                }

                return $ret;
            }
            not_employee_addCompetency:

            // employee_single_employee_delete-qualification
            if ('/employee/delete-document' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\EmployeeController::deleteEmployeeDocAction',  '_route' => 'employee_single_employee_delete-qualification',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_employee_single_employee_deletequalification;
                }

                return $ret;
            }
            not_employee_single_employee_deletequalification:

        }

        elseif (0 === strpos($pathinfo, '/client')) {
            // client_new
            if ('/client/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\ClientController::newAction',  '_route' => 'client_new',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_client_new;
                }

                return $ret;
            }
            not_client_new:

            // client_list
            if ('/client/list' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\ClientController::listAction',  '_route' => 'client_list',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_client_list;
                }

                return $ret;
            }
            not_client_list:

            // client_edit
            if ('/client/edit' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\ClientController::editAction',  '_route' => 'client_edit',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_client_edit;
                }

                return $ret;
            }
            not_client_edit:

        }

        elseif (0 === strpos($pathinfo, '/project')) {
            // project_new
            if ('/project/new' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\ProjectController::newAction',  '_route' => 'project_new',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_project_new;
                }

                return $ret;
            }
            not_project_new:

            // project_list
            if ('/project/list' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\ProjectController::listAction',  '_route' => 'project_list',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_project_list;
                }

                return $ret;
            }
            not_project_list:

            // project_edit
            if ('/project/edit' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Staff\\ProjectController::editAction',  '_route' => 'project_edit',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_project_edit;
                }

                return $ret;
            }
            not_project_edit:

        }

        // manage_permission_employee_induction
        if ('/permissions/induction-permission' === $pathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManagePermissionController::inductionPermissionAction',  '_route' => 'manage_permission_employee_induction',);
            if (!in_array($requestMethod, array('POST'))) {
                $allow = array_merge($allow, array('POST'));
                goto not_manage_permission_employee_induction;
            }

            return $ret;
        }
        not_manage_permission_employee_induction:

        if (0 === strpos($pathinfo, '/manage-')) {
            if (0 === strpos($pathinfo, '/manage-employee')) {
                if (0 === strpos($pathinfo, '/manage-employee/a')) {
                    if (0 === strpos($pathinfo, '/manage-employee/add')) {
                        // manage_employee_add
                        if ('/manage-employee/add' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::newAction',  '_route' => 'manage_employee_add',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_manage_employee_add;
                            }

                            return $ret;
                        }
                        not_manage_employee_add:

                        // manage_employee_add_skill_doc
                        if ('/manage-employee/add-skill-competency-doc' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::addSkillCompetencyAction',  '_route' => 'manage_employee_add_skill_doc',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_manage_employee_add_skill_doc;
                            }

                            return $ret;
                        }
                        not_manage_employee_add_skill_doc:

                        // manage_employee_add_induction_doc
                        if ('/manage-employee/add-induction-doc' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::uploadInductionAction',  '_route' => 'manage_employee_add_induction_doc',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_manage_employee_add_induction_doc;
                            }

                            return $ret;
                        }
                        not_manage_employee_add_induction_doc:

                    }

                    // manage_employee_archive
                    if ('/manage-employee/archive-employee' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::archiveEmployeeAction',  '_route' => 'manage_employee_archive',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_manage_employee_archive;
                        }

                        return $ret;
                    }
                    not_manage_employee_archive:

                    // employee_archived_employee_list
                    if ('/manage-employee/archived-employees' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::archiveEmployeeListAction',  '_route' => 'employee_archived_employee_list',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_archived_employee_list;
                        }

                        return $ret;
                    }
                    not_employee_archived_employee_list:

                    // manage_employee_approve
                    if ('/manage-employee/approve-employee' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::approveEmployeeAction',  '_route' => 'manage_employee_approve',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_manage_employee_approve;
                        }

                        return $ret;
                    }
                    not_manage_employee_approve:

                }

                // manage_employee_list
                if ('/manage-employee/list' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::listAction',  '_route' => 'manage_employee_list',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_employee_list;
                    }

                    return $ret;
                }
                not_manage_employee_list:

                if (0 === strpos($pathinfo, '/manage-employee/e')) {
                    if (0 === strpos($pathinfo, '/manage-employee/edit')) {
                        // manage_employee_edit
                        if ('/manage-employee/edit' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::editAction',  '_route' => 'manage_employee_edit',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_manage_employee_edit;
                            }

                            return $ret;
                        }
                        not_manage_employee_edit:

                        // manage_employee_edit_doc
                        if ('/manage-employee/edit-employee-doc' === $pathinfo) {
                            $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::editEmployeeDocAction',  '_route' => 'manage_employee_edit_doc',);
                            if (!in_array($requestMethod, array('POST'))) {
                                $allow = array_merge($allow, array('POST'));
                                goto not_manage_employee_edit_doc;
                            }

                            return $ret;
                        }
                        not_manage_employee_edit_doc:

                    }

                    // manage_employee_documents
                    if ('/manage-employee/employee-documents' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::employeeAllDocumentsAction',  '_route' => 'manage_employee_documents',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_manage_employee_documents;
                        }

                        return $ret;
                    }
                    not_manage_employee_documents:

                    // employee_by_id
                    if ('/manage-employee/employee-by-id' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::getEmployeeByIdAction',  '_route' => 'employee_by_id',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_employee_by_id;
                        }

                        return $ret;
                    }
                    not_employee_by_id:

                }

                // manage_employee_delete_doc
                if ('/manage-employee/delete-employee-doc' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::deleteEmployeeDocAction',  '_route' => 'manage_employee_delete_doc',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_employee_delete_doc;
                    }

                    return $ret;
                }
                not_manage_employee_delete_doc:

                // manage_employee_unarchive
                if ('/manage-employee/unarchive-employee' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::unArchiveEmployeeAction',  '_route' => 'manage_employee_unarchive',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_employee_unarchive;
                    }

                    return $ret;
                }
                not_manage_employee_unarchive:

                // manage_employee_update_document
                if ('/manage-employee/update-employee-doc' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::updateEmployeeDocAction',  '_route' => 'manage_employee_update_document',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_employee_update_document;
                    }

                    return $ret;
                }
                not_manage_employee_update_document:

                // employee_sort
                if ('/manage-employee/sort-employee' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::sortEmployeeAction',  '_route' => 'employee_sort',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_employee_sort;
                    }

                    return $ret;
                }
                not_employee_sort:

                // employee_filter
                if ('/manage-employee/filter-employee' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::filterEmployeeAction',  '_route' => 'employee_filter',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_employee_filter;
                    }

                    return $ret;
                }
                not_employee_filter:

            }

            elseif (0 === strpos($pathinfo, '/manage-client')) {
                if (0 === strpos($pathinfo, '/manage-client/add')) {
                    // manage_client_add
                    if ('/manage-client/add' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageClientController::newAction',  '_route' => 'manage_client_add',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_manage_client_add;
                        }

                        return $ret;
                    }
                    not_manage_client_add:

                    // manage_add_client_doc
                    if ('/manage-client/add-client-doc' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageEmployeeController::addClientDocumentAction',  '_route' => 'manage_add_client_doc',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_manage_add_client_doc;
                        }

                        return $ret;
                    }
                    not_manage_add_client_doc:

                }

                // manage_archive_client
                if ('/manage-client/archive-client' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageClientController::archiveClientAction',  '_route' => 'manage_archive_client',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_archive_client;
                    }

                    return $ret;
                }
                not_manage_archive_client:

                // manage_client_list
                if ('/manage-client/list' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageClientController::listAction',  '_route' => 'manage_client_list',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_client_list;
                    }

                    return $ret;
                }
                not_manage_client_list:

                // manage_client_edit
                if ('/manage-client/edit' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageClientController::editAction',  '_route' => 'manage_client_edit',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_client_edit;
                    }

                    return $ret;
                }
                not_manage_client_edit:

                // manage_client_contacts
                if ('/manage-client/contacts' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageClientController::clientContactsAction',  '_route' => 'manage_client_contacts',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_client_contacts;
                    }

                    return $ret;
                }
                not_manage_client_contacts:

            }

            elseif (0 === strpos($pathinfo, '/manage-contact')) {
                // manage_contact_add
                if ('/manage-contact/add' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageContactController::newAction',  '_route' => 'manage_contact_add',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_contact_add;
                    }

                    return $ret;
                }
                not_manage_contact_add:

                // manage_contact_list
                if ('/manage-contact/list' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageContactController::listAction',  '_route' => 'manage_contact_list',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_contact_list;
                    }

                    return $ret;
                }
                not_manage_contact_list:

                // manage_contact_edit
                if ('/manage-contact/edit' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageContactController::editAction',  '_route' => 'manage_contact_edit',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_contact_edit;
                    }

                    return $ret;
                }
                not_manage_contact_edit:

            }

            elseif (0 === strpos($pathinfo, '/manage-project')) {
                // manage_project_add
                if ('/manage-project/add' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageProjectController::newAction',  '_route' => 'manage_project_add',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_project_add;
                    }

                    return $ret;
                }
                not_manage_project_add:

                // manage_archive_project
                if ('/manage-project/archive-project' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageProjectController::archiveProjectAction',  '_route' => 'manage_archive_project',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_archive_project;
                    }

                    return $ret;
                }
                not_manage_archive_project:

                // manage_project_list
                if ('/manage-project/list' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageProjectController::listAction',  '_route' => 'manage_project_list',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_project_list;
                    }

                    return $ret;
                }
                not_manage_project_list:

                // manage_project_edit
                if ('/manage-project/edit' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageProjectController::editAction',  '_route' => 'manage_project_edit',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_project_edit;
                    }

                    return $ret;
                }
                not_manage_project_edit:

                // manage_client_projects
                if ('/manage-project/client-projects' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageProjectController::getClientProjectsAction',  '_route' => 'manage_client_projects',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_client_projects;
                    }

                    return $ret;
                }
                not_manage_client_projects:

                // manage_upload_project_doc
                if ('/manage-project/upload-doc' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageProjectController::uploadDocAction',  '_route' => 'manage_upload_project_doc',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_upload_project_doc;
                    }

                    return $ret;
                }
                not_manage_upload_project_doc:

            }

            elseif (0 === strpos($pathinfo, '/manage-order')) {
                // manage_order_add
                if ('/manage-order/add' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageOrderController::newAction',  '_route' => 'manage_order_add',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_order_add;
                    }

                    return $ret;
                }
                not_manage_order_add:

                // manage_archive_order
                if ('/manage-order/archive-order' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageOrderController::archiveOrderAction',  '_route' => 'manage_archive_order',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_archive_order;
                    }

                    return $ret;
                }
                not_manage_archive_order:

                // manage_order_list
                if ('/manage-order/list' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageOrderController::listAction',  '_route' => 'manage_order_list',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_order_list;
                    }

                    return $ret;
                }
                not_manage_order_list:

                // manage_order_edit
                if ('/manage-order/edit' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageOrderController::editAction',  '_route' => 'manage_order_edit',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_order_edit;
                    }

                    return $ret;
                }
                not_manage_order_edit:

                // manage_project_orders
                if ('/manage-order/project-orders' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageOrderController::getProjectOrdersAction',  '_route' => 'manage_project_orders',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_project_orders;
                    }

                    return $ret;
                }
                not_manage_project_orders:

            }

            elseif (0 === strpos($pathinfo, '/manage-job')) {
                // manage_job_add
                if ('/manage-job/add' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageJobController::newAction',  '_route' => 'manage_job_add',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_job_add;
                    }

                    return $ret;
                }
                not_manage_job_add:

                // manage_job_archive
                if ('/manage-job/archive-job' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageJobController::archiveJobAction',  '_route' => 'manage_job_archive',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_job_archive;
                    }

                    return $ret;
                }
                not_manage_job_archive:

                // manage_job_list
                if ('/manage-job/list' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageJobController::listAction',  '_route' => 'manage_job_list',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_job_list;
                    }

                    return $ret;
                }
                not_manage_job_list:

                // manage_job_edit
                if ('/manage-job/edit' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageJobController::editAction',  '_route' => 'manage_job_edit',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_job_edit;
                    }

                    return $ret;
                }
                not_manage_job_edit:

            }

            elseif (0 === strpos($pathinfo, '/manage-task')) {
                // manage_task_add
                if ('/manage-task/add' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTaskController::newAction',  '_route' => 'manage_task_add',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_task_add;
                    }

                    return $ret;
                }
                not_manage_task_add:

                // manage_archive_task
                if ('/manage-task/archive-task' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTaskController::archiveTaskAction',  '_route' => 'manage_archive_task',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_archive_task;
                    }

                    return $ret;
                }
                not_manage_archive_task:

                // manage_task_list
                if ('/manage-task/list' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTaskController::listAction',  '_route' => 'manage_task_list',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_task_list;
                    }

                    return $ret;
                }
                not_manage_task_list:

                // manage_task_edit
                if ('/manage-task/edit' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTaskController::editAction',  '_route' => 'manage_task_edit',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_task_edit;
                    }

                    return $ret;
                }
                not_manage_task_edit:

                // manage_task_employee_alloc
                if ('/manage-task/employees-for-alloction' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTaskController::getEmployeeForAllocationAction',  '_route' => 'manage_task_employee_alloc',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_task_employee_alloc;
                    }

                    return $ret;
                }
                not_manage_task_employee_alloc:

                // manage_get_order_task
                if ('/manage-task/order-tasks' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTaskController::getOrderTasksAction',  '_route' => 'manage_get_order_task',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_get_order_task;
                    }

                    return $ret;
                }
                not_manage_get_order_task:

                // manage_client_all_task
                if ('/manage-task/client-all-task' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTaskController::getAllTaskByClientAction',  '_route' => 'manage_client_all_task',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_client_all_task;
                    }

                    return $ret;
                }
                not_manage_client_all_task:

            }

            elseif (0 === strpos($pathinfo, '/manage-timesheet')) {
                if (0 === strpos($pathinfo, '/manage-timesheet/list')) {
                    // manage_timesheet_list
                    if ('/manage-timesheet/list' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTimeSheetController::listAction',  '_route' => 'manage_timesheet_list',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_manage_timesheet_list;
                        }

                        return $ret;
                    }
                    not_manage_timesheet_list:

                    // manage_timesheet_employee
                    if ('/manage-timesheet/list' === $pathinfo) {
                        $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTimeSheetController::allTimeSheetAction',  '_route' => 'manage_timesheet_employee',);
                        if (!in_array($requestMethod, array('POST'))) {
                            $allow = array_merge($allow, array('POST'));
                            goto not_manage_timesheet_employee;
                        }

                        return $ret;
                    }
                    not_manage_timesheet_employee:

                }

                // manage_timesheet_add
                if ('/manage-timesheet/add' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTimeSheetController::uploadTimeSheetAction',  '_route' => 'manage_timesheet_add',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_timesheet_add;
                    }

                    return $ret;
                }
                not_manage_timesheet_add:

                // manage_timesheet_delete
                if ('/manage-timesheet/archive' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTimeSheetController::archiveTimeSheetAction',  '_route' => 'manage_timesheet_delete',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_timesheet_delete;
                    }

                    return $ret;
                }
                not_manage_timesheet_delete:

                // manage_timesheet_edit
                if ('/manage-timesheet/edit' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageTimeSheetController::updateTimeSheetAction',  '_route' => 'manage_timesheet_edit',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_timesheet_edit;
                    }

                    return $ret;
                }
                not_manage_timesheet_edit:

            }

            elseif (0 === strpos($pathinfo, '/manage-allocation')) {
                // manage_allocations_list
                if ('/manage-allocation/list' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageAllocationController::listAction',  '_route' => 'manage_allocations_list',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_allocations_list;
                    }

                    return $ret;
                }
                not_manage_allocations_list:

                // manage_send_allocations
                if ('/manage-allocation/send-allocations' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageAllocationController::sendAllocationsAction',  '_route' => 'manage_send_allocations',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_send_allocations;
                    }

                    return $ret;
                }
                not_manage_send_allocations:

                // manage_show_notification
                if ('/manage-allocation/show-notifications' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageAllocationController::showNotificationsAction',  '_route' => 'manage_show_notification',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_show_notification;
                    }

                    return $ret;
                }
                not_manage_show_notification:

                // manage_get_allocations
                if ('/manage-allocation/task-allocations' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageAllocationController::getAllocationsForTaskAction',  '_route' => 'manage_get_allocations',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_get_allocations;
                    }

                    return $ret;
                }
                not_manage_get_allocations:

                // manage_get_employees_for_allocations
                if ('/manage-allocation/employees-for-allocations' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageAllocationController::getEmployeesForAllocationAction',  '_route' => 'manage_get_employees_for_allocations',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_get_employees_for_allocations;
                    }

                    return $ret;
                }
                not_manage_get_employees_for_allocations:

                // manage_allocation_by_id
                if ('/manage-allocation/employee-allocation' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageAllocationController::findlAllocationByIdAction',  '_route' => 'manage_allocation_by_id',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_allocation_by_id;
                    }

                    return $ret;
                }
                not_manage_allocation_by_id:

                // manage_find_employees_docs_booked_date
                if ('/manage-allocation/doc-with-booked-in_dates' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageAllocationController::findEmployeeBookDateDocAction',  '_route' => 'manage_find_employees_docs_booked_date',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_find_employees_docs_booked_date;
                    }

                    return $ret;
                }
                not_manage_find_employees_docs_booked_date:

                // manage_all_allocated_dates
                if ('/manage-allocation/all-allocated-dates' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageAllocationController::allAllocatedDatesAction',  '_route' => 'manage_all_allocated_dates',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_all_allocated_dates;
                    }

                    return $ret;
                }
                not_manage_all_allocated_dates:

                // manage_modified_allocation_list
                if ('/manage-allocation/allocation-list' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageAllocationController::modifiedAllocationListAction',  '_route' => 'manage_modified_allocation_list',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_modified_allocation_list;
                    }

                    return $ret;
                }
                not_manage_modified_allocation_list:

                // manage_cancel_allocation
                if ('/manage-allocation/cancel-allocation' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageAllocationController::cancelAllocationAction',  '_route' => 'manage_cancel_allocation',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_cancel_allocation;
                    }

                    return $ret;
                }
                not_manage_cancel_allocation:

            }

            elseif (0 === strpos($pathinfo, '/manage-integration')) {
                // manage_integration_twilio
                if ('/manage-integration/integrate-twilio' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\IntegrationController::integrateTwilioAction',  '_route' => 'manage_integration_twilio',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_integration_twilio;
                    }

                    return $ret;
                }
                not_manage_integration_twilio:

                // manage_twilio_config
                if ('/manage-integration/twilio-config' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\IntegrationController::getTwilioConfigAction',  '_route' => 'manage_twilio_config',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_twilio_config;
                    }

                    return $ret;
                }
                not_manage_twilio_config:

                // manage_update_twilio_config
                if ('/manage-integration/update-twilio-config' === $pathinfo) {
                    $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\IntegrationController::updateTwilioConfigAction',  '_route' => 'manage_update_twilio_config',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_manage_update_twilio_config;
                    }

                    return $ret;
                }
                not_manage_update_twilio_config:

            }

        }

        elseif (0 === strpos($pathinfo, '/setting')) {
            // admin_setting_add_skillCompetency
            if ('/setting/add-skill-competency' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\SettingController::addSkillCompetencyAction',  '_route' => 'admin_setting_add_skillCompetency',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_setting_add_skillCompetency;
                }

                return $ret;
            }
            not_admin_setting_add_skillCompetency:

            // admin_setting_add_job
            if ('/setting/add-job' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\SettingController::createJobAction',  '_route' => 'admin_setting_add_job',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_setting_add_job;
                }

                return $ret;
            }
            not_admin_setting_add_job:

            // admin_setting_edit_skillCompetency
            if ('/setting/edit-skill-competency' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\SettingController::editSkillCompetencyAction',  '_route' => 'admin_setting_edit_skillCompetency',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_setting_edit_skillCompetency;
                }

                return $ret;
            }
            not_admin_setting_edit_skillCompetency:

            // admin_setting_edit_job
            if ('/setting/edit-job' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\SettingController::editJobAction',  '_route' => 'admin_setting_edit_job',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_setting_edit_job;
                }

                return $ret;
            }
            not_admin_setting_edit_job:

            // admin_setting_skillCompetency_list
            if ('/setting/skill-competency-list' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\SettingController::skillCompetencylistAction',  '_route' => 'admin_setting_skillCompetency_list',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_setting_skillCompetency_list;
                }

                return $ret;
            }
            not_admin_setting_skillCompetency_list:

            // admin_setting_all_job
            if ('/setting/job-list' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\SettingController::jobListAction',  '_route' => 'admin_setting_all_job',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_setting_all_job;
                }

                return $ret;
            }
            not_admin_setting_all_job:

            // admin_setting_delete_job
            if ('/setting/delete-job' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\SettingController::deleteJobAction',  '_route' => 'admin_setting_delete_job',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_admin_setting_delete_job;
                }

                return $ret;
            }
            not_admin_setting_delete_job:

        }

        elseif (0 === strpos($pathinfo, '/form')) {
            // manage_form_add
            if ('/form/add' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageFormController::addFormAction',  '_route' => 'manage_form_add',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_form_add;
                }

                return $ret;
            }
            not_manage_form_add:

            // manage_all_submission
            if ('/form/all-submissions' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageFormController::getAllSubmittedFormsAction',  '_route' => 'manage_all_submission',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_all_submission;
                }

                return $ret;
            }
            not_manage_all_submission:

            // manage_all_forms
            if ('/form/forms' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageFormController::getAllFormsAction',  '_route' => 'manage_all_forms',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_all_forms;
                }

                return $ret;
            }
            not_manage_all_forms:

            // manage_save_submission
            if ('/form/save-data' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageFormController::saveFormDataAction',  '_route' => 'manage_save_submission',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_save_submission;
                }

                return $ret;
            }
            not_manage_save_submission:

            // manage_get_form
            if ('/form/get-form' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageFormController::getFormAction',  '_route' => 'manage_get_form',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_get_form;
                }

                return $ret;
            }
            not_manage_get_form:

            // manage_form_update
            if ('/form/update' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageFormController::updateFormAction',  '_route' => 'manage_form_update',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_form_update;
                }

                return $ret;
            }
            not_manage_form_update:

        }

        elseif (0 === strpos($pathinfo, '/induction')) {
            // manage_induction_add
            if ('/induction/add' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageInductionController::newAction',  '_route' => 'manage_induction_add',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_induction_add;
                }

                return $ret;
            }
            not_manage_induction_add:

            // manage_allowed_inductions
            if ('/induction/allowed-inductions' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageInductionController::getAllowedInductionForEmployeeAction',  '_route' => 'manage_allowed_inductions',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_allowed_inductions;
                }

                return $ret;
            }
            not_manage_allowed_inductions:

            // manage_induction_list
            if ('/induction/list' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageInductionController::listAction',  '_route' => 'manage_induction_list',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_induction_list;
                }

                return $ret;
            }
            not_manage_induction_list:

            // manage_induction_edit
            if ('/induction/update' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageInductionController::updateInductionDataAction',  '_route' => 'manage_induction_edit',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_induction_edit;
                }

                return $ret;
            }
            not_manage_induction_edit:

            // manage_all_submitted_induction
            if ('/induction/sumitted-inductions' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageInductionController::getAllSubmittedInductionsAction',  '_route' => 'manage_all_submitted_induction',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_all_submitted_induction;
                }

                return $ret;
            }
            not_manage_all_submitted_induction:

            // manage_save_induction
            if ('/induction/save-data' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageInductionController::saveInductionDataAction',  '_route' => 'manage_save_induction',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_save_induction;
                }

                return $ret;
            }
            not_manage_save_induction:

        }

        elseif (0 === strpos($pathinfo, '/invoice')) {
            // manage_timesheets_from_period
            if ('/invoice/timesheets-in-range' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageInvoiceController::findTimesheetsFromDateRangeAction',  '_route' => 'manage_timesheets_from_period',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_timesheets_from_period;
                }

                return $ret;
            }
            not_manage_timesheets_from_period:

            // manage_employees_have_timesheets
            if ('/invoice/employees-have-timesheets' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageInvoiceController::getEmplopyessHaveTimesheetAction',  '_route' => 'manage_employees_have_timesheets',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_employees_have_timesheets;
                }

                return $ret;
            }
            not_manage_employees_have_timesheets:

            // manage_create_invoice
            if ('/invoice/save' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageInvoiceController::createInvoiceAction',  '_route' => 'manage_create_invoice',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_create_invoice;
                }

                return $ret;
            }
            not_manage_create_invoice:

            // manage_invoice_list
            if ('/invoice/list' === $pathinfo) {
                $ret = array (  '_controller' => 'AppBundle\\Controller\\Admin\\ManageInvoiceController::getAllInvoiceAction',  '_route' => 'manage_invoice_list',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_manage_invoice_list;
                }

                return $ret;
            }
            not_manage_invoice_list:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
