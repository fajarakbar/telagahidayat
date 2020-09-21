-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 04:10 PM
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
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `outlet_id` int(11) NOT NULL,
  `kasir_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`outlet_id`, `kasir_id`, `name`, `address`, `phone`, `created`, `updated`) VALUES
(1, 1, 'Telaga', 'Kabupaten Kutai Timur', '0852', '2020-09-05 12:22:13', NULL),
(2, 1, 'Hidayat', 'Kapuas', '', '2020-09-17 16:48:26', NULL);

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
  `varian` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `varian`, `created`, `updated`, `user_id`, `outlet_id`) VALUES
(1, '', 'Lem Tikus', 1, 1, 18000, 0, NULL, '2020-09-03 09:40:46', NULL, 1, 1),
(2, '', 'Timah solder cap pancing bsr', 2, 1, 95000, 0, NULL, '2020-09-03 09:42:02', NULL, 1, 1),
(3, '8718699658106', 'Philips led buld 3w kecil', 3, 1, 20000, 10, NULL, '2020-09-03 11:23:18', NULL, 1, 2),
(4, '12345', 'taffware', 4, 1, 50000, 0, NULL, '2020-09-17 16:31:45', NULL, 1, 1),
(5, '1234512', 'das', 1, 1, 15000, 2, NULL, '2020-09-17 17:10:25', '2020-09-21 13:23:51', 1, 2),
(6, '8992222050258', 'Gatsby telaga', 4, 1, 15000, 42, NULL, '2020-09-18 08:57:58', NULL, 1, 1),
(7, '8992222050258', 'Gatsby hidayat', 4, 1, 15000, 24, NULL, '2020-09-18 09:00:22', NULL, 1, 2);

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
(1, 'Lem Tikus', '2020-09-03 09:40:37', NULL),
(2, 'Timah Solder', '2020-09-03 09:41:46', NULL),
(3, 'Philips led buld', '2020-09-03 11:23:08', NULL),
(4, 'Regulator gas', '2020-09-03 14:16:28', NULL),
(10, 'saklar & stop kontak masko', '2020-09-03 14:17:46', NULL);

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
(1, 'Pcs', '2020-09-03 09:36:41', NULL),
(2, 'Gram', '2020-09-03 09:36:51', NULL),
(3, 'Kilogram', '2020-09-03 09:37:12', NULL),
(4, 'Kotak', '2020-09-03 09:37:26', NULL);

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

--
-- Dumping data for table `t_cart`
--

INSERT INTO `t_cart` (`cart_id`, `item_id`, `price`, `qty`, `discount_item`, `total`, `user_id`) VALUES
(3, 7, 15000, 3, 1000, 45000, 1),
(4, 6, 15000, 4, 0, 60000, 1);

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
  `outlet_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `user_id`, `outlet_id`, `created`) VALUES
