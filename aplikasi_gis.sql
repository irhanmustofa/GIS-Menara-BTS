-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 01:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_gis`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` varchar(100) NOT NULL,
  `kode_desa` varchar(15) NOT NULL,
  `nama_desa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `id_kecamatan`, `kode_desa`, `nama_desa`) VALUES
(1, '4', '0101', 'Bausaran'),
(2, '4', '0102', 'Suryatmajan'),
(3, '4', '0103', 'Tegalpanggung'),
(4, '4', '0201', 'Pringgokusuman'),
(5, '6', '0202', 'Sosromenduran'),
(6, '7', '0301', 'Baciro'),
(7, '7', '0302', 'Demangan'),
(8, '7', '0303', 'Klitren'),
(9, '7', '0304', 'Kotabaru'),
(10, '7', '0305', 'Terban'),
(11, '8', '0401', 'Ngupasan'),
(12, '8', '0402', 'Prawrodirjan'),
(13, '9', '0501', 'Bumijo'),
(14, '9', '0502', 'Cokrodiningrat'),
(15, '9', '0503', 'Gowongan'),
(16, '10', '0601', 'Prenggan'),
(17, '10', '0602', 'Purbayan'),
(18, '10', '0603', 'Rejowinangun'),
(19, '11', '0701', 'Kadipaten'),
(20, '11', '0702', 'Panembahan'),
(21, '10', '0703', 'Patehan'),
(22, '12', '0801', 'Gedongkiwo'),
(23, '12', '0802', 'Mantrijeron'),
(24, '12', '0803', 'Suryodiningratan'),
(25, '13', '0901', 'Brontokusuman'),
(26, '13', '0902', 'Keparakan'),
(27, '13', '0903', 'Wirogunan'),
(28, '14', '1001', 'Ngampilan'),
(29, '14', '1002', 'Notoprajan'),
(30, '15', '1101', 'Gunungketur'),
(31, '15', '1102', 'Purwokinanti'),
(32, '17', '1201', 'Bener'),
(33, '17', '1202', 'Karangwaru'),
(34, '17', '1203', 'Kricak'),
(35, '17', '1204', 'Tegalrejo'),
(36, '18', '1301', 'Giwangan'),
(37, '18', '1302', 'Mujamuju'),
(38, '18', '1303', 'Pandeyan'),
(39, '18', '1304', 'Semaki'),
(40, '18', '1305', 'Sorosutan'),
(41, '18', '1306', 'Tahunan'),
(42, '18', '1307', 'Warungboto'),
(43, '19', '1401', 'Pakuncen'),
(44, '19', '1402', 'Patangpuluh'),
(45, '19', '1403', 'Wirobrajan');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `kode_kabupaten` varchar(15) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `kode_kabupaten`, `nama_kabupaten`) VALUES
(1, '3404', 'Sleman'),
(2, '3402', 'Bantul'),
(4, '3403', 'Gunung Kidul'),
(6, '3401', 'Kulon Progo'),
(7, '3471', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `tipe_menara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `tipe_menara`) VALUES
(6, 'Menara Mandiri Greenfield'),
(7, 'Menara Mandiri RoofTop'),
(8, 'Menara Teregang'),
(9, 'Menara Tunggal'),
(10, 'Tiang Microcell');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `kode_kecamatan` varchar(15) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kabupaten`, `kode_kecamatan`, `nama_kecamatan`) VALUES
(4, 7, '01', 'Danurejan'),
(6, 7, '02', 'Gedongtengen'),
(7, 7, '03', 'Gondokusuman'),
(8, 7, '04', 'Gondomanan'),
(9, 7, '05', 'Jetis'),
(10, 7, '06', 'Kotagede'),
(11, 7, '07', 'Kraton'),
(12, 7, '08', 'Mantrijeron'),
(13, 7, '09', 'Mergangsan'),
(14, 7, '10', 'Ngampilan'),
(15, 7, '11', 'Pakualaman'),
(17, 7, '12', 'Tegalrejo'),
(18, 7, '13', 'Umbulharjo'),
(19, 7, '14', 'Wirobrajan');

-- --------------------------------------------------------

--
-- Table structure for table `menara`
--

CREATE TABLE `menara` (
  `id_menara` int(11) NOT NULL,
  `tipe_menara` varchar(100) NOT NULL,
  `id_desa` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pemilik_menara` varchar(30) NOT NULL,
  `jenis_menara` enum('greenfield','rooftop') NOT NULL,
  `latitude_menara` varchar(15) NOT NULL,
  `longitude_menara` varchar(15) NOT NULL,
  `alamat_menara` text NOT NULL,
  `tinggi_menara` int(11) NOT NULL,
  `ketinggian_dari_tanah` int(11) NOT NULL,
  `keterangan_menara` text NOT NULL,
  `tanggal_survei` date NOT NULL,
  `status_menara` enum('Valid','Tidak Valid') NOT NULL,
  `foto_menara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menara`
