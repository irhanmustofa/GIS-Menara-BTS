<?php 
include "header.php";

$kecamatan = array();
$ambil_kecamatan = $koneksi -> query("SELECT * FROM kecamatan");
while ($tiap_kecamatan = $ambil_kecamatan -> fetch_assoc()){
	$kecamatan[]=$tiap_kecamatan;
}

?>
<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Input Data Desa/Kelurahan</h4>
		<p class="card-category ms-3">Masukkan Data Desa/Kelurahan</p>

		<div class="card-body">
			<div class="row">
				<div class="col-sm-8">
					<form method="post">
						<div class="mb-3">
							<label class="form-label">Kecamatan</label>
							<select class="form-control" name="kecamatan" required="required">
								<option value="">--Pilih Kecamatan</option>
								<?php foreach ($kecamatan as $key => $value): ?>
									<option value="<?php echo $value["id_kecamatan"]; ?>"><?php echo $value["nama_kecamatan"]; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Kode Desa/Kelurahan</label>
							<input type="text" class="form-control" name="kode_desa" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Desa/Kelurahan</label>
							<input type="text" class="form-control" name="nama_desa" required="required">
						</div>
						<div class="d-grid gap-2 d-md-block">
							<button class="btn btn-primary" name="simpan">Simpan</button>
						</div>
					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>


<?php 

if (isset($_POST["simpan"])) {
	$kecamatan = $_POST["kecamatan"];
	$kode = $_POST["kode_desa"];
	$nama = $_POST["nama_desa"];


	$koneksi -> query("INSERT INTO desa(id_kecamatan,kode_desa,nama_desa) VALUES ('$kecamatan','$kode','$nama')");
	echo "<script>alert ('Data berhasil ditambahkan')</script>";
	echo "<script>location = 'desa.php'</script>";
}

include "footer.php";

?>