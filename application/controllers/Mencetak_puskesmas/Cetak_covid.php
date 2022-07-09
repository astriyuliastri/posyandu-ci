<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cetak_covid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mencetak/Cetak_covid_model');
    }

    public function index()
    {

        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil Laporan filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_skrng = $_GET['tanggal'];

                $title = 'Laporan Vaksin Covid Tanggal ' . date('d-m-y', strtotime($tgl_skrng));
                $url_cetak = 'mencetak/cetak_covid/cetak?filter=1&tanggal=' . $tgl_skrng;
                $cetak_covid = $this->Cetak_covid_model->view_by_date($tgl_skrng); // Panggil fungsi view_by_date yang ada di cetak_covidModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $title = 'Laporan Vaksin Covid Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'mencetak/cetak_covid/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $cetak_covid = $this->Cetak_covid_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Cetak_covid_model
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $title = 'Laporan Vaksin Covid Tahun ' . $tahun;
                $url_cetak = 'mencetak/cetak_covid/cetak?filter=3&tahun=' . $tahun;
                $cetak_covid = $this->Cetak_covid_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Cetak_covid_model
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $title = 'Semua Laporan Vaksin Covid';
            $url_cetak = 'mencetak/cetak_covid/cetak';
            $cetak_covid = $this->Cetak_covid_model->view_all(); // Panggil fungsi view_all yang ada di Cetak_covid_model
        }

        $data['title'] = $title;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['cetak_covid'] = $cetak_covid;
        $data['option_tahun'] = $this->Cetak_covid_model->option_tahun();
        $this->load->view('templates_puskesmas/header', $data);
        $this->load->view('templates_puskesmas/sidebar', $data);
        $this->load->view('templates_puskesmas/topbar', $data);
        $this->load->view('mencetak_puskesmas/cetak_covid', $data);
    }

    public function cetak()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil Laporan filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl_skrng = $_GET['tanggal'];

                $title = 'Laporan Vaksin Covid Tanggal ' . date('d-m-y', strtotime($tgl_skrng));
                $cetak_covid = $this->Cetak_covid_model->view_by_date($tgl_skrng); // Panggil fungsi view_by_date yang ada di Cetak_covid_model
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $title = 'Laporan Vaksin Covid Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $cetak_covid = $this->Cetak_covid_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Cetak_covid_model
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $title = 'Laporan Vaksin Covid Tahun ' . $tahun;
                $cetak_covid = $this->Cetak_covid_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Cetak_covid_model
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $title = 'Semua Laporan Vaksin Covid';
            $cetak_covid = $this->Cetak_covid_model->view_all(); // Panggil fungsi view_all yang ada di Cetak_covid_model
        }

        $data['title'] = $title;

        $data['cetak_covid'] = $cetak_covid;

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-vaksin-covid.pdf";
        $this->pdf->load_view('print/print_covid', $data);
    }
}
