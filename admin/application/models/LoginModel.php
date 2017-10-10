<?php 


/**
* 
*/
 
class LoginModel extends CI_Model
{

	

	public function login() {

		$info  = $this->input->post();

		
		$this->load->library('form_validation');

		$output = array();
		
		$output['status'] = "false";
		
		$output['error']    = "";
				

		if ($this->form_validation->run('login_form_validation')==FALSE) {
				
			
			$output['error']    = form_error('email') . ' '.form_error('password');
			

		} else {

		
			$info['password'] = md5($info['password']);
			
			$result = $this->db->where($info)->get('admin');

			if ($result->num_rows()) {
					
				$user  = $result->row();
		
						
						$output['status'] = "success";
						$data = array(

							'user_id'      => $user->id,
							'email'        => $user->email,
							'is_logged_in' => 1
							
							
					    );

					$this->session->set_userdata($data);
					
			} else {
				
				$output['error']  = "Email/password did not matched !";
				
			}


		}

		return $output;

	}





}