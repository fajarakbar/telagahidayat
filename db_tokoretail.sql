-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 04:54 PM
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
-- Table structure for table `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `created`, `updated`) VALUES
(5, '8993176110074', 'Candy yellow C016* Y016*', 9, 10, 80000, 10, '2020-08-22 17:06:28', NULL),
(6, '8999999049669', 'Viola v350 terminal mask oke', 9, 10, 50000, 12, '2020-08-22 17:07:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_kategori`
--

CREATE TABLE `p_kategori` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_kategori`
--

INSERT INTO `p_kategori` (`category_id`, `name`, `created`, `updated`) VALUES
(9, 'Regulator gas', '2020-08-22 17:05:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_satuanbarang`
--

CREATE TABLE `p_satuanbarang` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_satuanbarang`
--

INSERT INTO `p_satuanbarang` (`unit_id`, `name`, `created`, `updated`) VALUES
(10, 'Pcs', '2020-08-22 17:05:59', NULL);

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
(1, 'Toko A', '085249660956', 'Kapuas', 'uluh itah', '2020-08-20 21:30:47', '2020-08-21 12:40:28'),
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
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(1, 6, 'in', 'dari gudang', 2, 3, '2020-08-23', '2020-08-23 10:57:32', 1),
(2, 5, 'in', 'dari gudang', 2, 5, '2020-08-23', '2020-08-23 11:04:05', 1),
(8, 5, 'in', 'dari gudang', 1, 4, '2020-08-23', '2020-08-23 11:08:30', 1),
(15, 6, 'in', 'dari gudang', 1, 8, '2020-08-23', '2020-08-23 11:37:39', 1),
(19, 6, 'in', 'dari gudang', NULL, 2, '2020-08-23', '2020-08-23 12:10:58', 1),
(22, 6, 'in', 'Dari gudang', NULL, 3, '2020-08-23', '2020-08-23 12:22:05', 1),
(23, 6, 'in', 'Dari gudang', NULL, 3, '2020-08-23', '2020-08-23 12:22:52', 1),
(26, 6, 'in', 'dari gudang', 1, 4, '2020-08-23', '2020-08-23 16:05:13', 1),
(27, 6, 'in', 'dari orang', 2, 4, '2020-08-24', '2020-08-23 16:49:49', 1),
(28, 5, 'in', 'dari gudang', 2, 1, '2020-08-25', '2020-08-23 16:51:26', 1);

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
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `p_kategori`
--
ALTER TABLE `p_kategori`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `p_satuanbarang`
--
ALTER TABLE `p_satuanbarang`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p_kategori`
--
ALTER TABLE `p_kategori`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `p_satuanbarang`
--
ALTER TABLE `p_satuanbarang`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_kategori` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_satuanbarang` (`unit_id`);

--
-- Constraints for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
