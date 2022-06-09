  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
    <!--   <?= $this->session->flashdata('hello'); ?> -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="nof"><?= $orderan_hariini ?></h3>

                <p>Orderan hari ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-user"></i>
              </div>
            <!--   <a href="<?= base_url('kurir/data_post') ?>" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a -->
            </div>
          </div>

           <div class="col-lg-4 col-6 mb-5">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="nof"><?= $orderan_masuk ?></h3>

                <p>Total orderan masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-user"></i>
              </div>
              <!-- <a href="<?= base_url('kurir/order') ?>" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>


           <div class="col-lg-4 col-6 mb-5">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3 id="nof"><?= $stok['stok'] ?></h3>

                <p>Stok Store</p>
              </div>
              <div class="icon">
                <i class="ion ion-user"></i>
              </div>
             <!--  <a href="<?= base_url('admin/data_video') ?>" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          <div class="container">
          <?php foreach ($order as $data) { ?>

            <?php if ($data['id_store'] == $this->session->id_store) { ?>

          <div class="media mb-2 ">
            <img class="align-self-start mr-3" src="<?= base_url() ?>assets_kurir/img/cart.png" alt="Generic placeholder image" style="height: 100px;">

            <div class="bg-danger" style="width: 25px; text-align: center; border-radius: 30px; position: absolute; font-weight: bold;"><?= $data['qty'] ?></div>
            <div class="media-body">
              <h5 class="mt-0 text-success" style="font-weight: bold;"><?= $data['nama'] ?> / <?= $data['produk'] ?></h5>
              <label>Lokasi pengantaran</label>
              <p><?= $data['alamat_lengkap'] ?></p>
              <a href="https://www.google.com/maps/place/<?= $data['alamat_lengkap'] ?>" target="_blank" class="badge badge-danger"><i class="fas fa-map-marker-alt"></i> Lihat Rute </a>
              <a href="https://wa.me/<?= $data['no_telp_pembeli'] ?>" class="badge badge-success"><i class="fas fa-phone"></i> <?= $data['no_telp_pembeli'] ?> </a>


              <?php if ($data['status_order'] =='Pesanan selesai') { ?>
                 <a class="badge badge-warning"><?= $data['status_order'] ?> <i class="fas fa-truck"></i> </a>
              <?php }else{ ?>
                

              <a class="badge badge-warning disabled" data-toggle="modal"  data-target="#exampleModalCenter<?= $data['id_order'] ?>"><i class="fas fa-truck"></i>
                <?php 
                  if ($data['status_order'] == '0') {
                    echo "Menunggu";
                  }else{
                    echo $data['status_order'];
                  }
                 ?>
              </a>
              
             

            <?php } ?>

   
	<?php if ($data['status_order'] == '0') { ?>
            <button class="badge badge-primary" data-toggle="modal" data-target="#cancel<?= $data['id_order'] ?>">
              Cancel Order
            </button>
	<?php } ?>
            
              <!-- Modal -->
            <div class="modal fade" id="cancel<?= $data['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <h6>Apakah anda ingin mengcancel orderan ini ?</h6>
                  <form method="post" action="<?= base_url('kurir/cancel_order') ?>">
                  <input type="hidden" name="id_order" value="<?= $data['id_order'] ?>">
                  <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">
                  <input type="hidden" name="qty" value="<?= $data['qty'] ?>">
                  <input type="hidden" name="produk" value="<?= $data['produk'] ?>">

                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
            

          

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter<?= $data['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Ubah Status</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <input type="hidden" name="id" value="<?= $data['id_order'] ?>">
                         <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">
                         <input type="hidden" name="qty" value="<?= $data['qty'] ?>">
                          <input type="hidden" name="produk" value="<?= $data['produk'] ?>">
                           <input type="hidden" name="nohp" value="<?= $data['no_telp_pembeli'] ?>">

                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" name="status">

                            <?php 
                              $status = $data['status_order'];

                              if ($status == '0') {
                                echo "<option>"."Pesanan sedang diproses"."</option>";
                              }elseif ($status == 'Pesanan sedang diproses') {
                                 echo "<option>"."Pesanan dalam perjalanan"."</option>";
                              }elseif ($status == 'Pesanan dalam perjalanan') {
                                echo "<option>"."Pesanan telah sampai tujuan"."</option>";
                              }elseif ($status == 'Pesanan telah sampai tujuan') {
                                 echo "<option>"."Pesanan selesai"."</option>";
                              }
                             ?>
                          </select>
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Save changes" name="kirim">
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              


              <p></p>
            </div>
          </div>

        <?php } 
          }
        ?>
         </div>


   

         


          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <script src="http://momentjs.com/downloads/moment.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- kalender -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
