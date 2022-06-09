<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=612a1f38f4d23f00121c6e67&product=inline-share-buttons" async="async"></script>


<?php  if ($profil == false) { ?>
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
<?php   } ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>


                        
                    </div>

                <?php 

                    if ($user == false) { ?>

                    <div class="alert alert-danger" role="alert">
                  Hello <?= $this->session->username ?>, akun anda belum terdaftar menjadi member, silahkan melakuakan pembayaran terlebih dahulu untuk mendapatkan jumlah stock, dan bonus selanjutnya. <a href="#" class="alert-link"></a>
                </div>

                   <?php }else{

                    if ($stok['jumlah_stok'] < 3) {
                    
                    
                 ?>

                 <div class="alert alert-danger" role="alert">
                  Hello <?= $this->session->username ?>, Jumlah Stok anda kurang dari 3. <a href="#" class="alert-link">Update stok anda</a> sekarang juga untuk mendaptkan bonus selanjutnya.
                </div>
            <?php } } ?>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Bonus Anda</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                 <?php 
                                                    if ($total == false) {
                                                        echo "0";
                                                    }else{
                                                        echo "Rp". number_format($total['total_bonus'],0,',','.');
                                                    }
                                                  ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Stock Produk Merak</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                 <?php 

                                                    if ($stok == false) {
                                                        echo "0";
                                                    }else{

                                                        echo $stok['jumlah_stok'];
                                                    }

                                                 ?>
                                            </div>

						<p>Hello>
					
                                        </div>
                                        <div class="col-auto">
                                           <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Stock Produk Markisa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php 

                                                    if ($markisa == false) {
                                                        echo "0";
                                                    }else{

                                                        echo $markisa['jumlah_stok'];
                                                    }

                                                 ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                           <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                         <?php 
                         if ($bonus_topup_r == false){
                             
                         }else{
                         if ($bonus_topup_r['total_stok_bonus'] != 0) { ?>

                            <div class="col-xl-4 col-md-6 mb-3">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Stock Bonus Produk Ratumerak</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $bonus_topup_r['total_stok_bonus'] ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                           <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
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

                            <div class="col-xl-4 col-md-6 mb-3">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Stock Bonus Produk Markisa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $bonus_topup_m['total_stok_bonus'] ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                           <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                      <?php 
                      }
                       }
                      ?>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Order
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $order ?> ord</div>
                                                </div>
                                                <div class="col">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            
                                            <i class="fas fa-store-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Refferal</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $member ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($user == true) { ?>
                    <div class="row">
                        <div class="col-sm-6">
                            
                     <div class="form-group">
                            <label>Referral  Link</label>
                            <input type="text" name="" class="form-control" value="<?= base_url() ?>reffral/<?= $this->session->kode_member ?>">
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=&text=<?= base_url() ?>reffral/<?= $this->session->kode_member ?>" class="btn btn-success mt-2"><i class="fab fa-whatsapp"></i> Share Referral </a>

                             <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= base_url() ?>reffral/<?= $this->session->kode_member ?>" class="btn btn-primary mt-2"><i class="fab fa-facebook"></i> Share Referral</a>
                            <br>
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
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=&text=<?= base_url() ?>reffral/<?= $this->session->kode_member ?>" class="btn btn-success mt-2"><i class="fab fa-whatsapp"></i> Share Referral </a>

                             <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= base_url() ?>reffral/<?= $this->session->kode_member ?>" class="btn btn-primary mt-2"><i class="fab fa-facebook"></i> Share Referral</a>
                            <br>
                            <small style="font-style: italic;">Copy link referall anda untuk mendapatkan member baru.</small>
                        </div>
                    </div>
                    </div>

                
                 <?php } ?>

                    <!-- Content Row -->

                    <div class="row">



                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                               
                                <!-- Card Body -->
                                <div class="card-body">
                                   
                                       <div class="calendar-wrapper" style="margin-bottom: 40px; background-color: white;"></div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                          <!--   <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Color System -->
                            <!-- <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                      
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="<?= base_url() ?>assets/calender/calendar.js"></script>
<script>
  function selectDate(date) {
  $('.calendar-wrapper').updateCalendarOptions({
    date: date
  });
}

var defaultConfig = {
  weekDayLength: 1,
  date: new Date(),
  onClickDate: selectDate,
  showYearDropdown: true,
};

$('.calendar-wrapper').calendar(defaultConfig);
</script>