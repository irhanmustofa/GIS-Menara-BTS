<?php 
include "koneksi.php";

session_destroy();

echo "<script>alert('Anda berhasil logout')</script>";
echo "<script>location = 'index.php'</script>";

?>