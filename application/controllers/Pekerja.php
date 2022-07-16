<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pekerja extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KaryawanModel');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';

		$this->load->view('layout_karyawan/header', $data);
		$this->load->view('karyawan/dashboard_karyawan', $data);
		$this->load->view('layout_karyawan/footer');
	}
}