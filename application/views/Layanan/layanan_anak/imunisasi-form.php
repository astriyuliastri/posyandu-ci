<!-- Begin Page Content -->
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
                                <h6 class="m-0 font-weight-bold text-primary">Imunisasi</h6>
                            </div>
                            <br>
                            <form id="imunisasi-form" name="imunisasi-form" class="form-horizontal form-label-left mx-4" action="<?php echo base_url('layanan/imunisasi_anak/submit'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Nama Anak
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group">
                                            <input type="hidden" name="id_anak" id="id_anak" class="form-control" readonly required="required">
                                            <input type="text" name="nama_anak" id="nama_anak" class="form-control" readonly required="required">
                                            <span class=" input-group-btn">
                                                <button required="required" type="submit" id="pilihData" name="pilihData" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#DataAnakModal">Pilih</button>
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
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Imunisasi</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <p style="margin-top: 5px !important;margin-bottom: -2rem !important;">
                                            <input type="radio" class="flat" name="imun[]" id="pentabion1" value="Pentabion I" /> Pentabion I
                                            <br>
                                            <input type="radio" class="flat" name="imun[]" id="pentabion2" value="Pentabion II" /> Pentabion II
                                            <br>
                                            <input type="radio" class="flat" name="imun[]" id="pentabion3" value="Pentabion III" /> Pentabion III
                                            <br>
                                            <input type="radio" class="flat" name="imun[]" id="polio1" value="Polio I" /> Polio I
                                            <br>
                                            <input type="radio" class="flat" name="imun[]" id="polio2" value="Polio II" /> Polio II
                                            <br>
                                            <input type="radio" class="flat" name="imun[]" id="polio3" value="Polio III" /> Polio III
                                            <br>
                                            <input type="radio" class="flat" name="imun[]" id="polio1" value="Polio IV" /> Polio IV
                                            <br>

                                            <input type="radio" class="flat" name="imun[]" id="mr" value="MR" /> MR
                                            <br>
                                            <input type="radio" class="flat" name="imun[]" id="imunisasilengkap" value="Imunisasi Lengkap" /> Imunisasi Lengkap
                                            <br>
                                            <input type="radio" class="flat" name="imun[]" id="pentabionbooster" value="Pentabion Booster" /> Pentabion Booster
                                            <br>
                                            <input type="radio" class="flat" name="imun[]" id="mrbooster" value="MR Booster" /> MR Booster
                                            <br>
                                            <input type="radio" class="flat" name="imun[]" id="tidakada" value="Tidak Ada" /> Tidak Ada
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Layanan Diberikan</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <p style="margin-top: 5px !important;margin-bottom: -2rem !important;">
                                            <input type="radio" class="flat" name="layanan[]" id="sirfe1" value="SIR Fe I" /> SIR Fe I
                                            <br>
                                            <input type="radio" class="flat" name="layanan[]" id="sirfe2" value="SIR Fe II" /> SIR Fe II
                                            <br>
                                            <input type="radio" class="flat" name="layanan[]" id="vita1" value="Vit A I" /> Vit A I
                                            <br>
                                            <input type="radio" class="flat" name="layanan[]" id="vita2" value="Vit A II" /> Vit A II
                                            <br>
                                            <input type="radio" class="flat" name="layanan[]" id="oralit" value="Oralit" /> Oralit
                                            <br>
                                            <input type="radio" class="flat" name="layanan[]" id="tidakada" value="Tidak Ada" /> Tidak Ada
                                        </p>
                                    </div>

                                </div>
                                <br> <br>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Keterangan
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea id="keterangan" class="form-control" name="keterangan" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button type="submit" id="proses" name="proses" class="btn btn-primary">Proses</button>
                                    </div>
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
                                                                <button id="pilihAnak_Bidan" type="button" data-id="<?= $d['id_anak']; ?>" data-nama="<?= $d['nama_anak']; ?>" data-tgllahir="<?= $d['tgl_lahir']; ?>" data-ibu="<?= $d['nama_ibu']; ?>" data-jk="<?= $d['jenis_kelamin']; ?>" class="btnSelectAnak btn btn-primary btn-sm" data-dismiss="modal">Pilih</button>
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