(1, 'TP2009030001', 0, 36000, 500, 35500, 36000, 500, '', '2020-09-03', 1, 0, '2020-09-03 13:14:10'),
(2, 'TP2009110001', 0, 113000, 0, 113000, 115000, 2000, '', '2020-09-11', 1, 0, '2020-09-11 19:34:28'),
(3, 'TP2009120001', 0, 131000, 0, 131000, 1200000, 1069000, '', '2020-09-12', 4, 0, '2020-09-12 05:53:22'),
(4, 'TP2009120002', 0, 95000, 0, 95000, 121212, 26212, '', '2020-09-12', 4, 0, '2020-09-12 05:58:43'),
(5, 'TP2009200001', 0, 95000, 0, 95000, 500000, 405000, '', '2020-09-20', 4, 0, '2020-09-20 12:38:52'),
(6, 'TP2009200002', 0, 95000, 0, 95000, 99990, 4990, '', '2020-09-20', 1, 0, '2020-09-20 12:39:28'),
(7, 'TP2009200003', 0, 95000, 0, 95000, 888888, 793888, '', '2020-09-20', 1, 0, '2020-09-20 12:39:48'),
(8, 'T12009200001', 0, 190000, 0, 190000, 200000, 10000, '', '2020-09-20', 4, 0, '2020-09-20 18:40:37'),
(9, 'T12009200001', 0, 15000, 0, 15000, 1222200, 1207200, '', '2020-09-20', 4, 1, '2020-09-20 18:42:43'),
(10, 'T22009200001', 0, 15000, 0, 15000, 20000, 5000, '', '2020-09-20', 5, 2, '2020-09-20 18:43:29'),
(11, 'T22009200002', 0, 25000, 0, 25000, 40000, 15000, '', '2020-09-20', 5, 2, '2020-09-20 20:00:42'),
(12, 'T22009200003', 0, 28000, 0, 28000, 28000, 0, '', '2020-09-20', 5, 2, '2020-09-20 20:07:00'),
(13, 'T12009200002', 0, 180000, 0, 180000, 200000, 20000, '', '2020-09-20', 4, 1, '2020-09-20 20:15:16'),
(14, 'T22009200004', 0, 15000, 1000, 14000, 50000, 36000, '', '2020-09-20', 6, 2, '2020-09-20 20:17:14'),
(15, 'TP2009210001', 0, 19000, 0, 19000, 20000, 1000, '', '2020-09-21', 1, 0, '2020-09-21 10:58:23'),
(16, 'TP2009210002', 0, 18000, 0, 18000, 20000, 2000, '', '2020-09-21', 1, 0, '2020-09-21 10:59:29'),
(17, 'TP2009210003', 0, 15000, 0, 15000, 20000, 5000, '', '2020-09-21', 1, 0, '2020-09-21 11:02:16'),
(18, 'TP2009210004', 0, 40000, 1000, 39000, 40000, 1000, '', '2020-09-21', 1, 0, '2020-09-21 11:07:39'),
(19, 'TP2009210005', 0, 38000, 0, 38000, 40000, 2000, '', '2020-09-21', 1, 0, '2020-09-21 11:09:14'),
(20, 'TP2009210006', 0, 56000, 0, 56000, 60000, 4000, '', '2020-09-21', 1, 0, '2020-09-21 11:26:26'),
(21, 'TP2009210007', 0, 28000, 0, 28000, 30000, 2000, '', '2020-09-21', 1, 0, '2020-09-21 11:34:08'),
(22, 'T22009210001', 0, 27000, 0, 27000, 30000, 3000, '', '2020-09-21', 5, 2, '2020-09-21 13:20:25'),
(23, 'T22009210002', 0, 16000, 0, 16000, 20000, 4000, '', '2020-09-21', 5, 2, '2020-09-21 13:21:33'),
(24, 'T22009210003', 0, 30000, 0, 30000, 30000, 0, '', '2020-09-21', 5, 2, '2020-09-21 13:24:20'),
(25, 'T22009210004', 0, 30000, 0, 30000, 30000, 0, '', '2020-09-21', 5, 2, '2020-09-21 13:25:22'),
(26, 'T22009210005', 0, 36000, 0, 36000, 36000, 0, '', '2020-09-21', 5, 2, '2020-09-21 15:10:06');

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
(1, 1, 1, 18000, 2, 0, 36000, 1),
(2, 2, 1, 18000, 1, 0, 18000, 1),
(3, 2, 2, 95000, 1, 0, 95000, 1),
(4, 3, 2, 95000, 1, 0, 95000, 4),
(5, 3, 1, 18000, 2, 0, 36000, 4),
(6, 4, 2, 95000, 1, 0, 95000, 4),
(7, 5, 2, 95000, 1, 0, 95000, 4),
(8, 6, 2, 95000, 1, 0, 95000, 1),
(9, 7, 2, 95000, 1, 0, 95000, 1),
(10, 8, 2, 95000, 2, 0, 190000, 4),
(11, 9, 6, 15000, 1, 0, 15000, 4),
(12, 10, 7, 15000, 1, 0, 15000, 5),
(13, 11, 7, 15000, 5, 10000, 25000, 5),
(14, 12, 7, 15000, 2, 1000, 28000, 5),
(15, 13, 2, 95000, 2, 5000, 180000, 4),
(16, 14, 7, 15000, 1, 0, 15000, 6),
(17, 15, 3, 20000, 1, 1000, 19000, 1),
(18, 16, 3, 20000, 1, 2000, 18000, 1),
(19, 17, 3, 15000, 1, 0, 15000, 1),
(20, 18, 3, 20000, 2, 0, 40000, 1),
(21, 19, 3, 20000, 2, 1000, 38000, 1),
(22, 20, 6, 15000, 4, 1000, 56000, 1),
(23, 21, 6, 15000, 2, 2000, 28000, 1),
(24, 22, 5, 10000, 3, 1000, 27000, 5),
(25, 23, 5, 10000, 2, 2000, 16000, 5),
(26, 24, 7, 15000, 2, 0, 30000, 5),
(27, 25, 5, 15000, 2, 0, 30000, 5),
(28, 26, 5, 15000, 1, 5000, 10000, 5),
(29, 26, 7, 15000, 2, 2000, 26000, 5);

