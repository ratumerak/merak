 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pembelian Produk Markisa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Produk</th>
                                            <th>Kode Member</th>
                                            <th>Produk</th>
                                           <!--  <th>Bukti Pembayaran</th> -->
                                            <th>Tgl Order</th>
                                             <!-- <th>Opsi</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Produk</th>
                                            <th>Kode Member</th>
                                             <th>Produk</th>
                                           <!--  <th>Bukti Pembayaran</th> -->
                                            <th>Tgl Order</th>
                                             <!-- <th>Opsi</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($markisa as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['kode_produk'] ?></td>
                                            <td><?= $data['kode_member'] ?></td>
                                            <td><?= $data['merek'] ?></td>
                                            <!-- <td>
                                              <?php 
                                                  $bukti = $this->db->get_where('tbl_bukti_markisa',['kode_produk' => $data['kode_produk']])->row_array();
                                                  if ($bukti == false) {
                                                    echo "Belum ada pembayran";
                                                  }else{

                                               ?>

                                               <img src="<?= base_url('assets/markisa/') ?><?= $bukti['gambar'] ?>" style="height: 100px;">
                                             <?php } ?>
                                            </td> -->
                                            <td><?= $data['date_create'] ?></td>
                                           
                                           <!--  
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
                                                      Apakah anda ingin menyetujui pembelian produk ini ?
                                                      <form method="post" action="">
                                                      
                                                      <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">
                                                       <input type="hidden" name="kode_produk" value="<?= $data['kode_produk'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <input type="submit" class="btn btn-primary" value="Submit" name="setujui">
                                                      </form>
                                            
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                            
                                            </td> -->
                                           
                                        </tr>

                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>