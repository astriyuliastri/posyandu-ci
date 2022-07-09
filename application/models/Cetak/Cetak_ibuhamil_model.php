<?php
class Cetak_ibuhamil_model extends CI_Model
{

    function getData()
    {
        $data_laporan_ibuhamil =   $this->db->order_by('id_ibuhamil', 'ASC');
        return $this->db->from('ibuhamil')
            ->join('layanan_ibuhamil', 'layanan_ibuhamil.ibuhamil_id=ibuhamil.id_ibuhamil')
            ->get()
            ->result();

        return $data_laporan_ibuhamil->result();
    }
}
