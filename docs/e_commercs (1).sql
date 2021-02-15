-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 11:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commercs`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_img` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `brand_img`, `status`, `created`, `updated`) VALUES
(1, 'Apple', 'a.png', 1, '2020-04-14 00:00:00', '2020-04-14 20:51:53'),
(2, 'Samsung', 's.png', 1, '2020-04-14 05:10:00', '2020-04-14 20:53:07'),
(5, 'MI', 'mi.png', 1, '2020-04-14 20:37:07', '2020-04-14 20:54:04'),
(7, 'TP-Link', 'tplink.png', 1, '2020-04-15 01:21:26', '2020-04-14 19:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'viewer', 'Viewers');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `model_no` varchar(100) NOT NULL,
  `technical_specification` longtext NOT NULL,
  `other_details` longtext NOT NULL,
  `pdf_file` varchar(100) NOT NULL,
  `slider_img1` varchar(100) NOT NULL,
  `slider_img2` varchar(100) DEFAULT NULL,
  `slider_img3` varchar(100) DEFAULT NULL,
  `slider_img4` varchar(100) DEFAULT NULL,
  `slider_img5` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `brand_id`, `category_id`, `sub_category_id`, `model_no`, `technical_specification`, `other_details`, `pdf_file`, `slider_img1`, `slider_img2`, `slider_img3`, `slider_img4`, `slider_img5`, `status`, `created`, `updated`) VALUES
