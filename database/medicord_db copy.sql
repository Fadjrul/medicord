-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2022 at 04:12 PM
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
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(128) NOT NULL,
  `spesialis` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(128) DEFAULT NULL,
  `ttd_dokter` varchar(100) DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id_faq` int(11) NOT NULL,
  `faq_question` text NOT NULL,
  `faq_answer` text NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `id_group` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`id_group`, `group_name`, `createtime`) VALUES
(1, 'Administrator', '2022-09-30 11:27:59'),
(2, 'Kepala Puskesmas', '2022-09-30 11:27:59'),
(3, 'Perekam Medis', '2022-09-30 11:27:59'),
(4, 'Pegawai', '2022-09-30 11:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id_log` int(11) NOT NULL,
  `log_time` datetime DEFAULT NULL,
  `log_message` varchar(200) DEFAULT NULL,
  `log_ipaddress` varchar(30) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id_log`, `log_time`, `log_message`, `log_ipaddress`, `id_user`, `createtime`) VALUES
(1, '2022-10-13 18:17:41', 'Muh. Fadjrul Falakh melakukan login ke sistem', '127.0.0.1', 1, '2022-10-13 18:17:41'),
(10, '2022-10-17 15:47:26', 'Muh. Fadjrul Falakh melakukan login ke sistem', '127.0.0.1', 1, '2022-10-17 15:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(150) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `stock_obat` int(11) DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(11) NOT NULL,
  `no_rekam_medis` varchar(128) NOT NULL,
  `nik_pasien` varchar(128) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `nama_kepala_keluarga` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir_pasien` date NOT NULL,
  `alamat_pasien` varchar(128) DEFAULT NULL,
  `no_telp_pasien` varchar(128) DEFAULT NULL,
  `no_bpjs_pasien` varchar(128) DEFAULT NULL,
  `dw` text DEFAULT NULL,
  `lw` text DEFAULT NULL,
  `status_pasien` enum('BPJS','UMUM','GRATIS','') NOT NULL,
  `jns_kepesertaan` enum('PNS','Mandiri','Jamsostek','APBN','APBD') NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `no_rekam_medis`, `nik_pasien`, `nama_pasien`, `nama_kepala_keluarga`, `jenis_kelamin`, `tgl_lahir_pasien`, `alamat_pasien`, `no_telp_pasien`, `no_bpjs_pasien`, `dw`, `lw`, `status_pasien`, `jns_kepesertaan`, `createtime`) VALUES
