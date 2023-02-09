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
		<h4 class="card-title mt-3 ms-3">Input Data Kabupaten</h4>
		<p class="card-category ms-3">Masukkan Data Kabupaten</p>

		<div class="card-body">
			<div class="row">
				<div class="col-sm-8">
					<form method="post">
						<div class="mb-3">
							<label class="form-label">Kode Kabupaten</label>
							<input type="text" class="form-control" name="kode_kabupaten" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Kabupaten</label>
							<input type="text" class="form-control" name="nama_kabupaten" required="required">
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
	$kode = $_POST["kode_kabupaten"];
	$nama = $_POST["nama_kabupaten"];


	$koneksi -> query("INSERT INTO kabupaten(kode_kabupaten,nama_kabupaten) VALUES ('$kode','$nama')");
	echo "<script>alert ('Data ditambahkan')</script>";
	echo "<script>location = 'kabupaten.php'</script>";
}

include "footer.php";

?>