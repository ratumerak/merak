<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Profil Anda</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="container">
                <?php if ($profil == false) { ?>
                    <div class="alert alert-primary" role="alert">
                        Profil anda belum terisi, silahkan <a href="<?= base_url('utama/') ?>"><b>isi profil</b></a> anda dengan lengkap
                    </div>
                <?php   }else{ ?>
                <form method="post" action="<?= base_url('utama/user') ?>">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?= $profil['nama'] ?>" >
                    </div>

                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Jenis Kelamin</label>
                      <select class="form-control" name="jk">
                         <option><?= $profil['jk'] ?></option>
                         <option>Perempuan</option>
                         <option>Laki-laki</option>
                      </select>
                    </div>
                  </div>
                   <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir" required="" value="<?= $profil['tempat_lahir'] ?>" >
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tgl_lahir" id="inputPassword4" placeholder="Tanggal lahir" value="<?= $profil['tgl_lahir'] ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Alamat Lengkap</label>
                      <input type="text" class="form-control" placeholder="Alamat lengkap" required="" name="alamat" value="<?= $profil['alamat_lengkap'] ?>"  >
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Bank</label>
                      <input type="text" class="form-control" name="name_bank" id="inputPassword4" placeholder="Bank" required="" value="<?= $profil['name_bank'] ?>"  >
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">NIK</label>
                      <input type="number" class="form-control" name="nik" required="" value="<?= $profil['nik'] ?>"  >
                    </div>
                  </div>
                  <input type="submit" name="edit" value="Edit Profil" class="btn btn-primary">
                </form>

              <?php } ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>