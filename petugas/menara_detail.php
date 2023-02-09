<?php 	
include "header.php";
$id_menara = $_GET["id"];

$ambil_menara = $koneksi -> query("SELECT * FROM menara LEFT JOIN desa ON menara.id_desa = desa.id_desa LEFT JOIN kecamatan ON kecamatan.id_kecamatan = desa.id_kecamatan LEFT JOIN kategori ON kategori.tipe_menara = menara.tipe_menara LEFT JOIN user ON user.id_user = menara.id_user WHERE id_menara= '$id_menara'");

$menara = $ambil_menara ->fetch_assoc();
// echo "<pre>";
// print_r ($ambil_menara);
// echo "</pre>";
?>
<div class="row">
	<div class="card mt-4" >
		<h4 class="card-title mt-3 ms-3">Detail Menara</h4>
		<p class="card-category ms-3">Data Menara BTS Kota Yogyakarta</p>
		<div class="card-body">
			<div class="d-grid gap-2 d-md-flex justify-content-md-start pb-3">
				<a href="menara_print.php?id=<?php echo $id_menara; ?>" class="btn btn-success " type="button" target="_blank">
					<i class="bi bi-printer"></i> Print</a>
				</div>
				<div class="row">
					<div class="col-md-4">
						<table class="table">
							<tr>
								<th>Pemilik Menara</th>
								<td> : <?php echo $menara["pemilik_menara"]; ?></td>
							</tr>
							<tr>
								<th>Jenis Menara</th>
								<td> : <?php echo $menara["jenis_menara"]; ?></td>
							</tr>
							<tr>
								<th>Tipe Menara</th>
								<td> : <?php echo $menara["tipe_menara"]; ?></td>
							</tr>
							<tr>
								<th>Tinggi Menara</th>
								<td> : <?php echo $menara["tinggi_menara"]; ?> M</td>
							</tr>
							<tr>
								<th>Ketinggian Dari Tanah</th>
								<td> : <?php echo $menara["ketinggian_dari_tanah"]; ?> M</td>
							</tr>
							<tr>
								<th>Latitude Menara</th>
								<td> : <?php echo $menara["latitude_menara"]; ?></td>
							</tr>
							<tr>
								<th>Longitude</th>
								<td> : <?php echo $menara["longitude_menara"]; ?></td>
							</tr>
							<tr>
								<th>Alamat Menara</th>
								<td> : <?php echo $menara["alamat_menara"]; ?></td>
							</tr>
						</table>
					</div>
					<div class="col-md-4 offset-4">
						<img src="../assets/img/<?php echo $menara["foto_menara"]; ?>" style="width: 350px;" class="rounded"></img>
					</div>
				</div>
			</div>

			<table class="table table-bordered table-hover mt-3">
				<thead>
					<tr>
						<th>Kecamatan</th>
						<th>Desa</th>
						<th>Keterangan</th>
						<th>Tanggal Survei</th>
						<th>Nama Petugas</th>
						<th>Status</th>
					</tr>
					<tbody>
						<tr>
							<td><?php echo $menara["nama_kecamatan"]; ?></td>
							<td><?php echo $menara["nama_desa"]; ?></td>
							<td><?php echo $menara["keterangan_menara"]; ?></td>
							<td><?php echo $menara["tanggal_survei"]; ?></td>
							<td><?php echo $menara["nama_user"]; ?></td>
							<td><?php echo $menara["status_menara"]; ?></td>
						</tr>
					</tbody>
				</thead>
			</table>
		</div>
		<div class="my-3">
			<div class="card-body" id="peta" style="width: 100%;"></div>
		</div>
	</div>

	<script type="text/javascript">
		var petaku = L.map('peta').setView([-7.803249,110.3398253], 10);
		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYXJkaGlhIiwiYSI6ImNqa2hyYTJiMjB4N2Mza3A5eXU2bm9yamMifQ.sRNMGGlKBK4HQuuQmhedVA', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1,
			accessToken: 'pk.eyJ1IjoidGVhbXRyYWluaXQiLCJhIjoiY2pod3UxcHNoMDR1ZTNrcDg1Z2QwdWtzYSJ9.AZ64VONLdDm7onOG3p08bg'
		}).addTo(petaku);


		var marker = new L.Marker([<?php 	echo $menara["latitude_menara"]; ?>,<?php echo $menara["longitude_menara"]; ?> ]);
		marker.addTo(petaku);

	</script>
	<?php 
	include "footer.php";
	?>
