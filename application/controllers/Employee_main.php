<?php


class Employee_main extends CI_Controller
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
	}

	public function index(){
		$username = $this->session->userdata('user_username');

		if(isset($username)):


				$data['employees'] = $this->employees->view_employees();
				$user_type = $this->users->get_user($username)->user_type;


				if($user_type == 2 || $user_type == 3):

				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$this->load->view('employee_self_service/home', $data);

				elseif($user_type == 1):

					redirect('/access_denied');

					endif;


		else:
			redirect('/login');
		endif;

	}
}
