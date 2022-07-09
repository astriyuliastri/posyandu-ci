
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_lansia_model extends CI_Model
{
    public $table = "layanan_lansia";

    // MULAI GET, ADD DATA ANAK IBU
    public function getDataLayananLansia()
    {
        $query = "SELECT * From lansia";

        return $this->db->query($query)->result_array();
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
    }
    // SELESAI GET, ADD DATA ANAK IBU
}
