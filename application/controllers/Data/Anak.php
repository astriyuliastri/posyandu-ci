<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data/Anak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Anak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['anak'] = $this->Anak_model->getDataAnak();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/data_anak', $data);
        $this->load->view('templates/footer');
    }

    public function validate_age($age)
    {
        $tgl_lahir = new DateTime($age);
        $now = new DateTime();
        return ($now->diff($tgl_lahir)->y > 5) ? false : true;
    }

    // MULAI CREATE DATA IBU
    public function createDataAnak()
    {

        // this part is when you set your validation rules
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required|callback_validate_age');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[anak.nik]', [
            'is_unique' => "Data anak sudah terdaftar !"
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('validate_age', 'Usia anak harus kurang dari 5 tahun!');
            $this->session->set_flashdata('nik', 'Data anak sudah terdaftar');
            redirect('data/anak');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama_anak' => $this->input->post('nama-anak'),
                'tempat_lahir' => $this->input->post('tempat-lhr-anak'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis-kelamin-anak'),
                'nama_ibu' => $this->input->post('nama-ibu'),
                'nama_ayah' => $this->input->post('nama-ayah'),
                'alamat' => $this->input->post('alamat'),
            ];

            $this->db->insert('zanak', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan! ...</div>');

            redirect('data/anak');
        }
    }


    // you need to add this on the controller, this will be the custom validation


    // MULAI UPDATE DATA anak
    public function updateDataAnak($id)
    {

        $data = [
            'nik' => $this->input->post('nik'),
            'nama_anak' => $this->input->post('nama-anak'),
            'tempat_lahir' => $this->input->post('tempat-lhr-anak'),
            'tgl_lahir' => $this->input->post('tgl-lahir-anak'),
            'jenis_kelamin' => $this->input->post('jenis-kelamin-anak'),
            'nama_ibu' => $this->input->post('nama-ibu'),
            'nama_ayah' => $this->input->post('nama-ayah'),
            'alamat' => $this->input->post('alamat'),
        ];

        $this->Anak_model->updDataAnak($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di update!... </div>');

        redirect('data/anak');
    }
    // SELESAI UPDATE DATA anak

    // MULAI DELETE DATA anak
    public function deleteDataAnak($id)
    {
        $this->Anak_model->delDataAnak($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data telah dihapus!.... </div>');

        redirect('data/anak');
    }
    // SELESAI DELETE DATA Anak


}
