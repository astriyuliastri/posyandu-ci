<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibuhamil_model extends CI_Model
{
    public function getDataIbuhamil()
    {
        $query = "SELECT * From ibuhamil";

        return $this->db->query($query)->result_array();
    }

    public function delDataIbuhamil($id)
    {
        $this->db->where('id_ibuhamil', $id);
        $this->db->delete('ibuhamil');
    }

    public function updDataIbuhamil($id, $data)
    {
        $this->db->where('id_ibuhamil', $id);
        $this->db->update('ibuhamil', $data);
    }
    // SELESAI CRUD DATA IBU
}
