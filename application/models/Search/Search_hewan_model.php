<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_hewan_model extends CI_Model
{

    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('binatang')->join('vaksin_binatang', 'vaksin_binatang.binatang_id=binatang.id_binatang', 'LEFT');
        if (!empty($keyword)) {
            $this->db->like('nama_pemilik', $keyword);
        }
        return $this->db->get()->result_array();
    }
}
