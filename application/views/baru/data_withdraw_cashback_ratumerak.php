<div class="main-panel">

        <div class="content-wrapper">

          <div class="row"> 

            <div class="col-lg-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Data Withdraw Cashback Ratumerak</h4>



                 



                    <div class="table-responsive">

                    <table class="table table-striped">

                      <thead>

                        <tr>

                        <th>

Kode Withdraw

</th>

                          <th>

                            Jumlah Penarikan

                          </th>

                          <th>

                            Status

                          </th>

                          <th>

                            Date

                          </th>

		

                        </tr>

                      </thead>

                      <tbody>

                         <?php foreach ($wt as $data) { ?>

                        <tr>

                        <td>
                          <?= $data['kode_withdraw'] ?>
                        </td>

                          <td class="py-1">

                             <?=  "Rp " . number_format($data['penarikan'],0,',','.'); ?>

                          </td>

                          <td>

                            <?php 

                              if ($data['status'] == 1) { ?>

                                  <small class="badge badge-success">Disetujui</small>

                             <?php }else{ ?>

                                   <small class="badge badge-warning">Menunggu Persetujuan</small>

                             <?php }

                           ?>

                          </td>

                          <td>

                              <p><?= $data['date_create'] ?></p>

                          </td>
			 <td>
                         


                          <div class="modal fade" id="exampleModalcancel<?= $data['id_withdraw'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                          <div class="modal-dialog" role="document">

                            <div class="modal-content">

                              <div class="modal-header">

                                <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                  <span aria-hidden="true">&times;</span>

                                </button>

                              </div>

                              <div class="modal-body">

                                <p>Apakah anda ingin mengcancel withdraw ini ?</p>

                              

                                <form method="post" action="<?= base_url('utama/cancel_withdraw') ?>">
                                    <input type="hidden" name="id" value="<?= $data['id_withdraw'] ?>">
                                    <input type="hidden" name="Withdraw" value="<?= $data['penarikan'] ?>">
				    <input type="hidden" name="kode_member" value="<?= $data['kode_member'] ?>">

                              <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <button type="submit" class="btn btn-primary">Yes</button>

                                </form>

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

            

            

          </div>

        </div>

        <!-- content-wrapper ends -->

    