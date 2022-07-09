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
                            <h6 class="m-0 font-weight-bold text-primary">Layanan Ibu Hamil</h6>
                        </div>

                        <br />
                        <form id="penimbangan-form" name="penimbangan-form" class="form-horizontal form-label-left mx-5" action="<?php echo base_url('layanan/layanan_ibuhamil/submit'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Nama Ibu Hamil
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="hidden" name="id_ibuhamil" id="id_ibuhamil" class="form-control" readonly>
                                        <input type="text" name="nama_ibuhamil" id="nama_ibuhamil" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <button id="pilihData" name="pilihData" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#DataIbuHamilModal">Pilih</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">NIK
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" name="nik" id="nik" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nama Suami
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" name="nama_suami" id="nama_suami" class="form-control" readonly>
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="usia">Usia Kandungan Sekarang
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="usia_kandungan" name="usia_kandungan" class="form-control " required="required">
                                </div>
                                <label class="col-form-label label-align" for="bulan">
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Layanan</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <p style="margin-top: 5px !important;margin-bottom: -2rem !important;">
                                        <input type="radio" class="flat" name="layanan[]" id="tablet" value="Tablet Tambah Darah" /> Tablet Tambah Darah
                                        <br>
                                        <input type="radio" class="flat" name="layanan[]" id="layanan-vitamin" value="Vitamin" /> Vitamin
                                        <br>
                                        <input type="radio" class="flat" name="layanan[]" id="layanan-lainnya" value="Lainnya" /> Lainnya
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Keterangan
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea placeholder="Keterangan" id="keterangan" class="form-control" name="keterangan" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                            <br>

                            <a href="<?= base_url('menu/menu_layanan') ?>" class="btn btn-outline-success ">Kembali</a>

                            <button type="submit" id="proses" name="proses" class="btn btn-primary float-right">Proses</button>
                            <br>
                            <br>
                            <br>
                            <br>

                    </div>
                    </form>

                    <!-- Modal Data ibuhamil -->
                    <div class="modal fade bs-example-modal-lg" id="DataIbuHamilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Data Ibu Hamil</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama Ibu Hamil</th>
                                                <th>Nama Suami</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($d_ibuhamil as $d) : ?>
                                                <tr>
                                                    <td><?= $d['nik']; ?></td>
                                                    <td><?= $d['nama_ibuhamil']; ?></td>
                                                    <td><?= $d['nama_suami']; ?></td>
                                                    <td>
                                                        <button id="pilihIbuHamil" type="button " data-id="<?= $d['id_ibuhamil']; ?>" data-nik="<?= $d['nik']; ?>" data-nama="<?= $d['nama_ibuhamil']; ?>" data-suami="<?= $d['nama_suami']; ?>" class="btnSelectIbuHamil btn btn-outline-primary" data-dismiss="modal">Pilih</button>
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