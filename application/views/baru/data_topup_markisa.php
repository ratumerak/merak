<div class="main-panel" >
  <div class="content-wrapper">
    <div class="row"> 
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

           <?php 
           if (isset($tgl)) { ?>

            <h4 class="card-title">Data Topup Markisa Tanggal <?= $tgl ?></h4>
          <?php }else{ ?>
            <h4 class="card-title">Data Topup Markisa</h4>
          <?php } ?>

          <form class="form-inline" method="post">
            <div class="form-group mr-3 mb-3">
              <label for="inputPassword2" class="sr-only">Cari Berdaserkan Tanggal</label>
              <input type="date" class="form-control" name="tanggal" id="inputPassword2" placeholder="Tanggal">
            </div>
            <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i> Cari </button>
          </form>



          <div class="row">

            <?php foreach ($topup as $data) { ?>
              <div class="col-sm-6 mt-2 mb-2">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Produk
                    <span class="badge badge-primary badge-pill"><?= $data['produk'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Jumlah Paket
                    <span class="badge badge-primary badge-pill"><?= $data['jumlah_topup'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Qty
                    <span class="badge badge-primary badge-pill"><?= $data['qty'] ?> qty</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Harga
                    <span class="badge badge-primary badge-pill"><?= "Rp " . number_format($data['harga'],0,',','.'); ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Status
                    <?php if ($data['status'] == 200) { ?>
                      <span class="badge badge-success badge-pill">Success</span>
                    <?php }else{ ?>
                      <span class="badge badge-warning badge-pill">Panding</span>
                    <?php } ?>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Date Topup
                    <span class="" style="font-weight: bold;"><i class="fa fa-calendar"></i> <?= $data['date_create'] ?></span>
                  </li>
                  <a href="<?= $data['pdf'] ?>" target="_blank" class="btn btn-primary btn-block btn-sm mt-2"><i class="fas fa-download" style="font-size: 10px;"></i> Detail Transaksi</a>
                  <?php if ($data['status'] != 200) { ?>
                    <button type="button" class="btn btn-danger btn-sm mt-1" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                     <i class="fas fa-trash"></i> Hapus
                   </button>
                 <?php }?>
               </ul>
             </div>

             <!-- Modal -->
             <div class="modal fade" id="exampleModal<?=$data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h6>Apakah anda ingin menghapus orderan ini ?</h6>
                    <form method="post" action="<?= base_url('utama/hapus_order_topup') ?>">
                      <input type="hidden" name="order_id" value="<?= $data['order_id'] ?>">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <?php } ?>
        </div>
      </div>
      <hr>

    </div>
  </div>
</div>


</div>
</div>
