<option>-- Pilih Kecamatan ---</option>
<?php foreach ($kec as $data) { ?>
<option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
<?php } ?>