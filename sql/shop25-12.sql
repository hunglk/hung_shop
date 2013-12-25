-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2013 at 04:26 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE IF NOT EXISTS `shop_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `cat_id` (`cat_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`cat_id`, `name`, `parent_id`) VALUES
(1, 'Men', 0),
(2, 'Women', 0),
(4, 'Skirts', 2),
(5, 'Shoes', 2),
(6, 'Shirts', 1),
(7, 'Trousers', 1),
(8, 'Shoes', 1),
(15, 'child_Shirts 1', 6),
(16, 'child_Shirts 3', 6),
(17, 'level44', 15),
(19, 'level 4.3', 15),
(20, 'level 4.2', 16),
(25, 'test_delet', 2),
(26, '<b> kiki </b>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_color`
--

CREATE TABLE IF NOT EXISTS `shop_color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`color_id`),
  KEY `color_id` (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `shop_color`
--

INSERT INTO `shop_color` (`color_id`, `name`) VALUES
(1, 'black'),
(2, 'blue'),
(3, 'gray'),
(4, 'white'),
(5, '<b> kiki </b>');

-- --------------------------------------------------------

--
-- Table structure for table `shop_group_user`
--

CREATE TABLE IF NOT EXISTS `shop_group_user` (
  `group_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`group_user_id`),
  KEY `group_user_id` (`group_user_id`)
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
  KEY `pro_id` (`pro_id`),
  KEY `image_id` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `shop_image`
--

INSERT INTO `shop_image` (`image_id`, `pro_id`, `url`) VALUES
(1, 1, 'public/images/big1.jpg'),
(2, 2, 'public/images/big2.jpg'),
(3, 3, 'public/images/big3.jpg'),
(5, 5, 'public/images/ao-khoac-nam-807015_2_.JPG'),
(6, 6, 'public/images/big2.jpg'),
(7, 7, 'public/images/82304018X_2_.JPG'),
(9, 9, 'public/images/Koala.jpg'),
(16, 16, 'public/images/Hydrangeas.jpg'),
(17, 17, 'public/images/Lighthouse.jpg'),
(18, 18, 'public/images/Penguins.jpg'),
(19, 10, 'public/images/Tulips.jpg');

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
  `id_group_user` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `shop_permision`
--

INSERT INTO `shop_permision` (`pm_id`, `id_group_user`, `module_id`) VALUES
(1, 1, 1),
(3, 1, 2),
(9, 1, 4),
(10, 1, 5),
(11, 3, 2),
(15, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product`
--

CREATE TABLE IF NOT EXISTS `shop_product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `color_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `shop_product`
--

INSERT INTO `shop_product` (`pro_id`, `name`, `price`, `color_id`, `description`, `status`) VALUES
(1, 'Demo_Product_01', '57.00', 3, '<p>Demo_Product_01</p>\r\n', 0),
(2, 'Demo_Product_02', '58.00', 2, '<p>Demo_Product_02</p>\r\n', 0),
(3, 'Demo_Product_03', '59.00', 1, '<p>Demo_Product_03</p>\r\n', 0),
(5, 'Demo_Product_05', '61.00', 4, '<p>Demo_Product_05</p>\r\n', 1),
(6, 'Product_06', '63.00', 1, '<p>Product_06</p>', 0),
(7, 'search', '23.00', 2, '<p>search</p>\r\n', 1),
(9, 'demo', '12.00', 2, '<p>demo</p>\r\n', 1),
(10, '<b> kiki </b>', '33.00', 1, '<p>dsdskk</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_product_category`
--

CREATE TABLE IF NOT EXISTS `shop_product_category` (
  `pro_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`pro_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `shop_product_category`
--

INSERT INTO `shop_product_category` (`pro_cat_id`, `pro_id`, `cat_id`) VALUES
(73, 1, 6),
(74, 2, 7),
(77, 5, 6),
(79, 7, 6),
(80, 8, 7),
(81, 9, 17),
(82, 9, 19),
(93, 11, 17),
(94, 11, 19),
(95, 12, 17),
(96, 12, 19),
(100, 10, 15),
(101, 10, 25);

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
  UNIQUE KEY `email_2` (`email`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`),
  KEY `email_3` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `shop_user`
--

INSERT INTO `shop_user` (`user_id`, `username`, `password`, `email`, `group_user_id`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 1),
(2, 'Category', 'e10adc3949ba59abbe56e057f20f883e', 'product@gmail.com', 3),
(7, 'binhpt', 'e10adc3949ba59abbe56e057f20f883e', 'binhpt@gmail.com', 0),
(8, 'thainv', 'e10adc3949ba59abbe56e057f20f883e', 'thainv@gmail.com', 0),
(9, 'tuhn', 'e10adc3949ba59abbe56e057f20f883e', 'tuhn@gmail.com', 0),
(11, 'role_test', 'e10adc3949ba59abbe56e057f20f883e', 'role@gmail.com', 3),
(15, 'demama', 'e10adc3949ba59abbe56e057f20f883e', 'demo@demo.com', 0),
(17, 'diuuu', 'e10adc3949ba59abbe56e057f20f883e', 'diudiu@diu.com', 3),
(18, '<b> kichi </b>', 'e10adc3949ba59abbe56e057f20f883e', 'kiki@gmail.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
