<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */