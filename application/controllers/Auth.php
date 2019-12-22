<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	function cek_login(){
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$login_admin = $this->Auth_model->cek_login($username, $password);

			if(!empty($login_admin)){
				$session = array(
					'id'			=> $login_admin['id'],
					'nama_lengkap'	=> $login_admin['name'],
					'email'			=> $login_admin['email'],
					'role'			=> $login_admin['role']
				);
				$this->session->userdata($session);
				redirect('dashboard');
			} else{
				redirect('auth');
			}
		} else {
			redirect('auth');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		// redirect(base_url());
		redirect('auth');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */