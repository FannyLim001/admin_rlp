<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();  
        $this->load->model('KaryawanModel', 'userm');
    }

    public function index()
	{
		$data['title'] = 'Login';

		$this->load->view('admin/login', $data);
	}	

    function cek_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // print_r($user);die;
        
        if ($user) {
            if($password == $user['password']){
            // if (password_verify($password, $user['password'])) {
                // print_r($user);die;
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'id' => $user['id_user'],
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == "Admin") {
                    redirect('admin');
                } else {
                    redirect('pekerja');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
        redirect('login');
    }
}