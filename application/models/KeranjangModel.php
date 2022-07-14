<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KeranjangModel extends CI_Model
{
    public $table = 'keranjang';
    public $id = 'keranjang.id_keranjang';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->select('keranjang.*, b.nama_bahan as nama_bahan');
        $this->db->from('keranjang');
        $this->db->join('bahan b', 'b.id_bahan = keranjang.id_bahan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_keranjang', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function count()
    {
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

}