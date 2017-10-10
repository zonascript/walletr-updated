<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
require APPPATH.DIRECTORY_SEPARATOR.'third_party'.DIRECTORY_SEPARATOR.'easybitcoin.php';

class Dashboard extends CI_Controller
{


	var $rpc_user     ='blackdiamondcoinrpc';
	var $rpc_password ='kishoreamit56400215';
	var $rpc_url      ='18.221.146.77';
	var $rpc_port     ='12742';


	public function __construct() {

		parent::__construct();

		if (!$this->session->userdata('is_logged_in')) {
			
			return redirect('login');
		}
		$this->load->model('dashboardModel');
		// print_r($this->dashboardModel->checkUser(md5('Amit@1993#')));
	}


	public function index() {



		$data['main_content'] = 'dashboard';
		$data['main_balance'] = $this->get_main_balance();
		$data['users'] = $this->dashboardModel->get_users();
		$data['total_users'] = $this->dashboardModel->count_users();

		$this->load->view('includes/template',$data);


	}

	public function get_main_balance() {

		$blackdiamond = new Bitcoin($this->rpc_user,$this->rpc_password,$this->rpc_url,$this->rpc_port);
		
		
		$balance = $blackdiamond->getbalance("");

		return $balance;

	}	




	public function mining_info() {

		$data['main_content'] = 'mining';
		
		$data['minig_info'] = $this->get_mining_info();

		// print_r($data['minig_info']);

		$this->load->view('includes/template',$data);
	}

	public function get_mining_info() {

		$blackdiamond = new Bitcoin($this->rpc_user,$this->rpc_password,$this->rpc_url,$this->rpc_port);
		
		
		$mining = $blackdiamond->getmininginfo();


		return $mining;

	}

	public function control_mining() {

		if ($this->input->post()) {
		
			$blackdiamond = new Bitcoin($this->rpc_user,$this->rpc_password,$this->rpc_url,$this->rpc_port);
			
				    $output = 'false';
			if ($blackdiamond->getgenerate()) {
				
					$output = 'success';
					$blackdiamond->setgenerate(false);

			} else {


					$output = 'success';
					$blackdiamond->setgenerate(true,2);
				
			}
			echo $output;
		} else {

			return redirect('dashboard');
		}

	}

	public function transactions(){

		$blackdiamond = new Bitcoin($this->rpc_user,$this->rpc_password,$this->rpc_url,$this->rpc_port);

		$data['transactions'] = $blackdiamond->listtransactions();
		
		$this->load->helper('my_helper');

		$data['main_content'] = 'transactions';
		
		$this->load->view('includes/template',$data);

	}

	public function send_bdc() {

		if ($this->input->post()) {
			
			$address = $this->input->post('address');
			$coins   = $this->input->post('coins');

			$output = array('status'=>'false','result'=>'');

			$blackdiamond = new Bitcoin($this->rpc_user,$this->rpc_password,$this->rpc_url,$this->rpc_port);

				// validate address

			$result = $blackdiamond->validateaddress($address);
				
			if ($result) {
				
				// and send coins from "" to address
				$coins = $coins = floatval(number_format((float)$coins, 8, '.', ''));
			
				$txn_hash = $blackdiamond->sendfrom("",$address,$coins);

				if ($txn_hash) {
					
					$output['status']='success';
					$output['result']='';
					
				} else {

					$output['status']='false';
					$output['result']='Could not perform transaction due to : '.$blackdiamond->error;
				}

			} else {

					$output['result']='Invalid BDC address';
					$output['status']='false';

			}		

			echo json_encode($output);

		} else {


			return redirect('dashboard');
		}


	}


}