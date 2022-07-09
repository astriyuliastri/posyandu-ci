
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaksin_covid_model extends CI_Model
{
    public $table = "vaksin_covid";

    // MULAI GET, ADD DATA ANAK IBU
    public function getDataLayananvaksincovid()
    {
        $query = "SELECT * From covid";

        return $this->db->query($query)->result_array();
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
    }
    // SELESAI GET, ADD DATA ANAK IBU
}
