<?php


class Home extends CI_Controller
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
		$this->load->model('employees');
		$this->load->model('users');
		$this->load->model('payroll_configurations');
		$this->load->model('hr_configurations');
		$this->load->model('configurations');
		$this->load->model('logs');
		$this->load->model('biometric');
		$this->load->model('salaries');
		$this->load->model('loans');
		$this->load->helper('string');
	}

	public function index(){

		$this->employees->check_leave_end_date(date('y-m-d'));

		$username = $this->session->userdata('user_username');

		if(isset($username)):


			if($this->users->get_user($username)->user_type == 1 || $this->users->get_user($username)->user_type == 3):

				$permission = $this->users->check_permission($username);
				$data['employee_management'] = $permission->employee_management;
				$data['notifications'] = $this->employees->get_notifications(0);

				$data['payroll_management'] = $permission->payroll_management;
				$data['biometrics'] = $permission->biometrics;
				$data['user_management'] = $permission->user_management;
				$data['configuration'] = $permission->configuration;
				$data['payroll_configuration'] = $permission->payroll_configuration;
				$data['hr_configuration'] = $permission->hr_configuration;
				$data['configuration'] = $permission->configuration;
				$data['user_data'] = $this->users->get_user($username);

				$data['employees'] = $this->employees->view_employees();
				$data['users'] = $this->users->view_users();
				$data['departments'] = $this->hr_configurations->view_departments();
				$data['leaves'] = $this->employees->get_employees_leaves();

				$date = date('Y-m-d', time());
				$data['present_employees'] = $this->biometric->check_today_attendance($date);

				$data['online_users'] = $this->get_online_users();

				$data['total_income_month'] = $this->get_total_income_month();
				$data['total_deduction_month'] = $this->get_total_deduction_month();
				$data['total_income_year'] = $this->get_total_income_year();
				$data['total_deduction_year'] = $this->get_total_deduction_year();
				$data['pending_loans'] = $this->loans->count_pending_loans();
				$data['running_loans'] = $this->loans->count_running_loans();
				$data['personalized_employees'] = $this->payroll_configurations->count_personalized_employees();
				$data['categorized_employees'] = $this->payroll_configurations->count_categorized_employees();
				$data['variational_payments'] = $this->payroll_configurations->count_variational_payments();
				$data['is_payroll_routine_run'] = $this->is_payroll_routine_run();
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();
				$data['pending_leaves'] = $this->employees->count_pending_leaves();
				$data['approved_leaves'] = $this->employees->count_approved_leaves();
				$data['finished_leaves'] = $this->employees->count_finished_leaves();
				$data['upcoming_leaves'] = $this->employees->get_upcoming_leaves();
				$data['open_queries'] = $this->employees->count_open_queries();
				$data['pending_trainings'] = $this->employees->count_pending_trainings();
				$data['running_appraisals'] = $this->employees->count_running_appraisals();
				$data['finished_appraisals'] = $this->employees->count_finished_appraisals();
				$data['hr_documents'] = $this->hr_configurations->view_hr_documents();

				$this->load->view('index', $data);
			elseif($this->users->get_user($username)->user_type == 2):

				redirect('employee_main');
			endif;



		else:
			redirect('login');
		endif;

//		$user_data = array(
//			'user_username' => 'administrator',
//			'user_email'=> 'admin@admin.com',
//			'user_password'=> password_hash('password1234', PASSWORD_BCRYPT),
//			'user_name' => 'Administrator Administrator',
//			'user_status' => '1'
//		);
//
//		$permission_data = array(
//			'username' => 'administrator',
//			'employee_management'=> 1,
//			'payroll_management' => 1,
//			'biometrics' => 1,
//			'user_management' => 1
//
//		);
//
//		$user_data = $this->security->xss_clean($user_data);
//		$permission_data = $this->security->xss_clean($permission_data);
//
//
//		$query = $this->users->add($user_data, $permission_data);
//
//
//
//		echo $query;
	}

	public function logout(){

		$user_username = $this->session->userdata('user_username');

		if(isset($user_username)):

			$log_array = array(
				'log_user_id' => $this->users->get_user($user_username)->user_id,
				'log_description' => "Logged Out"
			);

			$query = $this->logs->add_log($log_array);

			if($query == true):

			$user_token_data = array(
				'user_token' => null,
			);
			$user_token_data = $this->security->xss_clean($user_token_data);
			$query = $this->users->update_token($user_username, $user_token_data);
			$this->session->unset_userdata('user_username');
			  $this->session->unset_userdata('login_time');
			  $this->session->sess_destroy();
			redirect('/login');
			endif;

		else:
			redirect('/access_denied');

		endif;


	}

	public function auth_login(){
		$this->employees->check_leave_end_date(date('yy-m-d'));

		$user_username = $this->session->userdata('user_username');



		if(isset($user_username)):
			redirect('home');
		else:

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if(empty($username) || empty($password)):
				$errormsg = ' ';
				$error_msg = array('error' => $errormsg);
				$data['error'] = $errormsg;

				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$this->load->view('auth/login', $data);
			else:
				$data = array(
				'user_username' => $username,
				'password' => $password
				);
				$data = $this->security->xss_clean($data);
				$query = $this->users->login($data);
				$time = time();
				if($query == true):
					if($this->users->get_user($username)->user_status > 0):

						$check_user_login = $this->users->check_user_login($username);
						$user_token = $check_user_login->user_token;

						if(empty($user_token)):
							$user_token_data = array(
								'user_token' => $time
							);
							$user_token_data = $this->security->xss_clean($user_token_data);
							$query = $this->users->update_token($username, $user_token_data);
							if($query == true):
								$log_array = array(
									'log_user_id' => $this->users->get_user($username)->user_id,
									'log_description' => "Logged In"
								);

								$this->logs->add_log($log_array);
								if($this->users->get_user($username)->user_type == 1 || $this->users->get_user($username)->user_type == 3):
									$dat = array(
										'notification_counts'=> count($this->employees->get_notifications(0)),
									);
									$this->session->set_userdata($dat);
								redirect('home');
								elseif($this->users->get_user($username)->user_type == 2):

									$employee_id = $this->employees->get_employee_by_unique($username)->employee_id;

									$trainings =  $this->employees->get_employee_training($employee_id);

									$count_training = 0;

									foreach ($trainings as $training):
										if($training->employee_training_status == 0):
											$count_training++;

										endif;

									endforeach;

									if($count_training > 0):
										$notification_data = array(
											'notification_employee_id'=> $employee_id,
											'notification_link'=> 'my_trainings',
											'notification_type' => 'You Have A Pending Training',
											'notification_status'=> 0
										);

										$this->employees->insert_notifications($notification_data);
									endif;
									$dat = array(
										'notification_counts'=> count($this->employees->get_notifications($employee_id)),
									);
									$this->session->set_userdata($dat);

									redirect('employee_main');
								endif;
							endif;
						else:

							$diff = $time - $user_token;

							if($diff < 1800):
								$this->session->unset_userdata('user_username');
								$this->session->sess_destroy();
								$errormsg = 'You are Already Logged in';
								$error_msg = array(
								'error' => $errormsg
								);

								$data['error'] = $errormsg;

								$data['csrf_name'] = $this->security->get_csrf_token_name();
								$data['csrf_hash'] = $this->security->get_csrf_hash();

								$this->load->view('auth/login', $data);
							elseif ($diff >=1800):
								$user_token_data = array(
									'user_token' => $time
								);
								$user_token_data = $this->security->xss_clean($user_token_data);
								$query = $this->users->update_token($username, $user_token_data);
								if($query == true):


									$log_array = array(
										'log_user_id' => $this->users->get_user($username)->user_id,
										'log_description' => "Logged In"
									);

									$this->logs->add_log($log_array);
									if($this->users->get_user($username)->user_type == 1 || $this->users->get_user($username)->user_type == 3):

										$data['notifications'] = count($this->employees->get_notifications(0));

									$dat = array(
											'notification_counts'=> count($this->employees->get_notifications(0)),
												);
										$this->session->set_userdata($dat);

									redirect('home');


									elseif($this->users->get_user($username)->user_type == 2):

										$employee_id = $this->employees->get_employee_by_unique($username)->employee_id;

										$trainings =  $this->employees->get_employee_training($employee_id);

										$count_training = 0;

										foreach ($trainings as $training):
											if($training->employee_training_status == 0):
												$count_training++;

											endif;

										endforeach;

										if($count_training > 0):
											$notification_data = array(
												'notification_employee_id'=> $employee_id,
												'notification_link'=> 'my_trainings',
												'notification_type' => 'You Have A Pending Training',
												'notification_status'=> 0
											);

											$this->employees->insert_notifications($notification_data);
										endif;

										$dat = array(
											'notification_counts'=> count($this->employees->get_notifications($employee_id)),
										);
										$this->session->set_userdata($dat);


										redirect('employee_main');
									endif;
								endif;
							endif;

						endif;
					else:
						$errormsg = 'Account Deactivated';
						$error_msg = array(
							'error' => $errormsg
						);
						$data['error'] = $errormsg;

						$data['csrf_name'] = $this->security->get_csrf_token_name();
						$data['csrf_hash'] = $this->security->get_csrf_hash();

						$this->load->view('auth/login', $data);

					endif;
				else:
					$errormsg = 'Invalid Username or Password     ';
					$error_msg = array(
						'error' => $errormsg
					);
					$data['error'] = $errormsg;

					$data['csrf_name'] = $this->security->get_csrf_token_name();
					$data['csrf_hash'] = $this->security->get_csrf_hash();

					$this->load->view('auth/login', $data);


				endif;
			endif;
		endif;

		}

	public function access_denied(){
			$user_username = $this->session->userdata('user_username');

			if(isset($user_username)):

				$this->load->view('auth/access_denied');


			else:
				redirect('/login');

			endif;


		}

	public function error_404(){
		$user_username = $this->session->userdata('user_username');

		if(isset($user_username)):

			$this->load->view('auth/error_404');


		else:
			redirect('/login');

		endif;


	}

	public function timestamp(){
    date_default_timezone_set('Africa/Lagos');
		echo $timestamp = date('D j M, Y g:i:s a');
  }

	public function get_online_users() {
		$online_users = $this->users->view_online_users();
		foreach ($online_users as $key => $user) {
			if ($user->user_token == '' || ((time() - $user->user_token) / 60) > 120){
				unset($online_users[$key]);
			}
		}
		return $online_users;
	}

	public function get_income_statistics() {
		$income_payments = $this->payroll_configurations->get_income_payments();
		$income_payments_id = array();
		foreach ($income_payments as $income_payment) {
			$income_payments_id[] = $income_payment->payment_definition_id;
		}
		echo $income_salaries = json_encode($this->salaries->get_salaries_by_payment_id($income_payments_id));
	}

	public function get_deduction_statistics() {
		$deduction_payments = $this->payroll_configurations->get_deduction_payments();
		$deduction_payments_id = array();
		foreach ($deduction_payments as $deduction_payment) {
			$deduction_payments_id[] = $deduction_payment->payment_definition_id;
		}
		echo $deduction_salaries = json_encode($this->salaries->get_salaries_by_payment_id($deduction_payments_id));
	}

	public function get_total_income_month(){
		$income_payments = $this->payroll_configurations->get_income_payments();
		$income_payments_id = array();
		foreach ($income_payments as $income_payment) {
			$income_payments_id[] = $income_payment->payment_definition_id;
		}
		$salaries_current_month = $this->salaries->get_salaries_current_month($income_payments_id);
		$sum = 0;
		foreach($salaries_current_month as $salary_current_month) {
			$sum += $salary_current_month->salary_amount;
		}
		return $sum;
	}

	public function get_total_income_year(){
		$income_payments = $this->payroll_configurations->get_income_payments();
		$income_payments_id = array();
		foreach ($income_payments as $income_payment) {
			$income_payments_id[] = $income_payment->payment_definition_id;
		}
		$salaries_current_year = $this->salaries->get_salaries_current_year($income_payments_id);
		$sum = 0;
		foreach($salaries_current_year as $salary_current_year) {
			$sum += $salary_current_year->salary_amount;
		}
		return $sum;
	}

	public function get_total_deduction_month(){
		$deduction_payments = $this->payroll_configurations->get_deduction_payments();
		$deduction_payments_id = array();
		foreach ($deduction_payments as $deduction_payment) {
			$deduction_payments_id[] = $deduction_payment->payment_definition_id;
		}
		$salaries_current_month = $this->salaries->get_salaries_current_month($deduction_payments_id);
		$sum = 0;
		foreach($salaries_current_month as $salary_current_month) {
			$sum += $salary_current_month->salary_amount;
		}
		return $sum;
	}

	public function get_total_deduction_year(){
		$deduction_payments = $this->payroll_configurations->get_deduction_payments();
		$deduction_payments_id = array();
		foreach ($deduction_payments as $deduction_payment) {
			$deduction_payments_id[] = $deduction_payment->payment_definition_id;
		}
		$salaries_current_year = $this->salaries->get_salaries_current_year($deduction_payments_id);
		$sum = 0;
		foreach($salaries_current_year as $salary_current_year) {
			$sum += $salary_current_year->salary_amount;
		}
		return $sum;
	}

	public function is_payroll_routine_run(){
		$current_month = date('m');
//	  $current_month = 10;
		$current_year = date('Y');

		$salaries = $this->salaries->view_salaries();
		$check_salary = 0;
		foreach ($salaries as $salary):
			if(($salary->salary_pay_month == $current_month) && ($salary->salary_pay_year == $current_year)):
				$check_salary ++;
			endif;
		endforeach;
		if($check_salary > 0):
			return true;
		else:
			return false;
		endif;
	}

	public function forgot_password(){

		$username = $this->session->userdata('user_username');

		if(isset($username)):

			redirect('home');
			else:
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$this->load->view('auth/forgot_password', $data);

				endif;
	}

	public function forgot_password_action(){

		$method = $this->input->server('REQUEST_METHOD');


		if($method == 'POST' || $method == 'Post' || $method == 'post'):

			extract($_POST);

		$details = $this->users->get_user_email($official_email);

		if(!empty($details)):

			$token = random_string('alnum', 4);


			$token_array = array(
				'password_reset_user_name' => $details->user_username,
				'password_reset_token' => $token,
				'password_reset_time' => date("Y-m-d H:i:s"),
			);

			$query = $this->users->insert_token($token_array);
			//$query = true;

			if($query == true):

				$dat = array(
					'password_token'=>$token,

				);
				$this->session->set_userdata($dat);


				$subject='Token For Password Reset On iHumane - Interactive Human Resource Management System';
				$config = Array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'priority' => '1'
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

				$this->email->from('support@ihumane.net', 'iHumane');

				$this->email->to($official_email);  // replace it with receiver mail id
				$this->email->subject($subject); // replace it with relevant subject

				$data = array(
					'token' => $token,
					'name' => $details->user_name,
					'email' => $official_email

				);

				$body = $this->load->view('emails/password_reset',$data,TRUE);
				$this->email->message($body);
				$this->email->send();

				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();
				$this->load->view('auth/token', $data);

				else:

					$msg = array(
						'msg'=> 'Account Could Not be Found',
						'location' => site_url('forgot_password'),
						'type' => 'error'

					);
					$this->load->view('swal', $msg);

					endif;


			else:

				$msg = array(
					'msg'=> 'Account Could Not be Found',
					'location' => site_url('forgot_password'),
					'type' => 'error'

				);
				$this->load->view('swal', $msg);

				endif;



			else:

				redirect('error_404');

				endif;
	}

	public function reset_password(){

		$method = $this->input->server('REQUEST_METHOD');


		if($method == 'POST' || $method == 'Post' || $method == 'post'):

			extract($_POST);

			$details = $this->users->get_user_email($official_email);

			$password_resets = $this->users->get_token($details->user_username);

			$trials = count($password_resets);

			$token = $password_resets[$trials - 1]->password_reset_token;
			$date = $password_resets[$trials - 1]->password_reset_time;

			$start_date = new DateTime($date);
			$time_diff = $start_date->diff(new DateTime(date("Y-m-d H:i:s")));

			if($time_diff->i > 10):


				$msg = array(
					'msg'=> 'Token Has Expired',
					'location' => site_url('forgot_password'),
					'type' => 'error'

				);
				$this->load->view('swal', $msg);

				else:

				if($token == $entered_token):

					$new_password = random_string('alnum', 8);

					$user_array = array(

						'user_password'=> password_hash($new_password, PASSWORD_BCRYPT),

					);

					$query_user = $this->users->update_user($details->user_id, $user_array);

					if($query_user == true):

						$subject='New Password For iHumane - Interactive Human Resource Management System';
						$config = Array(
							'mailtype' => 'html',
							'charset' => 'utf-8',
							'priority' => '1'
						);
						$this->load->library('email', $config);
						$this->email->set_newline("\r\n");

						$this->email->from('support@ihumane.net', 'iHumane');

						$this->email->to($official_email);  // replace it with receiver mail id
						$this->email->subject($subject); // replace it with relevant subject

						$data = array(

							'name' => $details->user_name,
							'password' => $new_password

						);

						$body = $this->load->view('emails/new_password',$data,TRUE);
						$this->email->message($body);
						$this->email->send();
						$msg = array(
							'msg'=> 'Password Reset Successfully, Check your Email.',
							'location' => site_url('login'),
							'type' => 'success'

						);
						$this->load->view('swal', $msg);

						else:
							$msg = array(
								'msg'=> 'An Error Occurred',
								'location' => site_url('login'),
								'type' => 'error'

							);
							$this->load->view('swal', $msg);

							endif;


					else:
						$msg = array(
							'msg'=> 'Token Doesnt Match',
							'location' => site_url('forgot_password'),
							'type' => 'error'

						);
						$this->load->view('swal', $msg);


						endif;



					endif;








		else:

			redirect('error_404');

		endif;


	}


}
