<?php 
include "header.php";

$id_user = $_GET["id"];
$ambil_user = $koneksi -> query("SELECT * FROM user WHERE id_user = '$id_user'");
$user = $ambil_user->fetch_assoc();
?>
<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Data User</h4>
		<p class="card-category ms-3">Data <b><?php echo $user["nama_user"]; ?> - <?php echo $user["level_user"]; ?></b></p>

		<div class="card-body">
			<div class="row">
				<div class="col-md-4">
					<table class="table">
						<tr>
							<th>Nama </th>
							<td> : <?php echo $user["nama_user"]; ?></td>
						</tr>
						<tr>
							<th>No Identitas </th>
							<td> : <?php echo $user["no_identitas_user"]; ?></td>
						</tr>
						<tr>
							<th>Email </th>
							<td> : <?php echo $user["email_user"]; ?></td>
						</tr>
						<tr>
							<th>No HP </th>
							<td> : <?php echo $user["no_hp_user"]; ?></td>
						</tr>
					</table>
				</div>
				<div class="offset-4 col-md-4">
					<img src="../assets/img/<?php echo $user["foto_user"]; ?>" class="rounded" style="width: 200px;">
				</div>
			</div>
			<table class="mt-3 table table-bordered table-hover">
				<thead>
					<tr>
						<th>Username</th>
						<th>Level</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $user["username_user"]; ?></td>
						<td><?php echo $user["level_user"]; ?></td>
						<td><?php echo $user["status_user"]; ?></td>
					</tr>
				</tbody>
			</table>
			
		</div>
	</div>

</div>


<?php 
include "footer.php";
?>