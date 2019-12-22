<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Header_model', 'header');
	}
	
	// List all your items
	public function index()
	{
		$data = array(
			'_content' => 'header', 
			'title' => 'Header'
		);
		$this->load->view('template', $data);
	}
	
	// List
	public function data_list()
	{
		$data = $this->header->header_list();
		echo json_encode($data);
	}
	
	// Add a new item
	public function add()
	{
		// $data = $this->header->add_header();
		// echo json_encode($data);
		$config['upload_path']="./_res/img";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->header->add("file")){
            $data = array('upload_data' => $this->upload->data());
 
            $name= $this->input->post('name');
            $img= $data['upload_data']['file_name']; 
             
            $result= $this->header->add_header($name,$img);
            echo json_decode($result);
        }
	}
	
	//Update one item
	public function update()
	{
		// $data = $this->header->update_header();
		// echo json_encode($data);
		$config['upload_path']="./_res/img";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('header',$config);
        if($this->header->add("file")){
            $data = array('upload_data' => $this->header->data());
 
            $name= $this->input->post('name');
            $img= $data['upload_data']['file_name'];
             
            $result= $this->header->update_header($id,$name,$img);
            echo json_decode($result);
        }
	}
	
	//Delete one item
	public function delete()
	{
		$data = $this->header->delete_header();
		echo json_encode($data);
	}
}

/* End of file header.php */
/* Location: ./application/controllers/header.php */