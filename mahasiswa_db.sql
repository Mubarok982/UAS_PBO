-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2025 at 04:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'Rizqy', 'Mubarok123');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `jenis_mahasiswa` enum('S1','S2') NOT NULL,
  `program_studi` varchar(100) DEFAULT NULL,
  `jumlah_sks` int(11) DEFAULT NULL,
  `topik_tesis` varchar(255) DEFAULT NULL,
  `nama_pembimbing` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `jurusan`, `angkatan`, `jenis_mahasiswa`, `program_studi`, `jumlah_sks`, `topik_tesis`, `nama_pembimbing`) VALUES
(5, 'Dani', 'ipa', '2023', 'S1', 'ipa', 144, NULL, NULL),
(6, 'Rani', 'TI', '2020', 'S2', 'Teknik Industri', 144, 'IOT', 'Prof.Budi'),
(7, 'Fira', 'TI', '2020', 'S2', 'Teknik sipil', 144, NULL, NULL),
(8, 'Mubarok', 'Teknik Sipil', '2016', 'S2', NULL, 12, 'Perencanaan kota', 'Dr.Sasongko'),
(9, 'Martha', 'Teknik Sipil', '2016', 'S2', '', 12, 'Rancang Bangunan', 'Prof.Ella'),
(10, 'Fajri', 'TI', '2020', 'S1', 'TI', 144, '', ''),
(11, 'Farah', 'Teknik Industri', '2020', 'S2', 'TI', 144, 'Mesin Industri', 'Dr.Bambang'),
(12, 'Arjuna', 'Ekonomi', '2023', 'S2', NULL, 12, 'Ekonomi Pembangunan', 'Dr.Erlangga'),
(13, 'Ardi', 'TI', '2020', 'S1', 'Teknik Informatika', 144, NULL, NULL),
(14, 'Ali', 'TI', '2020', 'S2', 'Teknik Informatika', 0, 'IOT', 'Prof.Arjuna'),
(93, 'Rahma', 'TI', '2020', 'S2', 'Teknik Informatika', 0, 'IOT', 'Prof.Arjuna'),
(94, 'Farli', 'Teknik Industri', '2020', 'S2', 'TI', 144, 'Mesin Industri', 'Dr.Bambang'),
(95, 'Fahroni', 'Teknik Industri', '2020', 'S1', 'TI', 144, '', ''),
(96, 'Aldi', 'Teknik Iinformatika', '2020', 'S2', NULL, 0, 'IOT', 'Dr.Bambang'),
(97, 'rani', 'Teknik Informatika', '2020', 'S2', '', 0, 'Web Developer', 'Dr.Puji'),
(98, 'rani', 'Teknik Informatika', '2020', 'S2', '', 0, 'Web Developer', 'Dr.Puji'),
(123, 'Rizqy', 'Teknik Informatika', '2022', 'S1', 'Ilmu Komputer', 144, NULL, NULL),
(124, 'Ahmad', 'Teknik Informatika', '2021', 'S2', NULL, NULL, 'Kecerdasan Buatan', 'Dr. Budi'),
(132, 'ee', 'ee', '2020', 'S1', 'eee', 222, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `jenis_mahasiswa` enum('S1','S2') NOT NULL,
  `program_studi` varchar(100) DEFAULT NULL,
  `jumlah_sks` int(11) DEFAULT NULL,
  `topik_tesis` varchar(255) DEFAULT NULL,
  `nama_pembimbing` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nama`, `jurusan`, `angkatan`, `jenis_mahasiswa`, `program_studi`, `jumlah_sks`, `topik_tesis`, `nama_pembimbing`) VALUES
(1, 'Rizqy', 'Teknik Informatika', '2022', 'S1', 'Ilmu Komputer', 144, NULL, NULL),
(2, 'Ahmad', 'Teknik Informatika', '2021', 'S2', NULL, NULL, 'Kecerdasan Buatan', 'Dr. Budi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
