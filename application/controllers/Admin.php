<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KeranjangModel', 'cart');
		$this->load->model('BahanModel');
		$this->load->model('KaryawanModel');
		$this->load->model('SupplierModel');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['cartCount'] = $this->cart->count();
		$data['keranjang'] = $this->cart->get();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('layout/footer');
	}

	public function supplier()
	{
		$data['title'] = 'Supplier';
		$data['cartCount'] = $this->cart->count();
		$data['keranjang'] = $this->cart->get();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/supplier', $data);
		$this->load->view('layout/footer');
	}

	public function transaksi()
	{
		$data['title'] = 'Transaksi';
		$data['cartCount'] = $this->cart->count();
		$data['keranjang'] = $this->cart->get();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('layout/footer');
	}

	public function keranjang($id)
	{
		$data['title'] = 'Keranjang';
		$data['keranjang'] = $this->cart->get();
		$data['cartCount'] = $this->cart->count();
		$data['bahan'] = $this->BahanModel->getById($id);

		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
			'required' => 'Jumlah Wajib di isi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('admin/keranjang', $data);
			$this->load->view('layout/footer');
		} else {
			$data = [
				'id_bahan' => $this->input->post('id'),
				'jumlah' => $this->input->post('jumlah'),
				'tanggal' => $this->input->post('tanggal'),
			];
			$this->cart->insert($data);
			$this->session->set_flashdata('message');
			redirect('Admin/detail');
		}
	}

	public function detail()
	{
		$data['title'] = 'List Keranjang';
		$data['keranjang'] = $this->cart->get();
		$data['karyawan'] = $this->KaryawanModel->get();
		$data['supplier'] = $this->SupplierModel->get();
		$data['cartCount'] = $this->cart->count();
		$data['bahan'] = $this->BahanModel->get();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/detail_keranjang', $data);
		$this->load->view('layout/footer');
	}

	public function delkeranjang($id)
    {
        $this->cart->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil dihapus dari keranjang!</div>');
        redirect('Admin/detail');
    }
}
