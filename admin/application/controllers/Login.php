<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/

class Login extends CI_Controller
{
	

	public function __construct() {

		parent::__construct();
		
		$this->checkLogin();
		$this->load->model('loginModel');
		// $this->load->model('dashboardModel');


	}


	public function checkLogin() {

		if ($this->session->userdata('is_logged_in')) {
			
			return redirect('dashboard');
		}
	}


	public function index() {

		
		$this->load->view('login');

	}


	public function login() {

		if ($this->input->post()) {

			$user = $this->loginModel->login();
			  
			echo json_encode($user);

				
		} else {

			return redirect('login');
		}

	}

	public function destroy(){

		$this->session->sess_destroy();
	}



}