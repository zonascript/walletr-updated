<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* 
*/
class DashboardModel extends CI_Model
{
	
	
	public function get_users() {

		$q = $this->db->order_by('username','asc')->get('users');
		if ($q->num_rows()) {
		
			return $q->result();
		}
	}

	public function count_users() {

		$q = $this->db->count_all_results('users');
		
		
	    return $q;
		
	}

}