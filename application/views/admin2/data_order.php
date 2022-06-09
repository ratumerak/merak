 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
                        </div>
                        <div class="card-body">
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
                                    <tfoot>
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
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($order as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['kode_member'] ?></td>
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
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['id_order'] ?>">
                                                  Detail
                                                </button>

                                                 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $data['id_order'] ?>">
                                                    Status
                                                </button>

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
                                                      <select class="form-control" name="status">
                                                        <option>Pesanan sedang diproses</option>
                                                        <option>Pesanan dalam perjalanan</option>
                                                        <option>Pesanan telah samapi tujuan</option>
                                                        <option>Pesenan selesai</option>
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

                                            
                                            </td>
                                           
                                        </tr>

                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>