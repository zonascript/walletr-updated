<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
require APPPATH.DIRECTORY_SEPARATOR.'third_party'.DIRECTORY_SEPARATOR.'easybitcoin.php';

class Dashboard extends CI_Controller
{
	var $token = '3a3983b264f14785b119e903e66eaec2';
	var $actual_currency = 'USD';
	var $wallet = array('BTC','LTC','DOGE','DASH','ETH','BDC');
	var $data  = array();

	var $rpc_user     ='blackdiamondcoinrpc';
	var $rpc_password ='kishoreamit56400215';
	var $rpc_url      ='18.221.146.77';
	var $rpc_port     ='12742';


	public function __construct() {

		parent::__construct();

		if (!$this->session->userdata('is_logged_in')) {
			
			return redirect('wallet');
		}
		$this->load->model('dashboardModel');
		// print_r($this->dashboardModel->checkUser(md5('Amit@1993#')));
	}


	private function wallet_init() {

		$this->data['current_wallet'] = $this->dashboardModel->get_current_wallet();

		 // print_r($this->data['current_wallet']);
		 // die();
		if($this->data['current_wallet']->current_wallet !='BDC'){


			$result = $this->get_price($this->data['current_wallet']->current_wallet);

			if ($result) {
				
				$this->data['current_price'] = json_decode($result);

			} else {

					
				$this->data['current_price'] = null;
			}

		
			 $balance = $this->get_balance(strtolower($this->data['current_wallet']->current_wallet),$this->data['current_wallet']->wallet_address);

			 $this->data['balance'] = null;
			 if ($balance['status']=='success') {

			 	$this->data['balance'] = json_decode($balance['result']);

			 }
		} else {

			$blackdiamond = new Bitcoin($this->rpc_user,$this->rpc_password,$this->rpc_url,$this->rpc_port);

			// $balance = $blackdiamond->getbalance($this->data['current_wallet']->wallet_address);

			$set_acc = $this->session->userdata('user_id').$this->session->userdata('user_email');
			$balance = $blackdiamond->getbalance(md5($set_acc));
			$this->data['current_price'] = (object)array('USD'=>'1');

			$this->data['balance'] = $balance  ? (object)array('balance'=>$balance) : (object)array('balance'=>'0');

		}

		
	}

	public function index() {

		$this->data['main_content'] = 'public/dashboard/index';


		$this->wallet_init();


		$this->load->view('includes/wallet_template',$this->data);

	}




	public function transactions() {

		$this->data['main_content'] = 'public/dashboard/transactions';
		
		$this->wallet_init();

		$this->load->view('includes/wallet_template',$this->data);
	}

	public function wallet() {

		$this->data['main_content'] = 'public/dashboard/wallet';

		$this->wallet_init();

		$all_wallets = $this->dashboardModel->get_all_the_wallet();
		// print_r($all_wallets);

		$all_wallet_balance = array();

		if ($all_wallets) {
			
			foreach ($all_wallets as $wallet) {
				

				//$all_wallet_balance[] = array('wallet_type'=>$wallet->wallet_type,)
				// print_r($wallet);
				if ($wallet->wallet_type != 'BDC') {
					
					 $balance = $this->get_balance(strtolower($wallet->wallet_type),$wallet->wallet_address);
					 $result = json_decode($balance['result']);
					 // print_r($balance['result']);
					 // print_r($result);
					 $all_wallet_balance[] = (object) array('wallet_type'=>$wallet->wallet_type,'balance'=>$result->balance);
					
					 
				} else {

					$blackdiamond = new Bitcoin($this->rpc_user,$this->rpc_password,$this->rpc_url,$this->rpc_port);

					// $balance = $blackdiamond->getbalance($this->data['current_wallet']->wallet_address);
					$set_acc = $this->session->userdata('user_id').$this->session->userdata('user_email');
					$balance = $blackdiamond->getbalance(md5($set_acc));
					$amount  = $balance  ? $balance : '0';
					$all_wallet_balance[] = (object)array('wallet_type'=>'BDC','balance'=>$amount);

				}


			}


		}


		$this->data['all_wallet_balance'] = $all_wallet_balance;

		$this->data['wallets'] = $this->dashboardModel->get_wallets();

		$this->load->view('includes/wallet_template',$this->data);
	}

	
public function change_wallet(){

		if ($this->input->post()) {
				
			$output = $this->dashboardModel->change_wallet();

			if($output['coin'] != 'BDC'){


				
						$balance = $this->get_balance($output['coin'],$output['wallet_address']);
					
					if ($balance) {
						// if ($output['coin'] !='BCY') {
							# code...
							$result = $this->get_price($output['coin']);
							$result = json_decode($result);
							$output['price'] = $result->USD;
						// }
						
						$output['balance'] = 0;
						if ($balance['status']=='success') {
								
								$rslt = json_encode($balance['result']);

								$output['balance'] = $rslt->balance;


						}
						# code...
					} else {
						$output['price'] = 'Nill';
					}

			} else {

				$blackdiamond = new Bitcoin($this->rpc_user,$this->rpc_password,$this->rpc_url,$this->rpc_port);

				$set_acc = $this->session->userdata('user_id').$this->session->userdata('user_email');
				$balance = $blackdiamond->getbalance(md5($set_acc));


				$output['price'] = '1';
				$output['balance'] = $balance ? $balance : '0';
				$output['status'] = 'success';		

			}
			


			echo json_encode($output);
				
		} else {

			return redirect('wallet');
		}
	}

