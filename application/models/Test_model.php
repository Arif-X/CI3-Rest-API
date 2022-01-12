<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model{

	public function index(){
		$id = $this->input->get('id');
		$limit = $this->input->get('limit');

		if(empty($id) && empty($limit)){
			$this->db->select('*');
			$this->db->from('items');
		} else if(!empty($limit)){
			$this->db->select('*');
			$this->db->from('items');
			$this->db->limit();
		} else if(!empty($id)) {
			$this->db->select('*');
			$this->db->from('items');
			$this->db->where('id', $id);
		}
		return $this->db->get()->result();
	}

	public function store($data){
		$this->db->insert('items', $data);
		return true;
	}

	public function edit($id, $data){
		$this->db->where('id', $id);
		$this->db->update('items', $data);
		return true;
	}

	public function destroy(){
		$this->db->where('id', $id);
		$this->db->delete('items');
		return true;
	}

}