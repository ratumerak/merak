 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
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
                                            <th>Bukti</th>
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
                                            <th>Bukti</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($user as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['kode_member'] ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['no_telp'] ?></td>
                                            <td>
                                              <?php

                                                  $bukti = $this->db->get_where('tbl_bukti_tf',['kode_member' => $data['kode_member']])->row_array();

                                               ?>
                                               <?php if($bukti == false) {
                                                echo "Tidak ada bukti";

                                              }else{
                                               ?>

                                               <img src="<?= base_url('assets/bukti/') ?><?= $bukti['gambar'] ?>" style="height: 100px;">
                                             <?php } ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                                                  Detail
                                                </button>

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
                                                      Apakah anda ingin menyetujui akun ini ?
                                                      <form method="post" action="<?= base_url('admin/act_setuju') ?>">
                                                      
                                                      <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <input type="submit" class="btn btn-primary" value="Submit" name="setujui">
                                                      </form>
                                            
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                             <div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <div class="form-group">
                                                            <label><strong>username</strong></label>
                                                            <p><?= $data['username'] ?></p>
                                                        </div>
                                                        <hr>
                                                         <div class="form-group">
                                                            <label><strong>Email</strong></label>
                                                            <p><?= $data['email'] ?></p>
                                                        </div>
                                                         <hr>
                                                         <div class="form-group">
                                                            <label><strong>No Telp</strong></label>
                                                            <p><?= $data['no_telp'] ?></p>
                                                        </div>
                                                        <hr>
                                                         <div class="form-group">
                                                            <label><strong>NIK KTP</strong></label>
                                                           <p><?= $data['nik'] ?></p>
                                                        </div>
                                                         <hr>
                                                         <div class="form-group">
                                                            <label><strong>Tanggal Mendaftar</strong></label>
                                                           <p><?= $data['date_create'] ?></p>
                                                        </div>
                                                         
                                                         
                                                        
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                       
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