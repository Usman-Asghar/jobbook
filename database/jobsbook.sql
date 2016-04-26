-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2016 at 10:12 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `yh_admin`
--

CREATE TABLE `yh_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(30) NOT NULL,
  `admin_lname` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yh_admin`
--

INSERT INTO `yh_admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_password`) VALUES
(1, 'Yousaf Khan', 'Hassan', 'usafhassan@gmail.com', 'f0de0ec01c3685a69a40aae30af941fa6b3b39a357dbad8bc257dfc5670124f1');

-- --------------------------------------------------------

--
-- Table structure for table `yh_jobs`
--

CREATE TABLE `yh_jobs` (
  `job_id` bigint(20) NOT NULL,
  `job_no` varchar(15) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_desc` text NOT NULL,
  `start_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `date_entered` date NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `job_status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yh_users`
--

CREATE TABLE `yh_users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `yh_admin`
--
ALTER TABLE `yh_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `yh_jobs`
--
ALTER TABLE `yh_jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `unique_job_no` (`job_no`);

--
-- Indexes for table `yh_users`
--
ALTER TABLE `yh_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `yh_admin`
--
ALTER TABLE `yh_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yh_jobs`
--
ALTER TABLE `yh_jobs`
  MODIFY `job_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yh_users`
--
ALTER TABLE `yh_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
