<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'home/auth_login';
$route['logout'] = 'home/logout';
$route['access_denied'] = 'home/access_denied';
$route['error_404'] = 'home/error_404';
$route['timestamp'] = 'home/timestamp';

$route['bank'] = 'hr_configuration/bank';
$route['add_bank'] = 'hr_configuration/add_bank';
$route['update_bank'] = 'hr_configuration/update_bank';

$route['pension'] = 'hr_configuration/pension';
$route['add_pension'] = 'hr_configuration/add_pension';
$route['update_pension'] = 'hr_configuration/update_pension';

$route['health_insurance'] = 'hr_configuration/health_insurance';
$route['add_health_insurance'] = 'hr_configuration/add_health_insurance';
$route['update_health_insurance'] = 'hr_configuration/update_health_insurance';

$route['test'] = 'hr_configuration/test';

$route['location'] = 'hr_configuration/location';
$route['add_location'] = 'hr_configuration/add_location';
$route['update_location'] = 'hr_configuration/update_location';

$route['subsidiary'] = 'hr_configuration/subsidiary';
$route['add_subsidiary'] = 'hr_configuration/add_subsidiary';
$route['update_subsidiary'] = 'hr_configuration/update_subsidiary';

$route['leave'] = 'hr_configuration/leave';
$route['add_leave'] = 'hr_configuration/add_leave';
$route['update_leave'] = 'hr_configuration/update_leave';


$route['grade'] = 'hr_configuration/grade';
$route['add_grade'] = 'hr_configuration/add_grade';
$route['update_grade'] = 'hr_configuration/update_grade';

$route['qualification'] = 'hr_configuration/qualification';
$route['add_qualification'] = 'hr_configuration/add_qualification';
$route['update_qualification'] = 'hr_configuration/update_qualification';


$route['department'] = 'hr_configuration/department';
$route['add_department'] = 'hr_configuration/add_department';
$route['update_department'] = 'hr_configuration/update_department';

$route['job_role'] = 'hr_configuration/job_role';
$route['add_job_role'] = 'hr_configuration/add_job_role';
$route['update_job_role'] = 'hr_configuration/update_job_role';

//appraisal
$route['appraisal_setup'] = 'hr_configuration/appraisal_setup';
$route['self_assessment'] = 'hr_configuration/self_assessment';
$route['add_self_assessment'] = 'hr_configuration/add_self_assessment';
$route['update_self_assessment'] = 'hr_configuration/update_self_assessment';


$route['quantitative_assessment'] = 'hr_configuration/quantitative_assessment';
$route['add_quantitative_assessment'] = 'hr_configuration/add_quantitative_assessment';
$route['view_quantitative_assessment/:num'] = 'hr_configuration/view_quantitative_assessment/$1';
$route['update_quantitative_assessment'] = 'hr_configuration/update_quantitative_assessment';


$route['qualitative_assessment'] = 'hr_configuration/qualitative_assessment';
$route['add_qualitative_assessment'] = 'hr_configuration/add_qualitative_assessment';
$route['update_qualitative_assessment'] = 'hr_configuration/update_qualitative_assessment';

$route['supervisor_assessment'] = 'hr_configuration/supervisor_assessment';
$route['add_supervisor_assessment'] = 'hr_configuration/add_supervisor_assessment';
$route['update_supervisor_assessment'] = 'hr_configuration/update_supervisor_assessment';


$route['user'] = 'user/user';
$route['new_user'] = 'user/new_user';
$route['add_user'] = 'user/add_user';
$route['manage_user/:num'] = 'user/manage_user/$1';
$route['edit_user'] = 'user/edit_user';

$route['employee'] = 'employee/employee';
$route['new_employee'] = 'employee/new_employee';
$route['add_employee'] = 'employee/add_employee';
$route['employee_upload_others'] = 'employee/employee_upload_others';
$route['view_employee/:num'] = 'employee/view_employee/$1';
$route['update_employee/:num'] = 'employee/update_employee/$1';
$route['edit_employee'] = 'employee/edit_employee';
$route['employee_transfer'] = 'employee/employee_transfer';
$route['new_employee_transfer'] = 'employee/new_employee_transfer';
$route['add_new_employee_transfer'] = 'employee/add_new_employee_transfer';
$route['employee_leave'] = 'employee/employee_leave';
$route['new_employee_leave'] = 'employee/new_employee_leave';
$route['add_new_employee_leave'] = 'employee/add_new_employee_leave';
$route['extend_leave/:num'] = 'employee/extend_leave/$1';
$route['extend_employee_leave'] = 'employee/extend_employee_leave';
$route['employee_appraisal'] = 'employee/employee_appraisal';
$route['new_employee_appraisal'] = 'employee/new_employee_appraisal';
$route['add_new_employee_appraisal'] = 'employee/add_new_employee_appraisal';


