<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_wuspus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('layanan/Layanan_wuspus_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Layanan WUS-PUS (Wanita Usia Subur-Pria Usia Subur)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['d_kb'] = $this->Layanan_wuspus_model->getDataLayananwuspus();

        // var_dump($data['d_wuspus']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('layanan/layanan_wuspus', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN


    // SELESAI MENAMPILKAN

    // MULAI TAMBAH DATA
    public function submit()
    {
        $data['title'] = 'Layanan WUS-PUS (Wanita Usia Subur-Pria Usia Subur)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $layananValues = $_POST['layanan'];

        $this->Layanan_wuspus_model->add(
            array(
                'istri_id' => $this->input->post('id_istri'),
                'tgl_skrng' => $this->input->post('tgl_skrng'),
                'usia_istri' => $this->input->post('usia_istri'),
                'tahapanks' => $this->input->post('tahapanks'),
                'klmp' => $this->input->post('klmp'),
                'jml_anak' => $this->input->post('jml_anak'),
                'pengukuran' => $this->input->post('pengukuran'),
                'layanan' => $layananValues[0],
                'kontrasepsi_dipakai' => $this->input->post('kontrasepsi_dipakai'),
                'tgl_diganti' => $this->input->post('tgl_diganti'),
                'jenis_kontrasepsi' => $this->input->post('jenis_kontrasepsi'),
                'ket' => $this->input->post('keterangan')

            )
        );

        // $this->db->insert('penimbangan', $data);
        $this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan');

        redirect('menu/menu_layanan');
    }
}
