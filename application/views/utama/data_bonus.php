 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Bonus Anda</h6>

                            <h6 class="float-right font-weight-bold  text-primary">Total Bonus Anda : Rp <?= number_format($total['bonus'],0,',','.'); ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bonus</th>
                                            <th>Waktu Menerima</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Jumlah</th>
                                            <th>Waktu Menerima</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($bonus as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?=  "Rp " . number_format($data['bonus'],0,',','.'); ?></td>
                                            <td><?= $data['date'] ?></td>
                                           
                                           
                                        </tr>

                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>