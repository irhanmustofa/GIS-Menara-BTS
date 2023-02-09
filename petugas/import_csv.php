<?php 
include "../koneksi.php";

if (!isset($_SESSION["petugas"])) {
	echo "<script>alert('Anda harus login')</script>";
	echo "<script>location = '../login.php'</script>";
}

$file = fopen($_FILES['filemenara']['tmp_name'], "r");
$nomor = 1;
while(! feof($file))
{


		$perbaris = fgetcsv($file);

	if ($nomor > 1) {
		if (isset($perbaris['0']))
		{
			$kategori = $perbaris['0']; 
			$kecamatan = $perbaris['1']; 
			$petugas = $perbaris['2']; 
			$pemilik = $perbaris['3'];
			$jenis = $perbaris['4'];
			$lat = $perbaris['5'];
			$long = $perbaris['6'];
			$alamat = $perbaris['7'];
			$tinggi = $perbaris['8'];
			$ketinggian = $perbaris['9'];
			$keterangan = $perbaris['10'];
			$tanggal = $perbaris['11'];
			$status = $perbaris['12'];

			
			$koneksi -> query("INSERT INTO menara (tipe_menara,id_desa,id_user,pemilik_menara,jenis_menara,latitude_menara,longitude_menara,alamat_menara,tinggi_menara,ketinggian_dari_tanah,keterangan_menara,tanggal_survei,status_menara) VALUES('$kategori','$kecamatan','$petugas','$pemilik','$jenis','$lat','$long','$alamat','$tinggi','$ketinggian','$keterangan','$tanggal','$status')"); 
		}
	}
	$nomor++;
}
fclose($file);
echo $nomor;
echo "<script>alert ('Data Berhasil Diupload')</script>";
echo "<script>location = 'menara_tampil.php'</script>";



?>