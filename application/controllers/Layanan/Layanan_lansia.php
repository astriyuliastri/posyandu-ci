<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_lansia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('layanan/Layanan_lansia_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Layanan Ibu Hamil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['d_lansia'] = $this->Layanan_lansia_model->getDataLayananlansia();

        // var_dump($data['d_lansia']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('layanan/layanan_lansia', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN



    // MULAI TAMBAH DATA
    public function submit()
    {
        $data['title'] = 'Layanan Lansia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->Layanan_lansia_model->add(
            array(
                'lansia_id' => $this->input->post('id_lansia'),
                'usia' => $this->input->post('usia'),
                'tgl_skrng' => $this->input->post('tgl_skrng'),
                'bb' => $this->input->post('bb'),
                'td' => $this->input->post('td'),
                'keluhan' => $this->input->post('keluhan'),
                'diagnosa' => $this->input->post('diagnosa'),
                'terapi' => $this->input->post('terapi'),
                'ket' => $this->input->post('keterangan')

            )
        );

        // $this->db->insert('penimbangan', $data);
        $this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan');

        redirect('menu/menu_layanan');
    }
    // SELESAI TAMBAH DATA


}
