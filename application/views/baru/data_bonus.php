<div class="main-panel">

  <div class="content-wrapper">

    <div class="row"> 

      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">

            <form class="form-inline" method="post">
              <div class="form-group mr-3 mb-3">
                <label for="inputPassword2" class="sr-only">Cari Berdaserkan Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="inputPassword2" placeholder="Tanggal">
              </div>
              <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i> Cari </button>
            </form>

            <?php 
            if (isset($tgl)) { ?>

              <h4 class="card-title">Data Bonus Afiliasi Tanggal <?= $tgl ?></h4>
            <?php }else{ ?>
              <h4 class="card-title">Data Bonus Afiliasi</h4>
            <?php } ?>



            <div class="alert alert-primary alert-dismissible fade show" role="alert">

              <strong>Hello <?= $this->session->username ?>. </strong> Untuk saat ini anda sudah mengumpulkan bonus sebanyak <strong class="text-success">"<?= "Rp " . number_format($total['bonus'],0,',','.'); ?>"</strong> Apakah anda ingin melakukan <a href="<?= base_url('utama/withdraw') ?>"> withdraw?</a>

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>





            <div class="table-responsive">

              <table class="table table-striped">

                <thead>

                  <tr>

                   <th>

                    No

                  </th>


                  <th>

                    Bonus

                  </th>

                  <th>

                    Date

                  </th>
                  <th>

                   From

                 </th>

                 <th>

                   Opsi

                 </th>


               </tr>

             </thead>

             <tbody>

               <?php
               $no = 1;
               foreach ($bonus as $data) { ?>

                <tr>
                  <td>

                   <?= $no++ ?>

                 </td>


                 <td class="py-1">

                  <small class="badge badge-success"> <?=  "Rp " . number_format($data['bonus'],0,',','.');  ?> </small>

                </td>



                <td>

                  <p><?= $data['date'] ?></p>

                </td>

                <td>

                  <?php 
                  $member = $this->db->get_where('tbl_register',['kode_member' => $data['dari']])->row_array();
                  ?>

                  <p><?= $member['username'] ?></p>


                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                    Detail
                  </button>
                </td>


                <!-- Modal Detail -->

                <div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                  <div class="modal-dialog" role="document">

                    <div class="modal-content">

                      <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Detail Bonus</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                          <span aria-hidden="true">&times;</span>

                        </button>

                      </div>

                      <div class="modal-body">

                        <div class="form-group">

                          <?php 

                          $detail = $this->db->get_where('tbl_topup',['order_id' => $data['id_order']])->row_array();

                          ?>


                          <label><strong>Produk</strong></label>

                          <p><?= $detail['produk'] ?></p>

                        </div>

                        <hr>



                        <div class="form-group">

                          <label><strong>Jumlah Topup</strong></label>

                          <p><?= $detail['jumlah_topup'] ?> Paket</p>

                        </div>

                        <hr>

                        <div class="form-group">

                          <label><strong>Qty Produk</strong></label>

                          <p><?= $detail['qty'] ?> Sak</p>

                        </div>

                        <hr>

                        <div class="form-group">

                          <label><strong>Harga</strong></label>



                          <p><?= $detail['harga'] ?></p>

                        </div>
                        <hr>

                        <div class="form-group">

                          <label><strong>Date</strong></label>



                          <p><?= $detail['date_create'] ?></p>

                        </div>



                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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



<!-- content-wrapper ends -->

