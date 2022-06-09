
<?php if ($profil == false) {
?> 
<div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
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

<?php  } ?>

            <div class="container-fluid">

                   <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pay</h6>

                           
                        </div>
                        <div class="card-body">

                            <?php 

                            if($cek_bukti == true){ ?>
                                     <div class="alert alert-success" role="alert">
                                        Hello  <b><?= $this->session->username ?></b>, Bukti anda sudah dikirim, mohon untuk menunggu verifikasi dari admin.
                                    </div>

                                <?php }else{ ?>

                             <div class="alert alert-danger" role="alert">
                                Hello  <b><?= $this->session->username ?></b>, silahkan melakukan pembayaran dengan akun bank yang sudah anda pilih sesuai nominal yang yang ditentukan.
                            </div>

                        <?php } ?>


                            <div class="row">
                                <div class="col-sm-6">
                                   <div class="row">
                                        <div class="col-sm-6">
                                            <label>Nama :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><?= $user['username'] ?></p>
                                            <hr>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>NIK :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><?= $user['nik'] ?></p>
                                            <hr>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>BANK Anda:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php if ($profil == false) {
                                                echo "kosong";
                                            }else{ ?>
                                            <p><?= $profil['name_bank'] ?></p>
                                            <?php } ?>
                                            <hr>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Nomor Rek Anda:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php if ($profil == false) {
                                                echo "kosong";
                                            }else{ ?>
                                            <p><?= $profil['no_rek'] ?></p>
                                             <?php } ?>
                                            <hr>
                                        </div>

					 <div class="col-sm-6">
                                            <label>Jumlah Paket :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><?= $user['jumlah_paket'] ?></p>
                                            <hr>
                                        </div>

                                       
                                         <div class="col-sm-6">
                                            <label>Jumlah Stock :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><?= $user['jumlah_paket'] * 10 ?></p>                                          
  <hr>
                                        </div>

                                         <div class="col-sm-6">
                                            <label>Total Pembayaran :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><b>Rp <?= $user['jumlah_paket'] * 1250000 ?> </b></p>                                            <hr>
                                        </div>


                                    </div>

                                </div>
                                 <div class="col-sm-6">


                                    <div class="row">
                                        <?php if ($pay == true) { ?>
                                        <div class="col-sm-6">
                                            <label>Order id :</label>
                                        </div>
                                         <div class="col-sm-6">
                                            <p><b><?= $pay['order_id'] ?></b></p>
                                            <hr>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Porduk :</label>
                                        </div>
                                         <div class="col-sm-6">
                                            <p><b><?= $pay['produk'] ?></b></p>
                                            <hr>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Harga :</label>
                                        </div>
                                         <div class="col-sm-6">
                                            <p><b><?= $pay['harga'] ?></b></p>
                                            <hr>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Status Pembayaran :</label>
                                        </div>
                                         <div class="col-sm-6">
                                            <?php if ($pay['status'] == 200) {?>
                                            <p class="text-success">Success</p>
                                        <?php }else{ ?>
                                             <p class="text-warning">Panding</p>
                                            <?php } ?>
                                            <hr>
                                        </div>
                                         <a href="<?= $pay['pdf_url'] ?>" target="_blank" class="btn btn-primary btn btn-block">Download Transaksi</a>
                                    <?php }else{ ?>
                                    </div>

  				<?php 
                                        $harga = $user['jumlah_paket'] * 1250000;
                                     ?>
                                    
                                     <form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
                                      <input type="hidden" name="result_type" id="result-type" value="">
                                      <input type="hidden" name="result_data" id="result-data" value="">
                                      <input type="hidden" name="nama" id="nama" value="<?= $this->session->username ?>">
                                       <input type="hidden" name="email" id="email" value="<?= $this->session->email ?>">
                                      <input type="hidden" name="kode_member" id="kode_member" value="<?= $this->session->kode_member ?>">
                                      <input type="hidden" name="nama_produk" id="nama_produk" value="ratu merak">
                                      <input type="hidden" name="harga" id="harga" value="<?= $harga ?>">
                                    </form>
                                    
                                    <button id="pay-button" class="btn btn-primary btn btn-block">Pay!</button>
                                <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>



    <!-- Mdodal Button -->
     <div class="modal" tabindex="-1" role="dialog" id="myModal2">
        <div class="modal-dialog" role="document">
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