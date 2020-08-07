<?php


class Biometrics extends CI_Controller
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
		$this->load->model('biometric');
		$this->load->model('logs');
	}


	public function enroll_employee()
	{

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

				if ($permission->biometrics == 1):


					$data['employees'] = $this->employees->view_employees();
					$data['user_data'] = $this->users->get_user($username);
					$data['csrf_name'] = $this->security->get_csrf_token_name();
					$data['csrf_hash'] = $this->security->get_csrf_hash();

					$this->load->view('biometrics/enroll_employee', $data);
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

	public function biometrics_report()
	{

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

				if ($permission->biometrics == 1):


					$data['employees'] = $this->employees->view_employees();
					$data['user_data'] = $this->users->get_user($username);
					$data['csrf_name'] = $this->security->get_csrf_token_name();
					$data['csrf_hash'] = $this->security->get_csrf_hash();

					$this->load->view('biometrics/base', $data);
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

	public function today_present(){
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

				if ($permission->biometrics == 1):


					$data['employees'] = $this->employees->view_employees();
					$data['user_data'] = $this->users->get_user($username);
					$data['csrf_name'] = $this->security->get_csrf_token_name();
					$data['csrf_hash'] = $this->security->get_csrf_hash();

					$date = date('Y-m-d', time());

					$data['present_employees'] = $this->biometric->check_today_attendance($date);

					$this->load->view('biometrics/today_present', $data);
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

	public function today_absent(){
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

				if ($permission->biometrics == 1):


					$data['employees'] = $this->employees->view_employees();
					$data['user_data'] = $this->users->get_user($username);
					$data['csrf_name'] = $this->security->get_csrf_token_name();
					$data['csrf_hash'] = $this->security->get_csrf_hash();

					$date = date('Y-m-d', time());

					$data['present_employees'] = $this->biometric->check_today_attendance($date);

					$this->load->view('biometrics/today_absent', $data);
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

	public function present_employee(){
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

				if ($permission->biometrics == 1):


					$data['employees'] = $this->employees->view_employees();
					$data['user_data'] = $this->users->get_user($username);
					$data['csrf_name'] = $this->security->get_csrf_token_name();
					$data['csrf_hash'] = $this->security->get_csrf_hash();

					$date = date('Y-m-d', time());

					$data['present_employees'] = $this->biometric->check_today_attendance($date);

					$this->load->view('biometrics/_present_employee', $data);
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

	public function present_employeee(){

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

				if ($permission->biometrics == 1):


					$data['employees'] = $this->employees->view_employees();
					$data['user_data'] = $this->users->get_user($username);
					$data['csrf_name'] = $this->security->get_csrf_token_name();
					$data['csrf_hash'] = $this->security->get_csrf_hash();

					$date  = strtotime($this->input->post('date'));

					$date = date('Y-m-d', $date);

					$data['present_employees'] = $this->biometric->check_today_attendance($date);

					$data['date'] = $date;

					$this->load->view('biometrics/present_employee', $data);
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
	public function absent_employee(){
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

				if ($permission->biometrics == 1):


					$data['employees'] = $this->employees->view_employees();
					$data['user_data'] = $this->users->get_user($username);
					$data['csrf_name'] = $this->security->get_csrf_token_name();
					$data['csrf_hash'] = $this->security->get_csrf_hash();


					$this->load->view('biometrics/_absent_employee', $data);
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


	public function absent_employeee(){

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

				if ($permission->biometrics == 1):


					$data['employees'] = $this->employees->view_employees();
					$data['user_data'] = $this->users->get_user($username);
					$data['csrf_name'] = $this->security->get_csrf_token_name();
					$data['csrf_hash'] = $this->security->get_csrf_hash();

					$date  = strtotime($this->input->post('date'));

					$date = date('Y-m-d', $date);

					$data['present_employees'] = $this->biometric->check_today_attendance($date);

					$data['date'] = $date;

					$this->load->view('biometrics/absent_employee', $data);
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


	public function clockin()
	{

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

				if ($permission->biometrics == 1):


					$data['employees'] = $this->employees->view_employees();
					$data['user_data'] = $this->users->get_user($username);
					$data['csrf_name'] = $this->security->get_csrf_token_name();
					$data['csrf_hash'] = $this->security->get_csrf_hash();

					$this->load->view('biometrics/clock_in', $data);
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

	public function checkreg(){

//		$employee_id = $this->uri->segment(2);
//		$current = $this->uri->segment(3);

		$employee_id = $_GET['username'];
		$current = $_GET['current'];

		$ct = $this->biometric->get_employee_biometric($employee_id);

		$ct = count($ct);
		//$data1['ct'];

		if (intval($ct) > intval($current)) :
			$res['result'] = true;
			$res['current'] = intval($ct);

		else:

			$res['result'] = true;

			//echo json_encode($res);

		endif;

		echo json_encode($res);

	}

	public function reg(){

		$employee_id 	= $employee_id = $this->uri->segment(2);

		$time_limit_reg = "15";
		$time_limit_ver = "10";

		echo "$employee_id;SecurityKey;".$time_limit_reg.";".site_url('process_register').";".site_url('getac');

	}

	public function process_register(){

//		$time_limit_reg = "15";
//		$employee_id = 10;
//
//		$posttemp = "$employee_id;SecurityKey;".$time_limit_reg.";".site_url('process_register').";".site_url('getac');

		if (isset($_POST['RegTemp']) && !empty($_POST['RegTemp'])) {

			$data 		= explode(";",$_POST['RegTemp']);
				//$data 		= explode(";",$posttemp);
			$vStamp 	= $data[0];
			$sn 		= $data[1];
			$employee_id	= $data[2];
			$regTemp 	= $data[3];

			//$device = getDeviceBySn($sn);
			$ac = 'DGV0602B3056554A166725BH';
			$vkey ='5960CA099F0C050F1109EB8BEADB5BFA';

			//$salt = md5($device[0]['ac'].$device[0]['vkey'].$regTemp.$sn.$employee_id);

			$salt = md5($ac.$vkey.$regTemp.$sn.$employee_id);

			if (strtoupper($vStamp) == strtoupper($salt)) {

//				$sql1 		= "SELECT MAX(finger_id) as fid FROM demo_finger WHERE user_id=".$user_id;
//				$result1 	= mysql_query($sql1);
//				$data 		= mysql_fetch_array($result1);
				$fid 		= $this->biometric->get_max_finger_id($employee_id)->employee_biometrics_finger_id;

				if ($fid == 0) {

					$finger_array = array(
					'employee_biometrics_employee' => $employee_id,
						'employee_biometrics_finger_id' =>$fid+1,
						'employee_biometrics_data' => $regTemp
					);

					$result2 = $this->biometric->insert($finger_array);

					if ($result2) {
						$res['result'] = true;
					} else {
						$res['server'] = "Error insert registration data!";
					}
				} else {
					$res['result'] = false;
					$res['user_finger_'.$employee_id] = "Template already exist.";
				}



			} else {

				$msg = "Parameter invalid..";

				echo site_url('messages')."/".$msg;


			}


		}
	}

	public function messages(){

		$msg = $this->uri->segment(2);


		if (!empty($msg)) {

			echo $msg;

		}  else {

			$msg = "Parameter invalid..";

			echo "$msg";

		}


	}

	public function message(){

		$employee_id = $this->uri->segment(2);
		if($employee_id == 'a'){
			$msg = "Parameter invalid..";

			echo "$msg";

		}else{
			$time= date('Y-m-d H:i:s', time());

			$data['employee'] = $this->employees->get_employee($employee_id);
			$data['login_time'] = $time;


			$this->load->view('biometrics/clock_in_success', $data);





			//echo $employee_id." login success on ".date('Y-m-d H:i:s', strtotime($time));

		}

	}

	public function clock_in(){
		$employee_id = $this->uri->segment(2);

		$finger = $this->biometric->get_employee_biometric($employee_id);


		$time_limit_ver = "10";

		echo "$employee_id;".$finger[0]->employee_biometrics_data.";SecurityKey;".$time_limit_ver.";".site_url('process_verification').";".site_url('getac').";extraParams";


	}

	public function process_verification(){
		if (isset($_POST['VerPas']) && !empty($_POST['VerPas'])) {



			$data 	= explode(";",$_POST['VerPas']);
			$employee_id	= $data[0];
			$vStamp 	= $data[1];
			$time 		= $data[2];
			$sn 		= $data[3];

			$fingerData = $this->biometric->get_employee_biometric($employee_id);

			$user_name	= $employee_id;
			$sn = 'DX00F000388';
			$vkey = '5960CA099F0C050F1109EB8BEADB5BFA';
			$vc ='42319B9B191739D';


			$salt = md5($sn.$fingerData[0]->employee_biometrics_data.$vc.$time.$employee_id.$vkey);

			if (strtoupper($vStamp) == strtoupper($salt)) {

				$log = array(
					'employee_biometrics_login_employee_id' => $employee_id
				);

				$query = $this->biometric->insert_login($log);

				if ($query == true) {

					echo site_url('message')."/".$employee_id;

				} else {

					echo site_url('message')."/a";

				}

			} else {

				$msg = "Parameter invalid..";

				echo site_url('message')."/a";

			}
		}

	}

	public function getac(){


		$ac ='DGV0602B3056554A166725BH';
		$sn ='DX00F000388';
		echo $ac.$sn;
	}

	public function clock_attendance(){
		$data['employees'] = $this->employees->view_employees();

		$data['csrf_name'] = $this->security->get_csrf_token_name();
		$data['csrf_hash'] = $this->security->get_csrf_hash();

		$this->load->view('biometrics/clockin', $data);

	}
}
