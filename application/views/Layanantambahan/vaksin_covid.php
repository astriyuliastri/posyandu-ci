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
                            <h6 class="m-0 font-weight-bold text-primary">Vaksin COVID-19</h6>
                        </div>

                        <br />
                        <form id="penimbangan-form" name="penimbangan-form" class="form-horizontal form-label-left mx-5" action="<?php echo base_url('layanantambahan/vaksin_covid/submit'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Nama Penerima Vaksin
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="hidden" name="id_covid" id="id_covid" class="form-control" readonly>
                                        <input type="text" name="nama_covid" id="nama_covid" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <button id="pilihData" name="pilihData" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#DatacovidModal">Pilih</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">NIK
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Usia
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="usia" name="usia" class="form-control " required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Vaksin Ke
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="vaksin_ke" name="vaksin_ke" class="form-control " required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nama Vaksin
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="nama_vaksin" name="nama_vaksin" class="form-control " required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Keterangan
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea id="keterangan" class="form-control" name="keterangan" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                            <br>

                            <a href="<?= base_url('menu/menu_layanan_tambahan') ?>" class="btn btn-outline-success ">Kembali</a>

                            <button type="submit" id="proses" name="proses" class="btn btn-primary float-right">Proses</button>
                            <br>
                            <br>
                            <br>
                            <br>

                    </div>
                    </form>

                    <!-- Modal Data covid -->
                    <div class="modal fade bs-example-modal-lg" id="DatacovidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Data Penerima Vaksin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>

                                                <th>NIK</th>
                                                <th>Nama Penerima Vaksin</th>

                                                <th>Tanggal Lahir</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($d_covid as $d) : ?>
                                                <tr>
                                                    <td><?= $d['nik']; ?></td>
                                                    <td><?= $d['nama_covid']; ?></td>

                                                    <td><?= $d['tgl_lahir']; ?></td>
                                                    <td>
                                                        <button id="pilihcovid" type="button " data-id="<?= $d['id_covid']; ?>" data-id="<?= $d['id_covid']; ?>" data-nik="<?= $d['nik']; ?>" data-nama="<?= $d['nama_covid']; ?>" data-tgl_lahir="<?= $d['tgl_lahir']; ?>" class="btnSelectcovid btn btn-outline-primary" data-dismiss="modal">Pilih</button>
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