 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Withdraw Bonus Cashback Ratumerak Member <?= $member['username'] ?></h6>
    </div>
    <div class="card-body">

     <a href="<?= base_url('admin/detail_withdraw') ?>/<?= $member['kode_member'] ?>" class="btn btn-primary">Detail Withdraw Bonus Cashback Afiliasi <i class="fas fa-arrow-right"></i></a>

     <a href="<?= base_url('admin/detail_withdraw_cashback_ratumerak/') ?><?= $member['kode_member'] ?>" class="btn btn-primary">Detail  Withdraw Bonus Cashback Ratu Merak <i class="fas fa-arrow-right"></i></a>
     
     
     <hr>
     <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Jumlah Penarikan</th>
            <th>Status</th>
            <th>Tgl Witdraw</th>


          </tr>
        </thead>
        <tfoot>
          <tr>

           <th>No</th>
           <th>Jumlah Penarikan</th>
           <th>Status</th>
           <th>Tgl Witdraw</th>

         </tr>
       </tfoot>
       <tbody>
        <?php $no = 1; ?>
        <?php foreach ($wt as $data) { ?>
          <tr>
            <td><?= $no++; ?></td>
            

          </td>
          <td><?= $data['penarikan'] ?></td>
          <td><?php 
          if ($data['status'] == 0) {
            echo "Belum  diproses";
          }else{
            echo $data['status'];
          }
          ?></td>
          <td><?= $data['date_create'] ?></td>

        </tr>

      <?php } ?>

    </tbody>
  </table>

</div>
<h5 style="color: orange;">Total Withdraw Cashback Ratumerak Anda :
 <?php if ($total['penarikan'] == false) {
  echo "0";
}else{
  echo  $total['penarikan '];
} ?>

</h5>
</div>
</div>

</div>