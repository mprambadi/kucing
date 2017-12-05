<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('account/User_model');
		$this->load->library('session');
		
		
	}
	
	public function index()
	{

		//$this->load->view('header');

		$this->load->view('login');
		
	}
	
	//memeriksa keberadaan username
	 public function login(){

		$username = $this->input->post('username', 'true');
		$password = $this->input->post('password', 'true');
		
		$temp_account = $this->User_model->check_user_account($username, $password)->row();
		
		//check account
		$num_account = count($temp_account);
		if($num_account > 0){
			//bila ada set session
			$array_items = array (
									'role' => $temp_account->role,
									'id_user' => $temp_account->id_user,
								  'username' => $temp_account->username,
									'logged_in' => true
								);
			
			$this->session->set_userdata($array_items);

			
			// echo "berhasil";
			//die;

			redirect(site_url('Master/index'));
		} else{
			
			$this->session->set_flashdata('notification', 'Peringatan : Username dan Password tidak cocok.');
			//die;
			redirect(site_url('Login/index'));
		}
	}
	
	public function logout(){
		
		$this->session->sess_destroy();
		redirect(site_url('account'));
		
	} 
	
	
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */