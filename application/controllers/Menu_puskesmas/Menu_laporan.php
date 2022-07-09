<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $data['title'] = 'Cetak Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_puskesmas/header', $data);
        $this->load->view('templates_puskesmas/sidebar');
        $this->load->view('templates_puskesmas/topbar', $data);
        $this->load->view('pilih_laporan/pilih_laporan', $data);
        $this->load->view('templates_puskesmas/footer', $data);

        if (isset($_POST['tampilkan']) && $_POST['laporan'] == 'imunisasi') {

            redirect('mencetak_puskesmas/cetak_imunisasi');
        } elseif (isset($_POST['tampilkan']) && $_POST['laporan'] == 'ibuhamil') {
            redirect('mencetak_puskesmas/cetak_ibuhamil');
        }

        if (isset($_POST['tampilkan']) && $_POST['laporan'] == 'lansia') {
            redirect('mencetak_puskesmas/cetak_lansia');
        } elseif (isset($_POST['tampilkan']) && $_POST['laporan'] == 'kb') {
            redirect('mencetak_puskesmas/cetak_kb');
        }

        if (isset($_POST['tampilkan']) && $_POST['laporan'] == 'covid') {
            redirect('mencetak_puskesmas/cetak_covid');
        } elseif (isset($_POST['tampilkan']) && $_POST['laporan'] == 'hewan') {
            redirect('mencetak_puskesmas/cetak_hewan');
        }
    }
}
