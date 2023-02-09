<?php 
include "header.php";

$kategori = array();
$ambil_kategori = $koneksi -> query("SELECT * FROM kategori");
while ($tiap_kategori = $ambil_kategori -> fetch_assoc()){
	$kategori[]=$tiap_kategori;
}

$desa = array();
$ambil_desa = $koneksi -> query("SELECT * FROM desa LEFT JOIN kecamatan ON desa.id_kecamatan = kecamatan.id_kecamatan");
while ($tiap_desa = $ambil_desa -> fetch_assoc()){
	$desa[]=$tiap_desa;
}

$id_menara = $_GET["id"];
$ambil_menara = $koneksi -> query("SELECT * FROM menara WHERE id_menara = '$id_menara'");
$menara = $ambil_menara -> fetch_assoc();
?>
<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Input Data Menara</h4>
		<p class="card-category ms-3">Masukkan Data Menara</p>
		
		<div class="card-body">
			<form method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-6 col-md-5 col-lg-6">
						<div class="mb-3">
							<label class="form-label">Pengunggah Data</label>
							<select class="form-control" name="id_user" required="required">
								<option value="<?php echo $admin["id_user"]; ?>">
									<?php echo $admin["nama_user"]; ?>
								</option>
							</select>
						</div>

						<div class="mb-3">
							<label class="form-label">Kategori Menara</label>
							<select class="form-control" name="tipe_menara" required="required">
								<!-- <option value="">--Pilih Kategori--</option> -->
								<?php foreach ($kategori as $key => $value): ?>
									<option value="<?php echo $value["tipe_menara"]; ?>" <?php if ($value["tipe_menara"] == $menara["tipe_menara"]) {
										echo 'selected';
									} ?> ><?php echo $value["tipe_menara"]; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Pemilik Menara</label>
							<input type="text" class="form-control" name="pemilik_menara" required="required" value="<?php echo $menara["pemilik_menara"]; ?>">
						</div>
						<div class="mb-3">
							<label class="form-label">Desa/Kelurahan</label>
							<select class="form-control" name="id_desa" required="required">
								<!-- <option value="">--Pilih Desa/Kelurahan--</option> -->
								<?php foreach ($desa as $key => $value): ?>
									<option value="<?php echo $value["id_desa"]; ?>" <?php if ($value["id_desa"] == $menara["id_desa"]) {
										echo 'selected';
									} ?> ><?php echo $value["nama_desa"]; ?>, <?php echo $value["nama_kecamatan"]; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Latitude</label>
							<input type="text" class="form-control" name="latitude_menara" value="<?php echo $menara["latitude_menara"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Longitude</label>
							<input type="text" class="form-control" name="longitude_menara" value="<?php echo $menara["longitude_menara"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Alamat Menara</label>
							<textarea class="form-control" name="alamat_menara" required="required"><?php echo $menara["alamat_menara"]; ?></textarea>
						</div>
						

					</div>
					<div class="col-sm-6 col-md-5 col-lg-6">
						<div class="mb-3">
							<label class="form-label">Tinggi Menara</label>
							<input type="text" class="form-control" name="tinggi_menara" value="<?php echo $menara["tinggi_menara"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Ketinggian Dari Tanah</label>
							<input type="text" class="form-control" name="ketinggian_dari_tanah" value="<?php echo $menara["ketinggian_dari_tanah"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Jenis Menara</label>
							<select class="form-control" name="jenis_menara" required="required">
								<option value="greenfield" <?php if($menara["jenis_menara"]=="greenfield"){echo "selected";} ?>  >Greenfield</option>
								<option value="rooftop" <?php if($menara["jenis_menara"]=="rooftop"){echo "selected";} ?>  >Rooftop</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Status Menara</label>
							<select class="form-control" name="status_menara" required="required">	
								<option value="Valid" <?php if($menara["status_menara"]=="Valid"){echo "selected";} ?>  >Valid</option>
								<option value="Tidak Valid" <?php if($menara["status_menara"]=="Tidak Valid"){echo "selected";} ?>  >Tidak Valid</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Tanggal Survei</label>
							<input type="date" class="form-control" name="tanggal_survei" value="<?php echo $menara["tanggal_survei"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Keterangan</label>
							<textarea class="form-control" name="keterangan_menara"  required="required"><?php echo $menara["keterangan_menara"]; ?></textarea>
						</div>

						<div class="mb-3">
							<label class="form-label">Upload Foto</label>
							<img src="../assets/img/<?php echo $menara["foto_menara"]; ?>" width="100">
							<input type="file" class="form-control" name="foto_menara">

						</div>
					</div>
				</div>
				<div class="d-grid gap-2 d-md-block">
					<button class="btn btn-primary" name="simpan">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
if (isset($_POST["simpan"])) {
	$idk = $_POST["tipe_menara"];
	$idd = $_POST["id_desa"];
	$idu = $_POST["id_user"];
	$pemilik = $_POST["pemilik_menara"];
	$jenis = $_POST["jenis_menara"];
	$lat = $_POST["latitude_menara"];
	$long = $_POST["longitude_menara"];
	$alamat = $_POST["alamat_menara"];
	$tinggi = $_POST["tinggi_menara"];
	$ketinggian_dari_tanah = $_POST["ketinggian_dari_tanah"];
	$ket = $_POST["keterangan_menara"];
	$tanggal = $_POST["tanggal_survei"];
	$status = $_POST["status_menara"];
	$foto = $_FILES["foto_menara"] ["name"];
	$file = $_FILES["foto_menara"] ["tmp_name"];

		//merubah data tanpa merubah file
	if (empty($file)) {
		$koneksi -> query("UPDATE menara SET 
			tipe_menara = '$idk',
			id_desa = '$idd',
			id_user = '$idu',
			pemilik_menara = '$pemilik',
			jenis_menara = '$jenis',
			latitude_menara = '$lat',
			longitude_menara = '$long',
			alamat_menara = '$alamat',
			tinggi_menara = '$tinggi',
			ketinggian_dari_tanah = '$ketinggian_dari_tanah',
			tanggal_survei = '$tanggal',
			status_menara = '$status' WHERE id_menara = '$id_menara'");
	}

		//merubah data sekaligus merubah file
	else{
		$koneksi -> query("UPDATE menara SET
			tipe_menara = '$idk',
			id_desa = '$idd',
			id_user = '$idu',
			pemilik_menara = '$pemilik',
			jenis_menara = '$jenis',
			latitude_menara = '$lat',
			longitude_menara = '$long',
			alamat_menara = '$alamat',
			tinggi_menara = '$tinggi',
			ketinggian_dari_tanah = '$ketinggian_dari_tanah',
			tanggal_survei = '$tanggal',
			status_menara = '$status',
			foto_menara = '$foto' WHERE id_menara = '$id_menara'");

		move_uploaded_file($file, "../assets/img/$foto");
	}

	echo "<script>alert ('Data berhasil diubah')</script>";
	echo "<script>location = 'menara_tampil.php'</script>";
}
include "footer.php";
?>

