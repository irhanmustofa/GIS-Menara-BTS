<?php 
include "header.php";
//data kabupaten
$kabupaten = array();
$ambil_kabupaten = $koneksi -> query("SELECT * FROM kabupaten");
while ($tiap_kabupaten = $ambil_kabupaten -> fetch_assoc()){
	$kabupaten[]=$tiap_kabupaten;
}
//id kecamatan
$id_kecamatan = $_GET["id"];

//data kecamatan berdasarkan id
$ambil_kecamatan = $koneksi -> query("SELECT * FROM kecamatan WHERE id_kecamatan = '$id_kecamatan'");
$kecamatan = $ambil_kecamatan -> fetch_assoc();

// echo "<pre>";
// print_r ($kecamatan);
// echo "</pre>";

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
							<label class="form-label">Kabupaten</label>
							<select class="form-control" name="kabupaten" required="required">
								<!-- <option value="">--Pilih Kabupaten</option> -->
								<?php foreach ($kabupaten as $key => $value): ?>
									<option value="<?php echo $value["id_kabupaten"]; ?>" <?php if ($value["id_kabupaten"] == $kecamatan["id_kabupaten"]) {
										echo 'selected';
									} ?> ><?php echo $value["nama_kabupaten"]; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Kode Kecamatan</label>
							<input type="text" class="form-control" name="kode_kecamatan" value="<?php echo $kecamatan["kode_kecamatan"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Kecamatan</label>
							<input type="text" class="form-control" name="nama_kecamatan" value="<?php echo $kecamatan["nama_kecamatan"]; ?>" required="required">
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
	//mendapatkan data inputan dari formulir
	$kab = $_POST["kabupaten"];
	$kode = $_POST["kode_kecamatan"];
	$nama = $_POST["nama_kecamatan"];


	$koneksi -> query("UPDATE kecamatan SET
		id_kabupaten = '$kab',
		kode_kecamatan = '$kode',
		nama_kecamatan = '$nama' WHERE id_kecamatan = '$id_kecamatan'");

	echo "<script>alert ('Data diubah')</script>";
	echo "<script>location = 'kecamatan.php'</script>";
}


include "footer.php";
?>