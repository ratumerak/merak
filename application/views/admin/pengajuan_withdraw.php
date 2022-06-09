 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Withdraw</h6>
    </div>
    <div class="card-body">
      <?php if (isset($_POST['tgl_awal'])) { ?>
       <a href="<?= base_url('Laporan/data_pengajuan_withdraw?tgl_awal=') ?><?= $tgl_awal ?>&&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
     <?php }else{ ?>
      <a href="<?= base_url('Laporan/data_pengajuan_withdraw') ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
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
            <th>Kode Withdraw</th>
            <th>Kode Member</th>
            <th>Username</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Bank</th>
            <th>Nomor Rek</th>
            <th>Jumlah Withdraw</th>
            <th>Tgl Withdraw</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($wt as $data) { ?>

            <?php   

            $profil = $this->db->get_where('tbl_profil',['kode_member' => $data['kode_member']])->row_array();

            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['kode_withdraw'] ?></td>
              <td><?= $data['kode_member'] ?></td>
              <td><?= $data['username'] ?></td>
              <td><?= $data['email'] ?></td>
              <td><?= $data['no_telp'] ?></td>
              <td><?= $profil['name_bank'] ?></td>
              <td><?= $profil['no_rek'] ?></td>
              <td><?= "Rp " . number_format($data['penarikan'],0,',','.');  ?></td>
              <td><?= $data['date_create'] ?></td>
              <td>
                <?php   

                if ($data['status'] == 0) {
                  echo "Belum diproses";
                }else{

                  echo "Sudah diproses";
                }
                ?>
              </td>


              <td>


               <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $data['id_withdraw'] ?>">
                Setujui
              </button>

              <div class="modal fade" id="exampleModalCenter<?= $data['id_withdraw'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Pesan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Apakah anda ingin menyetujui akun ini ?
                      <form method="post" action="">

                        <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">

                        <input type="hidden" name="id" value="<?= $data['id_withdraw'] ?>">

                        <input type="hidden" name="penarikan" value="<?= $data['penarikan'] ?>">

                        <input type="hidden" name="no_hp" value="<?= $data['no_telp'] ?>">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Submit" name="setujui">
                      </form>

                    </div>
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
       <td>Total</td>
       <td>-</td>
       <td><?= $no -= 1; ?></td>
       <td>-</td>
       <td>-</td>
       <td>-</td>
       <td>-</td>
       <td>-</td>
       <td><?= "Rp " . number_format($total_penarikan['penarikan'],0,',','.');  ?></td>
       <td>-</td>
       <td>-</td>
       <td>-</td>
     </tr>
   </tfoot>
 </table>
 <!-- <h6>Jumlah Total Uang Pengajuan Withdraw Cashback Markisa : <?= "Rp " . number_format($total_penarikan['penarikan'],0,',','.');  ?></h6> -->
</div>
</div>
</div>

</div>