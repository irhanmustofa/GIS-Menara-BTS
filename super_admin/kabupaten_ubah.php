<?php 
include "header.php";
//id kecamatan
$id_kabupaten = $_GET["id"];

//data kabupaten berdasarkan id
$ambil_kabupaten = $koneksi -> query("SELECT * FROM kabupaten WHERE id_kabupaten = '$id_kabupaten'");
$kabupaten = $ambil_kabupaten -> fetch_assoc();


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
							<input type="text" class="form-control" name="kode_kabupaten" value="<?php echo $kabupaten["kode_kabupaten"] ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Kabupaten</label>
							<input type="text" class="form-control" name="nama_kabupaten" value="<?php echo $kabupaten["nama_kabupaten"] ?>" required="required">
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


	$koneksi -> query("UPDATE kabupaten SET
		kode_kabupaten = '$kode',
		nama_kabupaten = '$nama' WHERE id_kabupaten = '$id_kabupaten'");

	echo "<script>alert ('Data diubah')</script>";
	echo "<script>location = 'kabupaten.php'</script>";
}

include "footer.php";

?>