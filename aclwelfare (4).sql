-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 07:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aclwelfare`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `activity` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `user_id`, `username`, `activity`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 1, 'admin', 'Insert EPF record of member ID 53', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-14 15:53:52'),
(2, 2, 'user', 'Viewed EPF record of member ID 52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-14 15:55:40'),
(3, 1, 'admin', 'Viewed EPF record of member ID 46', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-14 16:15:38'),
(4, 1, 'admin', 'Viewed EPF record of member ID 37', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-15 09:40:49'),
(5, 1, 'admin', 'Viewed EPF record of member ID 37', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-15 09:41:40'),
(6, 1, 'admin', 'Deleted EPF record of member ID 37', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-15 09:41:40'),
(7, 2, 'user', 'Viewed EPF record of member ID 49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-15 09:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `applicant_name` varchar(100) DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `member_id`, `applicant_name`, `relation`) VALUES
(1, 27, 'sdfdsfsf sdfsdf sfsdf d', 'Self'),
(7, 29, 'fghf', 'Self'),
(8, 30, 'dgdfg', 'Self'),
(9, 31, 'ghjgj', 'Self'),
(10, 31, 'vbjmng', 'Daughter'),
(11, 31, 'ghjgj', 'Daughter'),
(20, 35, 'deepika', 'Mother-in-law'),
(21, 35, 'deepika', 'Mother'),
(22, 36, 'SDA Deepal Anurudh Bogahawatte', 'Self'),
(23, 36, 'deepika', 'Wife'),
(24, 36, 'sd', 'Mother-in-law'),
(32, 38, 'SDA Deepal Anurudh', 'Self'),
(34, NULL, 'SDA Deepal Anurudh Bogahawatte', 'Self'),
(35, NULL, 'sd', 'Mother'),
(36, NULL, 'ffg', 'Father'),
(37, NULL, 'dfg', 'Sister'),
(38, NULL, 'ffg', 'Sister'),
(39, NULL, 'SDA Deepal Anurudh Bogahawatte', 'Brother'),
(40, NULL, 'sd', 'Sister'),
(212, 41, 'drfgdgdf', 'Self'),
(214, 42, 'fghf', 'Self'),
(215, 42, 'fghfh', 'Mother'),
(216, 42, 'fghfg', 'Sister'),
(217, 42, 'fghfgh', 'Brother'),
(223, 44, '1561', 'Self'),
(224, 44, 'SPO', 'Mother'),
(225, 44, 'dfg', 'Sister'),
(226, 44, 'SPO', 'Brother'),
(227, 45, 'dfgfdgdg', 'Self'),
(232, 46, 'asasas', 'Self'),
(243, 47, 'SDA Deepal Anurudh Bogahawatte', 'Self'),
(262, 48, 'dfgdg', 'Self'),
(263, 49, 'SDA Deepal Anurudh Bogahawatte', 'Self'),
(265, 50, 'ddc', 'Self'),
(269, 49, 'dfg', 'Mother'),
(270, 49, 'dfg', 'Sister'),
(277, 41, 'fdghg', 'Mother'),
(278, 41, 'asasas', 'Son'),
(279, 41, 'dfg', 'Son'),
(280, 41, 'asasas', 'Son'),
(281, 46, 'dfg', 'Wife'),
(282, 46, 'dfg', 'Mother-in-law'),
(283, 46, 'SPO', 'Daughter'),
(284, 46, 'dsdsd', 'Son'),
(285, 46, 'sdd', 'Daughter'),
(286, 51, 'R.A.A Perera', 'Self'),
(287, 51, 'jkhjkh', 'Wife'),
(288, 51, 'kughu', 'Son'),
(289, 51, 'hfyj', 'Daughter'),
(290, 45, 'dfg', 'Mother'),
(291, 45, 'ffg', 'Son'),
(292, 45, 'ghfh', 'Father'),
(293, 52, 'admin', 'Self'),
(294, 52, 'asdasd', 'Mother'),
(295, 52, 'asdasda', 'Father'),
(296, 53, 'sdfsdf', 'Self'),
(297, 53, 'dfsf', 'Mother'),
(298, 53, 'sdfsf', 'Father');

-- --------------------------------------------------------

--
-- Table structure for table `grants`
--

CREATE TABLE `grants` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `grant_type` varchar(50) DEFAULT NULL,
  `grant_date` varchar(50) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grants`
--

