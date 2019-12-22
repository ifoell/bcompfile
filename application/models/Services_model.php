<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function services_list(){
		$hasil = $this->db->get('services');
		return $hasil->result();
	}

	function services_show(){
		// $data = array(
		// );
		$hasil = $this->db->get('services');
		return $hasil->result();
	}

	function add_services(){
		$user_id = $this->session->userdata('id');
		$data = array(
			'name' => $this->input->post('name'),
			'detail' => $this->input->post('detail'),
			'icon' => $this->input->post('icon'),
			'created_by' => $user_id
		);
		$result = $this->db->insert('services', $data);
		return $result;
	}

	function update_services(){
		$user_id = $this->session->userdata('id');
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$detail = $this->input->post('detail');
		$icon = $this->input->post('icon');

		$this->db->set('name', $name);
		$this->db->set('detail', $detail);
		$this->db->set('icon', $icon);
		$this->db->set('updated_at', $now);
		$this->db->set('updated_by', $user_id);
		$this->db->where('id', $id);
		$result = $this->db->update('services');
		return $result;
	}

	function delete_services(){
		$user_id = $this->session->userdata('id');
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$id = $this->input->post('id');

		$this->db->set('updated_at', $now);
		$this->db->set('updated_by', $user_id);
		$this->db->set('is_deleted', 'y');
		$this->db->where('id', $id);
		$result = $this->db->update('services');
		return $result;
	}


}

/* End of file services_model.php */
/* Location: ./application/models/services_model.php */