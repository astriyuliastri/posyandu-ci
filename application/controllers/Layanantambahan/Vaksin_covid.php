<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaksin_covid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('layanantambahan/Vaksin_covid_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Layanan Vaksin COVID-19';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['d_covid'] = $this->Vaksin_covid_model->getDataLayananvaksincovid();

        // var_dump($data['d_covid']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('layanantambahan/vaksin_covid', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN



    // MULAI TAMBAH DATA
    public function submit()
    {
        $data['title'] = 'Layanan Vaksin COVID-19';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->Vaksin_covid_model->add(
            array(
                'covid_id' => $this->input->post('id_covid'),

                'tgl_skrng' => $this->input->post('tgl_skrng'),
                'usia' => $this->input->post('usia'),
                'vaksin_ke' =>  $this->input->post('vaksin_ke'),
                'nama_vaksin' =>  $this->input->post('nama_vaksin'),
                'ket' => $this->input->post('keterangan')

            )
        );

        // $this->db->insert('penimbangan', $data);
        $this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan');

        redirect('menu/menu_layanan');
    }
    // SELESAI TAMBAH DATA

}
