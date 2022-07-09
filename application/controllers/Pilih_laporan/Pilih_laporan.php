<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilih_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mencetak/Cetak_ibuhamil_model');
        $this->load->model('mencetak/Cetak_imunisasi_model');
    }

    public function index()
    {


        $data['title'] = 'Cetak Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('pilih_laporan/pilih_laporan', $data);
        $this->load->view('templates/footer', $data);

        if (isset($_POST['tampilkan']) && $_POST['laporan'] == 'imunisasi') {

            redirect('mencetak/cetak_imunisasi');
        } elseif (isset($_POST['tampilkan']) && $_POST['laporan'] == 'ibuhamil') {
            redirect('mencetak/cetak_ibuhamil');
        }

        if (isset($_POST['tampilkan']) && $_POST['laporan'] == 'lansia') {
            redirect('mencetak/cetak_lansia');
        } elseif (isset($_POST['tampilkan']) && $_POST['laporan'] == 'kb') {
            redirect('mencetak/cetak_kb');
        }

        if (isset($_POST['tampilkan']) && $_POST['laporan'] == 'covid') {
            redirect('mencetak/cetak_covid');
        } elseif (isset($_POST['tampilkan']) && $_POST['laporan'] == 'hewan') {
            redirect('mencetak/cetak_hewan');
        }
    }
}
