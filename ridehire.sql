-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2018 at 09:37 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ridehire`
--

-- --------------------------------------------------------

--
-- Table structure for table `hire_table`
--

CREATE TABLE IF NOT EXISTS `hire_table` (
  `hire_id` int(10) NOT NULL AUTO_INCREMENT,
  `rent_id` int(10) NOT NULL,
  `pass_id` int(10) NOT NULL,
  `seats_booked` int(10) NOT NULL,
  PRIMARY KEY (`hire_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hire_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `rent_table`
--

CREATE TABLE IF NOT EXISTS `rent_table` (
  `rent_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `originLocation` varchar(50) NOT NULL,
  `destinationLocation` varchar(50) NOT NULL,
  `leaveTime` varchar(50) NOT NULL,
  `seatsAvailable` int(10) NOT NULL,
  PRIMARY KEY (`rent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rent_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
