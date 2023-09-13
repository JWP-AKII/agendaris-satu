-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 12, 2023 at 11:49 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `nama`, `created_at`) VALUES
(1, 'Analisis Faktor-Faktor yang Mempengaruhi Keputusan Investasi di Pasar Saham', '2023-09-12 15:05:29'),
(2, 'Pengaruh Perubahan Suku Bunga Terhadap Perilaku Konsumen di Pasar Kredit', '2023-09-12 15:05:29'),
(3, 'Pengembangan Aplikasi Mobile Berbasis Android untuk Manajemen Tugas', '2023-09-12 15:05:29'),
(4, 'Evaluasi Keamanan Jaringan Komputer dalam Era Internet of Things (IoT)', '2023-09-12 15:05:29'),
(5, 'Pengaruh Metode Pembelajaran Berbasis Teknologi Terhadap Prestasi Belajar Siswa', '2023-09-12 15:05:29'),
(6, 'Analisis Peran Guru dalam Meningkatkan Minat Baca Siswa Sekolah Dasar', '2023-09-12 15:05:29'),
(7, 'Dampak Perubahan Iklim Terhadap Keanekaragaman Hayati di Ekosistem Hutan Hujan Tropis', '2023-09-12 15:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi_surat`
--

CREATE TABLE `disposisi_surat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `surat_id` int(11) NOT NULL,
  `disposisi` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `penerima` varchar(255) DEFAULT NULL,
  `nomor_agenda` varchar(255) NOT NULL,
  `tanggal_agenda` date NOT NULL,
  `buku_id` int(11) NOT NULL,
  `status` enum('draft','proses','selesai','tunda') NOT NULL,
  `tipe_surat` enum('masuk','keluar') NOT NULL DEFAULT 'masuk',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `nomor_surat`, `tanggal_surat`, `pengirim`, `penerima`, `nomor_agenda`, `tanggal_agenda`, `buku_id`, `status`, `tipe_surat`, `created_at`) VALUES
(1, '077/BMS-VN/2023/10', '2023-09-11', 'Niko Belic', 'Roman Belic', 'POS.100/20/SD', '2023-09-14', 1, 'draft', 'masuk', '2023-09-12 15:09:32'),
(2, '190/BIMTEK/IJ/18763.2', '2023-09-12', 'Franklin Clinton', 'Michael De Santa', '0972625511', '2023-09-12', 4, 'proses', 'masuk', '2023-09-12 15:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `jabatan`, `created_at`) VALUES
(1, 'Sepuh 1', 'sepuh1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Ketua', '2023-09-12 07:16:25'),
(2, 'Sepuh 2', 'sepuh2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Wakil', '2023-09-12 07:16:25'),
(3, 'Sepuh 3', 'sepuh3', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Sekretaris', '2023-09-12 07:16:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_masuk_id` (`surat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  ADD CONSTRAINT `disposisi_surat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `disposisi_surat_ibfk_2` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
