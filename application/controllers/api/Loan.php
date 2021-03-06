<?php

require APPPATH . 'libraries/REST_Controller.php';

require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';
class Loan extends REST_Controller
{
    /**
     * constructor
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Employees');
        $this->load->model('Loans');
        $this->load->model('payroll_configurations');
        $this->load->helper('security');
        $this->load->model('users');
        $this->load->model('logs');
    }

    public function all_loans_get()
    {
        $data = $this->Loans->view_loans();
        $data = $this->objectToArray($data);
        $data = $this->Paid($data);
        $data = $this->format($data, "loan_amount");
        $data = $this->StripFormatting($data, "loan_reason");
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function my_loans_post()
    {
        $request = $this->post();
        $employee_id = $request["id"];
        $data = $this->Loans->view_loan_employee($employee_id);
        $data = $this->objectToArray($data);
        $data = $this->Paid($data);
        $data = $this->format($data, "loan_amount");
        $data = $this->StripFormatting($data, "loan_reason");
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function pending_get()
    {
        $this->response(["result"=>$this->Pending()], REST_Controller::HTTP_OK);
    }


    private function Pending()
    {
        $this->db->select('*');
		$this->db->from('loans');
		$this->db->where('loans.loan_status', 2);
		$query = $this->db->get();
		return $query->num_rows();
    }

    public function fetch_leaves_type_get()
    {
        $this->db->select('*');
        $this->db->from('leave_type');
        $data = $this->db->get()->result();
        $this->response($data, REST_Controller::HTTP_OK);
    }

   /*  public function request_loan_post()
    {
        $request = $this->post();

        $employee_id = $request["employee"];
        $leave_id = $request["leave"];
        $start = $request["start"];
        $end = $request["end"];
        $usertype = $request["usertype"];
        $status = 0;
        if ($usertype == 1 || $usertype == 2) {

            $status = 1;
        }

        $data = [
            "leave_employee_id" => $employee_id,
            "leave_leave_type" => $leave_id,
            "leave_start_date" => $start,
            "leave_end_date" => $end,
            "leave_status" => $status,
        ];
        
        $data = $this->security->xss_clean($data);
        $this->db->insert("employee_leave", $data);
        $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);

    }
 */
    public function Payrolldetails_get()
    {
        $data = $this->payroll_configurations->view_payroll_month_year();
       
        $this->response($data, REST_Controller::HTTP_OK);

    }

    public function Paymentdefinitions_get(){

        $data = $this->payroll_configurations->view_payment_definitions();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function apply_loan_post()
    {

        $request = $this->post();
        $amount = $request['amount'];
        $payment_definition = $request['payment_definition'];
        $repayment = $request["repayment"];
        $start_year = $request["year"];
        $start_month = $request["month"];
        $reason = $request["reason"];
        $employee_id = $request["employee"];
        $installments = ceil(intval($amount) / intval($repayment));

        $Startdate = strtotime($start_year . "-" . $start_month);
        $end_year = date("Y", strtotime(("+" . ($installments - 1) . "month"), $Startdate));
        $end_month = date("m", strtotime(("+" . ($installments - 1) . "month"), $Startdate));

        //$this->response(["end" => $end_month, "end_year" => $end_year, "installments"=>$installments], REST_Controller::HTTP_OK);

        $loan_array = array(
        'loan_employee_id'=> $employee_id,
        'loan_payment_definition_id'=>$payment_definition,
        'loan_amount' => $amount,
        'loan_reason' => $reason,
        'loan_start_year'=> $start_year,
        'loan_start_month' => $start_month,
        'loan_end_year' => $end_year,
        'loan_end_month' => $end_month,
        'loan_installments' => $installments,
        'loan_monthly_repayment' => $repayment,
        'loan_balance' => $amount,
        'loan_status'=>2,

        );

        $loan_array = $this->security->xss_clean($loan_array);

        $query = $this->Loans->add_loan($loan_array);
        if($query == true){
            $this->AddLog($request['username'], "Requested a new loan");
            $this->response(["status" =>REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
        }
        else{
            $this->response(["status" =>REST_Controller::HTTP_BAD_REQUEST], REST_Controller::HTTP_OK);
        }
    }
    

    public function approve_loan_post()
    {
        $request = $this->post();
        $loan_id = $request["loan_id"];
        $query = $this->db->query("UPDATE loans SET loan_status = '0' WHERE loan_id ='$loan_id'");
        if ($query) {
            $this->AddLog($request['username'], "Approved Loan request");
            $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
        } else {
            $this->response(["status" => REST_Controller::HTTP_BAD_REQUEST], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function decline_loan_post()
    {
        $request = $this->post();
        $loan_id = $request["loan_id"];
        $query = $this->db->query("UPDATE loans SET loan_status = '3' WHERE loan_id ='$loan_id'");
        if ($query) {
            $this->AddLog($request['username'], "Declined Loan Request");
            $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
        } else {
            $this->response(["status" => REST_Controller::HTTP_BAD_REQUEST], REST_Controller::HTTP_BAD_REQUEST);
        }
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

    public function StripFormatting($array, $key)
    {
        for ($i = 0; $i < count($array); $i++) {
            $array[$i][$key] = strip_tags($array[$i][$key]);
        }

        return ($array);
    }

    public function format($array, $key)
    {
        for ($i = 0; $i < count($array); $i++) {
            $array[$i][$key] = number_format($array[$i][$key]);
        }

        return ($array);
    }

    public function Paid($array)
    {
        for ($i = 0; $i < count($array); $i++) {
            $array[$i]["paid"] = number_format(intval($array[$i]["loan_amount"]) - intval($array[$i]["loan_balance"]));
            $array[$i]["loan_balance"] = number_format($array[$i]["loan_balance"]);
        }

        return ($array);
    }

    public function AddLog($username, $info)
    {
        $log_array = array(
            'log_user_id' => $this->users->get_user($username)->user_id,
            'log_description' => $info
        );

        $this->logs->add_log($log_array);
    }
}
