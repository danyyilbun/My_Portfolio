-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2019 at 03:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_total_qty`
--

DROP TABLE IF EXISTS `item_total_qty`;
CREATE TABLE IF NOT EXISTS `item_total_qty` (
  `item_id` int(11) NOT NULL,
  `item_color_id` tinyint(3) DEFAULT NULL,
  `item_size_id` tinyint(3) DEFAULT NULL,
  `item_total_qty_rec` int(5) NOT NULL,
  KEY `item_color_id` (`item_color_id`),
  KEY `item_size_id` (`item_size_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_total_qty`
--

INSERT INTO `item_total_qty` (`item_id`, `item_color_id`, `item_size_id`, `item_total_qty_rec`) VALUES
(1, 1, 1, 5),
(1, 2, 1, 20),
(1, 3, 1, 10),
(2, NULL, 2, 25),
(3, NULL, 3, 25),
(4, NULL, 4, 15),
(4, NULL, 5, 14),
(4, NULL, 6, 13),
(4, NULL, 7, 17),
(5, NULL, NULL, 5),
(6, NULL, NULL, 8),
(7, NULL, NULL, 8),
(8, NULL, NULL, 14),
(9, NULL, NULL, 16);

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

DROP TABLE IF EXISTS `store_categories`;
CREATE TABLE IF NOT EXISTS `store_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(50) DEFAULT NULL,
  `cat_desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `cat_title`, `cat_desc`) VALUES
(1, 'Hats', 'Funky hats in all shapes and sizes!'),
(2, 'Shirts', 'From t-shirts to sweatshirts to polo shirts and beyond'),
(3, 'Books', 'Paperback, hardback, books for school or play ');

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

DROP TABLE IF EXISTS `store_items`;
CREATE TABLE IF NOT EXISTS `store_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `item_title` varchar(75) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `item_desc` text,
  `item_image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `cat_id`, `item_title`, `item_price`, `item_desc`, `item_image`) VALUES
(1, 1, 'Baseball Hat', 12, 'Fancy, low-profile baseball hat.', 'baseballhat.jpg'),
(2, 1, 'Cowboy hat', 52, '10 gallon variety', 'cowboyhat.jpg'),
(3, 1, 'Top Hat', 102, 'good for costumes', 'tophat.jpg'),
(4, 2, 'Short-Sleeved T-Shirt', 12, '100% cotton, pre-shrunk', 'sstshirt.jpg'),
(5, 2, 'Long-Sleeved T-Shirt', 15, 'Just like the short-sleeved shirt, with longer sleeves', 'lstshirt.gif'),
(6, 2, 'Sweatshirt', 22, 'Heavy and warm', 'sweatshirt.jpg'),
(7, 3, 'Jane\\\'s Self-Help Book ', 12, 'Jane gives advice', 'selfhelpbook.gif'),
(8, 3, 'Generic Academic Book', 35, 'Some required reading for school, will put you to sleep.', 'boringbook.jpg'),
(9, 3, 'Chicago Manual of Style', 9.99, 'Good for copywriters', 'chicagostyle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_color`
--

