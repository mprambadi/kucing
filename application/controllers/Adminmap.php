<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminmap extends CI_Controller {

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
		$this->load->model('account/Admin_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		
	}
	
	public function index()
	{

		$this->load->view('form_login_map');
		
	}
	
	//memeriksa keberadaan username
	public function login(){
		
		$username = $this->input->post('username', 'true');
		$password = $this->input->post('password', 'true');
		
		$temp_account = $this->Admin_model->check_user_account($username, $password)->row();
		
		//check account
		$num_account = count($temp_account);
		
		$this->form_validation->set_rules('username', 'Username','required');
		$this->form_validation->set_rules('password', 'Password','required');
		
		if($this->form_validation->run() == FALSE){
			
			$this->load->view('form_login_map');
			
		} else {
			
			if($num_account > 0){
				
				//bila ada set session
				$array_items = array ('id_admin' => $temp_account->id_admin,
									  'username' => $temp_account->username,
									  'logged_in' => true);
				
				$this->session->set_userdata($array_items);

				redirect(site_url('Welcome/index'));
			} else{
				
				$this->session->set_flashdata('notification', 'Peringatan : Username dan Password tidak cocok.');
				
				redirect(site_url('Adminmap/'));
			}
		}
	}
	
	public function logout(){
		
		$this->session->sess_destroy();
		redirect(site_url('Adminmap'));
		
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */