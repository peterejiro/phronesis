<?php
	
	
	class Accountings extends CI_Model
	{
		public function view_coas(){
			$this->db->select('*');
			$this->db->from('coas');
			return $this->db->get()->result();
			
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
		
		public function update_pbank($pbank_id, $pbank_data){
			
			$this->db->where('phronesis_banks.phronesis_bank_id', $pbank_id);
			$this->db->update('phronesis_banks', $pbank_data);
			return true;
			
			
		}
	}
