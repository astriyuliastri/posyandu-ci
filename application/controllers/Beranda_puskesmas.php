<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_puskesmas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beranda_puskesmas_model');
        if ($this->session->userdata('email') == "") {
            redirect('auth');
        }
        $this->load->helper('text');
    }


    public function index()
    {
        $data['title'] = 'Beranda';
        // $data['email'] = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $a = $this->Beranda_puskesmas_model->dataIbuhamil();
        $b = $this->Beranda_puskesmas_model->dataAnak();
        $c = $this->Beranda_puskesmas_model->dataKb();
        $d = $this->Beranda_puskesmas_model->dataLansia();
        $e = $this->Beranda_puskesmas_model->dataBinatang();
        $f = $this->Beranda_puskesmas_model->dataCovid();

        $data['count_ibuhamil'] = $a;
        $data['count_anak'] = $b;
        $data['count_kb'] = $c;
        $data['count_lansia'] = $d;
        $data['count_binatang'] = $e;
        $data['count_covid'] = $f;

        $this->load->view('templates_puskesmas/header', $data);
        $this->load->view('templates_puskesmas/sidebar');
        $this->load->view('templates_puskesmas/topbar', $data);
        $this->load->view('user_puskesmas/index', $data);
        $this->load->view('templates_puskesmas/footer');
    }
}
