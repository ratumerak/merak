 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Topup </h6>

                           
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <?php 
                            foreach ($topup as $data) { ?>
                                <div class="col-sm-6 mt-5">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="<?= base_url('assets/img/markisa.jpeg') ?>" alt="..." class="img-thumbnail">
                                            <center>
                                             <button type="button" class="btn btn-danger btn-sm mt-3" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                                            Hapus order topup
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?=$data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <h5>Apakah anda ingin menghapus orderan ini ?</h5>
                                                    <form method="post" action="<?= base_url('utama/hapus_order_topup') ?>">
                                                        <input type="hidden" name="order_id" value="<?= $data['order_id'] ?>">
                                                   
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                     </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            </center>
                                        </div>
                                        <div class="col-sm-8">
                                            <table class="table">
                                                <tr>
                                                    <td>Order id</td>
                                                    <td>:</td>
                                                    <td><?= $data['order_id'] ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Nama produk</td>
                                                    <td>:</td>
                                                    <td><?= $data['produk'] ?></td>
                                                </tr>
                                                 <tr>
                                                    <td>Jumlah topup</td>
                                                    <td>:</td>
                                                    <td><?= $data['jumlah_topup'] ?></td>
                                                </tr>
                                                </tr>
                                                 <tr>
                                                    <td>Qty</td>
                                                    <td>:</td>
                                                    <td><?= $data['qty'] ?></td>
                                                </tr>

                                                </tr>
                                                 <tr>
                                                    <td>Hara</td>
                                                    <td>:</td>
                                                    <td><?= $data['harga'] ?></td>
                                                </tr>
                                                </tr>
                                                 <tr>
                                                    <td>Status order</td>
                                                    <td>:</td>
                                                    <td>
                                                    <?php 
                                                        if ($data['status'] == 200) { ?>
                                                        <p class="text-success">Success</p>
                                                    <?php }else{ ?>
                                                        <p class="text-warning">Panding</p>
                                                    <?php } ?>
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td>Date order</td>
                                                    <td>:</td>
                                                    <td><?= $data['date_create'] ?></td>
                                                </tr>

                                            </table>
                                            <a href="<?= $data['pdf'] ?>" target="_blank" class="btn btn-primary btn-block">Detail Transaksi</a>
                                             <a href="<?= base_url('utama/topup') ?>" target="_blank" class="btn btn-success btn-block">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>