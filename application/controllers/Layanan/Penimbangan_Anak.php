<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penimbangan_Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('layanan/Penimbangan_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Penimbangan Anak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['d_anak'] = $this->Penimbangan_model->getDataAnakIbu();

        // var_dump($data['d_anak']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('layanan/layanan_anak/penimbangan-form', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN

    // MULAI TAMBAH DATA
    public function submit()
    {
        $data['title'] = 'Imunisasi Anak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->Penimbangan_model->add(
            array(
                'anak_id' => $this->input->post('id_anak'),
                'bb_lahir' => $this->input->post('bb_lahir'),
                'bb' => $this->input->post('bb'),
                'tgl_skrng' => $this->input->post('tgl_skrng'),
                'klmp' => $this->input->post('klmp'),

            )
        );

        // $this->db->insert('penimbangan', $data);
        $this->session->set_flashdata('msg', ' Data Berhasil Ditambahkan');
        redirect('layanan/imunisasi_anak');
    }
    // SELESAI TAMBAH DATA
}
