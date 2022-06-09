<div class="container-fluid py-4">

      <div class="row">

        <div class="col-12">

          <div class="card my-4">

            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                <h6 class="text-white text-capitalize ps-3">Data Order Markisa</h6>

              </div>

            </div>

            <div class="card-body px-0 pb-2">

                

                <div class="container">

                  <div class="card">

            <div class="card-header pb-0 px-3">

              <h6 class="mb-0">Billing Information</h6>

            </div>

            <div class="card-body pt-4 p-3">

              <ul class="list-group">

                  <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">

                    <div class="d-flex flex-column">

                      <h6 class="mb-3 text-sm">Produk Markisa</h6>

                      <span class="mb-2 text-xs">Harga: <span class="text-dark font-weight-bold ms-sm-2"><?= $markisa['harga'] ?></span></span>

                      <hr>

                      <span class="mb-2 text-xs">Qty: <span class="text-dark ms-sm-2 font-weight-bold">10 qty</span></span>

                      <hr>

                      <span class="mb-2 text-xs">Order Id: <span class="text-dark ms-sm-2 font-weight-bold"><?= $markisa['order_id'] ?></span></span>

                      <hr>



                       <span class="mb-2 text-xs">Status Pembayaran: <span class="text-dark ms-sm-2 font-weight-bold">

                        <?php if ($markisa['status'] == 200) { ?>

                           <small class="badge badge-success">Success</small>

                        <?php }else{ ?>

                          <small class="badge badge-danger">Panding</small>

                        <?php } ?>

                       </span></span>

			<?php
			$cek_pay = $this->db->get_where('tbl_checkout_markisa',['kode_member' => $markisa['kode_member']])->row_array();
			?>
			<?php if ($markisa['status'] == 200) { ?>
                         <a href="<?= $cek_pay['pdf'] ?>" target="_blank" class="btn btn-primary btn-block">Detail Transaksi</a>
			<?php } ?>

                       <a href="<?= base_url('utama/produk_markisa') ?>" class="btn btn-primary btn-sm mt-3">Kembali</a>



                    </div>

                    <div class="ms-auto text-end">

                     
                    </div>

                  </li>

              </ul>

            </div>

          </div>

                </div>



            </div>

          </div>

        </div>

      </div>

    </div>