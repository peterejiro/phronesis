<?php


class Hr_configurations extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	// Bank setup begin
	public function add_bank($bank_data){

		$this->db->insert('bank', $bank_data);
		return true;
	}

	public function update_bank($bank_id, $bank_data){

		$this->db->where('bank.bank_id', $bank_id);
		$this->db->update('bank', $bank_data);
		return true;


	}

	public function view_banks(){

		$this->db->select('*');
		$this->db->from('bank');
		return $this->db->get()->result();

	}

	public function view_bank($bank_id){
		$this->db->select('*');
		$this->db->from('bank');
		$this->db->where('bank_id', $bank_id);
		$query = $this->db->get();
		return $query->row();

	}

	//Bank setup end

	// Grade setup begin
	public function add_grade($grade_data){

		$this->db->insert('grade', $grade_data);
		return true;
	}

	public function update_grade($grade_id, $grade_data){

		$this->db->where('grade.grade_id', $grade_id);
		$this->db->update('grade', $grade_data);
		return true;


	}

	public function view_grades(){

		$this->db->select('*');
		$this->db->from('grade');
		return $this->db->get()->result();

	}

	public function view_grade($grade_id){
		$this->db->select('*');
		$this->db->from('grade');
		$this->db->where('grade_id', $grade_id);
		$query = $this->db->get();
		return $query->row();

	}

	//Grade setup end

	//location setup begin
	public function add_location($location_data){

		$this->db->insert('location', $location_data);
		return true;
	}

	public function update_location($location_id, $location_data){

		$this->db->where('location.location_id', $location_id);
		$this->db->update('location', $location_data);
		return true;


	}

	public function view_locations(){

		$this->db->select('*');
		$this->db->from('location');
		return $this->db->get()->result();

	}

	public function view_location($location_id){
		$this->db->select('*');
		$this->db->from('location');
		$this->db->where('location_id', $location_id);
		$query = $this->db->get();
		return $query->row();

	}

	//location setup end

	//qualification setup begin
	public function add_qualification($qualification_data){

		$this->db->insert('qualification', $qualification_data);
		return true;
	}

	public function update_qualification($qualification_id, $qualification_data){

		$this->db->where('qualification.qualification_id', $qualification_id);
		$this->db->update('qualification', $qualification_data);
		return true;


	}

	public function view_qualifications(){

		$this->db->select('*');
		$this->db->from('qualification');
		return $this->db->get()->result();

	}

	public function view_qualification($qualification_id){
		$this->db->select('*');
		$this->db->from('bank');
		$this->db->where('qualification_id', $qualification_id);
		$query = $this->db->get();
		return $query->row();

	}

	//qualification setup end

	//department setup begin
	public function add_department($department_data){

		$this->db->insert('department', $department_data);
		return true;
	}

	public function update_department($department_id, $department_data){

		$this->db->where('department.department_id', $department_id);
		$this->db->update('department', $department_data);
		return true;


	}

	public function view_departments(){

		$this->db->select('*');
		$this->db->from('department');
		return $this->db->get()->result();

	}

	public function view_department($department_id){
		$this->db->select('*');
		$this->db->from('department');
		$this->db->where('department_id', $department_id);
		$query = $this->db->get();
		return $query->row();

	}

	//department setup end

	//job_role setup begin
	public function add_job_role($job_role_data){

		$this->db->insert('job_role', $job_role_data);
		return true;
	}

	public function update_job_role($job_role_id, $job_role_data){

		$this->db->where('job_role.job_role_id', $job_role_id);
		$this->db->update('job_role', $job_role_data);
		return true;


	}

	public function view_job_roles(){

		$this->db->select('*');
		$this->db->from('job_role');
		$this->db->join('department', 'department.department_id = job_role.department_id');
		return $this->db->get()->result();

	}

	public function view_job_role($job_role_id){
		$this->db->select('*');
		$this->db->from('job_role');
		$this->db->where('job_role_id', $job_role_id);
		$query = $this->db->get();
		return $query->row();

	}

	//job_role setup end

	//pension setup begin
	public function add_pension($pension_data){

		$this->db->insert('pension', $pension_data);
		return true;
	}

	public function update_pension($pension_id, $pension_data){

		$this->db->where('pension.pension_id', $pension_id);
		$this->db->update('pension', $pension_data);
		return true;


	}

	public function view_pensions(){

		$this->db->select('*');
		$this->db->from('pension');

		return $this->db->get()->result();

	}

	public function view_pension($pension_id){
		$this->db->select('*');
		$this->db->from('pension');
		$this->db->where('pension_id', $pension_id);
		$query = $this->db->get();
		return $query->row();

	}

	//pension setup end



	//Health Insurance setup begin
	public function add_health_insurance($health_insurance_data){

		$this->db->insert('health_insurance', $health_insurance_data);
		return true;
	}


	public function update_health_insurance($health_insurance_id, $health_insurance_data){

		$this->db->where('health_insurance.health_insurance_id', $health_insurance_id);
		$this->db->update('health_insurance', $health_insurance_data);
		return true;


	}

	public function view_health_insurances(){

		$this->db->select('*');
		$this->db->from('health_insurance');

		return $this->db->get()->result();

	}

	public function view_health_insurance($health_insurance_id){
		$this->db->select('*');
		$this->db->from('health_insurance');
		$this->db->where('health_insurance_id', $health_insurance_id);
		$query = $this->db->get();
		return $query->row();

	}

	//Health Insurance setup end
}