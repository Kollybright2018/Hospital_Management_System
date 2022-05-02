-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 01:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile`) VALUES
(10, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'breakthrough.jpeg'),
(12, 'bosun', '827ccb0eea8a706c4c34a16891f84e7b', 'Quadri.png');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `full_name` varchar(110) NOT NULL,
  `username` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `full_name`, `username`, `email`, `gender`, `phone_no`, `country`, `password`, `salary`, `reg_date`, `status`, `profile`) VALUES
(1, 'kolade babarinde', 'kollybright', 'kolly@gmail.com', 'male', '63517799', 'Nigeria', '827ccb0eea8a706c4c34a16891f84e7b', 66, '0000-00-00', 'pending', 'kol.jpg'),
(21, 'ALLYU', 'Bright', 'Bright@gmail.com', 'male', '08035833305', 'Nigeria', '827ccb0eea8a706c4c34a16891f84e7b', 66, '2020-07-16', 'pending', 'bright.jpg'),
(22, 'johnny', 'Johnjay', 'johnjay@gmail.com', 'Select Gender', '08061291370', 'Canada', '827ccb0eea8a706c4c34a16891f84e7b', 66, '2020-07-16', 'pending', 'bright.jpg'),
(23, 'johnny', 'Johnjay', 'johnjay1@gmail.com', 'male', '08061291370', 'Nigeria', '827ccb0eea8a706c4c34a16891f84e7b', 66, '2020-07-16', 'pending', 'bright.jpg'),
(24, 'Babarinde Kolade john', 'Kollybright', 'Accorladey13@gmail.com', 'male', '07063516699', 'Nigeria', '827ccb0eea8a706c4c34a16891f84e7b', 66, '2020-07-17', 'pending', 'bright.jpg'),
(25, 'Adeoye John T', 'Johnny', 'Tunde@gmail.com', 'male', '08061563955', 'Nigeria', '827ccb0eea8a706c4c34a16891f84e7b', 66, '2020-07-17', 'pending', 'bright.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
