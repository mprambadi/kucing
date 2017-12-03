<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller {

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
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('daftar_agenda/agenda_model');
		$this->load->model('daftar_agenda/admin_model');
		
	}
	//============= Agenda ==============
	public function index()
	{
		$data['daftar_agenda'] = $this->admin_cisundabeach->select_all_admin_map()->result();
		$this->load->view('daftar_admin', $data);
		
	}
	
	public function lihat_agenda_terbaru(){
		
		$data['daftar_agenda'] = $this->agenda_model->select_by_tanggal()->result();
		$this->load->view('daftar_agenda_tgl', $data);
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
	
	//=============== Admin ==============
	
	public function admin_view(){
		
		$data['daftar_agenda'] = $this->agenda_model->select_all_admin()->result(); 
		$this->load->view('admin', $data);
		
	}
	
	public function edit_admin_map($agenda){
		$data['agenda'] = $this->agenda_model->select_by_id_admin($agenda)->row();
		$this->load->view('admin_form_edit_admin', $data);
	}
	
	public function proses_edit_admin(){
		
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$id_admin = $this->input->post('id_admin');
		$this->agenda_model->update_admin($id_admin, $data);

		redirect(site_url('map/index'));
		
	}
	
	public function tambah_admin(){
		
		$data['daftar_agenda'] = $this->agenda_model->select_all_admin_map()->result();
		$this->load->view('admin_form_tambah_admin');
		
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
			
			redirect(site_url('map/index'));
		} else {
			
			redirect(site_url('map/salah'));
		}	
		
	}
	
	public function delete_admin_map($agenda){
		
		$this->agenda_model->delete_admin($agenda);
		redirect(site_url('map/index'));
	}
	
	//============= Gambar 1 ==============
	public function gambar(){				$data['daftar_agenda'] = $this->admin_model->select_all_gambar()->result(); 
		$this->load->view('daftar_gambar', $data);
		
	}
	
	public function tambah_gambar(){
		$data['daftar_agenda'] = $this->admin_model->select_all_gambar()->result();
		$this->load->view('admin_form_tambah_gambar');
	}
	
	public function proses_tambah_gambar(){
		
		$judul_iklan = $this->input->post('judul_iklan');
		$url_iklan = $this->input->post('url_iklan');
		
		$config['upload_path']          = './uploads/admin_iklan/';
		$config['allowed_types']        = '*';	
		$config['max_size']             = '3000';
		$config['max_width']            = 1500;
		$config['max_height']           = 1500;
		
		$config['encrypt_name']  = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile')){
			
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('admin_form_tambah_gambar', $error);
			
		}else{
		
			$data = array('upload_data' => $this->upload->data());
			
			$lokasi_file = $_FILES['userfile']['tmp_name'];
			$tipe_file = $_FILES['userfile']['type'];
			$nama_file = $_FILES['userfile']['name'];
			$direktori = "./uploads/admin_iklan/$nama_file";
			
			if(!empty($lokasi_file)){
				
				move_uploaded_file($lokasi_file, $direktori);
				
				
				$this->admin_model->insert_photo($judul_iklan, $nama_file, $url_iklan);
				redirect(site_url('map/gambar'));
				
				if(!$this){
					
					echo "gagal gambar";
					
				} else {
					
					
					
				}
			} else {
				
				echo "errrrrror";
			}
		}
	}
	
	public function edit_gambar_admin($id_gambar_iklan){
		
		$data['agenda'] = $this->admin_model->select_by_id_gambar_edit($id_gambar_iklan)->row();
		$this->load->view('admin_form_edit_gambar', $data);
	
	}
	
	public function proses_edit_gambar_admin(){
		
		$judul_iklan = $this->input->post('judul_iklan');
		$id_gambar_iklan = $this->input->post('id_gambar_iklan');
		
		$config['upload_path']          = './uploads/admin_iklan/';
		$config['allowed_types']        = '*';	
		$config['max_size']             = '3000';
		$config['max_width']            = 1500;
		$config['max_height']           = 1500;
		
		$config['encrypt_name']  = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile')){
			
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('admin_form_tambah_gambar', $error);
			
		}else{
		
			$data = array('upload_data' => $this->upload->data());
			
			$lokasi_file = $_FILES['userfile']['tmp_name'];
			$tipe_file = $_FILES['userfile']['type'];
			$nama_file = $_FILES['userfile']['name'];
			$direktori = "./uploads/admin_iklan/$nama_file";
			
			if(!empty($lokasi_file)){
				
				move_uploaded_file($lokasi_file, $direktori);
				
				
				$this->admin_model->update_gambar($id_gambar_iklan, $judul_iklan, $nama_file);
				redirect(site_url('map/gambar'));
				
				if(!$this){
					
					echo "gagal gambar";
					
				} else {
					
					
					
				}
			} else {
				
				echo "errrrrror";
			}
		}
	}
	
	public function lihat_publish_gambar(){
		
		$data['daftar_agenda'] = $this->admin_model->select_by_status_gambar()->result();
		$this->load->view('daftar_iklan_publish', $data);
	
	}
	
	public function publish_admin_gambar($id_gambar_iklan){
		
		$data['agenda'] = $this->admin_model->update_status_gambar_un_p();
		$data['agenda'] = $this->admin_model->update_status_gambar($id_gambar_iklan);
		redirect(site_url('map/lihat_publish_gambar'));
	
	}
	
	public function unpublish_admin_gambar($id_gambar_iklan){
		
		$data['agenda'] = $this->admin_model->update_status_gambar_un($id_gambar_iklan);
		redirect(site_url('map/gambar'));
	}
	
	public function delete_admin_gambar($id_gambar_iklan){
		
		$this->admin_model->delete_admin_gambar($id_gambar_iklan);
		redirect(site_url('map/gambar'));
	}
	
	//============= Gambar Banner ==============
	public function gambar_banner(){
		
		$data['daftar_agenda'] = $this->admin_model->select_all_gambar_banner()->result(); 
		$this->load->view('daftar_gambar_banner', $data);
		
	}
	
	public function tambah_gambar_banner(){
		
		$data['daftar_agenda'] = $this->admin_model->select_all_gambar_banner()->result();
		$this->load->view('admin_form_tambah_gambar_banner');
		
	}
	
	public function proses_tambah_gambar_banner(){
		
		$judul_iklan = $this->input->post('judul_iklan');
		$url_iklan = $this->input->post('url_iklan');
		
		$config['upload_path']          = './uploads/admin_iklan/';
		$config['allowed_types']        = '*';	
		$config['max_size']             = '3000';
		/* $config['max_width']            = 1500;
		$config['max_height']           = 1500; */
		
		$config['encrypt_name']  = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile')){
			
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('admin_form_tambah_gambar', $error);
			
		}else{
		
			$data = array('upload_data' => $this->upload->data());
			
			$lokasi_file = $_FILES['userfile']['tmp_name'];
			$tipe_file = $_FILES['userfile']['type'];
			$nama_file = $_FILES['userfile']['name'];
			$direktori = "./uploads/admin_iklan/$nama_file";
			
			if(!empty($lokasi_file)){
				
				move_uploaded_file($lokasi_file, $direktori);
				
				
				$this->admin_model->insert_photo_banner($judul_iklan, $nama_file, $url_iklan);
				redirect(site_url('map/gambar_banner'));
				
				if(!$this){
					
					echo "gagal gambar";
					
				} else {
					
					
					
				}
			} else {
				
				echo "errrrrror";
			}
		}
	}
	
	public function lihat_publish_gambar_banner(){
		
		$data['daftar_agenda'] = $this->admin_model->select_by_status_gambar_banner()->result();
		$this->load->view('daftar_iklan_publish_banner', $data);
	
	}
	
	public function edit_gambar_admin_banner($id_gambar_iklan){
		
		$data['agenda'] = $this->admin_model->select_by_id_gambar_edit_banner($id_gambar_iklan)->row();
		$this->load->view('admin_form_edit_gambar_banner', $data);
	
	}
	
	public function proses_edit_gambar_admin_banner(){
		
		$judul_iklan = $this->input->post('judul_iklan');
		$id_gambar_iklan = $this->input->post('id_gambar_iklan');
		
		$config['upload_path']          = './uploads/admin_iklan/';
		$config['allowed_types']        = '*';	
		$config['max_size']             = '3000';
		/* $config['max_width']            = 1500;
		$config['max_height']           = 1500; */
		
		$config['encrypt_name']  = TRUE;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile')){
			
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('admin_form_tambah_gambar', $error);
			
		}else{
		
			$data = array('upload_data' => $this->upload->data());
			
			$lokasi_file = $_FILES['userfile']['tmp_name'];
			$tipe_file = $_FILES['userfile']['type'];
			$nama_file = $_FILES['userfile']['name'];
			$direktori = "./uploads/admin_iklan/$nama_file";
			
			if(!empty($lokasi_file)){
				
				move_uploaded_file($lokasi_file, $direktori);
			
				$this->admin_model->update_gambar_banner($id_gambar_iklan, $judul_iklan, $nama_file);
				redirect(site_url('map/gambar_banner'));
				
				if(!$this){
					
					echo "gagal gambar";
					
				} else {
					
					
					
				}
			} else {
				
				echo "errrrrror";
			}
		}
	}
	
	public function delete_admin_gambar_banner($id_gambar_iklan){
		
		$this->admin_model->delete_admin_gambar_banner($id_gambar_iklan);
		redirect(site_url('map/gambar_banner'));
	}
	
	public function publish_admin_gambar_banner($id_gambar_iklan){
		
		$data['daftar_agenda'] = $this->admin_model->update_status_gambar_banner_un_p();
		$data['agenda'] = $this->admin_model->update_status_gambar_banner($id_gambar_iklan);
		redirect(site_url('map/lihat_publish_gambar_banner'));
	
	}
	
	public function unpublish_admin_gambar_banner($id_gambar_iklan){
		
		$data['agenda'] = $this->admin_model->update_status_gambar_un_banner($id_gambar_iklan);
		redirect(site_url('map/gambar_banner'));
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */