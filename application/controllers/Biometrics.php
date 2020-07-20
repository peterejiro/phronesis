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

				if ($permission->employee_management == 1):


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

	public function check_reg(){

		$employee_id = $this->uri->segment(2);
		$current = $this->uri->segment(3);

		$ct = $this->biometric->get_employee_biometric($employee_id);

		$ct = count($ct);
		//$data1['ct'];

		if (intval($ct) > intval($current)) {
			$res['result'] = true;
			$res['current'] = intval($ct);
		}
		else
		{
			$res['result'] = false;
		}
		echo json_encode($res);

	}

	public function reg(){

		$employee_id 	= $employee_id = $this->uri->segment(2);

		$time_limit_reg = "15";
		$time_limit_ver = "10";

		echo "$employee_id;SecurityKey;".$time_limit_reg.";".site_url('process_register').";".site_url('getac');

	}

	public function process_register(){

		if (isset($_POST['RegTemp']) && !empty($_POST['RegTemp'])) {



			$data 		= explode(";",$_POST['RegTemp']);
			$vStamp 	= $data[0];
			$sn 		= $data[1];
			$employee_id	= $data[2];
			$regTemp 	= $data[3];

			//$device = getDeviceBySn($sn);
			$ac = '';
			$vkey ='';

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

				echo "empty";

			} else {

				$msg = "Parameter invalid..";

				echo site_url('messages')."/".$msg;

				//echo $base_path."messages.php?msg=$msg";

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


		if (!empty($employee_id)) {

			$time= date('Y-m-d H:i:s', strtotime($_GET['time']));

			echo $employee_id." login success on ".date('Y-m-d H:i:s', strtotime($time));

		}  else {

			$msg = "Parameter invalid..";

			echo "$msg";

		}

	}

	public function clock_in(){
		$employee_id = $this->uri->segment(2);

		//$user_id 	= $_GET['user_id'];
		$finger		= getUserFinger($user_id);

		echo "$user_id;".$finger[0]['finger_data'].";SecurityKey;".$time_limit_ver.";".$base_path."process_verification.php;".$base_path."getac.php".";extraParams";


	}
}
