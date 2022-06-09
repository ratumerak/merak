<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aktivasi</title>

    <!-- Custom fonts for this template-->
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

            <div class="col-xl-10 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                         <div class="col-lg-6 d-none d-lg-block">
                            <img src="<?= base_url('assets/img/account.png') ?>" style="width: 600px;">
                        </div>

                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h5 class="text-primary mb-3"><strong>Aktivasi Account</strong></h5>
                                </div>
                                <form class="user" method="post" action="">
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user text-center" placeholder="Kode Aktivasi" name="kode" maxlength="6" minlength="5">
                                    </div>

                                    <small>Untuk dapat menggunakan akun anda mohon untuk memasukan kode aktivasi anda yang telah dikirim melalui nomor whatsapp anda. </small>
                                    
                                    <div class="form-group">


                                    </div>

                                    <button class="btn btn-primary btn-user btn-block">Aktivasi</button><br>
                                    <center>
                                        <small class="text-center"><a href="<?= base_url('login/kirim_aktivasi/') ?><?= $this->session->kode_member ?>">Kirim ulang kode aktivasi</a></small>
                                    </center>





                                </form>



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
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url() ?>assets/alert.js"></script>
<?php echo "<script>".$this->session->flashdata('message')."</script>"?>

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