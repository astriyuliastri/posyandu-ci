<?php
class Laporan_lansia_model extends CI_Model
{
    function TampilLayananLansia()
    {
        $this->db->order_by('id_lansia', 'ASC');
        return $this->db->from('lansia')
            ->join('layanan_lansia', 'layanan_lansia.lansia_id=lansia.id_lansia')
            ->get()
            ->result();
    }
}
