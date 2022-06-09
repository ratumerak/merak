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
            <?php $top = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->result_array(); ?>
            <?php $row = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->num_rows(); ?>
            <?php if ($row > 1) { ?>
             <tr>
              <td rowspan="<?= $row ?>"><?= $data['kode_member'] ?></td>
              <?php foreach ($top as $dat) {  ?>
                <td><?= $dat['harga'] ?></td>
                <td>
                  <?php if ($dat['jumlah_topup'] < 10) {
                    echo $dat['jumlah_topup'];
                  } ?>
                </td>
                <td> <?php if ($dat['jumlah_topup'] >= 10) {
                  echo $dat['jumlah_topup'];
                } ?>
              </td>
              <td>
                <?php 
                $this->db->select_sum('jumlah_topup');
                $stok = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->row_array();
                echo $stok['jumlah_topup'];
                ?>
              </td>
              <td>
                <?php 
                $jml = $dat['jumlah_topup'];

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
                  echo $bonus = 0;
                }
                ?>
              </td>
            </tr>
          <?php } ?>
        <?php }else{ ?>
          <?php foreach ($top as $dat) {  ?>
            <tr>
              <td><?= $data['kode_member'] ?></td>
              <td><?= $dat['harga'] ?></td>
              <td>
                <?php if ($dat['jumlah_topup'] < 10) {
                  echo $dat['jumlah_topup'];
                } ?>
              </td>
              <td> <?php if ($dat['jumlah_topup'] >= 10) {
                echo $dat['jumlah_topup'];
              } ?>
            </td>
            <td>
              <?php 
              $this->db->select_sum('jumlah_topup');
              $stok = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->row_array();
              echo $stok['jumlah_topup'];
              ?>
            </td>
            <td>
              0
            </td>


          </tr>
        <?php } ?>
      <?php } ?>
    <?php } ?>

  </tbody>
</table>



<!-- 
    <table border="1" cellspacing="0">
      <tr>
        <th>Kode Member</th>
        <th>Topup</th>
        <th>Harga</th>
      </tr>

      <?php foreach ($po as $data) { ?>
        <?php $top = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->result_array(); ?>
        <?php $row = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->num_rows(); ?>
        <?php if ($row > 1) { ?>
         <tr>
          <td rowspan="<?= $row ?>"><?= $data['kode_member'] ?></td>
          <?php foreach ($top as $dat) {  ?>
            <td><?= $no++ ?></td>
            <td><?= $dat['jumlah_topup'] ?></td>
            <td><?= $dat['harga'] ?></td>
          </tr>
        <?php } ?>
      <?php }else{ ?>
        <?php foreach ($top as $dat) {  ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['kode_member'] ?></td>
            <td><?= $dat['jumlah_topup'] ?></td>
            <td><?= $dat['harga'] ?></td>
          </tr>
        <?php } ?>
      <?php } ?>
    <?php } ?>


  </table> -->

  <br>

     <!--  <table border="1" cellspacing="0">
       <tr>
        <th>No</th>
        <th>Nama </th>
        <th>Hobi</th>
      </tr>
      <tr>
        <td rowspan="2">1</td>
        <td rowspan="2">Zikri Febrian</td>
        <td>Renang</td>
      </tr>
      <tr>
        <td>Bola Kaki</td>
      </tr>
    </table> -->


     <!--  <table border="1" cellspacing="0">
        <tr>
         <th rowspan="2">No</th>
         <th rowspan="2">NIM</th>
         <th rowspan="2">Nama</th>
         <th colspan="3" width="30%">DATA NILAI</th>
       </tr>
       <tr>
         <td>UTS</td>
         <td>UAS</td>
         <td>IPK</td>
       </tr>
       <tr>
         <td>1</td>
         <td>160210056</td>
         <td>Zikri Febrian</td>
         <td>85</td>
         <td>90</td>
         <td>A</td>
       </tr>
       <tr>
         <td>2</td>
         <td>160210070</td>
         <td>Raja Zulfiando</td>
         <td>80</td>
         <td>75</td>
         <td>B</td>
       </tr>
     </table> -->
   </div>
 </div>
</div>

</div>