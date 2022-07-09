<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_kb_model extends CI_Model
{

    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('kb')->join('layanan_wuspus', 'layanan_wuspus.istri_id=kb.id_istri', 'LEFT');
        if (!empty($keyword)) {
            $this->db->like('nik', $keyword);
        }
        return $this->db->get()->result_array();
    }
}
