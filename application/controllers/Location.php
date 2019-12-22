<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Location_model', 'location');
	}
	
	// List all your items
	public function index()
	{
		$data = array(
			'_content' => 'location', 
			'title' => 'Location'
		);
		$this->load->view('template', $data);
	}
	
	// List
	public function data_list()
	{
		$data = $this->location->location_list();
		echo json_encode($data);
	}
	
	// Add a new item
	public function add()
	{
		$data = $this->location->add_location();
		echo json_encode($data);
	}
	
	//Update one item
	public function update()
	{
		$data = $this->location->update_location();
		echo json_encode($data);
	}
	
	//Delete one item
	public function delete()
	{
		$data = $this->location->delete_location();
		echo json_encode($data);
	}
}

/* End of file location.php */
/* Location: ./application/controllers/location.php */