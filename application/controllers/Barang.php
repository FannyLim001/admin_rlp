<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function add(){
        $data['title'] = 'Tambah Barang';
		$this->load->view('layout/header', $data);
		$this->load->view('admin/barang/add_barang', $data);
		$this->load->view('layout/footer');
    }

}