DROP TABLE IF EXISTS `store_item_color`;
CREATE TABLE IF NOT EXISTS `store_item_color` (
  `item_id` int(11) NOT NULL,
  `item_color_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `item_color` varchar(25) NOT NULL,
  PRIMARY KEY (`item_color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_color`
--

INSERT INTO `store_item_color` (`item_id`, `item_color_id`, `item_color`) VALUES
(1, 1, 'red'),
(1, 2, 'black'),
(1, 3, 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_size`
--

DROP TABLE IF EXISTS `store_item_size`;
CREATE TABLE IF NOT EXISTS `store_item_size` (
  `item_id` int(11) NOT NULL,
  `item_size_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `item_size` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`item_size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_size`
--

INSERT INTO `store_item_size` (`item_id`, `item_size_id`, `item_size`) VALUES
(1, 1, 'One Size Fits All'),
(2, 2, 'One Size Fits All'),
(3, 3, 'One Size Fits All'),
(4, 4, 'S'),
(4, 5, 'M'),
(4, 6, 'L'),
(4, 7, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `store_orders`
--

DROP TABLE IF EXISTS `store_orders`;
CREATE TABLE IF NOT EXISTS `store_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` datetime DEFAULT NULL,
  `order_name` varchar(100) DEFAULT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `order_city` varchar(50) DEFAULT NULL,
  `order_state` varchar(20) DEFAULT NULL,
  `order_zip` varchar(10) DEFAULT NULL,
  `order_tel` varchar(25) DEFAULT NULL,
  `order_email` varchar(100) DEFAULT NULL,
  `item_total` float DEFAULT NULL,
  `shipping_total` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_orders_items`
--

DROP TABLE IF EXISTS `store_orders_items`;
CREATE TABLE IF NOT EXISTS `store_orders_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `sel_item_title` varchar(75) DEFAULT NULL,
  `sel_item_id` int(11) DEFAULT NULL,
  `sel_item_qty` smallint(6) DEFAULT NULL,
  `sel_item_size` varchar(25) DEFAULT NULL,
  `sel_item_color` varchar(25) DEFAULT NULL,
  `sel_item_price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_orders_items`
--

INSERT INTO `store_orders_items` (`id`, `order_id`, `sel_item_title`, `sel_item_id`, `sel_item_qty`, `sel_item_size`, `sel_item_color`, `sel_item_price`) VALUES
(1, 2, 'Generic Academic Book', 8, 1, ' ', ' ', 35),
(2, 2, 'Generic Academic Book', 8, 1, ' ', ' ', 35),
(3, 2, 'Generic Academic Book', 8, 1, ' ', ' ', 35),
(4, 2, 'Generic Academic Book', 8, 1, ' ', ' ', 35),
(5, 2, 'Generic Academic Book', 8, 1, ' ', ' ', 35),
(6, 2, 'Generic Academic Book', 8, 1, ' ', ' ', 35),
(7, 2, 'Cowboy hat', 2, 1, 'One Size Fits All', ' ', 52),
(8, 2, 'Cowboy hat', 2, 1, 'One Size Fits All', ' ', 52),
(9, 2, 'Cowboy hat', 2, 1, 'One Size Fits All', ' ', 52),
(10, 2, 'Cowboy hat', 2, 1, 'One Size Fits All', ' ', 52),
(11, 2, 'Cowboy hat', 2, 1, 'One Size Fits All', ' ', 52),
(12, 2, 'Cowboy hat', 2, 1, 'One Size Fits All', ' ', 52),
(13, 2, 'Cowboy hat', 2, 1, 'One Size Fits All', ' ', 52),
(14, 2, 'Cowboy hat', 2, 1, 'One Size Fits All', ' ', 52),
(15, 2, 'Cowboy hat', 2, 1, 'One Size Fits All', ' ', 52),
(16, 2, 'Baseball Hat', 1, 10, 'One Size Fits All', 'red', 12),
(17, 2, 'Baseball Hat', 1, 10, 'One Size Fits All', 'red', 12),
(18, 2, 'Generic Academic Book', 8, 1, ' ', ' ', 35),
(19, 2, 'Baseball Hat', 1, 1, 'One Size Fits All', 'black', 12),
(20, 2, 'Sweatshirt', 6, 1, ' ', ' ', 22),
(21, 2, 'Short-Sleeved T-Shirt', 4, 1, 'L', ' ', 12);

-- --------------------------------------------------------

--
-- Table structure for table `store_shoppertrack`
--

DROP TABLE IF EXISTS `store_shoppertrack`;
CREATE TABLE IF NOT EXISTS `store_shoppertrack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(32) DEFAULT NULL,
  `sel_item_id` int(11) DEFAULT NULL,
  `sel_item_qty` int(11) DEFAULT NULL,
  `sel_item_size` varchar(25) NOT NULL,
  `sel_item_color` varchar(25) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_shoppertrack`
--

INSERT INTO `store_shoppertrack` (`id`, `session_id`, `sel_item_id`, `sel_item_qty`, `sel_item_size`, `sel_item_color`, `date_added`) VALUES
(7, 'alrus4arqrm3jd602stkdv93hr', 9, 1, ' ', ' ', '2019-03-31 12:56:42'),
(8, 'alrus4arqrm3jd602stkdv93hr', 4, 1, 'L', ' ', '2019-03-31 12:56:48'),
(9, 'alrus4arqrm3jd602stkdv93hr', 2, 9, 'One Size Fits All', ' ', '2019-03-31 12:56:54'),
(10, 'alrus4arqrm3jd602stkdv93hr', 9, 1, ' ', ' ', '2019-03-31 16:39:01'),
(11, 'alrus4arqrm3jd602stkdv93hr', 1, 1, 'One Size Fits All', 'black', '2019-03-31 16:41:01'),
(12, 'alrus4arqrm3jd602stkdv93hr', 2, 1, 'One Size Fits All', ' ', '2019-03-31 16:47:40'),
(13, 'alrus4arqrm3jd602stkdv93hr', 3, 1, 'One Size Fits All', ' ', '2019-03-31 16:47:48');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_total_qty`
--
ALTER TABLE `item_total_qty`
  ADD CONSTRAINT `item_color_id` FOREIGN KEY (`item_color_id`) REFERENCES `store_item_color` (`item_color_id`),
  ADD CONSTRAINT `item_size_id` FOREIGN KEY (`item_size_id`) REFERENCES `store_item_size` (`item_size_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
