-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2015 at 01:49 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spouting`
--
CREATE DATABASE IF NOT EXISTS `spouting` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `spouting`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `products` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `keyword`, `description`, `products`, `image`) VALUES
(1, 'Pneumatic Accessories', 'CG-01', 'pneumatic-accessories', '', 5, 'a3.jpg'),
(2, 'Driving Elements', 'CG-02', 'driving-elements', '', 10, 'a3.jpg'),
(3, 'Elevator and Conveyor Spares', 'CG-03', 'elevator-and-conveyor-spares', '', 8, 'a3.jpg'),
(4, 'Knobs and Handles', 'CG-04', 'knobs-and-handles', '', 4, 'a3.jpg'),
(5, 'Perforated Sheets', 'CG-05', 'perforated-sheets', '', 6, 'a3.jpg'),
(6, 'Plantsifter Accessories', 'CG-06', 'plantsifter-accessories', '', 8, 'a3.jpg'),
(7, 'Pulse Jet Bag Filter Accessories', 'CG-07', 'pulse-jet-bag-filter-accessories', '', 3, 'a3.jpg'),
(8, 'Spouting', 'CG-08', 'spouting', '', 12, 'a3.jpg'),
(9, 'Miscellaneous', 'CG-09', 'miscellaneous', '', 6, 'a3.jpg'),
(10, 'New Category', 'CG-10', 'new-category', 'My New Category', 0, 'a3.jpg'),
(11, 'Another New Category', 'Cg-11', 'another-new-category', 'I have got no description for this category', 0, 'a3.jpg'),
(12, 'qwerty', 'CG-12', 'qwerty', 'sfsd', 0, 'a3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
  `name` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `web_address` varchar(255) NOT NULL,
  `about_mmc` text NOT NULL,
  `about_spouting` text NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fb_username` varchar(50) NOT NULL,
  `youtube_username` varchar(50) NOT NULL,
  `gplus_username` varchar(50) NOT NULL,
  `copyright` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`name`, `tagline`, `web_address`, `about_mmc`, `about_spouting`, `address`, `phone`, `email`, `fb_username`, `youtube_username`, `gplus_username`, `copyright`) VALUES
('Spouting.in', 'The Miller Store', 'http://spouting.in', 'Yoo MMC', 'Yoo Spouting', '131 INDUSTRIAL AREA II, A.B.ROAD, DEWAS (MP) - 455001', '+91-7272-401917, +91-99936-66903', 'spouting.in@gmail.com', '', '', '', '2014 M.M.CONSULTANCY PVT. LTD.');

-- --------------------------------------------------------

--
-- Table structure for table `external_links`
--

CREATE TABLE IF NOT EXISTS `external_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `external_links`
--

INSERT INTO `external_links` (`id`, `name`, `link`) VALUES
(1, 'mmconsultancy.in', 'http://mmconsultancy.in'),
(2, 'truckloader.in', 'http://truckloader.in');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE IF NOT EXISTS `preferences` (
  `theme` int(11) NOT NULL,
  KEY `theme` (`theme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`category`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `name`, `code`, `keyword`, `description`, `image`) VALUES
(1, 6, 'qwertyuiop', 'PS-01', 'dfgdf', 'description of my product', 'a3.jpg'),
(2, 9, 'Product 2', 'MISC-02', 'product-two', 'Description', 'new.jpg'),
(3, 7, 'QWERTY', 'PR-02', 'qwerty', 'fdgfdgdfgfdg', 'new.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Skin ID',
  `skin` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`sid`, `skin`, `color`) VALUES
(1, 'skin-1', 'green'),
(2, 'skin-2', 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` varchar(50) NOT NULL,
  `super_user` int(1) NOT NULL DEFAULT '0' COMMENT '0/1 for super_user access',
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `last_login`, `super_user`, `name`, `role`) VALUES
(1, 'abhas', 'abhas', '', 1, 'Abhas Mittal', 'Super User');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
