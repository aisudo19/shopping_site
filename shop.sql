-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2019 at 01:11 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `dat_member`
--

CREATE TABLE `dat_member` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postal1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `postal2` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `danjo` int(11) NOT NULL,
  `born` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dat_member`
--

INSERT INTO `dat_member` (`code`, `date`, `password`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`, `danjo`, `born`) VALUES
(3, '2019-10-28 09:18:07', 'pass', '山田花子', 'root', '000', '0000', '住所', '00000000000', 2, 1980),
(4, '2019-10-28 09:19:16', 'pass', '山田花子', 'root', '000', '0000', '住所', '00000000000', 2, 1980),
(5, '2019-10-28 09:19:46', 'pass', '山田花子', 'root', '000', '0000', '住所', '00000000000', 2, 1980),
(6, '2019-10-28 09:20:57', 'pass', '山田花子', 'root', '000', '0000', '住所', '00000000000', 2, 1980),
(7, '2019-10-28 15:28:49', '1a1dc91c907325c69271ddf0c944bc72', 'たろう', 'test@hotmail.com', '111', '0000', 'テスト山', '00000000000', 2, 1980);

-- --------------------------------------------------------

--
-- Table structure for table `dat_sales`
--

CREATE TABLE `dat_sales` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `code_member` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postal1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `postal2` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dat_sales`
--

INSERT INTO `dat_sales` (`code`, `date`, `code_member`, `name`, `email`, `postal1`, `postal2`, `address`, `tel`) VALUES
(30, '2019-10-26 04:16:15', 0, 'トマト', 'nanashi@gmail.com', '000', '0000', '住所', '00000000000'),
(31, '2019-10-26 04:18:07', 0, '山田花子', 'nanashi@gmail.com', '000', '0000', '住所', '00000000000'),
(32, '2019-10-26 04:33:14', 0, '山田花子', 'nanashi@gmail.com', '000', '0000', '住所', '00000000000'),
(33, '2019-10-26 04:34:09', 0, '山田花子', 'nanashi@gmail.com', '000', '0000', '住所', '00000000000'),
(34, '2019-10-26 04:35:59', 0, '山田花子', 'nanashi@gmail.com', '000', '0000', '住所', '00000000000'),
(35, '2019-10-26 04:39:17', 0, '山田花子', 'nanashi@gmail.com', '000', '0000', '住所', '00000000000'),
(36, '2019-10-28 09:19:46', 5, '山田花子', 'root', '000', '0000', '住所', '00000000000'),
(37, '2019-10-28 09:20:57', 6, '山田花子', 'root', '000', '0000', '住所', '00000000000'),
(38, '2019-10-28 15:28:49', 7, 'たろう', 'test@hotmail.com', '111', '0000', 'テスト山', '00000000000'),
(39, '2019-10-28 16:08:08', 7, 'たろう', 'test@hotmail.com', '111', '0000', 'テスト山', '00000000000');

-- --------------------------------------------------------

--
-- Table structure for table `dat_sales_product`
--

CREATE TABLE `dat_sales_product` (
  `code` int(11) NOT NULL,
  `code_sales` int(11) NOT NULL,
  `code_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dat_sales_product`
--

INSERT INTO `dat_sales_product` (`code`, `code_sales`, `code_product`, `price`, `quantity`) VALUES
(14, 30, 22, 120, 2),
(15, 30, 24, 111, 3),
(16, 31, 22, 120, 2),
(17, 31, 24, 111, 3),
(18, 32, 22, 120, 2),
(19, 32, 24, 111, 3),
(20, 33, 22, 120, 2),
(21, 33, 24, 111, 3),
(22, 34, 21, 200, 2),
(23, 35, 22, 120, 1),
(24, 36, 22, 120, 1),
(25, 37, 22, 120, 1),
(26, 38, 21, 200, 1),
(27, 39, 24, 111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_product`
--

CREATE TABLE `mst_product` (
  `code` int(11) NOT NULL COMMENT '商品コード',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `gazou` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_product`
--

INSERT INTO `mst_product` (`code`, `name`, `price`, `gazou`) VALUES
(21, '玉ねぎ', 200, 'tamanegi.jpg'),
(22, 'じゃがいも', 120, 'jaga.jpg'),
(24, 'トマト', 111, 'tomato.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mst_staff`
--

CREATE TABLE `mst_staff` (
  `code` int(11) NOT NULL COMMENT 'staff code',
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_staff`
--

INSERT INTO `mst_staff` (`code`, `name`, `password`) VALUES
(1, '1', 'c4ca4238a0b923820dcc509a6f75849b'),
(4, 'tanaka_', '0292e031195ca50fed149b421c7df329'),
(5, 'iceT', 'fcdf3fc6a5b3d121ba1ed70b0b25f2b7'),
(6, 'root', '63a9f0ea7bb98050796b649e85481845'),
(7, '7', '8f14e45fceea167a5a36dedd4bea2543');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dat_member`
--
ALTER TABLE `dat_member`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dat_sales`
--
ALTER TABLE `dat_sales`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `mst_product`
--
ALTER TABLE `mst_product`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dat_member`
--
ALTER TABLE `dat_member`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dat_sales`
--
ALTER TABLE `dat_sales`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mst_product`
--
ALTER TABLE `mst_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品コード', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mst_staff`
--
ALTER TABLE `mst_staff`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'staff code', AUTO_INCREMENT=8;
