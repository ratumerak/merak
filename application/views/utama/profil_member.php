


            <div class="container-fluid">

                   <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Profil Anda</h6>

                           
                        </div>
                        <div class="card-body">

                            <?php 

                            if($profil == false){ ?>
                                     <div class="alert alert-warning" role="alert">
                                        Hello  <b><?= $this->session->username ?></b>, Profil diri anda belum tersedia, isi profil anda terlebih dahulu <a href="<?= base_url('utama/') ?>">disini</a>.
                                    </div>

                                <?php }else{ ?>

                             
                                <form method="post" action="">
                            <div class="row">
                                <div class="col-sm-6">
                                   <div class="row">
                                        <div class="col-sm-6">
                                            <label>Nama :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="nama" value="<?= $profil['nama'] ?>" required="" >
                                            <hr>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Jenis kelamim :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="jk">
                                                <option><?= $profil['jk'] ?></option>
                                                <option>laki-laki</option>
                                                <option>perempuan</option>
                                            </select>
                                            <hr>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Tanggal Lahir :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="date" name="tgl_lahir" class="form-control" value="<?= $profil['tgl_lahir'] ?>" required="">
                                            <hr>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Tempat Lahir :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="tempat_lahir" required=""><?= $profil['tempat_lahir'] ?></textarea>
                                            <hr>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Alamat Lengkap :</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" name="alamat" required=""><?= $profil['alamat_lengkap'] ?></textarea>
                                            <hr>
                                        </div>

                                        <div class="col-sm-6">
                                            <label>Nomor Rek:</label>
                                        </div>
                                        <div class="col-sm-6">
                                        <input type="number" name="no_rek" class="form-control" value="<?= $profil['no_rek'] ?>" required="" >
                                            <hr>
                                        </div>

                                         <div class="col-sm-6">
                                            <label>NIk :</label>
                                        </div>
                                        <div class="col-sm-6">
                                          <input type="number" name="nik" class="form-control" value="<?= $profil['nik'] ?>" required="">
                                            <hr>
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="submit" name="kirim" class="btn btn-primary" value="Save">
                                        </div>
                                       

                                        

                                         

                                    </div>

                                </div>

                            </form>

                        <?php } ?>
                                 
                        </div>
                    </div>

                </div>



