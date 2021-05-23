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
			$this->load->model('payroll_configurations');
			$this->load->model('salaries');
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
		
		public function new_account(){
			
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
						$method = $this->input->server('REQUEST_METHOD');
						if($method == 'POST' || $method == 'Post' || $method == 'post'):
//							if($_POST['type'] == 1):
								if($_POST['type'] == 0):
									$parent = $_POST['account_type'];
								else:
									$parent = $_POST['parent_account'];
								endif;
								
								$coa_data = array(
									'glcode' => $_POST['gl_code'],
									'account_name' => $_POST['account_name'],
									'account_type' => $_POST['account_type'],
									'type' => $_POST['type'],
									'bank' => $_POST['bank'],
									'parent_account' => $parent,
									'note' =>	$_POST['note'],
									'created_at' => date('Y-m-d H:i:s')
								
								);
								
								$query = $this->accountings->add_coa($coa_data);
								
								if($query == true):
									$msg = array(
										'msg' => 'Account Added Sucessfully',
										'location' => site_url('chart_of_accounts'),
										'type' => 'success'
									);
									$this->load->view('swal', $msg);
								
								
								endif;
							
//							endif;
							
//							if($_POST['type'] == 2):
//
//								$pbank_data = array(
//									'bank_id' => $_POST['bank_id'],
//									'branch' => $_POST['bank_branch'],
//									'account_no' => $_POST['bank_account_number'],
//									'description' => $_POST['bank_description'],
//									'glcode' =>	$_POST['bank_gl_code']
//
//								);
//
//								$query = $this->accountings->update_pbank($_POST['pbank_id'], $pbank_data);
//
//								if($query == true):
//									$msg = array(
//										'msg' => 'Bank Added Sucessfully',
//										'location' => site_url('phronesis_banks'),
//										'type' => 'success'
//									);
//									$this->load->view('swal', $msg);
//
//
//								endif;
//
//
//							endif;
						
						
						
						
						
						endif;
						
						
						if($method == 'GET' || $method == 'Get' || $method == 'get'):
							$data['notifications'] = $this->employees->get_notifications(0);
							$data['coas'] = $this->accountings->view_coas();
							$data['banks'] = $this->hr_configurations->view_banks();
							$data['pbanks'] = $this->accountings->view_pbanks();
							$data['employees'] = $this->employees->view_employees();
							$data['user_data'] = $this->users->get_user($username);
							$data['csrf_name'] = $this->security->get_csrf_token_name();
							$data['csrf_hash'] = $this->security->get_csrf_hash();
//							$data['paccounts'] = $this->accountings->view_parent_account();
							
							$this->load->view('accounting/new_coa', $data);
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
		
		
		public function phronesis_banks(){
			
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
						
						$method = $this->input->server('REQUEST_METHOD');
						if($method == 'POST' || $method == 'Post' || $method == 'post'):
							if($_POST['type'] == 1):
								$pbank_data = array(
									'bank_id' => $_POST['bank_id'],
									'branch' => $_POST['bank_branch'],
									'account_no' => $_POST['bank_account_number'],
									'description' => $_POST['bank_description'],
									'glcode' =>	$_POST['bank_gl_code']
								
								);
								
								$query = $this->accountings->add_pbank($pbank_data);
								
								if($query == true):
									$msg = array(
										'msg' => 'Bank Added Sucessfully',
										'location' => site_url('phronesis_banks'),
										'type' => 'success'
									);
									$this->load->view('swal', $msg);
							
								
								endif;
							
							endif;
							
							if($_POST['type'] == 2):
								
								$pbank_data = array(
									'bank_id' => $_POST['bank_id'],
									'branch' => $_POST['bank_branch'],
									'account_no' => $_POST['bank_account_number'],
									'description' => $_POST['bank_description'],
									'glcode' =>	$_POST['bank_gl_code']
								
								);
								
								$query = $this->accountings->update_pbank($_POST['pbank_id'], $pbank_data);
								
								if($query == true):
									$msg = array(
										'msg' => 'Bank Added Sucessfully',
										'location' => site_url('phronesis_banks'),
										'type' => 'success'
									);
									$this->load->view('swal', $msg);
								
								
								endif;
							
							
							endif;
							
							
							
					
							
							endif;
						
						
						if($method == 'GET' || $method == 'Get' || $method == 'get'):
							$data['notifications'] = $this->employees->get_notifications(0);
							$data['coas'] = $this->accountings->view_coas();
							$data['banks'] = $this->hr_configurations->view_banks();
							$data['pbanks'] = $this->accountings->view_pbanks();
							$data['employees'] = $this->employees->view_employees();
							$data['user_data'] = $this->users->get_user($username);
							$data['csrf_name'] = $this->security->get_csrf_token_name();
							$data['csrf_hash'] = $this->security->get_csrf_hash();
							
							$this->load->view('accounting/bank', $data);
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
		
		public function journal_voucher(){
			
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
						
						$method = $this->input->server('REQUEST_METHOD');
						if($method == 'POST' || $method == 'Post' || $method == 'post'):
							
							$cr_total = 0;
							$dr_total = 0;
							//return dd($this->request->getPost('credit_amount'));
							for($i = 0; $i<count($_POST['debit_amount']); $i++):
								$dr_total += str_replace(',', '',$_POST['debit_amount'][$i]);
							endfor;
							
							for($i = 0; $i<count($_POST['credit_amount']); $i++):
								$cr_total +=  str_replace(',', '',$_POST['credit_amount'][$i]);
							endfor;
							
							
							
							
							if($cr_total == $dr_total){
								
								for($n = 0; $n<count($_POST['debit_amount']); $n++){
									if($_POST['debit_amount'][$n] > 0):
										
										$account = $this->accountings->get_coa($_POST['debit_account'][$n]);
										$data = array(
											'glcode' => $_POST['debit_account'][$n],
											'posted_by'=>$username,
											'narration' => $_POST['debit_narration'][$n],
											'dr_amount' => str_replace(',', '',$_POST['debit_amount'][$n]),
											'cr_amount' => 0,
											'ref_no' => $_POST['entry_no'],
											'bank' => $account->bank,
											'ob' => 0,
											'created_at' => $_POST['issue_date'],
											'gl_transaction_date' => $_POST['issue_date']
										
										);
										$k = $this->accountings->save_gl($data);
										//$i = $this->jv->save($data);
										
//										echo "Debit Account:".'<br>';
//
//										print_r($data);
//
//										echo '<br>';
									endif;
								}
								for($n = 0; $n<count($_POST['credit_amount']); $n++){
									
									if($_POST['credit_amount'][$n] > 0):
										$account = $this->accountings->get_coa($_POST['credit_account'][$n]);
										$data = array(
											'glcode' => $_POST['credit_account'][$n],
											'posted_by'=>$username,
											'narration' => $_POST['credit_narration'][$n],
											'dr_amount' => 0,
											'cr_amount' => str_replace(',', '',$_POST['credit_amount'][$n]),
											'ref_no' => $_POST['entry_no'],
											'bank' => $account->bank,
											'ob' => 0,
											'created_at' => $_POST['issue_date'],
											'gl_transaction_date' => $_POST['issue_date']
										);
										
										$i = $this->accountings->save_gl($data);
										
//										echo "Credit Account:".'<br>';
//
//										print_r($data);
//
//										echo '<br>';
//										//$k = $this->jv->save($data);
									endif;
								}

								if($i && $k):

									$data = array(
										'msg' => 'Action successful',
										'type' => 'success',
										'location' => base_url('journal_voucher')

									);
									
									$this->load->view('swal', $data);

								else:
									$data = array(
										'msg' => 'An error occurred',
										'type' => 'error',
										'location' => base_url('journal_voucher')

									);
									
									$this->load->view('swal', $data);
								endif;
								//session()->flash("success", "<strong>Success!</strong> New journal entry save.");
								// return $this->response->redirect(site_url('/journal-voucher'));
							}
							else{
								//session()->flash("error", "<strong>Ooops!</strong> The value of DR must be same with CR. Try again.");
								
								$data = array(
									'msg' => 'Total DR must equal Total CR',
									'type' => 'error',
									'location' => base_url('/journal-voucher')
								
								);
								
								$this->load->view('swal', $data);
								// return $this->response->redirect(site_url('/journal-voucher'));
							}
						
						
						
						
						
						
						
						
						endif;
						
						
						if($method == 'GET' || $method == 'Get' || $method == 'get'):
							$data['notifications'] = $this->employees->get_notifications(0);
							$data['accounts'] = $this->accountings->view_coas();
							$data['banks'] = $this->hr_configurations->view_banks();
							$data['pbanks'] = $this->accountings->view_pbanks();
							$data['employees'] = $this->employees->view_employees();
							$data['user_data'] = $this->users->get_user($username);
							$data['csrf_name'] = $this->security->get_csrf_token_name();
							$data['csrf_hash'] = $this->security->get_csrf_hash();
							
							$this->load->view('accounting/journal_voucher', $data);
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
						
						$method = $this->input->server('REQUEST_METHOD');
						if($method == 'POST' || $method == 'Post' || $method == 'post'):
							
							
							$salaries = $this->salaries->view_salaries();
							
							$check_salary = 0;
							foreach ($salaries as $salary):
								
								if(($salary->salary_pay_month == $_POST['month']) && ($salary->salary_pay_year == $_POST['year']) && ($salary->salary_posted == 1)):
									
									$check_salary ++;
								
								endif;
							
							endforeach;
							
							if($check_salary > 0):
								
								$msg = array(
									'msg'=> 'Payroll Journal Already Posted for Selected Month',
									'location' => site_url('payroll_report'),
									'type' => 'error'
								
								);
								$this->load->view('swal', $msg);
							
							
							else:
							
							
							$ref = time();
							$account = $this->accountings->get_coa(51201);
							$data = array(
								'glcode' => 51201,
								'posted_by'=>$username,
								'narration' => $_POST['narration'],
								'dr_amount' => str_replace(',', '',$_POST['income']),
								'cr_amount' => 0,
								'ref_no' => $ref,
								'bank' => $account->bank,
								'ob' => 0,
								'created_at' => date('Y-m-d'),
								'gl_transaction_date' => date('Y-m-d')
							
							);
//							echo "salary".'<br>';
//
//							print_r($data);
							$k = $this->accountings->save_gl($data);
							
							$deduction_array = json_decode($_POST['deduction_array']);
							
						foreach ($deduction_array as $deduction):

							$glcode = 	'213'.substr($deduction->payment_code, 1);

							if(!empty($deduction->amount) || (!is_null($deduction->amount))):

								$account = $this->accountings->get_coa($glcode);
							
								$data = array(
									'glcode' => $glcode,
									'posted_by'=>$username,
									'narration' => $account->account_name." ".$_POST['narration'],
									'dr_amount' => 0,
									'cr_amount' => $deduction->amount,
									'ref_no' => $ref,
									'bank' => $account->bank,
									'ob' => 0,
									'created_at' => date('Y-m-d'),
									'gl_transaction_date' => date('Y-m-d')

								);
								$i = $this->accountings->save_gl($data);
								endif;

								
							endforeach;
							
							if($i && $k):
//
									$payroll_data = array(
										'salary_posted' => 1
									);
									$payroll_data = $this->security->xss_clean($payroll_data);
									
									$query = $this->salaries->post_payroll($_POST['month'], $_POST['year'], $payroll_data);
									
									$data = array(
										'msg' => 'Action successful',
										'type' => 'success',
										'location' => base_url('payroll_report')

									);

									$this->load->view('swal', $data);

								else:
									$data = array(
										'msg' => 'An error occurred',
										'type' => 'error',
										'location' => base_url('payroll_report')

									);

									$this->load->view('swal', $data);
								
								endif;
							
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
		
		public function accounting_policy_config(){
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
						
						$method = $this->input->server('REQUEST_METHOD');
						
						
						
						if($method == 'GET' || $method == 'Get' || $method == 'get'):
							$data['notifications'] = $this->employees->get_notifications(0);
							$data['coas'] = $this->accountings->view_coas();
							$data['banks'] = $this->hr_configurations->view_banks();
							$data['pbanks'] = $this->accountings->view_pbanks();
							$data['employees'] = $this->employees->view_employees();
							$data['user_data'] = $this->users->get_user($username);
							$data['csrf_name'] = $this->security->get_csrf_token_name();
							$data['csrf_hash'] = $this->security->get_csrf_hash();
							
							$this->load->view('accounting/policy_config', $data);
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
		
		public function  get_parent_account(){
			$account_type = $_POST['account_type'];
			$data = $this->accountings->view_parent_account($account_type);
			echo json_encode($data);
			
			}
		
		
	}
