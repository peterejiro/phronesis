<?php
	
	
	class Hr_report extends CI_Controller
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
			$this->load->model('hr_reports');
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
				
				if($permission->employee_management == 1):
					$user_type = $this->users->get_user($username)->user_type;
					
					if($user_type == 1 || $user_type == 3):
						
						$data['user_data'] = $this->users->get_user($username);
						$data['employees'] = $this->employees->get_employee_by_salary_setup();
						
						
						$this->load->view('hr_report/base', $data);
					
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
		
		public function new_hire(){
			
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
				
				if($permission->employee_management == 1):
					$user_type = $this->users->get_user($username)->user_type;
					
					if($user_type == 1 || $user_type == 3):
						
						$data['user_data'] = $this->users->get_user($username);
						$data['employees'] = $this->employees->get_employee_by_salary_setup();
						
						
						$this->load->view('hr_report/new_hire_base', $data);
					
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
		
		public function top_performer(){
			
			$username = $this->session->userdata('user_username');
			
			if(isset($username)):
				
				$method = $this->input->server('REQUEST_METHOD');
				
				if($method == 'GET' || $method == 'Get' || $method == 'get'):
				
						$permission = $this->users->check_permission($username);
						$data['employee_management'] = $permission->employee_management;
						$data['notifications'] = $this->employees->get_notifications(0);
						$data['payroll_management'] = $permission->payroll_management;
						$data['biometrics'] = $permission->biometrics;
						$data['user_management'] = $permission->user_management;
						$data['configuration'] = $permission->configuration;
						$data['payroll_configuration'] = $permission->payroll_configuration;
						$data['hr_configuration'] = $permission->hr_configuration;
					
					if($permission->employee_management == 1):
							$user_type = $this->users->get_user($username)->user_type;
							
							if($user_type == 1 || $user_type == 3):
								
								$data['user_data'] = $this->users->get_user($username);
								$data['subsidiarys'] = $this->hr_configurations->view_subsidiarys();
								$data['departments'] = $this->hr_configurations->view_departments();
								$data['roles'] = $this->hr_configurations->view_job_roles();
								$data['csrf_name'] = $this->security->get_csrf_token_name();
								$data['csrf_hash'] = $this->security->get_csrf_hash();
								
								
								$this->load->view('hr_report/_top_performer', $data);
							
							else:
								redirect('/access_denied');
							endif;
						else:
							
							redirect('/access_denied');
						
						endif;
					endif;
				
				
				
				
				$method = $this->input->server('REQUEST_METHOD');
				
				if($method == 'POST' || $method == 'Post' || $method == 'post'):
					
					$job_role = $_POST['job_role'];
					$subsidiary = $_POST['subsidiary'];
					$from_date = $_POST['from_date'];
					$to_date = $_POST['to_date'];
					//print_r($_POST);
					
					/*
					 *
					 *
					 *
					 * please if you have a faint knowledge as it pertains to array, you might want to think twice before attempting to alter any semi column here
					 *
					 *
					 *
					 *
					 *
					 */
							$a_results = array();
					
							if(($job_role == 'all') && ($subsidiary == 'all')):
								// filter by only date
								
								$temps = $this->hr_reports->get_top_performer_all($from_date, $to_date);
							
								$i = 0;
								foreach ($temps as $temp):
									$appraisal_id = $temp->employee_appraisal_id;
									$questions = $this->employees->get_appraisal_questions($appraisal_id);
									
									$count_quantitative = 0;
									$quantitative_score = 0;
									$count_qualitative = 0;
									$qualitative_score = 0;
									
								
									
									foreach ($questions as $question):
											if($question->employee_appraisal_result_type == 2):
												$answer = $question-> employee_appraisal_result_answer;
												$count_quantitative++;
												$quantitative_score = $quantitative_score + $answer;
										endif;
										
										if($question->employee_appraisal_result_type == 3):
											$answer = $question-> employee_appraisal_result_answer;
											$count_qualitative++;
											$qualitative_score = $qualitative_score + $answer;

										endif;
										
										
										endforeach;
									
									$score = ((($quantitative_score/($count_quantitative * 5)) * (20/100)) + (($qualitative_score/($count_qualitative * 5)) * (80/100)));
									$temp->score = $score * 100;
									
									$a_results[$i] = $temp;
									
									$i++;
									
									endforeach;
								
									
									//print_r($a_result);
								
								
							endif;
							
							
							if(($job_role != 'all') && ($subsidiary == 'all')):
							
								//filter by date and job role
								
								$temps = $this->hr_reports->get_top_performer_job_role($from_date, $to_date, $job_role);
								
								$i = 0;
								foreach ($temps as $temp):
									$appraisal_id = $temp->employee_appraisal_id;
									$questions = $this->employees->get_appraisal_questions($appraisal_id);
									
									$count_quantitative = 0;
									$quantitative_score = 0;
									$count_qualitative = 0;
									$qualitative_score = 0;
									
									
									
									foreach ($questions as $question):
										if($question->employee_appraisal_result_type == 2):
											$answer = $question-> employee_appraisal_result_answer;
											$count_quantitative++;
											$quantitative_score = $quantitative_score + $answer;
										endif;
										
										if($question->employee_appraisal_result_type == 3):
											$answer = $question-> employee_appraisal_result_answer;
											$count_qualitative++;
											$qualitative_score = $qualitative_score + $answer;
										
										endif;
									
									
									endforeach;
									
									$score = ((($quantitative_score/($count_quantitative * 5)) * (20/100)) + (($qualitative_score/($count_qualitative * 5)) * (80/100)));
									$temp->score = $score * 100;
									
									$a_results[$i] = $temp;
									
									$i++;
								
								endforeach;
							
							endif;
							
							
							
							if(($job_role == 'all') && ($subsidiary != 'all')):
							
								//filter by date and subsidiary
								
								
								$temps = $this->hr_reports->get_top_performer_job_role($from_date, $to_date, $subsidiary);
								
								$i = 0;
								foreach ($temps as $temp):
									$appraisal_id = $temp->employee_appraisal_id;
									$questions = $this->employees->get_appraisal_questions($appraisal_id);
									
									$count_quantitative = 0;
									$quantitative_score = 0;
									$count_qualitative = 0;
									$qualitative_score = 0;
									
									
									
									foreach ($questions as $question):
										if($question->employee_appraisal_result_type == 2):
											$answer = $question-> employee_appraisal_result_answer;
											$count_quantitative++;
											$quantitative_score = $quantitative_score + $answer;
										endif;
										
										if($question->employee_appraisal_result_type == 3):
											$answer = $question-> employee_appraisal_result_answer;
											$count_qualitative++;
											$qualitative_score = $qualitative_score + $answer;
										
										endif;
									
									
									endforeach;
									
									$score = ((($quantitative_score/($count_quantitative * 5)) * (20/100)) + (($qualitative_score/($count_qualitative * 5)) * (80/100)));
									$temp->score = $score * 100;
									
									$a_results[$i] = $temp;
									
									$i++;
								
								endforeach;
							
							
							endif;
							
							
							if(($job_role != 'all') && ($subsidiary != 'all')):
							
								//filter by date, job role and subsidiary
								
								$temps = $this->hr_reports->get_top_performer_al($from_date, $to_date, $job_role, $subsidiary);
								
								$i = 0;
								foreach ($temps as $temp):
									$appraisal_id = $temp->employee_appraisal_id;
									$questions = $this->employees->get_appraisal_questions($appraisal_id);
									
									$count_quantitative = 0;
									$quantitative_score = 0;
									$count_qualitative = 0;
									$qualitative_score = 0;
									
									
									
									foreach ($questions as $question):
										if($question->employee_appraisal_result_type == 2):
											$answer = $question-> employee_appraisal_result_answer;
											$count_quantitative++;
											$quantitative_score = $quantitative_score + $answer;
										endif;
										
										if($question->employee_appraisal_result_type == 3):
											$answer = $question-> employee_appraisal_result_answer;
											$count_qualitative++;
											$qualitative_score = $qualitative_score + $answer;
										
										endif;
									
									
									endforeach;
									
									$score = ((($quantitative_score/($count_quantitative * 5)) * (20/100)) + (($qualitative_score/($count_qualitative * 5)) * (80/100)));
									$temp->score = $score * 100;
									
									$a_results[$i] = $temp;
									
									$i++;
								
								endforeach;
							
							endif;
							
							$employees = $this->employees->view_employees();
							
							$f_results = array();
							$r = 0;
							foreach ($employees as $employee):
								if($employee->employee_status == 1 || $employee->employee_status == 2):
									$count = 0;
								$score = 0;
								$average_score = 0;
									foreach ($a_results as $a_result):
										if($a_result->employee_id == $employee->employee_id):
											$count++;
										
											$score = $a_result->score + $score;
											
											$average_score = $score/$count;
											
											$employee->a_score = $average_score;
											
											$f_results[$r] = $employee;
											
											
											
										endif;
									
									
									
									
									endforeach;
									
									
									endif;
								
								$r++;
								endforeach;
					
					$permission = $this->users->check_permission($username);
					$data['employee_management'] = $permission->employee_management;
					$data['notifications'] = $this->employees->get_notifications(0);
					$data['payroll_management'] = $permission->payroll_management;
					$data['biometrics'] = $permission->biometrics;
					$data['user_management'] = $permission->user_management;
					$data['configuration'] = $permission->configuration;
					$data['payroll_configuration'] = $permission->payroll_configuration;
					$data['hr_configuration'] = $permission->hr_configuration;
			
					$data['from_date'] = $from_date;
					$data['to_date'] = $to_date;
					$data['f_results'] = $f_results;
					$data['user_data'] = $this->users->get_user($username);
					
					
					
					$this->load->view('hr_report/top_performer', $data);
				
					
					endif;
			else:
				redirect('/login');
			endif;
			
		}
		
		
	}
