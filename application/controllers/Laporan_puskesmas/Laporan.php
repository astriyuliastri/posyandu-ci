<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan/laporan_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan Imunisasi Anak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->laporan_model->TampilImunisasi();


        $this->load->view('templates_puskesmas/header', $data);
        $this->load->view('templates_puskesmas/sidebar');
        $this->load->view('templates_puskesmas/topbar', $data);
        $this->load->view('laporan_puskesmas/laporan_imunisasi', $data);
        $this->load->view('templates_puskesmas/footer');
    }
}
