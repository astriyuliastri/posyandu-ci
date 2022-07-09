<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email') == "") {
            redirect('auth');
        }
        $this->load->helper('text');

        $this->load->model('Beranda_model');
    }


    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['email'] = $this->session->userdata('email');



        $a = $this->Beranda_model->dataIbuhamil();
        $b = $this->Beranda_model->dataAnak();
        $c = $this->Beranda_model->dataKb();
        $d = $this->Beranda_model->dataLansia();
        $e = $this->Beranda_model->dataBinatang();
        $f = $this->Beranda_model->dataCovid();


        $data['count_ibuhamil'] = $a;
        $data['count_anak'] = $b;
        $data['count_kb'] = $c;
        $data['count_lansia'] = $d;
        $data['count_binatang'] = $e;
        $data['count_covid'] = $f;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
}
