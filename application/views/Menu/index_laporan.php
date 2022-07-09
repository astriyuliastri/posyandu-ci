<div class="container-fluid">

    <br>
    <div class="row">
        <div class="card mx-4 shadow mb-5">
            <div class="card-header h5 mb-0 font-weight-bold text-gray-800">=====Laporan Imunisasi Anak=====</div>
            <div class="card-body">

                <a type="button" class="btn btn-success " data-bs-toggle="modal" href="<?= base_url('laporan/laporan'); ?>">
                    Buka
                </a>
                <a type="button" class="btn btn-warning " data-bs-toggle="modal" href="<?= base_url('cetak/cetak_imunisasi'); ?>">
                    Export
                </a>
            </div>
        </div>

        <div class="card mx-4 shadow mb-5">
            <div class="card-header h5 mb-0 font-weight-bold text-gray-800">===Laporan Layanan Ibu Hamil====</div>
            <div class="card-body">

                <a type="button" class="btn btn-success" data-bs-toggle="modal" href="<?= base_url('laporan/laporan_ibuhamil'); ?>">
                    Buka
                </a>
                <a type="button" class="btn btn-warning " data-bs-toggle="modal" href="<?= base_url('cetak/cetak_ibuhamil'); ?>">
                    Export
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="card mx-4 shadow mb-5">
            <div class="card-header py-3 h5 mb-0 font-weight-bold text-gray-800">===Laporan Pemeriksaan Lansia= ===</div>
            <div class="card-body">


                <a type="button" class="btn btn-success" data-bs-toggle="modal" href="<?= base_url('laporan/laporan_lansia'); ?>">
                    Buka
                </a>
                <a type="button" class="btn btn-warning " data-bs-toggle="modal" href="<?= base_url('cetak/cetak_ibuhamil'); ?>">
                    Export
                </a>
            </div>
        </div>

        <div class="card mx-4 shadow mb-5">
            <div class="card-header py-3 h5 mb-0 font-weight-bold text-gray-800">===Laporan Keluarga Berencana===</div>
            <div class="card-body">


                <a type="button" class="btn btn-success " data-bs-toggle="modal" href="<?= base_url('laporan/laporan_kb'); ?>">
                    Buka
                </a>
                <a type="button" class="btn btn-warning " data-bs-toggle="modal" href="<?= base_url('cetak/cetak_kb'); ?>">
                    Export
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card mx-4 shadow mb-5">
            <div class="card-header py-3 h5 mb-0 font-weight-bold text-gray-800">======Laporan Vaksin Covid======</div>
            <div class="card-body">


                <a type="button" class="btn btn-success" data-bs-toggle="modal" href="<?= base_url('laporan/laporan_covid'); ?>">
                    Buka
                </a>
                <a type="button" class="btn btn-warning " data-bs-toggle="modal" href="<?= base_url('cetak/cetak_covid'); ?>">
                    Export
                </a>
            </div>
        </div>

        <div class="card mx-4 shadow mb-5">
            <div class="card-header py-3 h5 mb-0 font-weight-bold text-gray-800">==Laporan Vaksin Hewan Peliharaan=</div>
            <div class="card-body">


                <a type="button" class="btn btn-success " data-bs-toggle="modal" href="<?= base_url('laporan/laporan_binatang'); ?>">
                    Buka
                </a>
                <a type="button" class="btn btn-warning " data-bs-toggle="modal" href="<?= base_url('cetak/cetak_binatang'); ?>">
                    Export
                </a>
            </div>
        </div>
    </div>
</div>