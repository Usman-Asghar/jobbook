-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2016 at 03:51 PM
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
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
`id` int(10) unsigned NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Admin', 'User', 'admin@gmail.com', '81fb0d4fcb80cfe3bb4c86919e4173f0ca3b3361657fb48223ef10a950c9db23');

-- --------------------------------------------------------

--
-- Table structure for table `yh_grades`
--

CREATE TABLE IF NOT EXISTS `yh_grades` (
`grade_id` int(11) NOT NULL,
  `grade_name` varchar(50) NOT NULL,
  `grade_color` varchar(50) DEFAULT NULL,
  `grade_status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yh_grades`
--

INSERT INTO `yh_grades` (`grade_id`, `grade_name`, `grade_color`, `grade_status`) VALUES
(2, 'Grade D', '#408080', '1'),
(3, 'Grade B', '#008000', '1'),
(4, 'Grade A', '#ff00ff', '1');

-- --------------------------------------------------------

--
-- Table structure for table `yh_jobs`
--

CREATE TABLE IF NOT EXISTS `yh_jobs` (
`job_id` bigint(20) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_desc` text NOT NULL,
  `start_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `date_entered` date NOT NULL,
  `assigned_to` tinyint(1) NOT NULL DEFAULT '0',
  `job_status` enum('0','1') NOT NULL DEFAULT '1',
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yh_jobs_files`
--

CREATE TABLE IF NOT EXISTS `yh_jobs_files` (
`id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `file_address` varchar(500) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yh_users`
--

CREATE TABLE IF NOT EXISTS `yh_users` (
`user_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL DEFAULT '0',
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `online` enum('1','0') NOT NULL DEFAULT '1',
  `profile_status` enum('0','1') NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yh_users`
--

INSERT INTO `yh_users` (`user_id`, `grade_id`, `fname`, `lname`, `email`, `password`, `avatar`, `online`, `profile_status`, `admin_id`) VALUES
(1, 2, 'Sipmle', 'User 1', 'user1@gmail.com', 'da9b1f3911a9fedd53b64bed88ea269a0d539b454891da5ba1bf7afbf55bcbe9', '', '1', '1', 1),
(2, 2, 'Simple', 'User 2', 'user2@gmail.com', '81fb0d4fcb80cfe3bb4c86919e4173f0ca3b3361657fb48223ef10a950c9db23', '', '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yh_user_to_jobs`
--

CREATE TABLE IF NOT EXISTS `yh_user_to_jobs` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_hours` int(15) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `rejected` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yh_user_to_jobs`
--

INSERT INTO `yh_user_to_jobs` (`id`, `user_id`, `job_id`, `start_date`, `end_date`, `no_of_hours`, `approved`, `rejected`) VALUES
(1, 1, 1, '2016-06-25', '2016-06-30', 60, 1, 0),
(2, 1, 2, '2016-06-01', '2016-06-30', 56, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
 ADD PRIMARY KEY (`id`), ADD KEY `to` (`to`), ADD KEY `from` (`from`);

--
-- Indexes for table `yh_admin`
--
ALTER TABLE `yh_admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `yh_grades`
--
ALTER TABLE `yh_grades`
 ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `yh_jobs`
--
ALTER TABLE `yh_jobs`
 ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `yh_jobs_files`
--
ALTER TABLE `yh_jobs_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yh_users`
--
ALTER TABLE `yh_users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `yh_user_to_jobs`
--
ALTER TABLE `yh_user_to_jobs`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yh_admin`
--
ALTER TABLE `yh_admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yh_grades`
--
ALTER TABLE `yh_grades`
MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `yh_jobs`
--
ALTER TABLE `yh_jobs`
MODIFY `job_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `yh_jobs_files`
--
ALTER TABLE `yh_jobs_files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `yh_users`
--
ALTER TABLE `yh_users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `yh_user_to_jobs`
--
ALTER TABLE `yh_user_to_jobs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