$route['tax_rates'] = 'payroll_configuration/tax_rate';
$route['add_tax_rate'] = 'payroll_configuration/add_tax_rate';
$route['update_tax_rate'] = 'payroll_configuration/update_tax_rate';


$route['payment_definition'] = 'payroll_configuration/payment_definition';
$route['add_payment_definition'] = 'payroll_configuration/add_payment_definition';
$route['new_payment_definition'] = 'payroll_configuration/new_payment_definition';
$route['edit_payment_definition/:num'] = 'payroll_configuration/edit_payment_definition/$1';
$route['update_payment_definition'] = 'payroll_configuration/update_payment_definition';

$route['salary_structure'] = 'payroll_configuration/salary_structure';
$route['add_salary_structure'] = 'payroll_configuration/add_salary_structure';
$route['update_salary_structure'] = 'payroll_configuration/update_salary_structure';
$route['view_salary_structure/:num'] = 'payroll_configuration/view_salary_structure/$1';

$route['allowance'] = 'payroll_configuration/allowance';
$route['new_salary_allowance'] = 'payroll_configuration/new_salary_allowance';
$route['add_salary_allowance'] = 'payroll_configuration/add_salary_allowance';
$route['edit_salary_allowance/:num'] = 'payroll_configuration/edit_salary_allowance/$1';
$route['update_salary_allowance'] = 'payroll_configuration/update_salary_allowance';
$route['setup_salary_structure/:num'] = 'payroll_configuration/setup_salary_structure/$1';
$route['min_tax_rate'] = 'payroll_configuration/min_tax_rate';
$route['add_min_tax_rate'] = 'payroll_configuration/add_min_tax_rate';
$route['update_min_tax_rate'] = 'payroll_configuration/update_min_tax_rate';
$route['pension_rate'] = 'payroll_configuration/pension_rate';
$route['add_pension_rate'] = 'payroll_configuration/add_pension_rate';
$route['update_pension_rate'] = 'payroll_configuration/update_pension_rate';


$route['payroll_month_year'] = 'payroll_configuration/payroll_month_year';
$route['add_payroll_month_year'] = 'payroll_configuration/add_payroll_month_year';
$route['update_payroll_month_year'] = 'payroll_configuration/update_payroll_month_year';
$route['variational_payment'] = 'payroll/variational_payment';
$route['new_variational_payment'] = 'payroll/new_variational_payment';
$route['add_variational_payment'] = 'payroll/add_variational_payment';
$route['recall_month'] = 'payroll/recall_month';

$route['employee_salary_structure'] = 'payroll/employee_salary_structure';
$route['add_employee_salary_structure'] = 'payroll/add_employee_salary_structure';
$route['view_employee_salary_structure/:num'] = 'payroll/view_employee_salary_structure/$1';
$route['edit_employee_salary_structure/:num'] = 'payroll/edit_employee_salary_structure/$1';
$route['update_employee_salary_structure'] = 'payroll/update_employee_salary_structure/$1';
$route['approve_variational_payment'] = 'payroll/approve_variational_payment';
$route['approve_variational_payments'] = 'payroll/approve_variational_payments';

$route['new_loan'] = 'loan/new_loan';
$route['add_new_loan'] = 'loan/add_new_loan';
$route['loans'] = 'loan/loans';
$route['edit_loan/:num'] = 'loan/edit_loan/$1';
$route['update_loan'] = 'loan/update_loan';

$route['payroll_routine'] = 'payroll/payroll_routine';
$route['run_payroll_routine'] = 'payroll/run_payroll_routine';
$route['approve_payroll_routine'] = 'payroll/approve_payroll_routine';
$route['undo_payroll_routine'] = 'payroll/undo_payroll_routine';
$route['run_approve_payroll_routine'] = 'payroll/run_approve_payroll_routine';
$route['payroll_report'] = 'payroll_report/index';
$route['emolument'] = 'payroll_report/emolument';
$route['emolument_report'] = 'payroll_report/emolument_report';
$route['emolument_report_clear'] = 'payroll_report/emolument_report_clear';
$route['deduction'] = 'payroll_report/deduction';
$route['deduction_report'] = 'payroll_report/deduction_report';
$route['pay_order'] = 'payroll_report/pay_order';
$route['pay_order_report'] = 'payroll_report/pay_order_report';


$route['view_log'] = 'log/view_log';







