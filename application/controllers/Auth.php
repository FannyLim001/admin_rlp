<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();  
        $this->load->model('KaryawanModel', 'userm');
    }

    public function index()
	{
		$data['title'] = 'Login';
        if(!$this->session->userdata('id')) $this->load->view('login', $data);
        else redirect(($this->session->userdata('role') == "Admin") ? 'admin' : 'pekerja');
	}	

    function cek_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // print_r($user);die;
        
        if ($user) {
            if(password_verify($password, $user['password'])){
            // if($password == $user['password']){
            // if (password_verify($password, $user['password'])) {
                // print_r($user);die;
                $data = [
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'id' => $user['id_user'],
                ];
                $this->session->set_userdata($data);
                redirect(($this->session->userdata('role') == "Admin") ? 'admin' : 'pekerja');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert round bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Password salah!</strong>
                </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
            redirect('auth');
        }
    }

    function logout()
    {
        // session_destroy();
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('id');
        $this->session->set_flashdata(
            'message',
            '<div class="alert round bg-success alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Berhasil Logout</strong>
        </div>'
        );
        redirect('auth');
    }

    function forgot_password(){
        if(isset($_POST['submit-step-one'])){
            // print_r(isset($_POST['submit-step-one']));die;
            $data = ['email'=>$this->input->post('email')];
            if($this->userm->cek_email($data['email'])->num_rows()){
                $this->load->view('new_password',$data);
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert round bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Email tidak terdaftar!</strong>
                </div>'
                );
                redirect('auth');
            }
        }
        else if(isset($_POST['submit-step-two']))
        {
            $where = [
                'email' => $this->input->post('email')
            ];
            
            $data = [
                
                'password'=> password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            if($this->userm->update($where, $data))
            {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert round bg-success alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Password berhasil diubah!</strong>
                </div>'
                );
                redirect('auth');
            }
            else
            {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert round bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Password gagal diubah!</strong>
                </div>'
                );
                redirect('auth');
            }
        }
        else {
            $this->load->view('input_email');
        }
    }

}