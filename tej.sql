-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2015 at 04:25 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tej`
--

-- --------------------------------------------------------

--
-- Table structure for table `apikey`
--

CREATE TABLE IF NOT EXISTS `apikey` (
  `api_key` varchar(20) NOT NULL,
  PRIMARY KEY (`api_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='apikeys';

--
-- Dumping data for table `apikey`
--

INSERT INTO `apikey` (`api_key`) VALUES
('tejpratap');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bankid` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `balance` varchar(20) NOT NULL,
  `lastupdate` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cardpin` varchar(16) NOT NULL,
  `expiry` varchar(8) NOT NULL,
  `cvv` int(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bankid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bankid`, `username`, `name`, `balance`, `lastupdate`, `email`, `cardpin`, `expiry`, `cvv`, `timestamp`) VALUES
('123456789', '', 'Tej Pratap', '677117', '03-05-15 18:10:57', 'tejpratap36@gmail.co', '', '', 0, '0000-00-00 00:00:00'),
('1235468562', '', 'Tej Pratap', '0', '31-01-15 19:15:45', 'tejpratap36@gmail.co', '', '', 0, '0000-00-00 00:00:00'),
('152364485', '', 'Tej Pratap Singh', '0', '09-12-14 14:10:52', 'tps@xyz.com', '', '', 0, '0000-00-00 00:00:00'),
('1572962589', '', 'Shubham', '0', '18-03-15 06:24:22', 'shubham@gmail.com', '', '', 0, '0000-00-00 00:00:00'),
('7536925174', '', 'tej', '10000', '23-10-14 14:52:31', 'tejpratap36@gmail.co', '', '', 0, '0000-00-00 00:00:00'),
('987654321', '', 'Tej', '89500', '22-11-14 20:41:46', 'tejpratap66@gmail.co', '', '', 0, '0000-00-00 00:00:00'),
('asd', '', 'asd', '0', '10-12-14 16:28:47', 'asd', '', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `username` varchar(50) NOT NULL,
  `items` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`username`, `items`, `timestamp`) VALUES
('tejpratapsingh', '<id>123456789</id><name>Moto E(White)</name><cost>6299</cost><quantity>1</quantity><id>7</id><name>Apple iPhone 5S (Silver, with 16 GB)</name><cost>41985</cost><quantity>1</quantity>', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `code` varchar(30) NOT NULL,
  `items` text NOT NULL,
  `percentage` int(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`code`, `items`, `percentage`, `timestamp`) VALUES
('dd10', '1,123456789,194,195,5,6,7', 10, '0000-00-00 00:00:00'),
('dd20', '1,194,5,6,7', 20, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `bankid` varchar(20) NOT NULL,
  `gcmid` text NOT NULL,
  `listid` varchar(10) NOT NULL,
  `purchase` int(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`),
  UNIQUE KEY `bankid` (`bankid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `email`, `username`, `password`, `bankid`, `gcmid`, `listid`, `purchase`, `timestamp`) VALUES
('asd', 'asd', 'asd', 'asd', 'asd', '', '', 0, '0000-00-00 00:00:00'),
('Shubham', 'shubham@gmail.com', 'Shubham', '123456789', '1572962589', '', '152346993', 0, '0000-00-00 00:00:00'),
('Tej Pratap', 'tejpratap36@gmail.com', 'tejpr', '9860637720', '1235468562', '', '', 0, '0000-00-00 00:00:00'),
('Tej Pratap Singh', 'tps@xyz.com', 'tejpratap', '9860637720', '152364485', '', '', 0, '0000-00-00 00:00:00'),
('Tej Pratap', 'tejpratap36@gmail.com', 'tejpratapsingh', '9860637720', '123456789', '', '152346990', 0, '0000-00-00 00:00:00'),
('Tej', 'tejpratap66@gmail.co', 'tps', '9860637720', '987654321', '', '152346950', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE IF NOT EXISTS `featured` (
  `index` int(50) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  `imageurl` varchar(5000) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`index`, `code`, `imageurl`, `description`, `timestamp`) VALUES
(1, 'dd10', 'images/featured/20141031_184534_730x300_image_730_300_2.jpg', '1', '0000-00-00 00:00:00'),
(2, 'dd20', 'images/featured/20141027_112312_730x300_clp.jpg', '2', '0000-00-00 00:00:00'),
(3, 'dd30', 'images/featured/20141103_135835_nerolac_clp.jpg', '3', '0000-00-00 00:00:00'),
(4, 'dd40', 'images/featured/20141031_200226_taxi4sure_300x700.jpg', '4', '0000-00-00 00:00:00'),
(5, 'dd50', 'images/featured/20141103_125527_730x300_big_screen_small_price.jpg', '5', '0000-00-00 00:00:00'),
(6, 'dd60', 'images/featured/20141104_123954_730x300_1_2.jpg', '6', '0000-00-00 00:00:00'),
(7, 'dd70', 'images/featured/20140902_160713_730x300_category_landing_page.jpg', '7', '0000-00-00 00:00:00'),
(8, 'dd80', 'images/featured/20141103_195008_730x300_image_730_300_14.jpg', '8', '0000-00-00 00:00:00'),
(9, 'dd90', 'images/featured/20141104_115704_eveready_clp.jpg', '9', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE IF NOT EXISTS `lists` (
  `listid` int(10) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(30) NOT NULL,
  `items` varchar(50000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`listid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152346995 ;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`listid`, `customerid`, `items`, `timestamp`) VALUES
