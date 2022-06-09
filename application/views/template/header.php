<!DOCTYPE html>
<html lang="en">

<?php 
    $user = $this->db->get_where('tbl_member', ['kode_member' => $this->session->kode_member])->row_array();
   

 ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MLM</title>


    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

 <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-jGI8CtdIXSI5TgRA"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url()  ?>assets/calender/style.css">
  <link rel="stylesheet" href="<?= base_url()  ?>assets/calender/theme.css">
  <link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet" >
  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('utama/') ?>">
                
                <div class="sidebar-brand-text mx-3">Ratumerak<sup></sup></div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('utama/') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            

            <!-- Divider -->
         <li class="nav-item">
            <hr class="sidebar-divider">
            <?php if ($user == false) {?>
                <a class="nav-link" href="<?= base_url('utama/pay') ?>">
                    <i class="fas fa-users"></i>
                    <span>Pay</span></a>

                <a class="nav-link" href="<?= base_url('utama/profil_user') ?>">
                    <i class="fas fa-users"></i>
                    <span>Profil</span></a>
            </li>

                <?php } ?>


            <?php if ($user == true) {?>

              <div class="sidebar-heading">
                Order
            </div>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('utama/order') ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Order</span></a>

               
                <a class="nav-link" href="<?= base_url('utama/data_order') ?>">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Data Order</span></a>

                 <!-- <a class="nav-link" href="#">
                    <i class="fas fa-map-marked"></i>
                    <span>Tracking Order</span></a> -->
            </li>

        
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Member
            </div>

              <li class="nav-item">
                

                <a class="nav-link" href="<?= base_url('utama/data_member') ?>">
                    <i class="fas fa-users"></i>
                    <span>Data Member</span></a>

                    
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#markisa"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-concierge-bell"></i>
                            <span>Markisa</span>
                        </a>
                        <div id="markisa" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                               
                                <a class="collapse-item" href="<?= base_url('utama/produk_markisa') ?>">Order Markisa</a>
                                <a class="collapse-item" href="<?= base_url('utama/data_order_markisa') ?>">Data Order Markisa</a>
                                
                            </div>
                    </div>

                   
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-arrow-up"></i>
                            <span>Topup</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                               
                                <a class="collapse-item" href="<?= base_url('utama/topup') ?>">Topup</a>
                                <a class="collapse-item" href="<?= base_url('utama/data_topup') ?>">Data Topup</a>
                                <!-- <a class="collapse-item" href="<?= base_url('utama/data_topup_markisa') ?>">Data Topup Markisa</a> -->
                                
                            </div>
                        </div>


                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#with"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-money-check"></i>
                            <span>Withdraw</span>
                        </a>
                        <div id="with" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                               
                                <a class="collapse-item" href="<?= base_url('utama/Withdraw') ?>">Withdraw</a>
                                <a class="collapse-item" href="<?= base_url('utama/data_withdraw') ?>">Data Withdraw</a>
                                
                            </div>
                        </div>
            

                   

                   
                    

                            </li>

             <hr class="sidebar-divider">
              <?php } ?>

            <!-- Heading -->
            <?php if ($user == true) {?>
            <div class="sidebar-heading">
                Bonus
            </div>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('utama/data_bonus') ?>">
                    <i class="fas fa-money-check-alt"></i>
                    <span> Data Bonus</span></a>

                <a class="nav-link" href="<?= base_url('utama/jaringan') ?>">
                    <i class="fas fa-network-wired"></i>
                     <span> Jaringan</span></a>
            </li>

             <hr class="sidebar-divider">

            <!-- Heading -->
          


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <?php } ?>

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
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

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
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <?php 
                                    $date = date('Y-m-d');
                                    $this->db->where('kode_member', $this->session->kode_member);
                                    $this->db->where('date', $date);
                                    $jm_order = $this->db->get('tbl_order')->num_rows();

                                    $this->db->where('kode_member', $this->session->kode_member);
                                    $this->db->where('date', $date);
                                    $order = $this->db->get('tbl_order')->result_array();
                                 ?>
                                <span class="badge badge-danger badge-counter"><?= $jm_order ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Order Terbaru
                                </h6>

                                <?php foreach ($order as $data) { ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-shopping-bag text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?= $data['data_order'] ?></div>
                                        <span class="font-weight-bold"><?= $data['nama'] ?></span><br><span class="text-primary"><?= $data['status_order'] ?></span>
                                    </div>
                                </a>

                            <?php } ?>

                                
                                <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('utama/data_order') ?>">Show All Order</a>
                            </div>
                        </li>



                         <?php 
                            $date = date('Y-m-d');
                            $this->db->where('kode_member', $this->session->kode_member);
                            $this->db->where('date2', $date);
                            $jm_bonus = $this->db->get('tbl_bonus')->num_rows();

                            $this->db->where('kode_member', $this->session->kode_member);
                            $this->db->where('date2', $date);
                            $bonus = $this->db->get('tbl_bonus')->result_array();
                         ?>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?= $jm_bonus ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Pesan Bonus
                                </h6>

                                <?php foreach ($bonus as $data) { ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?=  "Rp " . number_format($data['bonus'],0,',','.'); ?></div>
                                        <div class="small text-gray-500"><?= $data['date'] ?></div>
                                    </div>
                                </a>

                            <?php } ?>


                                
                                <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('utama/data_bonus') ?>">Show All Bonus</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->username ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/') ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('utama/user') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
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