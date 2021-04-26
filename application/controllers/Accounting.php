<?php
	
	
	class Accounting extends CI_Controller
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
			$this->load->model('accountings');
		}
		
		public function chart_of_accounts(){
			
			$username = $this->session->userdata('user_username');
			
			if (isset($username)):
				$user_type = $this->users->get_user($username)->user_type;
				
				if ($user_type == 1 || $user_type == 3):
					$permission = $this->users->check_permission($username);
					$data['employee_management'] = $permission->employee_management;
					$data['payroll_management'] = $permission->payroll_management;
					$data['biometrics'] = $permission->biometrics;
					$data['user_management'] = $permission->user_management;
					$data['configuration'] = $permission->configuration;
					$data['payroll_configuration'] = $permission->payroll_configuration;
					$data['hr_configuration'] = $permission->hr_configuration;
					
					if ($permission->payroll_management == 1):
						$data['notifications'] = $this->employees->get_notifications(0);
						$data['charts'] = $this->accountings->view_coas();
						
						$data['employees'] = $this->employees->view_employees();
						$data['user_data'] = $this->users->get_user($username);
						$data['csrf_name'] = $this->security->get_csrf_token_name();
						$data['csrf_hash'] = $this->security->get_csrf_hash();
						
						$this->load->view('accounting/coa', $data);
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
