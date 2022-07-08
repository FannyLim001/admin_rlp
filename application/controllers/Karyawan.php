<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('KaryawanModel');
    }

    public function index()
	{
		$data['title'] = 'Karyawan';
        $data['barang'] = $this->KaryawanModel->get();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/karyawan/karyawan', $data);
		$this->load->view('layout/footer');
	}

    public function add(){
        $data['title'] = 'Tambah Karyawan';
		$this->load->view('layout/header', $data);
		$this->load->view('admin/karyawan/add_karyawan', $data);
		$this->load->view('layout/footer');
    }

    public function edit($id_karyawan){
        $data['title'] = 'Edit Karyawan';
        $data['barang'] = $this->Karyawan->getById($id_karyawan);
		$this->load->view('layout/header', $data);
		$this->load->view('admin/karyawan/edit_karyawan', $data);
		$this->load->view('layout/footer');
    }

}