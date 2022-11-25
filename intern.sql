-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 11:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `business` char(40) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `Location` varchar(40) NOT NULL,
  `daily_sales` decimal(12,0) NOT NULL,
  `referal` varchar(6) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `business`, `contact`, `Location`, `daily_sales`, `referal`, `time`) VALUES
(1, 'Banda Security Center', '+256783456473', 'Banda', '600000', 'bOEL0e', '2022-11-17 10:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` char(20) NOT NULL,
  `lname` char(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `nin` varchar(20) NOT NULL,
  `locality` varchar(150) NOT NULL,
  `referal` varchar(6) DEFAULT NULL,
  `referalCode` varchar(6) DEFAULT NULL,
  `status` char(9) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `passcode` varchar(200) NOT NULL,
  `adminprevillages` char(5) DEFAULT NULL,
  `pic` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `tel`, `nin`, `locality`, `referal`, `referalCode`, `status`, `username`, `passcode`, `adminprevillages`, `pic`) VALUES
(5, 'Kruger', 'Ken', 'ken@gmail.com', '0786555452', 'CM00TR45TR', 'Kampala', '', 'D3CZWo', 'Suspended', 'timo', '4c8a457e07783d4307a2d374cb4e0d0b', 'user', ''),
(13, 'Mahande', 'Mahande', 'mahande@gmail.com', '074857578', 'CM5689H567FX', 'BroodWing', '', 'bOEL0e', 'Suspended', 'Mahande', 'd0fa21a12fd7b07fe8d32b9eda5bec23', 'user', ''),
(14, 'Dre', 'dain', 'dain@gmail.com', '+256788888888', 'CM3467XD23F', 'Banda', '', 'iKgTU7', 'Active', 'kaka', '4618f6eaf478a3af8dd33b8bb83a31b4', 'admin', '637601e36b85a6.48197637_png'),
(16, 'Bosco', 'Muzeei', 'bosco@gmail.com', '+256777777777', 'CM34355TH2', 'Kyambogo', '', '0tNWN0', 'Suspended', 'bosco', 'a1a4b56d554473b9d774ab91d684b271', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
