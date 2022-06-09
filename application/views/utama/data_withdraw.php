 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Withdraw Anda</h6>

                           
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Withdraw</th>
                                            <th>Jumlah Penarikan</th>
                                            <th>Status</th>
                                            <th>Tgl Penarikan</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Withdraw</th>
                                            <th>Jumlah Penarikan</th>
                                            <th>Status</th>
                                            <th>Tgl Penarikan</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($wt as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['kode_withdraw'] ?></td>
                                            <td><?=  "Rp " . number_format($data['penarikan'],0,',','.'); ?></td>
                                            <td>
                                                <?php 
                                                    if ($data['status'] == 1) {
                                                        echo "Withdraw disetujui";
                                                    }else{
                                                        echo "Menunggu proses persetujuan";
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