	private function get_price($crypto) { 

			$url = 'https://min-api.cryptocompare.com/data/price?fsym='.$crypto.'&tsyms=USD';
			 if(!function_exists("curl_init")) return "cURL extension is not installed";
			    if (trim($url) == "") die("@ERROR@");
			    $curl = curl_init($url);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
			    // curl_setopt($curl, CURLOPT_POST, 1);                        
			    // curl_setopt($curl, CURLOPT_USERPWD, 'username:password');
			    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);                    
			    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);                          
			    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);                       
			    $response = curl_exec($curl);                                          
			    $resultStatus = curl_getinfo($curl);                                   
			   	
			    if($resultStatus['http_code'] == 200) {
			       
			        // All Ok
			    
			    } else {

			        return json_encode($resultStatus);                            
				}

			    $curl = null;
			    return utf8_encode($response);      
	} 

	public function settings() {

		$this->data['main_content'] = 'public/dashboard/settings';

		$this->wallet_init();

		$this->load->view('includes/wallet_template',$this->data);
	}

	public function faq() {

		$this->data['main_content'] = 'public/dashboard/faq';

		$this->wallet_init();
		
		$this->load->view('includes/wallet_template',$this->data);

	}

	public function profile() {

		$this->data['main_content'] = 'public/dashboard/profile';

		$this->wallet_init();
		
		$this->data['my_profile'] =  $this->dashboardModel->get_myinfo();

		$this->load->view('includes/wallet_template',$this->data);

	}



	public function logout(){

	
		$this->session->sess_destroy();
		return redirect('wallet');
	}

	public function checkaddress() {

		if ($this->input->post()) {
			if (strtolower($this->input->post('crypto'))!='bdc') {

				$output = $this->get_balance($this->input->post('crypto'),$this->input->post('address'));

				echo json_encode($output);
				# code...
			} else {

				$blackdiamond = new Bitcoin($this->rpc_user,$this->rpc_password,$this->rpc_url,$this->rpc_port);

				$balance = $blackdiamond->getaccount($this->input->post('address'));
				
				if ( is_bool($balance) && $balance==false) {
					# code...
						$output = array('status'=>'false');
				} else {

						$output = array('status'=>'success');

				}

				echo json_encode($output);
			
			}
			
			
		} else {
			return redirect('wallet');
		}
	}

	private function get_balance($crypto,$address) {

		$url = 'https://api.blockcypher.com/v1/'.$crypto.'/main/addrs/'.$address.'/balance';
		$result = array('status'=>'false','result'=>'');
		if(in_array(strtoupper($crypto),$this->wallet)){
			 if(!function_exists("curl_init")) return "cURL extension is not installed";
				    if (trim($url) == "") die("@ERROR@");
				    $curl = curl_init($url);
				    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
				
				    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);                    
				    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);                          
				    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);                       
				    $response = curl_exec($curl);                                          
				    $resultStatus = curl_getinfo($curl);                                   
				   	
				    if($resultStatus['http_code'] == 200) {
				       
				        // All Ok
				    	$result['status'] = 'success';
				    	$result['result'] = utf8_encode($response);
				    } 
				
				    $curl = null;
				}
			    return $result; 
	}
	public function do_transaction() {

		if ($this->input->post()) {
			# code...
			$pass    = md5($this->input->post('pass'));
			$amount  = trim($this->input->post('amount'));
			$address = trim($this->input->post('address'));
			$wallet  = trim($this->input->post('wallet'));
			 // print_r($this->input->post());
			// $username  = $this->input->post('username');
			// $email  = $this->input->post('email');

			$output = $this->dashboardModel->checkUser($pass);
			$response = array('status'=>'false','error'=>'','result'=>'');
			// echo json_encode($output);
			if (isset($output)) {
				
				// perform the transaction
				if ($output->wallet_type != 'BDC') {
					# code...
					$balance = $this->get_balance(strtolower($output->wallet_type),$output->wallet_address);
					$result  = json_decode($balance['result']);
					$balance = $result->balance;
					if ($balance <= 0 ) {
						 $response['error'] = 'Not enaugh balance in your wallet !';
					} else {


						$rslt = $this->doing_transaction($output->wallet_address,$address,$output->wallet_type,$amount);
						$response['status'] = 'success';
						$response = $rslt;
					}

					echo json_encode($response);
				} else{

					$amt = number_format((float)$amount, 8, '.', '');
					settype($amt,'double');
					
					$blackdiamond = new Bitcoin($this->rpc_user,$this->rpc_password,$this->rpc_url,$this->rpc_port);
					$set_acc = $this->session->userdata('user_id').$this->session->userdata('user_email');
					$w = $blackdiamond->sendfrom(md5($set_acc),$address,$amt);
					// print_r($blackdiamond);
					if ($w) {
						$response['status']='success';
					}
				}

			} else {

				$response['status']='error';
			}

			echo json_encode($response);
		} else {

			return redirect('wallet');
		}
	}

	private function doing_transaction($address_from,$address_to,$crypto,$amount) {

		// $request = '{"inputs":[{"addresses": ["'.$address_from.'"]}],"outputs":[{"addresses": ["'.$address_to.'"], "value": '.$amount.'}]}';

		
		$chain = ($crypto == 'btc')  ? 'test3' : 'test';

		$url ='https://api.blockcypher.com/v1/'.$crypto.'/'.$chain.'/txs/new';
		$output = array('status'=>'false','result'=>'');
		
		$inputs = array('addresses'=>array($address_from));
		$outputs = array('addresses'=>array($address_to),'value'=>$amount);

		$data_string = array('inputs'=>array($inputs),'outputs'=>array($outputs));

		$data = json_encode($data_string);

		// return $data;
		// $data_string = array('address'=>$address,'amount'=>1000);
		// $data = json_encode($data_string);
	    if(!function_exists("curl_init")) return "cURL extension is not installed";
		    if (trim($url) == "") die("@ERROR@");
		    $curl = curl_init($url);
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($curl, CURLOPT_POST, 1);            
		    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                
		    // curl_setopt($curl, CURLOPT_USERPWD, 'username:password');
		    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);                    
		    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);                          
		    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);                       
		    $response = curl_exec($curl);                                          
		    $resultStatus = curl_getinfo($curl);                                   
		    if($resultStatus['http_code'] == 201) {
		       
		        $output['status'] = 'success';
		        $output['result'] = utf8_encode($response);
		    
		    } else {

		        $output['result'] = $resultStatus;

		                                
			}

		    $curl = null;
		    return $output;   
	}


	public function session_check() {

		if ($this->session->userdata('is_logged_in')) {
				
				echo 'success';
		} else {

			echo 'false';
		}
	}


	public function send_otp(){

		if ($this->input->post()) {
			
			$output = json_decode($this->dashboardModel->send_otp());

			echo $output->type;

		} else {

			return redirect('dashboard');
		}

	}

	public function check_sent_otp(){

		if ($this->input->post()) {
				
			$otp = $this->input->post('otp');
			$phone = $this->session->userdata('otp_phone');

			$output = json_decode($this->dashboardModel->check_sent_otp($otp,$phone));

			if ($output->type=='success') {
				echo 'success';
			} else {
				echo $output->type;
			}

			} else {

				return redirect('dashboard');

			} 	
	}

	

	public function change_password() {

		if ($this->input->post()) {
				
			$output = $this->dashboardModel->change_password_login();

			echo $output;

		} else {

			return redirect('dashboard');
		}
	}

}
