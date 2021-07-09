-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 09:08 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(50) NOT NULL,
  `password` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `password`) VALUES
('charitycampus786@gmail.com', 'Charity@2020');

-- --------------------------------------------------------

--
-- Table structure for table `donor_reg`
--

CREATE TABLE `donor_reg` (
  `Fname` varchar(100) DEFAULT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `contact` bigint(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT 0,
  `profile` varchar(250) NOT NULL,
  `donated` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_description`
--

CREATE TABLE `ngo_description` (
  `email` varchar(250) NOT NULL,
  `detail` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_details`
--

CREATE TABLE `ngo_details` (
  `email` varchar(250) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `type` varchar(250) NOT NULL,
  `contact_ngo` varchar(10) NOT NULL,
  `person_name` varchar(250) NOT NULL,
  `contact_PERSON` varchar(10) NOT NULL,
  `description` longtext NOT NULL,
  `address` mediumtext NOT NULL,
  `bank_account_no` varchar(8) NOT NULL,
  `upi_id` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `trending` tinyint(1) NOT NULL,
  `approve` tinyint(1) NOT NULL,
  `temail` varchar(50) NOT NULL DEFAULT 'example@gmail.com',
  `id1` varchar(50) NOT NULL DEFAULT 'NA',
  `id2` varchar(50) NOT NULL DEFAULT 'NA',
  `c1` bigint(10) NOT NULL DEFAULT 0,
  `c2` bigint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_docs`
--

CREATE TABLE `ngo_docs` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_files`
--

CREATE TABLE `ngo_files` (
  `id` int(25) NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_image`
--

CREATE TABLE `ngo_image` (
  `id` int(25) NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_pictures`
--

CREATE TABLE `ngo_pictures` (
  `id` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pictures` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `donor_reg`
--
ALTER TABLE `donor_reg`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `ngo_details`
--
ALTER TABLE `ngo_details`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `ngo_docs`
--
ALTER TABLE `ngo_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_files`
--
ALTER TABLE `ngo_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_image`
--
ALTER TABLE `ngo_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_pictures`
--
ALTER TABLE `ngo_pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ngo_docs`
--
ALTER TABLE `ngo_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ngo_files`
--
ALTER TABLE `ngo_files`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ngo_image`
--
ALTER TABLE `ngo_image`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ngo_pictures`
--
ALTER TABLE `ngo_pictures`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
