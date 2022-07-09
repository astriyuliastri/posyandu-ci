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


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_kb', $data);
        $this->load->view('templates/footer');
    }
}
