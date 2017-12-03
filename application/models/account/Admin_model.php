<?php
	class Admin_model extends CI_Model{
		
		function __construct(){
			
				parent::__construct();
		}
		
		//cek user
		
		function check_user_account($username, $password){
			
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			
		return $this->db->get();
}
		
		//mengambil data user tertentu
		function get_user($id_user){
			
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('id_user', $id_user);
			
			return $this->db->get();
		}
	}
?>