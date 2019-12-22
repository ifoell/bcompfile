<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function visi_list(){
		// $this->db->where('is_deleted', 'n');
		$hasil = $this->db->get('visi');
		return $hasil->result();
	}

	function visi_show(){
		$hasil = $this->db->get('visi');
		return $hasil->result();
	}

	function add_visi(){
		$user_id = $this->session->userdata('id');
		$data = array(
			'name' => $this->input->post('name'),
			'detail' => $this->input->post('detail'),
			'created_by' => $user_id
		);
		$result = $this->db->insert('visi', $data);
		return $result;
	}

	function update_visi(){
		$user_id = $this->session->userdata('id');
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$detail = $this->input->post('detail');

		$this->db->set('name', $name);
		$this->db->set('detail', $detail);
		$this->db->set('updated_at', $now);
		$this->db->set('updated_by', $user_id);
		$this->db->where('id', $id);
		$result = $this->db->update('visi');
		return $result;
	}

	function delete_visi(){
		$user_id = $this->session->userdata('id');
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$id = $this->input->post('id');

		$this->db->set('updated_at', $now);
		$this->db->set('updated_by', $user_id);
		$this->db->set('is_deleted', 'y');
		$this->db->where('id', $id);
		$result = $this->db->update('visi');
		return $result;
	}


}

/* End of file visi_model.php */
/* Location: ./application/models/visi_model.php */