 <div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-money-check"></i> Withdraw</h6>
        </div>
        <div class="card-body">
            <div class="row">

              <!-- <div class="alert alert-primary" role="alert">
              <h4 class="alert-heading">Well done!</h4>
              <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
              <hr>
              <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
 -->
            <?php echo $this->session->flashdata('message1') ?>
                
              
            </div>

            <div class="row">
              <div class="col-sm-8">
                 <div class="form-group">
                 <label for="exampleInputEmail1">Bonus Anda</label>
                    <input type="text" name="tempat_lahir" class="form-control"  required="" value="<?= $total['bonus'] ?>" readonly>
              </div>
              <hr>

              <div class="form-group">
                 <label for="exampleInputEmail1">Username</label>
                    <p><?= $user['nama'] ?></p>
              </div>
              <hr>

               <div class="form-group">
                 <label for="exampleInputEmail1">Bank</label>
                    <p><?= $user['name_bank'] ?></p>
              </div>
              <hr>

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
                   <input type="number" name="nomor_rek" id="nomor_rek" class="form-control"  required="">

                  <div class="alert alert-success mt-2" role="alert" id="true" style="display: none">
                        Nomor Rekening yang anda masukan benar.
                  </div>

                   <div class="alert alert-danger mt-2" role="alert" id="false" style="display: none">
                        Nomor Rekening yang anda masukan salah.
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"> Lupa Rekening ? </a>, 
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenterUbah"> Ubah Rekening ? </a>
                    </div>

              </div>
              <hr>

              <div class="form-group">
                 <label for="exampleInputEmail1">Jumlah Penarikan</label>
                   <input type="number" name="penarikan" class="form-control" min="50000" required="" max="<?= $total['bonus'] ?> ?>">
              </div>
              <hr>


              <div class="form-group">
                 
                   <input type="submit" name="kirim" class="btn btn-primary" id="btn" value="Withdraw">
              </div>

              </form>
              
              </div>
            </div>



        
        </div>
    </div>

</div>


  <!-- Modal lupa rekening -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
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
      <div class="modal-dialog modal-dialog-centered" role="document">
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

  <!-- end -->


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

