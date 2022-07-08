<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
    }

    public function index()
	{
		$data['title'] = 'Barang';
        $data['barang'] = $this->BarangModel->get();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/barang/barang', $data);
		$this->load->view('layout/footer');
	}

    public function add(){
        $data['title'] = 'Tambah Barang';
		$this->load->view('layout/header', $data);
		$this->load->view('admin/barang/add_barang', $data);
		$this->load->view('layout/footer');
    }

    public function edit($id_barang){
        $data['title'] = 'Edit Barang';
        $data['barang'] = $this->BarangModel->getById($id_barang);
		$this->load->view('layout/header', $data);
		$this->load->view('admin/barang/edit_barang', $data);
		$this->load->view('layout/footer');
    }

}