(1, 5, 5, 6, 'ei-10x', 'fsdgdsgsd chddfhnchdh sgfg', 'fsdgdsgsd chddfhnchdh sgfg', '', '31.png', NULL, NULL, NULL, NULL, 1, '2020-04-16 00:59:33', '2020-04-14 21:18:50'),
(2, 1, 4, 2, 'Xcode', 'The Mac mini is Apple\'s only consumer desktop computer since 1998 to ship without a display, keyboard, or mouse. Apple initially marketed it as BYODKM (Bring Your Own Display, Keyboard, and Mouse), pitching it to users switching from a traditional PC running operating systems such as Microsoft Windows.', 'The Mac mini was introduced in January 2005, using PowerPC G4 processors. The second generation Mac mini, introduced in February 2006, carried over the design of the PowerPC version, but used Intel Core processors and other upgraded components, and made wireless connections such as Bluetooth and Wi-Fi standard.', '41.png', 'a1.jpg', '0000.jpg', '7.png', NULL, NULL, 1, '2020-04-21 00:10:41', '2020-04-15 14:44:39'),
(3, 5, 5, 8, 'Bit201', 'Technical Specification', 'Other Details', '594262.pdf', '51.jpg', NULL, NULL, NULL, NULL, 1, '2020-04-16 01:08:55', '2020-04-15 14:46:43'),
(4, 1, 6, 1, 'iPhone-10', 'fsdgdsgsd chddfhnchdh sgfg', 'fsdgdsgsd chddfhnchdh sgfg55659', '', 'i1.jpg', NULL, NULL, NULL, NULL, 1, '2020-04-17 16:08:44', '2020-04-15 18:45:49'),
(5, 2, 7, 11, 'Galaxy Z Flip', 'First Release	February 2020\r\nColors	Mirror Black, Mirror Purple, Mirror Gold\r\n  Connectivity	 \r\nNetwork	\r\n2G, 3G, 4G\r\n\r\nSIM	Nano-SIM, Electronic SIM card (eSIM)\r\nWLAN	✅ dual-band, Wi-Fi direct, Wi-Fi hotspot\r\nBluetooth	✅ 5.0, A2DP, LE\r\nGPS	✅ A-GPS, GLONASS, BDS, Galileo\r\nRadio	✖\r\nUSB	v3.1\r\nOTG	✅\r\nUSB Type-C	✅\r\nNFC	✅\r\n  Body	 \r\nStyle	Vertical Foldable Smartphone\r\nMaterial	Glass front, aluminum frame\r\nWater Resistance	✖\r\nDimensions	167.3 x 73.6 x 7.2 millimeters (unfolded)\r\n87.4 x 73.6 x 17.3 millimeters (folded)\r\nWeight	183 grams\r\n  Display	 \r\nSize	6.7 inches\r\nResolution	Full HD+ 1080 x 2636 pixels (425 ppi)\r\nTechnology	Dynamic AMOLED Foldable Touchscreen\r\nProtection	✖ (Scratch-resistant)\r\nFeatures	Multitouch, Always-on display\r\nCover Display	1.1″ Super AMOLED, 112 x 300 pixels, Corning Gorilla Glass 6, Always-on display\r\n  Back Camera	 \r\nResolution	Dual 12+12 Megapixel\r\nFeatures	Dual Pixel PDAF, OIS, ultrawide, wide, LED flash & more\r\nVideo Recording	Ultra HD 4K (2160p), HDR10+\r\n  Front Camera	 \r\nResolution	10 Megapixel\r\nFeatures	Depth sensor, wide, cover camera & more\r\nVideo Recording	Ultra HD 4K (2160p)\r\n  Battery	 \r\nType and Capacity	Lithium-polymer 3300 mAh (non-removable)\r\nFast Charging	✅ 15W Fast Battery Charging, Wireless Charging\r\n  Performance	 \r\nOperating System	Android 10 (One UI 2)\r\nChipset	Qualcomm Snapdragon 855+ (7 nm)\r\nRAM	8 GB\r\nProcessor	Octa core, up to 2.95 GHz\r\nGPU	Adreno 640\r\n  Storage	 \r\nROM	256 GB (UFS 3.0)\r\nMicroSD Slot	✖\r\n  Sound	 \r\n3.5mm Jack	✖\r\nFeatures	Loudspeaker (stereo speakers), AKG tuned\r\n  Security	 \r\nFingerprint	✅ Side-mounted\r\nFace Unlock	✅\r\n  Others\r\nNotification Light	 \r\nSensors	Fingerprint, Accelerometer, Gyro, Proximity, Compass, Barometer\r\nMore	– Samsung Pay (Visa, MasterCard certified)\r\nManufactured by	Samsung\r\nMade in	\r\nSar Value', 'Samsung Galaxy Z Flip comes with 6.7 inches (unfolded) Full HD+ high-quality Dynamic AMOLED screen. It has a foldable smartphone design. The back camera is of dual 12+12 MP with 4K video recording option. The front camera is of 10 MP. Samsung Galaxy Z Flip comes with 3500 mAh battery. It has 8 GB RAM, up to 2.96 GHz octa-core CPU and Adreno 640 GPU. It is powered by a Qualcomm Snapdragon 855+ (7 nm) chipset. The device comes with 256 GB internal storage and no MicroSD slot. There is a side-mounted fingerprint sensor in this phone.\r\n\r\nAmong other features, there is eSIM, Samsung Pay, fast wireless charging, 1.6″ Gorilla Glass 6 protected cover display and so on. There is no FM Radio and 3.5mm Jack in this device.', '', 'Galaxy_Z_Flip.jpg', NULL, NULL, NULL, NULL, 1, '2020-04-17 15:20:48', '2020-04-17 09:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_img` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `brand_id`, `category_name`, `category_img`, `status`, `created`, `updated`) VALUES
(3, 7, 'Router', 'tplinkR1.jpg', 0, '0000-00-00 00:00:00', '2020-04-14 19:28:57'),
(4, 1, 'Laptop', 'l.png', 0, '0000-00-00 00:00:00', '2020-04-14 19:29:59'),
(5, 5, 'Mobile', 'm.png', 0, '0000-00-00 00:00:00', '2020-04-14 19:45:33'),
(6, 1, 'Mobile', 'm1.png', 0, '0000-00-00 00:00:00', '2020-04-15 18:43:17'),
(7, 2, 'Mobile', 'm2.png', 0, '0000-00-00 00:00:00', '2020-04-17 09:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_category`
--

CREATE TABLE `product_sub_category` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL,
  `sub_category_img` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_sub_category`
--

INSERT INTO `product_sub_category` (`id`, `brand_id`, `category_id`, `sub_category_name`, `sub_category_img`, `status`, `created`, `updated`) VALUES
(1, 1, 6, 'Smart Phone', 'i.jpg', 0, '0000-00-00 00:00:00', '2020-04-14 17:31:20'),
(2, 1, 4, 'MacMini', 'MacMini1.jpg', 0, '0000-00-00 00:00:00', '2020-04-14 18:16:50'),
(5, 7, 3, 'Single Router', 'rs.jpg', 0, '0000-00-00 00:00:00', '2020-04-14 19:23:36'),
(6, 5, 5, 'Smart Phone', 'm.png', 0, '0000-00-00 00:00:00', '2020-04-14 20:37:34'),
(7, 7, 3, 'Double Router', 'rd.jpg', 0, '0000-00-00 00:00:00', '2020-04-14 21:00:58'),
(8, 5, 5, 'Button Mobile', 'bm.jpg', 0, '0000-00-00 00:00:00', '2020-04-14 21:02:58'),
(10, 2, 7, 'Button Mobile', 'bm1.jpg', 0, '0000-00-00 00:00:00', '2020-04-17 09:11:28'),
(11, 2, 7, 'Smart Phone', 'm1.png', 0, '0000-00-00 00:00:00', '2020-04-17 09:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `present_address` tinytext,
  `permanent_address` tinytext,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `nid_no` varchar(20) DEFAULT NULL,
  `nid_file` varchar(255) DEFAULT NULL,
  `passport_no` varchar(20) DEFAULT NULL,
  `passport_file` varchar(255) DEFAULT NULL,
  `user_type` smallint(4) NOT NULL DEFAULT '0' COMMENT 'user=0, owner=1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `present_address`, `permanent_address`, `company`, `phone`, `nid_no`, `nid_file`, `passport_no`, `passport_file`, `user_type`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$xgbuI47qZSgycVFsPihIbuQGA8gaplwKX9eYPSmaJ67Yx7VTYYrpS', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1268889823, 1587496477, 1, 'Md. Zuel', 'Ali', NULL, NULL, 'ADMIN', '01738051123', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
