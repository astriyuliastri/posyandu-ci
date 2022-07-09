<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lansia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/Lansia_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Lansia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lansia'] = $this->Lansia_model->getDataLansia();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/data_lansia', $data);
        $this->load->view('templates/footer');
    }
    public function validate_age($age)
    {
        $tgl_lahir = new DateTime($age);
        $now = new DateTime();
        return ($now->diff($tgl_lahir)->y < 50) ? false : true;
    }

    // MULAI CREATE DATA IBU
    public function createDataLansia()
    {
        // this part is when you set your validation rules
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required|callback_validate_age');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[lansia.nik]', [
            'is_unique' => "Data lansia sudah terdaftar !"
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('validate_age', 'Usia lansia tidak boleh kurang dari 50 tahun!');
            $this->session->set_flashdata('nik', 'Data lansia sudah terdaftar !');
            redirect('data/lansia');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama_lansia' => $this->input->post('nama-lansia'),
                'tempat_lahir' => $this->input->post('tempat-lhr-lansia'),
                'tgl_lahir' => $this->input->post('tgl-lahir-lansia'),
                'alamat' => $this->input->post('alamat'),

            ];
        }

        $this->db->insert('lansia', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan!... </div>');

        redirect('data/lansia');
    }

    public function updateDataLansia($id)
    {

        $data = [
            'nik' => $this->input->post('nik'),
            'nama_lansia' => $this->input->post('nama-lansia'),
            'tempat_lahir' => $this->input->post('tempat-lhr-lansia'),
            'tgl_lahir' => $this->input->post('tgl-lahir-lansia'),
            'alamat' => $this->input->post('alamat'),

        ];

        $this->Lansia_model->updDataLansia($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di update!... </div>');


        redirect('data/lansia');
    }
    // SELESAI UPDATE DATA lansia

    // MULAI DELETE DATA lansia
    public function deleteDataLansia($id)
    {
        $this->Lansia_model->delDataLansia($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data telah dihapus!... </div>');

        redirect('data/lansia');
    }
    // SELESAI DELETE DATA lansia
}
