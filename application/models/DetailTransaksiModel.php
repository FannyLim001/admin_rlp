<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailTransaksiModel extends CI_Model
{
    private $table = 'detail_transaksi';

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

    public function getByTransaksi($id)
    {
        $this->db->select('dt.*, nama_bahan');
        $this->db->from('detail_transaksi dt');
        $this->db->join('bahan b', 'b.id_bahan = dt.id_bahan');
        $this->db->where('no_transaksi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function insert($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }
}