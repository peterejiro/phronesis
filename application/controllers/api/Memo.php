<?php

require APPPATH . 'libraries/REST_Controller.php';

require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';
class Memo extends REST_Controller
{
    /**
     * constructor
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('users');
        $this->load->model('logs');
        $this->load->model('Employees');
        $this->load->helper('security');
    }

    public function fetch_get()
    {
        $this->db->select('*');
        $this->db->from('memo');
        $this->db->order_by("memo_id", "desc");
        $data = $this->db->get()->result();

        $data = $this->objectToArray($data);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['memo_date'] = $this->formatDate($data[$i]['memo_date']);
        }

        //$data = $this->StripFormatting($data, "memo_body"); */
        //$data = json_encode($data);
        //var_dump($data);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function directives_post()
    {
        $param = $this->post();
        $employee_id = $param["id"];
        $data = $this->Employees->get_my_memo($employee_id);
        $data = $this->objectToArray($data);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['specific_memo_date'] = $this->formatDate($data[$i]['specific_memo_date']);
        }
       // $data = $this->StripFormatting($data, "specific_memo_body");
        $this->response($data, REST_Controller::HTTP_OK);
	}
	


	public function Alldirectives_get()
    {
    
        $data = $this->Employees->get_specific_memos();
        $data = $this->objectToArray($data);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['specific_memo_date'] = $this->formatDate($data[$i]['specific_memo_date']);
        }
       // $data = $this->StripFormatting($data, "specific_memo_body");
        $this->response($data, REST_Controller::HTTP_OK);
	}

	

    public function publish_memo_post()
    {
        $param = $this->post();
        $subject = $param["subject"];
        $details = $param["details"];
        $date =  date('y-m-d h:i');//$param["date"];
        $data = array(
            "memo_subject" => $subject,
            "memo_body" => $details,
            "memo_date" => $date,
        );
        $this->db->insert("memo", $data);
        $this->AddLog($param["username"], "Issued new memo");
        $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
    }

    public function fetch_employees_get()
    {
        //$data = $this->Employees->view_employees();
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->join('grade', 'grade.grade_id = employee.employee_grade_id');
        $this->db->join('job_role', 'job_role.job_role_id = employee.employee_job_role_id');
        $this->db->join('subsidiary', 'subsidiary.subsidiary_id = employee.employee_subsidiary_id');
        $this->db->join('department', 'department.department_id = job_role.department_id');
        $this->db->join('bank', 'bank.bank_id = employee.employee_bank_id');
        $data = $this->db->get()->result();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function fetch_departments_get()
    {
        $this->db->select('*');
        $this->db->from('department');
        $data = $this->db->get()->result();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function publish_directive_post()
    {
        $request = $this->post();
        $category = $request['category'];

        if ($category == 1) {

            $department_id = $request['department'];
            $memo_subject = $request['subject'];
            $memo_body = $request['details'];

            $employees = $this->Employees->get_employees_by_department($department_id);
            foreach ($employees as $employee) {
                $memo_array = array(
                    'specific_memo_employee_id' => $employee->employee_id,
                    'specific_memo_subject' => $memo_subject,
                    'specific_memo_body' => $memo_body,
                );
                $memo_array = $this->security->xss_clean($memo_array);
                $this->Employees->insert_specific_memo($memo_array);
            }
            $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
        }

        if ($category == 2) {
            $employee = $request['employee'];
            $memo_subject = $request['subject'];
            $memo_body = $request['details'];

            $memo_array = array(
                'specific_memo_employee_id' => $employee,
                'specific_memo_subject' => $memo_subject,
                'specific_memo_body' => $memo_body,

            );
            $memo_array = $this->security->xss_clean($memo_array);
            $this->Employees->insert_specific_memo($memo_array);
            $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
        }
    }

    public function sendQuery_post()
    {
        $request = $this->post();
        $Query_array = array(
            "query_employee_id" => $request["employee"],
            "query_subject" => $request["subject"],
            "query_body" => $request["body"],
            "query_type" => $request["query"],
            "query_date" => date("Y-m-d"),
            "query_status" => 1,
        );
        $Query_array = $this->security->xss_clean($Query_array);
        $this->Employees->insert_query($Query_array);
        $this->AddLog($request["username"], "Issued Query to".$request["reciever"]);
        $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
    }


    public function QueryThread_post()
    {
        $request = $this->post();
        $query_id = $request["query"];
        $data =  $this->Employees->get_query_response($query_id);
        $data = $this->objectToArray($data);
        $data = $this->StripFormatting($data, "query_response_body");
        $this->response($data, REST_Controller::HTTP_OK);
    }


    public function RespondQuery_post()
    {
        $request = $this->post();
        $query_id = $request["query"];
        $query_responder = $request["responder"];
        $query_response_body = $request["body"];
        $query_response_date = date("Y-m-d h:i:s");
        $response_array = array(
            "query_response_query_id"=>$query_id,
            "query_response_responder_id"=>$query_responder,
            "query_response_body"=>$query_response_body,
            "query_response_date"=>$query_response_date
        );
        $response_array = $this->security->xss_clean($response_array);
        $this->Employees->insert_query_response($response_array);
        $this->AddLog($request["username"], "Responded to query");
        $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
    }


    public function AllQueries_get()
    {
        $this->db->select('*');
        $this->db->from('query');
        $this->db->join('employee', 'query.query_employee_id = employee.employee_id');
        $data = $this->db->get()->result();
        $data = $this->objectToArray($data);
        $data = $this->StripFormatting($data, "query_body");
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function MyQueries_post()
    {
        $request  = $this->post();
        $employee_id = $request["id"];
        $this->db->select('*');
        $this->db->from('query');
        $this->db->where('query.query_employee_id', $employee_id);
        $data = $this->db->get()->result();
        $data = $this->objectToArray($data);
        $data = $this->StripFormatting($data, "query_body");
        $this->response($data, REST_Controller::HTTP_OK);
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

    public function formatDate($date){
        $newDate = date("d-M-y h:i A", strtotime($date));
        return $newDate;
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
