-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 04:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$auoaA3gEd39JVLJ5J6JXwuuCs02Rqgtrq4P/6oVsnXLe5PgRYNf9i', '2020-12-11 10:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `donorlist`
--

CREATE TABLE `donorlist` (
  `id` int(11) NOT NULL,
  `FullName` varchar(20) NOT NULL,
  `Mobile` int(13) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `Descriptions` text NOT NULL,
  `User` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donorlist`
--

INSERT INTO `donorlist` (`id`, `FullName`, `Mobile`, `Email`, `BloodGroup`, `Descriptions`, `User`) VALUES
(1, 'John', 877658, 'john@example.com', 'A+', 'kfaldfkasjfklas', NULL),
(22, 'Ziyad Bin Sulfi', 2147483647, 'ziyad.zulfiker@gmail.com', 'B+', 'Lorem Ipsum', 'ziyad.zulfiker@gmail.com'),
(32, 'Afsal', 9853429, 'afsal@afsal.com', 'A+', 'lorem Ipsum', 'ziyad.zulfiker@gmail.com'),
(33, 'Jaseem', 849572957, 'jaseem@jaseem.com', 'B+', 'lorem Ipsum', 'ziyad.zulfiker@gmail.com'),
(34, 'Jinan', 318479148, 'jinan@jinan.com', 'A-', 'lorem Ipsum', 'ziyad.zulfiker@gmail.com'),
(36, 'Ziyad Bin Sulfi', 82594359, 'ziyad.zulfiker@gmail.com', 'B+', 'Puthalam, Areekode(PO), Malappuram(dist)', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'ziyad.zulfiker@gmail.com', '$2y$10$9gLYD5DMzGki9XPa9pvmn.EadhGvzs4bt3T8JLlHsRjwyQ/7eWmQ2', '2020-12-06 17:25:43'),
(2, 'admin', '$2y$10$qtghZLKugGwxAQ/b8L5qeuKztMGTvtda1cegbaBgBhc2zHRvb9iTy', '2020-12-11 10:29:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `donorlist`
--
ALTER TABLE `donorlist`
  ADD PRIMARY KEY (`id`,`FullName`,`Mobile`,`Email`,`BloodGroup`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donorlist`
--
ALTER TABLE `donorlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
