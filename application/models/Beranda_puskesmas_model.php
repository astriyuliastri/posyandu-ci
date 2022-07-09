<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_puskesmas_model extends CI_Model
{

    // MULAI KONTEN CARD
    public function dataIbuhamil()
    {
        $res = $this->db->count_all_results('ibuhamil');
        return $res;
    }

    public function dataAnak()
    {
        $res = $this->db->count_all_results('anak');
        return $res;
    }

    public function dataKb()
    {
        $res = $this->db->count_all_results('kb');
        return $res;
    }

    public function dataLansia()
    {
        $res = $this->db->count_all_results('lansia');
        return $res;
    }

    public function dataBinatang()
    {
        $res = $this->db->count_all_results('binatang');
        return $res;
    }
    public function dataCovid()
    {
        $res = $this->db->count_all_results('covid');
        return $res;
    }
}
