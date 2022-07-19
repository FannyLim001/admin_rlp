<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiModel extends CI_Model
{
    private $table = 'transaksi';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->select('t.*, k.nama as nama_karyawan , nama_supplier, alamat_supplier');
        $this->db->from('transaksi t');
        $this->db->join('user k', 'k.id_user = t.id_karyawan');
        $this->db->join('supplier s', 's.id_supplier = t.id_supplier');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getByTransaksi($id)
    {
        $this->db->select('t.*, k.nama as nama_karyawan , nama_supplier, alamat_supplier');
        $this->db->from('transaksi t');
        $this->db->join('user k', 'k.id_user = t.id_karyawan');
        $this->db->join('supplier s', 's.id_supplier = t.id_supplier');
        $this->db->where('no_transaksi', $id);
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

    public function getByIdKaryawan($id)
    {
        $this->db->select('t.*, k.nama as nama_karyawan , nama_supplier, alamat_supplier');
        $this->db->from('transaksi t');
        $this->db->join('user k', 'k.id_user = t.id_karyawan');
        $this->db->join('supplier s', 's.id_supplier = t.id_supplier');
        $this->db->where('id_karyawan', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function count_total()
    {
        $this->db->from($this->table);
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function count_curr()
    {
        $query = $this->db->query("SELECT * FROM transaksi WHERE status_transaksi = 'Selesai'");
        return $query->num_rows();
    }

    public function count_left()
    {
        $query = $this->db->query("SELECT * FROM transaksi WHERE status_transaksi != 'Selesai' AND status_transaksi = 'Sedang mengambil bahan'");
        return $query->num_rows();
    }

}