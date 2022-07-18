<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pekerja extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		user_logged_in();
		$this->load->model('TransaksiModel');
		$this->load->model('DetailTransaksiModel');
		$this->load->model('KaryawanModel');
	}

	public function index()
	{
		$data['title'] = 'Transaksi';
		$id = $this->session->userdata('id');
		$data['transaksi'] = $this->TransaksiModel->getByIdKaryawan($id);

		$this->load->view('layout_karyawan/header', $data);
		$this->load->view('karyawan/transaksi_karyawan', $data);
		$this->load->view('layout_karyawan/footer');
	}

	public function detail_transaksi($id)
	{
		$data['title'] = 'Detail Transaksi';
		$data['transaksi'] = $this->TransaksiModel->getByTransaksi($id);
		$data['detail_transaksi'] = $this->DetailTransaksiModel->getByTransaksi($id);
		$data['karyawan'] = $this->KaryawanModel->get();
		// print_r($data['transaksi']); die;
		$this->form_validation->set_rules('status_transaksi', 'Status Transaksi', 'required', [
			'required' => 'Status wajib diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout_karyawan/header', $data);
			$this->load->view('karyawan/detail_transaksi_karyawan', $data);
			$this->load->view('layout_karyawan/footer');
		} else {
			$data = [
				'status_transaksi'=> $this->input->post('status_transaksi'),
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
			redirect('pekerja/transaksi');
		}
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$id = $this->session->userdata('id');
		$data['karyawan'] = $this->KaryawanModel->getById($id);

		$this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email Wajib di isi'
        ]);

		if ($this->form_validation->run() == false) {
            $this->load->view('layout_karyawan/header', $data);
			$this->load->view('karyawan/profile', $data);
			$this->load->view('layout_karyawan/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
            ];
			
            $this->KaryawanModel->update(['id_user' => $id], $data);
            $this->session->set_flashdata('message', 
			'<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert">
				<span class="alert-icon">
					<i class="ft-thumbs-up"></i>
				</span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Data Karyawan berhasil diubah!</strong>
			</div>');
            redirect("pekerja/edit");
        }

	}

}