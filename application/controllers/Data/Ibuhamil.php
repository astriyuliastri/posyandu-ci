<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibuhamil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/Ibuhamil_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data ibuhamil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ibuhamil'] = $this->Ibuhamil_model->getDataIbuhamil();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/data_ibuhamil', $data);
        $this->load->view('templates/footer');
    }

    public function validate_age($age)
    {
        $tgl_lahir = new DateTime($age);
        $now = new DateTime();
    }

    // MULAI CREATE DATA IBU
    public function createDataIbuhamil()
    {

        // this part is when you set your validation rules

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[ibuhamil.nik]', [
            'is_unique' => "Data anak sudah terdaftar !"
        ]);
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('nik', 'Data ibu hamil sudah terdaftar!');
            redirect('data/ibuhamil');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama_ibuhamil' => $this->input->post('nama-ibuhamil'),
                'nama_suami' => $this->input->post('nama-suami'),
                'alamat' => $this->input->post('alamat'),
                'usia_kandungan_daftar' => $this->input->post('usia_kandungan_daftar'),

            ];
        }

        $this->db->insert('ibuhamil', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan!... </div>');

        redirect('data/ibuhamil');
    }


    // you need to add this on the controller, this will be the custom validation


    // MULAI UPDATE DATA ibuhamil
    public function updateDataIbuhamil($id)
    {

        $data = [
            'nik' => $this->input->post('nik'),
            'nama_ibuhamil' => $this->input->post('nama-ibuhamil'),
            'nama_suami' => $this->input->post('nama-suami'),
            'alamat' => $this->input->post('alamat'),
            'usia_kandungan_daftar' => $this->input->post('usia_kandungan_daftar'),

        ];

        $this->Ibuhamil_model->updDataIbuhamil($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di update!... </div>');


        redirect('data/ibuhamil');
    }
    // SELESAI UPDATE DATA ibuhamil

    // MULAI DELETE DATA ibuhamil
    public function deleteDataIbuhamil($id)
    {
        $this->Ibuhamil_model->delDataIbuhamil($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data telah dihapus! ...</div>');


        redirect('data/ibuhamil');
    }
    // SELESAI DELETE DATA ibuhamil
}
