<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cetak_lansia_model extends CI_Model
{
    public function view_by_date($date)
    {
        $this->db->where('DATE(tgl_skrng)', $date); // Tambahkan where tanggal nya

        return $this->db->from('lansia')
            ->join('layanan_lansia', 'layanan_lansia.lansia_id=lansia.id_lansia')
            ->get()
            ->result(); // Tampilkan data penimbangan sesuai tanggal yang diinput oleh user pada filter
    }

    public function view_by_month($month, $year)
    {
        $this->db->where('MONTH(tgl_skrng)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_skrng)', $year); // Tambahkan where tahun

        return $this->db->from('lansia')
            ->join('layanan_lansia', 'layanan_lansia.lansia_id=lansia.id_lansia')
            ->get()
            ->result(); // Tampilkan data penimbangan sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year)
    {
        $this->db->where('YEAR(tgl_skrng)', $year); // Tambahkan where tahun

        return $this->db->from('lansia')
            ->join('layanan_lansia', 'layanan_lansia.lansia_id=lansia.id_lansia')
            ->get()
            ->result(); // Tampilkan data penimbangan sesuai tahun yang diinput oleh user pada filter
    }

    public function view_all()
    {
        return $this->db->from('lansia')
            ->join('layanan_lansia', 'layanan_lansia.lansia_id=lansia.id_lansia')
            ->get()
            ->result(); // Tampilkan semua data penimbangan
    }

    public function option_tahun()
    {
        $this->db->select('YEAR(tgl_skrng) AS tahun'); // Ambil Tahun dari field tgl_skrng_skrng

        $this->db->order_by('YEAR(tgl_skrng)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_skrng)'); // Group berdasarkan tahun pada field tgl_skrng

        return $this->db->from('lansia')
            ->join('layanan_lansia', 'layanan_lansia.lansia_id=lansia.id_lansia')
            ->get()
            ->result(); // Ambil data pada tabel penimbangan sesuai kondisi diatas
    }
}
