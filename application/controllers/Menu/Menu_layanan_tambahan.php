<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_layanan_tambahan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Menu Layanan Tambahan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index_layanan_tambahan');
        $this->load->view('templates/footer');
    }
}