--
-- Triggers `t_sale_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_min` AFTER INSERT ON `t_sale_detail` FOR EACH ROW BEGIN
	UPDATE p_item SET stock = stock - NEW.qty
    WHERE item_id = NEW.item_id;
END
$$
DELIMITER ;

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
  `harga` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `outlet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `harga`, `date`, `created`, `user_id`, `outlet_id`) VALUES
(1, 1, 'in', 'Barang awal', NULL, 5, 100000, '2020-09-03', '2020-09-03 13:13:44', 1, 1),
(2, 2, 'in', 'Barang awal', NULL, 10, 100000, '2020-09-03', '2020-09-03 21:20:27', 1, 1),
(3, 7, 'in', 'Barang awal', NULL, 37, 555000, '2020-09-20', '2020-09-20 11:34:04', 1, NULL),
(4, 6, 'in', 'Barang awal', NULL, 49, 735000, '2020-09-20', '2020-09-20 11:34:39', 1, NULL),
(5, 3, 'in', 'Barang awal', NULL, 5, 5000, '2020-09-21', '2020-09-21 10:57:10', 1, NULL),
(6, 3, 'in', 'dari gudang', NULL, 2, 20000, '2020-09-21', '2020-09-21 11:08:48', 1, NULL),
(7, 5, 'in', 'Barang awal', NULL, 10, 50000, '2020-09-21', '2020-09-21 13:13:01', 1, NULL),
(8, 3, 'in', 'tambahan', NULL, 10, 10000, '2020-09-21', '2020-09-21 15:41:14', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  `outlet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `telp`, `address`, `username`, `password`, `level`, `created`, `updated`, `outlet_id`) VALUES
(1, 'Fajar Ramadhan Akbar', '085249660956', 'kapuas', 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 1, '2020-09-05 09:15:44', '2020-09-12 08:25:58', 0),
(4, 'Nurhidayat', '0872', 'Kaltim', 'dayat', '356a192b7913b04c54574d18c28d46e6395428ab', 2, '2020-09-05 09:21:04', '2020-09-20 12:37:10', 1),
(5, 'cecep', '08', 'kapuas', 'cecep', '356a192b7913b04c54574d18c28d46e6395428ab', 2, '2020-09-20 17:19:03', NULL, 2),
(6, 'ali', '09', 'ka', 'ali', '356a192b7913b04c54574d18c28d46e6395428ab', 2, '2020-09-20 20:16:41', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`outlet_id`);

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
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `outlet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `p_kategori`
--
ALTER TABLE `p_kategori`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `p_satuanbarang`
--
ALTER TABLE `p_satuanbarang`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_satuanbarang` (`unit_id`),
  ADD CONSTRAINT `p_item_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `p_kategori` (`category_id`);

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
