<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Binatang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/Binatang_model');
    }

    public function index()
    {
        $data['title'] = 'Data Binatang Peliharaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['binatang'] = $this->Binatang_model->getDataBinatang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/data_binatang', $data);
        $this->load->view('templates/footer');
    }

    // MULAI CREATE DATA IBU
    public function createDataBinatang()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[binatang.nik]', [
            'is_unique' => "Data pemilik hewan sudah terdaftar !"
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('nik', 'Data pemilik hewan sudah terdaftar !');
            redirect('data/binatang');
        } else {
            $data = [
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'nik' => $this->input->post('nik'),
                'alamat_pemilik' => $this->input->post('alamat_pemilik')
            ];

            $this->db->insert('binatang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan!... </div>');

            redirect('data/binatang');
        }
    }


    // MULAI UPDATE DATA binatang
    public function updateDataBinatang($id)
    {

        $data = [

            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'nik' => $this->input->post('nik'),
            'alamat_pemilik' => $this->input->post('alamat_pemilik')
        ];

        $this->Binatang_model->updDataBinatang($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di update!... </div>');

        redirect('data/binatang');
    }
    // SELESAI UPDATE DATA binatang

    // MULAI DELETE DATA binatang
    public function deleteDataBinatang($id)
    {
        $this->Binatang_model->delDataBinatang($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data telah dihapus!...</div>');


        redirect('data/binatang');
    }
    // SELESAI DELETE DATA Anak
}
