 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Kurir</h6>
 </div>

<div class="card-body">
                          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus"></i> Tambah Kurir
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kurir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="form-group"> 
            <label>Userame</label>
            <input type="text" name="username" class="form-control" required="">
          </div>

           <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required="">
          </div>
           <div class="form-group">
            <label>Jenis Kelamin</label>
           <select class="form-control" name="jk">
             <option>-- pilih jenis kelamin --</option>
             <option>Laki - Laki</option>
             <option>Perempuan</option>
           </select>
          </div>
           <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required="">
          </div>
           <div class="form-group">
            <label>No Telp</label>
            <input type="number" name="no_telp" class="form-control" required="" maxlength="13" minlength="11">
          </div>
           <div class="form-group">
            <label>No Nik</label>
            <input type="number" name="nik" class="form-control" required="" maxlength="16" minlength="16">
          </div>

           <div class="form-group">
            <label>Lokasi Store</label>
           <select class="form-control" name="lokasi">
             <option>-- Pilih lokasi store --</option>
             <?php foreach ($lokasi as $data) { ?>

              <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
            <?php } ?>
           </select>
          </div>
           <div class="form-group">
            <label>Gambar KTP</label><br>
           <input type="file" name="ktp" class="btn btn-success btn-sm">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="Password" name="pass" class="form-control" required="" minlength="6">
          </div>

         
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add" value="Save changes">
      </form>
      </div>
    </div>
  </div>
</div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Jk</th>
                                            <th>Email</th>
                                            <th>No Telp</th>
                                             <th>Lokasi</th>
                                             <th>KTP</th>

                                             <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>No</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Jk</th>
                                            <th>Email</th>
                                            <th>No Telp</th>
                                             <th>Lokasi</th>
                                            <th>KTP</th>
                                           
                                             <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($kurir as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?=  $data['nama_kurir'] ?></td>
                                            <td><?= $data['jk'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['no_telp'] ?></td>
                                            <td>
                                             <?= $data['nama'] ?>
                                            </td>
                                            <td>
                                              <img src="<?= base_url('assets/kurir/') ?><?= $data['gambar_ktp'] ?>" style="height: 80px;">
                                            </td>
                                            <td>
                                                
                                              <button type="button" class="btn btn-danger btn-sm mb-2" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>">
                                                    Hapus
                                                </button>

                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $data['id_store'] ?>">
                                                    Edit
                                                </button>

                                                <div class="modal fade" id="exampleModalCenter<?= $data['id_store'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    
                                                     <form method="post" action="<?= base_url() ?>admin/edit_kurir" enctype="multipart/form-data">
                                                      <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                                      <div class="form-group">
                                                        <label>Userame</label>
                                                        <input type="text" name="username" class="form-control" required="" value="<?= $data['username'] ?>">
                                                      </div>

                                                       <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" required="" value="<?= $data['nama_kurir'] ?>">
                                                      </div>

                                                       <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                       <select class="form-control" name="jk">
                                                        <option> <?= $data['jk'] ?></option>
                                                         <option>-- pilih jenis kelamin --</option>
                                                         <option>Laki - Laki</option>
                                                         <option>Perempuan</option>
                                                       </select>
                                                      </div>

                                                      <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" required="" value="<?= $data['email'] ?>">
                                                       </div>

                                                      <div class="form-group">
                                                        <label>No Telp</label>
                                                        <input type="number" name="no_telp" class="form-control" required="" maxlength="13" minlength="11" value="<?= $data['no_telp'] ?>">
                                                      </div>

                                                       <div class="form-group">
                                                        <label>No Nik </label>
                                                        <input type="number" name="nik" class="form-control" required="" maxlength="16" minlength="16" value="<?= $data['nik'] ?>">
                                                      </div>

                                                       <div class="form-group">
                                                        <label>Lokasi Store</label>
                                                       <select class="form-control" name="lokasi">
                                                        <option value="$data['id']"><?= $data['nama'] ?></option>
                                                         <option>-- Pilih lokasi store --</option>
                                                         <?php foreach ($lokasi as $data3) { ?>
                                                          <option value="<?= $data3['id'] ?>"><?= $data3['nama'] ?></option>
                                                        <?php } ?>
                                                       </select>
                                                      </div>

                                                       <div class="form-group">
                                                        <label>Gambar KTP</label><br>
                                                       <input type="file" name="ktp" class="">
                                                      </div>
                                                    

                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="edit" value="Save changes">
                                                  </form>
                                            
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>


                                      <div class="modal fade" id="exampleModalhapus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Pesan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          
                                            <form method="post" action="<?= base_url() ?>admin/hapus_kurir" enctype="multipart/form-data">
                                              <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                
                                                <p>Apakah anda ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <input type="submit" class="btn btn-primary" name="edit" value="Yes">
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