<?php

require APPPATH . 'libraries/REST_Controller.php';

require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';
class Appraisals extends REST_Controller
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

 
    public function allAppraisals_get()
    {
        
        $data = $this->Employees->get_appraisals();
        $data = $this->objectToArray($data);
        for($i=0; $i < count($data); $i++)
        {
            $supervisor  =  $this->Employees->get_employee($data[$i]['employee_appraisal_supervisor_id']);
            $data[$i]['employee_appraisal_period_from'] = date("M Y", strtotime( $data[$i]['employee_appraisal_period_from']));
            $data[$i]['employee_appraisal_period_to'] = date("M Y", strtotime( $data[$i]['employee_appraisal_period_to']));
            if(!is_null($supervisor) && !empty($supervisor))
            {
                $data[$i]["supervisor_name"] = $supervisor->employee_last_name." ".$supervisor->employee_first_name;
            }
           
        }
        //$supervisor = $this->Employees->get_employee($appraisal->employee_appraisal_supervisor_id);
        $this->response($data, REST_Controller::HTTP_OK);
    }


  /*   foreach($appraisals as $appraisal):
        ?>
        <tr>
          <td><?php echo $appraisal->employee_last_name." ".$appraisal->employee_first_name; ?></td>
          <td><?php echo date("M Y", strtotime($appraisal->employee_appraisal_period_from))." - ".date("M Y", strtotime($appraisal->employee_appraisal_period_to)) ; ?></td>
          <td>
            <?php
              $supervisor = $CI->employees->get_employee($appraisal->employee_appraisal_supervisor_id);
              echo $supervisor->employee_last_name." ".$supervisor->employee_first_name;
            ?> */


   public function  employee_appraisal_post()
    {
       $request = $this->post();
       $employee_id = $request["id"];//7;
       $data = $this->Employees->get_employee_appraisal($employee_id);
       $this->response($data, REST_Controller::HTTP_OK);
    }
    

    public function appraise_employees_post()
    {
        $request = $this->post();
        $employee_id = $request["id"];//7
        $data = $this->Employees->get_appraise_employees($employee_id);
        $this->response($data, REST_Controller::HTTP_OK);
    }


    public function appraisal_questions_post()
    {
        $request = $this->post();
        $appraisal_id = $request["id"];
        $data =  $this->Employees->get_appraisal_questions($appraisal_id);
        $this->response($data, REST_Controller::HTTP_OK);
    }


    public function SaveAnswer_post()
    {
        $request = $this->post();

        foreach($request as $question_answer_pair)
        {
            $this->Employees->answer_question($question_answer_pair["id"],array('employee_appraisal_result_answer' => $question_answer_pair["answer"]));
        } 

        $this->response(["status"=>REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);

       // $this->response($data, REST_Controller::HTTP_OK);
    }



    public function UpdateSelfAppraisalStatus_post()
    {

        $request = $this->post();
        $appraisal_id = $request["id"];
        $appraisal_data = array('employee_appraisal_self'=>1);
        $this->Employees->update_appraisal($appraisal_id, $appraisal_data);
        $this->UpdateAppraisalStatus($appraisal_id);
     /*    $query = $this->db->query("UPDATE employee_appraisal SET employee_appraisal_self = '1' WHERE loan_id ='$id'");
        if ($query) {
            $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
        } else {
            $this->response(["status" => REST_Controller::HTTP_BAD_REQUEST], REST_Controller::HTTP_BAD_REQUEST);
        } */
    }




    public function UpdateSupervisorStatus_post()
    {

        $request = $this->post();
        $appraisal_id = $request["id"];
        $appraisal_data = array(
            'employee_appraisal_supervisor'=> 1,
            'employee_appraisal_qualitative '=> 1,
            'employee_appraisal_quantitative'=>1
            );
        $this->Employees->update_appraisal($appraisal_id, $appraisal_data);
        $this->UpdateAppraisalStatus($appraisal_id);
        /* $query = $this->db->query("UPDATE employee_appraisal SET employee_appraisal_supervisor = '1', employee_appraisal_qualitative='1', employee_appraisal_quantitative ='1' WHERE loan_id ='$id'");
        if ($query) {
            $this->response(["status" => REST_Controller::HTTP_OK], REST_Controller::HTTP_OK);
        } else {
            $this->response(["status" => REST_Controller::HTTP_BAD_REQUEST], REST_Controller::HTTP_BAD_REQUEST);
        } */
    }

    public function UpdateAppraisalStatus($appraisal_id)
    {
        $check_appraisal= $this->Employees->get_appraisal($appraisal_id);

                if($check_appraisal->employee_appraisal_supervisor == 1 && $check_appraisal->employee_appraisal_qualitative == 1
                 && $check_appraisal->employee_appraisal_quantitative == 1 && $check_appraisal->employee_appraisal_self == 1 ){
					$appraisal_data = array(

						'employee_appraisal_status'=>1
					);

                    $this->Employees->update_appraisal($appraisal_id, $appraisal_data);
                }
    }
    

    public function LogAppraisalAction_post()
    {
        $request =  $this->post();
        $username= $request['username'];
        $info = "Attended to Appraisal Questions";
        $this->AddLog($username, $info);
    }

    
    public function AddLog($username, $info)
    {
        $log_array = array(
            'log_user_id' => $this->users->get_user($username)->user_id,
            'log_description' => $info
        );

        $this->logs->add_log($log_array);
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
