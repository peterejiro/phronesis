<?php


class Payroll_report extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('user_agent');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->helper('array');
		$this->load->model('users');
		$this->load->model('payroll_configurations');
		$this->load->model('employees');
		$this->load->model('hr_configurations');
		$this->load->model('logs');
		$this->load->model('salaries');
		$this->load->model('loans');

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


				$this->load->view('payroll_report/base', $data);

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

	public function emolument(){
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

				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();
				$data['min_payroll_year'] = $this->salaries->view_min_payroll_year();

				$this->load->view('payroll_report/emolument_report', $data);

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

	public function emolument_report(){
		$username = $this->session->userdata('user_username');

		if(isset($username)):

			$method = $this->input->server('REQUEST_METHOD');

			if($method == 'POST' || $method == 'Post' || $method == 'post'):
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


				$data['user_data'] = $this->users->get_user($username);

				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();
				$data['min_payroll_year'] = $this->salaries->view_min_payroll_year();

				$month = $this->input->post('month');
				$year = $this->input->post('year');


			if(empty($month) || empty($year)):

				redirect('error_404');

			else:

				$check = $this->salaries->view_emolument_sheet();
				$data['payroll_month'] = $month;
				$data['payroll_year'] = $year;

			if(empty($check)):
					$this->salaries->optimize_emolument_report();

				$payment_definitions = $this->payroll_configurations->view_payment_definitions_order();

				foreach ($payment_definitions as $payment_definition):

					$fields = array(
						'payment_definition_'.$payment_definition->payment_definition_id => array('type' => 'TEXT')
					);

				$this->salaries->new_column($fields);
				endforeach;


				$employees = $this->employees->view_employees();

				foreach ($employees as $employee):
					
					if($employee->employee_status == 1 || $employee->employee_status == 2):
					$emolument_data = array(

						'emolument_report_employee_id' => $employee->employee_id

					);

					$this->salaries->insert_emolument($emolument_data);

					$salaries = $this->salaries->view_salaries_emolument($employee->employee_id, $month, $year);

					foreach ($salaries as $salary):

						$emoluments_data = array(
							'payment_definition_'.$salary->salary_payment_definition_id => $salary->salary_amount

						);
						//print_r($emoluments_data);

					$this->salaries->update_emolument($employee->employee_id, $emoluments_data);

					endforeach;
					endif;

				endforeach;


				$data['emoluments'] = $this->salaries->view_emolument_sheet();





				$this->load->view('payroll_report/emolument_sheet', $data);

				else:
					$this->salaries->clear_emolument();
					$this->salaries->optimize_emolument_report();
					$emolument_fields = $this->salaries->view_emolument_fields();

					foreach($emolument_fields as $emolument_field):

						$payment_definition_field = stristr($emolument_field,"payment_definition_");

						if(!empty($payment_definition_field)):

							$this->salaries->remove_field($payment_definition_field);


						endif;

					endforeach;



					$payment_definitions = $this->payroll_configurations->view_payment_definitions_order();

					foreach ($payment_definitions as $payment_definition):

						$fields = array(
							'payment_definition_'.$payment_definition->payment_definition_id => array('type' => 'TEXT')
						);

						$this->salaries->new_column($fields);
					endforeach;


					$employees = $this->employees->view_employees();

					foreach ($employees as $employee):
						if($employee->employee_status == 1 || $employee->employee_status == 2):
						$emolument_data = array(

							'emolument_report_employee_id' => $employee->employee_id

						);

						$this->salaries->insert_emolument($emolument_data);

						$salaries = $this->salaries->view_salaries_emolument($employee->employee_id, $month, $year);

						foreach ($salaries as $salary):

							$emoluments_data = array(
								'payment_definition_'.$salary->salary_payment_definition_id => $salary->salary_amount

							);
							//print_r($emoluments_data);

							$this->salaries->update_emolument($employee->employee_id, $emoluments_data);

						endforeach;
						
						endif;

					endforeach;


					$data['emoluments'] = $this->salaries->view_emolument_sheet();





					$this->load->view('payroll_report/emolument_sheet', $data);

				endif;

			endif;





			//$query = $this->payroll_configurations->update_allowance($allowance_id, $allowance_array);



			else:

				redirect('/access_denied');

			endif;

			else:
				redirect('error_404');
				endif;
		else:
			redirect('/login');
		endif;
	}

	public function emolument_report_clear(){
		$username = $this->session->userdata('user_username');

		if(isset($username)):




				$data['user_data'] = $this->users->get_user($username);


			$this->salaries->clear_emolument();
			$emolument_fields = $this->salaries->view_emolument_fields();

			foreach($emolument_fields as $emolument_field):

			$payment_definition_field = stristr($emolument_field,"payment_definition_");

				if(!empty($payment_definition_field)):

					$this->salaries->remove_field($payment_definition_field);


			endif;

				endforeach;





		else:
			redirect('/login');
		endif;
	}

	public function deduction(){
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

				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();
				$data['min_payroll_year'] = $this->salaries->view_min_payroll_year();
				$data['payment_definitions'] = $this->payroll_configurations->view_payment_definitions();

				$this->load->view('payroll_report/deduction_report', $data);
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

	public function deduction_report(){
		$username = $this->session->userdata('user_username');

		if(isset($username)):
			$method = $this->input->server('REQUEST_METHOD');

			if($method == 'POST' || $method == 'Post' || $method == 'post'):

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

				$data['user_data'] = $this->users->get_user($username);

				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();
				$data['min_payroll_year'] = $this->salaries->view_min_payroll_year();

				$month = $this->input->post('month');
				$year = $this->input->post('year');
				$payment_definition_id = $this->input->post('payment_type');


				if((empty($month) || empty($year) || empty($payment_definition_id))):

					redirect('error_404');

				else:
					$data['payment'] = $this->payroll_configurations->view_payment_definition($payment_definition_id);

					$data['payroll_month'] = $month;
					$data['payroll_year'] = $year;

					$data['deductions'] = $this->salaries->get_sheet($month, $year, $payment_definition_id, 0);

					//print_r($data['deductions']);

					$this->load->view('payroll_report/deduction_sheet', $data);


				endif;


			//$query = $this->payroll_configurations->update_allowance($allowance_id, $allowance_array);



			else:

				redirect('/access_denied');

			endif;

			else:
				redirect('error_404');
				endif;
		else:
			redirect('/login');
		endif;
	}

	public function pay_order(){

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

				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();
				$data['min_payroll_year'] = $this->salaries->view_min_payroll_year();
				$data['payment_definitions'] = $this->payroll_configurations->view_payment_definitions();

				$this->load->view('payroll_report/pay_order', $data);

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

	public function pay_order_report(){

		$username = $this->session->userdata('user_username');

		if(isset($username)):

			$method = $this->input->server('REQUEST_METHOD');

			if($method == 'POST' || $method == 'Post' || $method == 'post'):

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

				$data['user_data'] = $this->users->get_user($username);

				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();
				$data['min_payroll_year'] = $this->salaries->view_min_payroll_year();
				$data['payment_definitions'] = $this->payroll_configurations->view_payment_definitions();

				$month = $this->input->post('month');
				$year = $this->input->post('year');


				if((empty($month) || empty($year))):

					redirect('error_404');

				else:


					$data['payroll_month'] = $month;
					$data['payroll_year'] = $year;

					$data['employees'] = $this->employees->view_employees();

					//print_r($data['deductions']);

					$this->load->view('payroll_report/pay_order_sheet', $data);


				endif;



			else:

				redirect('/access_denied');

			endif;

			else:

				redirect('error_404');
				endif;
		else:
			redirect('/login');
		endif;
	}
	
	public function payroll_journal(){
		
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
				
				$data['user_data'] = $this->users->get_user($username);
				
				
				$user_type = $this->users->get_user($username)->user_type;
				
				if($user_type == 1 || $user_type == 3):
					
					$method = $this->input->server('REQUEST_METHOD');
					if($method == 'GET' || $method == 'Get' || $method == 'get'):
						
						
						$data['csrf_name'] = $this->security->get_csrf_token_name();
						$data['csrf_hash'] = $this->security->get_csrf_hash();
						$data['min_payroll_year'] = $this->salaries->view_min_payroll_year();
						$data['payment_definitions'] = $this->payroll_configurations->view_payment_definitions();
						
						$this->load->view('payroll_report/payroll_journal', $data);
						
						
						endif;
					
					
					if($method == 'POST' || $method == 'Post' || $method == 'post'):
						
						
						$month = $this->input->post('month');
						$year = $this->input->post('year');
						
						
						if((empty($month) || empty($year))):
							
							redirect('error_404');
						
						else:
							
							
							$data['payroll_month'] = $month;
							$data['payroll_year'] = $year;
							
							$data['payment_definitions'] = $this->payroll_configurations->view_payment_definitions();
							$data['csrf_name'] = $this->security->get_csrf_token_name();
							$data['csrf_hash'] = $this->security->get_csrf_hash();
							//print_r($data['deductions']);
	
							$this->load->view('payroll_report/payroll_journal_sheet', $data);
						
						
						endif;
					
					
					endif;
					
					
				
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
	
	public function post_journal(){
		
		$method = $this->input->server('REQUEST_METHOD');
		if($method == 'POST' || $method == 'Post' || $method == 'post'):
			
			
			$month = $this->input->post('month');
			$year = $this->input->post('year');
			
			
			if((empty($month) || empty($year))):
				
				redirect('error_404');
			
			else:
				
				
				$data['payroll_month'] = $month;
				$data['payroll_year'] = $year;
				
				$data['payment_definitions'] = $this->payroll_configurations->view_payment_definitions();
				
				//print_r($data['deductions']);
				
				$this->load->view('payroll_report/payroll_journal_sheet', $data);
			
			
			endif;
		
		
		endif;
	}

}
