<!DOCTYPE html>

<html lang="en">



<head>



  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">

  <meta name="author" content="">



  <title>Login</title>



  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link

  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

  rel="stylesheet">



  <!-- Custom styles for this template-->

  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">



</head>



<body class="bg-gradient-primary">



  <div class="container">



    <!-- Outer Row -->

    <div class="row justify-content-center">



      <div class="col-xl-10 col-lg-12 col-md-9">



        <div class="card o-hidden border-0 shadow-lg my-5">

          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->

            <div class="row">

              <div class="col-lg-6 d-none d-lg-block">

                <img src="<?= base_url('assets/img/rm4.png') ?>" style="width: 600px;">

              </div>

              <div class="col-lg-6">

                <div class="p-5">

                  <div class="text-center">

                    <h1 class="h4 text-gray-900 mb-4"><strong>Welcome Back PT.Sinar Aneka Niaga</strong></h1>

                  </div>

                  <?php echo $this->session->flashdata('alert'); ?>

                  <form class="user" method="post" action="<?= base_url('login/act_login') ?>">

                    <div class="form-group">

                      <input type="email" class="form-control form-control-user"

                      id="exampleInputEmail" aria-describedby="emailHelp"

                      placeholder="Enter Email Address..." name="email">

                    </div>

                    <div class="form-group">

                      <input type="password" class="form-control form-control-user"

                      id="exampleInputPassword" placeholder="Password" name="pass">

                    </div>

                    <div class="form-group">

                      <div class="custom-control custom-checkbox small">

                        <input type="checkbox" class="custom-control-input" id="customCheck">

                        <label class="custom-control-label" for="customCheck">Remember

                        Me</label>

                      </div>

                    </div>



                    <button class="btn btn-primary btn-user btn-block">Login</button>





                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">

                                            <i class="fab fa-google fa-fw"></i> Login with Google

                                        </a>

                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">

                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook

                                          </a> -->
                                          <br>
                                          <center>
                                           <a class="mt-5" href="#" data-toggle="modal" data-target="#exampleModalCenter"> Lupa Password ? </a>
                                         </center>

                                       </form>

                                       <hr>

                                       <div class="text-center">

                                        <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->

                                      </div>

                                      <div class="text-center mt-5">



                                        Copyright ©2022 All rights reserved

                                        PT.Sinar Aneka Niaga

                                        <!-- <a class="small" href="register.html">Create an Account!</a> -->

                                      </div>

                                    </div>

                                  </div>

                                </div>

                              </div>

                            </div>



                          </div>



                        </div>



                      </div>

                      <!-- Modal lupa pass -->
                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Lupa Password</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="verifikasi/cek_email">
                                <div id="alert"></div>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Masukan akun email anda" required="">
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary load" id="cekEmail"> Kirim Email</button>
                            </div>
                          </div>
                        </div>
                      </div>



                      <!-- Bootstrap core JavaScript-->
                      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                      <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>

                      <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



                      <!-- Core plugin JavaScript-->

                      <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>



                      <!-- Custom scripts for all pages-->

                      <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

                      <script src="<?php echo base_url() ?>assets/alert.js"></script>

                      <?php echo "<script>".$this->session->flashdata('login')."</script>"?>
                      <?php $this->session->unset_userdata('login') ?>


                      <script>
                       $("#cekEmail").click(function(){  

                        $(".load").html('<i class="fas fa-spinner fa-spin"> </i> Kirim Email');

                        var email = $("#email").val();
                        $.ajax({

                          type : 'POST',
                          url : "<?= base_url('Login/cek_email') ?>",
                          data : {
                            email : email,
                          },

                          cache : false,
                          success : function(data){

                            $("#alert").html(data);
                            $(".load").html('Kirim Email')



                          }
                        })
                      })

                    </script>



                  </body>



                  </html>