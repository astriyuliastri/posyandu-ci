<!-- Sidebar -->
<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('beranda'); ?>">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-fw fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistem Informasi Posyandu</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('beranda'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('menu/menu_data'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- Nav Item - Dashboard -->

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('menu/menu_layanan'); ?>">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Layanan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Utilities Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('menu/menu_layanan_tambahan'); ?>">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Vaksin</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pilih_laporan/pilih_laporan') ?>">
            <i class="fas fa-fw fa-file-contract"></i>
            <span>Laporan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kelola_berita') ?>">
            <i class="fas fa-fw fa-file-contract"></i>
            <span>Kelola Berita</span></a>
    </li>
    <hr class="sidebar-divider my-0">


    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('menu/jadwal') ?>">
            <i class="fas fa-fw fa-file-contract"></i>
            <span>Jadwal Posyandu</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Keluar
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth') ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->


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