<div class="main-panel">
  <div class="content-wrapper">
    <div class="row"> 
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Profil</h4>
            <div class="container">
              <?php if ($profil == false) { ?>
                <div class="alert alert-primary" role="alert">
                  Profil anda belum terisi, silahkan <a href="<?= base_url('utama/') ?>"><b>isi profil</b></a> anda dengan lengkap
                </div>
              <?php   }else{ ?>
                <form method="post" action="<?= base_url('utama/user') ?>" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="name_bank" id="inputPassword4" placeholder="Bank" required="" value="<?= $profil['name_bank'] ?>" readonly>
                    <small>Bank anda tidak dapat diubah</small>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">NIK</label>
                    <?php
                    $nik = $this->db->get_where('tbl_register',['kode_member' => $this->session->kode_member])->row_array()
                    ?>
                    <input type="number" class="form-control" name="nik1" required="" value="<?= $nik['nik'] ?>" readonly>
                    <small>Nik anda tidak dapat diubah</small>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">No Hp</label>
                    <input type="number" class="form-control" name="nohp" required="" value="<?= $profil['nohp'] ?>"  >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Photo Profil</label><br>


                    <img src="<?= base_url('assets/profil') ?>/<?= $profil['gambar_user'] ?>" id="preview" alt="" class="img-thumbnail mb-2" width="200px">
                    <input type="file" accept="image/*" class="form-control" name="gambar"  onchange="tampilkanPreview(this,'preview')" />
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


<script>
  function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
var gb = gambar.files;
//                loop untuk merender gambar
for (var i = 0; i < gb.length; i++){
//                    bikin variabel
var gbPreview = gb[i];
var imageType = /image.*/;
var preview=document.getElementById(idpreview);
var reader = new FileReader();
if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
preview.file = gbPreview;
reader.onload = (function(element) {
  return function(e) {
    element.src = e.target.result;
  };
})(preview);
    //                    membaca data URL gambar
    reader.readAsDataURL(gbPreview);
  }else{
//                        jika tipe data tidak sesuai
alert("Type file tidak sesuai. Khusus image.");
}
}
}
</script>
<!-- content-wrapper ends -->
