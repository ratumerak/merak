<!DOCTYPE html>

<html lang="en">



<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Afiliasi</title>

  <!-- plugins:css -->

  <link rel="stylesheet" href="<?= base_url('assets_baru/') ?>vendors/feather/feather.css">

  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">

  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">

  <!-- endinject -->

  <!-- Plugin css for this page -->

  <link rel="stylesheet" href="<?= base_url('assets_baru/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">

  <link rel="stylesheet" href="<?= base_url('assets_baru/') ?>vendors/ti-icons/css/themify-icons.css">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets_baru/') ?>js/select.dataTables.min.css">

  <!-- End plugin css for this page -->

  <!-- inject:css -->

  <link rel="stylesheet" href="<?= base_url('assets_baru/') ?>css/vertical-layout-light/style.css">

  <!-- endinject -->


  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <script type="text/javascript"

  src="https://app.sandbox.midtrans.com/snap/snap.js"

  data-client-key="SB-Mid-client-jGI8CtdIXSI5TgRA"></script>





  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 

  <link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet" >

  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>

<body>

  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

        <a class="navbar-brand brand-logo mr-5" href="<?= base_url("utama/") ?>">Ratumerak</a>

        <a class="navbar-brand brand-logo-mini" href=""><img src="https://ratumerak.id/assets/img/logo3.png" alt="logo"/></a>

      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

          <span class="icon-menu"></span>

        </button>

        <ul class="navbar-nav mr-lg-2">

          <li class="nav-item nav-search d-none d-lg-block">

            <div class="input-group">

              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">

                <span class="input-group-text" id="search">

                  <i class="icon-search"></i>

                </span>

              </div>

              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">

            </div>

          </li>

        </ul>



        <?php 

        $date = date('Y-m-d');

        $this->db->where('kode_member', $this->session->kode_member);

        $this->db->where('date', $date);

        $jm_order = $this->db->get('tbl_order')->num_rows();


        $this->db->where('kode_member', $this->session->kode_member);

        $this->db->where('date', $date);

        $order = $this->db->get('tbl_order')->result_array();

        ?>





        <?php 

        $date = date('Y-m-d');

        $this->db->where('kode_member', $this->session->kode_member);

        $this->db->where('date2', $date);

        $jm_bonus = $this->db->get('tbl_bonus')->num_rows();


        $this->db->order_by('id','desc');
        $this->db->where('kode_member', $this->session->kode_member);

        $this->db->where('date2', $date);

        $bonus = $this->db->get('tbl_bonus')->result_array();

        ?>

        <ul class="navbar-nav navbar-nav-right">



          <li class="nav-item dropdown">

           <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">

            <i class="fas fa-bell mx-0"></i>
            <?php if ($bonus == true) { ?>
              <span class="count"></span>
            <?php }else{} ?>


          </a>

          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">

            <p class="ml-2">Notifications Bonus</p>

            <hr>



            <?php foreach ($bonus as $data) { ?>



              <div class="preview-item-content ml-2">
                <a href="<?= base_url('utama/data_bonus') ?>">
                  <span class="badge badge-success badge-counter"><?=  "Rp " . number_format($data['bonus'],0,',','.'); ?></span><br></a>

                  <small><?= $data['date'] ?></small>

                </div>

                <hr>



              <?php } ?>



            </div>

          </li>





          <li class="nav-item dropdown">

            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">

              <i class="fas fa-cart-plus mx-0"></i>

              <?php if ($order == true) { ?>
                <span class="count"></span>
              <?php }else{} ?>

            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">

              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications Order</p>





              <?php foreach ($order as $data) { ?>

                <a class="dropdown-item preview-item" href="<?= base_url('utama/data_order') ?>">

                  <div class="preview-thumbnail">

                    <div class="preview-icon bg-success">

                      <i class="ti-info-alt mx-0"></i>

                    </div>

                  </div>

                  <div class="preview-item-content">

                    <h6 class="preview-subject font-weight-normal"><?= $data['nama'] ?></h6>

                    <p><?= $data['produk'] ?> / <?= $data['qty'] ?></p>

                    <p class="font-weight-light small-text mb-0 text-muted">

                      <span class="text-primary"><?= $data['data_order'] ?></span>

                    </p>

                  </div>

                </a>

                <hr>

              <?php } ?>

<!-- <a class="dropdown-item preview-item">

<div class="preview-thumbnail">

<div class="preview-icon bg-warning">

<i class="ti-settings mx-0"></i>

</div>

</div>

<div class="preview-item-content">

<h6 class="preview-subject font-weight-normal">Settings</h6>

<p class="font-weight-light small-text mb-0 text-muted">

Private message

</p>

</div>

</a> -->

