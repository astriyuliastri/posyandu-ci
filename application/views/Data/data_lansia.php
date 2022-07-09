<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Lansia</h6>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">


                <div class="x_panel">
                    <div class="my-2 mx-4">
                        <button type="button" class="btn btn-primary col-lg-2" data-toggle="modal" data-target="#addDataLansiaModal">
                            Tambah Data
                        </button>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="actionTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama Lansia</th>
                                                <th>Tempat/Tgl Lahir</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($lansia as $b) : ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?= $i; ?>
                                                    </th>
                                                    <td><?= $b['nik']; ?></td>
                                                    <td><?= $b['nama_lansia']; ?></td>
                                                    <td><?= $b['tempat_lahir'] . ',' . $b['tgl_lahir']; ?></td>
                                                    <td><?= $b['alamat']; ?></td>
                                                    <td>

                                                        <a data-toggle="modal" data-target="#editDataLansiaModal<?= $b['id_lansia']; ?>" href="<?= base_url(); ?>data/lansia/updateDataLansia/<?= $b['id_lansia']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" data-placement="bottom" href="<?= base_url(''); ?>data/lansia/deleteDataLansia/<?= $b['id_lansia']; ?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modals -->
        <!-- Large modal -->
        <div class="modal fade bs-example-modal-lg" id="addDataLansiaModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg-6">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Form Data Lansia</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="demo-form2" action="<?php echo base_url('data/lansia/createDataLansia') ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                        <div class="modal-body ">
                            <div class="form">
                                <div class="form-group">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="nik">NIK lansia</label>
                                        <div class="col-md-12">
                                            <input type="text" id="nik" name="nik" class=" form-control" value="<?= set_value('nik'); ?>">
                                            <?php if ($this->session->flashdata('nik')) { ?>

                                                <script>
                                                    alert("Data lansia sudah terdaftar!")
                                                </script>

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="nama-lansia">Nama lansia</label>
                                        <div class="col-md-12">
                                            <input type="text" id="nama-lansia" name="nama-lansia" required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="tempat-lhr-lansia">Tempat Lahir lansia</label>
                                        <div class="col-md-12">
                                            <input type="text" id="tempat-lhr-lansia" name="tempat-lhr-lansia" class="form-control">
                                        </div>
                                    </div>
                                    <?php echo form_error('tgl_lahir'); ?>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align">Tgl Lahir lansia
                                        </label>
                                        <div class="col-md-12">
                                            <input id="tgl-lahir-lansia" name="tgl-lahir-lansia" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= set_value('tgl_lahir'); ?>">
                                            <?php if ($this->session->flashdata('validate_age')) { ?>

                                                <script>
                                                    alert("Usia tidak boleh kurang dari 60 tahun! ")
                                                </script>

                                            <?php } ?>
                                            <script>
                                                function timeFunctionLong(input) {
                                                    setTimeout(function() {
                                                        input.type = 'text';
                                                    }, 60000);
                                                }
                                            </script>
                                        </div>
                                    </div>



                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="alamat">Alamat</label>
                                        <div class="col-md-12">
                                            <input type="text" id="alamat" name="alamat" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modals -->
        <!-- Large modal -->
        <?php
        $a = 0;
        foreach ($lansia as $row) {
            $a++;
        ?>
            <div class="modal fade bs-example-modal-lg" id="editDataLansiaModal<?= $row['id_lansia']; ?>" tabindex=" -1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg-6">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Form Data Lansia</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="demo-form2" action="<?php echo base_url('data/lansia/updateDataLansia/') . $row['id_lansia']; ?>" class="form-horizontal form-label-left " method="POST" enctype="multipart/form-data">
                            <div class="modal-body ">
                                <div class="form ">
                                    <div class="form-group ">
                                        <div class="item form-group ">
                                            <label class="col-form-label col-md-9 label-align" for="nik">NIK lansia</label>
                                            <div class="col-md-12">
                                                <input type="text" id="nik" name="nik" required="required" class="form-control" value="<?= $row['nik'] ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align" for="nama-lansia">Nama lansia</label>
                                            <div class="col-md-12">
                                                <input type="text" id="nama-lansia" name="nama-lansia" required="required" class="form-control" value="<?= $row['nama_lansia'] ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align" for="tempat-lhr-lansia">Tempat Lahir Lansia</label>
                                            <div class="col-md-12">
                                                <input type="text" id="tempat-lhr-lansia" name="tempat-lhr-lansia" class="form-control" value="<?= $row['tempat_lahir'] ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align">Tgl Lahir lansia
                                            </label>
                                            <div class="col-md-12">
                                                <input id="tgl-lahir-lansia" name="tgl-lahir-lansia" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= $row['tgl_lahir'] ?>">
                                                <script>
                                                    function timeFunctionLong(input) {
                                                        setTimeout(function() {
                                                            input.type = 'text';
                                                        }, 60000);
                                                    }
                                                </script>
                                            </div>
                                        </div>


                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align" for="alamat">Alamat</label>
                                            <div class="col-md-12">
                                                <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $row['alamat'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<?php
        }
?>
</div>