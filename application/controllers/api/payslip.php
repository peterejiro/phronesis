<?php

require APPPATH . 'libraries/REST_Controller.php';

require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';
class PaySlip extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('security');
        $this->load->helper('string');
        $this->load->helper('array');
        $this->load->model('users');
        $this->load->model('employees');
        $this->load->model('hr_configurations');
        $this->load->model('logs');
        $this->load->model('salaries');
        $this->load->model('loans');
        $this->load->model('payroll_configurations');
    }


    public function payrollYears_get()
    {
        $query = $this->db->query("SELECT DISTINCT payroll_month_year_year FROM payroll_month_year");
        if ($query) {

            $years=array();
            $data = $this->objectToArray($query->result());
            foreach($data as $year){
                $years[] = $year["payroll_month_year_year"];
                //print $token["user_device_token"];
            }
            $this->response($years, REST_Controller::HTTP_OK);
        } else {
          return null;
        }
    }



    public function slip_post()
    {
        $request = $this->post();
        $id = $request["employee_id"];
        $usertype = $request["user-type"];
        $month = $request["month"];
        $year = $request["year"];
        $this->pay_slips($id, $usertype, $month, $year);
        $data["slip"] = $this->Process($id, $month, $year);
        $grossPay = $this->grossPay($id, $month, $year);
        $grossDeductions =  $this->Deductions($id, $month, $year);
        $data["gross"] = number_format($grossPay);
        $data["deduction"] = number_format($grossDeductions);
        $data["net"] = $this->netPay($grossPay, $grossDeductions);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function pay_slips($employee_id, $user_type, $month, $year)
    {

        if ($employee_id != null && $user_type!=null && $month!= null && $year!= null) {

            if ($user_type == 2 || $user_type == 3) {

                if (empty($month) || empty($year)) {

                    //redirect('error_404');
                } else {

                    $check = $this->salaries->view_emolument_sheet();
                    if (empty($check)) {

                        $this->salaries->optimize_emolument_report();

                        $payment_definitions = $this->payroll_configurations->view_payment_definitions_order();

                        foreach ($payment_definitions as $payment_definition) {

                            $fields = array(
                                'payment_definition_' . $payment_definition->payment_definition_id => array('type' => 'TEXT'),
                            );

                            $this->salaries->new_column($fields);
                        }

                        $employees = $this->employees->view_employees();

                        foreach ($employees as $employee) {
                            if ($employee->employee_id == $employee_id) {

                                $emolument_data = array(

                                    'emolument_report_employee_id' => $employee->employee_id,

                                );

                                $this->salaries->insert_emolument($emolument_data);

                                $salaries = $this->salaries->view_salaries_emolument($employee->employee_id, $month, $year);

                                foreach ($salaries as $salary) {

                                    $emoluments_data = array(
                                        'payment_definition_' . $salary->salary_payment_definition_id => $salary->salary_amount,

                                    );
                                    //print_r($emoluments_data);

                                    $this->salaries->update_emolument($employee->employee_id, $emoluments_data);

                                }
                            }
                        }

                        /*   $data['emoluments'] = $this->salaries->view_emolument_sheet();
                        $data['month'] = $month;
                        $data['year'] = $year; */
                        $data['emoluments'] = $this->salaries->view_emolument_sheet();

                        return $data;

                        //$this->load->view('employee_self_service/_pay_slip', $data);
                    } else {

                        $this->salaries->clear_emolument();
                        $this->salaries->optimize_emolument_report();
                        $emolument_fields = $this->salaries->view_emolument_fields();

                        foreach ($emolument_fields as $emolument_field) {

                            $payment_definition_field = stristr($emolument_field, "payment_definition_");

                            if (!empty($payment_definition_field)) {

                                $this->salaries->remove_field($payment_definition_field);
                            }

                        }

                        $payment_definitions = $this->payroll_configurations->view_payment_definitions_order();

                        foreach ($payment_definitions as $payment_definition) {

                            $fields = array(
                                'payment_definition_' . $payment_definition->payment_definition_id => array('type' => 'TEXT'),
                            );

                            $this->salaries->new_column($fields);
                        }

                        $employees = $this->employees->view_employees();

                        foreach ($employees as $employee) {
                            if ($employee->employee_id == $employee_id) {
                                $emolument_data = array(
                                    'emolument_report_employee_id' => $employee->employee_id,
                                );

                                $this->salaries->insert_emolument($emolument_data);

                                $salaries = $this->salaries->view_salaries_emolument($employee->employee_id, $month, $year);

                                foreach ($salaries as $salary) {
                                    $emoluments_data = array(
                                        'payment_definition_' . $salary->salary_payment_definition_id => $salary->salary_amount,
                                    );
                                    //print_r($emoluments_data);

                                    $this->salaries->update_emolument($employee->employee_id, $emoluments_data);

                                }
                            }
                        }

                        $data['emoluments'] = $this->salaries->view_emolument_sheet();
                        return $data;

                    }

                }

            }

        }

    }

    public function Process($employee_id, $payroll_month, $payroll_year)
    {
        $data= array();
        $deductions = array();
        $income = array();
        $emolument_fields = $this->salaries->view_emolument_fields();
        foreach ($emolument_fields as $emolument_field) {
            $payment_definition_field = stristr($emolument_field, "payment_definition_");
            if (!empty($payment_definition_field)) {
                $payment_definition_id = str_replace("payment_definition_", "", $payment_definition_field);
                $payment_definition_check = $this->payroll_configurations->view_payment_definition($payment_definition_id);
                $emolument_detail = $this->salaries->get_employee_income_pay($employee_id, $payment_definition_id, $payroll_month, $payroll_year);
                if ($payment_definition_check->payment_definition_type == 1) {

                    if (empty($emolument_detail)) {
                    } else {
                        $income[] =  $emolument_detail->payment_definition_payment_name . ": " . number_format($emolument_detail->salary_amount);
                    }
                }
                    if ($payment_definition_check->payment_definition_type == 0) {
                        if (empty($emolument_detail)) {

                        } else {
                            $deductions[] = $emolument_detail->payment_definition_payment_name . ": " . number_format($emolument_detail->salary_amount);
                        }

                    }
                

            }
        }

    return array("incomes"=>$income, "deductions"=>$deductions);

    }

    public function grossPay($employee_id, $payroll_month, $payroll_year)
    {
        $gross_pay = 0;
        $salaries = $this->salaries->get_employee_income($employee_id, $payroll_month, $payroll_year, 1);
        foreach ($salaries as $salary) {
            $_gross_pay = $salary->salary_amount;
            $gross_pay = $gross_pay + $_gross_pay;
        }
        return $gross_pay;
    }

    public function Deductions($employee_id, $payroll_month, $payroll_year)
    {
        $total_deduction = 0;
        $salaries = $this->salaries->get_employee_income($employee_id, $payroll_month, $payroll_year, 0);
        foreach ($salaries as $salary) {
            $_total_deduction = $salary->salary_amount;
            $total_deduction = $total_deduction + $_total_deduction;
        }
        return  $total_deduction;
    }

    public function netPay($gross_pay, $total_deduction)
    {
        return number_format($gross_pay - $total_deduction);
    }



    public function objectToArray($data)
    {
        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        if (is_array($data)) {
            return array_map(array($this, 'objectToArray'), $data);
        }
        return $data;
    }


}
