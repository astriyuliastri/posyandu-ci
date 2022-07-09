<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends CI_Model
{

    public function ambil_data($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('anak')->join('imunisasi', 'imunisasi.anak_id=anak.id_anak', 'LEFT')
            ->join('penimbangan', 'anak.id_anak=penimbangan.anak_id');
        if (!empty($keyword)) {
            $this->db->like('nik', $keyword);
        }
        return $this->db->get()->result_array();
    }
}
