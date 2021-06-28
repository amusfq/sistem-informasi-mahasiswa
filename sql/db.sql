-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2021 at 05:21 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `nim` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` tinyint(4) NOT NULL DEFAULT '0',
  `tempat_lahir` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `golongan_darah` tinyint(4) NOT NULL DEFAULT '0',
  `agama` tinyint(4) NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `semester` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = tidak aktif\r\n1 = aktif',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`nim`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `golongan_darah`, `agama`, `alamat`, `no_telepon`, `id_dosen`, `id_prodi`, `semester`, `status`, `password`, `created_at`, `updated_at`) VALUES
(4319023, 'Achmad Musyaffa Taufiqi', 0, 'Tangerang', '2000-01-25', 0, 0, 'Ds Terung Kulon, Krian, Sidoarjo, Jawa Timur', '089612890670', 1, 1, 1, 1, '21232f297a57a5a743894a0e4a801fc3', '2021-06-21 09:33:56', '2021-06-28 04:18:50'),
(4319028, 'Larojas Putra Buton', 0, 'Surabaya', '1999-01-01', 0, 1, 'ini alamat', '123123', 2, 1, 1, 1, '1a29026d9efdf17b7f3792dcc72a765e', '2021-06-28 03:45:01', '2021-06-28 03:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` int(11) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`) VALUES
(1, 'M Rizky Hidayat'),
(2, 'Tyo Riyandi');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama_fakultas` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama_fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Ilmu Komputer', '2021-06-21 09:31:08', '2021-06-21 09:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id` int(11) NOT NULL,
  `id_mata_kuliah` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `jam_kuliah` time NOT NULL,
  `hari_kuliah` varchar(14) NOT NULL,
  `ruang` varchar(14) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`id`, `id_mata_kuliah`, `id_dosen`, `jam_kuliah`, `hari_kuliah`, `ruang`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '08:30:00', 'Senin', 'A-10', '2021-06-22 03:45:27', '2021-06-22 09:24:27'),
(2, 1, 2, '10:30:00', 'Senin', 'B-01', '2021-06-22 03:45:27', '2021-06-22 09:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_mahasiswa`
--

CREATE TABLE `jadwal_mahasiswa` (
  `id` int(11) NOT NULL,
  `id_jadwal_kuliah` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_mahasiswa`
--

INSERT INTO `jadwal_mahasiswa` (`id`, `id_jadwal_kuliah`, `id_mahasiswa`, `semester`, `created_at`, `updated_at`) VALUES
(15, 2, 4319023, 1, '2021-06-28 05:06:39', '2021-06-28 05:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(11) NOT NULL,
  `nama_mata_kuliah` varchar(255) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama_mata_kuliah`, `id_prodi`, `sks`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'Basis Data', 1, 2, 1, '2021-06-22 03:44:09', '2021-06-22 03:44:09'),
(2, 'Algoritma Pemrograman', 1, 2, 1, '2021-06-22 03:44:09', '2021-06-22 03:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(64) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`, `id_fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Informatika', 1, '2021-06-21 09:32:52', '2021-06-21 09:32:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mata_kuliah` (`id_mata_kuliah`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `jadwal_mahasiswa`
--
ALTER TABLE `jadwal_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal_kuliah` (`id_jadwal_kuliah`),
  ADD KEY `nim` (`id_mahasiswa`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `nim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4319029;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_mahasiswa`
--
ALTER TABLE `jadwal_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`),
  ADD CONSTRAINT `biodata_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`nip`);

--
-- Constraints for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD CONSTRAINT `jadwal_kuliah_ibfk_1` FOREIGN KEY (`id_mata_kuliah`) REFERENCES `mata_kuliah` (`id`),
  ADD CONSTRAINT `jadwal_kuliah_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`nip`);

--
-- Constraints for table `jadwal_mahasiswa`
--
ALTER TABLE `jadwal_mahasiswa`
  ADD CONSTRAINT `jadwal_mahasiswa_ibfk_1` FOREIGN KEY (`id_jadwal_kuliah`) REFERENCES `jadwal_kuliah` (`id`),
  ADD CONSTRAINT `jadwal_mahasiswa_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `biodata` (`nim`);

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
