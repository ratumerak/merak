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
                                            
                                           
                                           
                                        </tr>

                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>