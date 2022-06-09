<div class="container-fluid py-4">

      <div class="row">

        <div class="col-12">

          <div class="card my-4">

            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                <h6 class="text-white text-capitalize ps-3">Data Order Anda</h6>

              </div>

            </div>

            <div class="card-body px-0 pb-2">

              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">

                  <thead>

                    <tr>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>

                       <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>

                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>



                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opsi</th>

                    </tr>

                  </thead>

                  <tbody>

                     <?php foreach ($order as $data) { ?>

                    <tr>

                      <td>

                        <div class="d-flex px-2 py-1">

                          <div>

                            <img src="../assets2/img/store.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">

                          </div>

                          <div class="d-flex flex-column justify-content-center">
                            <a href="#" class="" data-toggle="modal" data-target="#statusorder<?= $data['id_order'] ?>">
                            <h6 class="mb-0 text-sm"><?= $data['nama'] ?></h6>

                            <p class="text-xs text-secondary mb-0"><?= $data['no_telp_pembeli'] ?></p>
                            </a>

                          </div>

                        </div>
                        
                         <!--  Modal status Order -->
                       <div class="modal fade" id="statusorder<?= $data['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h6 class="modal-title" id="exampleModalLabel">Orders overview</h6>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="card-body p-3">
                                <?php 
                                $id_order = $data['id_order'];
                                $status = $this->db->get_where('tbl_status_order',['id_order' => $id_order])->result_array();
                                
                                if($status == false){
                               ?>
                               <center>
                               <img src="<?= base_url('assets2/img/audit.png')?>" class="rounded" style="height: 100px;"><br>
                               <h6 class="text-info">Orderan anda belum diproses</h6>
                               </center>
                               <?php }else{ ?>
                                <div class="timeline timeline-one-side">
                             
                               
                               <?php foreach ($status as $rule) {  ?>
                                  <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                    <?php if($rule['status'] == 'Pesanan sedang diproses'){ ?>
                                      <i class="material-icons text-success text-gradient">notifications</i>
                                    <?php }elseif($rule['status'] == 'Pesanan dalam perjalanan'){ ?>
                                    <i class="material-icons text-primary text-gradient">moped</i>
                                    <?php }elseif($rule['status'] == 'Pesanan telah sampai tujuan'){ ?>
                                    <i class="material-icons text-warning text-gradient">room</i>
                                    <?php }elseif($rule['status'] == 'Pesanan selesai'){ ?>
                                    <i class="material-icons text-info text-gradient">check_circle</i>
                                    <?php } ?>
                                    </span>
                                    <div class="timeline-content">
                                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?= $rule['status'] ?></h6>
                                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?= $rule['date_create'] ?></p>
                                    </div>
                                  </div>
                                <?php } ?>
                                <?php } ?>
                                
                                 
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>

                      </td>

                      <td class="text-center">

                        <p class="text-xs font-weight-bold mb-0"><?= $data['qty'] ?></p>

                        <p class="text-xs text-secondary mb-0"><?= $data['produk'] ?></p>

                      </td>

                      <td class="align-middle text-center text-sm">

                       

                          <?php 



                            if ($data['status_order'] == '0') { ?>

                                 <span class="badge badge-sm bg-gradient-dark">Menunggu</span>

                            <?php }else{ ?>

                               <span class="badge badge-sm bg-gradient-success"><?= $data['status_order'] ?></span>

                                

                          <?php } ?>  

                         

                       

                      </td>

                      <td class="align-middle text-center">

                        <span class="text-secondary text-xs font-weight-bold"><?= $data['data_order'] ?></span>

                      </td>

                      <td class="align-middle">

                        <!-- Button Detail modal -->

                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['id_order'] ?>">

                            Detail

                          </button>



                          <?php 

                          if ($data['status_order'] == '0') {?>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalHapus<?= $data['id_order'] ?>">

                            Hapus

                          </button>

                          <?php } ?>





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

                                <button type="button" class="btn btn-primary">Save changes</button>

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

                                <center>

                                <p>Apakah anda ingin menghapus orderan ini ?</p>

                                </center>

                                <form method="post" action="<?= base_url('utama/hapus_order') ?>">

                                    <input type="hidden" name="id_order" value="<?= $data['id_order'] ?>">

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

                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>