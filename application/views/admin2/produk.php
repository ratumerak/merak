 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
 </div>

<div class="card-body">
                          <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus"></i> Tambah Produk
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" required="">
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
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Date create</th>
                                             <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Date create</th>
                                             <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($produk as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama_produk'] ?></td>
                                            <td><?=  "Rp " . number_format($data['harga'],0,',','.'); ?></td>
                                            <td><?= $data['date_create'] ?></td>
                                            <td>
                                                
                                               <!--   <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $data['id'] ?>">
                                                    Hapus
                                                </button> -->

                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?= $data['id'] ?>">
                                                    Edit
                                                </button>

                                                <div class="modal fade" id="exampleModalCenter<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    
                                                      <form method="post" action="">
                                                      <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                      <div class="form-group">
                                                        <label>Nama Produk</label>
                                                        <input type="text" name="nama_produk" class="form-control" required="" value="<?= $data['nama_produk'] ?>">
                                                      </div>

                                                      <div class="form-group">
                                                        <label>Harga</label>
                                                        <input type="number" name="harga" class="form-control" required="" value="<?= $data['harga'] ?>">
                                                      </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <input type="submit" class="btn btn-primary" value="Submit" name="edit">
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