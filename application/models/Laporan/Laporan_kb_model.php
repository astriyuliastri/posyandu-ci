<?php
class Laporan_kb_model extends CI_Model
{
    function TampilLayananKb()
    {
        $this->db->order_by('id_istri', 'ASC');
        return $this->db->from('kb')
            ->join('layanan_wuspus', 'layanan_wuspus.istri_id=kb.id_istri')
            ->get()
            ->result();
    }
}
