-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 07:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admi`
--

CREATE TABLE `admi` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admi`
--

INSERT INTO `admi` (`id`, `username`, `email`, `verified`, `token`, `password`) VALUES
(1, 'admin', 'harshanalakmal503@gmail.com', 0, '95c1b60bcfe61c60b1fa6f1442e493a5f08ab707a581b9629f507466281cb3a1949dac2531c4381beb83ab2c56d57b8262a5', '$2y$10$R8xwEZx9YEEjW7/lyJi4TOnfDAoq9tj1nOtXDWV8iZadQMMu8oV0u');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_code` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_code`, `customer_address`, `customer_contact`) VALUES
(1, 'O.K.D.H.Lakmal', 'CUSTOMER1', 'No-50, Handapanagala, Weherayaya', 711434499),
(2, 'W.K.C.Samanthi', 'CUSTOMER2', 'No-50, Handapanagala, Weherayaya', 711703310),
(3, 'Dunith', 'CUSTOMER3', 'No-50, Handapanagala, Weherayaya', 711434499),
(4, 'Dewshan', 'CUSTOMER4', 'No-50, Handapanagala, Weherayaya', 711434499);

-- --------------------------------------------------------

--
-- Table structure for table `free_issues`
--

CREATE TABLE `free_issues` (
  `free_issues_id` bigint(11) NOT NULL,
  `free_issues_label` varchar(255) NOT NULL,
  `free_issues_type` varchar(255) NOT NULL,
  `fproduct_id` bigint(50) NOT NULL,
  `ffree_product_id` bigint(50) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `free_purchase_quantity` int(11) NOT NULL,
  `lower_limit` int(11) NOT NULL,
  `uper_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `free_issues`
--

INSERT INTO `free_issues` (`free_issues_id`, `free_issues_label`, `free_issues_type`, `fproduct_id`, `ffree_product_id`, `purchase_quantity`, `free_purchase_quantity`, `lower_limit`, `uper_limit`) VALUES
(1, 'Free Issue Label 01', '0', 2, 2, 100, 10, 1, 10),
(2, 'Free Issue Label 02', '1', 10, 10, 100, 1, 1, 10),
(4, 'Free Issue Label 04', '0', 12, 12, 20, 2, 1, 60),
(5, 'Free Issue Label 05', '0', 13, 13, 5, 1, 1, 60),
(6, '15-07 Free Issue ', 'Multiple', 14, 14, 10, 1, 10, 10000),
(7, '15/07 Free Issue', '0', 15, 15, 50, 10, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `placing_order`
--

CREATE TABLE `placing_order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `net` int(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placing_order`
--

INSERT INTO `placing_order` (`id`, `customer_id`, `order_number`, `net`, `created_at`, `created_at_time`) VALUES
(3, 1, 'ORDER1', 600, '2022-07-06', '09:33:26'),
(4, 2, 'ORDER2', 10000, '2022-07-06', '09:33:26'),
(7, 1, 'ORDER3', 14400, '2022-07-06', '09:33:26'),
(8, 1, 'ORDER4', 5600, '2022-07-06', '09:33:26'),
(10, 2, 'ORDER5', 5600, '2022-07-07', '09:34:02'),
(15, 1, 'ORDER6', 6500, '2022-07-08', '13:25:01'),
(16, 3, 'ORDER7', 30000, '2022-07-15', '14:34:54'),
(17, 4, 'ORDER8', 135000, '2022-07-15', '20:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` bigint(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_code`, `product_price`, `product_expiry_date`) VALUES
(2, 'Key board', 'TEC1', 900, '2022-07-05'),
(10, 'Book', 'EDU1', 100, '2022-07-05'),
(12, 'Necklace', 'BEU1', 200, '2022-07-08'),
(13, 'Mouse', 'TEC2', 500, '2022-07-08'),
(14, 'Pen', 'BEU1', 200, '2022-07-14'),
(15, 'Pencil', 'PRO1', 70, '2022-07-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admi`
--
ALTER TABLE `admi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `free_issues`
--
ALTER TABLE `free_issues`
  ADD PRIMARY KEY (`free_issues_id`),
  ADD KEY `free_issues_ibfk_1` (`ffree_product_id`),
  ADD KEY `fproduct_id` (`fproduct_id`);

--
-- Indexes for table `placing_order`
--
ALTER TABLE `placing_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admi`
--
ALTER TABLE `admi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `free_issues`
--
ALTER TABLE `free_issues`
  MODIFY `free_issues_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `placing_order`
--
ALTER TABLE `placing_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `free_issues`
--
ALTER TABLE `free_issues`
  ADD CONSTRAINT `free_issues_ibfk_1` FOREIGN KEY (`ffree_product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `free_issues_ibfk_2` FOREIGN KEY (`fproduct_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `placing_order`
--
ALTER TABLE `placing_order`
  ADD CONSTRAINT `placing_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
