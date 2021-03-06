<?php

require APPPATH . 'libraries/REST_Controller.php';

require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';
class Chats extends REST_Controller
{
    /**
     * constructor
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Employees');
        $this->load->model('Users');
        $this->load->model('logs');
    }

    public function fetchrecipients_post()
    {
        $request = $this->post();
        $employee_id = $request["uniqueid"];
        $id = $request["id"];
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('employee_unique_id !=', $employee_id);
        $data = $this->db->get()->result();
        $data = $this->objectToArray($data);
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]["employee_passport"] != null) {
                $data[$i]["employee_passport"] = base_url() . "uploads/employee_passports/" . $data[$i]["employee_passport"];
                $data[$i]["chats"] = $this->getmessages($id, $data[$i]["employee_id"]);
            }
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

  

    public function fetchmsgs_post()
    {
        $request = $this->post();
        $sender = $request["sender"];
        $recipient = $request["recipient"];
        $data = $this->getmessages($recipient, $sender);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function send_post()
    {
        $request = $this->post();
        $msg = $request["msg"];
        $sender = $request["sender"];
        $recipient = $request["recipient"];
        $time = date("Y-m-d h:i:s");//$request["time"];
        $data = array(
            'chat_sender_id' => $sender,
            'chat_reciever_id' => $recipient,
            'chat_body' => $msg,
            'chat_time' => $time,
        );
        $this->db->insert('chat', $data);
    }


    public function getmessages($id, $sender)
    {
        $this->db->select('*');
        $this->db->from('chat');
        $this->db->where('chat_reciever_id', $id);
        $this->db->where("chat_sender_id", $sender);
        $this->db->or_where('chat_sender_id', $id);
        $this->db->where("chat_reciever_id", $sender);
        $data = $this->db->get()->result();
        $data = $this->objectToArray($data);
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]["chat_time"] != null) {
                $data[$i]["chat_time"] = $this->formatDate($data[$i]["chat_time"] );
            }
        }
        return $data;
        //$this->response($data, REST_Controller::HTTP_OK);
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

    public function formatDate($date){
        $newDate = date("d-M-y h:i A", strtotime($date));
        return $newDate;
    }
   
    public function AddLog($username, $info)
    {
        $log_array = array(
            'log_user_id' => $this->Users->get_user($username)->user_id,
            'log_description' => $info
        );

        $this->logs->add_log($log_array);
    }

}