--

INSERT INTO `menara` (`id_menara`, `tipe_menara`, `id_desa`, `id_user`, `pemilik_menara`, `jenis_menara`, `latitude_menara`, `longitude_menara`, `alamat_menara`, `tinggi_menara`, `ketinggian_dari_tanah`, `keterangan_menara`, `tanggal_survei`, `status_menara`, `foto_menara`) VALUES
(3, 'Menara Mandiri Greenfield', '16', 11, 'XL', 'greenfield', '-7.82062', '110.40063', 'Jalan Ngeksigondo, Prenggan, Kec. Kotagede, Kota Yogyakarta', 44, 0, 'Surveyor diterima dengan baik', '2022-12-12', 'Valid', 'TimePhoto_20221212_125207.jpg'),
(4, 'Menara Mandiri Greenfield', '16', 11, 'Indosat', 'greenfield', '-7.81878', '110.397', 'Jl. Ny Adisoro, Prenggan, Kotagede Yk', 55, 0, 'Baik', '2022-12-12', 'Valid', 'TimePhoto_20221212_125518.jpg'),
(5, 'Menara Mandiri RoofTop', '18', 11, 'PT. Borobudur Fiber Indonesia', 'rooftop', '-7.81427', '110.40203', 'Jl. Gedong Kuning Selatan, Rejowinangun, Yogyakarta', 18, 0, 'Surveyor diterima dengan baik', '2022-12-12', 'Valid', 'TimePhoto_20221212_124835.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `no_identitas_user` varchar(16) NOT NULL,
  `no_hp_user` varchar(14) NOT NULL,
  `foto_user` varchar(255) NOT NULL,
  `username_user` varchar(30) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `level_user` enum('super admin','admin','petugas') NOT NULL,
  `status_user` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `no_identitas_user`, `no_hp_user`, `foto_user`, `username_user`, `password_user`, `level_user`, `status_user`) VALUES
(1, 'Irhan Mustofa', 'irhan@gmail.com', '19.11.2944', '0822234908981', 'irhan.JPG', 'irhan', '123456', 'super admin', 'aktif'),
(3, 'admin', 'admin@gmail.com', '12312', '085212345678', '1.jpg', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'aktif'),
(8, 'irhan m', 'petugas@gmail.com', '11111111', '085212345678', 'pic-profile-1.jpg', 'petugas', '670489f94b6997a870b148f74744ee5676304925', 'petugas', 'aktif'),
(10, 'petugas 2', 'petugas2@gmail.com', '11.21.321.21', '0897654213112', '4.jpg', 'petugas2', 'b37db86413cd76093be82f93f9cdeccb6de0e730', 'petugas', 'aktif'),
(11, 'irhan', 'irhanm@gmail.com', '19.11.2944', '082223411083', '1.jpg', 'irhanm', '5dd2f7e56a4052cd1e2af5ba99840c3d719c42ed', 'super admin', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `menara`
--
ALTER TABLE `menara`
  ADD PRIMARY KEY (`id_menara`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menara`
--
ALTER TABLE `menara`
  MODIFY `id_menara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
