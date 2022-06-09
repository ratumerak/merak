<?php  if ($profil == false) { ?>

  <button type="button" id="autoKlik" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="display: none">
    Launch demo modal
  </button>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><b>Isi Profil Anda</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?= base_url('utama/profil') ?>" enctype="multipart/form-data">
          <div class="form-group">
           <label for="exampleInputEmail1">Nama Lengkap</label>
           <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="">
         </div>

         <div class="form-group">
           <label for="exampleInputEmail1">Jenis Kelamin</label>
           <select class="form-control" name="jk">
            <option>Laki - Laki</option>
            <option>Perempuan</option>
          </select>
        </div>
        <div class="form-group">
         <label for="exampleInputEmail1">Tempat Lahir</label>
         <input type="text" name="tempat_lahir" class="form-control"  required="">
       </div>

       <div class="form-group">
         <label for="exampleInputEmail1">Tgl Lahir</label>
         <input type="date" class="form-control" required="" name="tgl_lahir">
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1">Alamat Lengkap</label>
         <textarea class="form-control" name="alamat"></textarea>
       </div>

       <div class="form-group">
         <label for="exampleInputEmail1">Nama bank</label>
         <input type="text" class="form-control" required="" name="name_bank">
         <small>Masukan nama bank anda</small>
       </div> 

       <div class="form-group">
         <label for="exampleInputEmail1">No Rek</label>
         <input type="number" class="form-control" required="" name="no_rek">
         <small>Masukan nomor rekening anda yang masih berlaku</small>
       </div> 

       <div class="form-group">
         <label for="exampleInputEmail1">Foto Buku Rek</label>
         <input type="file" class="form-control" required="" name="gambar_rek">
         <small>Masukan foto buku nomo rekening anda</small>
       </div>

       <div class="form-group">
         <label for="exampleInputEmail1">NIK</label>
         <input type="number" class="form-control" required="" name="nik">
         <small>Masukan nomor nik anda</small>
       </div>  

       <div class="form-group">
         <label for="exampleInputEmail1">Foto KTP</label>
         <input type="file" class="form-control" required="" name="gambar_ktp">
         <small>Masukan gambar ktp anda sesuai nik yang dimasukan</small>
       </div>    

     </div>
     <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save changes</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
  </div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">

  $(document).ready(function() {

   $("#autoKlik").trigger('click');
 })
</script>
<?php   } ?>

<div class="main-panel" >

  <div class="content-wrapper">

    <div class="row"> 

      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <h4 class="card-title">Withdraw Bonus Afiliasi</h4>

            <?php  if ($profil == false) { ?>

              <div class="alert alert-success" role="alert">
                Mohon Maaf anda belum dapat melakukan withdraw, silahkan isi <a href="#"  data-toggle="modal" data-target="#myModal">profil</a> anda terlebih dahulu untuk dapat melakuan withdraw.
              </div>

            <?php }else{ ?>

             <?php if ($total == false) { ?>

              <div class="alert alert-info" role="alert">
                Untuk saat ini Bonus anda <strong>"0"</strong>. Anda tidak dapat melakukan withdraw. 
              </div>
            <?php }else{ ?>


             <img class="d-block w-100 mb-3" src="<?= base_url('assets_baru/images/ratumar3.png') ?>" alt="Second slide" style="border-radius: 10px;">

             <div class="alert alert-warning alert-dismissible fade show" role="alert">
              Withdraw dapat dilakukan sekali dalam satu hari, withdraw dapat dilakukan jika jumlah penarikan yang dimasukan tidak melebihi bonus anda.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="container" id="app">

              <div class="row">



                <div class="col-sm-8">

                 <div class="form-group">

                   <label for="exampleInputEmail1">Bonus Anda</label>

                   <input type="text" name="tempat_lahir" class="form-control"  required="" value="<?= "Rp " . number_format($total['total_bonus'],0,',','.'); ?>" readonly>

                 </div>





                 <div class="form-group">

                   <label for="exampleInputEmail1">Username</label>

                   <input type="text" name="tempat_lahir" class="form-control"  required="" value="<?= $user['nama'] ?>" readonly>

                 </div>





                 <div class="form-group">

                   <label for="exampleInputEmail1">Bank</label>

                   <input type="text" name="tempat_lahir" class="form-control"  required="" value="<?= $user['name_bank'] ?>" readonly>

                 </div>

                 



               <!-- <div class="form-group">

                 <label for="exampleInputEmail1">No Rek</label>

                   <p><?= $user['no_rek'] ?></p>

                 </div> -->

               </div>

               <div class="col-sm-4">

                <form method="post" action="">

                  <input type="hidden" name="kode_member" id="kode_member" value="<?= $this->session->kode_member ?>">



                  <div class="form-group">

                   <label for="exampleInputEmail1">Nomor Rekening Bank Anda</label>

                   <input type="number" name="nomor_rek" id="nomor_rek" class="form-control" required="">
                   <small class="text-danger" id="alertrek" style="display: none;">Form tidak boleh kosong</small>



                   <div class="alert alert-success mt-2" role="alert" id="true" style="display: none">

                    Nomor Rekening yang anda masukan benar.

                  </div>



                  <div class="alert alert-danger mt-2" role="alert" id="false" style="display: none">

                    <label style="">Nomor Rekening yang anda masukan salah.</label>

                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter"> Lupa Rekening ? </a>, 

                    <a href="#" data-toggle="modal" data-target="#exampleModalCenterUbah"> Ubah Rekening ? </a>

                  </div>

                </div>

                



                <div class="form-group">

                 <label for="exampleInputEmail1">Jumlah Penarikan</label>

                 <input type="number" name="penarikan" id="penarikan" required="" class="form-control" min="50000" max="<?= $total['total_bonus'] ?> ?>">
                 <small class="text-danger" id="alertpen2" style="display: none;">Form tidak boleh kosong</small>

               </div>

               





               <div class="form-group">



                 <input type="submit" name="kirim" class="btn btn-primary btn-block" id="btn" value="Withdraw">

                 <!-- Button trigger modal -->
                 <!--  data-target="#exampleModal2" -->
                 <!-- data-target="#exampleModal2" -->
                 



               </form>



             </div>

           </div>





         </div>

       </div>

     </div>





   </div>

 </div>







 <!-- Modal lupa rekening -->

 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Lupa Rekening Anda</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <form method="post" action="ebunga/cek_email">

          <div id="alert"></div>

          <input type="hidden" name="id" value="0" id="rule">

          <input type="hidden" name="kode_member" value="<?= $this->session->kode_member ?>" id="kode_member2">

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



<!-- end -->





<!-- Modal  ubah rekening -->

<div class="modal fade" id="exampleModalCenterUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Rekening Anda</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <form method="post" action="ebunga/cek_email">

          <div id="alert3"></div>

          <input type="hidden" name="id" value="0" id="rule">

          <input type="hidden" name="kode_member" value="<?= $this->session->kode_member ?>" id="kode_member3">

          <input type="email" id="email3" name="email" class="form-control" placeholder="Masukan akun email anda" required="">

        </form>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary load2" id="cekEmail2">Kirim Email</button>

      </div>

    </div>

  </div>

</div>

<?php } ?>
<?php } ?>



