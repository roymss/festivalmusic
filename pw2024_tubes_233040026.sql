-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2024 at 09:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040026`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `gambar_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `gambar_admin`, `username`, `nama_lengkap`, `email`, `alamat`, `no_telpon`) VALUES
(1, 'Fabioasher.jpg', 'alya123', 'Alya Khairani', 'alya@gmail.com', 'asdalksdjalskjdlaksjdlkajsdlksaj', '08254855534');

-- --------------------------------------------------------

--
-- Table structure for table `performers`
--

CREATE TABLE `performers` (
  `id` int NOT NULL,
  `gambar_performers` varchar(255) NOT NULL,
  `nama_performers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `performers`
--

INSERT INTO `performers` (`id`, `gambar_performers`, `nama_performers`) VALUES
(7, '66660eb0a7808.jpg', 'Fabio Meser'),
(8, 'Fabioasher.jpg', 'asdasdasd'),
(9, 'Fabioasher.jpg', 'xxxxxx'),
(10, 'Fabioasher.jpg', 'afafagagf'),
(11, 'Fabioasher.jpg', 'adadadad'),
(12, 'Fabioasher.jpg', 'asdaqwe');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int NOT NULL,
  `gambar_jadwal` varchar(255) NOT NULL,
  `jam_jadwal` varchar(15) NOT NULL,
  `nama_jadwal` varchar(255) NOT NULL,
  `karir` varchar(50) NOT NULL,
  `tipe_musik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `gambar_jadwal`, `jam_jadwal`, `nama_jadwal`, `karir`, `tipe_musik`) VALUES
(1, 'Fabioasher.jpg', '9.00 PM', 'Fabio Asher', 'Solo', 'Mellow');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int NOT NULL,
  `nama_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `desk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga_produk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gambar_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `nama_produk`, `desk`, `harga_produk`, `gambar_produk`) VALUES
(1, 'Asher Clothes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis vitae quis voluptas vel odio voluptate minus! Fuga perspiciatis excepturi error dolorem nostrum, officiis, eius repellat id autem sapiente ad sint odio iste. Sequi delectus quam excepturi illo similique eum fugit neque ratione animi? Laborum eius, suscipit officiis blanditiis provident dicta.', '250.001', 'Fabioasher.jpg'),
(5, 'asdasd', 'Some quick example text to build on the card title and make up the bulk of the card&#039;s content.', '29.000.000', '666615a25534c.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `performers`
--
ALTER TABLE `performers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `performers`
--
ALTER TABLE `performers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
