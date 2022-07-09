<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mencetak/Cetak_imunisasi_model');
        $this->load->model('mencetak/Cetak_ibuhamil_model');
        $this->load->model('mencetak/Cetak_lansia_model');
        $this->load->model('mencetak/Cetak_kb_model');
        $this->load->model('mencetak/Cetak_covid_model');
        $this->load->model('mencetak/Cetak_hewan_model');
    }

    public function index()
    {
        $this->load->model('search/Search_model');
        $keyword = $this->input->get('keyword');
        $data = $this->Search_model->ambil_data($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data

        );


        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/hasil', $data);
        $this->load->view('templates_ibu/footer');
    }

    public function hasil_ibuhamil()
    {
        $this->load->model('search/Search_ibuhamil_model');
        $keyword = $this->input->get('keyword');
        $data = $this->Search_ibuhamil_model->ambil_data($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data

        );


        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/hasil_ibuhamil', $data);
        $this->load->view('templates_ibu/footer');
    }

    public function hasil_lansia()
    {
        $this->load->model('search/Search_lansia_model');
        $keyword = $this->input->get('keyword');
        $data = $this->Search_lansia_model->ambil_data($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data

        );


        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/hasil_lansia', $data);
        $this->load->view('templates_ibu/footer');
    }

    public function hasil_kb()
    {
        $this->load->model('search/Search_kb_model');
        $keyword = $this->input->get('keyword');
        $data = $this->Search_kb_model->ambil_data($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data

        );


        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/hasil_kb', $data);
        $this->load->view('templates_ibu/footer');
    }

    public function hasil_covid()
    {
        $this->load->model('search/Search_covid_model');
        $keyword = $this->input->get('keyword');
        $data = $this->Search_covid_model->ambil_data($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data

        );


        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/hasil_covid', $data);
        $this->load->view('templates_ibu/footer');
    }

    public function hasil_hewan()
    {
        $this->load->model('search/Search_hewan_model');
        $keyword = $this->input->get('keyword');
        $data = $this->Search_hewan_model->ambil_data($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data

        );


        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/hasil_hewan', $data);
        $this->load->view('templates_ibu/footer');
    }
}
