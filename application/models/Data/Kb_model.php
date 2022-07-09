<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kb_model extends CI_Model
{
    public function getDataIstri()
    {
        $query = "SELECT * From kb";

        return $this->db->query($query)->result_array();
    }

    public function delDataIstri($id)
    {
        $this->db->where('id_istri', $id);
        $this->db->delete('kb');
    }

    public function updDataIstri($id, $data)
    {
        $this->db->where('id_istri', $id);
        $this->db->update('kb', $data);
    }
    // SELESAI CRUD DATA IBU
}
