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

	}

	public function index(){

		$this->employees->check_leave_end_date(date('yy-m-d'));

		$username = $this->session->userdata('user_username');

		if(isset($username)):
			$permission = $this->users->check_permission($username);
			$data['employee_management'] = $permission->employee_management;
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


			if($this->users->get_user($username)->user_type == 1 || $this->users->get_user($username)->user_type == 3):

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

							redirect('home');
							elseif($this->users->get_user($username)->user_type == 2):

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

									redirect('home');
								elseif($this->users->get_user($username)->user_type == 2):

									redirect('employee_main');
								endif;
							endif;
						endif;

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
    echo $timestamp = date('F j, Y g:i:s a');
  }


}
