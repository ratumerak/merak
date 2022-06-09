<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />



<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=612a1f38f4d23f00121c6e67&product=inline-share-buttons" async="async"></script>





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









    <!-- End Navbar -->

    <div class="container">

      <div class="row">

        <div class="col-sm-4 col-6 mt-3">

          <div class="card">

            <div class="card-header p-3 pt-2">

              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">

                <i class="material-icons opacity-10">money</i>

              </div>

              <div class="text-end pt-1">

                <p class="text-sm mb-0 text-capitalize">Bonus</p>

                <h5 class="mb-0">

                   <?php 

                      if ($total == false) {

                          echo "0";

                      }else{

                          echo "Rp". number_format($total['total_bonus'],0,',','.');

                      }

                    ?>

                </h5>

              </div>

            </div>

            <hr class="dark horizontal my-0">

            <div class="card-footer p-3">

            <a href="<?= base_url('utama/data_bonus') ?>" class="mb-0">View Bonus</a> 

            </div>

          </div>

        </div>

        <div class="col-sm-4 col-6 mt-3">

          <div class="card">

            <div class="card-header p-3 pt-2">

              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">

                <i class="material-icons opacity-10">shopping_bag</i>

              </div>

              <div class="text-end pt-1">

                <p class="text-sm mb-0 text-capitalize">Stok Ratumerak</p>

                <h5 class="mb-0">

                  <?php 



                    if ($stok == false) {

                        echo "0";

                    }else{



                        echo $stok['jumlah_stok'];

                    }



                    ?>



                </h5>

              </div>

            </div>

            <hr class="dark horizontal my-0">

            <div class="card-footer p-3">

              <p class="mb-3"><span class="text-danger text-sm font-weight-bolder"></span> </p>

            </div>

          </div>

        </div>

        <div class="col-sm-4 col-6 mt-3">

          <div class="card">

            <div class="card-header p-3 pt-2">

              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">

                <i class="material-icons opacity-10">shopping_bag</i>

              </div>

              <div class="text-end pt-1">

                <p class="text-sm mb-0 text-capitalize">Stok Markisa</p>

                <h5 class="mb-0">

                  <?php 



                    if ($markisa == false) {

                        echo "0";

                    }else{



                        echo $markisa['jumlah_stok'];

                    }



                 ?>

                </h5>

              </div>

            </div>

            <hr class="dark horizontal my-0">

            <div class="card-footer p-3">

              <p class="mb-3"><span class="text-danger text-sm font-weight-bolder"></span> </p>

            </div>

          </div>

        </div>

        <div class="col-sm-4 col-6 mt-3">

          <div class="card">

            <div class="card-header p-3 pt-2">

              <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">

                <i class="material-icons opacity-10">favorite_border</i>

              </div>

              <div class="text-end pt-1">

                <p class="text-sm mb-0 text-capitalize">Order</p>

                <h5 class="mb-0">

                 <?= $order ?>

                

                </h5>

              </div>

            </div>

            <hr class="dark horizontal my-0">

            <div class="card-footer p-3">
            <a href="<?= base_url('utama/data_order') ?>" class="mb-0">View Data Order</a>
             <!--  <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p> -->

            </div>

          </div>

        </div>



        <div class="col-sm-4 col-6 mt-3">

          <div class="card">

            <div class="card-header p-3 pt-2">

              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">

                <i class="material-icons opacity-10">people_alt</i>

              </div>

              <div class="text-end pt-1">

                <p class="text-sm mb-0 text-capitalize">Jaringan</p>

                <h5 class="mb-0">

                 <?= $member ?>

                

                </h5>

              </div>

            </div>

            <hr class="dark horizontal my-0">

            <div class="card-footer p-3">
            <a href="<?= base_url('utama/jaringan') ?>" class="mb-0">View Jaringan</a>
             <!--  <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p> -->

            </div>

          </div>

        </div>



         <?php 

         if ($bonus_topup_r == false){

             

         }else{

         if ($bonus_topup_r['total_stok_bonus'] != 0) { ?>

        <div class="col-sm-4 col-6 mt-3">

          <div class="card">

            <div class="card-header p-3 pt-2">

              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">

                <i class="material-icons opacity-10">weekend</i>

              </div>

              <div class="text-end pt-1">

                <p class="text-sm mb-0 text-capitalize">Stok Bonus Topup Ratumerak</p>

                <h5 class="mb-0">

                  <?= $bonus_topup_r['total_stok_bonus'] ?>

                </h5>

              </div>

            </div>

            <hr class="dark horizontal my-0">

            <div class="card-footer p-3">

              <p class="mb-3"><span class="text-danger text-sm font-weight-bolder"></span> </p>

            </div>

          </div>

        </div>



      <?php 

         } 

         } 

      ?>



     <?php 

       if ($bonus_topup_m == false){

           

       }else{

        if ($bonus_topup_m['total_stok_bonus'] != 0 ) {  ?>



        <div class="col-sm-4 col-6 mt-3">

          <div class="card">

            <div class="card-header p-3 pt-2">

              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">

                <i class="material-icons opacity-10">weekend</i>

              </div>

              <div class="text-end pt-1">

                <p class="text-sm mb-0 text-capitalize">Stok Bonus Topup Markisa</p>

                <h5 class="mb-0">

                    <?= $bonus_topup_m['total_stok_bonus'] ?>

                </h5>

              </div>

            </div>

            <hr class="dark horizontal my-0">

            <div class="card-footer p-3">

            <p class="mb-3"><span class="text-danger text-sm font-weight-bolder"></span> </p>

            </div>

          </div>

        </div>

      </div>

    <?php } } ?>



    <?php if ($user == true) { ?>

    <div class="row">

        <div class="col-sm-6">

            

     <div class="form-group">

        <label>Referral  Link</label>

        <input type="text" name="" class="form-control" value="<?= base_url() ?>reffral/<?= $this->session->kode_member ?>">

        <a target="_blank" href="https://api.whatsapp.com/send?phone=&text=<?= base_url() ?>reffral/<?= $this->session->kode_member ?>" class="btn btn-success mt-2"><i class="fab fa-whatsapp"></i> Share Referral </a><br>



        <!--  <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= base_url() ?>reffral/<?= $this->session->kode_member ?>" class="btn btn-primary mt-2"><i class="fab fa-facebook"></i> Share Referral</a>

        <br> -->

        <small style="font-style: italic;">Copy link referall anda untuk mendapatkan member baru.</small>

    </div>

    </div>

    </div>



    <?php }else{ ?>



     <div class="row">

        <div class="col-sm-6">

            

           <div class="form-group">

            <label>Referral  Link</label>

            <input type="text" name="" class="form-control" value="<?= base_url() ?>reffral/<?= $this->session->kode_member ?> ">

            <a target="_blank" href="https://api.whatsapp.com/send?phone=&text=<?= base_url() ?>reffral/<?= $this->session->kode_member ?>" class="btn btn-success mt-2"><i class="fab fa-whatsapp"></i> Share Referral </a><br>



            <!--  <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= base_url() ?>reffral/<?= $this->session->kode_member ?>" class="btn btn-primary mt-2"><i class="fab fa-facebook"></i> Share Referral</a>

            <br> -->

            <small style="font-style: italic;">Copy link referall anda untuk mendapatkan member baru.</small>

        </div>

        </div>

        </div>





    <?php } ?>





