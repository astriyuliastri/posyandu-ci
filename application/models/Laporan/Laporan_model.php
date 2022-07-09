<?php
class Laporan_model extends CI_Model
{
    function TampilImunisasi()
    {
        $this->db->order_by('id_anak', 'ASC');
        return $this->db->from('anak')
            ->join('imunisasi', 'imunisasi.anak_id=anak.id_anak', 'LEFT')
            ->join('penimbangan', 'anak.id_anak=penimbangan.anak_id')
            ->get()
            ->result();
    }
}
