-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2013 at 11:04 AM
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
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `name`, `parent_id`) VALUES
(1, 'Men', 0),
(2, 'Women', 0),
(3, 'Dress', 2),
(4, 'Skirts', 2),
(5, 'Shoes', 2),
(6, 'Shirts', 1),
(7, 'Trousers', 1),
(8, 'Shoes', 1),
(15, 'child_Shirts 1', 6),
(16, 'child_Shirts 3', 6),
(17, 'level 4.0', 15),
(19, 'level 4.1', 15),
(20, 'level 4.2', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE IF NOT EXISTS `tbl_color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `name`) VALUES
(1, 'black'),
(2, 'blue'),
(3, 'gray'),
(4, 'white');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_user`
--

CREATE TABLE IF NOT EXISTS `tbl_group_user` (
  `group_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`group_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_group_user`
--

INSERT INTO `tbl_group_user` (`group_user_id`, `name`) VALUES
(1, 'Super Admin'),
(3, 'Admin Category');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE IF NOT EXISTS `tbl_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`image_id`, `pro_id`, `url`) VALUES
(1, 1, 'public/images/big1.jpg'),
(2, 2, 'public/images/big2.jpg'),
(3, 3, 'public/images/big3.jpg'),
(5, 5, 'public/images/ao-khoac-nam-807015_2_.JPG'),
(6, 6, 'public/images/big2.jpg'),
(7, 7, 'public/images/82304018X_2_.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE IF NOT EXISTS `tbl_modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`module_id`, `name`) VALUES
(1, 'user'),
(2, 'category'),
(4, 'product'),
(5, 'roles');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permision`
--

CREATE TABLE IF NOT EXISTS `tbl_permision` (
  `pm_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group_user` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_permision`
--

INSERT INTO `tbl_permision` (`pm_id`, `id_group_user`, `module_id`) VALUES
(1, 1, 1),
(3, 1, 2),
(9, 1, 4),
(10, 1, 5),
(11, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `name`, `price`, `color_id`, `description`, `status`) VALUES
(1, 'Demo_Product_01', 57, 3, '<p>Demo_Product_01</p>\r\n', 0),
(2, 'Demo_Product_02', 58, 2, '<p>Demo_Product_02</p>\r\n', 0),
(3, 'Demo_Product_03', 59, 1, '<p>Demo_Product_03</p>\r\n', 0),
(5, 'Demo_Product_05', 61, 4, '<p>Demo_Product_05</p>\r\n', 0),
(6, 'Product_06', 63, 1, '<p>Product_06</p>\r\n', 0),
(7, 'search', 23, 2, '<p>search</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE IF NOT EXISTS `tbl_product_category` (
  `pro_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`pro_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`pro_cat_id`, `pro_id`, `cat_id`) VALUES
(73, 1, 6),
(74, 2, 7),
(75, 3, 3),
(77, 5, 6),
(78, 6, 6),
(79, 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `group_user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `email`, `group_user_id`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 1),
(2, 'Category', 'e10adc3949ba59abbe56e057f20f883e', 'product@gmail.com', 3),
(7, 'binhpt', 'e10adc3949ba59abbe56e057f20f883e', 'binhpt@gmail.com', 0),
(8, 'thainv', 'e10adc3949ba59abbe56e057f20f883e', 'thainv@gmail.com', 0),
(9, 'tuhn', 'e10adc3949ba59abbe56e057f20f883e', 'tuhn@gmail.com', 0),
(10, 'demo', 'e10adc3949ba59abbe56e057f20f883e', 'demo@demo.com', 3),
(11, 'role_test', 'e10adc3949ba59abbe56e057f20f883e', 'role@gmail.com', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
