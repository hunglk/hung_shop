-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2014 at 10:26 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE IF NOT EXISTS `shop_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`cat_id`, `name`, `parent_id`) VALUES
(33, 'demama', 0),
(34, 'demo', 33),
(35, 'tata', 33),
(37, 'Women', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_color`
--

CREATE TABLE IF NOT EXISTS `shop_color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shop_color`
--

INSERT INTO `shop_color` (`color_id`, `name`) VALUES
(1, 'black'),
(2, 'blue'),
(3, 'gray'),
(4, 'white');

-- --------------------------------------------------------

--
-- Table structure for table `shop_group_user`
--

CREATE TABLE IF NOT EXISTS `shop_group_user` (
  `group_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`group_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shop_group_user`
--

INSERT INTO `shop_group_user` (`group_user_id`, `name`) VALUES
(1, 'Super Admin'),
(3, 'Admin Category');

-- --------------------------------------------------------

--
-- Table structure for table `shop_image`
--

CREATE TABLE IF NOT EXISTS `shop_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `shop_image`
--

INSERT INTO `shop_image` (`image_id`, `pro_id`, `url`) VALUES
(1, 1, 'public/images/big1.jpg'),
(3, 3, 'public/images/big3.jpg'),
(5, 5, 'public/images/ao-khoac-nam-807015_2_.JPG'),
(7, 7, 'public/images/82304018X_2_.JPG'),
(33, 25, 'public/images/Hydrangeas.jpg'),
(44, 26, 'public/images/coffee.jpg'),
(45, 27, 'public/images/features.jpg'),
(46, 28, 'public/images/overflow.jpg'),
(47, 29, 'public/images/captions.jpg'),
(48, 30, 'public/images/1512552_578118368933977_1977249423_n.jpg'),
(49, 31, 'public/images/Chrysanthemum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shop_module`
--

CREATE TABLE IF NOT EXISTS `shop_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `shop_module`
--

INSERT INTO `shop_module` (`module_id`, `name`) VALUES
(1, 'user'),
(2, 'category'),
(4, 'product'),
(5, 'roles'),
(6, 'color');

-- --------------------------------------------------------

--
-- Table structure for table `shop_permision`
--

CREATE TABLE IF NOT EXISTS `shop_permision` (
  `pm_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `shop_permision`
--

INSERT INTO `shop_permision` (`pm_id`, `group_user_id`, `module_id`) VALUES
(1, 1, 1),
(3, 1, 2),
(9, 1, 4),
(10, 1, 5),
(15, 1, 6),
(21, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product`
--

CREATE TABLE IF NOT EXISTS `shop_product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `selected_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `color_id` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `selected_id` (`selected_id`),
  KEY `color_id` (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `shop_product`
--

INSERT INTO `shop_product` (`pro_id`, `selected_id`, `name`, `price`, `color_id`, `description`) VALUES
(1, 0, 'Demo_Product_01', '57.00', 1, '<p>Demo_Product_01</p>'),
(3, 0, 'Demo_Product_03', '59.00', 1, '<p>Demo_Product_03</p>'),
(5, 0, 'Demo_Product_05', '61.33', 2, '<p>Demo_Product_05</p>'),
(25, 0, 'dad', '323.00', 2, '<p>add</p>'),
(26, 1, 'coffee', '150.00', 2, '<p>d&acirc;d</p>'),
(27, 2, 'features', '99.00', 2, '<p>ffdad</p>'),
(28, 3, 'overflow', '86.00', 2, '<p>fdgdg</p>'),
(29, 4, 'captions', '66.00', 1, '<p>captions</p>'),
(30, 0, 'demo', '321.00', 1, '<p>demo</p>'),
(31, 0, 'fdsfsf', '200.00', 3, '<p>fsfs</p>');

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_category`
--

CREATE TABLE IF NOT EXISTS `shop_product_category` (
  `pro_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`pro_cat_id`),
  KEY `pro_id` (`pro_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=186 ;

--
-- Dumping data for table `shop_product_category`
--

INSERT INTO `shop_product_category` (`pro_cat_id`, `pro_id`, `cat_id`) VALUES
(166, 30, 34),
(172, 29, 34),
(176, 28, 34),
(177, 27, 34),
(178, 26, 34),
(179, 25, 34),
(180, 5, 34),
(181, 3, 35),
(182, 1, 35),
(185, 31, 33);

-- --------------------------------------------------------

--
-- Table structure for table `shop_user`
--

CREATE TABLE IF NOT EXISTS `shop_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `group_user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `shop_user`
--

INSERT INTO `shop_user` (`user_id`, `username`, `password`, `email`, `group_user_id`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 1),
(2, 'Category', 'e10adc3949ba59abbe56e057f20f883e', 'product@gmail.com', 3),
(7, 'binhpt', 'e10adc3949ba59abbe56e057f20f883e', 'binhpt@gmail.com', 0),
(8, 'thainv', 'e10adc3949ba59abbe56e057f20f883e', 'thainv@gmail.com', 0),
(11, 'role_test', 'e10adc3949ba59abbe56e057f20f883e', 'role@gmail.com', 3),
(15, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@demo.com', 3),
(18, '<b> kichi </b>', 'e10adc3949ba59abbe56e057f20f883e', 'kiki@gmail.com', 3),
(24, 'dema', 'a09e4da82336680af1e258083b1dea79', 'demama@gmail.com', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
