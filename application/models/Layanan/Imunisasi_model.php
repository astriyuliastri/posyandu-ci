<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imunisasi_model extends CI_Model
{
    public $table = "imunisasi";

    // MULAI GET, ADD DATA ANAK IBU
    public function getDataAnakIbu()
    {
        $query = "SELECT * From anak";

        return $this->db->query($query)->result_array();
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
    }


    public function delDataImunisasi($id)
    {
        $this->db->where('id_imunisasi', $id);
        $this->db->delete('imunisasi');
    }
    // SELESAI GET, ADD DATA ANAK IBU
}
