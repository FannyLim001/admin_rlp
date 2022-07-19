<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KaryawanModel extends CI_Model
{
    private $table = 'user';
    private $id = 'id_user';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('role','Karyawan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_email($email)
    {
        $this->db->from($this->table);
        $this->db->where('email',$email);
        return $this->db->get();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function count_total()
    {
        $this->db->from($this->table);
        $this->db->where('role !=', 'Admin');
        $query = $this->db->get()->num_rows();
        return $query;
    }

}