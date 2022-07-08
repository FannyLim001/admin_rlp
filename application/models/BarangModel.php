<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModel extends CI_Model
{
    public $table = 'barang';

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
        $query = $this->db->get();
        return $query->row_array();
    }

}