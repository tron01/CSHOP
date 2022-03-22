-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 01:14 PM
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
(1, 'HP', 'hp.com', 'hp products'),
(2, 'Dell', 'dell.com', 'dell products'),
(3, 'Acer', 'acer.com', ' Acer products'),
(13, 'msi', 'msi.com', 'msi products'),
(14, 'Corsair', 'Corsair.com', 'Corsair  products'),
(15, 'Boat', 'Boat.com', 'boat product'),
(16, 'Zebronics', 'Zebronics.com', 'Zebronics products');

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
(4, 'mouse', 1),
(5, 'keyboard', 1),
(21, 'Headset', 1);

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
(5, 'anooj', 'anool123@gmail.com', '12313132131', 'helo admin', '2022-01-10 12:53:30'),
(6, 'Ansu', 'ansu123@gmail.com', '2324435464', 'helo', '2022-01-10 01:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
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

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `city`, `pincode`, `mobile`, `payment_type`, `total_amount`, `payment_status`, `order_status`, `added_on`) VALUES
(1, 1, 'Basil', 'Eranakulam', 'Ernakulam/keraka', 682304, 12222222, 'COD', 800, 'Success', 5, '2022-01-01 06:01:31'),
(2, 1, 'Basil', 'kochi', 'Ernakulam/keraka', 678901, 12222222, 'COD', 5000, 'Success', 2, '2022-01-02 12:21:00'),
(15, 10, 'Anooj', '324242424', 'niil', 324242, 2147483647, 'COD', 2600, 'Success', 4, '2022-01-11 12:25:16'),
(19, 10, 'Anooj', '1223', 'kochi', 444444, 1121323546, 'COD', 4000, 'Success', 4, '2022-01-12 11:14:12'),
(20, 10, 'Anooj', 'near High court', 'Kochi,Ernakulam,Kerala', 682015, 2147483647, 'payu', 999, 'Success', 5, '2022-02-28 09:49:52');

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
  `added_on` datetime NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `added_on`, `seller_id`) VALUES
