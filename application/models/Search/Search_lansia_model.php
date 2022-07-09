<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_lansia_model extends CI_Model
{

    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('lansia')->join('layanan_lansia', 'layanan_lansia.lansia_id=lansia.id_lansia', 'RIGHT');
        if (!empty($keyword)) {
            $this->db->like('nik', $keyword);
        }
        return $this->db->get()->result_array();
    }
}
