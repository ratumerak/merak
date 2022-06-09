 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Topup</h6>
    </div>
    <div class="card-body">
      <?php if (isset($tgl_awal)) { ?>
        <a href="<?= base_url('Laporan/data_pengajuan_topup?tgl_awal=') ?><?= $tgl_awal ?>&&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
      <?php }else{ ?>
       <a href="<?= base_url('Laporan/data_pengajuan_topup') ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
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
           <th>Jml Paket</th>
           <th>QTY</th>
           <th>Harga</th>
           <th>Status Pembayaran</th>
           <th>Tgl Topup</th>

         </tr>
       </thead>
       
       <tbody>
        <?php $jumlah_paket = 0; ?>
        <?php $jumlah_qty = 0; ?>
        <?php $jumlah_harga = 0; ?>
        <?php $no = 1; ?>
        <?php $no = 1; ?>
        <?php foreach ($topup as $data) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['kode_member'] ?></td>
            <td><?= $data['produk'] ?></td>
            <td><?= $data['jumlah_topup'] ?></td>
            <td><?= $data['qty'] ?></td>
            <td><?= $data['harga'] ?></td>
            <td><small class="badge badge-danger">Belum Ada Pembayaran</small> </td>

            <td><?= $data['date'] ?></td>





          </tr>

          <?php   
          $jumlah_paket +=$data['jumlah_topup'];
          $jumlah_qty +=$data['qty'];
          $jumlah_harga +=$data['harga'];
          ?>

        <?php } ?>

      </tbody>
      <tfoot>
        <tr style="background-color: orange; font-size: 13px; color: black; text-align: center;">
         <td>Total</td>
         <td><?= $total_member ?></td>
         <td> - </td>
         <td><?= $jumlah_paket ?></td>
         <td><?= $jumlah_qty ?></td>
         <td><?= "Rp " . number_format($jumlah_harga ,0,',','.'); ?></td>
         <td>-</td>
         <td>-</td>

       </tr>
     </tfoot>
   </table>
   <hr>
   
 </div>
</div>
</div>

</div>