<!-- end -->



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

<script>
  var app = new Vue({
    el: '#app',
    data: {
      message: 'Hello Vue!',

    }
  })
</script>

<script>
  $(document).ready(function(){
    $(".cekform").click(function(){

      var penarikan = $("#penarikan").val();
      if (penarikan == null) {
        $("#alertpen2").show();
      }else{
        $("#alertpen2").hide();
      }

    })
  })
</script>



<script>

  $(document).ready(function(){




    $("#nomor_rek").blur(function(){

      $("#pesan").html('<i class="fa fa-spinner fa-spin mt-2" style="font-size:24px"></i> Proses cek nomo rekening anda');

      var nomor_rek = $(this).val();

      var kode_member = $("#kode_member").val();



      $.ajax({



        type : 'POST',

        url : "<?= base_url('utama/cek_rekening') ?>",

        data : {



          nomor_rek : nomor_rek,

          kode_member : kode_member,

        },

        cache : false,

        success : function(data){



          if (data == 'true') {

            $("#true").show();

            $("#false").hide();

            $('#btn').removeAttr('disabled');
            $(".cekform").addAttr("data-target", "#exampleModal2");

          }else{



           $("#true").hide();

           $("#false").show();



           $('#btn').prop('disabled', true);



         }





       }

     })



    })



    $("#cekEmail").click(function(){  



      $(".load").html('<i class="fas fa-spinner fa-spin"> </i> Kirim Email');

      var rule = $("#rule").val();

      var email = $("#email").val();

      var kode_member2 = $("#kode_member2").val();



      $.ajax({



        type : 'POST',

        url : "<?= base_url('utama/cek_email') ?>",

        data : {



          rule : rule,

          email : email,

          kode_member2 : kode_member2,

        },



        cache : false,

        success : function(data){



          $("#alert").html(data);

          $(".load").html('Kirim Email')







        }
      })

    })



    $("#cekEmail2").click(function(){  



      var email3 = $("#email3").val();

      var kode_member3 = $("#kode_member3").val();

      $(".load2").html('<i class="fas fa-spinner fa-spin"> </i> Kirim Email');



      $.ajax({



        type : 'POST',

        url : "<?= base_url('utama/cek_email2') ?>",

        data : {



          email3 : email3,

          kode_member3 : kode_member3,

        },



        cache : false,

        success : function(data){



          $("#alert3").html(data);

          $(".load2").html('Kirim Email');





        }

      })

    })





  })

</script>

