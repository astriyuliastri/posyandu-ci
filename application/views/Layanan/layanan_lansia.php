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
                            <h6 class="m-0 font-weight-bold text-primary">Layanan Lansia</h6>
                        </div>

                        <br />
                        <form id="penimbangan-form" name="penimbangan-form" class="form-horizontal form-label-left mx-5" action="<?php echo base_url('layanan/layanan_lansia/submit'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Nama Lansia
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="hidden" name="id_lansia" id="id_lansia" class="form-control" readonly>
                                        <input type="text" name="nama_lansia" id="nama_lansia" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <button id="pilihData" name="pilihData" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#DatalansiaModal">Pilih</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">NIK
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" name="nik" id="nik" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input class="date-picker form-control" name="tgl_lahir" id="tgl_lahir" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" readonly>
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="usia">Usia
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="usia" name="usia" class="form-control " required="required">
                                </div>
                                <label class="col-form-label label-align" for="bulan">
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="bb">BB
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="bb" name="bb" class="form-control ">
                                </div>
                                <label class="col-form-label label-align" for="bb">
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="td">TD
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="td" name="td" class="form-control ">
                                </div>
                                <label class="col-form-label label-align" for="td">
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="keluhan">Keluhan
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="keluhan" name="keluhan" class="form-control ">
                                </div>
                                <label class="col-form-label label-align" for="keluhan">
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="diagnosa">Diagnosa
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="diagnosa" name="diagnosa" class="form-control ">
                                </div>
                                <label class="col-form-label label-align" for="diagnosa">
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="terapi">Terapi
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="terapi" name="terapi" class="form-control ">
                                </div>
                                <label class="col-form-label label-align" for="terapi">
                                </label>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Keterangan
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea placeholder="" id="keterangan" class="form-control" name="keterangan" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
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

                    <!-- Modal Data lansia -->
                    <div class="modal fade bs-example-modal-lg" id="DatalansiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Data Lansia</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama Lansia</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($d_lansia as $d) : ?>
                                                <tr>
                                                    <td><?= $d['nik']; ?></td>
                                                    <td><?= $d['nama_lansia']; ?></td>
                                                    <td><?= $d['tgl_lahir']; ?></td>
                                                    <td>
                                                        <button id="pilihlansia" type="button " data-id="<?= $d['id_lansia']; ?>" data-nik="<?= $d['nik']; ?>" data-nama="<?= $d['nama_lansia']; ?>" data-tgllahir="<?= $d['tgl_lahir']; ?>" class="btnSelectLansia btn btn-outline-primary" data-dismiss="modal">Pilih</button>
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