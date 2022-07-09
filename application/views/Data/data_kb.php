<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Keluarga Berencana</h6>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">


                <div class="x_panel">
                    <div class="my-2 mx-4">
                        <button type="button" class="btn btn-primary col-lg-2" data-toggle="modal" data-target="#addDataIstriModal">
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
                                                <th>Nama WUS</th>

                                                <th>Nama Suami</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($kb as $b) : ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?= $i; ?>
                                                    </th>
                                                    <td><?= $b['nik']; ?></td>
                                                    <td><?= $b['nama_istri']; ?></td>
                                                    <td><?= $b['nama_suami']; ?></td>
                                                    <td>

                                                        <a data-toggle="modal" data-target="#editDataIstriModal<?= $b['id_istri']; ?>" href="<?= base_url(); ?>data/kb/updateDataIstri/<?= $b['id_istri']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" data-placement="bottom" href="<?= base_url(''); ?>data/kb/deleteDataIstri/<?= $b['id_istri']; ?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" title="Delete">
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
        <div class="modal fade bs-example-modal-lg" id="addDataIstriModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg-6">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Form Data Keluarga Berencana</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="demo-form2" action="<?php echo base_url('data/kb/createDataIstri') ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form">
                                <div class="form-group">

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="nik">NIK</label>
                                        <div class="col-md-12">
                                            <input type="text" id="nik" name="nik" class=" form-control" value="<?= set_value('nik'); ?>">
                                            <?php if ($this->session->flashdata('nik')) { ?>

                                                <script>
                                                    alert("Data WUS sudah terdaftar!")
                                                </script>

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="nama-istri">Nama WUS</label>
                                        <div class="col-md-12">
                                            <input type="text" id="nama-istri" name="nama-istri" required="required" class="form-control">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-9 label-align" for="nama-suami">Nama Suami</label>
                                        <div class="col-md-12">
                                            <input type="text" id="nama-suami" name="nama-suami" required="required" class="form-control">
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
        foreach ($kb as $row) {
            $a++;
        ?>
            <div class="modal fade bs-example-modal-lg" id="editDataIstriModal<?= $row['id_istri']; ?>"" tabindex=" -1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg-6">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Form Data Istri</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="demo-form2" action="<?php echo base_url('data/kb/updateDataIstri/') . $row['id_istri']; ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
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
                                            <label class="col-form-label col-md-9 label-align" for="nama-istri">Nama WUS</label>
                                            <div class="col-md-12">
                                                <input type="text" id="nama-istri" name="nama-istri" required="required" class="form-control" value="<?= $row['nama_istri'] ?>">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align" for="nama-suami">Nama Suami</label>
                                            <div class="col-md-12">
                                                <input type="text" id="nama-suami" name="nama-suami" required="required" class="form-control" value="<?= $row['nama_suami'] ?>">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-9 label-align" for="alamat">Alamat</label>
                                            <div class="col-md-12">
                                                <input type="text" id="alamat" name="alamat" required="required" class="form-control" value="<?= $row['alamat'] ?>">
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
</div>
<?php
        }
?>

</div>