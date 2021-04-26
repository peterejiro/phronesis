<?php
	
	
	class Accountings extends CI_Model
	{
		public function view_coas(){
			$this->db->select('*');
			$this->db->from('coas');
			return $this->db->get()->result();
			
		}
	}
