<?php 
include "header.php";
$menara = array();
$ambil_menara = $koneksi -> query("SELECT * FROM menara");
while ($tiap_menara = $ambil_menara -> fetch_assoc()){
  $menara[]=$tiap_menara;
}
echo "<pre>";
print_r ($menara);
echo "</pre>";

?>
<div class="row">
  <div class="card mt-4" >

    <div class="container-fluid" id="map" style="width: 100%; height: 100%;"></div>
    <script>

      var map = L.map('map').setView([-7.803249,110.3398253], 13);

      var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      }).addTo(map);

      <?php foreach ($menara as $key => $row): ?>
        var marker = L.marker([<?php echo $row["lat"]; ?>,<?php echo $row["long"]; ?>]).addTo(map)
      .bindPopup('<b>Nama Lokasi</b><br />Titik Lokasi.').openPopup();
      <?php endforeach ?>


      function onMapClick(e) {
        popup
        .setLatLng(e.latlng)
        .setContent(`You clicked the map at ${e.latlng.toString()}`)
        .openOn(map);
      }

      map.on('click', onMapClick);
    </script>
    <?php 
    include "footer.php";

  ?>