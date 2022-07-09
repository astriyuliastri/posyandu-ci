<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_covid_model extends CI_Model
{

    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('covid')->join('vaksin_covid', 'vaksin_covid.covid_id=covid.id_covid', 'LEFT');
        if (!empty($keyword)) {
            $this->db->like('nik', $keyword);
        }
        return $this->db->get()->result_array();
    }
}
