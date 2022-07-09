<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $data['title'] = 'Riwayat Pelayanan Posyandu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_ibu/header', $data);
        $this->load->view('templates_ibu/sidebar');
        $this->load->view('templates_ibu/topbar', $data);
        $this->load->view('menu_ibu/riwayat', $data);
        $this->load->view('templates_ibu/footer');

        if (isset($_POST['lihat']) && $_POST['riwayat'] == 'imunisasi') {

            redirect('menu_ibu/lihat_riwayat');
        } elseif (isset($_POST['lihat']) && $_POST['riwayat'] == 'ibuhamil') {
            redirect('menu_ibu/lihat_riwayat/riwayat_ibuhamil');
        }

        if (isset($_POST['lihat']) && $_POST['riwayat'] == 'lansia') {
            redirect('menu_ibu/lihat_riwayat/riwayat_lansia');
        } elseif (isset($_POST['lihat']) && $_POST['riwayat'] == 'kb') {
            redirect('menu_ibu/lihat_riwayat/riwayat_kb');
        }

        if (isset($_POST['lihat']) && $_POST['riwayat'] == 'covid') {
            redirect('menu_ibu/lihat_riwayat/riwayat_covid');
        } elseif (isset($_POST['lihat']) && $_POST['riwayat'] == 'hewan') {
            redirect('menu_ibu/lihat_riwayat/riwayat_hewan');
        }
    }
}
