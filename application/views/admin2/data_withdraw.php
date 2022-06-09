 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Withdraw</h6>
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

                                    
                                        </tr>

                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>