-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 04:48 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legacyyounity`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_information`
--

CREATE TABLE `article_information` (
  `ID` int(10) NOT NULL,
  `articleid` varchar(50) NOT NULL,
  `accountname` varchar(50) NOT NULL,
  `writter_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `title` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `subdate` text NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `wordcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_information`
--

CREATE TABLE `employee_information` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ic` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` text NOT NULL,
  `gender` text NOT NULL,
  `dob` text NOT NULL,
  `regdate` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `picture` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager_information`
--

CREATE TABLE `manager_information` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ic` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` text NOT NULL,
  `gender` text NOT NULL,
  `dob` text NOT NULL,
  `regdate` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `picture` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_information`
--
ALTER TABLE `article_information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee_information`
--
ALTER TABLE `employee_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager_information`
--
ALTER TABLE `manager_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_information`
--
ALTER TABLE `article_information`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_information`
--
ALTER TABLE `employee_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager_information`
--
ALTER TABLE `manager_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
