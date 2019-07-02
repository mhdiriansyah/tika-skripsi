-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2019 at 05:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informatika`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategorisurat`
--

CREATE TABLE `tbl_kategorisurat` (
  `id_kategori` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `file` text,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategorisurat`
--

INSERT INTO `tbl_kategorisurat` (`id_kategori`, `nama`, `kode`, `file`, `ket`) VALUES
('KSURAT001', 'Surat Keterangan Kuliah', 'SKK', 'KSURAT001.pdf', 'Surat Keterangan Kuliah merupakan surat yang mendeskripsikan mahasiswa tersebut adalah Mahasiswa yang sedang berkuliah di STT PLN Jakarta'),
('KSURAT002', 'Surat Magang', 'SM', 'KSURAT002.pdf', 'Surat Keterangan Magang merupakan surat yang dibuat untuk pengantar kepada perusahaan terkait tempat mahasiswa tersebut magang.'),
('KSURAT003', 'Surat Riset', 'SR', 'KSURAT003.pdf', 'Surat Riset merupakan surat yang dibuat untuk permohonan melakukan Riset/Penelitian terhadap perusahaan ataupun internal kampus.'),
('KSURAT004', 'Surat Rekomendasi', 'SRK', 'KSURAT004.pdf', 'Surat Rekomendasi merupakan surat yang digunakan untuk memberikan pengakuan rekomendasi dari Kampus dalam membantu mahasiswa terkait mengurus sesuatu kebutuhan yang terkait.'),
('KSURAT005', 'Surat Keterangan Lulus', 'SKL', 'KSURAT005.pdf', 'Surat Keterangan Lulus merupakan surat untuk mendeskripsikan bahwa mahasiswa terkait telat lulus pada prodi dan dibuktikan dengan data tugas akhir yang telah dikerjakan dan diselesaikan.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ipk` decimal(3,2) NOT NULL,
  `semester` int(1) NOT NULL,
  `password` varchar(10) NOT NULL,
  `terakhir_login` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama_lengkap`, `email`, `ipk`, `semester`, `password`, `terakhir_login`) VALUES
('201431290', 'Muhammad Umar Ramadhana', 'umar@gmail.com', '3.80', 8, 'umar11', NULL),
('201431291', 'Firman Giri Febriyanto', 'firman@gmail.com', '3.85', 8, 'firman11', NULL),
('201431299', 'Muhammad Iriansyah Putra Pratama', 'ryanjoker87@gmail.com', '3.63', 8, 'pace11', '2019-07-02 02:50:29'),
('201431300', 'Thufail Erlangga', 'erlangga@gmail.com', '3.55', 8, 'angga11', NULL),
('201531029', 'Sri Fajar Riantri Alvani', 'riantri271@gmail.com', '3.89', 8, 'Rian3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suratkonfirmasi`
--

CREATE TABLE `tbl_suratkonfirmasi` (
  `id_suratkonfirmasi` int(5) NOT NULL,
  `id_kategori` varchar(15) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `status_surat` int(1) NOT NULL,
  `file` text NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` int(2) NOT NULL,
  `terakhir_login` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`, `terakhir_login`) VALUES
(1, 'admin', 'admin11', 0, '2019-07-02 02:43:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kategorisurat`
--
ALTER TABLE `tbl_kategorisurat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_suratkonfirmasi`
--
ALTER TABLE `tbl_suratkonfirmasi`
  ADD PRIMARY KEY (`id_suratkonfirmasi`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_suratkonfirmasi`
--
ALTER TABLE `tbl_suratkonfirmasi`
  MODIFY `id_suratkonfirmasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_suratkonfirmasi`
--
ALTER TABLE `tbl_suratkonfirmasi`
  ADD CONSTRAINT `tbl_suratkonfirmasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategorisurat` (`id_kategori`),
  ADD CONSTRAINT `tbl_suratkonfirmasi_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tbl_mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
