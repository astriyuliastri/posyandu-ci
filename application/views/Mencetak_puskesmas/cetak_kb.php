<html>

<head>
    <title>PDF</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
</head>

<body>
    <div class="mx-3">
        <div class="card shadow mb-4">


            <div class="row">
                <div class="col-md-12 col-sm-12 ">

                    <div class="x_panel">


                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">

                                        <form method="get" action="">

                                            <label>Pilih Periode</label><br>
                                            <select name="filter" id="filter">
                                                <option value="">Pilih</option>
                                                <option value="1">Per Tanggal</option>
                                                <option value="2">Per Bulan</option>
                                                <option value="3">Per Tahun</option>
                                            </select>
                                            <br /><br />
                                            <div id="form-tanggal">
                                                <label>Tanggal</label><br>
                                                <input type="text" name="tanggal" class="input-tanggal" />
                                                <br /><br />
                                            </div>
                                            <div id="form-bulan">
                                                <label>Bulan</label><br>
                                                <select name="bulan">
                                                    <option value="">Pilih</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                                <br /><br />
                                            </div>
                                            <div id="form-tahun">
                                                <label>Tahun</label><br>
                                                <select name="tahun">
                                                    <option value="">Pilih</option>
                                                    <?php
                                                    foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                                        echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <br /><br /><br>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tampilkan</button>
                                            <a class="btn btn-secondary" href="<?php echo base_url('mencetak/cetak_kb'); ?>">Reset Filter</a>
                                        </form>
                                        <hr />



                                        <div class="card-box table-responsive">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="actionTable">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <th>Nama Istri</th>
                                                        <th>Usia Istri</th>
                                                        <th>Nama Suami</th>
                                                        <th>Tahapan KS</th>
                                                        <th>Kelompok Dasawisma</th>
                                                        <th>Jumlah Anak</th>
                                                        <th>Pengukuran Lila <23.5cm </th>
                                                        <th>Pemberian</th>
                                                        <th>Kontrasepsi Yang Dipakai</th>
                                                        <th>Tgl Pergantian</th>
                                                        <th>Jenis Kontrasepsi</th>
                                                        <th>Ket</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                                    if (!empty($cetak_kb)) {
                                                        $no = 1;
                                                        foreach ($cetak_kb as $data) {
                                                            $tgl_skrng = date('d-m-Y', strtotime($data->tgl_skrng));

                                                            echo "<tr>";
                                                            echo "<td>" . $tgl_skrng . "</td>";
                                                            echo "<td>" . $data->nama_istri . "</td>";
                                                            echo "<td>" . $data->usia_istri . "</td>";
                                                            echo "<td>" . $data->nama_suami . "</td>";
                                                            echo "<td>" . $data->tahapanks . "</td>";
                                                            echo "<td>" . $data->klmp . "</td>";
                                                            echo "<td>" . $data->jml_anak . "</td>";
                                                            echo "<td>" . $data->pengukuran . "</td>";
                                                            echo "<td>" . $data->layanan . "</td>";
                                                            echo "<td>" . $data->kontrasepsi_dipakai . "</td>";
                                                            echo "<td>" . $data->tgl_diganti . "</td>";
                                                            echo "<td>" . $data->jenis_kontrasepsi . "</td>";
                                                            echo "<td>" . $data->ket . "</td>";
                                                            echo "</tr>";
                                                            $no++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>




                                    </div>



</body>

</html>


<script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Datatables -->
<script src="<?= base_url('vendors/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('vendors/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#actionTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<!-- jQuery -->

<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
<script>
    $(document).ready(function() { // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });
        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function() { // Ketika user memilih filter
            if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            } else { // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
</script>