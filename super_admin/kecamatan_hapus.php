<?php 
include "header.php";

//dapatkan id dari url
$id_kecamatan = $_GET["id"];

$koneksi -> query ("DELETE FROM kecamatan WHERE kecamatan.id_kecamatan = '$id_kecamatan'");

echo"<script>alert('Data Terhapus')</script>";
echo"<script>location = 'kecamatan.php'</script>";

 ?>