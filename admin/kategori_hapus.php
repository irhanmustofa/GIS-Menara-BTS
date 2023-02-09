<?php 
include "header.php";

//dapatkan id dari url
$id_kategori = $_GET["id"];

$koneksi -> query ("DELETE FROM kategori WHERE id_kategori = '$id_kategori'");

echo"<script>alert('Data Terhapus')</script>";
echo"<script>location = 'kategori_tampil.php'</script>";

 ?>