<!-- <a class="dropdown-item preview-item">

<div class="preview-thumbnail">

<div class="preview-icon bg-info">

<i class="ti-user mx-0"></i>

</div>

</div>

<div class="preview-item-content">

<h6 class="preview-subject font-weight-normal">New user registration</h6>

<p class="font-weight-light small-text mb-0 text-muted">

2 days ago

</p>

</div>

</a> -->

</div>

</li>

<li class="nav-item nav-profile dropdown">

  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
    <?php 
    $profil = $this->db->get_where('tbl_profil',['kode_member' => $this->session->kode_member])->row_array();
    if ($profil == false) {
     ?>
     <img src="<?= base_url('assets_baru/') ?>images/profil_baru.jpg" alt="profile"/>
   <?php }elseif ($profil['gambar_user'] == null) { ?>
     <img src="<?= base_url('assets_baru/') ?>images/profil_baru.jpg" alt="profile"/>
   <?php }else{ ?>
     <img src="<?= base_url('assets/profil') ?>/<?= $profil['gambar_user'] ?>" alt="profile"/>
   <?php } ?>

 </a>

 <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

  <a class="dropdown-item" href="<?= base_url('utama/user') ?>">

    <i class="ti-user text-primary"></i>

    Profil

  </a>

  <a class="dropdown-item" href="<?= base_url('login/logout') ?>">

    <i class="ti-power-off text-primary"></i>

    Logout

  </a>

</div>

</li>

<!-- <li class="nav-item nav-settings d-none d-lg-flex">

<a class="nav-link" href="#">

<i class="icon-ellipsis"></i>

</a>

</li> -->

</ul>

<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

  <span class="icon-menu"></span>

</button>

</div>

</nav>

<!-- partial -->

<div class="container-fluid page-body-wrapper">

  <!-- partial:partials/_settings-panel.html -->

  <div class="theme-setting-wrapper">

    <div id="settings-trigger"><i class="ti-settings"></i></div>

    <div id="theme-settings" class="settings-panel">


      <p class="settings-heading">SIDEBAR SKINS</p>

      <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>

      <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>

      <p class="settings-heading mt-2">HEADER SKINS</p>

      <div class="color-tiles mx-0 px-4">

        <div class="tiles success"></div>

        <div class="tiles warning"></div>

        <div class="tiles danger"></div>

        <div class="tiles info"></div>

        <div class="tiles dark"></div>

        <div class="tiles default"></div>

      </div>

    </div>

  </div>



  <!-- partial -->

  <!-- partial:partials/_sidebar.html -->

  <nav class="sidebar sidebar-offcanvas" id="sidebar">

    <ul class="nav">

      <li class="nav-item">

        <a class="nav-link" href="<?= base_url('utama/') ?>">

          <i class="icon-grid menu-icon"></i>

          <span class="menu-title">Dashboard</span>

        </a>

      </li>









<!--  <li class="nav-item">

<a class="nav-link" href="<?= base_url('utama/pay') ?>">

<i class="icon-paper menu-icon"></i>

<span class="menu-title">Pay</span>

</a>

</li> -->

<li class="nav-item">

  <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">

    <i class="icon-bar-graph menu-icon"></i>

    <span class="menu-title">Topup</span>

    <i class="menu-arrow"></i>

  </a>

  <div class="collapse" id="charts">

    <ul class="nav flex-column sub-menu">

      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/topupproduk') ?>">Topup Produk</a></li>

      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/data-topupproduk') ?>">Data Topup Produk</a></li>

    </ul>

  </div> 

</li>

<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
    <i class="icon-open menu-icon"></i>
    <span class="menu-title" style="font-size: 12px;">Withdraw Bonus Afiliasi</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="tables">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/withdraw') ?>">Withdraw</a></li>
      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/data-withdraw') ?>">Data Withdraw</a></li>
    </ul>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#tablesid" aria-expanded="false" aria-controls="tables">
    <i class="icon-minimize menu-icon"></i>
    <span class="menu-title" style="font-size: 12px;">Withdraw Bonus Cashback</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="tablesid">
    <ul class="nav flex-column sub-menu" style="font-size: 5px;">
      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/Withdraw-cashback-ratumerak') ?>" style="font-size: 11px;">Withdraw  Ratumerak</a></li>
      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/Withdraw-cashback-markisa') ?>"  style="font-size: 11px;">Withdraw  Markisa</a></li>
      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/data-Withdraw-cashback-ratumerak') ?>"  style="font-size: 11px;">Data Withdraw  Ratumerak </a></li>
      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/data-Withdraw-cashback-markisa') ?>"  style="font-size: 11px;">Data Withdraw  Markisa </a></li>
    </ul>
  </div>
