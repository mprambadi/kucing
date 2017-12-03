<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');
	
class Api extends REST_Controller{
		
		function __construct(){
			 
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
		$this->load->model('daftar_agenda/agenda_model');
		$this->load->model('daftar_agenda/admin_model');
		}
		
		//untuk mengambil seluruh data pada tabel agenda
		function user_get(){
				
			 // Users from a data store e.g. database
			$users['agenda_model'] = $this->agenda_model->select_all()->result();

			$id = $this->get('id_agenda');

			// If the id parameter doesn't exist return all the users

			if ($id === NULL){
				// Check if the users data store contains users (in case the database result returns NULL)
				if ($users)
				{
					// Set the response and exit
					$this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
				}
				else
				{
					// Set the response and exit
					$this->response([
						'status' => FALSE,
						'message' => 'No users were found'
					], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
				}
			}

			// Find and return a single record for a particular user.

			$id = (int) $id;

			// Validate the id.
			if ($id <= 0)
			{
				// Invalid id, set the response and exit.
				$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}

			// Get the user from the array, using the id as key for retreival.
			// Usually a model is to be used for this.

			$user = NULL;

			if (!empty($users))
			{
				foreach ($users as $key => $value)
				{
					if (isset($value['id_agenda']) && $value['id_agenda'] === $id)
					{
						$user = $value;
					}
				}
			}

			if (!empty($user))
			{
				$this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
			else
			{
				$this->set_response([
					'status' => FALSE,
					'message' => 'User could not be found'
				], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
			}	
		}
		
		//untuk mengambil seluruh data pada tabel agenda berdasarkan tanggal
		function userTanggal_get(){
				
			 // Users from a data store e.g. database
			$users['agenda_model'] = $this->agenda_model->select_by_status()->result();

			$id = $this->get('id_agenda');

			// If the id parameter doesn't exist return all the users

			if ($id === NULL){
				// Check if the users data store contains users (in case the database result returns NULL)
				if ($users)
				{
					// Set the response and exit
					$this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
				}
				else
				{
					// Set the response and exit
					$this->response([
						'status' => FALSE,
						'message' => 'No users were found'
					], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
				}
			}

			// Find and return a single record for a particular user.

			$id = (int) $id;

			// Validate the id.
			if ($id <= 0)
			{
				// Invalid id, set the response and exit.
				$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}

			// Get the user from the array, using the id as key for retreival.
			// Usually a model is to be used for this.

			$user = NULL;

			if (!empty($users))
			{
				foreach ($users as $key => $value)
				{
					if (isset($value['id_agenda']) && $value['id_agenda'] === $id)
					{
						$user = $value;
					}
				}
			}

			if (!empty($user))
			{
				$this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
			else
			{
				$this->set_response([
					'status' => FALSE,
					'message' => 'User could not be found'
				], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
			}	
		}
		
		//untuk mengambil data dari tabel info
		function info_get(){
				
		 // Users from a data store e.g. database
			$users['agenda_model'] = $this->agenda_model->select_all_artikel()->result();

			$id = $this->get('id_info');

			// If the id parameter doesn't exist return all the users

			if ($id === NULL)
			{
				// Check if the users data store contains users (in case the database result returns NULL)
				if ($users)
				{
					// Set the response and exit
					$this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
				}
				else
				{
					// Set the response and exit
					$this->response([
						'status' => FALSE,
						'message' => 'No users were found'
					], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
				}
			}

			// Find and return a single record for a particular user.

			$id = (int) $id;

			// Validate the id.
			if ($id <= 0)
			{
				// Invalid id, set the response and exit.
				$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}

			// Get the user from the array, using the id as key for retreival.
			// Usually a model is to be used for this.

			$user = NULL;

			if (!empty($users))
			{
				foreach ($users as $key => $value)
				{
					if (isset($value['id_info']) && $value['id_info'] === $id)
					{
						$user = $value;
					}
				}
			}

			if (!empty($user))
			{
				$this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
			else
			{
				$this->set_response([
					'status' => FALSE,
					'message' => 'User could not be found'
				], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
			}		
		}
		
		//untuk mengambil data dari tabel info
		function artikel_get(){
				
		 // Users from a data store e.g. database
			$users['agenda_model'] = $this->agenda_model->select_pub_artikel()->result();

			$id = $this->get('id_artikel');

			// If the id parameter doesn't exist return all the users

			if ($id === NULL)
			{
				// Check if the users data store contains users (in case the database result returns NULL)
				if ($users)
				{
					// Set the response and exit
					$this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
				}
				else
				{
					// Set the response and exit
					$this->response([
						'status' => FALSE,
						'message' => 'No users were found'
					], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
				}
			}

			// Find and return a single record for a particular user.

			$id = (int) $id;

			// Validate the id.
			if ($id <= 0)
			{
				// Invalid id, set the response and exit.
				$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}

			// Get the user from the array, using the id as key for retreival.
			// Usually a model is to be used for this.

			$user = NULL;

			if (!empty($users))
			{
				foreach ($users as $key => $value)
				{
					if (isset($value['id_artikel']) && $value['id_artikel'] === $id)
					{
						$user = $value;
					}
				}
			}

			if (!empty($user))
			{
				$this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
			else
			{
				$this->set_response([
					'status' => FALSE,
					'message' => 'User could not be found'
				], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
			}		
		}
		
		function iklan_get(){
				
		 // Users from a data store e.g. database
			$users['agenda_model'] = $this->admin_model->select_by_status_gambar()->result();

			$id = $this->get('id_gambar_iklan');

			// If the id parameter doesn't exist return all the users

			if ($id === NULL)
			{
				// Check if the users data store contains users (in case the database result returns NULL)
				if ($users)
				{
					// Set the response and exit
					$this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
				}
				else
				{
					// Set the response and exit
					$this->response([
						'status' => FALSE,
						'message' => 'No users were found'
					], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
				}
			}

			// Find and return a single record for a particular user.

			$id = (int) $id;

			// Validate the id.
			if ($id <= 0)
			{
				// Invalid id, set the response and exit.
				$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}

			// Get the user from the array, using the id as key for retreival.
			// Usually a model is to be used for this.

			$user = NULL;

			if (!empty($users))
			{
				foreach ($users as $key => $value)
				{
					if (isset($value['id_gambar_iklan']) && $value['id_gambar_iklan'] === $id)
					{
						$user = $value;
					}
				}
			}

			if (!empty($user))
			{
				$this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
			else
			{
				$this->set_response([
					'status' => FALSE,
					'message' => 'User could not be found'
				], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
			}		
		}
		
		function iklanadmin_get(){
				
		 // Users from a data store e.g. database
			$users['agenda_model'] = $this->admin_model->select_by_status_gambar_banner()->result();

			$id = $this->get('id_gambar_iklan');

			// If the id parameter doesn't exist return all the users

			if ($id === NULL)
			{
				// Check if the users data store contains users (in case the database result returns NULL)
				if ($users)
				{
					// Set the response and exit
					$this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
				}
				else
				{
					// Set the response and exit
					$this->response([
						'status' => FALSE,
						'message' => 'No users were found'
					], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
				}
			}

			// Find and return a single record for a particular user.

			$id = (int) $id;

			// Validate the id.
			if ($id <= 0)
			{
				// Invalid id, set the response and exit.
				$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			}

			// Get the user from the array, using the id as key for retreival.
			// Usually a model is to be used for this.

			$user = NULL;

			if (!empty($users))
			{
				foreach ($users as $key => $value)
				{
					if (isset($value['id_gambar_iklan']) && $value['id_gambar_iklan'] === $id)
					{
						$user = $value;
					}
				}
			}

			if (!empty($user))
			{
				$this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
			}
			else
			{
				$this->set_response([
					'status' => FALSE,
					'message' => 'User could not be found'
				], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
			}		
		}
		

		function rest_client_example($id)
			{
				$this->load->library('rest', array(
					'server' => '103.23.22.151/~foodcombining/admin/adminfood2/index.php/api/',
					'http_user' => 'admin',
					'http_pass' => '1234',
					'http_auth' => 'basic' // or 'digest'
				));
				 
				$user = $this->rest->get('user', array('id_agenda' => $id), 'json');
				 
				echo $user->name;
			}
		
		
		/* function users_get(){
			$users = $this->agenda_model->select_all();
			//$users = $this->user_model->get_all();
			
			if($users){
				$this->response($users, 200);
			} else {
				
				$this->response(NULL, 404);
				
			}
		} */
		
		
	}
?>