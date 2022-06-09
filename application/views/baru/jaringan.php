<div class="main-panel">
        <div class="content-wrapper">
          <div class="row"> 
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Refferal Anda</h4>

                  <div class="table-responsive">
                     <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>
                            Username
                          </th>
                          <th>
                            No Telp
                          </th>
                           <th>
                            Date Register
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($level2 as $data) { ?>
                        <tr>
                          <td>
                            <?= $no++ ?>
                          </td>
                          <td class="py-1">
                            <img src="<?= base_url('assets_baru/') ?>images/user31.png" alt="image"/>
                            <p><?= ucwords($data['username']) ?></p>
                            <small><?= $data['email'] ?></small>
                          </td>
                          <td>
                            <?= $data['no_telp'] ?>
                          </td>
                           <td>
                            <?= $data['date_create'] ?>
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
    