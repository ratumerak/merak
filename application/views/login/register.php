<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Register</title>



    <!-- Custom fonts for this template-->

    <link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link

    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

    rel="stylesheet">



    <!-- Custom styles for this template-->

    <link href="<?= base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">



</head>



<body class="bg-gradient-primary">



    <div class="container">



        <div class="card o-hidden border-0 shadow-lg my-5">

            <div class="card-body p-0">

                <!-- Nested Row within Card Body -->

                <div class="row">

                    <div class="col-lg-5 d-none d-lg-block ">

                        <img src="<?= base_url('assets/img/rm4.png') ?>" style="width: 600px;">

                    </div>

                    <div class="col-lg-7">

                        <div class="p-5">

                            <div class="text-center">

                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>

                            </div>

                            <form class="user" method="post" action="" enctype="multipart/form-data">



                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <input type="text" name="username" class="form-control form-control-user" value="<?php echo set_value('username'); ?>" id="username"

                                        placeholder="Username">

                                        <small class="text-danger"><?php echo form_error('username'); ?></small>

                                    </div>

                                    <div class="col-sm-6">

                                        <input type="number" name="no_telp" value="<?php echo set_value('no_telp'); ?>" class="form-control form-control-user" id="no_telp"

                                        placeholder="No Telp">

                                        <small class="text-danger"><?php echo form_error('no_telp'); ?></small>

                                    </div>

                                </div>



                                <div class="form-group row">



                                    <div class="col-sm-6 mb-3">

                                        <input type="email" class="form-control form-control-user"

                                        placeholder="Email Address" name="email" id="email" value="<?php echo set_value('email'); ?>">

                                        <small class="text-danger"><?php echo form_error('email'); ?></small>

                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <input type="number" name="nik" class="form-control form-control-user"

                                        id="nik" placeholder="NIK" value="<?php echo set_value('nik'); ?>">

                                        <small class="text-danger"><?php echo form_error('nik'); ?></small>

                                    </div>



                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <input type="password" name="pass" class="form-control form-control-user"

                                        placeholder="Password"  id="pass">

                                        <small class="text-danger"><?php echo form_error('pass'); ?></small>

                                    </div>

                                    <div class="col-sm-6">

                                        <input type="password" name="pass2" class="form-control form-control-user"

                                        placeholder="Repeat Password" id="pass2">

                                        <small class="text-danger"><?php echo form_error('pass2'); ?></small>

                                    </div>

                                </div>

                                <!-- <div class="form-group">
                                    <input type="number" name="paket" class="form-control form-control-user"
                                    placeholder="Jumlah Paket" id="jumlah paket" min="1">
                                </div> -->



<!-- <div class="form-group">

<small>Upload gambar ktp anda dengan format png, jpg/jpeg degan ukuran max 2 MB.</small>

<input type="file" class="form-control" name="ktp">

</div>



<div class="form-group">

<label>Pilih Motode Pembayaran</label>

<div class="col-sm-6">

<input type="radio" name="bank" value="BCA"> BCA

</div>

<div class="col-sm-6">

<input type="radio" name="bank" value="MANDIRI"> Mandiri

</div>

<div class="col-sm-6">

<input type="radio" name="bank" value="BNI"> BNI

</div>

<div class="col-sm-6">

<input type="radio" name="bank" value="BRI"> BRI

</div>

</div>

s

<div class="form-group">

<input type="number" name="no_rek" class="form-control form-control-user"

placeholder="Nomor rek">

<small class="text-danger"><?php echo form_error('no_rek'); ?></small>

</div> -->







<!-- <input type="submit" name="kirim" class="btn btn-primary btn-user btn-block" value="Rigerster Account"> -->

<button type="submit" id="register" name="kirim" class="btn btn-primary btn-user btn-block" class=""> Register Account <i class="fas fa-spinner fa-spin" id="load" style="display:  none;"> </i></button>

<!--  <a href="login.html" class="btn btn-primary btn-user btn-block">

Register Account

</a> -->





</form>

<hr>

<!--  <div class="text-center">

<a class="small" href="forgot-password.html">Forgot Password?</a>

</div>

<div class="text-center">

<a class="small" href="login.html">Already have an account? Login!</a>

</div> -->

</div>

</div>

</div>

</div>

</div>



</div>



<!-- Bootstrap core JavaScript-->

<script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



<!-- Core plugin JavaScript-->

<script src="<?= base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>



<!-- Custom scripts for all pages-->

<script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>





<script>

    $(document).ready(function(){

        $("#register").click(function(){

            var username = $("#username").val();

            var no_telp = $("#no_telp").val();

            var email = $("#email").val();

            var nik = $("#nik").val();

            var pass = $("#pass").val();

            var pass2 = $("pass2").val();



            if (username != null || no_telp != null || email != null || nik != null 

                || pass != null || pass2 != null) {



                $("#load").show();

        }

    })

    })

</script>



</body>



</html>