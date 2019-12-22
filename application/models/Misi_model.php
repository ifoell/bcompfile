<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Misi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	function misi_list(){
		$hasil = $this->db->get('misi');
		return $hasil->result();
	}

	function misi_show(){
		// $data = array(
		// );
		$hasil = $this->db->get('misi');
		return $hasil->result();
	}

	function add_misi(){
		$user_id = $this->session->userdata('id');
		$data = array(
			'name' => $this->input->post('name'),
			'detail' => $this->input->post('detail'),
			'created_by' => $user_id
		);
		$result = $this->db->insert('misi', $data);
		return $result;
	}

	function update_misi(){
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
		$result = $this->db->update('misi');
		return $result;
	}

	function delete_misi(){
		$user_id = $this->session->userdata('id');
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$id = $this->input->post('id');

		$this->db->set('updated_at', $now);
		$this->db->set('updated_by', $user_id);
		$this->db->set('is_deleted', 'y');
		$this->db->where('id', $id);
		$result = $this->db->update('misi');
		return $result;
	}


}

/* End of file misi_model.php */
/* Location: ./application/models/misi_model.php */