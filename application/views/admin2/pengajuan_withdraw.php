 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Withdraw</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Member</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>No Telp</th>
                                            <th>Nomor Rek</th>
                                            <th>Jumlah Withdraw</th>
                                            <th>Tgl Withdraw</th>
                                             <th>Status</th>
                                             <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>No</th>
                                            <th>Kode Member</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>No Telp</th>
                                            <th>Nomor Rek</th>
                                            <th>Jumlah Withdraw</th>
                                            <th>Tgl Withdraw</th>
                                            <th>Status</th>
                                             <th>Opsi</th>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($wt as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['kode_member'] ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['no_telp'] ?></td>
                                            <td><?= $data['no_rek'] ?></td>
                                            <td><?= $data['penarikan'] ?></td>
                                            <td><?= $data['date_create'] ?></td>
                                            <td>
                                              <?php   

                                                if ($data['status'] == 0) {
                                                  echo "Belum diproses";
                                                }else{

                                                  echo "Sudah diproses";
                                                }
                                               ?>
                                            </td>

                                            
                                            <td>
                                               

                                                 <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $data['id_withdraw'] ?>">
                                                    Setujui
                                                </button>

                                                <div class="modal fade" id="exampleModalCenter<?= $data['id_withdraw'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLongTitle">Pesan</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      Apakah anda ingin menyetujui akun ini ?
                                                      <form method="post" action="">
                                                      
                                                      <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">

                                                       <input type="hidden" name="id" value="<?= $data['id_withdraw'] ?>">

                                                         <input type="hidden" name="penarikan" value="<?= $data['penarikan'] ?>">

                                                         <input type="hidden" name="no_hp" value="<?= $data['no_telp'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <input type="submit" class="btn btn-primary" value="Submit" name="setujui">
                                                      </form>
                                            
                                                    </div>
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