<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_lansia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan/laporan_lansia_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan Pemeriksaan Ibu Hamil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->laporan_lansia_model->TampilLayananLansia();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan_lansia', $data);
        $this->load->view('templates/footer');
    }
}
