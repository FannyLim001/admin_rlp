<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SupplierModel extends CI_Model
{
    private $table = 'supplier';
    private $id = 'id_supplier';

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
        $this->db->where('id_supplier', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function count_total()
    {
        $this->db->from($this->table);
        $query = $this->db->get()->num_rows();
        return $query;
    }

}