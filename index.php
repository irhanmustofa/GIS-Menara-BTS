<?php 
include "koneksi.php";

$menara = array();
$ambil_menara = $koneksi -> query("SELECT * FROM menara LEFT JOIN desa ON menara.id_desa = desa.id_desa LEFT JOIN kecamatan ON kecamatan.id_kecamatan = desa.id_kecamatan GROUP BY pemilik_menara");
while ($tiap_menara = $ambil_menara -> fetch_assoc()){
	$menara[]=$tiap_menara;
}
// echo "<pre>";
// print_r ($menara);
// echo "</pre>";
$ambil_pemilik = $koneksi -> query("SELECT DISTINCT pemilik_menara FROM menara");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/admin.css">
	<link rel="stylesheet" type="text/css" href="assets/css/peta.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	
	<title>Tampilan Peta</title>

	<link rel="stylesheet" href="assets/libs/leaflet/leaflet.css"/>
	<script src="assets/libs/leaflet/leaflet.js"></script>
</head>
<body>
	<header class="navbar navbar-dark sticky-top"style="background: #002100;">
		<button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand px-3" href="">
			<img src="assets/file/logo.png" width="90">
		</a>
		<form method="get" class="d-flex">
			<select class="form-control" name="cari">
				<option value="">--Semua Menara--</option>
				<?php foreach ($menara as $key => $value): ?>
					<option value="<?php echo $value["pemilik_menara"] ?>" <?php if (isset($_GET["cari"]) AND $value["pemilik_menara"]== $_GET['cari']){echo "selected";} ?> >
						<?php echo $value["pemilik_menara"]; ?>
					</option>
				<?php endforeach ?>
			</select>
			<button class="btn btn-outline-success ms-4" name="tombol" type="submit">
				<span class="bi bi-search"></span>
			</button>
		</form>
		<?php 
		if (isset($_GET['tombol'])){
			$cari = $_GET['cari'];
		}
		?>
		<div class="navbar-nav">
			<div class="navbar-item">
				<a class="nav-link px-4" href="login.php">
					<i class="bi bi-box-arrow-left"></i>
					Login
				</a>
			</div>
		</div>
	</header>
	<?php 
	if (isset($_GET["cari"])){
		$cari = $_GET['cari'];
		$menara = array();
		$ambil_menara = $koneksi -> query("SELECT * FROM menara LEFT JOIN kategori ON menara.tipe_menara=kategori.tipe_menara LEFT JOIN desa ON menara.id_desa=desa.id_desa LEFT JOIN kecamatan ON desa.id_kecamatan=kecamatan.id_kecamatan WHERE pemilik_menara LIKE '%".$cari."%'");
		while ($tiap_menara = $ambil_menara -> fetch_assoc())
		{
			$menara[]=$tiap_menara;
		}
	}
	else{
		$menara = array();
		$ambil_menara = $koneksi -> query("SELECT * FROM menara LEFT JOIN kategori ON menara.tipe_menara=kategori.tipe_menara LEFT JOIN desa ON menara.id_desa=desa.id_desa LEFT JOIN kecamatan ON desa.id_kecamatan=kecamatan.id_kecamatan");
		while ($tiap_menara = $ambil_menara -> fetch_assoc())
		{
			$menara[]=$tiap_menara;
		}
	}
	?>
	<div id="map" style="width: 100%; height: 100%;"></div>
	<script>
		var map = L.map('map').setView([-7.803249,110.3398253], 13);

		var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
		}).addTo(map);

		<?php foreach ($menara as $key => $value): ?>
			var greenIcon = L.icon({
				iconUrl: 'assets/file/<?php echo $value["jenis_menara"]; ?>.png',
				iconSize:		[20, 35],
				shadowSize:		[50, 64],
				iconAnchor:		[22, 94],
				shadowAnchor:	[4, 62],
				popupAnchor: 	[-3, -76]
			});
			var marker = L.marker([<?php echo $value["latitude_menara"]; ?>,<?php echo $value["longitude_menara"]; ?>],{icon: greenIcon}).addTo(map)
			.bindPopup('<img src="assets/img/<?php echo $value["foto_menara"]; ?>" style="width: 150px;"></img> <br /><b>Pemilik Menara :</b><br /><?php echo $value["pemilik_menara"]; ?><br /><b>Koordinat Menara :</b><br /><?php echo $value["latitude_menara"]; ?>,<?php echo $value["longitude_menara"]; ?><br /><b>Tinggi Menara :</b><br /><?php echo $value["tinggi_menara"]; ?> Meter<br /><b>Jenis Menara :</b><br /><?php echo $value["jenis_menara"]; ?><br /><b>Tipe Menara :</b><br /><?php echo $value["tipe_menara"]; ?><br /><b>Alamat Menara :</b><br /><?php echo $value["nama_desa"]; ?>, <?php echo $value["nama_kecamatan"]; ?>');
		<?php endforeach ?>


		function onMapClick(e) {
			popup
			.setLatLng(e.latlng)
			.setContent(`You clicked the map at ${e.latlng.toString()}`)
			.openOn(map);
		}

		map.on('click', onMapClick);
	</script>
</body>
</html>