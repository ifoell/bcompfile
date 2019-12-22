<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Services_model', 'services');
	}
	
	// List all your items
	public function index()
	{
		$data = array(
			'_content' => 'services', 
			'title' => 'Services'
		);
		$this->load->view('template', $data);
	}
	
	// List
	public function data_list()
	{
		$data = $this->services->services_list();
		echo json_encode($data);
	}
	
	// Add a new item
	public function add()
	{
		$data = $this->services->add_services();
		echo json_encode($data);
	}
	
	//Update one item
	public function update()
	{
		$data = $this->services->update_services();
		echo json_encode($data);
	}
	
	//Delete one item
	public function delete()
	{
		$data = $this->services->delete_services();
		echo json_encode($data);
	}

}

/* End of file services.php */
/* Location: ./application/controllers/services.php */