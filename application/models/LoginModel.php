<?php 


/**
* 
*/
 
class LoginModel extends CI_Model
{

	var $sms_api = '171789AYBkainQ59a1540e';

	public function login() {

		$info  = $this->input->post();

		
		$this->load->library('form_validation');

		$output = array();
		
		$output['status'] = "false";
		
		$output['error']    = "";
				

		if ($this->form_validation->run('login_form_validation')==FALSE) {
				
			
			$output['error']    = form_error('username') . ' '.form_error('password');
			

		} else {

		
			$info['password'] = md5($info['password']);
			
			$result = $this->db->where($info)->get('users');

			if ($result->num_rows()) {
					
				$user  = $result->row();
				
 			// 	$otp_code = rand(1,999999);
				// $response = $this->send_message($otp_code,$user->phone);
				// $rslt = json_decode($response)
				// return $rslt;
				// if ($rslt->type=='success') {
						
						$output['status'] = "success";
						$data = array(

							'user_id'      => $user->id,
							'user_email'   => $user->email,
							'username'     => $user->username,
							'phone'		   => $user->phone,
							'is_logged_in' => 1
							
							
					    );

					$this->session->set_userdata($data);
				// }	
			} else {
				
				$output['error']  = "Username/password did not matched !";
				
			}


		}

		return $output;

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

}