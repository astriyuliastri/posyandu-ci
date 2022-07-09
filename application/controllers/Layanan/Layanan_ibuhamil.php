<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_ibuhamil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('layanan/Layanan_ibuhamil_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Layanan Ibu Hamil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['d_ibuhamil'] = $this->Layanan_ibuhamil_model->getDataLayananIbuHamil();

        // var_dump($data['d_ibuhamil']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('layanan/layanan_ibuhamil', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN



    // MULAI TAMBAH DATA
    public function submit()
    {
        $data['title'] = 'Layanan Ibu Hamil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $layananValues = $_POST['layanan'];

        $this->Layanan_ibuhamil_model->add(
            array(
                'ibuhamil_id' => $this->input->post('id_ibuhamil'),

                'usia_kandungan' => $this->input->post('usia_kandungan'),
                'tgl_skrng' => $this->input->post('tgl_skrng'),
                'layanan' => $layananValues[0],
                'ket' => $this->input->post('keterangan')

            )
        );

        // $this->db->insert('penimbangan', $data);
        $this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan');

        redirect('menu/menu_layanan');
    }
    // SELESAI TAMBAH DATA


}
