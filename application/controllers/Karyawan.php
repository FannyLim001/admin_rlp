<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        admin_logged_in();
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
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'Karyawan'
            ];
            $this->KaryawanModel->insert($data);
            $this->session->set_flashdata('message', 
			'<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert">
				<span class="alert-icon">
					<i class="ft-thumbs-up"></i>
				</span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Data Karyawan berhasil ditambah!</strong>
			</div>');
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

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/karyawan/edit_karyawan', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama_karyawan'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $id = $this->input->post('id_user');
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
            redirect("Karyawan");
        }
    }

    public function delete($id)
    {
        $this->KaryawanModel->delete($id);
        $err = $this->db->error();
        if($err['code'] == 0)
        {
            $this->session->set_flashdata('message', 
			'<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert">
				<span class="alert-icon">
					<i class="ft-thumbs-up"></i>
				</span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Data Karyawan berhasil dihapus!</strong>
			</div>');
        }
        else
        {
            $this->session->set_flashdata(
                'message',
                '<div class="alert round bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                <span class="alert-icon">
                    <i class="ft-thumbs-down"></i>
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Data Karyawan Gagal dihapus!</strong>
            </div>'
            );
        }
        redirect('Karyawan');
    }
}