-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 12:41 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Complete` varchar(50) NOT NULL,
  `due` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `expiry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `u_id`, `token`, `expiry`) VALUES
(2, 45, 'b930689b43d25feba2ab147785e25c0f', '2021-09-21 15:05:48'),
(3, 45, 'e1a25328bb89ea66a3827e70ca0701d3', '2021-09-21 15:06:03'),
(4, 45, 'b78ffd3bc07bedd62770ec784037fe09', '2021-09-21 15:06:42'),
(5, 45, 'd29901bedb61f976d38d7842a01e7d48', '2021-09-21 15:07:26'),
(6, 45, 'c43c77be0d61db78ba8eede182e64475', '2021-09-21 15:08:15'),
(7, 45, 'f4e136fd01e06a28fd497dd05979d78c', '2021-09-21 15:09:16'),
(8, 45, '7dff971d5b90b8068a9b95d6be255f7d', '2021-09-21 15:09:32'),
(9, 45, '5071e3845eaabd013888a08f615886d4', '2021-09-21 15:11:01'),
(10, 45, 'e838ce970d34f8bdc148a37a5ca32d14', '2021-09-21 15:12:20'),
(11, 45, '5c5597296c5556b429c1694498d739ab', '2021-09-21 15:22:16'),
(16, 46, '619e6b104d98155f25e23e8c17149ee5', '2021-09-21 15:38:23'),
(23, 45, '7e93711c8eec2ecbe698733917442f1b', '2021-09-21 17:30:26'),
(34, 45, '92cf4407e11e9cefb38ba295f0565ed8', '2021-09-22 00:39:09'),
(35, 45, '43a9e4ceec3a2c6396664acfbf0c44fa', '2021-09-22 00:44:39'),
(36, 45, 'baffad27675283fe7cadcab8f579ced7', '2021-09-22 00:45:01'),
(37, 45, '037861a79d446d8382c54bc1d2e6cdde', '2021-09-22 00:46:11'),
(38, 45, '9eed0b1ee524d67de56d854f1ef38cb5', '2021-09-22 00:47:24'),
(39, 45, '8b99e326b8fd746c58b6cde3984284c7', '2021-09-22 00:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `email`, `name`, `password`) VALUES
(45, 'npfarisenimaphiri@gmail.com', 'Worshi', 'e10adc3949ba59abbe56e057f20f883e'),
(46, 'npfarisenimaphiriwrk@gmail.com', 'Worship', '2f42787b519897e09aa579c47287fc3c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