(1, '00001', '74222455555555', 'Namikaze minato', 'Hachibi', 'Laki-laki', '2000-10-10', 'Jl. Durian, wua-wua, kendari', '085224238037', '135356786', '01', '02', 'BPJS', 'Mandiri', '2022-10-17 02:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `status_pegawai` varchar(50) DEFAULT NULL,
  `Bidang_pegawai` varchar(50) DEFAULT NULL,
  `alamat_pegawai` varchar(128) DEFAULT NULL,
  `no_telp_pegawai` varchar(50) DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(128) DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poliklinik`
--

CREATE TABLE `tbl_poliklinik` (
  `id_poliklinik` int(11) NOT NULL,
  `nama_poliklinik` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `gedung` varchar(128) DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rm_pemeriksaan_odontogram`
--

CREATE TABLE `tbl_rm_pemeriksaan_odontogram` (
  `id_pemeriksaan_odontogram` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `odontogram_11[51]` text DEFAULT NULL,
  `odontogram_12[51]` text DEFAULT NULL,
  `odontogram_13[51]` text DEFAULT NULL,
  `odontogram_14[51]` text DEFAULT NULL,
  `odontogram_15[51]` text DEFAULT NULL,
  `odontogram_16` text DEFAULT NULL,
  `odontogram_17` text DEFAULT NULL,
  `odontogram_18` text DEFAULT NULL,
  `odontogram_[61]21` text DEFAULT NULL,
  `odontogram_[62]22` text DEFAULT NULL,
  `odontogram_[63]23` text DEFAULT NULL,
  `odontogram_[64]24` text DEFAULT NULL,
  `odontogram_[65]25` text DEFAULT NULL,
  `odontogram_26` text DEFAULT NULL,
  `odontogram_27` text DEFAULT NULL,
  `odontogram_28` text DEFAULT NULL,
  `odontogram_48` text DEFAULT NULL,
  `odontogram_47` text DEFAULT NULL,
  `odontogram_46` text DEFAULT NULL,
  `odontogram_45[85]` text DEFAULT NULL,
  `odontogram_44[84]` text DEFAULT NULL,
  `odontogram_43[83]` text DEFAULT NULL,
  `odontogram_42[82]` text DEFAULT NULL,
  `odontogram_41[81]` text DEFAULT NULL,
  `odontogram_38` text DEFAULT NULL,
  `odontogram_37` text DEFAULT NULL,
  `odontogram_36` text DEFAULT NULL,
  `odontogram_[75]35` text DEFAULT NULL,
  `odontogram_[74]34` text DEFAULT NULL,
  `odontogram_[73]33` text DEFAULT NULL,
  `odontogram_[72]32` text DEFAULT NULL,
  `odontogram_[71]31` text DEFAULT NULL,
  `keterangan_tambahan` text NOT NULL,
  `jumlah_photo_diambil` int(11) NOT NULL,
  `jumlah_rongten_photo_diambil` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rm_pengkajian_awal`
--

CREATE TABLE `tbl_rm_pengkajian_awal` (
  `id_pengkajian_awal` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `riwayat_penyakit` text DEFAULT NULL,
  `riwayat_pengobatan` text DEFAULT NULL,
  `riwayat_penyakit_keluarga` text DEFAULT NULL,
  `alergi` text DEFAULT NULL,
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
  `kekuatan_otot` enum('kuat','lemah') DEFAULT NULL,
  `turgor` enum('baik','buruk') DEFAULT NULL,
  `penis` text DEFAULT NULL,
  `scrotum` text DEFAULT NULL,
  `testis` text DEFAULT NULL,
  `vagina` text DEFAULT NULL,
  `pendarahan` text DEFAULT NULL,
  `siklus_haid` enum('Teratur','Tidak teratur') DEFAULT NULL,
  `payudara` text DEFAULT NULL,
  `psikologis` text DEFAULT NULL,
  `sosiologis` enum('Menarik diri','Komunikasi buruk') DEFAULT NULL,
  `spiritual` enum('Perlu dibantu','Lain-lain') DEFAULT NULL,
  `hambatan_diri` text DEFAULT NULL,
  `masalah` text DEFAULT NULL,
  `data_penunjang` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rm_riwayat_kunjungan_pasien`
--

CREATE TABLE `tbl_rm_riwayat_kunjungan_pasien` (
  `id_riwayat_kunjungan_pasien` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `poliklinik_id` int(11) NOT NULL,
  `subjektif` text NOT NULL,
  `objektif` text NOT NULL,
  `assesment` text NOT NULL,
  `planning` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `setting_appname` varchar(100) NOT NULL,
  `setting_short_appname` varchar(10) NOT NULL,
  `setting_owner_name` varchar(100) NOT NULL,
  `setting_phone` varchar(30) NOT NULL,
  `setting_email` varchar(100) NOT NULL,
  `setting_address` text NOT NULL,
  `setting_logo` varchar(100) DEFAULT NULL,
  `setting_instagram` varchar(150) NOT NULL,
  `setting_facebook` varchar(150) NOT NULL,
  `setting_youtube` varchar(150) NOT NULL,
  `setting_about` text DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `setting_appname`, `setting_short_appname`, `setting_owner_name`, `setting_phone`, `setting_email`, `setting_address`, `setting_logo`, `setting_instagram`, `setting_facebook`, `setting_youtube`, `setting_about`, `createtime`) VALUES
(1, 'Medical Record Application Puskesmas Mekar Kota Kendari', 'medicord', 'Muh. Fadjrul Falakh', '(0401) 3081469', 'puskesmasmekar@yahoo.com', 'Jl. Laremba Komp. RCTI Kadia', '', 'https://instagram.com/uptd_pmekar/', 'https://facebook.com/promkesasryana', 'https://www.youtube.com/channel/UCMJWK7WQ3DsW_veIdwk-SCg', 'Ini adalah aplikasi rekam medis puskesmas mekar kota kendari', '2022-10-01 15:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `user_fullname` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_photo` varchar(128) NOT NULL,
  `user_lastlogin` datetime NOT NULL,
  `createtime` datetime NOT NULL,
  `group_id` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `user_fullname`, `user_name`, `user_password`, `user_email`, `user_photo`, `user_lastlogin`, `createtime`, `group_id`, `active`) VALUES
(1, 'Muh. Fadjrul Falakh', 'administrator', '$2y$10$6ELmhIbfosdPtGcQReBXbuMevkFPXZTJUi4au9oh4mxx1iF90tqyy', 'muhammadfadjrulfalakh00@gmail.com', '', '2022-10-05 21:47:20', '2022-10-05 21:47:20', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `tbl_poliklinik`
--
ALTER TABLE `tbl_poliklinik`
  ADD PRIMARY KEY (`id_poliklinik`);

--
-- Indexes for table `tbl_rm_pemeriksaan_odontogram`
--
ALTER TABLE `tbl_rm_pemeriksaan_odontogram`
  ADD PRIMARY KEY (`id_pemeriksaan_odontogram`),
  ADD KEY `constraint_fktbl_rm_po_dokter_id` (`dokter_id`),
  ADD KEY `constraint_fktbl_rm_po_pasien_id` (`pasien_id`),
  ADD KEY `constraint_fktbl_rm_po_user_id` (`user_id`);

--
-- Indexes for table `tbl_rm_pengkajian_awal`
--
ALTER TABLE `tbl_rm_pengkajian_awal`
  ADD PRIMARY KEY (`id_pengkajian_awal`),
  ADD KEY `constraint_fktbl_rm_pa_pasien_id` (`pasien_id`) USING BTREE,
  ADD KEY `constraint_fktbl_rm_pa_pegawai_id` (`pegawai_id`) USING BTREE,
  ADD KEY `constraint_fktbl_rm_pa_user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `tbl_rm_riwayat_kunjungan_pasien`
--
ALTER TABLE `tbl_rm_riwayat_kunjungan_pasien`
  ADD PRIMARY KEY (`id_riwayat_kunjungan_pasien`),
  ADD KEY `constraint_fktbl_rm_rkp_pasien_id` (`pasien_id`),
  ADD KEY `constraint_fktbl_rm_rkp_dokter_id` (`dokter_id`),
  ADD KEY `constraint_fktbl_rm_rkp_poliklinik_id` (`poliklinik_id`),
  ADD KEY `constraint_fktbl_rm_rkp_user_id` (`user_id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_poliklinik`
--
ALTER TABLE `tbl_poliklinik`
  MODIFY `id_poliklinik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rm_pemeriksaan_odontogram`
--
ALTER TABLE `tbl_rm_pemeriksaan_odontogram`
  MODIFY `id_pemeriksaan_odontogram` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rm_pengkajian_awal`
--
ALTER TABLE `tbl_rm_pengkajian_awal`
  MODIFY `id_pengkajian_awal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rm_riwayat_kunjungan_pasien`
--
ALTER TABLE `tbl_rm_riwayat_kunjungan_pasien`
  MODIFY `id_riwayat_kunjungan_pasien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `constraint_fktbl_log_user_id` FOREIGN KEY (`id_log`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_rm_pemeriksaan_odontogram`
--
ALTER TABLE `tbl_rm_pemeriksaan_odontogram`
  ADD CONSTRAINT `constraint_fktbl_rm_po_dokter_id` FOREIGN KEY (`dokter_id`) REFERENCES `tbl_dokter` (`id_dokter`),
  ADD CONSTRAINT `constraint_fktbl_rm_po_pasien_id` FOREIGN KEY (`pasien_id`) REFERENCES `tbl_pasien` (`id_pasien`),
  ADD CONSTRAINT `constraint_fktbl_rm_po_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_rm_pengkajian_awal`
--
ALTER TABLE `tbl_rm_pengkajian_awal`
  ADD CONSTRAINT `constraint_fkpa_rekam_medis` FOREIGN KEY (`pasien_id`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_fkpe_rm_pengkajian_awal` FOREIGN KEY (`pegawai_id`) REFERENCES `tbl_pegawai` (`id_pegawai`),
  ADD CONSTRAINT `constraint_fkus_rekam_medis` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rm_riwayat_kunjungan_pasien`
--
ALTER TABLE `tbl_rm_riwayat_kunjungan_pasien`
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_dokter_id` FOREIGN KEY (`dokter_id`) REFERENCES `tbl_dokter` (`id_dokter`),
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_pasien_id` FOREIGN KEY (`pasien_id`) REFERENCES `tbl_pasien` (`id_pasien`),
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_poliklinik_id` FOREIGN KEY (`poliklinik_id`) REFERENCES `tbl_poliklinik` (`id_poliklinik`),
  ADD CONSTRAINT `constraint_fktbl_rm_rkp_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
