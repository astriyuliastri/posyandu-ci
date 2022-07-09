<!-- jQuery -->
<script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Datatables -->
<script src="<?= base_url('vendors/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('vendors/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?= base_url('build/js/custom.min.js') ?>"></script>


<script type="text/javascript">
    // function iyadah() {
    //     $('#demo-form2').parsley('validate');
    // }
    $(document).ready(function() {
        // $("#usia").prop("disabled", true);
        // $("#bb").prop("disabled", true);
        // $("#tb").prop("disabled", true);
        // // $("#deteksiS").prop("disabled", true);
        // // $("#deteksiT").prop("disabled", true);
        // $("#tgl_skrng").prop("disabled", true);
        // $("#imun").prop("disabled", true);
        // $("#keterangan").prop("disabled", true);

        $('.btnSelectAnak').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var tgl_lahir = $(this).data('tgllahir');
            var jk = $(this).data('jk');
            var nama_ibu = $(this).data('ibu');

            $('#id_anak').val(id);
            $('#nama_anak').val(nama);
            $('#tgl_lahir').val(tgl_lahir);
            $('#jenis_kelamin').val(jk);

            $('#nama_ibu').val(nama_ibu);

            $('#DataAnakModal').modal('toggle');
        });

        $('.btnSelectIbuHamil').click(function() {
            var id = $(this).data('id');
            var nik = $(this).data('nik');
            var nama = $(this).data('nama');
            var tgl_lahir = $(this).data('tgllahir');
            var nama_suami = $(this).data('suami');

            $('#id_ibuhamil').val(id);
            $('#nik').val(nik);
            $('#nama_ibuhamil').val(nama);
            $('#tgl_lahir').val(tgl_lahir);
            $('#nama_suami').val(nama_suami);

            $('#DataIbuHamilModal').modal('toggle');
        });

        $('.btnSelectistri').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var tgl_lahir = $(this).data('tgllahir');
            var nama_suami = $(this).data('suami');
            var tgl_lahir_suami = $(this).data('tgllahirsuami');

            $('#id_istri').val(id);
            $('#nama_istri').val(nama);
            $('#tgl_lahir').val(tgl_lahir);
            $('#nama_suami').val(nama_suami);
            $('#tgl_lahir_suami').val(tgl_lahir_suami);

            $('#DatakbModal').modal('toggle');
        });

        $('.btnSelectbinatang').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var nama_pemilik = $(this).data('namapemilik');

            $('#id_binatang').val(id);
            $('#nama_binatang').val(nama);
            $('#nama_pemilik').val(nama_pemilik);

            $('#DatabinatangModal').modal('toggle');
        });

        $('.btnSelectcovid').click(function() {
            var id = $(this).data('id');
            var nik = $(this).data('nik');
            var nama = $(this).data('nama');
            var jenis_kelamin = $(this).data('jenis_kelamin');
            var tgl_lahir = $(this).data('tgl_lahir');

            $('#id_covid').val(id);
            $('#nik').val(nik);
            $('#nama_covid').val(nama);
            $('#jenis_kelamin').val(jenis_kelamin);
            $('#tgl_lahir').val(tgl_lahir);

            $('#DatacovidModal').modal('toggle');
        });

        $('.btnSelectAnakLaporan').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var tgl_lahir = $(this).data('tgllahir');
            var nama_ibu = $(this).data('nama_ibu');
            var nama_ayah = $(this).data('nama_ayah');

            $('#id_anak').val(id);
            $('#nama_anak').val(nama);
            $('#tgl_lahir').val(tgl_lahir);
            $('#nama_ibu').val(nama_ibu);

            $('#DataAnakModal').modal('toggle');
        });

        $("#pilihAnak").click(function() {
            getPertumbuhan();
        });

        $("#pilihAnak_Bidan").click(function() {
            getImun();
        });

        $("#tgl_skrng").change(function() {
            getUsia();
        });

        $('#proseslaporan').click(function() {
            $.ajax({
                url: '<?php echo site_url('laporan_anak/cetak_laporan'); ?>',
                type: 'POST',
                data: $('#laporananak').serialize(),
                dataType: 'html',
                success: function(res) {
                    $('#rowData').html(res);
                }
            });
            // alert($.ajax);
        });

        // $('#proses').click(function() {
        //     $.ajax({
        // url: '',
        //         data: $('#penimbangan-form').serialize(),
        //         type: 'POST',
        //         dataType: 'json',
        //         success: function(res) {
        //             $('#id_anak').val('');
        //             $('#nama_anak').val('');
        //             $('#ibu_id').val('');
        //             $('#nama_ibu').val('');
        //             $('input[name=tgl_lahir]').val('');
        //             $('input[name=jenis_kelamin]').val('');

        //             $('#usia').val('');
        //             $('#tb').val('');
        //             $('#bb').val('');
        //             $('input[name=skrng]').val('');
        //             $('textarea[name=keterangan]').val('');
        //             alert(res.messages);
        //         }
        //     });
        // });

        //    KUMPULAN FUNCTION
        function getPertumbuhan() {
            $("#usia").focus();

            $("#usia").prop("disabled", false);
            $("#bb").prop("disabled", false);
            $("#tb").prop("disabled", false);

            $("#tgl_skrng").prop("disabled", false);
            $("#keterangan").prop("disabled", false);
        }

        function getImun() {
            $("#usia").focus();

            $("#usia").prop("disabled", false);
            $("#imun").prop("disabled", false);
            $("#vita-merah").prop("disabled", false);
            $("#vita-biru").prop("disabled", false);
            $("#tgl_skrng").prop("disabled", false);
            $("#keterangan").prop("disabled", false);
        }

        function getUsia() {
            var userinput = document.getElementById("tgl_skrng").value;
            var DOB = document.getElementById("tgl_lahir").value;
            var millisecondsBetweenDOBAnd1970 = Date.parse(DOB);
            // var millisecondsBetweenNowAnd1970 = Date.now();
            var millisecondsBetweenNowAnd1970 = Date.parse(userinput);
            var ageInMilliseconds = millisecondsBetweenNowAnd1970 - millisecondsBetweenDOBAnd1970;
            //--We will leverage Date.parse and now method to calculate age in milliseconds refer here https://www.w3schools.com/jsref/jsref_parse.asp

            var milliseconds = ageInMilliseconds;
            var second = 1000;
            var minute = second * 60;
            var hour = minute * 60;
            var day = hour * 24;
            var month = day * 30;
            /*using 30 as base as months can have 28, 29, 30 or 31 days depending a month in a year it itself is a different piece of comuptation*/
            var year = day * 365;
            //let the age conversion begin
            var years = Math.round(milliseconds / year);
            var months = (Math.round(milliseconds / month) - 1);
            var days = years * 365;
            var hours = Math.round(milliseconds / hour);
            var seconds = Math.round(milliseconds / second);
            //display the calculated age  
            return document.getElementById("usia").value = months;
        }

        function handler() {
            alert("EUY");
        }

    });
</script>

<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>


<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Posyandu Permata 1 <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" untuk keluar.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

</body>

</html>