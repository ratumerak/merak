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

<script type="text/javascript">
    $(document).ready(function() {
       
       $("#autoKlik").trigger('click');
    })
</script>
<?php   } ?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Produk Member</h6>
              </div>
            </div>
             
            <div class="card-body px-0 pb-2">
              <div class="container" id="app">
                <div class="alert alert-danger" role="alert" style="color: white;">
                Hello  <b><?= $this->session->username ?></b>, silahkan melakukan pembayaran sesuai nominal yang yang ditentukan.
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Akun member</h5>
                        <div class="form-group">
                          <label>Username</label><br>
                          <input type="text" readonly="" class="form-control" name="" value="<?= $user['username'] ?>">
                        </div>
                        <div class="form-group">
                          <label>Email</label><br>
                          <input type="text" readonly="" class="form-control" name="" value="<?= $user['email'] ?>">
                        </div>
                        <div class="form-group">
                          <label>Nik</label><br>
                          <input type="text" readonly="" class="form-control" name="" value="<?= $user['nik'] ?>">
                        </div>
                         <div class="form-group">
                          <label>No Telp</label><br>
                          <input type="text" readonly="" class="form-control" name="" value="<?= $user['no_telp'] ?>">
                        </div>

                        <!--<div class="form-group">-->
                        <!--  <label>Bank</label><br>-->
                        <!--  <input type="text" readonly="" class="form-control" name="" value="<?= $profil['name_bank'] ?>">-->
                        <!--</div>-->
                    </div>
                  </div>
                </div>
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Produk</h5>

                         <div class="form-group">
                            <label>Produk</label><br>
                            <input type="text" readonly="" class="form-control" name="produk" value="ratumerak">
                         </div>

                          <div class="form-group">
                            <label>Jumlah Paket</label><br>
                            <input type="number"  class="form-control" name="" min="0" required="" readonly="" v-model="paket" name="jumlah_paket">
                            <small>Tentukan jumlah paket yang ingin anda beli, 1 paket sama dengan 10 qty </small>
                         </div>

                         <div class="form-group">
                            <label>Qty</label><br>
                            <input type="number" readonly=""  class="form-control" name="qty" v-model="stok()"  min="0" required="">
                         </div>


                         <div class="form-group">
                            <label>Harga</label><br>
                            <input type="text" readonly="" class="form-control" readonly="" name="harga" v-model="jmlharga()">
                         </div>
                         
                         <?php if ($pay == true) { ?>

                          <div class="form-group">
                            <label>Status Pembayaran</label><br>
                            <?php if ($pay['status'] == 200) {?>
                                <label class="badge badge-success">Success</label>
                            <?php }else{ ?>
                                 <label class="badge badge-danger">Panding</label>
                            <?php } ?>
                          </div>

                           <a href="<?= $pay['pdf_url'] ?>" target="_blank" class="btn btn-primary btn btn-block">Download Transaksi</a>

                            <?php }else{ ?>
                          <?php 
                            $harga = $user['jumlah_paket'] * 1250000;
                            ?>

                          <form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
                            <input type="hidden" name="result_type" id="result-type" value="">
                            <input type="hidden" name="result_data" id="result-data" value="">
                            <input type="hidden" name="nama" id="nama" value="<?= $this->session->username ?>">
                             <input type="hidden" name="email" id="email" value="<?= $this->session->email ?>">
                            <input type="hidden" name="kode_member" id="kode_member" value="<?= $this->session->kode_member ?>">
                            <input type="hidden" name="nama_produk" id="nama_produk" value="ratumerak">
                            <input type="hidden" name="harga" id="harga" value="<?= $harga ?>">
                        </form>
                        
                        <?php if ($profil == false) { ?>
                           <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">
                            Pay!
                          </button>
                        
                       <?php }else{ ?>
                        <button id="pay-button" class="btn btn-primary btn btn-block">Pay!</button>
                        <?php } ?>
                        <?php } ?>
            
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>





<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    $('#myModal').modal('show')
</script>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script>
  var app = new Vue({
    el: '#app',
    data: {
    
      paket : "<?= $user['jumlah_paket'] ?>",
      qty : 10,
      harga : 1250000,
    },

    methods : {

      stok : function(){

        return Number(this.paket) * Number(this.qty);
      },

      jmlharga : function(){
        return Number (this.paket) * Number(this.harga);
      },
  
     
    }
  })
</script>

<script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");

      var nama  = $("#nama").val();
      var email = $("#email").val();
      var kode_member = $("#email").val();
      var nama_produk = $("#nama_produk").val();
      var harga = $("#harga").val();
    
    $.ajax({
      type : 'POST',
      url: '<?=site_url()?>/snap/token',
      data : {
        nama : nama,
        email : email,
        kode_member : kode_member,
        harga : harga,
        nama_produk : nama_produk,

      },
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>



