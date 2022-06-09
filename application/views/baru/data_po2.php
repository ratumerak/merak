 <div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Member</th>
              <th>Topup</th>
              <th>Paket</th>
              <th>Paket Bonus</th>
              <th>Stok</th>
              <th>Stok Bonus</th>
              <th>Cashback</th>
              <th>Cashback Wd</th>
              <th>Bonus Afiliasi</th>
              <th>Bonus Afilasi Wd</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
             <th>No</th>
             <th>Kode Member</th>
             <th>Topup</th>
             <th>Paket</th>
             <th>Paket Bonus</th>
             <th>Stok</th>
             <th>Stok Bonus</th>
             <th>Cashback</th>
             <th>Cashback Wd</th>
             <th>Bonus Afiliasi</th>
             <th>Bonus Afilasi Wd</th>
           </tr>
         </tfoot>
         <tbody>
          <?php $no = 1; ?>
          <?php foreach ($po as $data) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['kode_member'] ?></td>
              <?php 
              $topup = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->result_array();
              foreach ($topup as $data2) {?>
                <td><?= $data2['harga'] ?></td>
              <?php } ?>

            </tr>

          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

</div>