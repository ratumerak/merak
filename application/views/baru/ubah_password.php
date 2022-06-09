<div class="main-panel">
        <div class="content-wrapper">
          <div class="row"> 
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ubah Password Anda</h4>

                    <form method="post" action="">
                       <div class="form-group">
                        <label>Password Lama</label>
                        <input type="Password" name="pass_lama" placeholder="Masukan password lama anda" class="form-control" value="<?php echo set_value('pass_lama'); ?>">
                        <small class="text-danger"><?php echo form_error('pass_lama'); ?></small>
                      </div>
                       <div class="form-group">
                        <label>Password Baru</label>
                        <input type="Password" name="pass_baru" placeholder="Masukan password baru anda" class="form-control" value="<?php echo set_value('pass_baru'); ?>">
                        <small class="text-danger"><?php echo form_error('pass_baru'); ?></small>
                      </div>
                       <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="Password" name="pass_baru2" placeholder="Masukan ulang password baru anda" class="form-control" value="<?php echo set_value('pass_baru2'); ?>">
                        <small class="text-danger"><?php echo form_error('pass_baru2'); ?></small>
                      </div>
                      <button type="submit" class="btn btn-primary" name="kirim">Ubah Password</button>
                    </form>
                 
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
        <!-- content-wrapper ends -->
  
        <!-- content-wrapper ends -->
    