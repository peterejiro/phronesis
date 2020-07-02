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


				//$data['employees'] = $this->employees->view_employees();
				$user_type = $this->users->get_user($username)->user_type;


				if($user_type == 2 || $user_type == 3):

				$data['user_data'] = $this->users->get_user($username);

				$data['employee'] = $this->employees->get_employee_by_unique($username);

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


	public function employee_history(){
		$username = $this->session->userdata('user_username');

		if(isset($username)):


			//$data['employees'] = $this->employees->view_employees();
			$user_type = $this->users->get_user($username)->user_type;


			if($user_type == 2 || $user_type == 3):

				$data['user_data'] = $this->users->get_user($username);

				$data['employee'] = $this->employees->get_employee_by_unique($username);

				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();


				$employee_id = $this->employees->get_employee_by_unique($username)->employee_id;

				$data['histories'] = $this->employees->view_employee_history($employee_id);


				//$this->load->view('log/view_logs', $data);

				$this->load->view('employee_self_service/employee_history', $data);

			elseif($user_type == 1):

				redirect('/access_denied');

			endif;


		else:
			redirect('/login');
		endif;

	}

	public function my_leave(){

		$username = $this->session->userdata('user_username');

		if(isset($username)):

			//$data['employees'] = $this->employees->view_employees();
			$user_type = $this->users->get_user($username)->user_type;


			if($user_type == 2 || $user_type == 3):

				$errormsg = ' ';
				$error_msg = array('error' => $errormsg);
				$data['error'] = $errormsg;
				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$employee_id = $this->employees->get_employee_by_unique($username)->employee_id;

				$data['leaves'] = $this->employees-> check_existing_employee_leaves($employee_id);



				$this->load->view('employee_self_service/employee_leave',$data);

			elseif($user_type == 1):

				redirect('/access_denied');

			endif;


		else:
			redirect('/login');
		endif;
	}

	public function request_leave(){

		$username = $this->session->userdata('user_username');

		if(isset($username)):

			//$data['employees'] = $this->employees->view_employees();
			$user_type = $this->users->get_user($username)->user_type;


			if($user_type == 2 || $user_type == 3):

				$errormsg = ' ';
				$error_msg = array('error' => $errormsg);
				$data['error'] = $errormsg;
				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();
				$data['employee'] = $this->employees->get_employee_by_unique($username);
				$data['leaves'] = $this->hr_configurations->view_leaves();
				//$data['employees'] = $this->employees->view_employees();


				$this->load->view('employee_self_service/new_employee_leave', $data);
			elseif($user_type == 1):

				redirect('/access_denied');

			endif;


		else:
			redirect('/login');
		endif;
	}


	public function request_new_leave(){

		$username = $this->session->userdata('user_username');

		if(isset($username)):

			//$data['employees'] = $this->employees->view_employees();
			$user_type = $this->users->get_user($username)->user_type;


			if($user_type == 2 || $user_type == 3):

				$employee_id = $this->input->post('employee_id');
				$leave_id = $this->input->post('leave_id');
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');


				$check_existing_leaves = $this->employees->check_existing_employee_leaves($employee_id);



				if(!empty($check_existing_leaves)):
					$count = 0;
					foreach ($check_existing_leaves as $check_existing_leave):

						if($check_existing_leave->leave_status == 0 || $check_existing_leave->leave_status == 1):
							$count++;
						endif;

					endforeach;

					if($count > 0):

						$msg = array(
							'msg'=> 'You have an Existing Leave',
							'location' => site_url('my_leave'),
							'type' => 'error'

						);
						$this->load->view('swal', $msg);
					else:

						$leave_array = array(
							'leave_employee_id'=> $employee_id,
							'leave_leave_type' => $leave_id,
							'leave_start_date' => $start_date,
							'leave_end_date' => $end_date,
							'leave_status' => 0

						);

						$leave_array = $this->security->xss_clean($leave_array);
						$query = $this->employees->insert_leave($leave_array);

						if($query == true):



							$msg = array(
								'msg'=> 'Leave Application Successful',
								'location' => site_url('my_leave'),
								'type' => 'success'

							);
							$this->load->view('swal', $msg);

						endif;

					endif;
				else:

					$leave_array = array(
						'leave_employee_id'=> $employee_id,
						'leave_leave_type' => $leave_id,
						'leave_start_date' => $start_date,
						'leave_end_date' => $end_date,
						'leave_status' => 0

					);

					$leave_array = $this->security->xss_clean($leave_array);
					$query = $this->employees->insert_leave($leave_array);

					if($query == true):

						$log_array = array(
							'log_user_id' => $this->users->get_user($username)->user_id,
							'log_description' => "Initiated Employee Transfer"
						);

						$this->logs->add_log($log_array);

						$employee_history_array = array(
							'employee_history_employee_id' => $employee_id,
							'employee_history_details' =>'Leave Application'

						);

						$this->employees->insert_employee_history($employee_history_array);

						$msg = array(
							'msg'=> 'Leave Application Successful',
							'location' => site_url('my_leave'),
							'type' => 'success'

						);
						$this->load->view('swal', $msg);
					else:


					endif;

				endif;
			elseif($user_type == 1):

				redirect('/access_denied');

			endif;


		else:
			redirect('/login');
		endif;
	}
}
