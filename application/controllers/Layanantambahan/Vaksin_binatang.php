<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaksin_binatang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('layanantambahan/Vaksin_binatang_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Layanan Vaksin Binatang Peliharaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['d_binatang'] = $this->Vaksin_binatang_model->getDataLayananvaksinbinatang();

        // var_dump($data['d_binatang']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('layanantambahan/vaksin_binatang', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN


    // MULAI TAMBAH DATA
    public function submit()
    {
        $data['title'] = 'Layanan Vaksin Binatang Peliharaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->Vaksin_binatang_model->add(
            array(
                'binatang_id' => $this->input->post('id_binatang'),
                'nama_binatang' => $this->input->post('nama_binatang'),
                'usia_binatang' => $this->input->post('usia_binatang'),
                'tgl_skrng' => $this->input->post('tgl_skrng'),
                'vaksin' =>  $this->input->post('vaksin'),
                'ket' => $this->input->post('keterangan')

            )
        );

        // $this->db->insert('penimbangan', $data);
        $this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan');

        redirect('menu/menu_layanan');
    }
    // SELESAI TAMBAH DATA


}
