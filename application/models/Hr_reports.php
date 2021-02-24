<?php
	
	
	class Hr_reports extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->library('form_validation');
			$this->load->library('session');
			
		}
		
		public function get_top_performer_all($from_date, $to_date){
			$this->db->select('*');
			$this->db->from('employee_appraisal');
			$this->db->join('employee', 'employee.employee_id = employee_appraisal.employee_appraisal_employee_id');
			$this->db->join('job_role', 'job_role.job_role_id = employee.employee_job_role_id');
			$this->db->join('department', 'department.department_id = job_role.department_id');
			$this->db->join('subsidiary', 'subsidiary.subsidiary_id = employee.employee_subsidiary_id');
			$this->db->where('employee_appraisal.employee_appraisal_period_from >=', $from_date);
			$this->db->where('employee_appraisal.employee_appraisal_period_from <=', $to_date);
			$this->db->where('employee_appraisal.employee_appraisal_status', 1);
			return $this->db->get()->result();
		}
		
		public function get_top_performer_job_role($from_date, $to_date, $job_role){
			$this->db->select('*');
			$this->db->from('employee_appraisal');
			$this->db->join('employee', 'employee.employee_id = employee_appraisal.employee_appraisal_employee_id');
			$this->db->join('job_role', 'job_role.job_role_id = employee.employee_job_role_id');
			$this->db->join('department', 'department.department_id = job_role.department_id');
			$this->db->join('subsidiary', 'subsidiary.subsidiary_id = employee.employee_subsidiary_id');
			$this->db->where('employee_appraisal.employee_appraisal_period_from >=', $from_date);
			$this->db->where('employee_appraisal.employee_appraisal_period_from <=', $to_date);
			$this->db->where('employee_appraisal.employee_appraisal_status', 1);
			$this->db->where('employee.employee_job_role_id', $job_role);
			return $this->db->get()->result();
		}
		
		public function get_top_performer_subsidiary($from_date, $to_date, $subsidiary){
			$this->db->select('*');
			$this->db->from('employee_appraisal');
			$this->db->join('employee', 'employee.employee_id = employee_appraisal.employee_appraisal_employee_id');
			$this->db->join('job_role', 'job_role.job_role_id = employee.employee_job_role_id');
			$this->db->join('department', 'department.department_id = job_role.department_id');
			$this->db->join('subsidiary', 'subsidiary.subsidiary_id = employee.employee_subsidiary_id');
			$this->db->where('employee_appraisal.employee_appraisal_period_from >=', $from_date);
			$this->db->where('employee_appraisal.employee_appraisal_period_from <=', $to_date);
			$this->db->where('employee_appraisal.employee_appraisal_status', 1);
			$this->db->where('employee.employee_subsidiary_id', $subsidiary);
			return $this->db->get()->result();
		}
		
		public function get_top_performer_al($from_date, $to_date, $job_role, $subsidiary){
			$this->db->select('*');
			$this->db->from('employee_appraisal');
			$this->db->join('employee', 'employee.employee_id = employee_appraisal.employee_appraisal_employee_id');
			$this->db->join('job_role', 'job_role.job_role_id = employee.employee_job_role_id');
			$this->db->join('department', 'department.department_id = job_role.department_id');
			$this->db->join('subsidiary', 'subsidiary.subsidiary_id = employee.employee_subsidiary_id');
			$this->db->where('employee_appraisal.employee_appraisal_period_from >=', $from_date);
			$this->db->where('employee_appraisal.employee_appraisal_period_from <=', $to_date);
			$this->db->where('employee_appraisal.employee_appraisal_status', 1);
			$this->db->where('employee.employee_job_role_id', $job_role);
			$this->db->where('employee.employee_subsidiary_id', $subsidiary);
			return $this->db->get()->result();
		}
	}
