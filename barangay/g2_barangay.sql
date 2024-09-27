-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 02:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g2_barangay`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `resident_name` varchar(100) NOT NULL,
  `certificate_type` varchar(100) NOT NULL,
  `date_issued` date NOT NULL,
  `valid_until` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `resident_name`, `certificate_type`, `date_issued`, `valid_until`) VALUES
(1, 'Russel Mendez Giducos', 'Barangay', '2024-09-01', '2024-09-30'),
(3, 'Fuwa Moco Abyssguard', 'Barangay', '2001-01-21', '2002-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `clearances`
--

CREATE TABLE `clearances` (
  `id` int(11) NOT NULL,
  `resident_name` varchar(100) NOT NULL,
  `clearance_type` varchar(100) NOT NULL,
  `date_issued` date NOT NULL,
  `valid_until` date NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clearances`
--

INSERT INTO `clearances` (`id`, `resident_name`, `clearance_type`, `date_issued`, `valid_until`, `status`) VALUES
(1, 'Russel Mendez Giducos', 'barangay', '2024-09-01', '2024-09-30', 'Inactive'),
(2, 'John Mococo test', 'Barangay', '2024-09-23', '2024-09-28', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `community_tax`
--

CREATE TABLE `community_tax` (
  `id` int(11) NOT NULL,
  `resident_name` varchar(100) NOT NULL,
  `tax_year` year(4) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_paid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_tax`
--

INSERT INTO `community_tax` (`id`, `resident_name`, `tax_year`, `amount`, `date_paid`) VALUES
(3, 'Fuwa Moco Abyssguard', '2010', 1000.00, '2024-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `com_id` int(11) NOT NULL,
  `resident_name` varchar(100) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_filled` datetime DEFAULT current_timestamp(),
  `status` enum('Pending','Completed') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`com_id`, `resident_name`, `complaint_type`, `description`, `date_filled`, `status`) VALUES
(4, 'John Mococo test', 'VAMC111', '111', '2024-09-21 10:26:12', 'Pending'),
(5, 'Russel Mendez Giducos', 'Rssss', 'aadada', '2024-09-21 11:01:02', 'Pending'),
(7, 'Diohane Dio Hane', 'VAMCN', 'Oh Yes', '2024-09-25 11:36:01', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `birth_date` date NOT NULL,
  `position` varchar(100) NOT NULL,
  `term_start` date NOT NULL,
  `term_end` date NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `name`, `birth_date`, `position`, `term_start`, `term_end`, `photo`) VALUES
(2, 'Russel Giducos', '2005-04-21', 'Captain', '2024-09-23', '2024-10-12', 'uploads/illust_84588354_20230210_120758.jpg'),
(3, 'Diohane Mujemulta', '1860-04-04', 'Tao', '2004-04-04', '2005-05-05', 'uploads/illust_76766584_20230220_094602.png'),
(4, 'Keith Otilano', '2005-04-22', 'Kagawad', '2024-09-25', '2024-10-12', 'uploads/illust_89504775_20230621_152125.jpg'),
(5, 'Amir Ramac', '2003-01-02', 'Halimaw', '2024-09-25', '2024-10-12', 'uploads/illust_122303091_20240917_112510.png');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `nick_name` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL,
  `civil_status` varchar(30) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `religion` varchar(30) DEFAULT NULL,
  `lot` varchar(20) DEFAULT NULL,
  `purok` varchar(20) DEFAULT NULL,
  `resident_status` varchar(20) DEFAULT NULL,
  `voter_status` varchar(10) DEFAULT NULL,
  `PWD` tinyint(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `first_name`, `middle_name`, `last_name`, `nick_name`, `gender`, `birth_date`, `place_of_birth`, `civil_status`, `occupation`, `religion`, `lot`, `purok`, `resident_status`, `voter_status`, `PWD`, `email`, `phone_number`, `telephone`, `photo_path`) VALUES
(9, 'Diohane', 'Amobt', 'Mujuemulta', 'Dio', 'Male', '2020-01-21', 'Hostipal', 'Single', 'Student', 'Catholic', '5', '6', 'Temporary', '1', 1, 'test@example.com', '09123456789', '0912345678', 'uploads/illust_76766584_20230220_094602.png'),
(13, 'Diohane', 'Dio', 'Hane', 'Dio', 'Female', '1886-04-21', 'Hospital', 'Single', 'Student sa SEAIT', 'Amen', '5', '6', 'Permanent', '1', 1, 'ryssekFB@gmail.com', '122313131313113132', '09123456789', 'uploads/illust_122303091_20240917_112510.png'),
(15, 'Fuwawa', 'Mococo', 'Abyssguard', 'BauBau', 'Female', '1780-01-01', 'Japan', 'Single', 'Vtuber', 'Amen', '5', '5', 'Permanent', '1', 0, 'test@example.com', '09123456789', '09987654321', 'uploads/illust_112677186_20240917_111945.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'test', '$2y$10$jJDjkJz6Mv2aQhaAmVWcJO6dehax9SgQuxiDLx4pkr2KfT.hIE9HS'),
(3, 'Ryssek', '$2y$10$ci7/NK3tVmO3q0R/04XzvuRZxwzhi6FyIhKAwdRe4iSvlF.NFqakq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearances`
--
ALTER TABLE `clearances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_tax`
--
ALTER TABLE `community_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clearances`
--
ALTER TABLE `clearances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `community_tax`
--
ALTER TABLE `community_tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
