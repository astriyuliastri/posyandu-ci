
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaksin_binatang_model extends CI_Model
{
    public $table = "vaksin_binatang";

    // MULAI GET, ADD DATA ANAK IBU
    public function getDataLayananvaksinbinatang()
    {
        $query = "SELECT * From binatang";

        return $this->db->query($query)->result_array();
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
    }
    // SELESAI GET, ADD DATA ANAK IBU
}
