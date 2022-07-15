<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('BahanModel');
        $this->load->model('KeranjangModel', 'cart');
    }

    public function index()
	{
		$data['title'] = 'Bahan';
        $data['cartCount'] = $this->cart->count();
        $data['keranjang'] = $this->cart->get();

        $data['bahan'] = $this->BahanModel->get();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/bahan/bahan', $data);
		$this->load->view('layout/footer');
	}

    public function add(){
        $data['title'] = 'Tambah Bahan';
        $data['cartCount'] = $this->cart->count();
        $data['keranjang'] = $this->cart->get();

        $this->form_validation->set_rules('nama_bahan', 'Nama Bahan', 'required', [
            'required' => 'Nama Bahan Wajib di isi'
        ]);
        $this->form_validation->set_rules('stok_bahan', 'Stok Bahan', 'required', [
            'required' => 'Stok Bahan Wajib di isi'
        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/bahan/add_bahan', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_bahan' => $this->input->post('nama_bahan'),
                'stok_bahan' => $this->input->post('stok_bahan'),
            ];
            $upload_image = $_FILES['gambar_bahan']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '4096';
                $config['upload_path'] = './assets/image/bahan/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar_bahan')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_bahan', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
    
            $this->BahanModel->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Bahan berhasil ditambah!</div>');
            redirect("Bahan");
        }
    }

    public function edit($id_bahan){
        $data['title'] = 'Edit Bahan';
        $data['bahan'] = $this->BahanModel->getById($id_bahan);
		$data['cartCount'] = $this->cart->count();
        $data['keranjang'] = $this->cart->get();

        $this->form_validation->set_rules('nama_bahan', 'Nama Bahan', 'required', [
            'required' => 'Nama Bahan Wajib di isi'
        ]);
        $this->form_validation->set_rules('stok_bahan', 'Stok Bahan', 'required', [
            'required' => 'Stok Bahan Wajib di isi'
        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('admin/bahan/edit_bahan', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_bahan' => $this->input->post('nama_bahan'),
                'stok_bahan' => $this->input->post('stok_bahan')
            ];

            $upload_image = $_FILES['gambar_bahan']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '4096';
                $config['upload_path'] = './assets/image/bahan/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar_bahan')) {
                    $old_image = $data['bahan']['gambar_bahan'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/image/bahan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_bahan', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
    
            $id = $this->input->post('id_bahan');
            $this->BahanModel->update(['id_bahan' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Bahan berhasil diubah!</div>');
            redirect("Bahan");
        }
    }

    public function delete($id)
    {
        $this->BahanModel->delete($id);
        redirect('Bahan');
    }
}