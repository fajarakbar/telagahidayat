-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 10:21 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokoretail`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventori`
--

CREATE TABLE `inventori` (
  `idstokmasuk` varchar(50) NOT NULL,
  `outlet` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargabeliperunit` int(11) NOT NULL,
  `totalhargabeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventori`
--

INSERT INTO `inventori` (`idstokmasuk`, `outlet`, `tanggal`, `namaproduk`, `jumlah`, `hargabeliperunit`, `totalhargabeli`) VALUES
('SM-0000001', 'Telaga', '2020-08-19', 'fa', 2, 2, 2),
('SM-0000001', 'Telaga', '2020-08-19', 'Hot In Cream2', 2, 2, 2),
('SM-0000001', 'Telaga', '2020-08-19', 'ramadhan', 3, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Toko A', '085249660956', 'Kapuas', NULL, '2020-08-20 21:30:47', NULL),
(2, 'Toko B', '085249660955', 'Kalteng', 'Toko Listrik Terbesar', '2020-08-20 21:30:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventori`
--

CREATE TABLE `tb_inventori` (
  `idstokmasuk` varchar(50) NOT NULL,
  `outlet` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargabeliperunit` int(11) NOT NULL,
  `totalhargabeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inventori`
--

INSERT INTO `tb_inventori` (`idstokmasuk`, `outlet`, `tanggal`, `namaproduk`, `jumlah`, `hargabeliperunit`, `totalhargabeli`) VALUES
('SM-0000001', 'Samurai', '2020-08-19', 'Hot In Cream', 3, 1000, 3000),
('SM-0000001', 'Samurai', '2020-08-19', 'Hot In Cream', 3, 1000, 3000),
('SM-0000002', 'Samurai', '2020-08-21', 'fajar', 2, 1000, 2000),
('SM-0000002', 'Samurai', '2020-08-21', 'ramadhan', 5, 5000, 25000),
('SM-0000002', 'Samurai', '2020-08-21', 'akbar', 10, 3000, 30000),
('SM-0000003', 'mata grinda potong besi', '2020-08-21', 'fa', 3, 3, 6),
('SM-0000003', 'mata grinda potong besi', '2020-08-21', 'q', 2, 2, 4),
('SM-0000003', 'mata grinda potong besi', '2020-08-21', 'y', 1, 1, 2),
('SM-0000003', 'mata grinda potong besi', '2020-08-21', 'j', 6, 6, 12),
('SM-0000003', 'mata grinda potong besi', '2020-08-21', 'k', 9, 9, 18),
('SM-0000004', 'Regulator gas', '2020-08-21', 'ramadhan', 3, 3, 15000),
('SM-0000005', 'Lakban hitam nachi', '2020-08-19', 'fa1', 1, 1, 1),
('SM-0000005', 'Lakban hitam nachi', '2020-08-19', 'k', 2, 2, 2),
('SM-0000005', 'Lakban hitam nachi', '2020-08-19', 'l', 9, 9, 9),
('SM-0000005', 'Lakban hitam nachi', '2020-08-19', 'u', 8, 8, 8),
('SM-0000005', 'Lakban hitam nachi', '2020-08-19', 'h', 8, 8, 8),
('SM-0000005', 'Lakban hitam nachi', '2020-08-19', 'i', 7, 7, 7),
('SM-0000005', 'Lakban hitam nachi', '2020-08-19', 'b', 9, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`) VALUES
(1, 'Samurai'),
(3, 'saklar & stop kontak masko'),
(4, 'Regulator gas'),
(5, 'Lakban hitam nachi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `hargajual` int(50) NOT NULL,
  `sku` int(50) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `fotoproduk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `namaproduk`, `kategori`, `hargajual`, `sku`, `barcode`, `fotoproduk`, `jumlah`) VALUES
(1, 'Candy yellow C016* Y016*', 'saklar & stop kontak masko', 50000, 0, '8993176110074', '', 2),
(2, 'Viola v350 terminal mask', 'saklar & stop kontak masko', 19000, 0, '8999999049669', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` text NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Fajar Ramadhan Akbar', 'Kalteng', 1),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Taufik Nur', 'Kalteng', 2),
(3, 'fajar', '1323a6263ede96cf1a7ca60834f80eaa7c1726af', 'Septianor Nugraha', 'Kapuas', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
