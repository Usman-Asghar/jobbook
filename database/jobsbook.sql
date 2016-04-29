-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2016 at 10:16 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobsbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `yh_admin`
--

CREATE TABLE IF NOT EXISTS `yh_admin` (
`admin_id` int(11) NOT NULL,
  `admin_fname` varchar(30) NOT NULL,
  `admin_lname` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yh_admin`
--

INSERT INTO `yh_admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_password`) VALUES
(1, 'Yousaf Khan', 'Hassan', 'usafhassan@gmail.com', '81fb0d4fcb80cfe3bb4c86919e4173f0ca3b3361657fb48223ef10a950c9db23');

-- --------------------------------------------------------

--
-- Table structure for table `yh_jobs`
--

CREATE TABLE IF NOT EXISTS `yh_jobs` (
`job_id` bigint(20) NOT NULL,
  `job_no` varchar(15) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_desc` text NOT NULL,
  `start_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `date_entered` date NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `job_status` enum('0','1') NOT NULL DEFAULT '1',
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yh_jobs`
--

INSERT INTO `yh_jobs` (`job_id`, `job_no`, `job_title`, `job_desc`, `start_date`, `deadline_date`, `date_entered`, `assigned_to`, `job_status`, `admin_id`) VALUES
(1, 'job1', 'Web', 'web development', '2016-04-01', '2016-04-02', '2016-04-23', 1, '1', 1),
(2, 'job2', 'Web2', 'asjlajs;l;lasd;lkl;asd', '2016-04-03', '2016-04-08', '2016-04-23', 1, '1', 1),
(3, 'job3', 'New Added', 'sabjkhdnsk.na..dsma', '2016-04-21', '2016-04-30', '2016-04-25', 1, '1', 1),
(4, 'job4', 'adsasdasdsadsadsa', 'sdsadsadsadsadsadsa', '2016-04-01', '2016-04-30', '2016-04-27', 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yh_users`
--

CREATE TABLE IF NOT EXISTS `yh_users` (
`user_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_status` enum('0','1') NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yh_users`
--

INSERT INTO `yh_users` (`user_id`, `fname`, `lname`, `email`, `password`, `profile_status`, `admin_id`) VALUES
(1, 'usman', 'asghar', 'usman@gmail.com', '81fb0d4fcb80cfe3bb4c86919e4173f0ca3b3361657fb48223ef10a950c9db23', '1', 1);

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
 ADD PRIMARY KEY (`job_id`), ADD UNIQUE KEY `unique_job_no` (`job_no`);

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
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yh_jobs`
--
ALTER TABLE `yh_jobs`
MODIFY `job_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `yh_users`
--
ALTER TABLE `yh_users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
