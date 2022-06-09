 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Topup</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>No</th>
                                            <th>Kode Member</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Status</th>
                                            <th>Tgl Topup</th>
                                             <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>No</th>
                                            <th>Kode Member</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Status</th>
                                            <th>Tgl Topup</th>
                                             <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($topup as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['kode_member'] ?></td>
                                            <td><?= $data['produk'] ?></td>
                                            <td><?= $data['harga'] ?></td>
                                            <td>

                                             <?php 
                                                $img = $this->db->get_where('tbl_bukti_topup',['id_topup' => $data['id']])->row_array();
                                                if ($img == false) {
                                                  echo "Belum ada pembayaran";
                                                }else{?>
                                                  <img src="<?= base_url('assets/topup/') ?><?= $img['gambar'] ?>" style="height: 80px;">

                                                <?php } ?>
                                                
                                              </td>
                                            <td>

                                              <?php 

                                                  if ($data['status_admin'] == 0) {
                                                    echo "Permintaan belum di proses";
                                                  }else{
                                                    echo "Permintaan sudah disetujui";
                                                  }

                                               ?>
                                             
                                                
                                              </td>
                                            <td><?= $data['date_create'] ?></td>
                                            
                                            <td>
                                                

                                                 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $data['id'] ?>">
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
                                                      Apakah anda ingin menyetujui topup ini ?
                                                      <form method="post" action="<?= base_url('admin/setuju_topup') ?>">
                                                      
                                                      <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">
                                                      <input type="hidden" name="qty" value="<?= $data['qty'] ?>">
                                                      <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                      <input type="hidden" name="slug" value="<?= $data['slug'] ?>">
                                                      <input type="hidden" name="harga" value="<?= $data['harga'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <input type="submit" class="btn btn-primary" value="Submit" name="setujui">
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