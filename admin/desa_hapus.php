<?php 
include "header.php";

//dapatkan id dari url
$id_desa = $_GET["id"];

$koneksi -> query ("DELETE FROM desa WHERE id_desa = '$id_desa'");

echo"<script>alert('Data Terhapus')</script>";
echo"<script>location = 'desa.php'</script>";

 ?>