  <!-- import bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
  </link>
  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>

  <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />


  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Anak</h6>
          </div>

          <div class="row">
              <div class="col-md-12 col-sm-12 ">

                  <div class="x_panel">
                      <div class="my-2 mx-4">
                          <button type="button" class="btn btn-primary col-lg-2" data-toggle="modal" data-target="#addDataAnakModal">
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
                                                  <th>NIK Anak</th>
                                                  <th>Nama Anak</th>
                                                  <th>Tempat/Tgl Lahir</th>
                                                  <th>Nama Ibu</th>
                                                  <th>Nama Ayah</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>

                                          <tbody>
                                              <?php $i = 1; ?>
                                              <?php foreach ($anak as $n) : ?>
                                                  <tr>
                                                      <th scope="row">
                                                          <?= $i; ?>
                                                      </th>
                                                      <td><?= $n['nik']; ?></td>
                                                      <td><?= $n['nama_anak']; ?></td>
                                                      <td><?= $n['tempat_lahir'] . ',' . $n['tgl_lahir']; ?></td>
                                                      <td><?= $n['nama_ibu']; ?></td>
                                                      <td><?= $n['nama_ayah']; ?></td>
                                                      <td>

                                                          <a data-toggle="modal" data-target="#editDataAnakModal<?= $n['id_anak']; ?>" href="<?= base_url(''); ?>data/anak/updateDataAnak/<?= $n['id_anak']; ?>" class="btn btn-warning btn-circle btn-sm" title="Edit">
                                                              <i class="fa fa-edit"></i>
                                                          </a>
                                                          <a data-toggle="tooltip" data-placement="bottom" href="<?= base_url(''); ?>data/anak/deleteDataAnak/<?= $n['id_anak']; ?>" class="btn btn-danger btn-circle btn-sm tbl-hapus" title="Hapus">
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
          <div class="modal fade bs-example-modal-lg" id="addDataAnakModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg-6">
                  <div class="modal-content">

                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Form Data Anak</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                      </div>

                      <form id="demo-form2" action="<?php echo base_url('data/anak/createDataAnak') ?>" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                          <div class="modal-body ">
                              <div class="form">
                                  <div class="form-group">
                                      <div class="item form-group">
                                          <label class="col-form-label col-md-9 label-align" for="nik">NIK Anak</label>
                                          <div class="col-md-12">
                                              <input type="text" id="nik" name="nik" class=" form-control" value="<?= set_value('nik'); ?>">
                                              <?php if ($this->session->flashdata('nik')) { ?>

                                                  <script>
                                                      alert("Data anak sudah terdaftar!")
                                                  </script>

                                              <?php } ?>
                                          </div>
                                      </div>
                                      <div class="item form-group">
                                          <label class="col-form-label col-md-9 label-align" for="nama-anak">Nama Anak</label>
                                          <div class="col-md-12">
                                              <input type="text" id="nama-anak" name="nama-anak" required="required" class="form-control">
                                          </div>
                                      </div>
                                      <div class="item form-group">
                                          <label class="col-form-label col-md-9 label-align" for="tempat-lhr-anak">Tempat Lahir Anak</label>
                                          <div class="col-md-12">
                                              <input type="text" id="tempat-lhr-anak" name="tempat-lhr-anak" required class="form-control">
                                          </div>
                                      </div>
                                      <?php echo form_error('tgl_lahir'); ?>
                                      <div class="item form-group">
                                          <label class="col-form-label col-md-9 label-align">Tgl Lahir Anak
                                          </label>
                                          <div class="col-md-12">
                                              <input id="tgl-lahir-anak" name="tgl_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= set_value('tgl_lahir'); ?>">
                                              <?php if ($this->session->flashdata('validate_age')) { ?>

                                                  <script>
                                                      alert("Usia anak tidak boleh lebih dari 5 tahun! ")
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
                                          <label class="col-form-label col-md-12 col-sm-12 label-align" for="jenis-kelamin-anak">Jenis Kelamin</label>
                                          <div class="col-md-12">
                                              <select name="jenis-kelamin-anak" required="required" id=" jenis-kelamin-anak" class="form-control" required>
                                                  <option value="">-- Pilih --</option>
                                                  <option value="Laki-Laki">Laki-Laki</option>
                                                  <option value="Perempuan">Perempuan</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="item form-group">
                                          <label class="col-form-label col-md-9 label-align" for="nama-ibu">Nama Ibu</label>
                                          <div class="col-md-12">
                                              <input type="text" id="nama-ibu" required="required" name=" nama-ibu" class="form-control">
                                          </div>
                                      </div>
                                      <div class="item form-group">
                                          <label class="col-form-label col-md-9 label-align" for="nama-ayah">Nama Ayah</label>
                                          <div class="col-md-12">
                                              <input type="text" id="nama-ayah" required="required" name=" nama-ayah" class="form-control">
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

          <script type="text/javascript">
              $(".remove").click(function() {

                  var id = $(this).parents("tr").attr("id");



                  swal({

                          title: "Are you sure?",

                          text: "You will not be able to recover this imaginary file!",

                          type: "warning",

                          showCancelButton: true,

                          confirmButtonClass: "btn-danger",

                          confirmButtonText: "Yes, delete it!",

                          cancelButtonText: "No, cancel plx!",

                          closeOnConfirm: false,

                          closeOnCancel: false

                      },

                      function(isConfirm) {

                          if (isConfirm) {

                              $.ajax({

                                  url: '/item-list/' + id,

                                  type: 'DELETE',

                                  error: function() {

                                      alert('Something is wrong');

                                  },

                                  success: function(data) {

                                      $("#" + id).remove();

                                      swal("Deleted!", "Your imaginary file has been deleted.", "success");

                                  }

                              });

                          } else {

                              swal("Cancelled", "Your imaginary file is safe :)", "error");

                          }

                      });



              });
          </script>

          <!-- modals -->
          <!-- Large modal -->
          <?php
            $a = 0;
            foreach ($anak as $row) {
                $a++;
            ?>
              <div class="modal fade bs-example-modal-lg" id="editDataAnakModal<?= $row['id_anak']; ?>" tabindex=" -1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg-6">
                      <div class="modal-content">

                          <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel">Edit Form Data Anak</h4>
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                          </div>
                          <form id="demo-form2" action="<?php echo base_url('data/anak/updateDataAnak/') . $row['id_anak']; ?>" class="form-horizontal form-label-left " method="POST" enctype="multipart/form-data">
                              <div class="modal-body">
                                  <div class="form">
                                      <div class="form-group ">
                                          <div class="item form-group ">
                                              <label class="col-form-label col-md-9 label-align" for="nik">NIK Anak</label>
                                              <div class="col-md-12">
                                                  <input type="text" id="nik" name="nik" class="form-control" value="<?= $row['nik'] ?>">
                                              </div>
                                          </div>
                                          <div class="item form-group">
                                              <label class="col-form-label col-md-9 label-align" for="nama-anak">Nama Anak</label>
                                              <div class="col-md-12">
                                                  <input type="text" id="nama-anak" name="nama-anak" required="required" class="form-control" value="<?= $row['nama_anak'] ?>">
                                              </div>
                                          </div>
                                          <div class="item form-group">
                                              <label class="col-form-label col-md-9 label-align" for="tempat-lhr-anak">Tempat Lahir Anak</label>
                                              <div class="col-md-12">
                                                  <input type="text" id="tempat-lhr-anak" name="tempat-lhr-anak" class="form-control" value="<?= $row['tempat_lahir'] ?>">
                                              </div>
                                          </div>

                                          <div class="item form-group">
                                              <label class="col-form-label col-md-9 label-align">Tgl Lahir Anak
                                              </label>
                                              <div class="col-md-12">
                                                  <input id="tgl-lahir-anak" name="tgl-lahir-anak" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= $row['tgl_lahir'] ?>">
                                                  <script>
                                                      function timeFunctionLong(input) {
                                                          setTimeout(function() {
                                                              input.type = 'text';
                                                          }, 60000);
                                                      }
                                                  </script>
                                              </div>
                                              <div class="item form-group">
                                                  <label class="col-form-label col-md-9 label-align" for="jenis-kelamin-anak">Jenis Kelamin</label>
                                                  <div class="col-md-12">
                                                      <select name="jenis-kelamin-anak" id="jenis-kelamin-anak" class="form-control" value="<?= $row['jenis_kelamin'] ?>" required>
                                                          <option value="">-- Pilih Jenis Kelamin --</option>
                                                          <option value="Laki-Laki">Laki-Laki</option>
                                                          <option value="Perempuan">Perempuan</option>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="item form-group">
                                              <label class="col-form-label col-md-9 label-align" for="nama-ibu">Nama Ibu</label>
                                              <div class="col-md-12">
                                                  <input type="text" id="nama-ibu" name="nama-ibu" class="form-control" value="<?= $row['nama_ibu'] ?>">
                                              </div>
                                          </div>
                                          <div class="item form-group">
                                              <label class="col-form-label col-md-9 label-align" for="nama-ayah">Nama Ayah</label>
                                              <div class="col-md-12">
                                                  <input type="text" id="nama-ayah" name="nama-ayah" class="form-control" value="<?= $row['nama_ayah'] ?>">
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

  <script type="text/javascript">
      $(".remove").click(function() {

          var id = $(this).parents("tr").attr("id");



          swal({

                  title: "Are you sure?",

                  text: "You will not be able to recover this imaginary file!",

                  type: "warning",

                  showCancelButton: true,

                  confirmButtonClass: "btn-danger",

                  confirmButtonText: "Yes, delete it!",

                  cancelButtonText: "No, cancel plx!",

                  closeOnConfirm: false,

                  closeOnCancel: false

              },

              function(isConfirm) {

                  if (isConfirm) {

                      $.ajax({

                          url: '/item-list/' + id,

                          type: 'DELETE',

                          error: function() {

                              alert('Something is wrong');

                          },

                          success: function(data) {

                              $("#" + id).remove();

                              swal("Deleted!", "Your imaginary file has been deleted.", "success");

                          }

                      });

                  } else {

                      swal("Cancelled", "Your imaginary file is safe :)", "error");

                  }

              });



      });
  </script>