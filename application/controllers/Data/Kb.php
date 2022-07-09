<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/Kb_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Keluarga Berencana';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kb'] = $this->Kb_model->getDataIstri();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/data_kb', $data);
        $this->load->view('templates/footer');
    }
    public function validate_age($age)
    {
        $tgl_lahir = new DateTime($age);
        $now = new DateTime();
        return ($now->diff($tgl_lahir)->y < 17) ? false : true;
    }

    // MULAI CREATE DATA IBU
    public function createDataIstri()
    {

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[kb.nik]', [
            'is_unique' => "Data Keluarga berencana sudah terdaftar !"
        ]);

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('nik', 'Data WUS sudah terdaftar!');
            redirect('data/kb');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama_istri' => $this->input->post('nama-istri'),
                'nama_suami' => $this->input->post('nama-suami'),
                'alamat' => $this->input->post('alamat'),

            ];

            $this->db->insert('kb', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan! ...</div>');

            redirect('data/kb');
        }
    }


    // MULAI UPDATE DATA istri
    public function updateDataIstri($id)
    {

        $data = [
            'nik' => $this->input->post('nik'),
            'nama_istri' => $this->input->post('nama-istri'),

            'nama_suami' => $this->input->post('nama-suami'),
            'alamat' => $this->input->post('alamat'),

        ];

        $this->Kb_model->updDataIstri($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di update! ... </div>');

        redirect('data/kb');
    }
    // SELESAI UPDATE DATA Istri

    // MULAI DELETE DATA Istri
    public function deleteDataIstri($id)
    {
        $this->Kb_model->delDataIstri($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data telah dihapus! ... </div>');

        redirect('data/kb');
    }
    // SELESAI DELETE DATA Istri
}
