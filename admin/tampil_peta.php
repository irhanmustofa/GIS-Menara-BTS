<?php 
include "header.php";
$menara = array();
$ambil_menara = $koneksi -> query("SELECT * FROM menara LEFT JOIN kategori ON menara.tipe_menara = kategori.tipe_menara LEFT JOIN desa ON menara.id_desa = desa.id_desa LEFT JOIN kecamatan ON kecamatan.id_kecamatan = desa.id_kecamatan");
while ($tiap_menara = $ambil_menara -> fetch_assoc()){
	$menara[]=$tiap_menara;
}
?>
<div class="my-3">
	<div id="map" class="card-body" style="width: 100%; height: 800px;"></div>
</div>
<script>
	var map = L.map('map').setView([-7.803249,110.3398253], 13);

	var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

	<?php foreach ($menara as $key => $value): ?>
		var greenIcon = L.icon({
			iconUrl: '../assets/file/<?php echo $value["jenis_menara"]; ?>.png',
			iconSize:		[20, 35],
			shadowSize:		[50, 64],
			iconAnchor:		[22, 94],
			shadowAnchor:	[4, 62],
			popupAnchor: 	[-3, -76]
		});
		var marker = L.marker([<?php echo $value["latitude_menara"]; ?>,<?php echo $value["longitude_menara"]; ?>],{icon: greenIcon}).addTo(map)
		.bindPopup('<b><?php echo $value["kode_desa"] ?>.<?php echo str_pad($key+1, 4, 0, STR_PAD_LEFT); ?></b><br /><img src="../assets/img/<?php echo $value["foto_menara"]; ?>" style="width: 150px;"></img> <br /><b>Pemilik Menara :</b><br /><?php echo $value["pemilik_menara"]; ?><br /><b>Koordinat Menara :</b><br /><?php echo $value["latitude_menara"]; ?>,<?php echo $value["longitude_menara"]; ?><br /><b>Tinggi Menara :</b><br /><?php echo $value["tinggi_menara"]; ?> Meter<br /><b>Jenis Menara :</b><br /><?php echo $value["jenis_menara"]; ?><br /><b>Tipe Menara :</b><br /><?php echo $value["tipe_menara"]; ?><br /><b>Alamat Menara :</b><br /><?php echo $value["nama_desa"]; ?>, <?php echo $value["nama_kecamatan"]; ?> <br><br> <a href="menara_ubah.php?id= <?php echo $value["id_menara"]; ?>" class="btn btn-success btn-sm text-white">Ubah</a>');
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