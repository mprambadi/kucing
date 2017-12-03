<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diagnosa_sementara extends CI_Controller {

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
		$this->load->model('account/Kucing_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		
	}
	
	//Fungsi ini menampilkan halaman default aplikasi, yang berisi form data kucing.
	public function index()
	{
		//$data['id_kucing']   = $this->Kucing_model->get_last_id3();
		$data['penyakit_kucing'] = $this->Kucing_model->get_last_id_4($id_kucing)->result();
		$data['data_kucing'] = $this->Kucing_model->get_data_kucingg($id_kucing);
		
		//var_dump($data['penyakit_kucing']); die;
		$this->load->view('form_hasil_diagnosa', $data);
		
	}
	
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */