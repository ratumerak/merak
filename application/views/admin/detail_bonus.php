 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Bonus Afiliasi Member <?= $member['username'] ?></h6>
    </div>
    <div class="card-body">
      <a href="<?= base_url('admin/detail_bonus_cashback_ratumeak/') ?><?= $member['kode_member'] ?>" class="btn btn-primary">Detail Bonus Cashback Ratumerak</a>

      <a href="<?= base_url('admin/detail_bonus_cashback_markisa') ?>/<?= $member['kode_member'] ?>" class="btn btn-primary">Detail Bonus Cashback Markisa</a>

      <hr>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Bonus</th>
              <th>Dari</th>
              <th>Jumlah Topup</th>
              <th>Harga</th>
              <th>Tgl Topup</th>

            </tr>
          </thead>
          <tfoot>
            <tr>

             <th>No</th>
             <th>Bonus</th>
             <th>Dari</th>
             <th>Jumlah Topup</th>
             <th>Harga</th>
             <th>Tgl Topup</th>
           </tr>
         </tfoot>
         <tbody>
          <?php $no = 1; ?>
          <?php foreach ($bonus as $data) { ?>
            <tr>
              <td><?= $no++; ?></td>
              

            </td>
            <td><?= $data['bonus'] ?></td>
            <td>
              <?php 
              $member = $this->db->get_where('tbl_register',['kode_member' => $data['dari']])->row_array();
              echo $member['username'];
              ?>

            </td>
            <td>
              <?php 
              $order = $this->db->get_where('tbl_topup',['order_id' => $data['id_order']])->row_array();
              echo $order['jumlah_topup'];
              ?>
            </td>
            <td>
              <?= $order['harga'] ?>
            </td>

            <td><?= $data['date'] ?></td>

          </tr>

        <?php } ?>

      </tbody>
    </table>

  </div>
</div>
</div>

</div>