 <div class="container-fluid">



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if (isset($tgl_akhir)) { ?>
          <a href="<?= base_url('Laporan/data_register?tgl_awal=') ?><?= $tgl_awal ?>&&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
        <?php }else{ ?>
         <a href="<?= base_url('Laporan/data_register') ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
       <?php } ?>
       <hr>
       <h5>Data <?= $tgl ?></h5>
       <hr>
       <form class="form-inline" method="post" action="">
        <div class="form-group mb-2">
          <label for="staticEmail2" class="sr-only">Tgl Awal</label>
          <input type="date" name="tgl_awal" class="form-control" id="inputdate2">
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label for="inputdate2" class="sr-only">Tgl Akhir</label>
          <input type="date" name="tgl_akhir" class="form-control">
        </div>
        <input type="submit" name="kirim" value="Search" class="btn btn-primary">
      </form>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Member</th>
            <th>Username</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Date</th>
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
            <th>Date</th>
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
              <td><?= $data['date'] ?></td>

              <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $data['id'] ?>">
                  Detail
                </button>


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
        <hr>
        <h5>Total Jumlah Registrasi : <?= $jml ?></h5>
      </div>
    </div>
  </div>

</div>