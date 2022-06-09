 <div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Bonus Stok</h6>
    </div>
    <div class="card-body">
      <?php if (isset($_POST['tgl_awal'])) { ?>
       <a href="<?= base_url('Laporan/data_bonus_stok?tgl_awal=') ?><?= $tgl_awal ?>&&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
     <?php }else{ ?>
       <a href="<?= base_url('Laporan/data_bonus_stok') ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
     <?php } ?>
     <hr>
     <h5>Data <?= $tgl ?></h5>
     <hr>
     <form class="form-inline" method="post" action="">
      <div class="form-group mb-2">
        <label for="staticEmail2" class="sr-only">Tgl Awal</label>
        <input type="date" name="tgl_awal" class="form-control" id="inputdate2">
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <label for="inputdate2" class="sr-only">Tgl Akhir</label>
        <input type="date" name="tgl_akhir" class="form-control">
      </div>
      <input type="submit" name="kirim" value="Search" class="btn btn-primary">
    </form>

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Member</th>
            <th>Produk</th>
            <th>Jumlah Paket</th>
            <th>Bonus Topup</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
           <th>No</th>
           <th>Kode Member</th>
           <th>Produk</th>
           <th>Jumlah Paket</th>
           <th>Bonus Topup</th>
         </tr>
       </tfoot>
       <tbody>
        <?php $no = 1; ?>
        <?php foreach ($bonus_stok as $data) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['kode_member'] ?></td>
            <td><?= $data['produk'] ?></td>
            <td><?= $data['jumlah_topup'] ?></td>
          </td>
          <td>
            <?php 
            $jml = $data['jumlah_topup'];

            if ($jml == 50) {
              $bonus = 20;
            }elseif($jml >= 40){
              echo $bonus = 16;
            }elseif ($jml >= 30) {
              echo $bonus = 12;
            }elseif ($jml >= 20) {
              echo $bonus = 8;
            }elseif ($jml >= 10) {
              echo $bonus = 4;
            }else{
                // echo $bonus = 0;
            }
            ?>
          </td>

        </tr>
      <?php } ?>

    </tbody>
  </table>
  <hr>
  <h5>Total Jumlah Paket Bonus Stok = <?= $total['jumlah_topup'] ?> Paket </h5>
</div>
</div>
</div>

</div>