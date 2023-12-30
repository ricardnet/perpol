-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 01:47 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_katalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `buku_kode` varchar(50) NOT NULL,
  `buku_judul` varchar(50) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `buku_pengarang` varchar(50) NOT NULL,
  `buku_penerbit` varchar(50) NOT NULL,
  `buku_tahun` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `buku_kode`, `buku_judul`, `kategori_id`, `buku_pengarang`, `buku_penerbit`, `buku_tahun`, `jumlah`) VALUES
(9, 'K0001', 'Mudah Menguasai Framework Laravel', 34, 'Yudho Yudhanto ', 'Elex Media Komputindo', '2019', 11),
(10, 'K0002', 'Scary Lessons - Reincarnation', 38, 'Emi Ishikawa', 'Elex Media Komputindo', '2019', 7),
(11, 'K0003', 'Mahir Bahasa Pemrograman PHP', 34, 'Miftahul Jannah, Sarwandi, Cyber Creative ', 'Elex Media Komputindo', '2019', 6),
(12, 'K0004', 'Di Penghujung Pelukan', 37, 'Iit Sibarani & Momo DM', 'TransMedia Pustaka ', '2017', 3),
(13, 'K0005', 'Kekasih Impian', 36, 'Wardah Maulina', 'Falcon Publishing ', '2019', 11),
(15, 'K0007', 'Zeros Familiar', 38, 'Yamaguchi Noboru', 'Shining Rose Media ', '2016', 14),
(16, 'K0008', 'Jika Hujan Pernah Bertanya', 36, 'Robin Wijaya', 'Matahari ', '2014', 2),
(17, 'K0006', 'Surat Terakhir dari Kekasih ', 37, 'Jojo Moyes', '  Gramedia Pustaka Utama', '2019', 5),
(18, 'K0009', 'Allah, Izinkan Kami Ke Surga-Mu', 39, 'Rudianto', 'Elex Media Komputindo', '2019', 7),
(19, 'K0010', 'Remember Me & I Will Remember You', 39, 'Wirda Mansur', 'Penerbit Katadepan', '2019', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(34, 'Pendidikan'),
(36, 'Novel'),
(37, 'Romance'),
(38, 'Komik'),
(39, 'Agama');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `pinjam_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `pinjam_nama` varchar(100) NOT NULL,
  `pinjam_nim` varchar(9) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`pinjam_id`, `buku_id`, `pinjam_nama`, `pinjam_nim`, `tgl_pinjam`, `tgl_jatuh_tempo`) VALUES
(29, 19, 'Rifqi Dwiyana Firmandito', '201851140', '2019-05-21', '2019-05-25'),
(31, 10, 'Rendy Octaviano Valentino Kiky', '201851142', '2019-05-21', '2019-05-28'),
(33, 12, 'Muhammad Rifqi Mubarok', '201851137', '2019-05-21', '2019-05-29'),
(36, 16, 'Nurul Mustofa', '201851143', '2019-05-21', '2019-05-27'),
(39, 13, 'Andrian Rizka Ramadhan', '201851114', '2019-05-21', '2019-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`pinjam_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `pinjam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
