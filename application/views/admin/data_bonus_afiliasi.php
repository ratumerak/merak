 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Bonus Afiliasi</h6>
    </div>
    <div class="card-body">

      <?php if (isset($_POST['tgl_awal'])) { ?>
       <a href="<?= base_url('Laporan/data_bonus_afiliasi?tgl_awal=') ?><?= $tgl_awal ?>&&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
     <?php }else{ ?>
      <a href="<?= base_url('Laporan/data_bonus_afiliasi') ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
    <?php } ?>
     <!--  -<h6 style="font-weight: bold"> - Total Qty Order : <?=  $total_qty['qty'] ?> Qty</h6>
      <h6 style="font-weight: bold"> - Total Qty Order Ratumerak : <?=  $total_qty_merak['qty'] ?> Qty</h6>
      <h6 style="font-weight: bold"> - Total Qty Order Markisa : <?=  $total_qty_markisa['qty'] ?> Qty</h6>

      <h6 style="font-weight: bold"> - Total Qty Order Bonus Ratumerak : <?=  $total_qty_Bonusmerak['qty'] ?> Qty</h6>
      <h6 style="font-weight: bold"> -  Total Qty Order Bonus Markisa : <?=  $total_qty_Bonusmarkisa['qty'] ?> Qty</h6> -->

      <hr>

     <!--  <h5>Data <?= $tgl ?></h5>
      <hr> -->
      <!-- <form class="form-inline" method="post" action="">
        <div class="form-group mb-2">
          <label for="staticEmail2" class="sr-only">Tgl Awal</label>
          <input type="date" name="tgl_awal" class="form-control" id="inputdate2">
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label for="inputdate2" class="sr-only">Tgl Akhir</label>
          <input type="date" name="tgl_akhir" class="form-control">
        </div>
        <input type="submit" name="kirim" value="Search" class="btn btn-primary">
      </form> -->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Affiliator</th>
              <th>Bonus Awal</th>
              <th>Total Withdraw</th>
              <th>Total Bonus</th>
              <th>Date</th>
              <!-- <th>Opsi</th> -->
            </tr>
          </thead>
          
          <tbody>
            <?php $no = 1; ?>
            <?php   $bonus_awal2 = 0; ?>
            <?php   $total_wt2 = 0 ; ?>
            <?php foreach ($afiliasi as $data) { ?>
              <tr>
                <td><?= $no++; ?></td>
               <!--  <td><a href="#" data-toggle="modal" data-target="#example<?= $data['id_order'] ?>">
                  <?= $data['kode_member'] ?>
                </a></td> -->
                <td>
                  <?php 
                  $mbr = $this->db->get_where('tbl_register',['kode_member' => $data['kode_member']])->row_array();
                  ?>
                  <a href="<?= base_url('admin/detail_jaringan_member/') ?><?= $data['kode_member'] ?>">
                    <?= $mbr['username'] ?>
                  </a>
                </td>
                <td>
                  <?php   
                  $this->db->select_sum('bonus');
                  $bonus_awal = $this->db->get_where('tbl_bonus',['kode_member' => $data['kode_member']])->row_array();
                  echo "Rp " . number_format($bonus_awal['bonus'],0,',','.');

                  $bonus_awal2 += $bonus_awal['bonus'];

                  ?>
                </td>
                <td>
                  <?php   

                  $this->db->select_sum('penarikan');
                  $total_wt = $this->db->get_where('tbl_witdraw',['kode_member' => $data['kode_member']])->row_array();
                  echo "Rp " . number_format($total_wt['penarikan'],0,',','.');

                  $total_wt2 += $total_wt['penarikan'];

                  ?>
                </td>
                <td><?= "Rp " . number_format($data['total_bonus'],0,',','.');  ?></td>



                <td><?= $data['date_create'] ?></td>
              </td>
            </tr>

          <?php } ?>

        </tbody>
        <tfoot>
          <tr style="background-color: orange; font-size: 13px; color: black;">
            <th>Total</th>
            <th><?= $no -=1; ?></th>
            <th><?= "Rp " . number_format($bonus_awal2  ,0,',','.');  ?></th>
            <th><?= "Rp " . number_format($total_wt2,0,',','.');  ?></th>
            <th> <?= "Rp " . number_format($total_bonus['total_bonus'],0,',','.');  ?></th>
            <th>-</th>
          <!-- <th>-</th>
            <th>-</th> -->
          </tr>
        </tfoot>
      </table>
      <hr>
      <!--  <h6>Jumlah Totol Bonus Afiliasi : <?= "Rp " . number_format($total_bonus['bonus'],0,',','.');  ?></h6> -->
    </div>
  </div>
</div>

</div>