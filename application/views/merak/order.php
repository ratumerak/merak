



    <!-- End Navbar -->

    <div class="container-fluid py-4">

      <div class="row">

        <div class="col-12">

          <div class="card my-4">

            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                <h6 class="text-white text-capitalize ps-3">Order Produk Anda</h6>

              </div>

            </div>

            <div class="card-body px-0 pb-2">

              <div class="container" id="app">

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

                              }
				if ($stok_bonus_topup_r != 0) {

                                 echo "<option value='bonus ratumerak'>". "Bonus Ratumerak". "</option>";

                              }

                            ?>

                        </select>

                    </div>





                     <div class="form-group">

                        <label>Qty Order ({{stok()}})</label><br>
                        <button @click.stop.prevent="min()" class="btn btn-dark">-</button> {{qty}} <button @click.stop.prevent="plus()" class="btn btn-dark">+</button>
                        <input type="hidden" name="qty" class="form-control"  min="0" v-model="qty" v-on:keyup="cek_qty()">

                       

                    </div>



                    <div class="form-group">

                        <label>Nama Pembeli</label>

                        <input type="text" name="nama_pembeli" class="form-control" value="<?php echo set_value('nama_pembeli'); ?>">

                        <small class="text-danger"><?php echo form_error('nama_pembeli'); ?></small>

                    </div>

                   



                    <div class="form-group">

                        <label>No Telp Pembeli</label> 

                        <input type="telp" name="no_telp_pembeli" class="form-control" value="<?php echo set_value('no_telp_pembeli'); ?>">

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

                   
                        
                       <button v-if="cek_btn() == true" @click="loading()" type="submit" class="btn btn-primary btn-order"><i class="fas fa-shopping-cart"></i> Order <i class="fas fa-spinner fa-spin" id="load" style="display:  none;"> </i></button> 
                     
                         <button v-else="" type="submit" class="btn btn-primary" disabled=""><i class="fas fa-shopping-cart"></i> Order </button>
                         

                   <?php    } ?>

                    </div>

                </div>

            </form>

              </div>

            </div>

          </div>

        </div>

      </div>


<script>
        $(document).ready(function(){
            $("#btn-order").click(function(){

                alert('ebunga');

            })
        })
    </script>




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



  // $stok_bonus_topup_m = $stok_bonus_topup_m['total_stok_bonus'];

  // $stok_bonus_topup_r = $stok_bonus_topup_r['total_stok_bonus'];

  

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
      
      loading : function(){

        $("#load").show();
      },
      
      plus : function (){

        this.qty++;
      },

      min : function (){

        if (this.qty == 1) {
         swal("Ops!!", "Stok tidak boleh kosong", "warning" );
        }else{

        this.qty--;
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



      

