-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 06:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forecasting-kelompok6-des`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `kunjungan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `bulan`, `kunjungan`) VALUES
(201, 'Jan 2020', 104.16),
(202, 'Feb 2020', 103.35),
(203, 'Mar 2020', 102.09),
(204, 'Apr 2020', 100.32),
(205, 'Mei 2020', 99.47),
(206, 'Jun 2020', 99.6),
(207, 'Jul 2020', 100.09),
(208, 'Agu 2020', 100.65),
(209, 'Sep 2020', 101.66),
(210, 'Okt 2020', 102.25),
(211, 'Nov 2020', 102.86),
(212, 'Des 2020', 103.25),
(213, 'Jan 2021', 103.26),
(214, 'Feb 2021', 103.1),
(215, 'Mar 2021', 103.29),
(216, 'Apr 2021', 102.93),
(217, 'Mei 2021', 103.39),
(218, 'Jun 2021', 103.59),
(219, 'Jul 2021', 103.48),
(220, 'Agu 2021', 104.68),
(221, 'Sep 2021', 105.68),
(222, 'Okt 2021', 106.67),
(223, 'Nov 2021', 107.18),
(224, 'Des 2021', 108.34),
(225, 'Jan 2022', 108.67),
(226, 'Feb 2022', 108.83),
(227, 'Mar 2022', 109.29),
(228, 'Apr 2022', 108.46),
(229, 'Mei 2022', 105.41),
(230, 'Jun 2022', 105.96),
(231, 'Jul 2022', 104.25),
(232, 'Agu 2022', 106.31),
(233, 'Sep 2022', 106.82),
(234, 'Okt 2022', 107.27),
(235, 'Nov 2022', 107.81),
(236, 'Des 2022', 109),
(237, 'Jan 2023', 109.84),
(238, 'Feb 2023', 110.53),
(239, 'Mar 2023', 110.85),
(240, 'Apr 2023', 110.58),
(241, 'Mei 2023', 110.2),
(242, 'Jun 2023', 110.41),
(243, 'Jul 2023', 110.64),
(244, 'Agu 2023', 111.85),
(245, 'Sep 2023', 114.14),
(246, 'Okt 2023', 115.78);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `alamat`, `notelp`) VALUES
('admin', 'nurimanis123', 'Nuri Hidayatuloh', 'Ponorogo', '089510212115'),
('mufida', 'mufidamanis123', 'Hikmah Mufida MS', 'Bangkalan', '083125119096');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
