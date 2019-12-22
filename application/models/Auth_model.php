<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	public $table = "user";

	function cek_login($username,$password){
        $this->db->where('username',$username);
        // $this->db->where('password',  md5($password));
        $this->db->where('password', $password);
        $user = $this->db->get('user')->row_array();
        return $user;
    }
}

/* End of file auth.php */
/* Location: ./application/models/auth.php */