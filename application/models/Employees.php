<?php


class Employees extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('session');

	}




	public function view_employees(){
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->join('grade', 'grade.grade_id = employee.employee_grade_id');
		$this->db->join('job_role', 'job_role.job_role_id = employee.employee_job_role_id');
		$this->db->join('department', 'department.department_id = job_role.department_id');
		$this->db->join('bank', 'bank.bank_id = employee.employee_bank_id');
		$query = $this->db->get()->result();
		return $query;

	}

	public function get_employee($employee_id){
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->join('grade', 'grade.grade_id = employee.employee_grade_id');
		$this->db->join('job_role', 'job_role.job_role_id = employee.employee_job_role_id');
		$this->db->join('department', 'department.department_id = job_role.department_id');
		$this->db->where('employee_id', $employee_id);
		$query = $this->db->get()->row();

		if($query->employee_salary_structure_category == 0):
			return $query;
		else:

			$this->db->select('*');
			$this->db->from('employee');
			$this->db->join('grade', 'grade.grade_id = employee.employee_grade_id');
			$this->db->join('job_role', 'job_role.job_role_id = employee.employee_job_role_id');
			$this->db->join('department', 'department.department_id = job_role.department_id');
			$this->db->join('salary_structure_category', 'salary_structure_category.salary_structure_id = employee.employee_salary_structure_category');
			$this->db->where('employee_id', $employee_id);
			$query = $this->db->get()->row();


			return $query;
		endif;



	}

	public function update_employee($employee_id, $employee_data){

		$this->db->where('employee.employee_id', $employee_id);
		$this->db->update('employee', $employee_data);
		return true;


	}

	public function add_employee($employee_data){

		$this->db->insert('employee', $employee_data);
		return $this->db->insert_id();
	}

	public function add_work_experience($work_experience_data){

		$this->db->insert('work_experience', $work_experience_data);
		return true;
	}

	public function insert_other_document($other_document_data){

		$this->db->insert('other_document', $other_document_data);
		return true;
	}

	public function get_other_document($employee_id){
		$this->db->select('*');
		$this->db->from('other_document');
		$this->db->where('other_document_employee_id', $employee_id);
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_work_experience($employee_id){
		$this->db->select('*');
		$this->db->from('work_experience');
		$this->db->where('employee_id', $employee_id);
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_employee_by_salary_setup(){
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->join('grade', 'grade.grade_id = employee.employee_grade_id');
		$this->db->join('job_role', 'job_role.job_role_id = employee.employee_job_role_id');
		$this->db->join('department', 'department.department_id = job_role.department_id');
		//$this->db->group_by('employee_salary_structure_setup');
		$this->db->order_by('employee_salary_structure_setup', 'ASC');

		$query = $this->db->get()->result();
		return $query;

	}

	public function get_employees_by_department($department_id){
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->join('grade', 'grade.grade_id = employee.employee_grade_id');
		$this->db->join('job_role', 'job_role.job_role_id = employee.employee_job_role_id');
		$this->db->join('department', 'department.department_id = job_role.department_id');
		$this->db->where('department.department_id', $department_id);
		$this->db->where('employee.employee_status !=', 0);
		$this->db->where('employee.employee_status !=', 3);
		$query = $this->db->get()->result();
		return $query;

	}

	public function insert_employee_history($employee_history_data){
		$this->db->insert('employee_history', $employee_history_data);
		return true;

	}

	public function get_employees_transfers(){
		$this->db->select('*');
		$this->db->from('transfer');
		$this->db->join('employee', 'employee.employee_id = transfer.transfer_employee_id');
		$this->db->order_by('transfer_date', 'DESC');
		$query = $this->db->get()->result();
		return $query;

	}

	public function insert_transfer($transfer_data){
		$this->db->insert('transfer', $transfer_data);
		return true;

	}


	public function get_employees_leaves(){
		$this->db->select('*');
		$this->db->from('employee_leave');
		$this->db->join('employee', 'employee.employee_id = employee_leave.leave_employee_id');
		$this->db->join('leave_type', 'leave_type.leave_id = employee_leave.leave_leave_type');
		//$this->db->order_by('transfer_date', 'DESC');
		$query = $this->db->get()->result();
		return $query;

	}

	public function check_existing_employee_leaves($employee_id){
		$this->db->select('*');
		$this->db->from('employee_leave');
		$this->db->where('employee_leave.leave_employee_id', $employee_id);
		//$this->db->where('employee_leave.leave_status', 0 );
		//$this->db->or_where('employee_leave.leave_status', 1);
		$query = $this->db->get()->result();
		return $query;

	}

	public function insert_leave($data){

		$this->db->insert('employee_leave', $data);
		return true;
	}

	public function check_leave_end_date($date){
		$leave_array = array(
		'leave_status' => 2
		);
		$this->db->where('employee_leave.leave_end_date', $date);
		$this->db->update('employee_leave', $leave_array);
		return true;

	}

	public function get_leave($leave_id){
		$this->db->select('*');
		$this->db->from('employee_leave');
		$this->db->join('employee', 'employee.employee_id = employee_leave.leave_employee_id');
		$this->db->join('leave_type', 'leave_type.leave_id = employee_leave.leave_leave_type');
		$this->db->where('employee_leave.employee_leave_id', $leave_id);
		$query = $this->db->get()->row();
		return $query;
	}

	public function update_leave($leave_id, $leave_data){
		$this->db->where('employee_leave.employee_leave_id', $leave_id);
		$this->db->update('employee_leave', $leave_data);
		return true;

	}
}
