<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		admin_logged_in();
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
		$data['total_bahan'] = $this->BahanModel->count_total();
		$data['total_karyawan'] = $this->KaryawanModel->count_total();
		$data['total_supplier'] = $this->SupplierModel->count_total();
		$data['total_transaksi'] = $this->TransaksiModel->count_total();
		$data['transaksi_berjalan'] = $this->TransaksiModel->count_curr();
		$data['stok_diambil'] = $this->TransaksiModel->count_left();
		$data['stok_tersedia'] = $this->BahanModel->count_curr();


		$this->load->view('layout/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('layout/footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['admin'] = $this->KaryawanModel->getById(1);
		$data['cartCount'] = $this->cart->count();
		$data['keranjang'] = $this->cart->get();

		$this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email Wajib di isi'
        ]);

		if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
            ];

            $id = 1;
            $this->KaryawanModel->update(['id_user' => $id], $data);
            $this->session->set_flashdata('message', 
			'<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert">
				<span class="alert-icon">
					<i class="ft-thumbs-up"></i>
				</span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Data Admin berhasil diubah!</strong>
			</div>');
            redirect("admin/edit");
        }
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
		$data['karyawan'] = $this->KaryawanModel->get();
		// print_r($data['transaksi']); die;
		$this->form_validation->set_rules('status_transaksi', 'Status Transaksi', 'required', [
			'required' => 'Status wajib diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('admin/transaksi/detail_transaksi', $data);
			$this->load->view('layout/footer');
		} else {
			$data = [
				'status_transaksi'=> $this->input->post('status_transaksi'),
				'id_karyawan' => $this->input->post('id_karyawan')
			];
			$where = [
				'no_transaksi'=> $this->input->post('nomor_transaksi')
			];

			$this->TransaksiModel->update($where, $data);
			$this->session->set_flashdata(
				'message',
				'<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert">
					<span class="alert-icon">
						<i class="ft-thumbs-up"></i>
					</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong>Transaksi berhasil diubah!</strong>
				</div>'
			);
			redirect('admin/transaksi');
		}
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
			$this->session->set_flashdata(
				'message',
				'<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert">
					<span class="alert-icon">
						<i class="ft-thumbs-up"></i>
					</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong>Bahan berhasil masuk ke keranjang!</strong>
				</div>'
			);
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
		$this->session->set_flashdata(
			'message',
			'<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert">
			<span class="alert-icon">
				<i class="ft-thumbs-up"></i>
			</span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Bahan berhasil dihapus dari keranjang!</strong>
		</div>'
		);
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
			for($i = 0; $i < $jumlah_bahan; $i++)
			{
				$this->BahanModel->stock_increment($data_detail[$i]['jumlah'], $data_detail[$i]['id_bahan']) or 
				die(
					$this->session->set_flashdata(
						'message',
						'<div class="alert round bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
						<span class="alert-icon">
							<i class="ft-thumbs-down"></i>
						</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Stok Bahan Gagal ditambahkan!</strong>
					</div>'
					)
				);
			}

			$this->cart->delete_all();
			$this->session->set_flashdata(
				'message',
				'<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert">
				<span class="alert-icon">
					<i class="ft-thumbs-up"></i>
				</span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Pesanan Berhasil dibuat!</strong>
			</div>'
			);
			redirect('Bahan');
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert round bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
				<span class="alert-icon">
					<i class="ft-thumbs-down"></i>
				</span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Pesanan Gagal dibuat!</strong>
			</div>'
			);
			redirect('Bahan');
		}
	}
}
