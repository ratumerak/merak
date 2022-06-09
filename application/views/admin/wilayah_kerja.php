 <div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Wilayah Kerja Store</h6>
  </div>


<div class="card-body">

    <form method="post" action="<?= base_url('admin/act_wilayah') ?>">
       <div class="form-group">
            <label>Store</label>
            <select class="form-control" name="store" id="store">
              <option>-- Pilih titik store --</option>
              <?php foreach ($store as $data) { ?>
                <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
              <?php } ?>
            </select>
          </div>

           <div class="form-group">
          <label>Provinsi</label>
            <select class="form-control" name="kab" id="prov">
              <option value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
            </select>
          </div>

           <div class="form-group">
           <label>Kabupaten</label>
            <select class="form-control" name="kab" id="kab">
              <option>-- Pilih kabupaten --</option>
            </select>
          </div>

           <div class="form-group">
           <label>Kecamatan</label>
           <div id="list_kec"></div>
          </div>


          <input type="submit" name="kirim" class="btn btn-primary" value="Submit">
          <input type="submit" name="edit" class="btn btn-info" value="Update">


    </form>
                           
</div>
</div>

</div>