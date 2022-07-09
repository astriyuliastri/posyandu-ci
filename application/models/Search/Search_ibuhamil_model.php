<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_ibuhamil_model extends CI_Model
{

    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('ibuhamil')->join('layanan_ibuhamil', 'layanan_ibuhamil.ibuhamil_id=ibuhamil.id_ibuhamil', 'LEFT');
        if (!empty($keyword)) {
            $this->db->like('nik', $keyword);
        }
        return $this->db->get()->result_array();
    }
}