(1, 1, 10, 1, 800, '2022-01-01 06:01:31', 2),
(2, 2, 14, 1, 2000, '2022-01-02 12:21:00', 1),
(3, 2, 15, 1, 3000, '2022-01-02 12:21:01', 1),
(19, 15, 11, 1, 1600, '2022-01-11 12:25:16', 1),
(20, 15, 12, 1, 1000, '2022-01-11 12:25:16', 2),
(21, 16, 13, 1, 1500, '2022-01-11 01:11:03', 2),
(24, 19, 14, 2, 2000, '2022-01-12 11:14:12', 1),
(25, 20, 18, 1, 999, '2022-02-28 09:49:52', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_review`
--

CREATE TABLE `order_review` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_review`
--

INSERT INTO `order_review` (`id`, `order_id`, `seller_id`, `msg`, `added_on`) VALUES
(1, 19, 1, 'info not enough', '0000-00-00 00:00:00'),
(2, 15, 2, 'No correct information available', '0000-00-00 00:00:00');

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
(9, 1, 1, 5, 'Hp keyboard', 2000, 1223, 10, '748336985_MK1000-1.jpg', 'q', 'qq', '', '', '', 1),
(10, 2, 1, 5, 'Hp gaming  keyboad', 1000, 800, 10, '192009486_HP K300 Backlit Membrane Wired Gaming Keyboard, Backlit Mixed Color Lighting.jpg', '1wq', 'sa', '', '', '', 1),
(11, 1, 2, 4, 'Dell gaming mouse', 2222, 1600, 9, '671450111_311KTDtdewL-300x300.jpg', 'dsc', 'dss', 'do', 'ds', 'ds', 1),
(12, 2, 3, 1, 'msi gpu 720', 3000, 1000, 0, '457664434_msi gpu.webp', 'gaming Graphics Card for pc', 'Brand   MSI\r\n\r\nGraphics Engine\r\n	\r\n\r\n    NVIDIA GeForce GT 710\r\n\r\nGPU Clock\r\n	\r\n\r\n    954 MHz\r\n\r\nProcessors and Cores\r\n	\r\n\r\n    954 CUDA Cores\r\n\r\nBus Standard\r\n	\r\n\r\n    PCI Express 2.0 x16 (uses x8)\r\n\r\nModel ID\r\n	\r\n\r\n    GT 710 2GD3H LP I 64 bit I PCI Express 2.0 x16 (uses x8)\r\n\r\nPower Supply Required\r\n	\r\n\r\n    300 W\r\n\r\nPart Number\r\n	\r\n\r\n    GT 710 2GD3H LP', 'MSI NVIDIA GT 710 2GD3H LP I 64 bit I PCI Express 2.0 x16 (uses x8) 2 GB DDR3 Graphics Card', 'Graphics Card', 'Graphics Card', 1),
(13, 2, 3, 1, 'zotac-geforce-gt-710', 2000, 1500, 10, '792973319_zotac-geforce-gt-710.jpg', 'nill', 'nill', '', '', '', 1),
(14, 1, 2, 1, 'gigabyte-gv-n710', 3000, 2000, 7, '187137777_gigabyte-gv-n710.jpg', 'nill', 'nill', '', '', '', 1),
(15, 1, 0, 2, 'Corsair Vengeance RAM', 6000, 3000, 8, '764586545_Corsair Vengeance LPX 8GB (1x8GB) DDR4 3200MHZ C16 Desktop RAM (Black).jpg', 'Corsair Vengeance LPX 8GB (1x8GB) DDR4 3200MHZ C16 Desktop RAM (Black)', 'Brand	‎Corsair\r\nManufacturer	‎Corsair, Corsair Memory Co. Ltd., 5F.-1, No.5A, Hangxiang Rd., Dayuan Township, Taoyuan County 33747, Taiwan, TEL:(886) 3-3995803, indiservice@corsair.com\r\nSeries	‎VENGEANCE LPX\r\nColour	‎Black\r\nForm Factor	‎DDR4\r\nItem Height	‎34 Millimeters\r\nItem Width	‎7 Millimeters\r\nProduct Dimensions	‎13.5 x 0.7 x 3.4 cm; 38 Grams\r\nItem model number	‎CMK8GX4M1E3200C16\r\nRAM Size	‎8 GB\r\nMemory Technology	‎DDR4\r\nComputer Memory Type	‎DDR4 SDRAM\r\nMemory Clock Speed	‎1\r\nVoltage	‎1.2 Volts\r\nIncluded Components	‎1 x 8GB memory module\r\nManufacturer	‎Corsair\r\nCountry of Origin	‎China\r\nItem Weight	‎38 g', '', '', '', 1),
(16, 3, 15, 21, 'boAt Rockerz 370 Headphone', 2400, 999, 10, '776490289_headset.jpg', 'boAt Rockerz 370 Bluetooth Wireless On Ear Headphone with Mic (Buoyant Black)', 'Brand	‎BoAt\r\nManufacturer	‎Imagine Marketing Pvt Ltd\r\nModel	‎Rockerz 370\r\nModel Name	‎Rockerz 370\r\nProduct Dimensions	‎7 x 18 x 16 cm; 137 Grams\r\nBatteries	‎1 Lithium ion batteries required. (included)\r\nItem model number	‎Rockerz 370\r\nCompatible Devices	‎Windows, iOS, Android\r\nSpecial Features	‎Android Phone Control, IOS Phone Control, Lightweight, Volume-Control, Microphone Feature\r\nMounting Hardware	‎Rockerz 370, Charging Cable, User Manual, Warranty Card\r\nNumber Of Items	‎5\r\nMicrophone Form Factor	‎With microphone\r\nHeadphones Form Factor	‎On Ear\r\nBatteries Included	‎Yes\r\nBatteries Required	‎Yes\r\nBattery Cell Composition	‎Lithium\r\nCable Feature	‎Without Cable\r\nConnector Type	‎Wireless\r\nIncludes Rechargable Battery	‎Yes\r\nManufacturer	‎Imagine Marketing Pvt Ltd\r\nCountry of Origin	‎China\r\nItem Weight	‎137 g', '', '', '', 1),
(17, 3, 16, 4, 'Zebronics Wired Gaming Mouse D1 Black', 999, 2000, 12, '292022314_premium-usb-gaming-mouse.jpg', 'This premium USB gaming mouse by Zebronics comes with 6 buttons, high resolution gaming sensor 3600 DPI and multicolour LED.', '.LED Backlight up to 3200 DPI, Ergonomic Design for Laptop & PC', '', '', '', 1),
(18, 2, 16, 4, 'Zeb Clash: Premium USB Gaming', 2000, 999, 9, '727649359_mouse.jpg', 'This premium USB gaming mouse by Zebronics comes with 6 buttons, high resolution gaming sensor 3600 DPI and multicolour LED.', 'This premium USB gaming mouse by Zebronics comes with 6 buttons, high resolution gaming sensor 3600 DPI and multicolour LED.', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produt_review`
--

CREATE TABLE `produt_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produt_review`
--

INSERT INTO `produt_review` (`id`, `product_id`, `user_id`, `rating`, `review`, `status`, `added_on`) VALUES
(1, 14, 1, 'good', 'good product', 1, '2022-01-05 02:04:11'),
(6, 15, 9, 'Fantastic', 'super product\r\nMust buy', 1, '2022-01-05 10:16:54'),
(9, 11, 10, 'Fantastic', 'laborum sed quis officiis sequi, autem voluptates, atque officia reiciendis repellat iste recusandae molestiae expedita?', 1, '2022-01-05 05:09:52'),
(10, 11, 11, 'verygood', 'sed quis officiis sequi, autem voluptates, atque officia reiciendis r', 0, '2022-01-09 01:05:18'),
(11, 11, 10, 'Fantastic', 'good product', 1, '2022-01-21 02:50:44'),
(12, 18, 10, 'Fantastic', 'Good product must buy!!!', 1, '2022-02-28 10:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `password`, `mobile`, `email`, `date`) VALUES
(1, 'seller1', '123', 23422333, 'eamil@gmail.com', '2022-01-13 17:07:30'),
(2, 'seller2', '123', 789000000, 'seller@gmail.com', '2022-01-13 17:07:38'),
(3, 'seller3', '123', 2131313131, 'seller3@gmail.com', '2022-01-10 00:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `seller_complaints`
--

CREATE TABLE `seller_complaints` (
  `complaint_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `mssg` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_complaints`
--

INSERT INTO `seller_complaints` (`complaint_id`, `seller_id`, `mssg`, `date`) VALUES
(3, 1, 'hello admin', '2022-02-11 08:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `seller_com_feeback`
--

CREATE TABLE `seller_com_feeback` (
  `s_feedback_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `viewed` int(11) NOT NULL,
  `addedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_com_feeback`
--

INSERT INTO `seller_com_feeback` (`s_feedback_id`, `comp_id`, `message`, `viewed`, `addedon`) VALUES
(1, 3, 'ok', 1, '2022-02-11 09:03:36');

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
(1, 'Basil', '123', 'Basil123@gmail.com', '99877565451', '2021-06-28 18:38:03'),
(2, 'Ansu', '124', 'ansu123@gmail.com', '99877565452', '2021-07-13 01:39:56'),
(8, 'Tom', '123', 'tom@gmail.com', '1234567899', '2021-12-28 02:34:55'),
(9, 'Aju', 'aju', 'aju@gmail.com', '8983838383', '2022-01-01 06:26:45'),
(10, 'Anooj', '123', 'anooj123@gmail.com', '7690909808', '2022-01-05 05:09:03'),
(11, 'Abhiith', '1234', 'abhi123@gmail.com', '6968699876', '2022-01-09 01:00:25'),
(12, 'Amal', '123', 'amal111@gmail.com', '9931414142', '2022-02-05 05:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_complaints`
--

CREATE TABLE `user_complaints` (
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mssg` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_complaints`
--

INSERT INTO `user_complaints` (`complaint_id`, `user_id`, `mssg`, `date`) VALUES
(2, 10, 'hello admin 1', '2022-02-11 05:16:37'),
(3, 10, 'update the speed', '2022-02-28 10:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_com_feeback`
--

CREATE TABLE `user_com_feeback` (
  `feedback_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `viewed` int(11) NOT NULL,
  `addedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_com_feeback`
--

INSERT INTO `user_com_feeback` (`feedback_id`, `comp_id`, `message`, `viewed`, `addedon`) VALUES
(2, 2, 'hai', 1, '2022-02-11 06:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_order_review`
--

CREATE TABLE `user_order_review` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `addedd_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order_review`
--

INSERT INTO `user_order_review` (`id`, `order_id`, `user_id`, `msg`, `addedd_on`) VALUES
(2, 15, 10, 'very good', '0000-00-00 00:00:00');

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
-- Indexes for table `order_review`
--
ALTER TABLE `order_review`
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
-- Indexes for table `produt_review`
--
ALTER TABLE `produt_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_complaints`
--
ALTER TABLE `seller_complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `seller_com_feeback`
--
ALTER TABLE `seller_com_feeback`
  ADD PRIMARY KEY (`s_feedback_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_complaints`
--
ALTER TABLE `user_complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `user_com_feeback`
--
ALTER TABLE `user_com_feeback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `user_order_review`
--
ALTER TABLE `user_order_review`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_review`
--
ALTER TABLE `order_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produt_review`
--
ALTER TABLE `produt_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller_complaints`
--
ALTER TABLE `seller_complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller_com_feeback`
--
ALTER TABLE `seller_com_feeback`
  MODIFY `s_feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_complaints`
--
ALTER TABLE `user_complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_com_feeback`
--
ALTER TABLE `user_com_feeback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_order_review`
--
ALTER TABLE `user_order_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
