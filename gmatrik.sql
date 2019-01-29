-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 03:10 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gmatrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmatrikulasi`
--

CREATE TABLE `adminmatrikulasi` (
  `id_adminmatrikulasi` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmatrikulasi`
--

INSERT INTO `adminmatrikulasi` (`id_adminmatrikulasi`, `id_user`, `nama`, `gender`) VALUES
(1, 1, 'Derry', 'Ikhwan');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pulang`
--

CREATE TABLE `jadwal_pulang` (
  `id_pekan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `shubuh` int(1) NOT NULL,
  `dzuhur` int(1) NOT NULL,
  `ashar` int(1) NOT NULL,
  `maghrib` int(1) NOT NULL,
  `isya` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(8) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `angkatan` varchar(2) NOT NULL,
  `kota_asal` varchar(25) NOT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `id_user`, `nama`, `gender`, `angkatan`, `kota_asal`, `telepon`, `aktif`) VALUES
(18323, 5, 'Adelina', 'Akhwat', '18', 'Jakarta', '08124738242', 1),
(18000274, 7, 'Dian Nabila', 'Akhwat', '18', 'Bekasi', '0812472942', 1),
(18004215, 3, 'Muhammad Alfi', 'Ikhwan', '18', 'Palembang', '08563922184', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pekan`
--

CREATE TABLE `pekan` (
  `id_pekan` int(4) NOT NULL,
  `id_semester` int(1) NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembina_mahasiswa`
--

CREATE TABLE `pembina_mahasiswa` (
  `id_pembina` int(8) NOT NULL ,
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gelar` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `kota_asal` varchar(25) NOT NULL,
  `telepon` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `id_user`, `nama`, `gender`) VALUES
(1, 4, 'Hasan Ishak', 'Ikhwan');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_shalat`
--

CREATE TABLE `presensi_shalat` (
  `nim` int(8) NOT NULL,
  `id_pekan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `shubuh` int(1) NOT NULL,
  `dzuhur` int(1) NOT NULL,
  `ashar` int(1) NOT NULL,
  `maghrib` int(1) NOT NULL,
  `isya` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `presensi_tahsin`
--

CREATE TABLE `presensi_tahsin` (
  `id_tahsin` int(5) NOT NULL,
  `nim` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `presensi_talim`
--

CREATE TABLE `presensi_talim` (
  `id_talim` int(5) NOT NULL,
  `nim` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(3) NOT NULL,
  `angkatan` int(2) NOT NULL,
  `semester` int(1) NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahsin`
--

CREATE TABLE `tahsin` (
  `id_tahsin` int(5) NOT NULL,
  `id_pekan` int(5) NOT NULL,
  `id_pembina` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `talim`
--

CREATE TABLE `talim` (
  `id_talim` int(5) NOT NULL,
  `id_pekan` int(4) NOT NULL,
  `talim` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `udzur_shalat`
--

CREATE TABLE `udzur_shalat` (
  `id_udzur` int(8) NOT NULL,
  `nim` int(8) NOT NULL,
  `id_pekan` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_shalat` varchar(7) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL,
  `direview` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `udzur_tahsin`
--

CREATE TABLE `udzur_tahsin` (
  `id_udzur` int(8) NOT NULL,
  `id_tahsin` int(5) NOT NULL,
  `nim` int(8) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL,
  `direview` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `udzur_talim`
--

CREATE TABLE `udzur_talim` (
  `id_udzur` int(8) NOT NULL,
  `id_talim` int(5) NOT NULL,
  `nim` int(8) NOT NULL,
  `udzur` varchar(12) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `diajukan` datetime NOT NULL,
  `disetujui` int(1) NOT NULL,
  `direview` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_default` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `terakhir_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `password_default`, `level`, `terakhir_login`) VALUES
(1, 'adminmatrik', 'bismillah', 0, 1, NULL),
(2, 'pembina1', 'pembina123', 0, 2, NULL),
(3, '18004215', 'mahasiswa', 0, 3, NULL),
(4, 'pimpinan1', 'pimpinan123', 0, 4, NULL),
(5, '18000263', '4S1C7iZxIc', 1, 3, NULL),
(6, '18323', 'rxDSIqFoAU', 1, 3, NULL),
(7, '18000274', 'Vkq3UUZRk5', 1, 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmatrikulasi`
--
ALTER TABLE `adminmatrikulasi`
  ADD PRIMARY KEY (`id_adminmatrikulasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jadwal_pulang`
--
ALTER TABLE `jadwal_pulang`
  ADD KEY `id_pekan` (`id_pekan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pekan`
--
ALTER TABLE `pekan`
  ADD PRIMARY KEY (`id_pekan`),
  ADD KEY `id_semester` (`id_semester`);

--
-- Indexes for table `pembina_mahasiswa`
--
ALTER TABLE `pembina_mahasiswa`
  ADD PRIMARY KEY (`id_pembina`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `presensi_shalat`
--
ALTER TABLE `presensi_shalat`
  ADD KEY `nim` (`nim`),
  ADD KEY `id_pekan` (`id_pekan`);

--
-- Indexes for table `presensi_tahsin`
--
ALTER TABLE `presensi_tahsin`
  ADD KEY `id_tahsin` (`id_tahsin`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `presensi_talim`
--
ALTER TABLE `presensi_talim`
  ADD KEY `id_talim` (`id_talim`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tahsin`
--
ALTER TABLE `tahsin`
  ADD PRIMARY KEY (`id_tahsin`),
  ADD KEY `id_pekan` (`id_pekan`),
  ADD KEY `id_pembina` (`id_pembina`);

--
-- Indexes for table `talim`
--
ALTER TABLE `talim`
  ADD PRIMARY KEY (`id_talim`),
  ADD KEY `id_pekan` (`id_pekan`);

--
-- Indexes for table `udzur_shalat`
--
ALTER TABLE `udzur_shalat`
  ADD PRIMARY KEY (`id_udzur`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_pekan` (`id_pekan`);

--
-- Indexes for table `udzur_tahsin`
--
ALTER TABLE `udzur_tahsin`
  ADD PRIMARY KEY (`id_udzur`),
  ADD KEY `id_tahsin` (`id_tahsin`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `udzur_talim`
--
ALTER TABLE `udzur_talim`
  ADD PRIMARY KEY (`id_udzur`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_talim` (`id_talim`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminmatrikulasi`
--
ALTER TABLE `adminmatrikulasi`
  MODIFY `id_adminmatrikulasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pekan`
--
ALTER TABLE `pekan`
  MODIFY `id_pekan` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_pimpinan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tahsin`
--
ALTER TABLE `tahsin`
  MODIFY `id_tahsin` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `talim`
--
ALTER TABLE `talim`
  MODIFY `id_talim` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `udzur_shalat`
--
ALTER TABLE `udzur_shalat`
  MODIFY `id_udzur` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `udzur_tahsin`
--
ALTER TABLE `udzur_tahsin`
  MODIFY `id_udzur` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `udzur_talim`
--
ALTER TABLE `udzur_talim`
  MODIFY `id_udzur` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminmatrikulasi`
--
ALTER TABLE `adminmatrikulasi`
  ADD CONSTRAINT `adminmatrikulasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `jadwal_pulang`
--
ALTER TABLE `jadwal_pulang`
  ADD CONSTRAINT `jadwal_pulang_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `pekan`
--
ALTER TABLE `pekan`
  ADD CONSTRAINT `pekan_ibfk_1` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`);

--
-- Constraints for table `pembina_mahasiswa`
--
ALTER TABLE `pembina_mahasiswa`
  ADD CONSTRAINT `pembina_mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD CONSTRAINT `pimpinan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `presensi_shalat`
--
ALTER TABLE `presensi_shalat`
  ADD CONSTRAINT `presensi_shalat_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `presensi_shalat_ibfk_2` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`);

--
-- Constraints for table `presensi_tahsin`
--
ALTER TABLE `presensi_tahsin`
  ADD CONSTRAINT `presensi_tahsin_ibfk_1` FOREIGN KEY (`id_tahsin`) REFERENCES `tahsin` (`id_tahsin`),
  ADD CONSTRAINT `presensi_tahsin_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `presensi_talim`
--
ALTER TABLE `presensi_talim`
  ADD CONSTRAINT `presensi_talim_ibfk_1` FOREIGN KEY (`id_talim`) REFERENCES `talim` (`id_talim`),
  ADD CONSTRAINT `presensi_talim_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `tahsin`
--
ALTER TABLE `tahsin`
  ADD CONSTRAINT `tahsin_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`),
  ADD CONSTRAINT `tahsin_ibfk_2` FOREIGN KEY (`id_pembina`) REFERENCES `pembina_mahasiswa` (`id_pembina`);

--
-- Constraints for table `talim`
--
ALTER TABLE `talim`
  ADD CONSTRAINT `talim_ibfk_1` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`);

--
-- Constraints for table `udzur_shalat`
--
ALTER TABLE `udzur_shalat`
  ADD CONSTRAINT `udzur_shalat_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `udzur_shalat_ibfk_2` FOREIGN KEY (`id_pekan`) REFERENCES `pekan` (`id_pekan`);

--
-- Constraints for table `udzur_tahsin`
--
ALTER TABLE `udzur_tahsin`
  ADD CONSTRAINT `udzur_tahsin_ibfk_1` FOREIGN KEY (`id_tahsin`) REFERENCES `tahsin` (`id_tahsin`),
  ADD CONSTRAINT `udzur_tahsin_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `udzur_talim`
--
ALTER TABLE `udzur_talim`
  ADD CONSTRAINT `udzur_talim_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `udzur_talim_ibfk_2` FOREIGN KEY (`id_talim`) REFERENCES `talim` (`id_talim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
