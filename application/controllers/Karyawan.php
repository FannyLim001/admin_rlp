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
        $data['keranjang'] = $this->cart->get();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/karyawan/karyawan', $data);
		$this->load->view('layout/footer');
	}

    public function add(){
        $data['title'] = 'Tambah Karyawan';
        $data['cartCount'] = $this->cart->count();
        $data['keranjang'] = $this->cart->get();

        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required', [
            'required' => 'Nama Karyawan Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password Wajib di isi'
        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/karyawan/add_karyawan', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama_karyawan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role' => 'Karyawan'
            ];
            $this->KaryawanModel->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Karyawan berhasil ditambah!</div>');
            redirect("Karyawan");
        }
    }

    public function edit($id_karyawan){
        $data['title'] = 'Edit Karyawan';
        $data['karyawan'] = $this->KaryawanModel->getById($id_karyawan);
        $data['cartCount'] = $this->cart->count();
        $data['keranjang'] = $this->cart->get();

        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required', [
            'required' => 'Nama Karyawan Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/karyawan/edit_karyawan', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama_karyawan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            ];

            $id = $this->input->post('id_user');
            $this->KaryawanModel->update(['id_user' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Karyawan berhasil diubah!</div>');
            redirect("Karyawan");
        }
    }

    public function delete($id)
    {
        $this->KaryawanModel->delete($id);
        redirect('Karyawan');
    }
}