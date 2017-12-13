<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/master
	 *	- or -  
	 * 		http://example.com/index.php/master/index
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
		$this->load->model('account/User_model');
		$this->load->model('account/Kucing_model');
		$this->load->library('session');

		// var_dump($this->session);
		if ($this->session->userdata('logged_in') != TRUE) {
    	redirect(site_url("login"));
		}

	}
	
	public function index()
	{
		if($this->session->role == 1) {
			redirect(site_url('Master/pasien'));
		}
		redirect(site_url('Master/ras'));
		

		
	}
	public function pasien()
	{
		//$this->load->view('header');
		$data['judul'] = 'Pasien';
		$data['deskripsi'] = '';
		$data['title'] = 'Data Pasien';
		$data['page'] = 'pasien';
		$content['daftar_pasien'] = $this->Kucing_model->get_data_kucing()->result();
		$this->load->view('header',$data);
		$this->load->view('pasien',$content);
		$this->load->view('footer');
		
	}
	public function ras()
	{
		//$this->load->view('header');
		$data['judul'] = 'Ras Kucing';
		$data['deskripsi'] = '';
		$data['title'] = 'Data Ras Kucing';
		$data['page'] = 'ras';
		$content['daftar_ras'] = $this->Kucing_model->get_ras_kucing()->result();
		$this->load->view('header',$data);
		$this->load->view('ras',$content);
		$this->load->view('footer');
		$this->load->view('ras_script');
		
		
	}

		public function saveRas(){
		//var_dump($_REQUEST);die;

		if(!$_REQUEST['id_ras'] || $_REQUEST['id_ras']==0){
			$data = array(
				// 'id_pernyakit' => '',
				'ras' => $_REQUEST['nama_ras'],
			);
			$this->Kucing_model->insert_ras_kucing($data);
		}else{
			$id = $_REQUEST['id_ras'];
			$data = array(
				'ras' => $_REQUEST['nama_ras'],
			);
			$this->Kucing_model->update_ras_kucing($data,$id);
		}
		redirect(site_url('Master/ras'));
		
	}
	public function deleteRas(){
		//var_dump($_REQUEST);die;
		$this->Kucing_model->delete_ras_kucing($_REQUEST['id_ras_del']);
		redirect(site_url('Master/ras'));
		
	}
	public function gejala()
	{
		//$this->load->view('header');
		$data['judul'] = 'Gejala Penyakit';
		$data['deskripsi'] = '';
		$data['title'] = 'Data Gejala Penyakit';
		$data['page'] = 'gejala';
		$content['daftar_gejala'] = $this->Kucing_model->get_gejala_kucing()->result();
		$this->load->view('header',$data);
		$this->load->view('gejala',$content);
		$this->load->view('footer');
		
	}
	public function penyakit()
	{
		//$this->load->view('header');
		$data['judul'] = 'Penyakit';
		$data['deskripsi'] = '';
		$data['title'] = 'Data Penyakit';
		$data['page'] = 'penyakit';
		$content['daftar_penyakit'] = $this->Kucing_model->get_penyakit_kucing()->result();
		$this->load->view('header',$data);
		$this->load->view('penyakit',$content);
		$this->load->view('footer');
		$this->load->view('penyakit_script');
		
	}

	public function savePenyakit(){
		//var_dump($_REQUEST);die;

		if(!$_REQUEST['id_pernyakit'] || $_REQUEST['id_pernyakit']==0){
			$data = array(
				// 'id_pernyakit' => '',
				'nama_penyakit' => $_REQUEST['nama_penyakit'],
			);
			$this->Kucing_model->insert_penyakit_kucing($data);
		}else{
			$id = $_REQUEST['id_pernyakit'];
			$data = array(
				'nama_penyakit' => $_REQUEST['nama_penyakit'],
				'penjelasan_penyakit' => $_REQUEST['penjelasan_penyakit'],
			);
			$this->Kucing_model->update_penyakit_kucing($data,$id);
		}
		redirect(site_url('Master/penyakit'));
		
	}
	public function deletePenyakit(){
		//var_dump($_REQUEST);die;
		$this->Kucing_model->delete_penyakit_kucing($_REQUEST['id_pernyakit_del']);
		redirect(site_url('Master/penyakit'));
		
	}
	public function user()
	{
		//$this->load->view('header');
		$data['judul'] = 'User';
		$data['deskripsi'] = '';
		$data['title'] = 'Data User';
		$data['page'] = 'user';

		$content['daftar_user'] = $this->Kucing_model->get_data_user()->result();
		$this->load->view('header',$data);
		$this->load->view('user',$content);
		$this->load->view('footer');
		$this->load->view('user_script');
		
		
	}

	public function saveUser(){
		//var_dump($_REQUEST);die;

		if(!$_REQUEST['id_user'] || $_REQUEST['id_user']==0){
			$data = array(
				// 'id_user' => '',
				'username' => $_REQUEST['username'],
				'password' => $_REQUEST['password'],
				'role'=> 2,
			);
			$this->Kucing_model->insert_user($data);
		}else{
			$id = $_REQUEST['id_user'];
			$data = array(
				'username' => $_REQUEST['username'],
				'password' => $_REQUEST['password'],				
			);
			$this->Kucing_model->update_user($data,$id);
		}
		redirect(site_url('Master/user'));
		
	}
	public function deleteUser(){
		//var_dump($_REQUEST);die;
		$this->Kucing_model->delete_user($_REQUEST['id_user_del']);
		redirect(site_url('Master/user'));
		
	}
	public function logout(){
		
		$this->session->sess_destroy();
		redirect(site_url('login'));
		
	} 
	
}
/* End of file login.php */
/* Location: ./application/controllers/master.php */