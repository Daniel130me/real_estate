-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 02:46 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paphet`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `ppt_image` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `ppt_image`, `date_time`) VALUES
(1, '1234.png', '0000-00-00 00:00:00'),
(34, '813987952.jpeg', '2022-08-18 23:53:10'),
(36, '263750761.jpg', '2022-08-20 01:36:05'),
(37, '51061292.jpg', '2022-08-20 01:36:05'),
(38, '42487815.jpg', '2022-08-20 01:36:09'),
(39, '457962059.jpg', '2022-08-20 01:36:09'),
(40, '595542765.jpg', '2022-08-20 01:36:11'),
(41, '16726225.jpg', '2022-08-20 01:36:11'),
(42, '703568328.jpg', '2022-08-20 01:36:12'),
(43, '474947775.jpg', '2022-08-20 01:36:12'),
(44, '757567422.jpg', '2022-08-20 01:36:13'),
(45, '154120055.jpg', '2022-08-20 01:36:13'),
(46, '126805443.jpg', '2022-08-20 01:36:13'),
(47, '68538661.jpg', '2022-08-20 01:36:13'),
(48, '10376522.jpg', '2022-08-20 01:36:14'),
(49, '261997514.jpg', '2022-08-20 01:36:14'),
(50, '11744997.jpg', '2022-08-20 01:36:15'),
(51, '493861188.jpg', '2022-08-20 01:36:15'),
(52, '583318941.jpg', '2022-08-20 01:36:16'),
(53, '284672887.jpg', '2022-08-20 01:36:16'),
(54, '857857717.jpg', '2022-08-20 01:36:17'),
(55, '135608828.jpg', '2022-08-20 01:36:17'),
(56, '55694704.jpg', '2022-08-20 01:36:17'),
(57, '711012322.jpg', '2022-08-20 01:36:17'),
(58, '51935925.jpg', '2022-08-20 01:36:19'),
(59, '377383326.png', '2022-08-20 01:36:19'),
(60, '888988999.jpg', '2022-08-20 01:36:20'),
(61, '627418567.jpeg', '2022-08-20 01:36:20'),
(62, '189142767.jpeg', '2022-08-20 01:36:21'),
(63, '34851559.jpg', '2022-08-20 01:36:21'),
(64, '734421666.jpg', '2022-08-20 01:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'property id',
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(12) NOT NULL,
  `type_id` int(3) NOT NULL COMMENT 'property type id',
  `status_id` int(3) NOT NULL COMMENT 'property status id',
  `bathroom` int(3) NOT NULL,
  `bedroom` int(3) NOT NULL,
  `toilet` int(3) NOT NULL,
  `size` int(6) NOT NULL,
  `room` int(3) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `other_photos` varchar(100) NOT NULL,
  `main_photo` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `title`, `description`, `price`, `type_id`, `status_id`, `bathroom`, `bedroom`, `toilet`, `size`, `room`, `street`, `city`, `area`, `state`, `country`, `other_photos`, `main_photo`, `date_created`, `date_updated`) VALUES
(12, 'Marriot Hotel in ikorodu, lagos', 'We are doing great', 20000000, 2, 2, 1, 3, 3, 200, 2, 'london barber', 'Ikorodu', '', 'Lagos', 'Nigeria', '51061292.jpg*42487815.jpg*857857717.jpg', '263750761.jpg', '0000-00-00 00:00:00', '2022-08-24 12:34:43'),
(13, 'House in Ibeju Lekki, New estate', 'we are one!', 300000, 1, 3, 2, 2, 2, 500, 2, '6, Majidun-Awori Iko', 'Lagos mainland', '', 'Lagos', 'Nigeria', 'avatar4.png*888988999.jpg*34851559.jpg*189142767.jpeg', '734421666.jpg', '2022-08-16 15:59:08', '2022-08-20 01:43:00'),
(14, 'Raddison blue anchorage Hotel in Ikeja, lagos', 'We are doing great', 10000000, 2, 1, 1, 3, 3, 200, 2, 'london barber', 'araromi', '', 'Lagos', 'Nigeria', 'avatar2.png*126805443.jpg*261997514.jpg*135608828.jpg', '68538661.jpg', '0000-00-00 00:00:00', '2022-08-20 01:40:18'),
(16, 'Marriot Hotel in ikorodu, lagos in the way of the king she set and watched', 'Marriot Hotel in ikorodu, lagos in the way of the   the way of the king she set and watched king she set and watched', 70000000, 1, 1, 1, 3, 3, 400, 2, '', 'Ikorodu', '', 'Lagos', 'Nigeria', '154120055.jpg', '55694704.jpg', '0000-00-00 00:00:00', '2022-08-22 15:41:04'),
(17, 'Marriot Hotel in ikorodu, lagos', 'We are doing great', 20000000, 2, 2, 1, 3, 3, 200, 2, 'london barber', 'Ikorodu', '', 'Lagos', 'Nigeria', 'avatar2.png*51061292.jpg*42487815.jpg*857857717.jpg', '263750761.jpg', '0000-00-00 00:00:00', '2022-08-20 01:39:17'),
(18, 'Marriot Hotel in ikorodu, lagos in the way of the king she set and watched', 'Marriot Hotel in ikorodu, lagos in the way of the   the way of the king she set and watched king she set and watched', 70000000, 1, 1, 1, 3, 3, 400, 2, '', 'Ikorodu', '', 'Lagos', 'Nigeria', '154120055.jpg', '55694704.jpg', '0000-00-00 00:00:00', '2022-08-22 15:41:04'),
(19, 'Marriot Hotel in ikorodu, lagos', 'We are doing great', 20000000, 2, 2, 1, 3, 3, 200, 2, 'london barber', 'Ikorodu', '', 'Lagos', 'Nigeria', 'avatar2.png*51061292.jpg*42487815.jpg*857857717.jpg', '263750761.jpg', '0000-00-00 00:00:00', '2022-08-20 01:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `property_status`
--

CREATE TABLE `property_status` (
  `id` int(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_status`
--

INSERT INTO `property_status` (`id`, `status`) VALUES
(1, 'Rental'),
(2, 'Sales'),
(3, 'Shortlet');

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE `property_type` (
  `id` int(11) NOT NULL,
  `type` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`id`, `type`) VALUES
(1, 'Land'),
(2, 'House');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `date_created`, `date_updated`) VALUES
(3, 'Oluwagbenga', 'Kosoko', 'kosokodaniel@gmail.com', 'G.s.o.m.', '2022-08-19 16:59:07', '2022-08-19 17:41:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_status`
--
ALTER TABLE `property_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
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
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'property id', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `property_status`
--
ALTER TABLE `property_status`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
