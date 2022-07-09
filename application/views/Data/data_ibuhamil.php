<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Ibu Hamil</h6>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">


                <div class="x_panel">
                    <div class="my-2 mx-4">
                        <button type="button" class="btn btn-primary col-lg-2" data-toggle="modal" data-target="#addDataIbuhamilModal">
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
                                                <th>Nama Ibu Hamil</th>
                                                <th>Nama Suami</th>
                                                <th>Usia Kandungan<br> (Waktu Daftar)</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($ibuhamil as $b) : ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?= $i; ?>
                                                    </th>
                                                    <td><?= $b['nik']; ?></td>
                                                    <td><?= $b['nama_ibuhamil']; ?></td>
                                                    <td><?= $b['nama_suami']; ?></td>
                                                    <td><?= $b['usia_kandungan_daftar']; ?></td>
                                                    <td><?= $b['alamat']; ?></td>
                                                    <td>
                                                        <!-- <a data-toggle="modal" data-target="#viewDataIbuModal<?= $b['id_ibuhamil']; ?>" href="<?= base_url(); ?>ibu/viewDataIbu/<?= $b['id_ibu']; ?>" class="btn btn-info btn-circle btn-sm" title="Details">
                                                        <i class="fa fa-sticky-note"></i>
                                                    </a> -->
                                                        <a data-toggle="modal" data-target="#editDataIbuhamilModal<?= $b['id_ibuhamil']; ?>" href="<?= base_url(); ?>data/ibuhamil/updateDataIbuhamil/<?= $b['id_ibuhamil']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" data-placement="bottom" href="<?= base_url(''); ?>data/ibuhamil/deleteDataIbuhamil/<?= $b['id_ibuhamil']; ?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" title="Delete">
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
        <div class="modal fade bs-example-modal" id="addDataIbuhamilModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg-6">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Form Data Ibu Hamil</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <form id="demo-form2" action="<?php echo base_url('data/ibuhamil/createDataIbuhamil') ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                        <div class="modal-body ">
                            <div class="form ">
                                <div class="form-group ">
                                    <div class="item form-group ">
                                        <label class="col-form-label col-md-9 label-align" for="nik">NIK</label>
                                        <div class="col-md-12">
                                            <input type="text" id="nik" name="nik" class=" form-control" value="<?= set_value('nik'); ?>">
                                            <?php if ($this->session->flashdata('nik')) { ?>

                                                <script>
                                                    alert("Data ibu hamil sudah terdaftar!")
                                                </script>

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="nama-ibuhamil">Nama Ibu Hamil</label>
                                        <div class="col-md-12">
                                            <input type="text" id="nama-ibuhamil" name="nama-ibuhamil" required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="alamat">Alamat</label>
                                        <div class="col-md-12">
                                            <input type="text" id="alamat" name="alamat" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="nama-suami">Nama Suami</label>
                                        <div class="col-md-12">
                                            <input type="text" id="nama-suami" name="nama-suami" required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="usia_kandungan_daftar">Usia Kandungan</label>
                                        <div class="col-md-12">
                                            <input type="text" id="usia_kandungan_daftar" name="usia_kandungan_daftar" required="required" class="form-control">
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
        foreach ($ibuhamil as $row) {
            $a++;
        ?>
            <div class="modal fade bs-example-modal-lg" id="editDataIbuhamilModal<?= $row['id_ibuhamil']; ?>"" tabindex=" -1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg-6">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Form Data Ibu Hamil</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="demo-form2" action="<?php echo base_url('data/ibuhamil/updateDataIbuhamil/') . $row['id_ibuhamil']; ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                            <div class="modal-body ">
                                <div class="form">
                                    <div class="form-group">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align" for="nik">NIK</label>
                                            <div class="col-md-12">
                                                <input type="text" id="nik" name="nik" required="required" class="form-control" value="<?= $row['nik'] ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align" for="nama-ibuhamil">Nama Ibu Hamil</label>
                                            <div class="col-md-12">
                                                <input type="text" id="nama-ibuhamil" name="nama-ibuhamil" required="required" class="form-control" value="<?= $row['nama_ibuhamil'] ?>">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align" for="alamat">Alamat</label>
                                            <div class="col-md-12">
                                                <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $row['alamat'] ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align" for="nama-suami">Nama Suami</label>
                                            <div class="col-md-12">
                                                <input type="text" id="nama-suami" name="nama-suami" required="required" class="form-control" value="<?= $row['nama_suami'] ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align" for="usia_kandungan_daftar">Usia Kandungan</label>
                                            <div class="col-md-12">
                                                <input type="text" id="usia_kandungan_daftar" name="usia_kandungan_daftar" required="required" class="form-control" value="<?= $row['usia_kandungan_daftar'] ?>">
                                            </div>
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