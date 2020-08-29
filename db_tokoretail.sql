-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2020 at 10:35 AM
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
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `IdMhsw` int(11) NOT NULL,
  `Nama` varchar(150) DEFAULT NULL,
  `JenisKelamin` varchar(20) DEFAULT NULL,
  `Alamat` text,
  `Agama` varchar(30) DEFAULT NULL,
  `NoHp` varchar(15) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`IdMhsw`, `Nama`, `JenisKelamin`, `Alamat`, `Agama`, `NoHp`, `Email`) VALUES
(3, 'fajarf', 'Laki-laki', 'ff', 'Kristen', '99', 'fjrakbar23@gmail.com');

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
(8, '8999999049669', 'Candy yellow C016* Y016*', 10, 12, 50000, 8, '2020-08-23 22:05:39', NULL),
(9, '8993176110074', 'Viola v350 terminal mask oke', 11, 12, 20000, 1, '2020-08-25 09:26:28', NULL),
(10, '12345', 'abcdeddd', 11, 12, 10000, 9, '2020-08-27 15:32:39', NULL);

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
(10, 'Regulator Gas', '2020-08-23 20:16:05', '2020-08-23 20:16:33'),
(11, 'Saklar & Stop Kontak Masko', '2020-08-23 20:16:13', '2020-08-23 20:16:49'),
(12, 'Mata Grinda Potong Besi', '2020-08-23 20:16:21', '2020-08-23 20:17:05');

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
(11, 'Dus', '2020-08-23 20:17:13', NULL),
(12, 'Pcs', '2020-08-23 20:17:19', '2020-08-23 20:17:58'),
(13, 'Kotak', '2020-08-23 20:17:25', '2020-08-23 20:18:06');

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
(3, 'Toko A', '085249660956', 'Kapuas Kalteng', 'Supplier toko bangunan', '2020-08-23 20:15:25', '2020-08-23 20:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `t_cart`
--

CREATE TABLE `t_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_sale`
--

CREATE TABLE `t_sale` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `user_id`, `created`) VALUES
(1, 'TP2008290001', 0, 50000, 500, 49500, 50000, 500, 'lunas', '2020-08-29', 3, '2020-08-29 10:28:42'),
(2, 'TP2008290002', 0, 80000, 6000, 74000, 700000, 626000, '', '2020-08-29', 3, '2020-08-29 10:29:35'),
(3, 'TP2008290003', 0, 189000, 900, 188100, 200000, 11900, 'ok', '2020-08-29', 3, '2020-08-29 10:30:48'),
(4, 'TP2008290004', 0, 292500, 700, 291800, 600000, 308200, '', '2020-08-29', 1, '2020-08-29 10:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `t_sale_detail`
--

CREATE TABLE `t_sale_detail` (
  `detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sale_detail`
--

INSERT INTO `t_sale_detail` (`detail_id`, `sale_id`, `item_id`, `price`, `qty`, `discount_item`, `total`, `user_id`) VALUES
(1, 1, 8, 50000, 1, 0, 50000, 3),
(2, 2, 10, 10000, 1, 0, 10000, 3),
(3, 2, 9, 20000, 1, 0, 20000, 3),
(4, 2, 8, 50000, 1, 0, 50000, 3),
(5, 3, 9, 20000, 2, 500, 39000, 3),
(6, 3, 8, 50000, 3, 0, 150000, 3),
(7, 4, 9, 20000, 15, 500, 292500, 1);

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
(2, 8, 'in', 'dari gudang', 3, 8, '2020-08-25', '2020-08-25 07:46:06', 1),
(3, 10, 'in', 'dari gudang', 3, 9, '2020-08-27', '2020-08-27 15:33:08', 1);

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
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`IdMhsw`);

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
-- Indexes for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `IdMhsw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `p_kategori`
--
ALTER TABLE `p_kategori`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `p_satuanbarang`
--
ALTER TABLE `p_satuanbarang`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD CONSTRAINT `t_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD CONSTRAINT `t_sale_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`),
  ADD CONSTRAINT `t_sale_detail_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

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
