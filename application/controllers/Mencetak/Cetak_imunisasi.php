<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cetak_imunisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mencetak/Cetak_imunisasi_model');
    }

    public function index()
    {

        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_skrng = $_GET['tanggal'];

                $title = 'Laporan Imunisasi Tanggal ' . date('d-m-y', strtotime($tgl_skrng));
                $url_cetak = 'mencetak/cetak_imunisasi/cetak?filter=1&tanggal=' . $tgl_skrng;
                $cetak_imunisasi = $this->Cetak_imunisasi_model->view_by_date($tgl_skrng); // Panggil fungsi view_by_date yang ada di cetak_imunisasiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $title = 'Laporan Imunisasi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'mencetak/cetak_imunisasi/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $cetak_imunisasi = $this->Cetak_imunisasi_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Cetak_imunisasi_model
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $title = 'Laporan Imunisasi Tahun ' . $tahun;
                $url_cetak = 'mencetak/cetak_imunisasi/cetak?filter=3&tahun=' . $tahun;
                $cetak_imunisasi = $this->Cetak_imunisasi_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Cetak_imunisasi_model
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $title = 'Laporan Imunisasi';
            $url_cetak = 'mencetak/cetak_imunisasi/cetak';
            $cetak_imunisasi = $this->Cetak_imunisasi_model->view_all(); // Panggil fungsi view_all yang ada di Cetak_imunisasi_model
        }

        $data['title'] = $title;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['cetak_imunisasi'] = $cetak_imunisasi;
        $data['option_tahun'] = $this->Cetak_imunisasi_model->option_tahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mencetak/cetak_imunisasi', $data);
    }

    public function cetak()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_skrng = $_GET['tanggal'];

                $title = 'Laporan Imunisasi <br> Dalam Wilayah Kerja Posyandu <br>Tanggal ' . date('d-m-y', strtotime($tgl_skrng));
                $cetak_imunisasi = $this->Cetak_imunisasi_model->view_by_date($tgl_skrng); // Panggil fungsi view_by_date yang ada di Cetak_imunisasi_model
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $title = 'Laporan Imunisasi<br> Dalam Wilayah Kerja Posyandu <br> Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $cetak_imunisasi = $this->Cetak_imunisasi_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Cetak_imunisasi_model
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $title = 'Laporan Imunisasi<br> Dalam Wilayah Kerja Posyandu <br> Tahun ' . $tahun;
                $cetak_imunisasi = $this->Cetak_imunisasi_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Cetak_imunisasi_model
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $title = 'Laporan Imunisasi <br> Dalam Wilayah Kerja Posyandu <br>';
            $cetak_imunisasi = $this->Cetak_imunisasi_model->view_all(); // Panggil fungsi view_all yang ada di Cetak_imunisasi_model
        }

        $data['title'] = $title;

        $data['cetak_imunisasi'] = $cetak_imunisasi;

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan-imunisasi.pdf";
        $this->pdf->load_view('print/print', $data);
    }
}
