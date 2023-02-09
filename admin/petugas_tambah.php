<?php 
include "header.php";


?>
<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Input Data Petugas</h4>
		<p class="card-category ms-3">Masukkan Data Petugas</p>

		<div class="card-body">
			<form method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-6 col-md-5 col-lg-6">
						<div class="mb-3">
							<label class="form-label">Nama Petugas</label>
							<input type="text" class="form-control" name="nama_user" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Email</label>
							<input type="text" class="form-control" name="email_user" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">No Identitas</label>
							<input type="text" class="form-control" name="no_identitas_user" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">No HP</label>
							<input type="text" class="form-control" name="no_hp_user" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Upload Foto</label>
							<input type="file" class="form-control" name="foto_user" required="required">
						</div>
					</div>
					<div class="col-sm-6 col-md-5 col-lg-6">
						<div class="mb-3">
							<label class="form-label">Username</label>
							<input type="text" class="form-control" name="username_user" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Password</label>
							<input type="Password" class="form-control" name="password_user" required="required">
						</div>

						<div class="mb-3">
							<label class="form-label">Level</label>
							<select class="form-control" name="level_user" required="required">
								<option value="petugas">Petugas</option>
							</select>
						</div>

						<div class="mb-3">
							<label class="form-label">Status</label>
							<select class="form-control" name="status_user" required="required">
								<option value="">--Pilih Status--</option>
								<option value="aktif">Aktif</option>
								<option value="nonaktif">Nonaktif</option>
							</select>
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
	$nama = $_POST["nama_user"];
	$email = $_POST["email_user"];
	$identitas = $_POST["no_identitas_user"];
	$hp = $_POST["no_hp_user"];
	$username = $_POST["username_user"];
	$password = $_POST["password_user"];
	$level = $_POST["level_user"];
	$status = $_POST["status_user"];

	$foto = $_FILES["foto_user"] ["name"];
	$file = $_FILES["foto_user"] ["tmp_name"];
	move_uploaded_file($file, "../assets/img/$foto");

	$koneksi -> query("INSERT INTO user (nama_user,email_user,no_identitas_user,no_hp_user,foto_user,username_user,password_user,level_user,status_user) VALUES('$nama','$email','$identitas','$hp','$foto','$username','$password','$level','$status')");

	echo "<script>alert ('Data ditambahkan')</script>";
	echo "<script>location = 'petugas_tampil.php'</script>";
}

include "footer.php";
?>