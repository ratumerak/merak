 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Bonus Cashback Ratumek</h6>
    </div>
    <div class="card-body">

      <?php if (isset($_POST['tgl_awal'])) { ?>
       <a href="<?= base_url('Laporan/data_bonus_cashback_ratumerak?tgl_awal=') ?><?= $tgl_awal ?>&&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
     <?php }else{ ?>

      <a href="<?= base_url('Laporan/data_bonus_cashback_ratumerak') ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
    <?php } ?>

     <!--  -<h6 style="font-weight: bold"> - Total Qty Order : <?=  $total_qty['qty'] ?> Qty</h6>
      <h6 style="font-weight: bold"> - Total Qty Order Ratumerak : <?=  $total_qty_merak['qty'] ?> Qty</h6>
      <h6 style="font-weight: bold"> - Total Qty Order Markisa : <?=  $total_qty_markisa['qty'] ?> Qty</h6>

      <h6 style="font-weight: bold"> - Total Qty Order Bonus Ratumerak : <?=  $total_qty_Bonusmerak['qty'] ?> Qty</h6>
      <h6 style="font-weight: bold"> -  Total Qty Order Bonus Markisa : <?=  $total_qty_Bonusmarkisa['qty'] ?> Qty</h6> -->

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
              <th>Username</th>
              <th>Bonus</th>
              <td>Produk</td>
              <td>Qty Order</td>
              <th>Date</th>
              <th>Opsi</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no = 1; ?>
            <?php $qtorder = 0; ?>
            <?php foreach ($bonus as $data) { ?>
              <tr>
                <td><?= $no++; ?></td>
               <!--  <td><a href="#" data-toggle="modal" data-target="#example<?= $data['id_order'] ?>">
                  <?= $data['kode_member'] ?>
                </a></td> -->
                <td>
                  <?php 
                  $mbr = $this->db->get_where('tbl_register',['kode_member' => $data['kode_member']])->row_array();
                  echo $mbr['username'];
                  ?>
                </td>
                <td><?= "Rp " . number_format($data['bonus_cashback'],0,',','.');  ?></td>


                <td>Ratumerak</td>
                <td>
                  <?= $data['qty_order'] ?>
                  <?php 
                  $qtorder += $data['qty_order'];
                  ?>
                </td>
                <td><?= $data['date'] ?></td>


                <td>


                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal2<?= $data['id'] ?>">
                    Bonus Member
                  </button>
                </td>

                <div class="modal fade" id="exampleModal2<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                  <div class="modal-dialog" role="document">

                    <div class="modal-content">

                      <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Total Bonus Cashback Ratumerak</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                          <span aria-hidden="true">&times;</span>

                        </button>

                      </div>

                      <div class="modal-body">

                        <?php 

                        $total = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();

                        ?>
                        <h4 style="text-align: center"><?= "Rp " . number_format($total['total_bonus'],2,',','.'); ?></h4>

                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>

                    </div>

                  </div>

                </div>






              </td>

            </tr>

          <?php } ?>

        </tbody>
        <tfoot>
          <tr style="background-color: orange; font-size: 13px; color: black;">
            <th>Total</th>
            <th><?= $no -= 1 ?></th>
            <th><?= "Rp " . number_format($total_bonus['bonus_cashback'],0,',','.');  ?></th>
            <td>-</td>
            <td><?= $qtorder ?></td>
            <th>-</th>
            <th>-</th>
          </tr>
        </tfoot>
      </table>
      <hr>
      
    </div>
  </div>
</div>

</div>