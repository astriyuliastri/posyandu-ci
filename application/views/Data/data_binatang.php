<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Binatang Peliharaan</h6>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">

                <div class="x_panel">
                    <div class="my-2 mx-4">
                        <button type="button" class="btn btn-primary col-lg-2" data-toggle="modal" data-target="#addDataBinatangModal">
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
                                                <th>Nama Pemilik</th>
                                                <th>NIK</th>
                                                <th>Alamat Pemilik</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($binatang as $n) : ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?= $i; ?>
                                                    </th>


                                                    <td><?= $n['nama_pemilik']; ?></td>
                                                    <td><?= $n['nik']; ?></td>
                                                    <td><?= $n['alamat_pemilik']; ?></td>

                                                    <td>

                                                        <a data-toggle="modal" data-target="#editDataBinatangModal<?= $n['id_binatang']; ?>" href="<?= base_url(''); ?>data/binatang/updateDataBinatang/<?= $n['id_binatang']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" data-placement="bottom" href="<?= base_url(''); ?>data/binatang/deleteDataBinatang/<?= $n['id_binatang']; ?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" title="Delete">
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
        <div class="modal fade bs-example-modal-lg" id="addDataBinatangModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg-6">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Form Data Pemilik Hewan Peliharaan</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="demo-form2" action="<?php echo base_url('data/binatang/createDataBinatang') ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                        <div class="modal-body ">
                            <div class="form">
                                <div class="form-group">


                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="nik">NIK Pemilik</label>
                                        <div class="col-md-12">
                                            <input type="text" id="nik" name="nik" class=" form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="nama_pemilik">Nama Pemilik</label>
                                        <div class="col-md-12">
                                            <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control" required="required">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="alamat_pemilik">Alamat </label>
                                        <div class="col-md-12">
                                            <input type="text" id="alamat_pemilik" name="alamat_pemilik" class="form-control" required="required">
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
        foreach ($binatang as $row) {
            $a++;
        ?>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="editDataBinatangModal<?= $row['id_binatang']; ?>"" tabindex=" -1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg-6">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Form Data Pemilik Hewan Peliharaan</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="demo-form2" action="<?php echo base_url('data/binatang/updateDataBinatang/') . $row['id_binatang']; ?>" class="form-horizontal form-label-left " method="POST" enctype="multipart/form-data">
                <div class="modal-body ">
                    <div class="form ">
                        <div class="form-group ">

                            <div class="item form-group">
                                <label class="col-form-label col-md-9 label-align" for="nik">NIK Pemilik</label>
                                <div class="col-md-12">
                                    <input type="text" id="nik" name="nik" class="form-control" value="<?= $row['nik'] ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-9 label-align" for="nama_pemilik">Nama Pemilik</label>
                                <div class="col-md-12">
                                    <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control" value="<?= $row['nama_pemilik'] ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-9 label-align" for="alamat_pemilik">Alamat </label>
                                <div class="col-md-12">
                                    <input type="text" id="alamat_pemilik" name="alamat_pemilik" class="form-control" value="<?= $row['alamat_pemilik'] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php
        }
?>