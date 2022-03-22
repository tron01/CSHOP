-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 11:58 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: ` eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `website`, `description`) VALUES
(1, 'hp', 'hp.com', 'hp products'),
(11, 'Dell', 'dell.com', 'dell products'),
(12, 'Acer', 'acer.com', ' Acer products');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'gpu', 1),
(2, 'ram', 1),
(3, 'monitor', 0),
(4, 'mouse', 1),
(5, 'keyboard', 1),
(21, 'Headset', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(2, 'ansu', '123$gmail.com', '30209393', 'tesrt2', '2021-07-11 06:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(20) NOT NULL,
  `mobile` int(50) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_amount` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `city`, `pincode`, `mobile`, `payment_type`, `total_amount`, `payment_status`, `order_status`, `added_on`) VALUES
(1, 1, 'Eranakulam', 'Ernakulam/keraka', 682304, 12222222, 'COD', 800, 'success', 3, '2022-01-01 06:01:31'),
(2, 1, 'kochi', 'Ernakulam/keraka', 678901, 12222222, 'COD', 5000, 'Success', 3, '2022-01-02 12:21:00'),
(3, 2, 'Eranakulam', 'Ernakulam/keraka', 682308, 2147483647, 'COD', 7000, 'success', 2, '2022-01-02 06:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `added_on`) VALUES
(1, 1, 10, 1, 800, '2022-01-01 06:01:31'),
(2, 2, 14, 1, 2000, '2022-01-02 12:21:00'),
(3, 2, 15, 1, 3000, '2022-01-02 12:21:01'),
(4, 3, 15, 1, 3000, '2022-01-02 06:25:59'),
(5, 3, 14, 2, 2000, '2022-01-02 06:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `seller_id`, `brand_id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(9, 2, 1, 5, 'Hp keyboard', 134, 1223, 12, '748336985_MK1000-1.jpg', 'q', 'qq', '', '', '', 1),
(10, 1, 1, 5, 'Hp gaming  keyboard', 1000, 800, 21, '192009486_HP K300 Backlit Membrane Wired Gaming Keyboard, Backlit Mixed Color Lighting.jpg', '1wq', 'sa', '', '', '', 1),
(11, 1, 2, 4, 'Dell gaming mouse', 2222, 123, 11, '671450111_311KTDtdewL-300x300.jpg', 'dsc', 'dss', 'do', 'ds', 'ds', 1),
(12, 1, 3, 1, 'msi gpu 720', 1212, 1000, 1, '457664434_msi gpu.webp', 'gaming Graphics Card for pc', 'Brand   MSI\r\n\r\nGraphics Engine\r\n	\r\n\r\n    NVIDIA GeForce GT 710\r\n\r\nGPU Clock\r\n	\r\n\r\n    954 MHz\r\n\r\nProcessors and Cores\r\n	\r\n\r\n    954 CUDA Cores\r\n\r\nBus Standard\r\n	\r\n\r\n    PCI Express 2.0 x16 (uses x8)\r\n\r\nModel ID\r\n	\r\n\r\n    GT 710 2GD3H LP I 64 bit I PCI Express 2.0 x16 (uses x8)\r\n\r\nPower Supply Required\r\n	\r\n\r\n    300 W\r\n\r\nPart Number\r\n	\r\n\r\n    GT 710 2GD3H LP', 'MSI NVIDIA GT 710 2GD3H LP I 64 bit I PCI Express 2.0 x16 (uses x8) 2 GB DDR3 Graphics Card', 'Graphics Card', 'Graphics Card', 0),
(13, 1, 3, 1, 'zotac-geforce-gt-710', 2000, 1500, 10, '792973319_zotac-geforce-gt-710.jpg', 'nill', 'nill', '', '', '', 1),
(14, 2, 2, 1, 'gigabyte-gv-n710', 3000, 2000, 2, '187137777_gigabyte-gv-n710.jpg', 'nill', 'nill', '', '', '', 1),
(15, 2, 9, 2, 'Corsair Vengeance RAM', 6000, 3000, 1, '764586545_Corsair Vengeance LPX 8GB (1x8GB) DDR4 3200MHZ C16 Desktop RAM (Black).jpg', 'Corsair Vengeance LPX 8GB (1x8GB) DDR4 3200MHZ C16 Desktop RAM (Black)', 'Vengeance LPX memory is designed for high-performance overclocking. The heat-spreader is made of pure aluminum for faster heat dissipation, and the eight-layer PCB helps manage heat and provides superio overclocking headroom.', 'Corsair Vengeance LPX 8GB (1x8GB) DDR4 3200MHZ C16 Desktop RAM (Black)', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `password`, `mobile`, `email`, `date`) VALUES
(1, 'admin', 'admin', 23422333, 'eamil@gmail.com', '2021-12-30 20:03:20'),
(2, 'seller2', 'seller2', 789000000, 'seller@gmail.com', '2021-12-30 20:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(1, 'abu', '123', 'abu123@gmail.com', '00000000', '2021-06-28 18:38:03'),
(2, 'ansu', '124', 'ansu123@gmail.com', '09987756545', '2021-07-13 01:39:56'),
(8, 'Tom', '123abu', 'tom@gmail.com', '1234567899', '2021-12-28 02:34:55'),
(9, 'Aju', 'aju', 'aju@gmail.com', '8983838383', '2022-01-01 06:26:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
