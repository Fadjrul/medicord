-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2022 at 02:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicord_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(128) NOT NULL,
  `spesialis` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_telp` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `nama_kk` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_telp` varchar(128) NOT NULL,
  `no_bpjs` varchar(128) NOT NULL,
  `status_pasien` enum('BPJS','UMUM','GRATIS','') NOT NULL,
  `jns_kepesertaan` enum('PNS','Mandiri','Jamsostek','APBN','APBD') NOT NULL,
  `waktu_kunjungan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `nama_penyakit` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id` int(11) NOT NULL,
  `nama_poliklinik` varchar(128) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rm` int(11) NOT NULL,
  `no_rm` varchar(128) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_poliklinik` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `nama_petugas` varchar(128) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `riwayat_penyakit` text DEFAULT NULL,
  `riwayat_pengobatan` text DEFAULT NULL,
  `riwayat_penyakit_keluarga` text DEFAULT NULL,
  `kesadaran_fisik` varchar(50) DEFAULT NULL,
  `tekanan_darah` varchar(50) DEFAULT NULL,
  `frekuensi_nafas` varchar(50) DEFAULT NULL,
  `gcs` varchar(50) DEFAULT NULL,
  `frekuensi_nadi` varchar(50) DEFAULT NULL,
  `suhu_tubuh` enum('febris','afebris') DEFAULT NULL,
  `keluhan_pernafasan` enum('Sesak','Nyeri','Batuk') DEFAULT NULL,
  `irama_nafas` enum('regular','irregular') DEFAULT NULL,
  `suara_nafas` text DEFAULT NULL,
  `nyeri_dada` enum('ya','tidak') DEFAULT NULL,
  `suara_jantung` enum('normal','tidak normal') DEFAULT NULL,
  `crt` enum('< 3 detik','> 3 detik') DEFAULT NULL,
  `jvp` enum('normal','meningkat') DEFAULT NULL,
  `keluhan_pusing` enum('ya','tidak') DEFAULT NULL,
  `kesadaran_persyarafan` text DEFAULT NULL,
  `pupil` enum('isokor','anisokor') DEFAULT NULL,
  `sklera` enum('ikretik','non ikretik','perdarahan') DEFAULT NULL,
  `kaku_kuduk` enum('ya','tidak') DEFAULT NULL,
  `kelumpuhan` enum('ya','tidak') DEFAULT NULL,
  `gangg_persepsi_sensorik` enum('ya','tidak') DEFAULT NULL,
  `keluhan_sistem_ekskresi` text DEFAULT NULL,
  `produksi_urin` varchar(50) DEFAULT NULL,
  `bak` varchar(50) DEFAULT NULL,
  `warna_urin` varchar(50) DEFAULT NULL,
  `bau_urin` varchar(50) DEFAULT NULL,
  `mulut` enum('Nyeri telan','Nyeri rongga mulut') DEFAULT NULL,
  `abdomen` text DEFAULT NULL,
  `bab` varchar(50) DEFAULT NULL,
  `konsistensi_bab` text DEFAULT NULL,
  `diet` text DEFAULT NULL,
  `frekuensi_diet` varchar(50) DEFAULT NULL,
  `jml_frekuensi_diet` varchar(50) DEFAULT NULL,
  `pergerak_sendi` enum('bebas','terbatas') DEFAULT NULL,
  `akral` enum('hangat','panas','dingin') DEFAULT NULL,
  `patah_tulang` text DEFAULT NULL,
  `eks_fiksasi` text DEFAULT NULL,
  `masalah` text DEFAULT NULL,
  `poli_dikunjungi` varchar(128) NOT NULL,
  `subjektif` text NOT NULL,
  `objektif` text NOT NULL,
  `assesment` text NOT NULL,
  `planning` text NOT NULL,
  `paraf` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullName` varchar(128) NOT NULL,
  `userName` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `constraint_fkpa_rekam_medis` (`id_pasien`),
  ADD KEY `constraint_fkdo_rekam_medis` (`id_dokter`),
  ADD KEY `constraint_fkpe_rekam_medis` (`id_penyakit`),
  ADD KEY `constraint_fkpo_rekam_medis` (`id_poliklinik`),
  ADD KEY `constraint_fkus_rekam_medis` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `constraint_fkdo_rekam_medis` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_fkpa_rekam_medis` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_fkpe_rekam_medis` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_fkpo_rekam_medis` FOREIGN KEY (`id_poliklinik`) REFERENCES `poliklinik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_fkus_rekam_medis` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
