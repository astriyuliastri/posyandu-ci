<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lihat_riwayat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/lihat_riwayat', $data);
        $this->load->view('templates_ibu/footer');
    }

    public function riwayat_ibuhamil()
    {
        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/lihat_riwayat_ibuhamil', $data);
        $this->load->view('templates_ibu/footer');
    }

    public function riwayat_lansia()
    {
        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/lihat_riwayat_lansia', $data);
        $this->load->view('templates_ibu/footer');
    }

    public function riwayat_kb()
    {
        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/lihat_riwayat_kb', $data);
        $this->load->view('templates_ibu/footer');
    }

    public function riwayat_covid()
    {
        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/lihat_riwayat_covid', $data);
        $this->load->view('templates_ibu/footer');
    }

    public function riwayat_hewan()
    {
        $data['title'] = 'Riwayat Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/lihat_riwayat_hewan', $data);
        $this->load->view('templates_ibu/footer');
    }
}
