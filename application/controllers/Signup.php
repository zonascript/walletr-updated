<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class Signup extends CI_Controller
{
	
	public function __construct() {


		parent::__construct();
		$this->load->model('signupModel');

	}


	public function index() {

		$data['main_content'] = 'public/wallet/signup';
		$this->load->view('includes/template',$data);

	}

	public function create_user() {

		if ($this->input->post()) {

			$output = $this->signupModel->create_user();

			echo json_encode($output);
			
		} else {

			return redirect('shop/signup');
		}
	}
}