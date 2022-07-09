<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="right_col " role="main"></div>

    <div class="flash-datap" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
    <?php if ($this->session->flashdata('msg')) : ?>

    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pengukuran Dan Penimbangan Anak</h6>
                        </div>

                        <br />
                        <form id="penimbangan-form" name="penimbangan-form" class="form-horizontal form-label-left mx-5" action="<?php echo base_url('layanan/penimbangan_anak/submit'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Nama Anak
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="hidden" name="id_anak" id="id_anak" class="form-control" readonly>
                                        <input type="text" name="nama_anak" id="nama_anak" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <button id="pilihData" name="pilihData" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#DataAnakModal">Pilih</button>
                                        </span>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Sekarang
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input required="required" class="date-picker form-control" name="tgl_skrng" id="tgl_skrng" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="bb_lahir">BB Lahir
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="bb_lahir" name="bb_lahir" class="form-control" required="required">
                                </div>
                                <label class="col-form-label label-align" for="bb_lahir">
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="bb">Hasil Penimbangan
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="bb" name="bb" class="form-control" required="required">
                                </div>
                                <label class="col-form-label label-align" for="bb">
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="klmp">Kelompok Dasawisma
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="klmp" name="klmp" class="form-control">
                                </div>
                                <label class="col-form-label label-align" for="klmp">
                                </label>
                            </div>


                            <br>

                            <a href="<?= base_url('menu/menu_layanan') ?>" class="btn btn-outline-success ">Kembali</a>

                            <button type="submit" id="proses" name="proses" class="btn btn-primary float-right">Selanjutnya</button>
                            <br>
                            <br>
                            <br>
                            <br>

                    </div>
                    </form>

                    <!-- Modal Data Anak -->
                    <div class="modal fade bs-example-modal-lg" id="DataAnakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Data Anak</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nama Anak</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Nama Ibu</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($d_anak as $d) : ?>
                                                <tr>
                                                    <td><?= $d['nama_anak']; ?></td>
                                                    <td><?= $d['jenis_kelamin']; ?></td>
                                                    <td><?= $d['tgl_lahir']; ?></td>
                                                    <td><?= $d['nama_ibu']; ?></td>
                                                    <td>
                                                        <button id="pilihAnak" type="button " data-id="<?= $d['id_anak']; ?>" data-nama="<?= $d['nama_anak']; ?>" data-tgllahir="<?= $d['tgl_lahir']; ?>" data-ibu="<?= $d['nama_ibu']; ?>" data-jk="<?= $d['jenis_kelamin']; ?>" class="btnSelectAnak btn btn-outline-primary" data-dismiss="modal">Pilih</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>