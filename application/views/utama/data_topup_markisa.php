 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Topup Markisa</h6>

                           
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Tgl Topup</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>No</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Tgl Topup</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($topup as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['produk'] ?></td>
                                            <td><?=  "Rp " . number_format($data['harga'],0,',','.'); ?></td>
                                            <td><?= $data['qty'] ?></td>
                                            <td><?= $data['date_create'] ?></td>
                                            <td>
                                                <?php 

                                                    if ($data['status'] == 0) {
                                                        echo "Bukti pembayaran kosong";
                                                    }else{

                                                        echo "Bukti pembayaran sudah dikirim";
                                                    }
                                                 ?>
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                                                      Hapus
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <h5>Apakah ingin menghapus data ini ?</h5>
                                                            <form method="post" action="<?= base_url('utama/delete_topup_markisa') ?>">
                                                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                          
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter<?= $data['id'] ?>">
                                                  Upload Bukti 
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Bukti Pembayaran</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <form method="post" action="<?= base_url('utama/bukti_topup_markisa') ?>" enctype="multipart/form-data">
                                                        <input type="file" name="images" class="form-control" required="">
                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Send</button>
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