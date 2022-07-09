<?php
class Cetak_binatang_model extends CI_Model
{

    function getData()
    {
        $data_laporan_binatang =   $this->db->order_by('id_binatang', 'ASC');
        return $this->db->from('binatang')
            ->join('vaksin_binatang', 'vaksin_binatang.binatang_id=binatang.id_binatang')
            ->get()
            ->result();

        return $data_laporan_binatang->result();
    }
}
