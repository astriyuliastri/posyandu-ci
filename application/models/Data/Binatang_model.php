<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Binatang_model extends CI_Model
{
    public function getDataBinatang()
    {
        $query = "SELECT * From binatang";

        return $this->db->query($query)->result_array();
    }

    public function delDataBinatang($id)
    {
        $this->db->where('id_binatang', $id);
        $this->db->delete('binatang');
    }

    public function updDataBinatang($id, $data)
    {
        $this->db->where('id_binatang', $id);
        $this->db->update('binatang', $data);
    }
    // SELESAI CRUD DATA IBU
}
