 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Topup Markisa </h6>
    </div>


    <div class="card-body">
     <?php if (isset($tgl)) { ?>
      <a href="<?= base_url('Laporan/data_topup_markisa?tgl=') ?><?= $tgl ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
    <?php }else{ ?>
      <a href="<?= base_url('Laporan/data_topup_markisa') ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
    <?php } ?>
    <hr>
    <!-- <h5 style="font-weight: bold;"> - Total Topup : <?= $total_topup['jumlah_topup'] ?> Paket / <?= $total_topup['qty'] ?> Sak Beras </h5>


    <h5 style="font-weight: bold"> - Total Topup Markisa : <?= $total_topup_markisa['jumlah_topup'] ?> Paket / <?= $total_topup_markisa['qty'] ?> Sak Beras </h5>

    <h5 style="font-weight: bold"> - Total Uang Masuk : <?= "Rp " . number_format($total_harga['harga'],2,',','.');  ?> </h5>
    <hr> -->

    <a href="<?= base_url('admin/topup') ?>" class="btn btn-primary mb-3">Data Topup All <i class="fas fa-arrow-right"></i></a>  
    <a href="<?= base_url('admin/topup_ratumerak') ?>" class="btn btn-primary mb-3">Data Topup Ratumerak <i class="fas fa-arrow-right"></i></a>  
    <form class="form-inline float-right" method="post" action="">

      <div class="form-group mx-sm-3 mb-2">
        <label for="inputPassword2" class="sr-only">Tanggal</label>
        <input type="date" name="tgl" class="form-control" id="inputPassword2" placeholder="Cari berdasarkan tanggak">
      </div>
      <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i> Search</button>
    </form>
    <hr>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Produk</th>
            <th>Jml Paket</th>
            <th>QTY</th>
            <th>Bonus Topup</th>
            <th>Harga</th>
            <th>Status Pembayaran</th>
            <th>Tgl Topup</th>

          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php $jumlah_qty = 0; ?>
            <?php $jumlah_harga = 0; ?>
            <?php   $jumlah_bonus = 0; ?>
            <?php   $jumlah_paket = 0; ?>
            <?php foreach ($topup as $data) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td>
                  <?php 
                  $mber = $this->db->get_where('tbl_register',['kode_member' => $data['kode_member'] ])->row_array();
                  echo $mber['username'];
                  ?>
                </td>
                <td><?= $data['produk'] ?></td>
                <td><?= $data['jumlah_topup'] ?></td>
                <td><?= $data['qty'] ?></td>
                <td>
                  <?php 
                  $bns = $this->db->get_where('tbl_bonus_topup',['order_id' => $data['order_id'] ])->row_array();
                  if ($bns == true) {
                    echo $bns['bonus']." Sak ". $data['produk'];
                  }else{

                    echo "0";
                  }
                  ?>
                </td>
                <td><?= $data['harga'] ?></td>
                <td>

                  <small class="badge badge-success">Sudah Terbayar</small>

                </td>

                <td><?= $data['date_create'] ?></td>



              </tr>

              <?php   
              $jumlah_paket +=$data['jumlah_topup'];
              $jumlah_qty +=$data['qty'];
              $jumlah_harga +=$data['harga'];
              $jumlah_bonus +=$bns['bonus'];
              ?>

            <?php } ?>
            <tfoot>
              <tr style="background-color: orange; font-size: 13; text-align: center; color: black;">
                <td>Total</td>
                <td><?= $no -= 1 ?></td>
                <td>-</td>
                <td><?= $jumlah_paket ?></td>
                <td><?= $jumlah_qty ?></td>
                <td><?= $jumlah_bonus ?></td>
                <td><?= "Rp " . number_format($jumlah_harga ,0,',','.'); ?></td>
                <td>-</td>
                <td>-</td>
              </tr>
            </tfoot>

          </tbody>
        </table>
      </div>

      <br>
      <hr>

          <!--   <h5 style="font-weight: bold;"> - Total Topup : <?= $total_topup['jumlah_topup'] ?> Paket / <?= $total_topup['qty'] ?> Sak Beras </h5>

            <h5 style="font-weight: bold"> - Total Topup Ratumerak : <?= $total_topup_merak['jumlah_topup'] ?> Paket / <?= $total_topup_merak['qty'] ?> Sak Beras </h5>
            <h5 style="font-weight: bold"> - Total Topup Markisa : <?= $total_topup_markisa['jumlah_topup'] ?> Paket / <?= $total_topup_markisa['qty'] ?> Sak Beras </h5> -->
          </div>
        </div>

      </div>