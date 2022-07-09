<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Covid_model extends CI_Model
{
    public function getDataCovid()
    {
        $query = "SELECT * From covid";

        return $this->db->query($query)->result_array();
    }

    public function delDataCovid($id)
    {
        $this->db->where('id_covid', $id);
        $this->db->delete('covid');
    }

    public function updDataCovid($id, $data)
    {
        $this->db->where('id_covid', $id);
        $this->db->update('covid', $data);
    }
    // SELESAI CRUD DATA IBU
}
