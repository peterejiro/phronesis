<?php


class Logs extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('session');

	}
	public function add_log($log_data){

		$this->db->insert('logs', $log_data);
		return true;
	}
}
