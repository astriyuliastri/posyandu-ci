<?php
class Cetak_imunisasi_model extends CI_Model
{

    function getData()
    {
        $data_laporan_imunisasi = $this->db->order_by('id_anak', 'ASC');
        return $this->db->from('anak')
            ->join('imunisasi', 'imunisasi.anak_id=anak.id_anak', 'LEFT')
            ->join('penimbangan', 'anak.id_anak=penimbangan.anak_id')
            ->get()
            ->result();;

        return $data_laporan_imunisasi->result();
    }
}
