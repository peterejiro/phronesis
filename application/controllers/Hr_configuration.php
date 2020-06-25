<?php


class Hr_configuration extends CI_Controller
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

	public function bank(){

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

			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);

				$data['banks'] = $this->hr_configurations->view_banks();
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();



				$this->load->view('hr_config/bank', $data);





			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function add_bank(){
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

			if($permission->hr_configuration == 1):

				$data['user_data'] = $this->users->get_user($username);
				$bank_name = $this->input->post('bank_name');
				$bank_code = $this->input->post('bank_code');
				$bank_array = array(
					'bank_name'=>$bank_name,
					'bank_code' => $bank_code
				);
				$bank_array = $this->security->xss_clean($bank_array);
				$query = $this->hr_configurations->add_bank($bank_array);

				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Added A New Bank"
					);

					$this->logs->add_log($log_array);
					$msg = array(
						'msg'=> 'Bank Added Successfully',
						'location' => site_url('bank'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function update_bank(){
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

			if($permission->hr_configuration == 1):

				$data['user_data'] = $this->users->get_user($username);
				$bank_name = $this->input->post('bank_name');
				$bank_id = $this->input->post('bank_id');
				$bank_name = $this->input->post('bank_name');
				$bank_code = $this->input->post('bank_code');
				$bank_array = array(
					'bank_name'=>$bank_name,
					'bank_code' => $bank_code
				);
				$bank_array = $this->security->xss_clean($bank_array);
				$query = $this->hr_configurations->update_bank($bank_id, $bank_array);

				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Updated Bank Details"
					);

					$this->logs->add_log($log_array);
					$msg = array(
						'msg'=> 'Bank Updated Successfully',
						'location' => site_url('bank'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function location(){

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

			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);

				$data['locations'] = $this->hr_configurations->view_locations();
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();



				$this->load->view('hr_config/location', $data);





			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function add_location(){
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

			if($permission->hr_configuration == 1):

				$data['user_data'] = $this->users->get_user($username);
				$location_name = $this->input->post('location_name');
				$location_array = array(
					'location_name'=>$location_name
				);
				$location_array = $this->security->xss_clean($location_array);
				$query = $this->hr_configurations->add_location($location_array);

				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Added A New Branch"
					);

					$this->logs->add_log($log_array);

					$msg = array(
						'msg'=> 'Location Added Successfully',
						'location' => site_url('location'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function update_location(){
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

			if($permission->hr_configuration == 1):

				$data['user_data'] = $this->users->get_user($username);
				$location_name = $this->input->post('location_name');
				$location_id = $this->input->post('location_id');
				$location_array = array(
					'location_name'=>$location_name
				);
				$location_array = $this->security->xss_clean($location_array);
				$query = $this->hr_configurations->update_location($location_id, $location_array);

				if($query == true):

					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Updated A Branch"
					);

					$this->logs->add_log($log_array);

					$msg = array(
						'msg'=> 'Location Updated Successfully',
						'location' => site_url('location'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function grade(){

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
			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);
				$data['grades'] = $this->hr_configurations->view_grades();
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();


				$this->load->view('hr_config/grade', $data);



			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function add_grade(){
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
			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);

				$grade_name = $this->input->post('grade_name');
				$grade_array = array(
					'grade_name'=>$grade_name
				);
				$grade_array = $this->security->xss_clean($grade_array);
				$query = $this->hr_configurations->add_grade($grade_array);

				if($query == true):

					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Added A New Grade"
					);

					$this->logs->add_log($log_array);

					$msg = array(
						'msg'=> 'Grade Added Successfully',
						'location' => site_url('grade'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function update_grade(){
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

			if($permission->hr_configuration == 1):

				$data['user_data'] = $this->users->get_user($username);
				$grade_name = $this->input->post('grade_name');
				$grade_id = $this->input->post('grade_id');
				$grade_array = array(
					'grade_name'=>$grade_name
				);
				$grade_array = $this->security->xss_clean($grade_array);
				$query = $this->hr_configurations->update_grade($grade_id, $grade_array);

				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Updated A Grade"
					);

					$this->logs->add_log($log_array);
					$msg = array(
						'msg'=> 'Grade Updated Successfully',
						'location' => site_url('grade'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);


				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}


	public function qualification(){

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

			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);
				$data['qualifications'] = $this->hr_configurations->view_qualifications();
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();



				$this->load->view('hr_config/qualification', $data);





			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function add_qualification(){
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
			if($permission->hr_configuration == 1):

				$data['user_data'] = $this->users->get_user($username);
				$qualification_name = $this->input->post('qualification_name');
				$qualification_array = array(
					'qualification_name'=>$qualification_name
				);
				$qualification_array = $this->security->xss_clean($qualification_array);
				$query = $this->hr_configurations->add_qualification($qualification_array);

				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Added A New Qualification"
					);

					$this->logs->add_log($log_array);
					$msg = array(
						'msg'=> 'qualification Added Successfully',
						'location' => site_url('qualification'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function update_qualification(){
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

			if($permission->hr_configuration == 1):

				$data['user_data'] = $this->users->get_user($username);
				$qualification_name = $this->input->post('qualification_name');
				$qualification_id = $this->input->post('qualification_id');
				$qualification_array = array(
					'qualification_name'=>$qualification_name
				);
				$qualification_array = $this->security->xss_clean($qualification_array);
				$query = $this->hr_configurations->update_qualification($qualification_id, $qualification_array);

				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Updated Qualification"
					);

					$this->logs->add_log($log_array);
					$msg = array(
						'msg'=> 'qualification Updated Successfully',
						'location' => site_url('qualification'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);


				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}


	public function department(){

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

			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);
				$data['departments'] = $this->hr_configurations->view_departments();
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();



				$this->load->view('hr_config/department', $data);





			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function add_department(){
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

			if($permission->hr_configuration == 1):

				$data['user_data'] = $this->users->get_user($username);
				$department_name = $this->input->post('department_name');
				$department_array = array(
					'department_name'=>$department_name
				);
				$department_array = $this->security->xss_clean($department_array);
				$query = $this->hr_configurations->add_department($department_array);

				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Added New Department"
					);

					$this->logs->add_log($log_array);
					$msg = array(
						'msg'=> 'department Added Successfully',
						'location' => site_url('department'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function update_department(){
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

			if($permission->hr_configuration == 1):

				$data['user_data'] = $this->users->get_user($username);
				$department_name = $this->input->post('department_name');
				$department_id = $this->input->post('department_id');
				$department_array = array(
					'department_name'=>$department_name
				);
				$department_array = $this->security->xss_clean($department_array);
				$query = $this->hr_configurations->update_department($department_id, $department_array);

				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Updated Department"
					);

					$this->logs->add_log($log_array);
					$msg = array(
						'msg'=> 'department Updated Successfully',
						'location' => site_url('department'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);


				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}


	public function job_role(){

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

			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);
				$data['departments'] = $this->hr_configurations->view_departments();
				$data['job_roles'] = $this->hr_configurations->view_job_roles();
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();



				$this->load->view('hr_config/job_role', $data);





			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function add_job_role(){
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

			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);

				$job_role_name = $this->input->post('job_role_name');
				$department_id = $this->input->post('department_id');
				$job_description = $this->input->post('job_description');
				$job_role_array = array(
					'job_name'=>$job_role_name,
					'job_description' => $job_description,
					'department_id' => $department_id
				);
				$job_role_array = $this->security->xss_clean($job_role_array);
				$query = $this->hr_configurations->add_job_role($job_role_array);

				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Added A New Job Role"
					);

					$this->logs->add_log($log_array);

					$msg = array(
						'msg'=> 'job role Added Successfully',
						'location' => site_url('job_role'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function update_job_role(){
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

			if($permission->hr_configuration == 1):


				$data['user_data'] = $this->users->get_user($username);
				$job_role_id = $this->input->post('job_role_id');
				$job_role_name = $this->input->post('job_role_name');
				$department_id = $this->input->post('department_id');
				$job_description = $this->input->post('job_description');
				$job_role_array = array(
					'job_name'=>$job_role_name,
					'job_description' => $job_description,
					'department_id' => $department_id
				);
				$job_role_array = $this->security->xss_clean($job_role_array);

				$query = $this->hr_configurations->update_job_role($job_role_id, $job_role_array);

				if($query == true):

					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Update A Job Role"
					);

					$this->logs->add_log($log_array);

					$msg = array(
						'msg'=> 'job_role Updated Successfully',
						'location' => site_url('job_role'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);


				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function pension(){

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

			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);
				$data['departments'] = $this->hr_configurations->view_departments();
				$data['pensions'] = $this->hr_configurations->view_pensions();
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();



				$this->load->view('hr_config/pension', $data);





			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function add_pension(){
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

			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);


				$pension_provider = $this->input->post('pension_provider');

				$pension_array = array(
					'pension_provider'=>$pension_provider,
				);
				$pension_array = $this->security->xss_clean($pension_array);

				$query = $this->hr_configurations->add_pension($pension_array);

				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Added A New Pension"
					);

					$this->logs->add_log($log_array);
					$msg = array(
						'msg'=> 'Pension Provider Added Successfully',
						'location' => site_url('pension'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function update_pension(){
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

			if($permission->hr_configuration == 1):


				$data['user_data'] = $this->users->get_user($username);
				$pension_id = $this->input->post('pension_id');
				$pension_provider = $this->input->post('pension_provider');

				$pension_array = array(
					'pension_provider'=>$pension_provider,
				);
				$pension_array = $this->security->xss_clean($pension_array);

				$query = $this->hr_configurations->update_pension($pension_id, $pension_array);

				if($query == true):

					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Updated Pension"
					);

					$this->logs->add_log($log_array);

					$msg = array(
						'msg'=> 'Pension Updated Successfully',
						'location' => site_url('pension'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);


				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}


	public function health_insurance(){

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

			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);

				$data['health_insurances'] = $this->hr_configurations->view_health_insurances();
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();



				$this->load->view('hr_config/health_insurance', $data);





			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function add_health_insurance(){
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

			if($permission->hr_configuration == 1):
				$data['user_data'] = $this->users->get_user($username);


				$health_insurance_hmo = $this->input->post('health_insurance_hmo');

				$health_insurance_array = array(
					'health_insurance_hmo'=>$health_insurance_hmo,
				);
				$health_insurance_array = $this->security->xss_clean($health_insurance_array);

				$query = $this->hr_configurations->add_health_insurance($health_insurance_array);

				if($query == true):

					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Added A New HMO"
					);

					$this->logs->add_log($log_array);

					$msg = array(
						'msg'=> 'HMO Added Successfully',
						'location' => site_url('health_insurance'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function update_health_insurance(){
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

			if($permission->hr_configuration == 1):


				$data['user_data'] = $this->users->get_user($username);
				$health_insurance_id = $this->input->post('health_insurance_id');
				$health_insurance_hmo = $this->input->post('health_insurance_hmo');

				$health_insurance_array = array(
					'health_insurance_hmo'=>$health_insurance_hmo,
				);
				$health_insurance_array = $this->security->xss_clean($health_insurance_array);

				$query = $this->hr_configurations->update_health_insurance($health_insurance_id, $health_insurance_array);

				if($query == true):

					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Update a HMO"
					);

					$this->logs->add_log($log_array);

					$msg = array(
						'msg'=> 'HMO Updated Successfully',
						'location' => site_url('health_insurance'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);


				else:
					echo "An Error Occurred";
				endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}
}
