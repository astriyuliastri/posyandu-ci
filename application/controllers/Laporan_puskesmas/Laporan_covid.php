<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_covid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan/laporan_covid_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan Pemberian Vaksin COVID-19';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->laporan_covid_model->TampilVaksinCovid();


        $this->load->view('templates_puskesmas/header', $data);
        $this->load->view('templates_puskesmas/sidebar');
        $this->load->view('templates_puskesmas/topbar', $data);
        $this->load->view('laporan_puskesmas/laporan_covid', $data);
        $this->load->view('templates_puskesmas/footer');
    }
}
