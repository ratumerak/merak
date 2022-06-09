 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Maps Titik Store</h6>
 </div>

<div class="card-body">

        <div id="map" style="height: 500px;"></div>            
</div>
</div>
</div>

</div>

<script>
  var map = L.map('map').setView([3.6426183,98.5294036, -0.09], 12);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  <?php foreach ($titik as $data) { 
    $kec = $this->db->get_where('tbl_kecamatan',['id' => $data['kec']])->row_array();
  ?>
                                                
                                              

  var circle = L.circle([<?= $data['lang'] ?>, -0.9], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 1000
    }).addTo(map);

  L.marker([<?= $data['lang'] ?>, -0.09]).addTo(map)
    .bindPopup("<?= $data['nama'] ?>, <?= $kec['name'] ?>")
    .openPopup();

  <?php } ?>

  

</script>