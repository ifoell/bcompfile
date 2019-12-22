<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function location_list(){
		// $this->db->where('is_deleted', 'n');
		$hasil = $this->db->get('location');
		return $hasil->result();
	}

	function location_show(){
		$hasil = $this->db->get('location');
		return $hasil->result();
	}

	function add_location(){
		$user_id = $this->session->userdata('id');
		$data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'lat' => $this->input->post('lat'),
			'lng' => $this->input->post('lng'),
			'type' => $this->input->post('type'),
			'created_by' => $user_id
		);
		$result = $this->db->insert('location', $data);
		return $result;
	}

	function update_location(){
		$user_id = $this->session->userdata('id');
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$type = $this->input->post('type');

		$this->db->set('name', $name);
		$this->db->set('address', $address);
		$this->db->set('lat', $lat);
		$this->db->set('lng', $lng);
		$this->db->set('type', $type);
		$this->db->set('updated_at', $now);
		$this->db->set('updated_by', $user_id);
		$this->db->where('id', $id);
		$result = $this->db->update('location');
		return $result;
	}

	function delete_location(){
		$user_id = $this->session->userdata('id');
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$id = $this->input->post('id');

		$this->db->set('updated_at', $now);
		$this->db->set('updated_by', $user_id);
		$this->db->set('is_deleted', 'y');
		$this->db->where('id', $id);
		$result = $this->db->update('location');
		return $result;
	}


}

/* End of file location_model.php */
/* Location: ./application/models/location_model.php */