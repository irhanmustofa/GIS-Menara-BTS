<?php 	
include "../koneksi.php";
$id_menara = $_GET["id"];

$ambil_menara = $koneksi -> query("SELECT * FROM menara LEFT JOIN desa ON menara.id_desa = desa.id_desa LEFT JOIN kecamatan ON kecamatan.id_kecamatan = desa.id_kecamatan LEFT JOIN kategori ON kategori.tipe_menara = menara.tipe_menara LEFT JOIN user ON user.id_user = menara.id_user WHERE id_menara= '$id_menara'");

$menara = $ambil_menara ->fetch_assoc();
// echo "<pre>";
// print_r ($ambil_menara);
// echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>
	<div class="row">
		<div class="card mt-4" >
			<h4 class="card-title mt-3 ms-3 text-center">Hasil Peninjauan Bersama Titik Lokasi Penempatan Menara Telekomunikasi</h4>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="table table-responsive">
							<table id="datatabel" class="table table-bordered table-striped table-sm table-hover">
								<thead>
									<tr>
										<th>Data Peninjauan</th>
										<th>Hasil Peninjauan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Tanggal Survey</td>
										<td><?php echo $menara["tanggal_survei"]; ?></td>
									</tr>
									<tr>
										<td>Nama Surveyor</td>
										<td><?php echo $menara["nama_user"]; ?></td>
									</tr>
									<tr>
										<td>Pemilik Menara</td>
										<td><?php echo $menara["pemilik_menara"]; ?></td>
									</tr>
									<tr>
										<td>Alamat Menara</td>
										<td><?php echo $menara["alamat_menara"]; ?></td>
									</tr>
									<tr>
										<td>Latitude</td>
										<td><?php echo $menara["latitude_menara"]; ?></td>
									</tr>
									<tr>
										<td>Longitude</td>
										<td><?php echo $menara["longitude_menara"]; ?></td>
									</tr>
									<tr>
										<td>Ketinggian Menara</td>
										<td><?php echo $menara["tinggi_menara"]; ?></td>
									</tr>
									<tr>
										<td>Ketinggian Dari Tanah</td>
										<td> : <?php echo $menara["ketinggian_dari_tanah"]; ?> M</td>
									</tr>
									<tr>
										<td>Jenis Menara</td>
										<td><?php echo $menara["jenis_menara"]; ?></td>
									</tr>
									<tr>
										<td>Tipe Menara</td>
										<td><?php echo $menara["tipe_menara"]; ?></td>
									</tr>
									<tr>
										<td>Status Menara</td>
										<td><?php echo $menara["status_menara"]; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<ul>
							<li>Keterangan Menara</li>
							<ul type="circle">
								<li><?php echo $menara["keterangan_menara"] ?></li>
							</ul>
							<li>Foto Menara</li>
						</ul>
					</div>
					<div class="col-md-4 offset-4">
						<img src="../assets/img/<?php echo $menara["foto_menara"]; ?>" style="width: 350px;" class="rounded"></img>
					</div>
				</div>
			</div>
			<br>
			<p class="text-end">Diparaf oleh surveyor</p>
		</div>
		<!-- <div class="my-3">
			<div class="card-body" id="peta" style="width: 100%;"></div>
		</div> -->
	</div>

	<script type="text/javascript">
		print();
	</script>
	
</body>
</html>
