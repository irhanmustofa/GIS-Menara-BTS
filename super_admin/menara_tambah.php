<?php 
include "header.php";
$kategori = array();
$ambil_kategori = $koneksi -> query("SELECT * FROM kategori");
while ($tiap_kategori = $ambil_kategori -> fetch_assoc()){
	$kategori[]=$tiap_kategori;
}

$desa = array();
$ambil_desa = $koneksi -> query("SELECT * FROM desa LEFT JOIN kecamatan ON desa.id_kecamatan = kecamatan.id_kecamatan ORDER BY nama_kecamatan ASC");
while ($tiap_desa = $ambil_desa -> fetch_assoc()){
	$desa[]=$tiap_desa;
}
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
								<option value="<?php echo $s_admin["id_user"]; ?>">
									<?php echo $s_admin["nama_user"]; ?>
								</option>
							</select>
						</div>

						<div class="mb-3">
							<label class="form-label">Kategori Menara</label>
							<select class="form-control" name="tipe_menara" required="required">
								<option value="">--Pilih Kategori--</option>
								<?php foreach ($kategori as $key => $value): ?>
									<option value="<?php echo $value["tipe_menara"]; ?>">
										<?php echo $value["tipe_menara"]; ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Pemilik Menara</label>
							<input type="text" class="form-control" name="pemilik_menara" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Kecamatan & Kelurahan</label>
							<select class="form-control" name="id_desa" required="required">
								<option value="">--Pilih Kecamatan & Kelurahan--</option>
								<?php foreach ($desa as $key => $value): ?>
									<option value="<?php echo $value["id_desa"]; ?>">
										<?php echo $value["nama_kecamatan"]; ?>, <?php echo $value["nama_desa"]; ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Latitude</label>
							<input type="text" class="form-control" name="latitude_menara" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Longitude</label>
							<input type="text" class="form-control" name="longitude_menara" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Alamat Menara</label>
							<textarea class="form-control" name="alamat_menara" required="required"></textarea>
						</div>
						

					</div>
					<div class="col-sm-6 col-md-5 col-lg-6">
						<div class="mb-3">
							<label class="form-label">Tinggi Menara</label>
							<input type="text" class="form-control" name="tinggi_menara" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Ketinggian Dari Tanah</label>
							<input type="text" class="form-control" name="ketinggian_dari_tanah" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Jenis Menara</label>
							<select class="form-control" name="jenis_menara" required="required">
								<option value="">--Pilih Jenis Menara</option>
								<option value="greenfield">Greenfield</option>
								<option value="rooftop">Rooftop</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Status Menara</label>
							<select class="form-control" name="status_menara" required="required">
								<option value="">--Pilih Status Menara</option>
								<option value="valid">Valid</option>
								<option value="tidak valid">Tidak Valid</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Tanggal Survei</label>
							<input type="date" class="form-control" name="tanggal_survei" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Keterangan</label>
							<textarea class="form-control" name="keterangan_menara" required="required"></textarea>
						</div>

						<div class="mb-3">
							<label class="form-label">Upload Foto</label>
							<input type="file" class="form-control" name="foto_menara" required="required">

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
include "footer.php";

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
	move_uploaded_file($file, "../assets/img/$foto");

	$koneksi -> query("INSERT INTO menara (tipe_menara,id_desa,id_user,pemilik_menara,jenis_menara,latitude_menara,longitude_menara,alamat_menara,tinggi_menara,ketinggian_dari_tanah,keterangan_menara,tanggal_survei,status_menara,foto_menara) VALUES('$idk','$idd','$idu','$pemilik','$jenis','$lat','$long','$alamat','$tinggi','$ketinggian_dari_tanah','$ket','$tanggal','$status','$foto')");

	echo "<script>alert ('Data ditambahkan')</script>";
	echo "<script>location = 'menara_tampil.php'</script>";
}

?>