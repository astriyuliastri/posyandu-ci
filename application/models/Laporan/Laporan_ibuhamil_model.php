<?php
class Laporan_ibuhamil_model extends CI_Model
{
    function TampilLayananIbuhamil()
    {
        $this->db->order_by('id_ibuhamil', 'ASC');
        return $this->db->from('ibuhamil')
            ->join('layanan_ibuhamil', 'layanan_ibuhamil.ibuhamil_id=ibuhamil.id_ibuhamil')
            ->get()
            ->result();
    }
}
