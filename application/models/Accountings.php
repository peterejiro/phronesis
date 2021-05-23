<?php
	
	
	class Accountings extends CI_Model
	{
		public function view_coas(){
			$this->db->select('*');
			$this->db->from('coas');
			return $this->db->get()->result();
			
		}
		
		public function view_parent_account($account_type){
			$this->db->select('*');
			$this->db->from('coas');
			$this->db->where('account_type', $account_type);
			
			
			return $this->db->get()->result();
			
		}
		
		public function get_coa($glcode){
			$this->db->select('*');
			$this->db->from('coas');
			$this->db->where('glcode', $glcode);
			return $this->db->get()->row();
		}
		
		public function view_pbanks(){
			
			$this->db->select('*');
			$this->db->from('phronesis_banks');
			$this->db->join('bank', 'bank.bank_id = phronesis_banks.bank_id');
			return $this->db->get()->result();
			
		}
		
		public function add_pbank($pbank_data){
			$this->db->insert('phronesis_banks', $pbank_data);
			return true;
		}
		
		public function add_coa($coa_data){
			
			$this->db->insert('coas', $coa_data);
			return true;
		}
		
		public function update_pbank($pbank_id, $pbank_data){
			$this->db->where('phronesis_banks.phronesis_bank_id', $pbank_id);
			$this->db->update('phronesis_banks', $pbank_data);
			return true;
		}
		
		public function save_gl($gl_data){
			$this->db->insert('gls', $gl_data);
			return true;
		}
		
		public function get_credit($glcode, $from, $to){
			$this->db->select('*');
			$this->db->from('gls');
			$this->db->where('created_at >=', $from);
			$this->db->where('created_at <=', $to);
			$this->db->where('glcode', $glcode);
			return $this->db->get()->result();
		}
	}
