<?php


class Chats extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('session');

	}


	public function add_chat($chat_data){

		$this->db->insert('chat', $chat_data);
//		return $this->db->insert_id();
		return true;
	}



	public function get_chat(){
//		public function get_chat($employee_id, $reciever_id){

		$this->db->select('*');
		$this->db->from('chat');
//		$this->db->join('employee', 'employee.employee_id = chat.chat_reciever_id');
//		$this->db->where('chat.chat_sender_id', $employee_id);
//		$this->db->where('chat.chat_reciever_id', $reciever_id);
		$this->db->order_by('chat.chat_time', 'ASC');
		return $this->db->get()->result();

	}




}
