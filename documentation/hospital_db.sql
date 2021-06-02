-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2021 at 11:03 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_db`
--
CREATE DATABASE IF NOT EXISTS `hospital_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hospital_db`;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int NOT NULL COMMENT 'ID Increment as identity of data',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'The name of patient',
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'The sex of patient',
  `religion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'The religion of patient',
  `phone` bigint NOT NULL COMMENT 'The phone number of patient',
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'The address of patient',
  `nik` bigint NOT NULL COMMENT 'The Nomer Induk Kependudukan of patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `name`, `sex`, `religion`, `phone`, `address`, `nik`) VALUES
(1, 'Lorem', 'Laki-laki', 'Islam', 628872600620, 'Jakarta', 3326160704390001),
(2, 'Ipsum', 'Perempuan', 'Islam', 62854692110908, 'Jakarta', 3326165206760002),
(3, 'Dolor', 'Laki-laki', 'Katholik', 62873136750, 'Bogor', 3326160710640041),
(4, 'Sit', 'Laki-laki', 'Katholik', 6283763464199, 'Bogor', 3326162905850001),
(5, 'Amet', 'Perempuan', 'Protestan', 62897020340, 'Bekasi', 3326160806850002),
(6, 'Consectetur', 'Laki-laki', 'Protestan', 62823677872, 'Bekasi', 3326160704390002),
(7, 'Adipiscing', 'Perempuan', 'Hindu', 628180949950, 'Bali', 3326165206760003),
(8, 'Elit', 'Laki-laki', 'Hindu', 628546587832, 'Bali', 3326160710640042),
(9, 'Sed', 'Laki-laki', 'Buddha', 628704831789, 'Tangerang', 3326162905850002),
(10, 'Do', 'Perempuan', 'Buddha', 6287064553478, 'Tangerang', 3326160704390003),
(11, 'Eiusmod', 'Laki-laki', 'Islam', 6285846749848, 'Depok', 3326165206760004),
(12, 'Tempor', 'Perempuan', 'Islam', 628945816800, 'Depok', 3326160710640043);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID Increment as identity of data', AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
