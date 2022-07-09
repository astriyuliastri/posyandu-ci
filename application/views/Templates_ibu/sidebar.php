<!-- Sidebar -->
<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('beranda'); ?>">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-fw fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Posyandu Permata 1</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('blog'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>

    <div class="sidebar-heading">
        Menu
    </div>
    <!-- Nav Item - Dashboard -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('menu_ibu/jadwal'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Jadwal Posyandu</span></a>
    </li> -->
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Utilities Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('menu_ibu/riwayat'); ?>">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Riwayat Posyandu</span></a>
    </li>



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