-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2015 at 10:36 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `user_name` varchar(64) NOT NULL,
  `add_1` text NOT NULL,
  `add_2` text,
  `city` varchar(64) NOT NULL,
  `state` varchar(5) NOT NULL,
  `zip` int(11) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`user_name`, `add_1`, `add_2`, `city`, `state`, `zip`) VALUES
('Mark', 'E 5th ST', 'E', 'Greenville', 'NC', 27858),
('varan', '1116 ', '', 'Greenville', 'NC', 27858),
('venkat', '1116 ', 'asdhk', 'Greenville', 'NC', 27858);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` varchar(32) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `size` varchar(4) NOT NULL,
  `cost` int(11) NOT NULL,
  `picture` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `active`, `name`, `type`, `gender`, `size`, `cost`, `picture`) VALUES
(1, 1, 'Arsenal', 'Home', 'Male', 'L', 99, '240633721.jpg'),
(2, 1, 'Arsenal', 'Away', 'Male', 'M', 99, '576238583.jpg'),
(3, 1, 'Manchester United', 'Home', 'Male', 'M', 85, '1185310415.jpg'),
(4, 1, 'Manchester United', 'Home', 'Female', 'S', 84, '703483560.jpg'),
(5, 1, 'Chelsea', 'Home', 'Male', 'M', 45, '386468428.jpg'),
(6, 1, 'Chelsea', 'Away', 'Female', 'M', 45, '282718803.jpg'),
(7, 1, 'Barcelona', 'Home', 'Male', 'L', 90, '232199492.jpg'),
(8, 1, 'Barcelona', 'Away', 'Male', 'M', 95, '236029321.jpg'),
(9, 1, 'Arsenal', 'Alternate', 'Male', 'L', 99, '375495324.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password_hash`, `user_email`) VALUES
(1, 'admin', 'be84af1bcb2d5360640f046669ad9368', 'admin@smh.com'),
(6, 'venkat', '411199b53051d5a9be10602e760eae78', 'venkat@gmail.com'),
(7, 'varan', '88c4c1397fe9c3a4ff28305a7fedd49f', 'varan@gmail.com'),
(8, 'Mark', 'd65ef6baa8997bc0fe9f850d01a184a1', 'mark@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
