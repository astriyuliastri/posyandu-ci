<!-- <div class="container">
    <div class="row" style="margin-left: 30px">
        <div class="col-xs-4 col-xs-offset-4">
            <form action="<?= base_url('search/search') ?>" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari Nama Anda...">
                    <span class="btn-warning">
                        <button class="btn btn-default" >Cari</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="row" style="margin-left: 30px">
        <div class="col-xs-4 col-xs-offset-4 text-center">
            <br>
            <br>
            <?php if (!empty($keyword)) { ?>
                <p style="color:orange"><b>Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</b></p>
            <?php } ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Diperiksa</th>
                        <th scope="col">Tanggal lahir</th>
                        <th scope="col">Imunisasi</th>
                        <th scope="col">Keterangan</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) { ?>
                        <tr>
                            <th scope="row"><?= $row['nik'] ?></th>
                            <td><?= $row['nama_anak'] ?></td>
                            <td><?= $row['tgl_skrng'] ?></td>
                            <td><?= $row['tgl_lahir'] ?></td>
                            <td><?= $row['imunisasi'] ?></td>
                            <td><?= $row['ket'] ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
 -->


<!DOCTYPE html>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">



        <div class="card o-hidden border-0  my-4 col-lg-7 mx-auto">
            <div class="card-body">
                <div class="row">

                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center ">
                                <h1 class="h4 text-gray-900 mb-4">Riwayat Posyandu</h1>
                            </div>


                            <?= $this->session->flashdata('message'); ?>

                            <form method="POST" action="">
                                <div class="form-group">

                                    <select name="riwayat" class="form-control form-control-user">
                                        <option value="">Pilih Riwayat</option>
                                        <option value="imunisasi">Riwayat Imunisasi Anak</option>
                                        <option value="ibuhamil">Riwayat Posyandu Ibu Hamil</option>
                                        <option value="lansia">Riwayat Posyandu Lansia</option>
                                        <option value="kb">Riwayat Keluarga Berencana</option>
                                        <option value="covid">Riwayat Vaksin Covid</option>
                                        <option value="hewan">Riwayat Vaksin Hewan</option>
                                    </select>
                                </div>



                                <!-- 
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nik" placeholder="NIK" name="nik">
                                <!-- <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?> -->
                                <!-- </div> -->


                                <button type="submit" name="lihat" class="btn btn-primary btn-user btn-block">
                                    Lihat Riwayat
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>