<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function header_list(){
		// $this->db->where('is_deleted', 'n');
		$hasil = $this->db->get('header');
		return $hasil->result();
	}

	function header_show(){
		$hasil = $this->db->get('header');
		return $hasil->result();
	}

	function add_header($name,$img){
		$user_id = $this->session->userdata('id');
		$data = array(
			'name' => $this->input->post('name'),
			'img' => $this->input->post('img'),
			'created_by' => $user_id
		);
		$result = $this->db->insert('header', $data);
		return $result;
	}

	function update_header($id,$name,$img){
		$user_id = $this->session->userdata('id');
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$img = $this->input->post('img');

		$this->db->set('name', $name);
		$this->db->set('img', $img);
		$this->db->set('updated_at', $now);
		$this->db->set('updated_by', $user_id);
		$this->db->where('id', $id);
		$result = $this->db->update('header');
		return $result;
	}

	function delete_header(){
		$user_id = $this->session->userdata('id');
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$id = $this->input->post('id');

		$this->db->set('updated_at', $now);
		$this->db->set('updated_by', $user_id);
		$this->db->set('is_deleted', 'y');
		$this->db->where('id', $id);
		$result = $this->db->update('header');
		return $result;
	}


}

/* End of file header_model.php */
/* Location: ./application/models/header_model.php */