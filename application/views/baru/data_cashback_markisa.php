<div class="main-panel">

  <div class="content-wrapper">

    <div class="row"> 

      <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

          <div class="card-body">
           <?php 
           if (isset($tgl)) { ?>

            <h4 class="card-title">Data Bonus Cashback Markisa Tanggal <?= $tgl ?></h4>
          <?php }else{ ?>
            <h4 class="card-title">Data Bonus Cashback Markisa</h4>
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

                    Produk

                  </th>



                  <th>

                    Qty Order

                  </th>



                  <th>

                    Bonus Cashback

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

               <?php foreach ($bonus_cashback as $data) { ?>

                <tr>

                  <td>Ratumerak</td>

                  <td><?= $data['qty_order']; ?></td>

                  <td class="py-1">

                    <small class="badge badge-success"> <?=  "Rp " . number_format($data['bonus_cashback'],0,',','.');  ?> </small>

                  </td>



                  <td>

                    <p><?= $data['date_create'] ?></p>

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

                        <h5 class="modal-title" id="exampleModalLabel">Detail Order</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                          <span aria-hidden="true">&times;</span>

                        </button>

                      </div>

                      <div class="modal-body">

                        <div class="form-group">

                          <?php 

                          $detail = $this->db->get_where('tbl_order',['id_order' => $data['id_order']])->row_array();

                          ?>


                          <label><strong>Nama</strong></label>

                          <p><?= $detail['nama'] ?></p>

                        </div>

                        <hr>

                        <div class="form-group">

                          <label><strong>No Telp</strong></label>

                          <p><?= $detail['no_telp_pembeli'] ?></p>

                        </div>

                        <hr>

                        <div class="form-group">

                          <label><strong>Qty</strong></label>

                          <p><?= $detail['qty'] ?></p>

                        </div>

                        <hr>

                        <div class="form-group">

                          <label><strong>Provinsi</strong></label>

                          <?php 

                          $prov = $this->db->get_where('tbl_provinsi',['id' => $detail['prov']])->row_array();

                          ?>

                          <p><?= $prov['name'] ?></p>

                        </div>

                        <hr>

                        <div class="form-group">

                          <label><strong>Kabupaten</strong></label>

                          <?php 

                          $kab = $this->db->get_where('tbl_kabupaten',['id' => $detail['kab']])->row_array();

                          ?>

                          <p><?= $kab['name'] ?></p>

                        </div>

                        <hr>

                        <div class="form-group">

                          <label><strong>Kecamatan</strong></label>

                          <?php 

                          $kec = $this->db->get_where('tbl_kecamatan',['id' => $detail['kec']])->row_array();

                          ?>

                          <p><?= $kec['name'] ?></p>

                        </div>

                        <hr>

                        <div class="form-group">

                          <label><strong>Kelurahan</strong></label>

                          <?php 

                          $kel = $this->db->get_where('tbl_kelurahan',['id' => $detail['kel']])->row_array();

                          ?>

                          <p><?= $kel['name'] ?></p>

                        </div>

                        <hr>

                        <div class="form-group">

                          <label><strong>Alamat Lengkap</strong></label>



                          <p><?= $detail['alamat_lengkap'] ?></p>

                        </div>

                        <hr>


                        <div class="form-group">

                          <label><strong>Tgl Order</strong></label>

                          <p><?= $detail['data_order'] ?></p>

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

