 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?= $data ?></h6>

    </div>
    <div class="card-body">

      <?php if (isset($tgl_awal)) { ?>
        <a href="<?= base_url('Laporan/cetak_jaringan_member?tgl_awal=') ?><?= $tgl_awal ?>&&tgl_akhir=<?= $tgl_akhir ?>&&member=<?= $kode_member ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
      <?php }else{ ?>
       <a href="<?= base_url('Laporan/cetak_jaringan_member?member=') ?><?= $kode_member ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
     <?php } ?>
     <hr>
     <!--  <h5>Data <?= $tgl ?></h5> -->
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
            <th>Username</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Stok Ratumerak</th>
            <th>Stok Markisa</th>
            <th>Stok Bonus Ratumerak</th>
            <th>Stok Bonus Markisa</th>
            <th>Bonus Afilisi</th>
            <th>Bonus Cashback Ratumerak</th>
            <th>Bonus Cashback Markisa</th>
            <th>Bonus Afiliator</th>
            <th>Date</th>

          </tr>
        </thead>

        <tbody>
          <?php $no = 1; ?>
          <?php $stok_ratumerak = 0; ?>
          <?php $stok_markisa = 0; ?>
          <?php $stok_b_ratumerak = 0; ?>
          <?php $stok_b_markisa = 0; ?>
          <?php $total_afiliasi = 0; ?>
          <?php $total_bonusCasMarkisa = 0; ?>
          <?php $total_bonusCasMerak = 0; ?>
          <?php $bonus_afiliator = 0 ?>

          <?php foreach ($member as $data) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['kode_member'] ?></td>
              <td><?= $data['username'] ?></td>
              <td><?= $data['email'] ?></td>
              <td><?= $data['no_telp'] ?></td>
              <td>
                <?php 
                $merak = $this->db->get_where('tbl_stok',['kode_member' => $data['kode_member']])->row_array();
                if ($merak == false) {
                  echo "0";
                }else{

                  echo $merak['jumlah_stok'];
                  $stok_ratumerak += $merak['jumlah_stok'];
                }
                ?>
              </td>

              <td>
                <?php 
                $markisa = $this->db->get_where('tbl_stok_markisa',['kode_member' => $data['kode_member']])->row_array();
                if ($markisa == false) {
                  echo "0";
                }else{

                  echo $markisa['jumlah_stok'];
                  $stok_markisa += $markisa['jumlah_stok'];
                }

                ?>
              </td>

              <td>
                <?php 
                $bonusM = $this->db->get_where('tbl_bonus_topup_ratumerak', ['kode_member' => $data['kode_member']])->row_array();
                if ($bonusM == False) {
                  echo "0";
                }else{
                  echo $bonusM['total_stok_bonus'];
                  $stok_b_ratumerak += $bonusM['total_stok_bonus'];
                }
                ?>
              </td>


              <td>
                <?php 
                $bonusMar = $this->db->get_where('tbl_bonus_topup_markisa', ['kode_member' => $data['kode_member']])->row_array();
                if ($bonusMar == False) {
                  echo "0";
                }else{
                  echo $bonusMar['total_stok_bonus'];
                  $stok_b_markisa += $bonusMar['total_stok_bonus'];
                }
                ?>
              </td>

              <td>
                <?php 
                $bonusAf = $this->db->get_where('tbl_total_bonus', ['kode_member' => $data['kode_member']])->row_array();
                if ($bonusAf == false) {
                  echo "0";
                }else{
                  echo "Rp " . number_format($bonusAf['total_bonus'] ,0,',','.'); 
                  $total_afiliasi += $bonusAf['total_bonus'];
                }
                ?>
              </td>

              <td>
                <?php 
                $bonusCas1 = $this->db->get_where('tbl_total_cashback_ratumerak', ['kode_member' => $data['kode_member']])->row_array();
                if ($bonusCas1 == false) {
                  echo "0";
                }else{
                  echo "Rp " . number_format($bonusCas1['total_bonus'],0,',','.');
                  $total_bonusCasMerak += $bonusCas1['total_bonus'];
                }
                ?>
              </td>

              <td>
                <?php 
                $bonusCas2 = $this->db->get_where('tbl_total_cashback_markisa', ['kode_member' => $data['kode_member']])->row_array();
                if ($bonusCas2 == false) {
                  echo "0";
                }else{
                  echo "Rp " . number_format($bonusCas2['total_bonus'],0,',','.');
                  $total_bonusCasMarkisa += $bonusCas2['total_bonus'];
                }
                ?>
              </td>

              <td>
                <?php 
                $this->db->select_sum('bonus');
                $bonus = $this->db->get_where('tbl_bonus',['dari' => $data['kode_member']])->row_array();
                ?>
                <a href="<?= base_url('admin/detail_member/') ?><?= $data['kode_member'] ?>"><?= "Rp " . number_format($bonus['bonus'],0,',','.'); ?></a>

                <?php 
                $bonus_afiliator += $bonus['bonus'];
                ?>

              </td>

              <td>
                <?= $data['date'] ?>
              </td>


             <!--  <td>
             -->


             <!--   <a href="<?= base_url('admin/detail_transaksi_bonus/') ?><?= $data['kode_member'] ?>" class="btn btn-primary">Detail Transaksi</a> -->
               <!--  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                  Detail
                </button>

                <a href="<?= base_url('admin/detail_member/') ?><?= $data['kode_member'] ?>" class="btn btn-info btn-sm mt-1">Detail Transaksi</a>

                <a href="<?= base_url('admin/detail_order/') ?><?= $data['kode_member'] ?>" class="btn btn-success btn-sm mt-1">Detail Order</a>

                <a href="<?= base_url('admin/detail_bonus/') ?><?= $data['kode_member'] ?>" class="btn btn-warning btn-sm mt-1">Detail Bonus</a>
              -->
              <!--   <a href="<?= base_url('admin/detail_withdraw/') ?><?= $data['kode_member'] ?>" class="btn btn-danger btn-sm mt-1">Detail Withdraw</a>
              -->
                        <!--  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $data['id'] ?>">
                        Setujui
                        </button>

                        <div class="modal fade" id="exampleModalCenter<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <form method="post" action="<?= base_url('admin/act_setuju') ?>">

                        <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Submit" name="setujui">
                        </form>

                        </div>
                        </div>
                        </div>
                      </div> -->

                      <div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label><strong>username</strong></label>
                                <p><?= $data['username'] ?></p>
                              </div>
                              <hr>
                              <div class="form-group">
                                <label><strong>Email</strong></label>
                                <p><?= $data['email'] ?></p>
                              </div>
                              <hr>
                              <div class="form-group">
                                <label><strong>No Telp</strong></label>
                                <p><?= $data['no_telp'] ?></p>
                              </div>
                              <hr>
                              <div class="form-group">
                                <label><strong>NIK KTP</strong></label>
                                <p><?= $data['nik'] ?></p>
                              </div>
                              <hr>
                              <div class="form-group">
                                <label><strong>Tanggal Mendaftar</strong></label>
                                <p><?= $data['date_create'] ?></p>
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
                 <tr style="background-color: orange; color: black; text-align: center; font-size: 13px;">
                  <td>Total : </td>
                  <td><?= $no -= 1 ?></td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td><?= $stok_ratumerak ?></td>
                  <td><?= $stok_markisa ?></td>
                  <td><?= $stok_b_ratumerak ?></td>
                  <td><?= $stok_b_markisa ?></td>
                  <td><?= "Rp " . number_format($total_afiliasi ,0,',','.'); ?></td>
                  <td><?= "Rp " . number_format($total_bonusCasMerak ,0,',','.'); ?></td>
                  <td><?= "Rp " . number_format($total_bonusCasMarkisa ,0,',','.'); ?></td>
                  <td><?= "Rp " . number_format($bonus_afiliator,0,',','.'); ?></td>
                  <td>-</td>
                </tr>
              </tfoot>
            </table>
            <hr>

             <!--  <h5 class="mt-2 mb-2">Total Jumlah Member : <?= $total ?></h5>
              <h5>Total Stok Ratumerak : <?= $stok_ratumerak ?> Stok </h5>
              <h5>Total Stok Markisa : <?= $stok_markisa ?> Stok </h5>
              <h5>Total Stok Bonus Ratumerak : <?= $stok_b_ratumerak ?> Stok </h5>
              <h5>Total Stok Bonus Markisa : <?= $stok_b_markisa ?> Stok </h5>
              <hr>
              <h5>Total Jumlah Bonus Afiliasi : <?= "Rp " . number_format($total_afiliasi ,0,',','.'); ?></h5>
              <h5 class="">Total Jumlah Bonus Cashback Ratumerak : <?= "Rp " . number_format($total_bonusCasMerak ,0,',','.'); ?></h5>
              <h5 class="">Total Jumlah Bonus Cashback Markisa : <?= "Rp " . number_format($total_bonusCasMarkisa ,0,',','.'); ?></h5> -->
            </div>

          </div>
        </div>

      </div>