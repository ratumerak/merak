<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>


    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url()  ?>assets/calender/style.css">
    <link rel="stylesheet" href="<?= base_url()  ?>assets/calender/theme.css">
    <link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet" >
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-gratipay"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('admin/') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->



                <li class="nav-item">

                    <a class="nav-link" href="<?= base_url('admin/user') ?>">
                        <i class="fas fa-user-plus"></i>
                        <span>Data Registrasi</span></a>

                        <a class="nav-link" href="<?= base_url('admin/member_active') ?>">
                            <i class="fas fa-users"></i>
                            <span>Data Member</span></a>

                            <a class="nav-link" href="<?= base_url('admin/order') ?>">
                                <i class="fas fa-shopping-bag"></i>
                                <span>Data Order</span></a>




<!--   <a class="nav-link" href="<?= base_url('admin/order') ?>">
<i class="fas fa-shopping-bag"></i>
<span>Data Order</span></a> -->

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mutasi"
aria-expanded="true" aria-controls="collapseUtilities">
<i class="fas fa-fw fa-money-check-alt"></i>
<span>Mutasi</span>
</a>
<div id="mutasi" class="collapse" aria-labelledby="headingUtilities"
data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">

    <a class="collapse-item" href="<?= base_url('admin/po2') ?>">Data PO</a>
    <a class="collapse-item" href="<?= base_url('admin/data_bonus_stok') ?>">Data Bonus Stok</a>

</div>
</div>

<!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#markisa"
aria-expanded="true" aria-controls="collapseUtilities">
<i class="fas fa-fw fa-concierge-bell"></i>
<span>Produk Markisa</span>
</a>
<div id="markisa" class="collapse" aria-labelledby="headingUtilities"
data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">

    <a class="collapse-item" href="<?= base_url('admin/produk_markisa') ?>">Data Order Markisa</a>

</div>
</div> -->


<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#topup"
aria-expanded="true" aria-controls="collapseUtilities">
<i class="fas fa-fw fa-arrow-up"></i>
<span>Topup</span>
</a>
<div id="topup" class="collapse" aria-labelledby="headingUtilities"
data-parent="#accordionSidebar"s>
<div class="bg-white py-2 collapse-inner rounded">

    <a class="collapse-item" href="<?= base_url('admin/Pengajuan_topup') ?>">Data Pengajuan Topup</a>  
    <a class="collapse-item" href="<?= base_url('admin/topup') ?>">Data Topup</a>

</div>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bonus"
aria-expanded="true" aria-controls="collapseUtilities">
<i class="fas fa-fw fa-money-check"></i>
<span>Bonus</span>
</a>
<div id="bonus" class="collapse" aria-labelledby="headingUtilities"
data-parent="#accordionSidebar"s>
<div class="bg-white py-2 collapse-inner rounded">

    <a class="collapse-item" href="<?= base_url('admin/bonus_afiliasi') ?>">Bonus Afiliasi</a>
    <a class="collapse-item" href="<?= base_url('admin/bonus_cashback_ratumerak') ?>">Bonus Cashback Ratumerak</a>

    <a class="collapse-item" href="<?= base_url('admin/bonus_cashback_markisa') ?>">Bonus Cashback Markisa</a>

</div>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#withdraw"
aria-expanded="true" aria-controls="collapseUtilities">
<i class="fas fa-fw fa-money-check-alt"></i>
<span>Withdraw Afiliasi</span>
</a>
<div id="withdraw" class="collapse" aria-labelledby="headingUtilities"
data-parent="#accordionSidebar"s>
<div class="bg-white py-2 collapse-inner rounded">

    <a class="collapse-item" href="<?= base_url('admin/Pengajuan_withdraw') ?>">Data Pengajuan Withdraw</a>
    <a class="collapse-item" href="<?= base_url('admin/data_withdraw') ?>">Data Withdraw</a>

</div>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#withdrawmerak"
aria-expanded="true" aria-controls="collapseUtilities">
<i class="fas fa-fw fa-money-check-alt"></i>
<span style="font-size: 10px;">Withdraw Cashback Ratumerak</span>
</a>
<div id="withdrawmerak" class="collapse" aria-labelledby="headingUtilities"
data-parent="#accordionSidebar"s>
<div class="bg-white py-2 collapse-inner rounded">

    <a class="collapse-item" href="<?= base_url('admin/Pengajuan_withdraw_cashback_ratumerak') ?>">Data Pengajuan Withdraw</a>
    <a class="collapse-item" href="<?= base_url('admin/data_withdraw_cashback_ratumerak') ?>">Data Withdraw Merak</a>

</div>
</div>

<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#withdrawmarkisa"
aria-expanded="true" aria-controls="collapseUtilities">
<i class="fas fa-fw fa-money-check-alt"></i>
<span style="font-size: 10px;">Withdraw Cashback Markisa</span>
</a>
<div id="withdrawmarkisa" class="collapse" aria-labelledby="headingUtilities"
data-parent="#accordionSidebar"s>
<div class="bg-white py-2 collapse-inner rounded">

    <a class="collapse-item" href="<?= base_url('admin/Pengajuan_withdraw_cashback_markisa') ?>">Data Pengajuan Withdraw</a>
    <a class="collapse-item" href="<?= base_url('admin/data_withdraw_cashback_markisa') ?>">Data Withdraw Markisa</a>

</div>
</div>



<a class="nav-link" href="<?= base_url('admin/produk') ?>">
    <i class="fas fa-compact-disc"></i>
    <span> Produk</span></a>

    <a class="nav-link" href="<?= base_url('admin/store') ?>">
        <i class="fas fa-map-marked-alt"></i>
        <span>Lokasi Store</span></a>

        <a class="nav-link" href="<?= base_url('admin/wilayah_kerja') ?>">
            <i class="fas fa-map-marked-alt"></i>
            <span>Wilayah Store</span></a>

            <a class="nav-link" href="<?= base_url('admin/kurir') ?>">
                <i class="fas fa-motorcycle"></i>
                <span>Kurir</span></a>



                <a class="nav-link" href="<?= base_url('admin/admin') ?>">
                    <i class="fas fa-key"></i>
                    <span>Admin</span></a>
                </li>


                <hr class="sidebar-divider d-none d-md-block">





                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>



                <!-- Sidebar Message -->
<!--  <div class="sidebar-card d-none d-lg-flex">
<img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
<p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
<a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> -->

</ul>

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->name_admin ?></span>
            <img class="img-profile rounded-circle"
            src="<?= base_url('assets/') ?>img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="userDropdown">

<!-- <a class="dropdown-item" href="#">
<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
Settings
</a>
<a class="dropdown-item" href="#">
<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
Activity Log
</a> -->
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
</a>
</div>
</li>

</ul>

</nav>