(152346948, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346949, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346950, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346954, 'tejpratapsingh', '<id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>6</id><name>HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)</name><quantity>1</quantity><cost>28290</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346958, 'tejpratapsingh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>7</id><name>Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>6</id><name>HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)</name><quantity>1</quantity><cost>28290</cost>', '0000-00-00 00:00:00'),
(152346967, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346968, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346969, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346970, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346971, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346972, 'tejpratapsingh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>7</id><name>Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>6</id><name>HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)</name><quantity>1</quantity><cost>28290</cost>', '0000-00-00 00:00:00'),
(152346973, 'tejpratapsingh', '<id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>6</id><name>HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)</name><quantity>1</quantity><cost>28290</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346974, 'tejpratapsingh', '<id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>6</id><name>HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)</name><quantity>1</quantity><cost>28290</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346975, 'tejpratapsingh', '<id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>6</id><name>HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)</name><quantity>1</quantity><cost>28290</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346976, 'tejpratapsingh', '<id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>6</id><name>HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)</name><quantity>1</quantity><cost>28290</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346977, 'tejpratapsingh', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346978, 'tejpratapsingh', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346982, 'tejpratapsingh', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346987, 'tps', '<id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost>', '0000-00-00 00:00:00'),
(152346988, 'tps', '<id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost>', '0000-00-00 00:00:00'),
(152346989, 'tejpratapsingh', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>', '0000-00-00 00:00:00'),
(152346990, 'tejpratapsingh', '<id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost>', '0000-00-00 00:00:00'),
(152346992, 'tejpratapsingh', '<id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><cost>17999</cost><quantity>4</quantity><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><cost>17999</cost><quantity>2</quantity>', '0000-00-00 00:00:00'),
(152346993, 'Shubham', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>1523645</id><name>Samsung 40H5500 102 cm (40) LED TV</name><quantity>1</quantity><cost>49999</cost>', '0000-00-00 00:00:00'),
(152346994, 'tejpratapsingh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>1523645</id><name>Samsung 40H5500 102 cm (40) LED TV</name><quantity>1</quantity><cost>49999</cost>', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `code` varchar(50) NOT NULL,
  `latlong` varchar(50) NOT NULL,
  `pixelloc` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`code`, `latlong`, `pixelloc`, `timestamp`) VALUES
('1', '163,41', '1160,242', '0000-00-00 00:00:00'),
('10', '134,44', '954,220', '0000-00-00 00:00:00'),
('2', '153,44', '1090,220', '0000-00-00 00:00:00'),
('3', '158,27', '1125,340', '0000-00-00 00:00:00'),
('4', '150,44', '1068,220', '0000-00-00 00:00:00'),
('5', '157,36', '1118,277', '0000-00-00 00:00:00'),
('6', '145,44', '1032,220', '0000-00-00 00:00:00'),
('7', '154,36', '1096,277', '0000-00-00 00:00:00'),
('8', '139,44', '990,220', '0000-00-00 00:00:00'),
('9', '148,36', '1054,277', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `loyalty`
--

CREATE TABLE IF NOT EXISTS `loyalty` (
  `username` varchar(100) NOT NULL,
  `total_purchases` varchar(10) NOT NULL DEFAULT '0',
  `total_ammount` varchar(100) NOT NULL DEFAULT '0',
  `points` varchar(10) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`username`, `password`, `last_login`, `timestamp`) VALUES
('admin', 'admin', '', '2015-05-04 15:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE IF NOT EXISTS `maps` (
  `floor` varchar(50) NOT NULL,
  `imageurl` text NOT NULL,
  `imagethumb` text NOT NULL,
  `imagefull` text NOT NULL,
  `imagealt` text NOT NULL,
  PRIMARY KEY (`floor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`floor`, `imageurl`, `imagethumb`, `imagefull`, `imagealt`) VALUES
('G1', 'http://s26.postimg.org/op44hne4p/mall_map.jpg', 'http://s26.postimg.org/ef1pieo91/mall_map.jpg', 'http://s26.postimg.org/93msxp26f/mall_map.jpg', 'Ground Floor');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE IF NOT EXISTS `market` (
  `itemid` varchar(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `itemprice` varchar(10) NOT NULL,
  `itemdiscreption` text NOT NULL,
  `itemspecification` text NOT NULL,
  `itemcategory` varchar(500) NOT NULL,
  `itembrand` varchar(500) NOT NULL,
  `quantity` int(4) NOT NULL,
  `date` varchar(30) NOT NULL,
  `imageurl` varchar(500) NOT NULL,
  `itemlocation` varchar(50) NOT NULL,
  `tags` varchar(500) NOT NULL,
  `totalsold` int(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`itemid`, `itemname`, `itemprice`, `itemdiscreption`, `itemspecification`, `itemcategory`, `itembrand`, `quantity`, `date`, `imageurl`, `itemlocation`, `tags`, `totalsold`, `timestamp`) VALUES
('1', 'Huawei Honor Holly (Black/White)', '6999', 'A budget-friendly smartphone offering from Huawei, the Huawei Holly features a 1.3 GHz quad core processor, an 8 MP camera, and a 5 inch HD display.', 'Dual Sim, 3G, Wi-Fi, Quad Core, 1.3 GHz Processor, 1 GB RAM, 16 GB inbuilt memory, 5 inches, 720 x 1280 px display, 8 MP Camera with flash, Memory Card Supported, upto 32 GB, Android, v4.4.2', 'mobile', 'Huawei', 461, '2014-11-08', 'images/market/huawei-holly-u19-200x200-imaeyw2cmerctjcj.jpg', '1', '', 516, '0000-00-00 00:00:00'),
('123456789', 'Moto E(White)', '6299', 'Motorola puts together a sharp display, the most advanced operating system, a powerful processor and dual SIM support in the form of Moto E, a mobile that is made for all.', 'Dual Sim, 3G, Wi-Fi, Dual Core, 1.2 GHz Processor, 1 GB RAM, 4 GB inbuilt memory, 4.3 inches, 540 x 960 px display, 5 MP Camera, Memory Card Supported, upto 32 GB, Android, v4.4', 'mobile', 'motorola', 471, '2014-10-28', 'images/market/motorola-xt1022-200x200-imadvvfjcbbpzb2b.jpg', '2', '', 308, '0000-00-00 00:00:00'),
('1523645', 'Samsung 40H5500 102 cm (40) LED TV', '49999', 'Entertainment will never be the same once you watch your favourite movies, music concerts, sports, news and more on the Samsung 40H5500.', 'LED Display,102 cm (40),Full HD,1920 x 1080,Smart TV,3 x HDMI, 2 x USB,Refresh Rate - Clear Motion Rate - 100 Hz', 'tv', 'samsung', 1000, '2015-2-8', 'images/market/samsung-40h5500-400x400-imadvvzfgbd5r53z.jpg', '8', 'tv,black,hd,smart', 0, '0000-00-00 00:00:00'),
('194', 'Moto X (16 GB) (Black, Without Adapter)', '17999', 'One of the first of its kind, the Moto X from Motorola brings you a unique Google experience on a budget with all the frills of a high-end device intact.', '3G, Wi-Fi, NFC, Dual Core, 1.7 GHz Processor, 2 GB RAM, 16 GB inbuilt memory, 4.7 inches, 720 x 1280 px display, 10 MP Camera with flash, Memory Card Not Supported, Android, v4.4.2', 'mobile', 'motorola', 491, '2014-11-13', 'images/market/motorola-moto-x-200x200-imadu82xgcr8abck.jpg', '3', '', 736, '0000-00-00 00:00:00'),
('195', 'Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)', '7499', 'Experience unlimited entertainment and stay connected with your pals using this brilliant Asus Fonepad 7 2014 FE170CG. With the latest technology and a brilliant design, this device delivers an outstanding performance while also catering to your elite taste.', 'Dual Sim, 3G, Wi-Fi, Dual Core, 1.2 GHz Processor, 1 GB RAM, 4 GB inbuilt memory, 7 inches, 600 x 1024 px display, 2 MP Camera, Memory Card Supported, upto 64 GB, Android, v4.3', 'tablet', 'asus', 476, '2014-10-01', 'images/market/asus-fonepad-7-2014-fe170cg-200x200-imadyfxp4skyvmtd.jpg', '4', '', 104, '0000-00-00 00:00:00'),
('5', 'Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)', '21990', '     500 GB Hard Disk     Free DOS     DVD RW Drive     Celeron Dual Core Processor     2 GB RAM     Webcam     19.5 inch HD LED Display', '', 'desktop', 'lenovo', 464, '2014-10-31', 'images/market/lenovo-c260-200x200-imadwxyysjyhburg.jpg', '5', '', 216, '0000-00-00 00:00:00'),
('6', 'HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)', '28290', '     18.5 inch LCD Display     Windows 8.1     Intel HD Graphics     2 GB RAM     500 GB Hard Disk     Intel Pentium J2900 Processor', '', 'desktop', 'HP', 449, '2014-10-31', 'images/market/hp-18-5120-200x200-imadxph6qqry44u9.jpg', '6', '', 428, '0000-00-00 00:00:00'),
('7', 'Apple iPhone 5S (Silver, with 16 GB)', '41985', '     Up to 56x Faster GPU than the Original iPhone     Ultra-fast Wireless     Up to 40x Faster CPU than the Original iPhone     8 MP iSight Camera with 15% Large Images Sensor and Aperture of f/2.2     Touch ID: New Fingerprint Identity Sensor     1.2 MP FaceTime HD Camera     A7-chip High Performance 64-bit Architecture and M7 Motion Co-processor     iOS 7 New Features such as Smarter Multitasking; AirDrop and Control Centre     Apple Apps: iPhoto; iMovie; Keynote; Pages and Numbers', '3G, Wi-Fi, Dual Core, 1.3 GHz Processor, 1 GB RAM, 16 GB inbuilt memory, 4 inches, 640 x 1136 px display, 8 MP Camera with flash, Memory Card Not Supported, iOS, v7.0.1', 'mobile', 'apple', 439, '2014-10-31', 'images/market/apple-iphone-5s-200x200-imadpppch2n6hhux.jpg', '7', '', 636, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` varchar(100) NOT NULL,
  `from` varchar(30) NOT NULL,
  `to` varchar(30) NOT NULL,
  `balance` int(10) NOT NULL,
  `listid` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `from`, `to`, `balance`, `listid`, `timestamp`) VALUES
('554749fe1d651', '123456789', '0000000000', 96987, '152346994', '2015-05-04 10:29:18'),
('55474dfd45267', '123456789', '0000000000', 96987, '152346994', '2015-05-04 10:46:21'),
('55474e2828e3f', '123456789', '0000000000', 96987, '152346994', '2015-05-04 10:47:04'),
('55474e5bcec3a', '123456789', '0000000000', 96987, '152346994', '2015-05-04 10:47:55'),
('55474f7284c18', '123456789', '0000000000', 96987, '152346994', '2015-05-04 10:52:34'),
('55475246d3add', '123456789', '0000000000', 96987, '152346994', '2015-05-04 11:04:38'),
('5547858f290a5', '123456789', '0000000000', 87589, '152346994', '2015-05-04 14:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `payment_completed`
--

CREATE TABLE IF NOT EXISTS `payment_completed` (
  `id` varchar(50) NOT NULL,
  `fromid` varchar(50) NOT NULL,
  `toid` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL,
  `listid` varchar(50) NOT NULL,
  `listitems` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_completed`
--

INSERT INTO `payment_completed` (`id`, `fromid`, `toid`, `balance`, `listid`, `listitems`, `timestamp`) VALUES
('123456789000000000096987', '123456789', '0000000000', '96987', '152346994', '', '2015-05-05 15:50:59'),
('1292455464891a980e5.72697431', '123456789', '0000000000', '96987', '152346994', '', '2015-05-03 16:10:57'),
('14080554646ed3144f4.76461259', '123456789', '0000000000', '96987', '152346994', '', '2015-05-03 16:03:57'),
('17196554647e15a2c64.27638104', '123456789', '0000000000', '96987', '152346994', '', '2015-05-03 16:08:01'),
('25967554648502c50e3.73749303', '123456789', '0000000000', '96987', '152346994', '', '2015-05-03 16:09:52'),
('27835546476857aa72.73974609', '123456789', '0000000000', '96987', '152346994', '', '2015-05-04 16:06:00'),
('69695546470a519005.87012763', '123456789', '0000000000', '96987', '152346994', '', '2015-05-04 16:04:26'),
('95985546472bb9d067.39136518', '123456789', '0000000000', '96987', '152346994', '', '2015-05-03 16:04:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
