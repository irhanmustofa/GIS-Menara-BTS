<?php 
include "header.php";

//dapatkan id dari url
$id_user = $_GET["id"];

$koneksi -> query ("DELETE FROM user WHERE id_user = '$id_user'");

echo"<script>alert('Data Terhapus')</script>";
echo"<script>location = 'petugas_tampil.php'</script>";

 ?>