INSERT INTO `grants` (`id`, `member_id`, `applicant_id`, `grant_type`, `grant_date`, `remarks`) VALUES
(1, 46, 282, 'Death', '2025-07-07', NULL),
(2, 46, 281, 'Death', '2025-07-07', NULL),
(3, 46, 232, 'Death', '2025-07-07', NULL),
(4, 46, 284, 'Birth', '2025-07-07', NULL),
(5, 41, 212, 'Death', '2025-07-07', NULL),
(6, 49, 269, 'Death', '2025-07-07', NULL),
(7, 49, 263, 'Marriage', '2025-03-12', NULL),
(8, 49, 263, 'Death', '2025-07-24', NULL),
(9, 51, 286, 'Retirement', '2025-07-01', NULL),
(10, 51, 286, 'Death', '2025-07-01', NULL),
(11, 45, 227, 'Retirement', '2025-07-01', NULL),
(14, 27, 1, 'Marriage', '2025-07-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_info`
--

CREATE TABLE `member_info` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `namewinitials` varchar(100) DEFAULT NULL,
  `epfno` varchar(100) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `raddress` varchar(100) DEFAULT NULL,
  `nic` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `marital` varchar(20) DEFAULT NULL,
  `rd` varchar(20) DEFAULT NULL,
  `dop` varchar(20) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_info`
--

INSERT INTO `member_info` (`id`, `fname`, `lname`, `namewinitials`, `epfno`, `dept`, `raddress`, `nic`, `dob`, `marital`, `rd`, `dop`, `mobile`) VALUES
(27, '', '', 'sdfdsfsf sdfsdf sfsdf d', '', 'ACF', '', '', '', NULL, NULL, NULL, ''),
(29, '', '', 'fghf', '', 'ACF', '', '', '', NULL, NULL, NULL, ''),
(30, '', '', 'dgdfg', '', 'ACF', '', '', '', NULL, NULL, NULL, ''),
(31, '', '', 'ghjgj', '', 'ACF', '', '', '', NULL, NULL, NULL, ''),
(35, 'SDA', '', 'SDA Deepal Anurudh', '', 'Electrical', 'Batakettara,Madapatha, Piliyandala', '198633802041', '2025-06-19', 'Married', NULL, NULL, '071-9386059'),
(36, 'SDA', 'Bogahawatte', 'SDA Deepal Anurudh Bogahawatte', '', 'Electrical', '222/3,Horana Road, Piliyandala', '198633802041', '2025-06-04', 'Married', NULL, NULL, '071-9386059'),
(38, 'SDA', '', 'SDA Deepal Anurudh', '', 'ACF', '222/3,Horana Road, Piliyandala', '', '', 'Single', '2025-06-10', '2025-07-01', '071-9386059'),
(41, 'fgdgdf', 'dfgd', 'drfgdgdf', '54646', 'QAD', 'dfgfdgdfg', 'dfgdfg464', '', 'Divorced', '2025-07-09', '2025-07-25', ''),
(42, 'ghfh', 'fghfg', 'fghf', '', 'ACF', '', '', '', 'Divorced', '', '', ''),
(44, '', '', '1561', '', 'ACF', '', '', '', 'Divorced', '', '', ''),
(45, 'rgdgdfg', 'dgfdgdf', 'dfgfdgdg', '2323', 'QAD', '222/3,Horana Road, Piliyandala', 'ikjhikhu', '', 'Divorced', '', '', ''),
(46, 'Spider man', 'spider', 'asasas', '6656', 'QAD', '', '546456464', '2025-07-01', 'Married', '2025-07-01', '2025-07-31', ''),
(47, 'SDA', 'Bogahawatte', 'SDA Deepal Anurudh Bogahawatte', '', 'ACF', '222/3,Horana Road, Piliyandala', '', '', 'Single', '', '', '071-9386059'),
(48, '', '', 'dfgdg', '', 'ACF', '', '', '', 'Single', '2025-07-01', '2025-07-01', ''),
(49, 'SDA', 'Bogahawatte', 'SDA Deepal Anurudh Bogahawatte', '54646', 'HR', '222/3,Horana Road, Piliyandala', '', '', 'Single', '2025-07-01', '2025-07-30', '071-9386059'),
(50, '', '', 'ddc', '', 'ACF', '', '', '2025-07-01', 'Single', '2025-07-16', '2025-07-16', ''),
(51, 'Arunajith ', 'Perera', 'R.A.A Perera', '5623', 'TSD', 'Boralesgamua', '12245245552', '1975-07-07', 'Married', '1991-01-01', '2016-01-07', '012-3152862'),
(52, 'admin', 'asdsada', 'admin', 'asdad', 'Logistics', 'asdasd', 'asdasdasd', '2025-07-01', 'Single', '2025-07-01', '2025-07-31', '071-2008827'),
(53, 'sdfdsf', 'sdfsf', 'sdfsdf', '2828', 'Drum Yard', 'sdfsdf', 'sdfsf', '', 'Single', '2025-07-13', '2025-07-24', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'user', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `grants`
--
ALTER TABLE `grants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `member_info`
--
ALTER TABLE `member_info`
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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `grants`
--
ALTER TABLE `grants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `member_info`
--
ALTER TABLE `member_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grants`
--
ALTER TABLE `grants`
  ADD CONSTRAINT `fk_grants_applicant` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_grants_member` FOREIGN KEY (`member_id`) REFERENCES `member_info` (`id`) ON DELETE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_old_logs` ON SCHEDULE EVERY 1 DAY STARTS '2025-07-14 16:04:17' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM activity_log
  WHERE created_at < NOW() - INTERVAL 90 DAY$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
