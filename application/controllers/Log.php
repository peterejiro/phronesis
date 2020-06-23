<?php


class Log extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->helper('array');
		$this->load->model('users');
		$this->load->model('hr_configurations');
		$this->load->model('logs');

	}

	public function view_log(){

		$username = $this->session->userdata('user_username');
		//$employee_id = $this->uri->segment(2);

		if(isset($username)):

			$permission = $this->users->check_permission($username);
			$data['employee_management'] = $permission->employee_management;
			$data['payroll_management'] = $permission->payroll_management;
			$data['biometrics'] = $permission->biometrics;
			$data['user_management'] = $permission->user_management;
			$data['configuration'] = $permission->configuration;
			$data['payroll_configuration'] = $permission->payroll_configuration;
			$data['hr_configuration'] = $permission->hr_configuration;

			if($permission->payroll_configuration == 1):

				$data['user_data'] = $this->users->get_user($username);
				$data['logs'] = $this->logs->view_logs();


				$this->load->view('log/view_logs', $data);

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;
	}




}
