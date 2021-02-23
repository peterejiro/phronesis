<?php
	
	
	class Hr_Report extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->library('form_validation');
			$this->load->library('user_agent');
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
				
				$permission = $this->users->check_permission($username);
				$data['employee_management'] = $permission->employee_management;
				$data['notifications'] = $this->employees->get_notifications(0);
				$data['payroll_management'] = $permission->payroll_management;
				$data['biometrics'] = $permission->biometrics;
				$data['user_management'] = $permission->user_management;
				$data['configuration'] = $permission->configuration;
				$data['payroll_configuration'] = $permission->payroll_configuration;
				$data['hr_configuration'] = $permission->hr_configuration;
				
				if($permission->payroll_management == 1):
					$user_type = $this->users->get_user($username)->user_type;
					
					if($user_type == 1 || $user_type == 3):
						
						$data['user_data'] = $this->users->get_user($username);
						$data['employees'] = $this->employees->get_employee_by_salary_setup();
						
						
						$this->load->view('hr_report/base', $data);
					
					else:
						redirect('/access_denied');
					endif;
				else:
					
					redirect('/access_denied');
				
				endif;
			else:
				redirect('/login');
			endif;
		}
		
		public function new_hire(){
			
			$username = $this->session->userdata('user_username');
			
			if(isset($username)):
				
				$permission = $this->users->check_permission($username);
				$data['employee_management'] = $permission->employee_management;
				$data['notifications'] = $this->employees->get_notifications(0);
				$data['payroll_management'] = $permission->payroll_management;
				$data['biometrics'] = $permission->biometrics;
				$data['user_management'] = $permission->user_management;
				$data['configuration'] = $permission->configuration;
				$data['payroll_configuration'] = $permission->payroll_configuration;
				$data['hr_configuration'] = $permission->hr_configuration;
				
				if($permission->payroll_management == 1):
					$user_type = $this->users->get_user($username)->user_type;
					
					if($user_type == 1 || $user_type == 3):
						
						$data['user_data'] = $this->users->get_user($username);
						$data['employees'] = $this->employees->get_employee_by_salary_setup();
						
						
						$this->load->view('hr_report/new_hire_base', $data);
					
					else:
						redirect('/access_denied');
					endif;
				else:
					
					redirect('/access_denied');
				
				endif;
			else:
				redirect('/login');
			endif;
			
		}
	}