</li>



      <!-- <li class="nav-item">

        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">

          <i class="icon-layout menu-icon"></i>

          <span class="menu-title">Order</span>

          <i class="menu-arrow"></i>

        </a>

        <div class="collapse" id="ui-basic">

          <ul class="nav flex-column sub-menu">

            <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/order') ?>">Order Produk</a></li>

            <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/data_order') ?>">Data Order</a></li>



          </ul>

        </div>

      </li> -->

      <li class="nav-item">

        <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="form-elements">

          <i class="icon-heart menu-icon"></i>

          <span class="menu-title">Order</span>

          <i class="menu-arrow"></i>

        </a>

        <div class="collapse" id="order">

          <ul class="nav flex-column sub-menu">

           <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/order-produk') ?>">Order Produk</a></li>

           <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/data-order-produk') ?>">Data Order</a></li>

         </ul>

       </div>

     </li>

     <li class="nav-item">

      <a class="nav-link" data-toggle="collapse" href="#merak-menu" aria-expanded="false" aria-controls="form-elements">

        <i class="icon-stack menu-icon"></i>

        <span class="menu-title">Produk Ratumerak</span>

        <i class="menu-arrow"></i>

      </a>

      <div class="collapse" id="merak-menu">

        <ul class="nav flex-column sub-menu">

          <li class="nav-item"><a class="nav-link" href="<?= base_url('utama/data-topup-merak') ?>">Data Topup</a></li>

          <li class="nav-item"><a class="nav-link" href="<?= base_url('utama/data-order-ratumerak') ?>">Data Order</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('utama/data-cashback-ratumerak') ?>">Data Cashback</a></li>


        </ul>

      </div>

    </li>

    <li class="nav-item">

      <a class="nav-link" data-toggle="collapse" href="#markisa-menu" aria-expanded="false" aria-controls="form-elements">

        <i class="icon-paper-stack menu-icon"></i>

        <span class="menu-title">Produk Markisa</span>

        <i class="menu-arrow"></i>

      </a>

      <div class="collapse" id="markisa-menu">

        <ul class="nav flex-column sub-menu">

          <li class="nav-item"><a class="nav-link" href="<?= base_url('utama/data-topup-markisa') ?>">Data Topup</a></li>

          <li class="nav-item"><a class="nav-link" href="<?= base_url('utama/data-order-markisa2') ?>">Data Order</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('utama/data-cashback-markisa') ?>">Data Cashback</a></li>

        </ul>

      </div>

    </li>



<!-- <li class="nav-item">

  <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">

    <i class="icon-columns menu-icon"></i>

    <span class="menu-title">Produk Markisa</span>

    <i class="menu-arrow"></i>

  </a>

  <div class="collapse" id="form-elements">

    <ul class="nav flex-column sub-menu">

      <li class="nav-item"><a class="nav-link" href="<?= base_url('utama/produk_markisa') ?>">Order Markisa</a></li>

      <li class="nav-item"><a class="nav-link" href="<?= base_url('utama/data_order_markisa') ?>">Data Order Markisa</a></li>

    </ul>

  </div>

</li> -->


<!-- <li class="nav-item">

  <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">

    <i class="icon-grid-2 menu-icon"></i>

    <span class="menu-title">Withdraw</span>

    <i class="menu-arrow"></i>

  </a>

  <div class="collapse" id="tables">

    <ul class="nav flex-column sub-menu">

      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/Withdraw') ?>">Withdraw Bonus</a></li>

      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/data_withdraw') ?>">Data Withdraw</a></li>

    </ul>

  </div>

</li> -->

<li class="nav-item">

  <a class="nav-link" href="<?= base_url('utama/data-bonus') ?>">

    <i class="icon-paper menu-icon"></i>

    <span class="menu-title">Data Bonus</span>

  </a>

</li>



<li class="nav-item">

  <a class="nav-link" href="<?= base_url('utama/data-member') ?>">

    <i class="icon-head menu-icon"></i>

    <span class="menu-title">Data Member</span>

  </a>

</li>

<li class="nav-item">

  <a class="nav-link" href="<?= base_url('utama/jaringan') ?>">

    <i class="icon-shuffle menu-icon"></i>

    <span class="menu-title">Data Refferal</span>

  </a>

</li>

<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#seting" aria-expanded="false" aria-controls="tables">
    <i class="icon-cog menu-icon"></i>
    <span class="menu-title">Seting</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="seting">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/ubah-password') ?>">Ubah Password</a></li>
      <li class="nav-item"> <a class="nav-link" href="<?= base_url('utama/ubah-rekening_anda') ?>">Ubah Rekening  </a></li>
    </ul>
  </div>
</li>






</ul>

</nav>