<?php 
include "header.php";
$kabupaten = array();
$ambil_kabupaten = $koneksi -> query("SELECT * FROM kabupaten");
while ($tiap_kabupaten = $ambil_kabupaten -> fetch_assoc()){
	$kabupaten[]=$tiap_kabupaten;
}

?>
<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Input Data Kecamatan</h4>
		<p class="card-category ms-3">Masukkan Data Kecamatan</p>

		<div class="card-body">
			<div class="row">
				<div class="col-sm-8">
					<form method="post">
						<div class="mb-3">
							<label class="form-label">Kabupaten/Kota</label>
							<select class="form-control" name="kabupaten" required="required">
								<option value="">--Pilih Kabupaten/Kota</option>
								<?php foreach ($kabupaten as $key => $value): ?>
									<option value="<?php echo $value["id_kabupaten"]; ?>"><?php echo $value["nama_kabupaten"]; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Kode Kecamatan</label>
							<input type="text" class="form-control" name="kode_kecamatan" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Kecamatan</label>
							<input type="text" class="form-control" name="nama_kecamatan" required="required">
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
	$kab = $_POST["kabupaten"];
	$kode = $_POST["kode_kecamatan"];
	$nama = $_POST["nama_kecamatan"];


	$koneksi -> query("INSERT INTO kecamatan(id_kabupaten,kode_kecamatan,nama_kecamatan) VALUES ('$kab','$kode','$nama')");
	echo "<script>alert ('Data ditambahkan')</script>";
	echo "<script>location = 'kecamatan.php'</script>";
}

include "footer.php";

?>