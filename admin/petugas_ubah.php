<?php 
include "header.php";

$id_user = $_GET["id"];
$ambil_user = $koneksi -> query("SELECT * FROM user WHERE id_user = '$id_user'");
$user = $ambil_user -> fetch_assoc();
?>
<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Ubah Data Petugas</h4>
		<p class="card-category ms-3">Masukkan Data Petugas</p>

		<div class="card-body">
			<form method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-6 col-md-5 col-lg-6">
						<div class="mb-3">
							<label class="form-label">Nama Petugas</label>
							<input type="text" class="form-control" name="nama_user" value="<?php echo $user["nama_user"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Email</label>
							<input type="text" class="form-control" name="email_user" value="<?php echo $user["email_user"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">No Identitas</label>
							<input type="text" class="form-control" name="no_identitas_user" value="<?php echo $user["no_identitas_user"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">No HP</label>
							<input type="text" class="form-control" name="no_hp_user" value="<?php echo $user["no_hp_user"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Foto</label>
							<img src="../assets/img/<?php echo $user["foto_user"]; ?>" width="100">
							<input type="file" class="form-control" name="foto_user">

						</div>
					</div>
					<div class="col-sm-6 col-md-5 col-lg-6">
						<div class="mb-3">
							<label class="form-label">Username</label>
							<input type="text" class="form-control" name="username_user" value="<?php echo $user["username_user"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Password</label>
							<input type="Password" class="form-control" name="password_user">
							<p class="text-muted">Kosongkan Jika Password Tidak Diubah</p>
						</div>

						<div class="mb-3">
							<label class="form-label">Level</label>
							<select class="form-control" name="level_user" required="required">
								<option value="admin" <?php if($user["level_user"]=="admin"){echo "selected";} ?>  >Admin</option>
								<option value="petugas" <?php if($user["level_user"]=="petugas"){echo "selected";} ?>  >Petugas</option>
							</select>
						</div>

						<div class="mb-3">
							<label class="form-label">Status</label>
							<select class="form-control" name="status_user" value="<?php echo $user["status_user"]; ?>" required="required">
								<option value="aktif" <?php if($user["status_user"]=="aktif"){echo "selected";} ?>  >Aktif</option>
								<option value="nonaktif" <?php if($user["status_user"]=="nonaktif"){echo "selected";} ?>  >Nonaktif</option>
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
	$user = $_POST["username_user"];
	$password = $_POST["password_user"];
	$level = $_POST["level_user"];
	$status = $_POST["status_user"];


	$foto = $_FILES["foto_user"] ["name"];
	$file = $_FILES["foto_user"] ["tmp_name"];

		//merubah data tanpa merubah file
	if (empty($file)) {
		if (empty($_POST["password_user"])) {
			$koneksi -> query("UPDATE user SET 
				nama_user = '$nama',
				email_user = '$email',
				no_identitas_user = '$identitas',
				no_hp_user = '$hp',
				username_user = '$user',
				level_user = '$level',
				status_user = '$status' WHERE id_user = '$id_user'");
		}
		else{
			$password = sha1($password);
			$koneksi -> query("UPDATE user SET 
				nama_user = '$nama',
				email_user = '$email',
				no_identitas_user = '$identitas',
				no_hp_user = '$hp',
				username_user = '$user',
				password_user = '$password',
				level_user = '$level',
				status_user = '$status' WHERE id_user = '$id_user'");
		}
	}

		//merubah data sekaligus merubah file
	else{
		if (empty($_POST["password_user"])) {
			$koneksi -> query("UPDATE user SET
				nama_user = '$nama',
				email_user = '$email',
				no_identitas_user = '$identitas',
				no_hp_user = '$hp',
				foto_user = '$foto',
				username_user = '$user',
				level_user = '$level',
				status_user = '$status'WHERE id_user = '$id_user'");

			move_uploaded_file($file, "../assets/img/$foto");
		}
		else{
			$password = sha1($password);
			$koneksi -> query("UPDATE user SET
				nama_user = '$nama',
				email_user = '$email',
				no_identitas_user = '$identitas',
				no_hp_user = '$hp',
				foto_user = '$foto',
				username_user = '$user',
				password_user = '$password',
				level_user = '$level',
				status_user = '$status'WHERE id_user = '$id_user'");

			move_uploaded_file($file, "../assets/img/$foto");
		}
	}

	echo "<script>alert ('Data berhasil diubah')</script>";
	echo "<script>location = 'petugas_tampil.php'</script>";
}
include "footer.php";
?>