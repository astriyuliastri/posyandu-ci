<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Jadwal Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/jadwal', $data);
        $this->load->view('templates_ibu/footer');
    }
}
