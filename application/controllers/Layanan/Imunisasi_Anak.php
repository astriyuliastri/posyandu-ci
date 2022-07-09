<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imunisasi_Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('layanan/Imunisasi_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Imunisasi Anak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['d_anak'] = $this->Imunisasi_model->getDataAnakIbu();

        // var_dump($data['d_anak']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('layanan/layanan_anak/imunisasi-form', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN


    // MULAI TAMBAH DATA
    public function submit()
    {
        $data['title'] = 'Imunisasi Anak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $imunValues = $_POST['imun'];
        $layananValues = $_POST['layanan'];
        $data = [
            'anak_id' => $this->input->post('id_anak'),
            'imunisasi' => $imunValues[0],
            'layanandiberikan' => $layananValues[0],
            'ket' => $this->input->post('keterangan'),
        ];

        $this->db->insert('imunisasi', $data);
        $this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan');

        redirect('menu/menu_layanan');
    }
    // SELESAI TAMBAH DATA
    public function deleteDataImunisasi($id)
    {
        $this->Imunisasi_model->delDataImunisasi($id);
        $this->session->set_flashdata('msg', 'Berhasil Dihapus');

        redirect('laporan/laporan');
    }
}
