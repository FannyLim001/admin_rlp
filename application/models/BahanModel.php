<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BahanModel extends CI_Model
{
    private $table = 'bahan';
    private $id = 'id_bahan';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->from($this->table);
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
        $this->db->where('id_bahan', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function stock_increment($jumlah, $id_bahan)
    {
        $q = $this->db->set('stok_bahan', 'stok_bahan+'.$jumlah, false);
        $q = $this->db->where('id_bahan', $id_bahan);
        $q = $this->db->update($this->table);
        return $q;
    }
}