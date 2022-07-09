
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_wuspus_model extends CI_Model
{
    public $table = "layanan_wuspus";

    // MULAI GET, ADD DATA ANAK IBU
    public function getDataLayananwuspus()
    {
        $query = "SELECT * From kb";

        return $this->db->query($query)->result_array();
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
    }
    // SELESAI GET, ADD DATA ANAK IBU
}
