<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('SupplierModel');
        $this->load->model('KeranjangModel', 'cart');
    }

    public function index()
	{
		$data['title'] = 'Supplier';
        $data['supplier'] = $this->SupplierModel->get();
        $data['cartCount'] = $this->cart->count();
        $data['keranjang'] = $this->cart->get();

		$this->load->view('layout/header', $data);
		$this->load->view('admin/supplier/supplier', $data);
		$this->load->view('layout/footer');
	}

    public function add(){
        $data['title'] = 'Tambah Supplier';
        $data['cartCount'] = $this->cart->count();
        $data['keranjang'] = $this->cart->get();

        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required', [
            'required' => 'Nama Supplier Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat_supplier', 'Alamat', 'required', [
            'required' => 'Alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required', [
            'required' => 'Nomor Telepon Wajib di isi'
        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/supplier/add_supplier', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_supplier' => $this->input->post('nama_supplier'),
                'alamat_supplier' => $this->input->post('alamat_supplier'),
                'no_telp' => $this->input->post('no_telp')
            ];
            $this->SupplierModel->insert($data);
            $this->session->set_flashdata('message', 
			'<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert">
				<span class="alert-icon">
					<i class="ft-thumbs-up"></i>
				</span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Data Supplier berhasil ditambah!</strong>
			</div>');
            redirect("Supplier");
        }
    }

    public function edit($id_supplier){
        $data['title'] = 'Edit Supplier';
        $data['supplier'] = $this->SupplierModel->getById($id_supplier);
        $data['cartCount'] = $this->cart->count();
        $data['keranjang'] = $this->cart->get();

		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required', [
            'required' => 'Nama Supplier Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat_supplier', 'Alamat', 'required', [
            'required' => 'Alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required', [
            'required' => 'Nomor Telepon Wajib di isi'
        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/supplier/edit_supplier', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_supplier' => $this->input->post('nama_supplier'),
                'alamat_supplier' => $this->input->post('alamat_supplier'),
                'no_telp' => $this->input->post('no_telp')
            ];

            $id = $this->input->post('id_supplier');
            $this->SupplierModel->update(['id_supplier' => $id], $data);
            $this->session->set_flashdata('message', 
			'<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert">
				<span class="alert-icon">
					<i class="ft-thumbs-up"></i>
				</span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Data Supplier berhasil diubah!</strong>
			</div>');
            redirect("Supplier");
        }
    }

    public function delete($id)
    {
        $this->SupplierModel->delete($id);
        redirect('Supplier');
    }
}