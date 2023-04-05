-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 01:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuitionplatform`
--

-- --------------------------------------------------------

--
-- Table structure for table `tuition request`
--

CREATE TABLE `tuition request` (
  `id` int(11) NOT NULL,
  `parent name` varchar(747) NOT NULL,
  `student name` varchar(747) NOT NULL,
  `student class` varchar(50) NOT NULL,
  `student subjects` varchar(1000) NOT NULL,
  `teaching location` varchar(747) NOT NULL,
  `additional notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tuition request`
--

INSERT INTO `tuition request` (`id`, `parent name`, `student name`, `student class`, `student subjects`, `teaching location`, `additional notes`) VALUES
(56, 'Samiran C', 'Ikkhon', 'Class 11', 'Mathematics', 'Bashundhara RA', 'tutor must be from BUET'),
(66, 'Rokeya', 'Abrar', 'Class 5', 'history', 'badda', 'tutor must be a graduate from any university'),
(68, 'Lutfur', 'Ehsan m', 'Class 12', 'Statistics 1', 'Mirpur', 'Female tutor'),
(70, 'Farid', 'Fahim', 'A levels', 'Further maths', 'Nurer chala', 'need a teacher from DU');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(747) NOT NULL,
  `email` varchar(320) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `user_type`, `password`) VALUES
(1, 'ixion chowdhury', 'ixionchowdhury@gmail.com', '+8801771064027', 'manager', 'pass123'),
(4, 'Rokeya Begum', 'rokeya@gmail.com', '+8801969696969', 'parent', 'pass123'),
(5, 'Muaz', 'roymustang@gmail.com', '+8801311039023', 'tutor', 'pass123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tuition request`
--
ALTER TABLE `tuition request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tuition request`
--
ALTER TABLE `tuition request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
