-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 10, 2014 at 03:32 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `quaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `inventories_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `user` varchar(16) NOT NULL,
  `reason` text NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `inventories_id` (`inventories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exports`
--

INSERT INTO `exports` (`id`, `inventories_id`, `date`, `quantity`, `user`, `reason`, `created_time`, `updated_time`) VALUES
(2, 10, '2014-10-22', 123, 'Joe', 'Test', '2014-08-10 21:25:24', '2014-08-10 13:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `inventories_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `inventories_id` (`inventories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `products_id` int(10) unsigned NOT NULL,
  `exp` varchar(16) NOT NULL COMMENT 'expire-date',
  `quantity` int(10) unsigned NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `products_id` (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `products_id`, `exp`, `quantity`, `created_time`, `updated_time`) VALUES
(10, 2, 'E2014-10-22-1', 123, '2014-08-10 21:02:28', '2014-08-10 13:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(32) NOT NULL,
  `lot_no` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `spec` varchar(256) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `group`, `lot_no`, `name`, `spec`, `created_time`, `updated_time`) VALUES
(2, 'G', '#123', 'NA', '123cm', '2014-08-10 20:09:14', '2014-08-10 12:09:14'),
(3, 'G', '#123', 'NA', '123cm', '2014-08-10 20:10:44', '2014-08-10 12:10:44');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exports`
--
ALTER TABLE `exports`
  ADD CONSTRAINT `fk_inventories_id_export` FOREIGN KEY (`inventories_id`) REFERENCES `inventories` (`id`);

--
-- Constraints for table `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `fk_inventories_id_import` FOREIGN KEY (`inventories_id`) REFERENCES `inventories` (`id`);

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `fk_products_id` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

