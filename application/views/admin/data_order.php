 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
    </div>
    <div class="card-body">
      <?php if (isset($tgl_awal)) { ?>
        <a href="<?= base_url('Laporan/data_order?tgl_awal=') ?><?= $tgl_awal ?>&&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
      <?php }else{ ?>
        <a href="<?= base_url('Laporan/data_order') ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
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
              <th>Kode Member</th>
              <th>No telp</th>
              <th>Qty</th>
              <th>Produk</th>
              <th>Alamat Tujuan</th>
              <th>Tgl Order</th>
              <th>Status Order</th>
              <th>Opsi</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($order as $data) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><a href="#" data-toggle="modal" data-target="#example<?= $data['id_order'] ?>">
                  <?= $data['kode_member'] ?>
                </a></td>
                <td><?= $data['no_telp_pembeli'] ?></td>
                <td><?= $data['qty'] ?></td>
                <td><?= $data['produk'] ?></td>
                <td><?= $data['alamat_lengkap'] ?></td>
                <td><?= $data['data_order'] ?></td>
                <td>

                  <?php 

                  if ($data['status_order'] == '0') {
                    echo "Menunggu";
                  }else{
                    echo $data['status_order'];
                  }

                  ?>


                </td>

                <td>
                  <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#exampleModal<?= $data['id_order'] ?>">
                    Detail
                  </button>

                  <button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#exampleModalCenter<?= $data['id_order'] ?>">
                    Status
                  </button>

                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancel<?= $data['id_order'] ?>">
                    Cancel
                  </button>

                  <div class="modal fade" id="example<?= $data['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Member</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <?php 
                          $this->db->where('kode_member',$data['kode_member']);
                          $member = $this->db->get('tbl_profil')->row_array();
                          ?>

                          <div class="form-group">
                            <label><strong>Nama</strong></label>
                            <p><?= $member['nama'] ?></p>
                          </div>
                          <hr>

                          <div class="form-group">
                            <label><strong>Jenis Kelamin</strong></label>
                            <p><?= $member['jk'] ?></p>
                          </div>
                          <hr>

                          <div class="form-group">
                            <label><strong>Tgl Lahir</strong></label>
                            <p><?= $member['tgl_lahir'] ?></p>
                          </div>
                          <hr>

                          <div class="form-group">
                            <label><strong>Tempat Lahir</strong></label>
                            <p><?= $member['tempat_lahir'] ?></p>
                          </div>
                          <hr>

                          <div class="form-group">
                            <label><strong>Alamat Lengkap</strong></label>
                            <p><?= $member['alamat_lengkap'] ?></p>
                          </div>
                          <hr>
                          <div class="form-group">
                            <label><strong>NIK</strong></label>
                            <p><?= $member['nik'] ?></p>
                          </div>
                          <hr>

                          <div class="form-group">
                            <label><strong>Nomor Rek</strong></label>
                            <p><?= $member['no_rek'] ?></p>
                          </div>
                          <hr>


                          <div class="form-group">
                            <label><strong>Nama Bank</strong></label>
                            <p><?= $member['name_bank'] ?></p>
                          </div>
                          <hr>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </form>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="exampleModalCenter<?= $data['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       Update status pesanan
                       <form method="post" action="<?= base_url('admin/act_setatus_order') ?>">

                        <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">
                        <input type="hidden" name="id" class="" value="<?= $data['id_order'] ?>">
                        <input type="hidden" name="produk" class="" value="<?= $data['produk'] ?>">
                        <input type="hidden" name="nohp" class="" value=" <?= $data['no_telp_pembeli'] ?>">
                        <input type="hidden" name="id_store" class="" value=" <?= $data['store'] ?>">
                        <input type="hidden" name="qty" class="" value=" <?= $data['qty'] ?>">

                        <select class="form-control" name="status">
                          <option>Pesanan sedang diproses</option>
                          <option>Pesanan dalam perjalanan</option>
                          <option>Pesanan telah sampai tujuan</option>
                          <option>Pesanan selesai</option>
                        </select>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Submit" name="setujui">
                      </form>

                    </div>
                  </div>
                </div>
              </div>


              <div class="modal fade" id="exampleModal<?= $data['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label><strong>Nama</strong></label>
                        <p><?= $data['nama'] ?></p>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label><strong>No Telp</strong></label>
                        <p><?= $data['no_telp_pembeli'] ?></p>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label><strong>Qty</strong></label>
                        <p><?= $data['qty'] ?></p>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label><strong>Provinsi</strong></label>
                        <?php 
                        $prov = $this->db->get_where('tbl_provinsi',['id' => $data['prov']])->row_array();
                        ?>
                        <p><?= $prov['name'] ?></p>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label><strong>Kabupaten</strong></label>
                        <?php 
                        $kab = $this->db->get_where('tbl_kabupaten',['id' => $data['kab']])->row_array();
                        ?>
                        <p><?= $kab['name'] ?></p>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label><strong>Kecamatan</strong></label>
                        <?php 
                        $kec = $this->db->get_where('tbl_kecamatan',['id' => $data['kec']])->row_array();
                        ?>
                        <p><?= $kec['name'] ?></p>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label><strong>Kelurahan</strong></label>
                        <?php 
                        $kel = $this->db->get_where('tbl_kelurahan',['id' => $data['kel']])->row_array();
                        ?>
                        <p><?= $kel['name'] ?></p>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label><strong>Alamat Lengkap</strong></label>

                        <p><?= $data['alamat_lengkap'] ?></p>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label><strong>Status Order</strong></label><br>

                        <?php 

                        if ($data['status_order'] == '0') {
                          echo "Menunggu";
                        }else{
                          echo $data['status_order'];
                        }

                        ?>
                      </div>
                      <hr>
                      <div class="form-group">
                        <label><strong>Tgl Order</strong></label>
                        <p><?= $data['data_order'] ?></p>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal cancel -->
              <div class="modal fade" id="cancel<?= $data['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h6>Apakah anda ingin mengcancel orderan ini ?</h6>
                      <form method="post" action="<?= base_url('admin/cancel_order') ?>">
                        <input type="hidden" name="id_order" value="<?= $data['id_order'] ?>">
                        <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">
                        <input type="hidden" name="qty" value="<?= $data['qty'] ?>">
                        <input type="hidden" name="produk" value="<?= $data['produk'] ?>">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                      </form>
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
         <td><?= $no -= 1?></td>
         <td>-</td>
         <td><?=  $total_qty['qty'] ?></td>
         <td>-</td>
         <td>-</td>
         <td>-</td>
         <td>-</td>
         <td>-</td>
       </tr>
     </tfoot>
   </table>
   <hr>
   <!-- <h6 style="font-weight: bold"> Total Qty Order : <?=  $total_qty['qty'] ?> Qty</h6>
   <h6 style="font-weight: bold"> Total Qty Order Ratumerak : <?=  $total_qty_merak['qty'] ?> Qty</h6>
   <h6 style="font-weight: bold">  Total Qty Order Markisa : <?=  $total_qty_markisa['qty'] ?> Qty</h6>

   <h6 style="font-weight: bold"> Total Qty Order Bonus Ratumerak : <?=  $total_qty_Bonusmerak['qty'] ?> Qty</h6>
   <h6 style="font-weight: bold"> Total Qty Order Bonus Markisa : <?=  $total_qty_Bonusmarkisa['qty'] ?> Qty</h6> -->
 </div>
</div>
</div>

</div>