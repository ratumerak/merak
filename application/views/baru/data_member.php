<div class="main-panel">
  <div class="content-wrapper">
    <div class="row"> 
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Member Anda</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Member
                    </th>
                    <th>
                      No Telp
                    </th>
                    <th>
                      Opsi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($member as $data) { ?>
                    <tr>
                      <td class="py-1">
                        <img src="<?= base_url('assets_baru/') ?>images/user31.png" alt="image"/>
                        <p><?= $data['username'] ?></p>
                        <small><?= $data['email'] ?></small>
                      </td>
                      <td>
                        <?= $data['no_telp'] ?>
                      </td>
                      <td>
                       <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>"> Detail Member</button>

                       <a href="<?= base_url('utama/detail-transaksi/') ?><?= $data['kode_member'] ?>"class="btn btn-primary btn-sm"> Detail Transaksi</a>


                     </td>

                     <div class="modal fade" id="exampleModal<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Member</h5>
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
