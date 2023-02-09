<?php 
include "header.php";

//dapatkan id dari url
$id_menara = $_GET["id"];

$koneksi -> query ("DELETE FROM menara WHERE id_menara = '$id_menara'");

echo"<script>alert('Data Terhapus')</script>";
echo"<script>location = 'menara_tampil.php'</script>";

 ?>