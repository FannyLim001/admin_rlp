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
		$this->load->model('TransaksiModel');
		$this->load->model('DetailTransaksiModel');
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

	public function transaksi()
	{
		$data['title'] = 'Transaksi';
		$data['cartCount'] = $this->cart->count();
		$data['keranjang'] = $this->cart->get();
		$data['transaksi'] = $this->TransaksiModel->get();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/transaksi/transaksi', $data);
		$this->load->view('layout/footer');
	}

	public function detail_transaksi($id)
	{
		$data['title'] = 'Detail Transaksi';
		$data['cartCount'] = $this->cart->count();
		$data['keranjang'] = $this->cart->get();
		$data['transaksi'] = $this->TransaksiModel->getByTransaksi($id);
		$data['detail_transaksi'] = $this->DetailTransaksiModel->getByTransaksi($id);

		$this->load->view('layout/header', $data);
		$this->load->view('admin/transaksi/detail_transaksi', $data);
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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bahan berhasil masuk ke keranjang!</div>');
			redirect('Bahan');
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
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus dari keranjang!</div>');
		redirect('Admin/detail');
	}

	public function pesanan()
	{
		$jumlah_bahan = count($this->input->post('bahan'));
		$data_p = [
			'no_transaksi' => $this->input->post('no_transaksi'),
			'id_karyawan' => $this->input->post('id_karyawan'),
			'id_supplier' => $this->input->post('id_supplier'),
			'tanggal' => date('d/m/Y'),
			'keterangan' => $this->input->post('keterangan')
		];

		$upload_image = $_FILES['bukti_transaksi']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '4096';
			$config['upload_path'] = './assets/image/transaksi/';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('bukti_transaksi')) {
				$new_image = $this->upload->data('file_name');
				$this->db->set('bukti_transaksi', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data_detail = [];
		for ($i = 0; $i < $jumlah_bahan; $i++) {
			array_push($data_detail, ['id_bahan' => $this->input->post('bahan')[$i]]);
			$data_detail[$i]['no_transaksi'] = $this->input->post('no_transaksi');
			$data_detail[$i]['jumlah'] = $this->input->post('jumlah_p')[$i];
		}
		if ($this->TransaksiModel->insert($data_p, $upload_image) && $this->DetailTransaksiModel->insert($data_detail)) {
			$this->cart->delete_all();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Berhasil dibuat!</div>');
			redirect('Bahan');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Gagal dibuat!</div>');
			redirect('Bahan');
		}
	}
}
