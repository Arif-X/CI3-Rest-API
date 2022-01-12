<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'libraries/Format.php';
require APPPATH. 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Test extends RestController{

	public function __construct(){
		parent::__construct();
		$this->load->model('Test_model');
	}

	public function index_get(){
		$data = $this->Test_model->index();
		if($data){
			return $this->response([
				'status' => 'success',
				'message' => 'Data didapat',
				'data' => $data,
			], RestController::HTTP_OK);	
		} else {
			return $this->response([
				'status' => 'error',
				'message' => 'Data tidak dapat didapat'
			], RestController::HTTP_OK);	
		}
	}

	public function index_post(){
		$datas = [
			'nama' => $this->input->post('nama'),
			'harga' => $this->input->post('harga'),
		];

		$data = $this->Test_model->store($data);

		if($data){
			return $this->response([
				'status' => 'success',
				'message' => 'Data ditambahkan',
				'data' => $data,
			], RestController::HTTP_OK);	
		} else {
			return $this->response([
				'status' => 'error',
				'message' => 'Data tidak dapat ditambahkan'
			], RestController::HTTP_OK);	
		}
	}

	public function index_put(){
		$id = $this->put('id');
		$datas = [
			'nama' => $this->put('nama'),
			'harga' => $this->put('harga')
		];

		$data = $this->Test_model->edit($id, $datas);

		if($data){
			return $this->response([
				'status' => 'success',
				'message' => 'Data diupdate',
				'data' => $data,
			], RestController::HTTP_OK);	
		} else {
			return $this->response([
				'status' => 'error',
				'message' => 'Data tidak dapat diupdate'
			], RestController::HTTP_OK);	
		}
	}

	public function index_delete(){
		$id = $this->input->delete('id');
		$data = $this->Test_model->destroy($id);

		if($data){
			return $this->response([
				'status' => 'success',
				'message' => 'Data dihapus',
				'data' => $data,
			], RestController::HTTP_OK);	
		} else {
			return $this->response([
				'status' => 'error',
				'message' => 'Data tidak dapat dihapus'
			], RestController::HTTP_OK);	
		}	
	}
}