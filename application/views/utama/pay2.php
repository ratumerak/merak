
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
                                            <label>Bank Tujuan :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>BCA</p>
                                            <hr>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Nomor Rek Tujuan :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>xxxxxxxxxxxxxxxxxxxxxxx</p>
                                            <hr>
                                        </div>

                                         <div class="col-sm-6">
                                            <label>Jumlah Stock :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>10</p>
                                            <hr>
                                        </div>

                                         <div class="col-sm-6">
                                            <label>Total Pembayaran :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <p><b>Rp 1.250.000</b></p>
                                            <hr>
                                        </div>


                                    </div>

                                </div>
                                 <div class="col-sm-6">
                                    <form method="post" action="<?= base_url('utama/upload') ?>" enctype="multipart/form-data">
                                    <input type="file" name="bukti" id="preview_gambar">
                                    <img src="<?= base_url('assets/img/') ?>not.png" id="gambar_nodin" width="400" alt="Preview Gambar" />


                                    <?php if ($profil == false) { ?>
                                     <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal2">
                                        Kirim
                                    </button>
    

                                    <?php  }else{ ?>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Kirim</button>
                                    <?php   } ?>
                                </form>

                            <script>

                         function drop(){
                              Dropzone.options.myGreatDropzone = { // camelized version of the `id`
                                paramName: "file", // The name that will be used to transfer the file
                                maxFilesize: 2, // MB
                                addRemoveLinks : true,
                                maxFiles : 2,

                                accept: function(file, done) {
                                  if (file.name != null) {
                                    done("Upload bukti pembayaran gagal.");
                                  }
                                  else { done('Bukti pembayaran berhasil di kirim'); }
                                }
                              };

                          }


                            </script>


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