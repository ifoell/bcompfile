<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		// $this->template->load('template', 'dashboard');
		$this->load->view('homepage');
	}

}

/* End of file homepage.php */
/* Location: ./application/controllers/homepage.php */