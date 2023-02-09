<?php 	
include "header1.php";

$menara = array();
$ambil_menara = $koneksi -> query("SELECT * FROM menara LEFT JOIN desa ON menara.id_desa = desa.id_desa LEFT JOIN kecamatan ON kecamatan.id_kecamatan = desa.id_kecamatan");
while ($tiap_menara = $ambil_menara -> fetch_assoc()){
	$menara[]=$tiap_menara;
}
// echo "<pre>";
// print_r ($menara);
// echo "</pre>";
?>
<div class="row">
	<div class="card mt-4" >
		<h4 class="card-title mt-3 ms-3">Daftar Data Menara</h4>
		<p class="card-category ms-3">Data Menara BTS Kota Yogyakarta</p>

		<div class="card-body">

				<div class="table table-responsive">
					<table id="datatabel" class="table table-bordered table-striped table-sm table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Pemilik Menara</th>
								<th>SITE-ID</th>
								<th>Latitude</th>
								<th>Longitude</th>
								<th>Kecamatan</th>
								<th>Alamat</th>
								<th>Tanggal survey</th>
								<th>Kategori Menara</th>
								<th>Tinggi Menara</th>
								<th>Ketinggian Dari Tanah</th>
								<th>Status Menara</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($menara as $key => $value): ?>

								<tr>
									<td><?php echo $key+1 ?></td>
									<td><?php echo $value["pemilik_menara"]; ?></td>
									<td><?php echo $value["kode_desa"] ?>.<?php echo str_pad($key+1, 4, 0, STR_PAD_LEFT); ?></td>
									<td><?php echo $value["latitude_menara"]; ?></td>
									<td><?php echo $value["longitude_menara"]; ?></td>
									<td><?php echo $value["nama_kecamatan"]; ?></td>
									<td><?php echo $value["alamat_menara"]; ?></td>
									<td><?php echo $value["tanggal_survei"] ?></td>
									<td><?php echo $value["tipe_menara"] ?></td>
									<td><?php echo $value["tinggi_menara"] ?> M</td>
										<td><?php echo $value["ketinggian_dari_tanah"] ?> M</td>
									<td><?php echo $value["status_menara"] ?></td>
									
								</tr>
								
							<?php endforeach ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php 
	include "footer1.php";
	?>
