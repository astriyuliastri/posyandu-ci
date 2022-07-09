<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Covid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/Covid_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data covid';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['covid'] = $this->Covid_model->getDataCovid();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/data_covid', $data);
        $this->load->view('templates/footer');
    }



    // MULAI CREATE DATA IBU
    public function createDataCovid()
    {
        // this part is when you set your validation rules

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[covid.nik]', [
            'is_unique' => "Data covid sudah terdaftar !"
        ]);

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('nik', 'Data covid sudah terdaftar !');
            redirect('data/covid');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama_covid' => $this->input->post('nama-covid'),
                'tempat_lahir' => $this->input->post('tempat-lhr-covid'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),

            ];

            $this->db->insert('covid', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan!... </div>');

            redirect('data/covid');
        }
    }

    public function updateDataCovid($id)
    {

        $data = [
            'nik' => $this->input->post('nik'),
            'nama_covid' => $this->input->post('nama-covid'),
            'tempat_lahir' => $this->input->post('tempat-lhr-covid'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),

        ];

        $this->Covid_model->updDataCovid($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di update!... </div>');

        redirect('data/covid');
    }
    // SELESAI UPDATE DATA covid

    // MULAI DELETE DATA covid
    public function deleteDataCovid($id)
    {
        $this->Covid_model->delDataCovid($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data telah dihapus! ... </div>');


        redirect('data/covid');
    }
    // SELESAI DELETE DATA covid
}
