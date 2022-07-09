<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Imunisasi Anak</h6>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="col-xs-4 col-xs-offset-4 text-center">

                    <?php if (!empty($keyword)) { ?>

                    <?php } ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="actionTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tanggal Diperiksa</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tanggal lahir</th>
                                                <th scope="col">Berat Badan</th>
                                                <th scope="col">Imunisasi</th>
                                                <th scope="col">Layanan Diberikan</th>
                                                <th scope="col">Keterangan</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $row) { ?>
                                                <tr>
                                                    <td><?= $row['tgl_skrng'] ?></td>
                                                    <th scope="row"><?= $row['nik'] ?></th>
                                                    <td><?= $row['nama_anak'] ?></td>
                                                    <td><?= $row['tgl_lahir'] ?></td>
                                                    <td><?= $row['bb'] ?></td>
                                                    <td><?= $row['imunisasi'] ?></td>
                                                    <td><?= $row['layanandiberikan'] ?></td>
                                                    <td><?= $row['ket'] ?></td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>