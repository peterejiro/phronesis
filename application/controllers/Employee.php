<?php


class Employee extends CI_Controller
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

	public function employee(){

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

			if($permission->employee_management == 1):

				$data['employees'] = $this->employees->view_employees();
				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$this->load->view('employee/employee', $data);

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function new_employee(){
		error_reporting(0);
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


			if($permission->employee_management == 1):

//				$data['employees'] = $this->users->view_employees();

				$data['grades'] = $this->hr_configurations->view_grades();
				$data['roles'] = $this->hr_configurations->view_job_roles();
				$data['qualifications'] = $this->hr_configurations->view_qualifications();
				$data['banks'] = $this->hr_configurations->view_banks();
				$data['locations'] = $this->hr_configurations->view_locations();
				$data['health_insurances'] = $this->hr_configurations->view_health_insurances();
				$data['pensions'] = $this->hr_configurations->view_pensions();
				$data['subsidiarys'] = $this->hr_configurations->view_subsidiarys();
				$employee_unique_id = "ihumane_".random_string('alnum', 3);

				$employee_check = $this->employees->get_employee($employee_unique_id);

				while(!empty($employee_check)):
					$employee_check = $this->employees->get_employee($employee_unique_id);
				endwhile;

				$errormsg = ' ';
				$error_msg = array('error' => $errormsg);
				$data['error'] = $errormsg;

				$data['unique_id'] = $employee_unique_id;
				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$this->load->view('employee/new_employee', $data);

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;


	}

	public function add_employee(){
		error_reporting(0);
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

			if($permission->employee_management == 1):
				$config['upload_path'] = 'uploads/employee_passports';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '8000000';
				$config['max_width'] = '102452';
				$config['max_height'] = '768555';
				//$config['overwrite'] = TRUE;
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);
				$upload = $this->upload->do_upload('employee_passport');

				if(!$upload):
					echo $this->upload->display_errors();
					die();
				else:
					$file_data = $this->upload->data();
					$employee_passport_name = $file_data['file_name'];
				endif;


				$config2['upload_path'] = 'uploads/employee_nysc';
				$config2['allowed_types'] = 'gif|jpg|png|pdf';
				$config2['max_size'] = '8000000';
				$config2['max_width'] = '102452';
				$config2['max_height'] = '768555';
				//$config2['overwrite'] = TRUE;
				$config2['encrypt_name'] = TRUE;

				$this->upload->initialize($config2);
				$upload = $this->upload->do_upload('employee_nysc');

				if(!$upload):
					echo $this->upload->display_errors();
					die();
				else:
					$file_data = $this->upload->data();
					$employee_nysc_name = $file_data['file_name'];
				endif;

				$employee_unique_id = $this->input->post('employee_unique_id');
				$employee_first_name = $this->input->post('employee_first_name');
				$employee_last_name = $this->input->post('employee_last_name');
				$employee_other_name = $this->input->post('employee_other_name');
				$employee_personal_email = $this->input->post('employee_personal_email');
				$employee_official_email = $this->input->post('employee_official_email');
				$employee_dob = $this->input->post('employee_dob');
				$employee_phone_number = $this->input->post('employee_phone_number');
				$employee_address = $this->input->post('employee_address');
				$employee_grade = $this->input->post('employee_grade');
				$employee_job_role = $this->input->post('employee_job_role');
				$employee_qualification = $this->input->post('employee_qualification');
				$employee_location = $this->input->post('location');
				$check_experience = $this->input->post('check_experience');
				$company_name = $this->input->post('company_name');
				$job_description = $this->input->post('job_description');
				$experience_start_date = $this->input->post('experience_start_date');
				$experience_end_date = $this->input->post('experience_end_date');
				$employee_account_number = $this->input->post('employee_account_number');
				$employee_bank = $this->input->post('employee_bank');
				$nysc_pass_out = $this->input->post('nysc_pass_out');
				$employment_start_date = $this->input->post('employment_start_date');
				$employment_stop_date = $this->input->post('employment_stop_date');
				$employment_status = $this->input->post('employment_status');
				$employee_others = $this->input->post('employee_others');
				$employee_subsidiary = $this->input->post('subsidiary');
				$employee_pensionable = $this->input->post('employee_pensionable');

				if($employee_pensionable == 1):
					$employee_pension_number = $this->input->post('employee_pension_number');
					$employee_pension_id = $this->input->post('employee_pension_id');
				else:
					$employee_pension_number = null;
					$employee_pension_id = null;

					endif;


				$employee_hmo_number = $this->input->post('employee_hmo_number');
				$employee_hmo_id = $this->input->post('employee_hmo_id');
				$employee_paye_number = $this->input->post('employee_paye_number');



				$employee_data = array(
					'employee_unique_id' => $employee_unique_id,
					'employee_first_name' => $employee_first_name,
					'employee_other_name' => $employee_other_name,
					'employee_last_name' => $employee_last_name,
					'employee_dob' => $employee_dob,
					'employee_personal_email' => $employee_personal_email,
					'employee_official_email' => $employee_official_email,
					'employee_phone_number' => $employee_phone_number,
					'employee_qualification' => json_encode($employee_qualification),
					'employee_address' => $employee_address,
					'employee_location_id' => $employee_location,
					'employee_job_role_id' => $employee_job_role,
					'employee_grade_id' => $employee_grade,
					'employee_account_number' => $employee_account_number,
					'employee_bank_id' => $employee_bank,
					'employee_nysc_details' => $nysc_pass_out,
					'employee_employment_date' => $employment_start_date,
					'employee_stop_date' => $employment_stop_date,
					'employee_status' => $employment_status,
					'employee_passport' => $employee_passport_name,
					'employee_pension_number' => $employee_pension_number,
					'employee_pensionable' => $employee_pensionable,
					'employee_pension_id' => $employee_pension_id,
					'employee_hmo_number' => $employee_hmo_number,
					'employee_hmo_id' => $employee_hmo_id,
					'employee_nysc_document' => $employee_nysc_name,
					'employee_paye_number' => $employee_paye_number,
					'employee_subsidiary_id' => $employee_subsidiary

				);

				$employee_data = $this->security->xss_clean($employee_data);

				$employee_id = $this->employees->add_employee($employee_data);
				$k = 0;

				while($k < count($employee_others)):
					$employee_other_document_name = $employee_others[$k];

					$others_array = array(
						'other_document_employee_id' => $employee_id,
						'other_document_name'=> $employee_other_document_name
					);

					$this->employees->insert_other_document($others_array);
					$k++;
				endwhile;

				$i = 0;
				while($i < count($company_name)):

					if($company_name[$i] == ''):
					else:
					$new_array = array(
						'employee_id' => $employee_id,
						'company_name' => $company_name[$i],
						'job_description' => $job_description[$i],
						'start_date' => $experience_start_date[$i],
						'end_date' => $experience_end_date[$i]
					);
					$new_array = $this->security->xss_clean($new_array);
					$this->employees->add_work_experience($new_array);
					endif;
					$i++;
				endwhile;

				if(isset($employee_id)):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Added New Employee"
					);

					$this->logs->add_log($log_array);

					$msg = array(
						'msg'=> 'New Employee Added Successfully',
						'location' => site_url('employee'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);
				else:
					$msg = array(
						'msg'=> 'An Error Occurred',
						'location' => site_url('new_employee'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				endif;
			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;


	}

	public function employee_upload_others(){

		$config['upload_path'] = 'uploads/employee_others';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
		$config['max_size'] = '8000000';
		$config['max_width'] = '102452';
		$config['max_height'] = '768555';
		$config['encrypt_name'] = TRUE;
		//$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
		$this->upload->do_upload('file');



		$file_data = $this->upload->data();
		echo $file_data['file_name'];

	}

	public function view_employee(){
		$employee_id = $this->uri->segment(2);


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


			if($permission->employee_management == 1):
				$errormsg = ' ';
				$error_msg = array('error' => $errormsg);
				$data['error'] = $errormsg;
				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$data['grades'] = $this->hr_configurations->view_grades();
				$data['roles'] = $this->hr_configurations->view_job_roles();
				$data['qualifications'] = $this->hr_configurations->view_qualifications();
				$data['banks'] = $this->hr_configurations->view_banks();
				$data['locations'] = $this->hr_configurations->view_locations();
				$data['health_insurances'] = $this->hr_configurations->view_health_insurances();
				$data['pensions'] = $this->hr_configurations->view_pensions();
				$data['subsidiarys'] = $this->hr_configurations->view_subsidiarys();

				$data['work_experiences'] = $this->employees->get_work_experience($employee_id);

				$data['employee'] = $this->employees->get_employee($employee_id);

				$data['other_documents'] = $this->employees->get_other_document($employee_id);


				if(empty($data['employee'])):

					redirect('/access_denied');
				else:

					$this->load->view('employee/view_employee',$data);
				endif;


					else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function update_employee(){

		$employee_id = $this->uri->segment(2);


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


			if($permission->employee_management == 1):
				$errormsg = ' ';
				$error_msg = array('error' => $errormsg);
				$data['error'] = $errormsg;
				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$data['grades'] = $this->hr_configurations->view_grades();
				$data['roles'] = $this->hr_configurations->view_job_roles();
				$data['qualifications'] = $this->hr_configurations->view_qualifications();
				$data['banks'] = $this->hr_configurations->view_banks();
				$data['locations'] = $this->hr_configurations->view_locations();
				$data['health_insurances'] = $this->hr_configurations->view_health_insurances();
				$data['pensions'] = $this->hr_configurations->view_pensions();
				$data['subsidiarys'] = $this->hr_configurations->view_subsidiarys();

				$data['work_experiences'] = $this->employees->get_work_experience($employee_id);

				$data['employee'] = $this->employees->get_employee($employee_id);

				$data['other_documents'] = $this->employees->get_other_document($employee_id);




				if(empty($data['employee'])):

					redirect('/access_denied');
				else:

					$this->load->view('employee/update_employee',$data);
					endif;


			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function edit_employee(){

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


			if($permission->employee_management == 1):


				$employee_unique_id = $this->input->post('employee_unique_id');
				$employee_first_name = $this->input->post('employee_first_name');
				$employee_last_name = $this->input->post('employee_last_name');
				$employee_other_name = $this->input->post('employee_other_name');
				$employee_personal_email = $this->input->post('employee_personal_email');
				$employee_official_email = $this->input->post('employee_official_email');
				$employee_dob = $this->input->post('employee_dob');
				$employee_phone_number = $this->input->post('employee_phone_number');
				$employee_address = $this->input->post('employee_address');
				$employee_grade = $this->input->post('employee_grade');
				$employee_job_role = $this->input->post('employee_job_role');
				$employee_qualification = $this->input->post('employee_qualification');
				$employee_location = $this->input->post('location');
				$check_experience = $this->input->post('check_experience');
				$company_name = $this->input->post('company_name');
				$job_description = $this->input->post('job_description');
				$experience_start_date = $this->input->post('experience_start_date');
				$experience_end_date = $this->input->post('experience_end_date');
				$employee_account_number = $this->input->post('employee_account_number');
				$employee_bank = $this->input->post('employee_bank');
				$nysc_pass_out = $this->input->post('nysc_pass_out');
				$employment_start_date = $this->input->post('employment_start_date');
				$employment_stop_date = $this->input->post('employment_stop_date');
				$employment_status = $this->input->post('employment_status');
				$employee_others = $this->input->post('employee_others');
				$employee_pensionable = $this->input->post('employee_pensionable');
				$employee_subsidiary = $this->input->post('subsidiary');

				if($employee_pensionable == 1):
					$employee_pension_number = $this->input->post('employee_pension_number');
					$employee_pension_id = $this->input->post('employee_pension_id');
				else:
					$employee_pension_number = null;
					$employee_pension_id = null;

				endif;

				$employee_hmo_number = $this->input->post('employee_hmo_number');
				$employee_hmo_id = $this->input->post('employee_hmo_id');
				$employee_paye_number = $this->input->post('employee_paye_number');

				$employee_id = $this->input->post('employee_id');



				$employee_data = array(
					'employee_unique_id' => $employee_unique_id,
					'employee_first_name' => $employee_first_name,
					'employee_other_name' => $employee_other_name,
					'employee_last_name' => $employee_last_name,
					'employee_dob' => $employee_dob,
					'employee_personal_email' => $employee_personal_email,
					'employee_official_email' => $employee_official_email,
					'employee_phone_number' => $employee_phone_number,
					'employee_qualification' => json_encode($employee_qualification),
					'employee_address' => $employee_address,
					'employee_location_id' => $employee_location,
					'employee_job_role_id' => $employee_job_role,
					'employee_grade_id' => $employee_grade,
					'employee_account_number' => $employee_account_number,
					'employee_bank_id' => $employee_bank,
					'employee_nysc_details' => $nysc_pass_out,
					'employee_employment_date' => $employment_start_date,
					'employee_stop_date' => $employment_stop_date,
					'employee_pensionable' => $employee_pensionable,
					'employee_pension_number' => $employee_pension_number,
					'employee_pension_id' => $employee_pension_id,
					'employee_hmo_number' => $employee_hmo_number,
					'employee_hmo_id' => $employee_hmo_id,
					'employee_status' => $employment_status,
					'employee_paye_number' => $employee_paye_number,
					'employee_subsidiary_id' => $employee_subsidiary

				);

				$employee_data = $this->security->xss_clean($employee_data);

				$query = $this->employees->update_employee($employee_id, $employee_data);




				if($query == true):
					$log_array = array(
						'log_user_id' => $this->users->get_user($username)->user_id,
						'log_description' => "Update Employee Record"
					);

					$this->logs->add_log($log_array);

					$msg = array(
						'msg'=> 'Employee Updated Successfully',
						'location' => site_url('employee'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);
				else:
					$msg = array(
						'msg'=> 'An Error Occurred',
						'location' => site_url('new_employee'),
						'type' => 'success'

					);
					$this->load->view('swal', $msg);

				endif;
			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;



	}

	public function employee_transfer(){


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


			if($permission->employee_management == 1):
				$errormsg = ' ';
				$error_msg = array('error' => $errormsg);
				$data['error'] = $errormsg;
				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$data['grades'] = $this->hr_configurations->view_grades();
				$data['roles'] = $this->hr_configurations->view_job_roles();
				$data['qualifications'] = $this->hr_configurations->view_qualifications();
				$data['banks'] = $this->hr_configurations->view_banks();
				$data['locations'] = $this->hr_configurations->view_locations();
				$data['health_insurances'] = $this->hr_configurations->view_health_insurances();
				$data['pensions'] = $this->hr_configurations->view_pensions();
				$data['subsidiarys'] = $this->hr_configurations->view_subsidiarys();

				$data['transfers'] = $this->employees->get_employees_transfers();


				$this->load->view('employee/employee_transfer',$data);



			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function new_employee_transfer(){


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


			if($permission->employee_management == 1):
				$errormsg = ' ';
				$error_msg = array('error' => $errormsg);
				$data['error'] = $errormsg;
				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$data['grades'] = $this->hr_configurations->view_grades();
				$data['roles'] = $this->hr_configurations->view_job_roles();
				$data['qualifications'] = $this->hr_configurations->view_qualifications();
				$data['banks'] = $this->hr_configurations->view_banks();
				$data['locations'] = $this->hr_configurations->view_locations();
				$data['health_insurances'] = $this->hr_configurations->view_health_insurances();
				$data['pensions'] = $this->hr_configurations->view_pensions();
				$data['subsidiarys'] = $this->hr_configurations->view_subsidiarys();

				//$data['transfers'] = $this->employees->get_employees_transfers();
				$data['employees'] = $this->employees->view_employees();

				$this->load->view('employee/new_employee_transfer',$data);



			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function add_new_employee_transfer(){

		//error_reporting(0);
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


			if($permission->employee_management == 1):
				$employee_id = $this->input->post('employee_id');
				$transfer_type = $this->input->post('transfer_type');
				$subsidiary_id = $this->input->post('subsidiary_id');


				$location_id = $this->input->post('location_id');

				$employee = $this->employees->get_employee($employee_id);


				if($transfer_type == 0):
					$transfer_from = $employee->employee_location_id;
					$transfer_to = $location_id;

					if($transfer_from == $transfer_to):

						$msg = array(
							'msg'=> 'Employee already in this branch',
							'location' => site_url('employee_transfer'),
							'type' => 'warning'

						);
						$this->load->view('swal', $msg);

					endif;

					if($transfer_from != $transfer_to):

					$employee_data = array(
						'employee_location_id' => $location_id
					);
						$transfer_array = array(
							'transfer_employee_id' => $employee_id,
							'transfer_type' => $transfer_type,
							'transfer_from'=> $transfer_from,
							'transfer_to' => $transfer_to


						);

						$transfer_array = $this->security->xss_clean($transfer_array);

						$query = $this->employees->insert_transfer($transfer_array);



						$query = $this->employees->update_employee($employee_id, $employee_data);

						if($query == true):
							$log_array = array(
								'log_user_id' => $this->users->get_user($username)->user_id,
								'log_description' => "Initiated Employee Transfer"
							);

							$this->logs->add_log($log_array);

							$employee_history_array = array(
								'employee_history_employee_id' => $employee_id,
							'employee_history_details' =>'Transfer'

							);

							$this->employees->insert_employee_history($employee_history_array);

							$msg = array(
								'msg'=> 'Employee Transfer Successful',
								'location' => site_url('employee_transfer'),
								'type' => 'success'

							);
							$this->load->view('swal', $msg);
						else:
//					$msg = array(
//						'msg'=> 'An Error Occurred',
//						'location' => site_url('new_employee'),
//						'type' => 'success'
//
//					);
//					$this->load->view('swal', $msg);

						endif;

					endif;

				endif;

				if($transfer_type == 1):
					$transfer_from = $employee->employee_subsidiary_id;
					$transfer_to = $subsidiary_id;
					if($transfer_from == $transfer_to):

							$msg = array(
								'msg'=> 'Employee already in this subsidiary',
								'location' => site_url('employee_transfer'),
								'type' => 'warning'

							);
							$this->load->view('swal', $msg);
							endif;

						if($transfer_from != $transfer_to):

							$employee_data = array(
								'employee_subsidiary_id' => $subsidiary_id
							);

							$transfer_array = array(
								'transfer_employee_id' => $employee_id,
								'transfer_type' => $transfer_type,
								'transfer_from'=> $transfer_from,
								'transfer_to' => $transfer_to


							);

							$transfer_array = $this->security->xss_clean($transfer_array);

							$query = $this->employees->insert_transfer($transfer_array);



							$query = $this->employees->update_employee($employee_id, $employee_data);

							if($query == true):
								$log_array = array(
									'log_user_id' => $this->users->get_user($username)->user_id,
									'log_description' => "Initiated Employee Transfer"
								);

								$this->logs->add_log($log_array);

								$msg = array(
									'msg'=> 'Employee Transfer Successful',
									'location' => site_url('employee_transfer'),
									'type' => 'success'

								);
								$this->load->view('swal', $msg);
							else:
//					$msg = array(
//						'msg'=> 'An Error Occurred',
//						'location' => site_url('new_employee'),
//						'type' => 'success'
//
//					);
//					$this->load->view('swal', $msg);

							endif;

					endif;
				endif;



				//$this->load->view('employee/new_employee_transfer',$data);



			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}


	public function employee_leave(){

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


			if($permission->employee_management == 1):
				$errormsg = ' ';
				$error_msg = array('error' => $errormsg);
				$data['error'] = $errormsg;
				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();



				$data['leaves'] = $this->employees->get_employees_leaves();


				$this->load->view('employee/employee_leave',$data);



			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;


	}

	public function new_employee_leave(){

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


			if($permission->employee_management == 1):
				$errormsg = ' ';
				$error_msg = array('error' => $errormsg);
				$data['error'] = $errormsg;
				$data['user_data'] = $this->users->get_user($username);
				$data['csrf_name'] = $this->security->get_csrf_token_name();
				$data['csrf_hash'] = $this->security->get_csrf_hash();

				$data['leaves'] = $this->hr_configurations->view_leaves();
				$data['employees'] = $this->employees->view_employees();


				$this->load->view('employee/new_employee_leave', $data);



			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;


	}

	public function add_new_employee_leave(){


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


			if($permission->employee_management == 1):
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
									'msg'=> 'Employee Already Has Existing Leave',
									'location' => site_url('employee_leave'),
									'type' => 'error'

								);
								$this->load->view('swal', $msg);
							else:

								$leave_array = array(
									'leave_employee_id'=> $employee_id,
									'leave_leave_type' => $leave_id,
									'leave_start_date' => $start_date,
									'leave_end_date' => $end_date,
									'leave_status' => 1

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
										'msg'=> 'Leave Application Successful, Automatically approved because you are Administrator',
										'location' => site_url('employee_leave'),
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
						'leave_status' => 1

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
								'msg'=> 'Leave Application Successful, Automatically approved because you are Administrator',
								'location' => site_url('employee_leave'),
								'type' => 'success'

							);
							$this->load->view('swal', $msg);
							else:


							endif;

						endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function extend_leave(){

		$leave_id = $this->uri->segment(2);

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


			if($permission->employee_management == 1):
				$data['user_data'] = $this->users->get_user($username);
			$data['leave'] = $this->employees->get_leave($leave_id);
			$data['csrf_name'] = $this->security->get_csrf_token_name();
			$data['csrf_hash'] = $this->security->get_csrf_hash();

			$this->load->view('employee/extend_leave', $data);

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}

	public function extend_employee_leave(){
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


			if($permission->employee_management == 1):
				$leave_id = $this->input->post('leave_id');
				$leaf = $this->employees->get_leave($leave_id);

				$end_date = $this->input->post('end_date');


				if(empty($leave_id) || empty($end_date)):

					redirect('error_404');

				else:
					if($end_date < date('yy-m-d')):


						else:
							$leave_array = array(

								'leave_end_date' => $end_date
							);

						$query = $this->employees->update_leave($leave_id, $leave_array);

						if($query ==  true):

							$log_array = array(
								'log_user_id' => $this->users->get_user($username)->user_id,
								'log_description' => "Updated Employee Leave"
							);

							$this->logs->add_log($log_array);

							$employee_history_array = array(
								'employee_history_employee_id' => $leaf->leave_employee_id,
								'employee_history_details' =>'Leave Updated'

							);

							$this->employees->insert_employee_history($employee_history_array);

							$msg = array(
								'msg'=> 'Leave Updated',
								'location' => site_url('employee_leave'),
								'type' => 'success'

							);
							$this->load->view('swal', $msg);

							else:


							endif;

						endif;

					endif;

			else:

				redirect('/access_denied');

			endif;
		else:
			redirect('/login');
		endif;

	}


}
