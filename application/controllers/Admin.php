<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        $this->load->model('KeranjangModel', 'cart');
		$this->load->model('BahanModel');
    }
	
	 public function index()
	{
		$data['title'] = 'Dashboard';
		$data['cartCount'] = $this->cart->count();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('layout/footer');
	}

	public function supplier()
	{
		$data['title'] = 'Supplier';
		$data['cartCount'] = $this->cart->count();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/supplier', $data);
		$this->load->view('layout/footer');
	}

	public function transaksi()
	{
		$data['title'] = 'Transaksi';
		$data['cartCount'] = $this->cart->count();
		
		$this->load->view('layout/header', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('layout/footer');
	}

	public function keranjang($id)
	{
		$data['title'] = 'Keranjang';
		$data['keranjang'] = $this->cart->get();
		$data['bahan'] = $this->BahanModel->getById($id);

		if($this->form_validation->run() == false)
		{
			$this->load->view('layout/header', $data);
			$this->load->view('admin/keranjang', $data);
			$this->load->view('layout/footer');
		}
		else
		{
			$data = [
				'id_bahan' => $this->input->post('id'),
				'jumlah' => $this->input->post('jumlah'),
				'tanggal' => $this->input->post('tanggal'),
			];
			$this->cart->insert($data);
			$this->session->set_flashdata('message');
			redirect('admin/detail_keranjang');
		}
	}
}
