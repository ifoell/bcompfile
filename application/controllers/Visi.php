<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Visi_model', 'visi');
	
	}
	
	// List all your items
	public function index()
	{
		$this->load->helper('url');
		$data = array(
			'_content' => 'visi', 
			'title' => 'Visi'
		);
		$this->load->view('template', $data);
	}

	// List
	public function data_list()
	{
		$data = $this->visi->visi_list();
		echo json_encode($data);
	}
	
	// Add a new item
	public function add()
	{
		$data = $this->visi->add_visi();
		echo json_encode($data);
	}
	
	//Update one item
	public function update()
	{
		$data = $this->visi->update_visi();
		echo json_encode($data);
	}
	
	//Delete one item
	public function delete()
	{
		$data = $this->visi->delete_visi();
		echo json_encode($data);
	}
}

/* End of file visi.php */
/* Location: ./application/controllers/visi.php */