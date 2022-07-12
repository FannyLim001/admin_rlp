<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('BahanModel');
    }

    public function index()
	{
		$data['title'] = 'Bahan';
        $data['bahan'] = $this->BahanModel->get();
		$this->load->view('layout/header', $data);
		$this->load->view('admin/bahan/bahan', $data);
		$this->load->view('layout/footer');
	}

    public function add(){
        $data['title'] = 'Tambah Bahan';
		$this->load->view('layout/header', $data);
		$this->load->view('admin/bahan/add_bahan', $data);
		$this->load->view('layout/footer');
    }

    public function upload()
    {
        $data = [
            'nama_bahan' => $this->input->post('nama_bahan'),
            'stok_bahan' => $this->input->post('stok_bahan'),
        ];
        $upload_image = $_FILES['gambar_bahan']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/bahan/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar_bahan')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar_bahan', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->BahanModel->insert($data, $upload_image);
        redirect("Bahan");
    }

    public function edit($id_bahan){
        $data['title'] = 'Edit Bahan';
        $data['bahan'] = $this->BahanModel->getById($id_bahan);
		$this->load->view('layout/header', $data);
		$this->load->view('admin/bahan/edit_bahan', $data);
		$this->load->view('layout/footer');
    }

    public function delete($id)
    {
        $this->BahanModel->delete($id);
        redirect('bahan');
    }

    public function update()
    {
        $data = [
            'nama_bahan' => $this->input->post('nama_bahan'),
            'stok_bahan' => $this->input->post('stok_bahan'),
            // 'gambar_bahan' => $this->input->post('gambar_bahan') 
        ];
        $upload_image = $_FILES['gambar_bahan']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/bahan/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar_bahan')) {
                $old_image = $data['bahan']['gambar'];
                if ($old_image != 'default.png') {
                    unlink(FCPATH . './assets/img/bahan/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar_bahan', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $id = $this->input->post('id_bahan');
        $this->BahanModel->update(['id_bahan' => $id], $data, $upload_image);
        redirect("Bahan");
    }

}