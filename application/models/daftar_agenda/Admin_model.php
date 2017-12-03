<?php
	class Admin_model extends CI_Model{
		
		function __construct(){
			
				parent::__construct();
		}
		
		function insert_agenda($data){
			
			$this->db->insert('agenda', $data);
		}
		
		function select_all(){
			
			$this->db->select('*');
			$this->db->from('agenda');
			$this->db->order_by('id_agenda', 'desc');
			
			return $this->db->get();
			
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
		
		
		function update_agenda($id_agenda, $data){
			
			$this->db->where('id_agenda', $id_agenda);
			$this->db->update('agenda', $data);
			
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
		
		function insert_artikel($data){
			
			$this->db->insert('tips_artikel', $data);
		}
		
		function select_all_artikel(){
			
			$this->db->select('*');
			$this->db->from('tips_artikel');
			$this->db->order_by('id_artikel', 'asc');
			
			return $this->db->get();
			
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
		
		function update_artikel($id_artikel, $data){
			
			$this->db->where('id_artikel', $id_artikel);
			$this->db->update('tips_artikel', $data);
			
		}
		
		function delete_artikel($id_artikel){
			
			$this->db->where('id_artikel', $id_artikel);
			$this->db->delete('tips_artikel');
			
		}
		
		function select_all_admin(){
			
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
		
		function insert_photo($judul_iklan, $nama_file, $url_iklan){
			
			$query = $this->db->query("INSERT INTO gambar_iklan VALUES (null, '$judul_iklan', '$nama_file', 'oho', '$url_iklan', 0)");
			
			return $query;
		}
		
		function select_all_gambar(){
			
			$query = $this->db->query("SELECT id_gambar_iklan, judul_iklan, nama_gambar, alamat_iklan, status FROM gambar_iklan WHERE status = 0");
			
			return $query;
		
		}
		
		function select_by_id_gambar_edit($id_gambar_iklan){
			
			$this->db->select('*');
			$this->db->from('gambar_iklan');
			$this->db->where('id_gambar_iklan', $id_gambar_iklan);
			
			return $this->db->get();
			
		}
		
		function select_by_id_gambar(){
			
			$this->db->select('*');
			$this->db->from('gambar_iklan');
			$this->db->order_by('id_gambar_iklan', 'desc');
			$this->db->limit('1');
			
			return $this->db->get();
			
		
		}
		
		function select_by_status_gambar(){
			
			/* $this->db->select('*');
			$this->db->from('gambar_iklan');
			$this->db->where('status = 1');
			$this->db->order_by('id_gambar_iklan', 'asc');
			
			return $this->db->get(); */
			
			$query = $this->db->query("SELECT id_gambar_iklan, judul_iklan, nama_gambar, alamat_iklan, status FROM gambar_iklan WHERE status = 1 ORDER BY id_gambar_iklan asc");
			
			return $query;
		}
		
		function update_gambar($id_gambar_iklan, $judul_iklan, $nama_file){
			
			/* $this->db->where('id_gambar_iklan', $id_gambar_iklan);
			$this->db->update('gambar_iklan', $judul_iklan, $nama_file); */
			
			$query = $this->db->query("UPDATE gambar_iklan SET judul_iklan = '$judul_iklan', nama_gambar = '$nama_file', url_gambar = 'aha' WHERE id_gambar_iklan = '$id_gambar_iklan'");
			
			return $query;
			
		}
		
		function update_status_gambar($id_gambar_iklan){
			
			$status = 1;
			
			/* $this->db->where('id_gambar_iklan', $id_gambar_iklan);
			$this->db->update('status', $status); */
			
			$query = $this->db->query("UPDATE gambar_iklan SET status = '$status' WHERE id_gambar_iklan = '$id_gambar_iklan'");
		
			return $query;
		}
		
		function update_status_gambar_un($id_gambar_iklan){
			
			
			$status = 0;
			
			/* $this->db->where('id_gambar_iklan', $id_gambar_iklan);
			$this->db->update('status', $status); */
			
			$query = $this->db->query("UPDATE gambar_iklan SET status = '$status' WHERE id_gambar_iklan = '$id_gambar_iklan'");
		
			return $query;
		
		}
		
		function update_status_gambar_un_p(){
		
			$query = $this->db->query("UPDATE gambar_iklan SET status = 0");
			
			return $query;
			
		}
		
		
		function delete_admin_gambar($id_gambar_iklan){
			
			$this->db->where('id_gambar_iklan', $id_gambar_iklan);
			$this->db->delete('gambar_iklan');
			
		}
		
		function select_all_gambar_banner(){
			
			$query = $this->db->query("SELECT id_gambar_banner, judul_iklan_banner, nama_gambar_banner, alamat_iklan_banner, status FROM gambar_banner WHERE status = 0");
			
			return $query;
		
		}
		
		function select_by_status_gambar_banner(){
			
			/* $this->db->select('*');
			$this->db->from('gambar_iklan');
			$this->db->where('status = 1');
			$this->db->order_by('id_gambar_iklan', 'asc');
			
			return $this->db->get(); */
			
			$query = $this->db->query("SELECT id_gambar_banner, judul_iklan_banner, nama_gambar_banner, alamat_iklan_banner, status FROM gambar_banner WHERE status = 1 ORDER BY id_gambar_banner desc limit 1");
			
			return $query;
		
		}
		
		function select_by_id_gambar_edit_banner($id_gambar_iklan){
			
			$this->db->select('*');
			$this->db->from('gambar_banner');
			$this->db->where('id_gambar_banner', $id_gambar_iklan);
			
			return $this->db->get();
			
		}
		
		function insert_photo_banner($judul_iklan, $nama_file, $url_iklan){
			
			$query = $this->db->query("INSERT INTO gambar_banner (id_gambar_banner, judul_iklan_banner, nama_gambar_banner, alamat_iklan_banner, status) VALUES (null, '$judul_iklan', '$nama_file',
			'$url_iklan', 0)");
			
			return $query;
		}
		
		function update_gambar_banner($id_gambar_iklan, $judul_iklan, $nama_file){
			
			/* $this->db->where('id_gambar_iklan', $id_gambar_iklan);
			$this->db->update('gambar_iklan', $judul_iklan, $nama_file); */
			
			$query = $this->db->query("UPDATE gambar_banner SET judul_iklan_banner = '$judul_iklan', nama_gambar_banner = '$nama_file' WHERE id_gambar_banner = '$id_gambar_iklan'");
			
			return $query;
			
		}
		
		function delete_admin_gambar_banner($id_gambar_iklan){
			
			$this->db->where('id_gambar_banner', $id_gambar_iklan);
			$this->db->delete('gambar_banner');
			
		}
		
		function update_status_gambar_banner($id_gambar_iklan){
			
			$status = 1;
			
			/* $this->db->where('id_gambar_iklan', $id_gambar_iklan);
			$this->db->update('status', $status); */
			
			$query = $this->db->query("UPDATE gambar_banner SET status = '$status' WHERE id_gambar_banner = '$id_gambar_iklan'");
		
			return $query;
		}
		
		function update_status_gambar_un_banner($id_gambar_iklan){
			
			$status = 0;
			
			$query = $this->db->query("UPDATE gambar_banner SET status = '$status' WHERE id_gambar_banner = '$id_gambar_iklan'");
		
			return $query;
		
		}
		
		function update_status_gambar_banner_un_p(){
		
			$query = $this->db->query("UPDATE gambar_banner SET status = 0");
			
			return $query;
			
		}
	}
?>