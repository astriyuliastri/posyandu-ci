  <!-- import bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
  </link>



  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Penerima Vaksin Covid</h6>
          </div>

          <div class="row">
              <div class="col-md-12 col-sm-12 ">

                  <div class="x_panel">
                      <div class="my-2 mx-4">
                          <button type="button" class="btn btn-primary col-lg-2" data-toggle="modal" data-target="#addDataCovidModal">
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
                                                  <th>Nama</th>
                                                  <th>Tempat/Tgl Lahir</th>
                                                  <th>Alamat</th>

                                                  <th>Action</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                              <?php $i = 1; ?>
                                              <?php foreach ($covid as $n) : ?>
                                                  <tr>
                                                      <th scope="row">
                                                          <?= $i; ?>
                                                      </th>
                                                      <td><?= $n['nik']; ?></td>
                                                      <td><?= $n['nama_covid']; ?></td>
                                                      <td><?= $n['tempat_lahir'] . ',' . $n['tgl_lahir']; ?></td>
                                                      <td><?= $n['alamat']; ?></td>

                                                      <td>

                                                          <a data-toggle="modal" data-target="#editDataCovidModal<?= $n['id_covid']; ?>" href="<?= base_url(''); ?>data/covid/updateDataCovid/<?= $n['id_covid']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit">
                                                              <i class="fa fa-edit"></i>
                                                          </a>
                                                          <a data-toggle="tooltip" data-placement="bottom" href="<?= base_url(''); ?>data/covid/deleteDataCovid/<?= $n['id_covid']; ?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" title="Hapus">
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
          <div class="modal fade bs-example-modal-lg" id="addDataCovidModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg-6">
                  <div class="modal-content">

                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Form Data Penerima Vaksin Covid</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                      </div>

                      <form id="demo-form2" action="<?php echo base_url('data/covid/createDataCovid') ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                          <div class="modal-body ">
                              <div class="form">
                                  <div class="form-group">
                                      <div class="item form-group">
                                          <label class="col-form-label col-md-9 label-align" for="nik">NIK</label>
                                          <div class="col-md-12">
                                              <input type="text" id="nik" name="nik" class=" form-control" value="<?= set_value('nik'); ?>">
                                              <?php if ($this->session->flashdata('nik')) { ?>

                                                  <script>
                                                      alert("Data covid sudah terdaftar!")
                                                  </script>

                                              <?php } ?>
                                          </div>
                                      </div>
                                      <div class="item form-group">
                                          <label class="col-form-label col-md-9 label-align" for="nama-covid">Nama</label>
                                          <div class="col-md-12">
                                              <input type="text" id="nama-covid" name="nama-covid" required="required" class="form-control">
                                          </div>
                                      </div>
                                      <div class="item form-group">
                                          <label class="col-form-label col-md-9 label-align" for="tempat-lhr-covid">Tempat Lahir covid</label>
                                          <div class="col-md-12">
                                              <input type="text" id="tempat-lhr-covid" name="tempat-lhr-covid" required class="form-control">
                                          </div>
                                      </div>

                                      <div class="item form-group">
                                          <label class="col-form-label col-md-9 label-align" for="tgl_lahir">Tgl Lahir
                                          </label>
                                          <div class="col-md-12">
                                              <input id="tgl_lahir" name="tgl_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= set_value('tgl_lahir'); ?>">
                                              <?php if ($this->session->flashdata('validate_age')) { ?>

                                                  <script>
                                                      alert("Usia covid tidak boleh kurang dari 2 tahun! ")
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
                          </div>2
                      </form>
                  </div>
              </div>
          </div>

          <!-- modals -->
          <!-- Large modal -->
          <?php
            $a = 0;
            foreach ($covid as $row) {
                $a++;
            ?>
              <div class="modal fade bs-example-modal-lg" id="editDataCovidModal<?= $row['id_covid']; ?>" tabindex=" -1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg-6">
                      <div class="modal-content">

                          <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Edit Form Data covid</h4>
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                          </div>
                          <form id="demo-form2" action="<?php echo base_url('data/covid/updateDataCovid/') . $row['id_covid']; ?>" class="form-horizontal form-label-left " method="POST" enctype="multipart/form-data">
                              <div class="modal-body">
                                  <div class="form">
                                      <div class="form-group ">
                                          <div class="item form-group ">
                                              <label class="col-form-label col-md-9 label-align" for="nik">NIK</label>
                                              <div class="col-md-12">
                                                  <input type="text" id="nik" name="nik" class="form-control" value="<?= $row['nik'] ?>">
                                              </div>
                                          </div>
                                          <div class="item form-group">
                                              <label class="col-form-label col-md-9 label-align" for="nama-covid">Nama </label>
                                              <div class="col-md-12">
                                                  <input type="text" id="nama-covid" name="nama-covid" required="required" class="form-control" value="<?= $row['nama_covid'] ?>">
                                              </div>
                                          </div>
                                          <div class="item form-group">
                                              <label class="col-form-label col-md-9 label-align" for="tempat-lhr-covid">Tempat Lahir covid</label>
                                              <div class="col-md-12">
                                                  <input type="text" id="tempat-lhr-covid" name="tempat-lhr-covid" class="form-control" value="<?= $row['tempat_lahir'] ?>">
                                              </div>
                                          </div>

                                          <div class="item form-group">
                                              <label class="col-form-label col-md-9 label-align" for="tgl_lahir">Tgl Lahir covid
                                              </label>
                                              <div class="col-md-12">
                                                  <input id="tgl_lahir" name="tgl_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= $row['tgl_lahir'] ?>">
                                                  <script>
                                                      function timeFunctionLong(input) {
                                                          setTimeout(function() {
                                                              input.type = 'text';
                                                          }, 60000);
                                                      }
                                                  </script>
                                              </div>



                                              <div class="item form-group">
                                                  <label class="col-form-label col-md-9 label-align" for="alamat">Alamat</label>
                                                  <div class="col-md-12">
                                                      <input type="text" id="alamat" name="alamat" class="form-control" value="<?= $row['alamat'] ?>">
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