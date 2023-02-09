<?php 	
include "header.php";

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
			<div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
				<a href="menara_tambah.php" class="btn btn-success " type="button">
					<i class="bi bi-plus"></i>Tambah Data</a>
					<a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
						<i class="bi bi-upload"></i> Impor Data</a>
						<a href="menara_cetak.php" class="btn btn-secondary " type="button">
							<i class="bi bi-printer"></i> Cetak Data</a>
						</div>

						<!-- Modal -->
						<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title mt-3 ms-3">Upload File Yang Ingin di Import</h4>
									</div>
									<div class="modal-body">
										<form action="import_csv.php" method="POST" enctype="multipart/form-data">
											<div class="mb-3">
												<label class="form-label">*Masukkan File Excel (.csv)</label>
												<input type="file" class="form-control" name="filemenara" required >
											</div>
											<div class="d-grid gap-2 d-md-block text-end">
												<button class="btn btn-primary" name="upload" type="submit">Upload</button>
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											</div>

										</form>


									</div>
								</div>
							</div>
						</div>
						<!-- END MODAL -->

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
										<th>Tanggal survey</th>
										<th>Tinggi Menara</th>
										<th>Ketinggian Dari Tanah</th>
										<th>Kategori Menara</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($menara as $key => $value): ?>

										<tr>
											<td><?php echo $key+1; ?></td>
											<td><?php echo $value["pemilik_menara"]; ?></td>
											<td><?php echo $value["kode_desa"] ?>.<?php echo str_pad($key+1, 4, 0, STR_PAD_LEFT); ?></td>
											<td><?php echo $value["latitude_menara"]; ?></td>
											<td><?php echo $value["longitude_menara"]; ?></td>
											<td><?php echo $value["nama_kecamatan"]; ?></td>
											<td><?php echo $value["tanggal_survei"] ?></td>
											<td><?php echo $value["tinggi_menara"] ?> M</td>
											<td><?php echo $value["ketinggian_dari_tanah"] ?> M</td>
											<td><?php echo $value["tinggi_menara"] ?></td>
											<td class="text-center" style="display: inline-block;">

												<a href="menara_detail.php?id=<?php echo $value["id_menara"]; ?>" class="btn-sm btn btn-info text-white" data-bs-toggle="tooltip" title="Detail">
													<span class="bi bi-clipboard-fill"></span>
												</a>
												<a href="menara_ubah.php?id=<?php echo $value["id_menara"]; ?>" class="btn btn-primary btn-sm" type="button" data-bs-toggle="tooltip" title="Ubah">
													<i class="bi bi-pencil-square"></i>
												</a>
												<a href="menara_hapus.php?id=<?php echo $value["id_menara"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="button" data-bs-toggle="tooltip" title="Hapus">
													<i class="bi bi-trash-fill"></i>
												</a>

											</td>
										</tr>

									<?php endforeach ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php 
			include "footer.php";
			?>
