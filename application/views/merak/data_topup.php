<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data Topup Produk</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
                
                <div class="container" id="app">
                            <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Billing Information</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <?php 
                  foreach ($topup as $data) { ?>

                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm">#<?= $data['order_id'] ?></h6>
                        <span class="mb-2 text-xs">Produk Topup: <span class="text-dark font-weight-bold ms-sm-2"><?= $data['produk'] ?></span></span>
                        <span class="mb-2 text-xs">Jumlah Paket: <span class="text-dark ms-sm-2 font-weight-bold"><?= $data['jumlah_topup'] ?></span></span>

                        <span class="mb-2 text-xs">Jumlah Qty: <span class="text-dark ms-sm-2 font-weight-bold"><?= $data['qty'] ?></span></span>

                        <span class="mb-2 text-xs">Harga: <span class="text-dark ms-sm-2 font-weight-bold"><?= $data['harga'] ?></span></span>

                        <span class="mb-2 text-xs">Status: <span class="text-dark ms-sm-2 font-weight-bold">
                          <?php if ($data['status'] == 200) { ?>
                            <small class="badge badge-success">Success</small>
                          <?php }else{ ?>
                            <small class="badge badge-danger">Panding</small>
                          <?php } ?>
                        </span></span>
                        <span class="text-xs">Date Topup: <span class="text-dark ms-sm-2 font-weight-bold"><?= $data['date_create'] ?></span></span>

                         <a href="<?= $data['pdf'] ?>" target="_blank" class="btn btn-primary btn-block btn-sm mt-2"><i class="fas fa-download" style="font-size: 10px;"></i> Detail Transaksi</a>
                      </div>
                      <div class="ms-auto text-end">
                        <?php if ($data['status'] != 200) { ?>
                          <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                          <i class="material-icons text-sm">delete</i> Delete
                          </button>

                         

                        <?php }?>
                            
                        <!-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                        <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a> -->
                      </div>
                    </li>
                    <hr>

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
                              <h6>Apakah anda ingin menghapus orderan ini ?</h6>
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

              <?php } ?>
                
              </ul>
            </div>
          </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>



