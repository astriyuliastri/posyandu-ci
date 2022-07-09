<?php
class Cetak_kb_model extends CI_Model
{

    function getData()
    {
        $data_laporan_kb =   $this->db->order_by('id_istri', 'ASC');
        return $this->db->from('kb')
            ->join('layanan_wuspus', 'layanan_wuspus.istri_id=kb.id_istri')
            ->get()
            ->result();

        return $data_laporan_kb->result();
    }
}
