<?php
	class Agenda_model extends CI_Model{
		
		function __construct(){
			
				parent::__construct();
		}
		
		function insert_agenda($data){
			
			$this->db->insert('agenda', $data);
		}
		
		function select_all(){
			
			/* $this->db->select('*');
			$this->db->from('agenda');
			$this->db->order_by('id_agenda', 'desc');
			
			return $this->db->get(); */
			
			$query = $this->db->query("SELECT * FROM agenda WHERE status = 0");
			
			return $query;
			
		}
		
		function select_by_id($id_agenda){
			
			$this->db->select('*');
			$this->db->from('agenda');
			$this->db->where('id_agenda', $id_agenda);
			
			return $this->db->get();
			
		}
		
		function select_by_tanggal(){
			
			$this->db->select('*');
			$this->db->from('agenda');
			$this->db->order_by('id_agenda', 'desc');
			$this->db->limit('1');
			
			return $this->db->get();
			
		}
		
		function select_by_status(){
			
			$query = $this->db->query("SELECT * FROM agenda WHERE status = 1");
			
			return $query;
			
		}
		
		
		function update_agenda($id_agenda, $data){
			
			$this->db->where('id_agenda', $id_agenda);
			$this->db->update('agenda', $data);
			
		}
		
		function update_status($id_agenda){
		
			$query = $this->db->query("UPDATE agenda SET status = 1 WHERE id_agenda = '$id_agenda'");
			
			return $query;
		}
		
		function update_status_un($id_agenda){
			
			$query = $this->db->query("UPDATE agenda SET status = 0 WHERE id_agenda = '$id_agenda'");
			
			return $query;
		
		}
		
		function update_status_agenda_un_p(){
		
			$query = $this->db->query("UPDATE agenda SET status = 0");
			
			return $query;
			
		}
		
		function delete_agenda($id_agenda){
			
			$this->db->where('id_agenda', $id_agenda);
			$this->db->delete('agenda');
			
		}
		
		//function untuk pagination
		function select_all_paging($limit=array()){
			
			$this->db->select('*');
			$this->db->from('agenda');
			$this->db->order_by('date_modified', 'desc');
			
			if($limit!=NULL)
				$this->db->limit($limit['perpage'], $limit['offset']);
			
			return $this->db->get();
			
		}
		
		function insert_info($data){
			
			$this->db->insert('info', $data);
		}
		
		function select_all_info(){
			
			$this->db->select('*');
			$this->db->from('info');
			$this->db->order_by('id_info', 'asc');
			
			return $this->db->get();
			
		}
		
		function select_by_id_info($id_info){
			
			$this->db->select('*');
			$this->db->from('info');
			$this->db->where('id_info', $id_info);
			
			return $this->db->get();
			
		}
		
		function select_by_info(){
			
			$this->db->select('*');
			$this->db->from('info');
			$this->db->order_by('info', 'asc');
			
			return $this->db->get();
			
		}
		
		function update_info($id_info, $data){
			
			$this->db->where('id_info', $id_info);
			$this->db->update('info', $data);
			
		}
		
		function delete_info($id_info){
			
			$this->db->where('id_info', $id_info);
			$this->db->delete('info');
			
		}
		
		function insert_artikel($judul_artikel, $artikel, $nama_file){
			
			//$this->db->insert('tips_artikel', $judul_artikel, $artikel, $nama_file);
			
			
			$query = $this->db->query("INSERT INTO tips_artikel VALUES (null, '$judul_artikel', '$artikel', '$nama_file' , 0)");
			
			return $query;
		}
		
		function select_all_artikel(){
			
			/* $this->db->select('*');
			$this->db->from('tips_artikel');
			$this->db->order_by('id_artikel', 'desc');
			
			return $this->db->get(); */
			
			$query = $this->db->query("SELECT * FROM tips_artikel WHERE status_artikel = 0 ORDER BY id_artikel desc");
			
			return $query;
			
		}
		
		function select_pub_artikel(){
			
			/* $this->db->select('*');
			$this->db->from('tips_artikel');
			$this->db->order_by('id_artikel', 'desc');
			
			return $this->db->get(); */
			
			$query = $this->db->query("SELECT * FROM tips_artikel WHERE status_artikel = 1 ORDER BY id_artikel desc");
			
			return $query;
			
		}
		
		function select_by_id_artikel($id_artikel){
			
			$this->db->select('*');
			$this->db->from('tips_artikel');
			$this->db->where('id_artikel', $id_artikel);
			
			return $this->db->get();
			
		}
		
		function select_by_id_artikel_desc(){
			
			$this->db->select('*');
			$this->db->from('tips_artikel');
			$this->db->order_by('id_artikel', 'desc');
			$this->db->limit('1');
			
			return $this->db->get();
			
		}
		
		function update_artikel($id_artikel, $judul_artikel, $artikel, $nama_file){
			
			/* $this->db->where('id_artikel', $id_artikel);
			$this->db->update('tips_artikel', $data); */
			
			$query = $this->db->query("UPDATE tips_artikel SET judul_artikel = '$judul_artikel', artikel = '$artikel', gambar = '$nama_file', status_artikel = 0 WHERE id_artikel = '$id_artikel'");
			
			return $query;
		}
		
		function update_status_artikel($id_artikel){
		
			$query = $this->db->query("UPDATE tips_artikel SET status_artikel = 1 WHERE id_artikel = '$id_artikel'");
			
			return $query;
			
		}
		
		function update_status_artikel_un($id_artikel){
		
			$query = $this->db->query("UPDATE tips_artikel SET status_artikel = 0 WHERE id_artikel = '$id_artikel'");
			
			return $query;
			
		}
		
		function update_status_artikel_un_p(){
		
			$query = $this->db->query("UPDATE tips_artikel SET status_artikel = 0");
			
			return $query;
			
		}
		
		//function update_artikel($id_artikel){ // untuk cron job
			
			/* $this->db->where('id_artikel', $id_artikel);
			$this->db->update('tips_artikel', $data); */
			
			//$query = $this->db->query("UPDATE tips_artikel SET status_artikel = 0 WHERE id_artikel = '$id_artikel'");
			
			//return $query;
		//}
		
		function delete_artikel($id_artikel){
			
			$this->db->where('id_artikel', $id_artikel);
			$this->db->delete('tips_artikel');
			
		}
		
		function select_all_admin(){
			
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('id_admin > 2');
			$this->db->order_by('id_admin', 'asc');
			
			return $this->db->get();
			
		}
		
		function select_all_admin_map(){
			
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->order_by('id_admin', 'asc');
			
			return $this->db->get();
			
		}
		
		function select_by_id_admin($id_admin){
			
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('id_admin', $id_admin);
			
			return $this->db->get();
			
		}
		
		function insert_admin($data){
			
			$this->db->insert('admin', $data);
		}
		
		function update_admin($id_admin, $data){
			
			$this->db->where('id_admin', $id_admin);
			$this->db->update('admin', $data);
			
		}
		
		function delete_admin($agenda){
			
			$this->db->where('id_admin', $agenda);
			$this->db->delete('admin');
			
		}
	}
?>