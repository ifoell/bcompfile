<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portofolio extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
	
	}
	
	// List all your items
	public function index()
	{
		$data = array(
			'_content' => 'portofolio', 
			'title' => 'Portofolio'
		);
		$this->load->view('template', $data);
	}
	
	// Add a new item
	public function add()
	{
	
	}
	
	//Update one item
	public function update( $id = NULL )
	{
	
	}
	
	//Delete one item
	public function delete( $id = NULL )
	{
	
	}

}

/* End of file portofolio.php */
/* Location: ./application/controllers/portofolio.php */