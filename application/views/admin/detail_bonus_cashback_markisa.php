 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Bonus Cashback Markisa Member <?= $member['username'] ?></h6>
    </div>
    <div class="card-body">
      <a href="<?= base_url('admin/detail_bonus') ?>/<?= $member['kode_member'] ?>" class="btn btn-primary">Detail Bonus Afiliasi</a>
      <a href="<?= base_url('admin/detail_bonus_cashback_ratumeak/') ?><?= $member['kode_member'] ?>" class="btn btn-primary">Detail Bonus Cashback Ratumerak</a>

      

      <hr>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Produk</th>
              <th>Bonus</th>
              <th>Qty Order</th>
              <th>Tgl Order</th>

            </tr>
          </thead>
          <tfoot>
            <tr>

             <th>No</th>
             <th>Produk</th>
             <th>Bonus</th>
             <th>Qty Order</th>
             <th>Tgl Order</th>
           </tr>
         </tfoot>
         <tbody>
          <?php $no = 1; ?>
          <?php foreach ($c_markisa as $data) { ?>
            <tr>
              <td><?= $no++; ?></td>
              

            </td>
            <td>Markisa</td>

            <td><?= $data['bonus_cashback'] ?></td>
            <td><?= $data['qty_order'] ?>
            <td><?= $data['date_create'] ?></td>

          </tr>

        <?php } ?>

      </tbody>
    </table>

  </div>
</div>
</div>

</div>