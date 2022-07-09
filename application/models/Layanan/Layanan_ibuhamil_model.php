
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_ibuhamil_model extends CI_Model
{
    public $table = "layanan_ibuhamil";

    // MULAI GET, ADD DATA ANAK IBU
    public function getDataLayananIbuHamil()
    {
        $query = "SELECT * From ibuhamil";

        return $this->db->query($query)->result_array();
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
    }
    // SELESAI GET, ADD DATA ANAK IBU
}
