<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_ibu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('user_ibu/index', $data);
        $this->load->view('templates_ibu/footer');
    }
}
