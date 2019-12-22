<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Misi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Misi_model', 'misi');
	}
	
	// List all your items
	public function index()
	{
		$data = array(
			'_content' => 'misi', 
			'title' => 'Misi'
		);
		$this->load->view('template', $data);
	}
	
	// List
	public function data_list()
	{
		$data = $this->misi->misi_list();
		echo json_encode($data);
	}
	
	// Add a new item
	public function add()
	{
		$data = $this->misi->add_misi();
		echo json_encode($data);
	}
	
	//Update one item
	public function update()
	{
		$data = $this->misi->update_misi();
		echo json_encode($data);
	}
	
	//Delete one item
	public function delete()
	{
		$data = $this->misi->delete_misi();
		echo json_encode($data);
	}
}

/* End of file misi.php */
/* Location: ./application/controllers/misi.php */