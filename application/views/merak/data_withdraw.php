<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data Withdraw Anda</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Penarikan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                       <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($wt as $data) { ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          <?=  "Rp " . number_format($data['penarikan'],0,',','.'); ?>
                          </div>
                          
                        </div>
                      </td>
                      <td class="text-center">
                  
                           <?php 
                              if ($data['status'] == 1) { ?>
                                  <small class="badge badge-success">Disetujui</small>
                             <?php }else{ ?>
                                   <small class="badge badge-danger">Menunggu Persetujuan</small>
                             <?php }
                           ?>
                    
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"><?= $data['date_create'] ?></p>
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