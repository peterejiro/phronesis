<?php

require APPPATH . 'libraries/REST_Controller.php';

require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';
class Leaves extends REST_Controller
{
    /**
     * constructor
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Employees');
        $this->load->helper('security');
        $this->load->model('users');
        $this->load->model('logs');
    }

    public function allleaves_get()
    {
        $data = $this->Employees->get_employees_leaves();
        $data = $this->objectToArray($data);
        $data = $this->calculateDays($data);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function myleaves_post()
    {

        $request = $this->post();
        $employee_id = $request["id"];
        $data = $this->Employees->check_existing_employee_leaves($employee_id);
        $data = $this->objectToArray($data);
        $data = $this->calculateDays($data);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function fetch_leaves_type_get()
    {
        $this->db->select('*');
        $this->db->from('leave_type');
        $data = $this->db->get()->result();
        $this->response($data, REST_Controller::HTTP_OK);
    }


    public function pending_get()
    {
        $this->response(["result"=>$this->Pending()], REST_Controller::HTTP_OK);
    }

    public function mypending_post()
    {
        $request = $this->post();
        $id = $request['id'];
        $this->response(["result"=>$this->MypendingLeaves($id)], REST_Controller::HTTP_OK);
    }

    private function Pending()
    {
        $this->db->select('*');
		$this->db->from('employee_leave');
		$this->db->where('employee_leave.leave_status', 0);
		$query = $this->db->get();
		return $query->num_rows();
    }

    private function MypendingLeaves($id)
    {
        $this->db->select('*');
		$this->db->from('employee_leave');
        $this->db->where('employee_leave.leave_status', 0);
        $this->db->where('employee_leave.leave_employee_id', $id);
		$query = $this->db->get();
		return $query->num_rows();
    }

    public function request_leave_post()
    {
        $request = $this->post();
        $employee_id = $request["employee"];
        $leave_id = $request["leave"];
        $start = $request["start"];
        $end = $request["end"];
        $usertype = $request["usertype"];
        $status = 0;
        if ($usertype == 1) {
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
        $this->AddLog($request['username'], "Applied for Leave");
        $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
    }


    public function approve_leave_post(){
        $request = $this->post();
        $leave_id = $request["leave_id"];
        $query = $this->db->query("UPDATE employee_leave SET leave_status = '1' WHERE employee_leave_id ='$leave_id'");
        if($query)
        {
        $this->AddLog($request['username'], "Approved Leave Request");
        $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
        }
        else{
        $this->response(["status" => REST_Controller::HTTP_BAD_REQUEST], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function decline_leave_post(){
        $request = $this->post();
        $leave_id = $request["leave_id"];
        $query = $this->db->query("UPDATE employee_leave SET leave_status = '3' WHERE employee_leave_id ='$leave_id'");
        if($query)
        {
        
        $this->AddLog($request['username'], "Declined Leave Request");
        $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
        }
        else{
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

    public function calculateDays($data)
    {
        for ($i = 0; $i < count($data); $i++) {
            $start = $data[$i]["leave_start_date"];
            $end = $data[$i]["leave_end_date"];

            $days = $this->getWorkingDays($start, $end);
            $data[$i]["days"] = $days;
            //this just calculates the total number of days between 2 dates including weekends
            /*
        $start = strtotime($data[$i]["leave_start_date"]);
        $end = strtotime($data[$i]["leave_end_date"]);
        $datediff = $end - $start;
        $days = round($datediff / (60 * 60 * 24));
        $data[$i]["days"] = $days;
         */

        }

        return $data;
    }

    //The function returns the no. of business days between two dates and it skips the holidays
    public function getWorkingDays($startDate, $endDate/* , $holidays */)
    {
        // do strtotime calculations just once
        $endDate = strtotime($endDate);
        $startDate = strtotime($startDate);

        //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
        //We add one to inlude both dates in the interval.
        $days = ($endDate - $startDate) / 86400 + 1;

        $no_full_weeks = floor($days / 7);
        $no_remaining_days = fmod($days, 7);

        //It will return 1 if it's Monday,.. ,7 for Sunday
        $the_first_day_of_week = date("N", $startDate);
        $the_last_day_of_week = date("N", $endDate);

        //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
        //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
        if ($the_first_day_of_week <= $the_last_day_of_week) {
            if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) {
                $no_remaining_days--;
            }

            if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) {
                $no_remaining_days--;
            }

        } else {
            // (edit by Tokes to fix an edge case where the start day was a Sunday
            // and the end day was NOT a Saturday)

            // the day of the week for start is later than the day of the week for end
            if ($the_first_day_of_week == 7) {
                // if the start date is a Sunday, then we definitely subtract 1 day
                $no_remaining_days--;

                if ($the_last_day_of_week == 6) {
                    // if the end date is a Saturday, then we subtract another day
                    $no_remaining_days--;
                }
            } else {
                // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
                // so we skip an entire weekend and subtract 2 days
                $no_remaining_days -= 2;
            }
        }

        //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
        //---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
        $workingDays = $no_full_weeks * 5;
        if ($no_remaining_days > 0) {
            $workingDays += $no_remaining_days;
        }

        /*   //We subtract the holidays
        foreach ($holidays as $holiday) {
        $time_stamp = strtotime($holiday);
        //If the holiday doesn't fall in weekend
        if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N", $time_stamp) != 6 && date("N", $time_stamp) != 7) {
        $workingDays--;
        }

        } */

        return $workingDays;
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
