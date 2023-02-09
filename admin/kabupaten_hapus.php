<?php 
$koneksi = new mysqli ("localhost","root","","aplikasi");

//dapatkan id dari url
$id_kabupaten = $_GET["id"];

$koneksi -> query ("DELETE FROM kabupaten WHERE id_kabupaten = '$id_kabupaten'");

echo"<script>alert('Data Terhapus')</script>";
echo"<script>location = 'kabupaten.php'</script>";

 ?>