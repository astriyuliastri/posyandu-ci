<?php
class Laporan_covid_model extends CI_Model
{
    function TampilVaksinCovid()
    {
        $this->db->order_by('id_covid', 'ASC');
        return $this->db->from('covid')
            ->join('vaksin_covid', 'vaksin_covid.covid_id=covid.id_covid')
            ->get()
            ->result();
    }
}
