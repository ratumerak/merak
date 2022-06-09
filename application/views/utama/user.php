 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                        </div>
                        <div class="card-body">

                    <?php if ($profil == false) { ?>
                        <div class="alert alert-primary" role="alert">
                            Profil anda belum terisi, silahkan <a href="<?= base_url('utama/') ?>"><b>isi profil</b></a> anda dengan lengkap
                        </div>
                        <?php   }else{ ?>

                    <div class="row">
                                <div class="col-sm-8">
                                    <form method="post" action="<?= base_url('utama/user') ?>">
                     <div class="form-group">
                     <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="" value="<?= $profil['nama'] ?>">
                     </div>

                     <div class="form-group">
                     <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option><?= $profil['jk'] ?></option>
                            <option>Laki - Laki</option>
                            <option>Perempuan</option>
                        </select>
                     </div>
                     <div class="form-group">
                     <label for="exampleInputEmail1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control"  required="" value="<?= $profil['tempat_lahir'] ?>">
                     </div>

                     <div class="form-group">
                     <label for="exampleInputEmail1">Tgl Lahir</label>
                        <input type="date" class="form-control" required="" name="tgl_lahir" value="<?= $profil['tgl_lahir'] ?>">
                     </div>
                     <div class="form-group">
                     <label for="exampleInputEmail1">Alamat Lengkap</label>
                       <textarea class="form-control" name="alamat"><?= $profil['alamat_lengkap'] ?></textarea>
                     </div>

                     <div class="form-group">
                     <label for="exampleInputEmail1">No Rek</label>
                        <input type="number" class="form-control" required="" name="no_rek" value="<?= $profil['no_rek'] ?>">
                       
                     </div>

                     <input type="submit" name="edit" value="Edit Profil" class="btn btn-primary">

                 </form>
                                </div>
                                <div class="col-sm-4">
                                <center>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/') ?>img/undraw_profile.svg" style="height: 200px;">
                                <label class="mt-2"><?= $profil['nama'] ?>  </label>
                                </center>
                            </div>
                        </div>


                            </div>

                    </div>

                     

                </div>

                 <?php } ?>