<div class="container-fluid">
    <div class="right_col" role="main">
        <div class="flash-datar" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
        <?php if ($this->session->flashdata('msg')) : ?>

        <?php endif; ?>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">

                <div class="x_panel">
                    <div class="x_content">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Laporan Pemberian Vaksin COVID-19</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">

                                            <table width="100%" class="table table-striped table-bordered table-hover" id="actionTable">

                                                <thead>
                                                    <tr>
                                                        <th> No</th>
                                                        <th>Tanggal</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal lahir</th>
                                                        <th>Usia</th>
                                                        <th>Vaksin Ke</th>
                                                        <th>Nama Vaksin</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($hasil as $item) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $item->tgl_skrng; ?></td>
                                                            <td><?php echo $item->nik; ?></td>
                                                            <td><?php echo $item->nama_covid; ?></td>
                                                            <td><?php echo $item->tgl_lahir; ?></td>
                                                            <td><?php echo $item->usia; ?></td>
                                                            <td><?php echo $item->vaksin_ke; ?></td>
                                                            <td><?php echo $item->nama_vaksin; ?></td>
                                                            <td><?php echo $item->ket; ?></td>
                                                        </tr>
                                                    <?php
                                                        $no++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>