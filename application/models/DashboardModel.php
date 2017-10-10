<?php 



/**
* 
*/
class DashboardModel extends CI_Model
{
	
	var $wallets = array('BTC','LTC','DOGE','DASH','ETH','BDC');
	var $token = '3a3983b264f14785b119e903e66eaec2';
	var $sms_api = '171789AYBkainQ59a1540e';
	public function get_wallets() {

		$user_id  =  (int) $this->session->userdata('user_id');
		$q = $this->db->where(['user_id'=>$user_id])->get('wallet');

		if ($q->num_rows()) {
			
			return $q->result();
		}
	}


	public function get_current_wallet(){
		
		$user_id  =  (int) $this->session->userdata('user_id');

		$q = $this->db->select('users.current_wallet,wallet.wallet_public_key,wallet.wallet_address,wallet.wallet_type')->from('users')->where(['users.id'=>$user_id])->join('wallet','wallet.user_id = users.id AND wallet.wallet_type =  users.current_wallet')->get();

		if ($q->num_rows()) {
		
			return $q->row();
		}
	}

	public function change_wallet() {

		$coin = $this->input->post('coin');
		$output = array('status'=>'false','coin'=>$coin,'wallet_address'=>'','wallet_public_key'=>'');
		if (in_array($coin, $this->wallets)) {
			
			$user_id  =  (int) $this->session->userdata('user_id');

			$this->db->set('current_wallet',$coin)->where(['id'=>$user_id])->update('users');
			
			if ($this->db->affected_rows()==1) {

				$q = $this->db->where(['user_id'=>$user_id,'wallet_type'=>$coin])->get('wallet');
				
				if ($q->num_rows()) {
					
					$output['wallet_address'] = $q->row()->wallet_address;	
					
					if($coin!='BDC'){

						$output['wallet_public_key'] = $q->row()->wallet_public_key;
					}

					$output['status'] = 'success';
				}
			}

		}

		return $output;

	}


	public function get_all_the_wallet() {

		$q = $this->db->select('id,user_id,wallet_address,wallet_type')->from('wallet')->where(['user_id'=>$this->session->userdata('user_id')])->get();

		if ($q->num_rows()) {
			return $q->result();
		}
	}


	public function checkUser($password) {

		$q = $this->db->where(['password'=>$password,'id'=>$this->session->userdata('user_id')])->get('users');

		if ($q->num_rows()) {
			
			$user = $q->row();

			$query = $this->db->where(['user_id'=>$user->id,'wallet_type'=>$user->current_wallet])->get('wallet');

			if ($query->num_rows()) {
				
				return $query->row();
			}

		}
	}

	public function get_myinfo(){


		$q = $this->db->select('id,username,email,phone')->from('users')->where(['id'=>$this->session->userdata('user_id')])->get();

		if ($q->num_rows()) {
			
			return $q->row();

		}
	}


		private function send_message($otp_code,$number) {

			$auth_key = $this->sms_api;
			$url = 'https://control.msg91.com/api/sendotp.php?authkey='.$auth_key.'&mobile='.$number.'&message=Your%20otp%20is%20'.$otp_code.'&sender=OTPSMS&otp='.$otp_code;
			 if(!function_exists("curl_init")) return "cURL extension is not installed";
			    if (trim($url) == "") die("@ERROR@");
			    $curl = curl_init($url);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
			    curl_setopt($curl, CURLOPT_POST, 1);                        
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

	public function send_otp(){
		$otp_code = rand(1,999999);
		$user     = $this->get_myinfo();
		$this->session->set_userdata('otp_phone',$user->phone);
		return $this->send_message($otp_code,$user->phone);

	}

	public function check_sent_otp($otp,$mobile) {

			$auth_key = $this->sms_api;
			$url = 'https://control.msg91.com/api/verifyRequestOTP.php?authkey='.$auth_key.'&mobile='.$mobile.'&otp='.$otp;
			 if(!function_exists("curl_init")) return "cURL extension is not installed";
			    if (trim($url) == "") die("@ERROR@");
			    $curl = curl_init($url);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
			    curl_setopt($curl, CURLOPT_POST, 1);                        
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

	public function change_password_login() {

		$q = $this->db->set('password',md5($this->input->post('password')))->where(['id'=>$this->session->userdata('user_id')])->update('users');
		if ($this->db->affected_rows()>=0) {

			$this->session->set_flashdata('fmsg', 'Password changed successfully, please login');
			
			return 'success';
		} else {

			return 'error';
		}

	}

	public function change_password() {

		$q = $this->db->set('password',md5($this->input->post('password')))->where(['id'=>$this->session->userdata('fid')])->update('users');
		if ($this->db->affected_rows()>=0) {

			$this->session->set_flashdata('fmsg', 'Password changed successfully, please login');
			
			return 'success';
		} else {

			return 'error';
		}

	}

	public function check_forgotUser() {

		$q = $this->db->where(['phone'=>$this->input->post('phone'),'email'=>$this->input->post('email')])->get('users');

		$output = 'error';
		if ($q->num_rows()) {
			
			 $output = 'success';
			 $otp_code = rand(1,999999);
		
		     $this->send_message($otp_code,$this->input->post('phone'));

			 $data = array('fphone'=>$this->input->post('phone'),'femail'=>$this->input->post('email'),'fid'=>$q->row()->id);
			 $this->session->set_userdata($data);

		}

		return $output;


	}

}