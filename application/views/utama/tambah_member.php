 <div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Tambah Member</h6>
        </div>
        <div class="card-body">
            <div class="row">
                
                <div class="col-sm-8 col-12">
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan username anda" value="<?php echo set_value('username'); ?>">
                        <small class="text-danger"><?php echo form_error('username'); ?></small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukan email anda" value="<?php echo set_value('email'); ?>">
                        <small class="text-danger"><?php echo form_error('email'); ?></small>
                    </div>

                    <div class="form-group">
                        <label>No telp</label>
                        <input type="telp" name="no_telp" class="form-control" placeholder="Masukan no telp anda" value="<?php echo set_value('no_telp'); ?>">
                         <small class="text-danger"><?php echo form_error('no_telp'); ?></small>
                    </div>

                     <div class="form-group">
                        <label>NIK</label>
                        <input type="number" name="nik" class="form-control" placeholder="Masukan nik anda" value="<?php echo set_value('nik'); ?>">
                         <small class="text-danger"><?php echo form_error('nik'); ?></small>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pass" class="form-control" placeholder="Masukan password anda
                                " value="<?php echo set_value('pass'); ?>">
                                 <small class="text-danger"><?php echo form_error('pass'); ?></small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> Konfirmasi Password</label>
                                <input type="password" name="konf_pass" class="form-control" placeholder="Ulangi password" value="<?php echo set_value('konf_pass'); ?>">
                                 <small class="text-danger"><?php echo form_error('konf_pass'); ?></small>
                            </div>
                        </div>
                    </div>

                   
<!-- 
                     <div class="form-group">
                        <label>KTP</label>
                        <input type="file" name="ktp" class="form-control">
                        <small style="font-style: italic;">Masukan foto ktp anda dengan format gambar png, jpeg dan jpg.</small>
                    </div>

                     <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <select class="form-control" name="bank">
                            <option>-- Pilih Bank --</option>
                            <option>BCA</option>
                            <option>BNI</option>
                            <option>Mandiri</option>
                            <option>BRI</option>
                        </select>
                    </div>

                     <div class="form-group">
                        <label>Nomor Rekening Member</label>
                       <input type="number" name="no_rek" class="form-control">
                    </div> -->

                    <div class="form-group">
                        <?php if ($profil == false) { ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-user"></i> Daftar
                            </button>

                     <?php  }else{ ?>
                       <button type="submit" class="btn btn-primary"><i class="fas fa-user"></i> Daftar</button>
                    <?php    } ?>
                    </div>
                </div>
            </form>

                <div class="col-sm-4">
                    <ul style="font-style: italic;">
                        <li>Untuk pendaftaran member pastikan anda mengisi form dengan lengkap.</li>
                        <li>Masukan username anda dengan karekter yang unik.</li>
                        <li>Pastikan akun email anda aktif.</li>
                        <li>Masukan password anda dengan benar dan unik.</li>
                        <li>Nomor NIK ada harus valid.</li>
                       <!--  <li>Ungagah  foto KTP anda dengan format yang telah ditentukan.</li> -->
                </ul>
                </div>
            </div>



        
        </div>
    </div>

</div>




 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Isi Profil Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('utama/profil') ?>">
                 <div class="form-group">
                 <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="">
                 </div>

                 <div class="form-group">
                 <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select class="form-control" name="jk">
                        <option>Laki - Laki</option>
                        <option>Perempuan</option>
                    </select>
                 </div>
                 <div class="form-group">
                 <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control"  required="">
                 </div>

                 <div class="form-group">
                 <label for="exampleInputEmail1">Tgl Lahir</label>
                    <input type="date" class="form-control" required="" name="tgl_lahir">
                 </div>
                 <div class="form-group">
                 <label for="exampleInputEmail1">Alamat Lengkap</label>
                   <textarea class="form-control" name="alamat"></textarea>
                 </div>

                 <div class="form-group">
                 <label for="exampleInputEmail1">No Rek</label>
                    <input type="number" class="form-control" required="" name="no_rek">
                    <small>Masukan nomor rekening anda yang masih berlaku</small>
                 </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
          </form>



      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){

        alert('ebunga');
    })
</script>