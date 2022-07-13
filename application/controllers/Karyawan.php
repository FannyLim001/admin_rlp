<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('KaryawanModel');
        $this->load->model('KeranjangModel', 'cart');
    }

    public function index()
	{
		$data['title'] = 'Karyawan';
        $data['karyawan'] = $this->KaryawanModel->get();
        $data['cartCount'] = $this->cart->count();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/karyawan/karyawan', $data);
		$this->load->view('layout/footer');
	}

    public function add(){
        $data['title'] = 'Tambah Karyawan';
        $data['cartCount'] = $this->cart->count();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/karyawan/add_karyawan', $data);
		$this->load->view('layout/footer');
    }

    public function edit($id_karyawan){
        $data['title'] = 'Edit Karyawan';
        $data['karyawan'] = $this->KaryawanModel->getById($id_karyawan);
        $data['cartCount'] = $this->cart->count();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/karyawan/edit_karyawan', $data);
		$this->load->view('layout/footer');
    }

}