<div class="container-fluid py-4">

      <div class="row">

        <div class="col-12">

          <div class="card my-4">

            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                <h6 class="text-white text-capitalize ps-3">Data Member Anda</h6>

              </div>

            </div>

            <div class="card-body px-0 pb-2">

              <div class="table-responsive p-0">

             <?php if ($member == false) { ?>

                  <center>

                  <img src="<?= base_url('assets2/img/') ?>page-not-found.png" style="height: 100px;"><br>

                  <label class="text-center">Tidak ada data member</label>

                  </center>

                  

                <?php }else{ ?>

                <table class="table align-items-center mb-0">

                  <thead>

                    <tr>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telp</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opsi</th>

                    </tr>

                  </thead>

                  <tbody>

                   

                     <?php foreach ($member as $data) { ?>



                    <tr>

                      <td>

                        <div class="d-flex px-2 py-1">

                          <div>

                            <img src="<?= base_url('assets2/img/member.png')?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">

                          </div>

                          <div class="d-flex flex-column justify-content-center">

                            <h6 class="mb-0 text-sm"><?= $data['username'] ?></h6>

                            <p class="text-xs text-secondary mb-0"><?= $data['email'] ?></p>

                          </div>

                        </div>

                      </td>

                      <td class="text-center">

                        <p class="text-xs font-weight-bold mb-0"><?= $data['no_telp'] ?></p>

                      </td>

                      

                      

                      <td class="align-middle">

                        

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

                <?php } ?>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>