<div class="main-panel">
  <div class="content-wrapper">
    <div class="row"> 
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
           <?php 
           if (isset($tgl)) { ?>

            <h4 class="card-title">Data Order Ratumerak Tanggal <?= $tgl ?></h4>
          <?php }else{ ?>
           <h4 class="card-title">Data Order Ratumerak</h4>
         <?php } ?>

         <form class="form-inline" method="post">
          <div class="form-group mr-3 mb-3">
            <label for="inputPassword2" class="sr-only">Cari Berdaserkan Tanggal</label>
            <input type="date" class="form-control" name="tanggal" id="inputPassword2" placeholder="Tanggal">
          </div>
          <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i> Cari </button>
        </form>

        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  Nama
                </th>
                <th>
                  Qty
                </th>
                <th>
                  Status Pesanan
                </th>
                <th>
                  Date
                </th>
                <th>
                  Opsi
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($order as $data) { ?>
                <tr>
                  <td class="py-1">
                    <img src="<?= base_url('assets_baru/') ?>images/user31.png" alt="image"/>
                    <p><?= $data['nama'] ?></p>
                  </td>
                  <td>
                   <p><?= $data['qty'] ?></p>
                   <small class="text-center"><?= $data['produk'] ?></small>
                 </td>
                 <td>
                  <?php 
                  if ($data['status_order'] == '0') { ?>

                   <span class="badge badge-sm bg-warning">Menunggu</span>

                 <?php }else{ ?>

                   <span class="badge badge-sm bg-success"><?= $data['status_order'] ?></span>

                 <?php } ?>  
               </td>

               <td>
                <?= $data['data_order'] ?>
              </td>

              <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['id_order'] ?>">
                  Detail
                </button>

                <?php 

                if ($data['status_order'] == '0') {?>

                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalHapus<?= $data['id_order'] ?>">
                    Cancel Order
                  </button>

                <?php }else{ ?>
                 <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalstatus<?= $data['id_order'] ?>">
                   Detail Status
                 </button>

                 <!-- Modal detail status -->

                 <div class="modal fade" id="exampleModalstatus<?= $data['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                  <div class="modal-dialog" role="document">

                    <div class="modal-content">

                      <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Detail Status</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                          <span aria-hidden="true">&times;</span>

                        </button>

                      </div>

                      <div class="modal-body">

                       <?php 
                       $id_order = $data['id_order'];
                       $status = $this->db->get_where('tbl_status_order',['id_order' => $id_order])->result_array();
                       ?>

                       <?php foreach ($status as $rule) {  ?>
                        <div class="timeline-block mb-3">
                          <span class="timeline-step">
                            <?php if($rule['status'] == 'Pesanan sedang diproses'){ ?>
                              <i class="fas fa-user mb-2" style="font-size: 30px; color: orange;"></i>
                            <?php }elseif($rule['status'] == 'Pesanan dalam perjalanan'){ ?>
                             <i class="fas fa-car mb-2" style="font-size: 30px; color: green;"></i>
                           <?php }elseif($rule['status'] == 'Pesanan telah sampai tujuan'){ ?>
                            <i class="fas fa-cart-arrow-down mb-2" style="font-size: 30px; color: red;"></i>
                          <?php }elseif($rule['status'] == 'Pesanan selesai'){ ?>
                            <i class="fas fa-money-bill mb-2" style="font-size: 30px; color: blue"></i>
                          <?php } ?>
                        </span>
                        <div class="timeline-content">
                          <h6 class="text-dark text-sm font-weight-bold mb-0"><?= $rule['status'] ?></h6>
                          <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?= $rule['date_create'] ?></p>
                        </div>
                      </div>
                    <?php } ?>

                    <div class="modal-footer">

                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>





                    </div>

                  </div>

                </div>

              </div>


            <?php } ?>
          </td>


          <!-- Modal Detail -->

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





          <!-- Modal Hapus -->

          <div class="modal fade" id="exampleModalHapus<?= $data['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">

              <div class="modal-content">

                <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                  </button>

                </div>

                <div class="modal-body">

                  <p>Apakah anda ingin mengcancel orderan ini ?</p>



                  <form method="post" action="<?= base_url('utama/hapus_order') ?>">
                    <input type="hidden" name="id_order" value="<?= $data['id_order'] ?>">
                    <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">
                    <input type="hidden" name="qty" value="<?= $data['qty'] ?>">
                    <input type="hidden" name="produk" value="<?= $data['produk'] ?>">

                    <div class="modal-footer">


                      <button type="submit" class="btn btn-primary">Yes</button>

                    </form>

                  </div>

                </div>

              </div>

            </div>



          </tr>

        <?php } ?>

      </tbody>
    </table>
  </div>
</div>
</div>
</div>


</div>
</div>
<!-- content-wrapper ends -->
