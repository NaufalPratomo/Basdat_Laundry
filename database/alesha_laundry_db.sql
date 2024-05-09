-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 06:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alesha_laundry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_express`
--

CREATE TABLE `customer_express` (
  `id_cus` int(11) NOT NULL,
  `nama_cus` varchar(50) NOT NULL,
  `noTelp_cus` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL DEFAULT current_timestamp(),
  `tgl_keluar` date NOT NULL,
  `harga` varchar(15) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_express`
--

INSERT INTO `customer_express` (`id_cus`, `nama_cus`, `noTelp_cus`, `tgl_masuk`, `tgl_keluar`, `harga`, `berat`, `keterangan`) VALUES
(11, 'bambang yudoyono', '001929', '2024-05-09', '2024-05-14', '2990000', 299, 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reg`
--

CREATE TABLE `customer_reg` (
  `id_cus` int(11) NOT NULL,
  `nama_cus` varchar(50) NOT NULL,
  `noTelp_cus` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL DEFAULT current_timestamp(),
  `tgl_keluar` date NOT NULL,
  `harga` varchar(15) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_reg`
--

INSERT INTO `customer_reg` (`id_cus`, `nama_cus`, `noTelp_cus`, `tgl_masuk`, `tgl_keluar`, `harga`, `berat`, `keterangan`) VALUES
(30, 'sdjd', '31313', '2024-05-09', '2024-05-11', '60000', 12, 'ufjf'),
(31, 'bambang', '081252288955', '2024-05-09', '2024-05-16', '105000', 21, 'adsa');

-- --------------------------------------------------------

--
-- Table structure for table `customer_satuan`
--

CREATE TABLE `customer_satuan` (
  `id_cus` int(11) NOT NULL,
  `id_item` int(11) DEFAULT NULL,
  `nama_cus` varchar(50) NOT NULL,
  `noTelp_cus` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL DEFAULT current_timestamp(),
  `tgl_keluar` date NOT NULL,
  `harga` varchar(15) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_satuan`
--

INSERT INTO `customer_satuan` (`id_cus`, `id_item`, `nama_cus`, `noTelp_cus`, `tgl_masuk`, `tgl_keluar`, `harga`, `keterangan`) VALUES
(50, NULL, 'BAMBANG', '8888', '2024-05-09', '2024-05-10', '24441', 'udd');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `id_cus` int(11) DEFAULT NULL,
  `nama_item` varchar(50) NOT NULL,
  `harga` int(15) NOT NULL,
  `satuan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `id_cus`, `nama_item`, `harga`, `satuan`) VALUES
(204, 50, 'celanaaa', 8888, 2),
(205, 50, 'conggg', 1333, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_express`
--
ALTER TABLE `customer_express`
  ADD PRIMARY KEY (`id_cus`),
  ADD UNIQUE KEY `nama_cus` (`nama_cus`);

--
-- Indexes for table `customer_reg`
--
ALTER TABLE `customer_reg`
  ADD PRIMARY KEY (`id_cus`),
  ADD UNIQUE KEY `nama_cus` (`nama_cus`);

--
-- Indexes for table `customer_satuan`
--
ALTER TABLE `customer_satuan`
  ADD PRIMARY KEY (`id_cus`),
  ADD UNIQUE KEY `nama_cus` (`nama_cus`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_cus` (`id_cus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_express`
--
ALTER TABLE `customer_express`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_reg`
--
ALTER TABLE `customer_reg`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customer_satuan`
--
ALTER TABLE `customer_satuan`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_satuan`
--
ALTER TABLE `customer_satuan`
  ADD CONSTRAINT `customer_satuan_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `customer_satuan_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id_cus`) REFERENCES `customer_satuan` (`id_cus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
