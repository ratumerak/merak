 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Titik Store</h6>
 </div>

<div class="card-body">
                          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus"></i> Tambah Titik Store
</button>

<a href="<?= base_url('admin/maps') ?>" class="btn btn-success mb-3">
  <i class="fas fa-map-marked-alt"></i> Maps
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Titik Store</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data">

           <div class="form-group"> 
            <label>Store</label>
            <select class="form-control" name="nama">
              <option>-- Pilih nama store --</option>
              <?php for ($i=1; $i <= 10 ; $i++) { ?>
                <option>Store <?= $i ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group"> 
            <label>Provinsi</label>
            <select class="form-control" name="prov">
              <option value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
            </select>
          </div>

          
           <div class="form-group">
            <label>Kabupaten / Kota</label>
           <select class="form-control" name="kab" id="kab">
            <option>-- Pilih Kabupaten / Kota --</option>
            <?php foreach ($kab as $data) { ?>
            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
              <?php } ?>
           </select>
          </div>
          
          
           <div class="form-group">
            <label>Kecamatan</label>
           <select class="form-control" name="kec" id="kec">
             <option>-- Pilih Kecamatan --</option>
            

           </select>
          </div>

          <div class="form-group">
            <label>Lang</label>
           <input type="text" name="lang" class="form-control" required="">
          </div>


          <div class="form-group">
            <label>Stok</label>
           <input type="number" name="stok" class="form-control" required="">
          </div>

         
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="kirim" value="Save changes">
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
                                            <th>Store</th>
                                            <th>Prov</th>
                                            <th>Kab</th>
                                            <th>Kec</th>
                                            <th>Lang</th>
                                            <th>Stok</th>
                                             <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>No</th>
                                           <th>Store</th>
                                            <th>Prov</th>
                                            <th>Kab</th>
                                            <th>Kec</th>
                                            <th>Lang</th>
                                            <th>Stok</th>
                                             <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($store as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td>
                                              <?php 
                                                $prov = $this->db->get_where('tbl_provinsi',['id' => $data['prov']])->row_array();
                                                echo $prov['name'];
                                               ?>
                                            </td>
                                            <td>
                                              <?php 
                                                $kab = $this->db->get_where('tbl_kabupaten',['id' => $data['kab']])->row_array();
                                                echo $kab['name'];
                                               ?>
                                            </td>
                                            <td>
                                              <?php 
                                                $kec = $this->db->get_where('tbl_kecamatan',['id' => $data['kec']])->row_array();
                                                echo $kec['name'];
                                               ?>
                                            </td>
                                            <td><?= $data['lang'] ?></td>
                                            <td><?= $data['stok'] ?></td>
                                          
                                           <td>
                                                
                                              <button type="button" class="btn btn-danger btn-sm mb-2" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>">
                                                    Hapus
                                                </button>

                                               <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#exampleModalstok<?= $data['id'] ?>">
                                                  Update Stok
                                              </button>

                                              <button type="button" class="btn btn-info btn-sm mb-2" data-toggle="modal" data-target="#exampleModalWilayah<?= $data['id'] ?>">
                                                  Wilayah
                                              </button>
                                            </td>


                                             <div class="modal fade" id="exampleModalWilayah<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Wilayah Store</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                  
                                                    <?php 
                                                      $wl = $this->db->get_where('tbl_wilayah_store',['id_store' => $data['id']])->result_array();
                                                      foreach ($wl as $det) {

                                                        $kec = $this->db->get_where('tbl_kecamatan',['id' => $det['kec']])->row_array();
                                                     ?>  

                                                      <div class="form-group">
                                                         <label style="font-weight: bold">Kecamatan</label>
                                                        <p><?= $kec['name'] ?></p>
                                                      </div> 

                                                      <hr>

                                                      <?php } ?>                                                     
                                                                                                  
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                          
                                            <form method="post" action="<?= base_url() ?>admin/hapus_store" enctype="multipart/form-data">
                                              <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                
                                                <p>Apakah anda ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <input type="submit" class="btn btn-primary" name="hapus" value="Yes">
                                            </form>
                                  
                                          </div>
                                        </div>
                                      </div>
                                    </div>



                                    <!-- Modal upadte stok -->

                                     <div class="modal fade" id="exampleModalstok<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Stok</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          
                                            <form method="post" action="<?= base_url() ?>admin/update_stok_store" enctype="multipart/form-data">
                                              <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                              <input type="text" name="stok" class="form-control" value="<?= $data['stok'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <input type="submit" class="btn btn-primary" name="update" value="Yes">
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