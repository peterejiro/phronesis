<?php


class Biometric extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function get_employee_biometric($employee_id){

		$this->db->select('*');
		$this->db->from('employee_biometrics');
		$this->db->where('employee_biometrics_employee', $employee_id);
		return $this->db->get()->result();
	}

	public function get_max_finger_id($employee_id){
		$this->db->select_max('employee_biometrics_finger_id');
		$this->db->where('employee_biometrics_employee', $employee_id);
		$this->db->get('employee_biometrics');
		return $this->db->get()->row();
	}

	public function insert($data){
		$this->db->insert('employee_biometrics', $data);
		return true;

	}






}
