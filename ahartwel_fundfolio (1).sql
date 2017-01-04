-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2017 at 10:28 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahartwel_fundfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `campaignid` int(10) NOT NULL,
  `campaignname` varchar(50) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `campaignimage` varchar(500) DEFAULT NULL,
  `amount` int(10) NOT NULL,
  `days` int(10) NOT NULL,
  `total_backers` int(10) NOT NULL,
  `isfunded` tinyint(1) NOT NULL,
  `categoryid` int(11) NOT NULL COMMENT 'multiple category id''s',
  `latitude` decimal(50,0) DEFAULT NULL,
  `longitude` decimal(50,0) DEFAULT NULL,
  `loginid` int(10) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`campaignid`, `campaignname`, `description`, `campaignimage`, `amount`, `days`, `total_backers`, `isfunded`, `categoryid`, `latitude`, `longitude`, `loginid`, `c_date`, `u_date`) VALUES
(1, 'test', 'test dec dddkkd  ', 'website_wireframe.png', 1000, 20, 25, 0, 5, NULL, NULL, 1, '2016-12-27 15:44:26', '0000-00-00 00:00:00'),
(2, 'test 2', 'test dec 2', 'website_wireframe.png', 500, 15, 20, 0, 2, NULL, NULL, 2, '2016-12-29 19:42:35', '0000-00-00 00:00:00'),
(3, 'test 3', 'test test 3', 'website_wireframe.png', 1500, 25, 10, 0, 5, NULL, NULL, 3, '2016-12-29 19:42:35', '0000-00-00 00:00:00'),
(4, 'test 4', 'test dec 4', 'website_wireframe.png', 3000, 40, 100, 0, 3, NULL, NULL, 4, '2016-12-29 20:00:39', '0000-00-00 00:00:00'),
(5, 'test 5', 'test dec 5', 'website_wireframe.png', 2000, 35, 100, 0, 3, NULL, NULL, 5, '2016-12-29 20:00:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(3) NOT NULL,
  `categorytype` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categorytype`) VALUES
(1, 'Arts'),
(2, 'Charity'),
(3, 'Dance'),
(4, 'Philanthropy'),
(5, 'Service'),
(6, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `giftid` int(10) NOT NULL,
  `campaignid` int(10) NOT NULL,
  `loginid` int(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`giftid`, `campaignid`, `loginid`, `amount`) VALUES
(1, 1, 2, 100),
(2, 2, 2, 50),
(3, 1, 3, 100),
(4, 2, 3, 100),
(5, 1, 4, 100),
(6, 2, 4, 200);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginid` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `socialid` varchar(500) NOT NULL COMMENT 'For facebook or google plus authentication id',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `popularity`
--

CREATE TABLE `popularity` (
  `campaignid` int(10) NOT NULL,
  `viewcount` int(10) DEFAULT NULL,
  `totaluserdonatedcount` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `profilepic` varchar(500) DEFAULT NULL COMMENT 'path of image',
  `socialid` varchar(100) NOT NULL,
  `location_latitude` decimal(50,0) DEFAULT NULL,
  `location_longitude` decimal(50,0) DEFAULT NULL,
  `interested_category` varchar(100) NOT NULL COMMENT 'have multiple category id''s like "1$2$3$" which indicates i am interested in category id 1, 2, 3',
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `email`, `name`, `password`, `profilepic`, `socialid`, `location_latitude`, `location_longitude`, `interested_category`, `c_date`) VALUES
(1, 'admin@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', '', '', NULL, NULL, '', '2017-01-02 20:59:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaignid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`giftid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaignid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `giftid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginid` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
