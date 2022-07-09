<?php
class Laporan_binatang_model extends CI_Model
{
    function TampilVaksinBinatang()
    {
        $this->db->order_by('id_binatang', 'ASC');
        return $this->db->from('binatang')
            ->join('vaksin_binatang', 'vaksin_binatang.binatang_id=binatang.id_binatang')
            ->get()
            ->result();
    }
}
