<?php 
include "header.php";
$id_kategori = $_GET["id"];
$ambil_kategori = $koneksi -> query("SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
$kategori = $ambil_kategori ->fetch_assoc();

?>
<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Input Data Kategori</h4>
		<p class="card-category ms-3">Masukkan Data Kategori</p>

		<div class="card-body">
			<div class="row">
				<div class="col-sm-8">
					<form method="post">
						<div class="mb-3">
							<label class="form-label">Tipe Menara</label>
							<input type="text" class="form-control" name="tipe_menara" value="<?php echo $kategori["tipe_menara"]; ?>" required="required">
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
	$tipe = $_POST["tipe_menara"];


	$koneksi -> query("UPDATE kategori SET
		tipe_menara = '$tipe' WHERE id_kategori = '$id_kategori'");

	echo "<script>alert ('Data berhasil diubah')</script>";
	echo "<script>location = 'kategori_tampil.php'</script>";
}


include "footer.php";
?>