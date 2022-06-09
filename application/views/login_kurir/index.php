<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login</title>

  <!-- Google Font: Source Sans Pro -->
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets_kurir/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->  
  <link rel="stylesheet" href="<?= base_url() ?>assets_kurir/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets_kurir/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>App </b>Kurir</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
       <center>
      <img src="<?= base_url() ?>assets_kurir/images/logo2.png" alt="" style="height:50px;"/>
      </center>
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= base_url() ?>login_kurir/act_login" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <input type="submit" name="kirim" class="btn btn-block btn-primary" value="Login">
          <!-- /.col -->
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
      
      </div>
      <!-- /.social-auth-links -->

    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets_kurir/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets_kurir/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets_kurir/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url() ?>assets_kurir/alert.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
 <?php echo "<script>".$this->session->flashdata('message')."</script>"?> 
</body>
</html>
