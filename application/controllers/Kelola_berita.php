<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $data['title'] = 'Kelola Berita Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola_berita', $data);
        $this->load->view('templates/footer', $data);
    }
}
