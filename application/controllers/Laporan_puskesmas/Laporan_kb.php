<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_kb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan/laporan_kb_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan Pemberian KB';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->laporan_kb_model->TampilLayananKb();


        $this->load->view('templates_puskesmas/header', $data);
        $this->load->view('templates_puskesmas/sidebar');
        $this->load->view('templates_puskesmas/topbar', $data);
        $this->load->view('laporan_puskesmas/laporan_kb', $data);
        $this->load->view('templates_puskesmas/footer');
    }
}
