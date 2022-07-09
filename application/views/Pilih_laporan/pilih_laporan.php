<html>

<head>
    <title>PDF</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
</head>

<body>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">



            <div class="card o-hidden border-0  my-4 col-lg-7 mx-auto">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center ">
                                    <h1 class="h4 text-gray-900 mb-4">Laporan Posyandu</h1>
                                </div>

                                <form action="" method="post">
                                    <div class="form-group">
                                        <select name="laporan" class="form-control form-control-user">
                                            <option value="">Pilih Laporan</option>
                                            <option value="imunisasi">Laporan Imunisasi</option>
                                            <option value="ibuhamil">Laporan Ibu Hamil</option>
                                            <option value="lansia">Laporan Lansia</option>
                                            <option value="kb">Laporan Keluarga Berencana</option>
                                            <option value="covid">Laporan Vaksin Covid</option>
                                            <option value="hewan">Laporan Vaksin Hewan</option>
                                        </select>
                                        <br>
                                        <input class="btn btn-success btn-user btn-block" type="submit" name="tampilkan" value="Tampilkan">
                                    </div>
                                </form>
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>


</html>