<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_binatang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan/laporan_binatang_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan Pemberian Vaksin Binatang Peliharaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->laporan_binatang_model->TampilVaksinBinatang();


        $this->load->view('templates_puskesmas/header', $data);
        $this->load->view('templates_puskesmas/sidebar');
        $this->load->view('templates_puskesmas/topbar', $data);
        $this->load->view('laporan_puskesmas/laporan_binatang', $data);
        $this->load->view('templates_puskesmas/footer');
    }
}
