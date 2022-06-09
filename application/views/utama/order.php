 <div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-shopping-cart"></i> Tambah Order</h6>
        </div>
        <div class="card-body">
            <div class="row" id="app">
                
                <div class="col-sm-8 col-12">
                    <form method="POST" action="" enctype="multipart/form-data">

                       <div class="form-group">
                        <label>Produk</label>
                        <select class="form-control" name="produk" v-model="produk">
                          <option>--Pilih Produk--</option>
                          <option value="ratumerak">Ratumerak</option>
                          <option value="markisa">Markisa</option>
                          <?php 

                              if ($stok_bonus_topup_m != 0) {
                                echo "<option value='bonus markisa'>". "Bonus Markisa". "</option>";
                              }elseif ($stok_bonus_topup_r != 0) {
                                 echo "<option value='bonus ratumerak'>". "Bonus Ratumerak". "</option>";
                              }
                            ?>
                        </select>
                    </div>


                     <div class="form-group">
                        <label>Qty Order ({{stok()}})</label>

                        <input type="number" name="qty" class="form-control"  min="0" v-model="qty" v-on:keyup="cek_qty()">
                       
                    </div>

                    <div class="form-group">
                        <label>Nama Pembeli</label>
                        <input type="text" name="nama_pembeli" class="form-control" value="<?php echo set_value('nama_pembeli'); ?>">
                        <small class="text-danger"><?php echo form_error('nama_pembeli'); ?></small>
                    </div>
                   

                    <div class="form-group">
                        <label>No Telp Pembeli</label> 
                        <input type="number" name="no_telp_pembeli" class="form-control" value="<?php echo set_value('no_telp_pembeli'); ?>">
                         <small class="text-danger"><?php echo form_error('no_telp_pembeli'); ?></small>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                    <select class="form-control" name="prov" id="prov">
                                        <?php foreach ($prov as $prov2) { ?>
                                        <option value="<?= $prov2['id'] ?>"><?= $prov2['name'] ?></option>   
                                        <?php } ?>        
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kabupaten / Kota</label>
                                  <select class="form-control" id="kab" name="kab">
                                   <option>-- Pilih Kabupaten / Kota --</option>
                                   <?php  foreach ($kab as $data) { ?>
                                    <option value="<?= $data['id'] ?>" ><?= $data['name'] ?></option>
                                  <?php   } ?>
                                  </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                    <select class="form-control" id="kec" name="kec">
                                        <option>-- Pilih Kecamatan --</option>
                                        <?php foreach ($kec as $data) { ?>
                                          <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                                        <?php } ?>
                                    </select> 
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kelurahan / Desa</label>
                                  <select class="form-control" id="kel" name="kel">
                                        <option>-- Pilih Kelurahan --</option>
                                  </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat_lengkap"><?php echo set_value('alamat_lengkap'); ?></textarea>
                        <small class="text-danger"><?php echo form_error('alamat_lengkap'); ?></small>
                        <small>Masukan alamat lengkap anda seperti nama jalan, nama linkungan, nama dusun maupun nama nomor rumah.</small>
                    </div>


                    <div class="form-group">
                        <?php if ($profil == false) { ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-shopping-cart"></i> Order
                            </button>

                     <?php  }else{ ?>

                       <button v-if="cek_btn() == true" type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Order</button>

                         <button v-else="" type="submit" class="btn btn-primary" disabled=""><i class="fas fa-shopping-cart"></i> Order</button>
                   <?php    } ?>
                    </div>
                </div>
            </form>

                <div class="col-sm-4">
                   <!--  <ul style="font-style: italic;">
                        <li>Untuk pendaftaran member pastikan anda mengisi form dengan lengkap.</li>
                        <li>Masukan username anda dengan karekter yang unik.</li>
                        <li>Pastikan akun email anda aktif.</li>
                        <li>Masukan password anda dengan benar dan unik.</li>
                        <li>Nomor NIK ada harus valid.</li>
                        <li>Ungagah  foto KTP anda dengan format yang telah ditentukan.</li>
                </ul> -->
                </div>
            </div>



        
        </div>
    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Isi Profil Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('utama/profil') ?>">
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
                 <label for="exampleInputEmail1">No Rek</label>
                    <input type="number" class="form-control" required="" name="no_rek">
                    <small>Masukan nomor rekening anda yang masih berlaku</small>
                 </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
          </form>



      </div>
    </div>
  </div>
</div>

<?php 
  $stok_ratumerak = $stok['jumlah_stok'];
  if ($stok_markisa == FALSE) {
    $stok_markisa = 0;
  }else{
    $stok_markisa = $stok_markisa['jumlah_stok'];
  }

   if ($stok_bonus_topup_m == false) {
    $stok_bonus_topup_m = 0;
  }else{
    $stok_bonus_topup_m = $stok_bonus_topup_m['total_stok_bonus'];
  }

   if ($stok_bonus_topup_r == false) {
    $stok_bonus_topup_r = 0;
  }else{
    $stok_bonus_topup_r = $stok_bonus_topup_r['total_stok_bonus'];
  }  
 ?>

<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script>
  var app = new Vue({
    el: '#app',
    data: {
      stok_ratumerak : "<?= $stok_ratumerak ?>",
      stok_markisa : "<?= $stok_markisa ?>",
      stok_bonus_m : "<?= $stok_bonus_topup_m ?>",
       stok_bonus_r : "<?= $stok_bonus_topup_r ?>",
      produk : 'Pilih Produk',
      qty : 0,
    },

    methods : {

      stok : function(){

        if (this.produk == 'ratumerak') {
          return this.stok_ratumerak;
        }else if(this.produk == 'markisa'){
          return this.stok_markisa;
        }else if(this.produk == 'bonus markisa'){
          return this.stok_bonus_m;
        }else if (this.produk == 'bonus ratumerak') {
          return this.stok_bonus_r;
        }else{

          return 0;
        }
      },

      cek_qty : function(){

        if (this.produk == 'ratumerak') {

          if (this.qty > Number(this.stok_ratumerak)) {

               return swal("Ops!!", "Stok ratumerak tidak mencukupi", "warning" );
          }else{
            return null;
          }
         
        }else if(this.produk == 'markisa'){

          if (this.qty > Number(this.stok_markisa)) {

               return swal("Ops!!", "Stok markisa tidak mencukupi", "warning" );
          }else{
            return null;
          }
         
        }else if(this.produk == 'bonus markisa'){

          if (this.qty > Number(this.stok_bonus_m)) {

               return swal("Ops!!", "Stok bonus markisa tidak mencukupi", "warning" );
          }else{
            return null;
          }
         
        }else if(this.produk == 'bonus ratumerak'){

          if (this.qty > Number(this.stok_bonus_r)) {

               return swal("Ops!!", "Stok tidak mencukupi", "warning" );
          }else{
            return null;
          }
         
        }
        else{

          return null;
        }
      },

      cek_btn : function(){

        if (this.produk == 'ratumerak') {

          if (this.qty > Number(this.stok_ratumerak)) {

               return false;
          }else{
            return true;
          }
         
        }else if(this.produk == 'markisa'){

          if (this.qty > Number(this.stok_markisa)) {

               return false;
          }else{
            return true;
          }
        }else if(this.produk == 'bonus markisa'){

          if (this.qty > Number(this.stok_bonus_m)) {

               return false;
          }else{
            return true;
          }
        }else if(this.produk == 'bonus ratumerak'){

          if (this.qty > Number(this.stok_bonus_r)) {

               return false;
          }else{
            return true;
          }
        }
      }

     
    }
  })
</script>