<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftaragenda extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct(){
		
		parent::__construct();
		$this->load->helper(array('url','form', 'html'));
		$this->load->model('daftar_agenda/agenda_model');
		
	}
	
	public function index()
	{
		$data['daftar_agenda'] = $this->agenda_model->select_all()->result();
		$this->load->view('daftar_agenda', $data);
		
	}
	
	//=============== Agenda =========================
	public function lihat_agenda_terbaru(){
		
		$data['daftar_agenda'] = $this->agenda_model->select_by_status()->result();
		$this->load->view('daftar_agenda_tgl', $data);
	}
	
	public function publish_agenda($id_agenda){
		
		$data['daftar_agenda'] = $this->agenda_model->update_status_agenda_un_p();
		$data['daftar_agenda'] = $this->agenda_model->update_status($id_agenda);
		redirect(site_url('daftaragenda/lihat_agenda_terbaru'));
		
	}
	
	public function unpublish_agenda($id_agenda){
		
		$data['daftar_agenda'] = $this->agenda_model->update_status_un($id_agenda);
		redirect(site_url('daftaragenda/index'));
	
	}
	
	public function tambah_agenda(){
		
		$data['daftar_agenda'] = $this->agenda_model->select_all()->result();
		$this->load->view('header');
		$this->load->view('form_tambah_agenda');
		
	}
	
	public function proses_tambah_agenda(){
		
		$data['keterangan'] = $this->input->post('keterangan');
		$tanggal    = $this->input->post('tanggal');
		
		//echo $tanggal;
		
		list($thn, $bln, $tgl) = preg_split('[-]', $tanggal);
		
		switch($bln){
			case '01';
			$bln = "Januari";
			break;
			
			case '02';
			$bln = "Februari";
			break;
			
			case '03';
			$bln = "Maret";
			break;
			
			case '04';
			$bln = "April";
			break;
			
			case '05';
			$bln = "Mei";
			break;
			
			case '06';
			$bln = "Juni";
			break;
			
			case '07';
			$bln = "Juli";
			break;
			
			case '08';
			$bln = "Agustus";
			break;
			
			case '09';
			$bln = "September";
			break;
			
			case '10';
			$bln = "Oktober";
			break;
			
			case '11';
			$bln = "November";
			break;
			
			case '12';
			$bln = "Desember";
			break;
		}
		 
		$data['tanggal'] = $tgl;
		$data['bulan'] = $bln;
		$data['tahun'] = $thn;
		
		
		$this->agenda_model->insert_agenda($data);
		
		redirect(site_url('daftaragenda'));
		 
	}
	
	public function edit_agenda($id_agenda){
		$data['agenda'] = $this->agenda_model->select_by_id($id_agenda)->row();
		$this->load->view('header');
		$this->load->view('form_edit_agenda', $data);
	}
	
	public function proses_edit_agenda(){
		
		$data['keterangan'] = $this->input->post('keterangan');
		$tanggal = $this->input->post('tanggal');
		
		list($thn, $bln, $tgl) = preg_split('[-]', $tanggal);
		
		switch($bln){
			case '01';
			$bln = "Januari";
			break;
			
			case '02';
			$bln = "Februari";
			break;
			
			case '03';
			$bln = "Maret";
			break;
			
			case '04';
			$bln = "April";
			break;
			
			case '05';
			$bln = "Mei";
			break;
			
			case '06';
			$bln = "Juni";
			break;
			
			case '07';
			$bln = "Juli";
			break;
			
			case '08';
			$bln = "Agustus";
			break;
			
			case '09';
			$bln = "September";
			break;
			
			case '10';
			$bln = "Oktober";
			break;
			
			case '11';
			$bln = "November";
			break;
			
			case '12';
			$bln = "Desember";
			break;
		}
		 
		$data['tanggal'] = $tgl;
		$data['bulan'] = $bln;
		$data['tahun'] = $thn;
		
		$id_agenda = $this->input->post('id_agenda');
		$this->agenda_model->update_agenda($id_agenda, $data);
		redirect(site_url('daftaragenda'));
		
	}
	
	public function delete_agenda($id_agenda){
		
		$this->agenda_model->delete_agenda($id_agenda);
		redirect(site_url('daftaragenda'));
	}
	
	public function info()
	{
		$data['daftar_agenda'] = $this->agenda_model->select_all_info()->result();
		$this->load->view('header');
		$this->load->view('daftar_info', $data);
		
	}
	
	public function tambah_info(){
		
		$data['daftar_agenda'] = $this->agenda_model->select_all_info()->result();
		$this->load->view('header');
		$this->load->view('form_tambah_info');
		
	}
	
	public function proses_tambah_info(){
		
		$data['detail']=$this->input->post('detail');
		$this->agenda_model->insert_info($data);
		
		redirect(site_url('daftaragenda/info'));
		
	}
	
	public function edit_info($id_info){
		$data['agenda'] = $this->agenda_model->select_by_id_info($id_info)->row();
		$this->load->view('header');
		$this->load->view('form_edit_info', $data);
	}
	
	public function proses_edit_info(){
		
		$data['detail'] = $this->input->post('detail');
		$id_info = $this->input->post('id_info');
		$this->agenda_model->update_info($id_info, $data);
		redirect(site_url('daftaragenda/info'));
		
	}
	
	public function delete_info($id_info){
		
		$this->agenda_model->delete_info($id_info);
		redirect(site_url('daftaragenda/info'));
	}
	
	//=============== Artikel =========================
	public function artikel(){
		
		$data['daftar_artikel'] = $this->agenda_model->select_all_artikel()->result(); 
		$this->load->view('daftar_artikel', $data);
		
	}
	
	public function tambah_artikel(){
		
		$data['daftar_artikel'] = $this->agenda_model->select_all_artikel()->result();
	
		$this->load->view('form_tambah_artikel');
		
	}
	
	public function lihat_artikel_terbaru(){
		
		$data['daftar_artikel'] = $this->agenda_model->select_all_artikel()->result(); 
		$this->load->view('daftar_artikel', $data);
	
	}
	
	public function lihat_artikel_publish(){
		
		$data['daftar_artikel'] = $this->agenda_model->select_pub_artikel()->result(); 
		$this->load->view('daftar_artikel_pub', $data);
	
	}
	
	public function publish_artikel($id_artikel){
		
		$data['daftar_artikel'] = $this->agenda_model->update_status_artikel_un_p();
		$data['daftar_artikel'] = $this->agenda_model->update_status_artikel($id_artikel);
		redirect(site_url('daftaragenda/lihat_artikel_publish'));
	
	}
	
	public function unpublish_artikel($id_artikel){
			
		$data['daftar_artikel'] = $this->agenda_model->update_status_artikel_un($id_artikel);
		redirect(site_url('daftaragenda/artikel'));
	
	}
	
	public function proses_tambah_artikel(){
		
		/* $data['judul_artikel']=$this->input->post('judul_artikel');
		$data['artikel']=$this->input->post('artikel'); */
		
		$judul_artikel = $this->input->post('judul_artikel');
		$artikel = $this->input->post('artikel');
		
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';	
		$config['max_size']             = '1000';
		/* $config['max_width']            = 1024;
		$config['max_height']           = 768; */
		
		$config['encrypt_name']  = TRUE;
		$this->load->library('upload', $config);

		if ( !$this->upload->do_upload('userfile')){
			
			//$error = array('error' => $this->upload->display_errors());
			//$this->load->view('daftar_artikel', $error);
			
			$this->agenda_model->insert_artikel($judul_artikel, $artikel, NULL);
			redirect(site_url('daftaragenda/artikel'));
			
		}else{
		
			$data = array('upload_data' => $this->upload->data());
			
			$lokasi_file = $_FILES['userfile']['tmp_name'];
			$tipe_file = $_FILES['userfile']['type'];
			$nama_file = $_FILES['userfile']['name'];
			$direktori = "./uploads/$nama_file";
			
			if(!empty($lokasi_file)){
				
				move_uploaded_file($lokasi_file, $direktori);
				
				$this->agenda_model->insert_artikel($judul_artikel, $artikel, $nama_file);
				redirect(site_url('daftaragenda/artikel'));
				
				if(!$this){
					
					echo "gagal gambar";
					
				} else {
					
					
					
				}
			} else {
				
				echo "errrrrror";
			}
		}
		
		/* $this->agenda_model->insert_artikel($data);
		
		redirect(site_url('daftaragenda/artikel')); */
		
	}
	
	public function edit_artikel($id_artikel){
		$data['daftar_artikel'] = $this->agenda_model->select_by_id_artikel($id_artikel)->row();
		$this->load->view('form_edit_artikel', $data);
	}
	
	public function proses_edit_artikel(){
		
		$judul_artikel = $this->input->post('judul_artikel');
		$artikel = $this->input->post('artikel');
		$id_agenda = $this->input->post('id_artikel');
		
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = '*';	
		$config['max_size']             = '3000';
		/* $config['max_width']         = 1024;
		$config['max_height']           = 768; */
		
		$config['encrypt_name']  = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile')){
			
			$this->agenda_model->update_artikel($id_agenda, $judul_artikel, $artikel, NULL);
			redirect(site_url('daftaragenda/artikel'));
			
		}else{
		
			$data = array('upload_data' => $this->upload->data());
			
			$lokasi_file = $_FILES['userfile']['tmp_name'];
			$tipe_file = $_FILES['userfile']['type'];
			$nama_file = $_FILES['userfile']['name'];
			$direktori = "./uploads/$nama_file";
			
			if(!empty($lokasi_file)){
				
				move_uploaded_file($lokasi_file, $direktori);
				
				
				$this->agenda_model->update_artikel($id_agenda, $judul_artikel, $artikel, $nama_file);
				redirect(site_url('daftaragenda/artikel'));
				
				
				if(!$this){
					
					echo "gagal gambar";
					
				} else {
					
					
					
				}
			} else {
				
				echo "errrrrror";
			}
		}
	}
	
	public function delete_artikel($id_artikel){
		
		$this->agenda_model->delete_artikel($id_artikel);
		redirect(site_url('daftaragenda/artikel'));
	}
	
	//=============== Admin View =========================
	public function admin_view(){
		
		$data['daftar_agenda'] = $this->agenda_model->select_all_admin()->result(); 
		$this->load->view('admin', $data);
		
	}
	
	public function edit_admin($id_admin){
		$data['agenda'] = $this->agenda_model->select_by_id_admin($id_admin)->row();
		$this->load->view('form_edit_admin', $data);
	}
	
	public function proses_edit_admin(){
		
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$id_admin = $this->input->post('id_admin');
		$this->agenda_model->update_admin($id_admin, $data);

		redirect(site_url('daftaragenda/admin_view'));
		
	}
	
	public function tambah_admin(){
		
		$data['daftar_agenda'] = $this->agenda_model->select_all_admin()->result();
	
		$this->load->view('form_tambah_admin');
		
	}
	
	public function salah()
	{
	
		$this->load->view('form_salah_password');
		
	}
	
	public function proses_tambah_admin(){
		
		$data['username']=$this->input->post('username');
		$data['password']=$this->input->post('password');
		$passwordlagi = $this->input->post('passwordlagi');
		
		if($passwordlagi==$data['password']){
			
			
			$this->agenda_model->insert_admin($data);
			
			redirect(site_url('daftaragenda/admin_view'));
		} else {
			
			redirect(site_url('daftaragenda/salah'));
		}
		
		
		
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */