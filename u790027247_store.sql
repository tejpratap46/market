
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2015 at 09:23 AM
-- Server version: 5.1.69
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u790027247_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `apikey`
--

CREATE TABLE IF NOT EXISTS `apikey` (
  `api_key` varchar(20) NOT NULL,
  PRIMARY KEY (`api_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='apikeys';

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
  `name` varchar(20) NOT NULL,
  `balance` varchar(20) NOT NULL,
  `lastupdate` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`bankid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bankid`, `name`, `balance`, `lastupdate`, `email`) VALUES
('123456789', 'Tej Pratap', '1324735', '23-04-15 11:48:15', 'tejpratap36@gmail.co'),
('1235468562', 'Tej Pratap', '0', '31-01-15 19:15:45', 'tejpratap36@gmail.co'),
('152364485', 'Tej Pratap Singh', '0', '09-12-14 14:10:52', 'tps@xyz.com'),
('7536925174', 'tej', '1000000', '23-10-14 14:52:31', 'tejpratap36@gmail.co'),
('987654321', 'Tej', '8950000', '22-11-14 20:41:46', 'tejpratap66@gmail.co'),
('asd', 'asd', '0', '10-12-14 16:28:47', 'asd'),
('0000000000', 'Mall Bank', '225265', '23-04-15 11:48:15', 'mall@bank.com'),
('123456', 'sourabh', '0', '28-03-15 03:51:39', 'sourabh@gmail.com'),
('11111', 'shubham', '0', '28-03-15 05:56:46', '39911rahul@gmail.com'),
('1234321', 'shubhamj', '0', '28-03-15 05:57:29', '39911rahul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `username` varchar(50) NOT NULL,
  `items` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`username`, `items`) VALUES
('tejpr', '<id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><cost>17999</cost><quantity>1</quantity>'),
('tejpratap', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><cost>6999</cost><quantity>1</quantity><id>123456789</id><name>Moto E(White)</name><cost>6299</cost><quantity>1</quantity><id>123456789</id><name>Moto E(White)</name><cost>6299</cost><quantity>1</quantity>'),
('tejpratapsingh', '<id>123456789</id><name>Moto E(White)</name><cost>6299</cost><quantity>1</quantity><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><cost>17999</cost><quantity>5</quantity>');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `code` varchar(30) NOT NULL,
  `items` text NOT NULL,
  `percentage` int(3) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`code`, `items`, `percentage`) VALUES
('dd10', '1,123456789,194,195,5,6,7', 10),
('dd20', '1,194,5,6,7', 20);

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
  `listid` varchar(10) NOT NULL,
  `purchase` int(50) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `bankid` (`bankid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `email`, `username`, `password`, `bankid`, `listid`, `purchase`) VALUES
('sourabh', 'sourabh@gmail.com', 'sourabh', 'sourabh', '123456', '152346992', 0),
('Tej Pratap', 'tejpratap36@gmail.com', 'tejpr', '9860637720', '1235468562', '', 0),
('Tej Pratap Singh', 'tps@xyz.com', 'tejpratap', '9860637720', '152364485', '', 0),
('Tej Pratap', 'tejpratap36@gmail.com', 'tejpratapsingh', '9860637720', '123456789', '152346988', 0),
('Tej', 'tejpratap66@gmail.co', 'tps', '9860637720', '987654321', '152346950', 0),
('shubham', '39911rahul@gmail.com', 'shubham', '111111111', '11111', '', 0),
('shubhamj', '39911rahul@gmail.com', 'shubhamj', '111111111', '1234321', '152346991', 0);

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE IF NOT EXISTS `featured` (
  `index` int(50) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  `imageurl` varchar(5000) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`index`, `code`, `imageurl`, `description`) VALUES
(1, 'dd10', 'http://s26.postimg.org/skgm0mn2h/20141031_184534_730x300_image_730_300_2.jpg', '1'),
(2, 'dd20', 'http://s26.postimg.org/wuv9w7s5l/20141027_112312_730x300_clp.jpg', '2'),
(3, 'dd30', 'http://s26.postimg.org/cc0dr5e89/20141103_135835_nerolac_clp.jpg', '3'),
(4, 'dd40', 'http://s26.postimg.org/soafgvsjt/20141031_200226_taxi4sure_300x700.jpg', '4'),
(5, 'dd50', 'http://s26.postimg.org/trujsud6x/20141103_125527_730x300_big_screen_small_price.jpg', '5'),
(6, 'dd60', 'http://s26.postimg.org/q9evlgksp/20141104_123954_730x300_1_2.jpg', '6'),
(7, 'dd70', 'http://s26.postimg.org/4biero5s9/20140902_160713_730x300_category_landing_page.jpg', '7'),
(8, 'dd80', 'http://s26.postimg.org/titarx8w9/20141103_195008_730x300_image_730_300_14.jpg', '8'),
(9, 'dd90', 'http://s26.postimg.org/olfq6t6x5/20141104_115704_eveready_clp.jpg', '9');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE IF NOT EXISTS `lists` (
  `listid` int(10) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(30) NOT NULL,
  `items` varchar(50000) NOT NULL,
  PRIMARY KEY (`listid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152346993 ;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`listid`, `customerid`, `items`) VALUES
(152346946, 'tejpratapsingh', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>'),
(152346947, 'tejpratapsingh', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>'),
(152346948, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>'),
(152346949, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>'),
(152346950, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>'),
(152346953, 'tejpratapsingh', '<id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost>'),
(152346954, 'tejpratapsingh', '<id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>6</id><name>HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)</name><quantity>1</quantity><cost>28290</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>'),
(152346958, 'tejpratapsingh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>7</id><name>Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>6</id><name>HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)</name><quantity>1</quantity><cost>28290</cost>'),
(152346975, 'tejpratapsingh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost>'),
(152346967, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>'),
(152346968, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>'),
(152346969, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>'),
(152346970, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>'),
(152346971, 'tps', '<id>7</id><name> Apple iPhone 5S (Silver, with 16 GB)</name><quantity>6</quantity><cost>41985</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost><id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>123456789</id><name>Moto E(White)</name><quantity>3</quantity><cost>6299</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>3</quantity><cost>7499</cost>'),
(152346972, 'tejpratapsingh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>7</id><name>Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>6</id><name>HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)</name><quantity>1</quantity><cost>28290</cost>'),
(152346976, 'tejpratapsingh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>3</quantity><cost>21990</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>4</quantity><cost>17999</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost>'),
(152346977, 'tejpratapsingh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>3</quantity><cost>21990</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>4</quantity><cost>17999</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost>'),
(152346979, '', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>3</quantity><cost>21990</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>4</quantity><cost>17999</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost>'),
(152346991, 'shubhamj', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>Rs. 17999</cost>'),
(152346992, 'sourabh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>7</id><name>Apple iPhone 5S (Silver, with 16 GB)</name><quantity>1</quantity><cost>41985</cost><id>195</id><name>Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)</name><quantity>1</quantity><cost>7499</cost>'),
(152346985, 'tejpratapsingh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>1</quantity><cost>6999</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>1</quantity><cost>17999</cost><id>123456789</id><name>Moto E(White)</name><quantity>1</quantity><cost>6299</cost>'),
(152346987, 'sourabh', '<id>7</id><name>Apple iPhone 5S (Silver, with 16 GB)</name><cost>41985</cost><quantity>1</quantity><id>1</id><name>Huawei Honor Holly (Black/White)</name><cost>6999</cost><quantity>1</quantity>'),
(152346988, 'tejpratapsingh', '<id>1</id><name>Huawei Honor Holly (Black/White)</name><quantity>3</quantity><cost>6999</cost><id>5</id><name>Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)</name><quantity>1</quantity><cost>21990</cost><id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><quantity>3</quantity><cost>17999</cost>');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `code` varchar(50) NOT NULL,
  `latlong` varchar(50) NOT NULL,
  `pixelloc` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`code`, `latlong`, `pixelloc`) VALUES
('1', '163,41', '1160,242'),
('10', '134,44', '954,220'),
('2', '153,44', '1090,220'),
('3', '158,27', '1125,340'),
('4', '150,44', '1068,220'),
('5', '157,36', '1118,277'),
('6', '145,44', '1032,220'),
('7', '154,36', '1096,277'),
('8', '139,44', '990,220'),
('9', '148,36', '1054,277');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`itemid`, `itemname`, `itemprice`, `itemdiscreption`, `itemspecification`, `itemcategory`, `itembrand`, `quantity`, `date`, `imageurl`, `itemlocation`, `tags`, `totalsold`) VALUES
('1', 'Huawei Honor Holly (Black/White)', '6999', 'A budget-friendly smartphone offering from Huawei, the Huawei Holly features a 1.3 GHz quad core processor, an 8 MP camera, and a 5 inch HD display.', 'Dual Sim, 3G, Wi-Fi, Quad Core, 1.3 GHz Processor, 1 GB RAM, 16 GB inbuilt memory, 5 inches, 720 x 1280 px display, 8 MP Camera with flash, Memory Card Supported, upto 32 GB, Android, v4.4.2', 'mobile', 'Huawei', 461, '2014-11-08', 'http://img5a.flixcart.com/image/mobile/h/q/e/huawei-holly-u19-200x200-imaeyw2cmerctjcj.jpeg', '1', '', 516),
('123456789', 'Moto E(White)', '6299', 'Motorola puts together a sharp display, the most advanced operating system, a powerful processor and dual SIM support in the form of Moto E, a mobile that is made for all.', 'Dual Sim, 3G, Wi-Fi, Dual Core, 1.2 GHz Processor, 1 GB RAM, 4 GB inbuilt memory, 4.3 inches, 540 x 960 px display, 5 MP Camera, Memory Card Supported, upto 32 GB, Android, v4.4', 'mobile', 'motorola', 471, '2014-10-28', 'http://img5a.flixcart.com/image/mobile/g/s/m/motorola-xt1022-200x200-imadvvfjcbbpzb2b.jpeg', '2', '', 308),
('194', 'Moto X (16 GB) (Black, Without Adapter)', '17999', 'One of the first of its kind, the Moto X from Motorola brings you a unique Google experience on a budget with all the frills of a high-end device intact.', '3G, Wi-Fi, NFC, Dual Core, 1.7 GHz Processor, 2 GB RAM, 16 GB inbuilt memory, 4.7 inches, 720 x 1280 px display, 10 MP Camera with flash, Memory Card Not Supported, Android, v4.4.2', 'mobile', 'motorola', 491, '2014-11-13', 'http://img5a.flixcart.com/image/mobile/m/t/n/motorola-moto-x-200x200-imadu82xgcr8abck.jpeg', '3', '', 736),
('195', 'Asus Fonepad 7 2014 FE170CG (White, 4 GB, 3G, Voice Calling)', '7499', 'Experience unlimited entertainment and stay connected with your pals using this brilliant Asus Fonepad 7 2014 FE170CG. With the latest technology and a brilliant design, this device delivers an outstanding performance while also catering to your elite taste.', 'Dual Sim, 3G, Wi-Fi, Dual Core, 1.2 GHz Processor, 1 GB RAM, 4 GB inbuilt memory, 7 inches, 600 x 1024 px display, 2 MP Camera, Memory Card Supported, upto 64 GB, Android, v4.3', 'tablet', 'asus', 476, '2014-10-01', 'http://img5a.flixcart.com/image/tablet/f/s/g/asus-fonepad-7-2014-fe170cg-200x200-imadyfxp4skyvmtd.jpeg', '4', '', 104),
('5', 'Lenovo C260 All-in-One (CDC/ 2GB/ 500GB/ Free DOS)', '21990', '     500 GB Hard Disk     Free DOS     DVD RW Drive     Celeron Dual Core Processor     2 GB RAM     Webcam     19.5 inch HD LED Display', '', 'desktop', 'lenovo', 464, '2014-10-31', 'http://img5a.flixcart.com/image/allinone-desktop/s/u/b/lenovo-c260-200x200-imadwxyysjyhburg.jpeg', '5', '', 216),
('6', 'HP 18-5120 All-in-One (2GB/ 500GB/ Win8.1)', '28290', '     18.5 inch LCD Display     Windows 8.1     Intel HD Graphics     2 GB RAM     500 GB Hard Disk     Intel Pentium J2900 Processor', '', 'desktop', 'HP', 449, '2014-10-31', 'http://img5a.flixcart.com/image/allinone-desktop/h/9/f/hp-18-5120-200x200-imadxph6qqry44u9.jpeg', '6', '', 428),
('7', 'Apple iPhone 5S (Silver, with 16 GB)', '41985', '     Up to 56x Faster GPU than the Original iPhone     Ultra-fast Wireless     Up to 40x Faster CPU than the Original iPhone     8 MP iSight Camera with 15% Large Images Sensor and Aperture of f/2.2     Touch ID: New Fingerprint Identity Sensor     1.2 MP FaceTime HD Camera     A7-chip High Performance 64-bit Architecture and M7 Motion Co-processor     iOS 7 New Features such as Smarter Multitasking; AirDrop and Control Centre     Apple Apps: iPhoto; iMovie; Keynote; Pages and Numbers', '3G, Wi-Fi, Dual Core, 1.3 GHz Processor, 1 GB RAM, 16 GB inbuilt memory, 4 inches, 640 x 1136 px display, 8 MP Camera with flash, Memory Card Not Supported, iOS, v7.0.1', 'mobile', 'apple', 439, '2014-10-31', 'http://img6a.flixcart.com/image/mobile/4/y/h/apple-iphone-5s-200x200-imadpppch2n6hhux.jpeg', '7', '', 636);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` varchar(100) NOT NULL,
  `from` varchar(30) NOT NULL,
  `to` varchar(30) NOT NULL,
  `balance` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `from`, `to`, `balance`) VALUES
('5470d9e00aa0d', '987654321', '123456789', 500),
('5470d9e7b4ac9', '987654321', '123456789', 500),
('5470d9eb25aca', '987654321', '123456789', 500),
('5470dd6f097bd', '987654321', '123456789', 500),
('5470ddec4a14c', '987654321', '123456789', 5000),
('5515738a1fe27', '123456789', '0000000000', 31297),
('551573aa28f53', '123456789', '0000000000', 31297),
('551573bb68938', '123456789', '0000000000', 31297),
('5515950bc1e5c', '123456789', '0000000000', 31297),
('551621421515e', '123456789', '0000000000', 31297),
('551627d28826d', '123456789', '0000000000', 151264),
('55164ff7ee15a', '123456789', '0000000000', 96984),
('5531ea77a67c3', '123456789', '0000000000', 96984),
('553676312c568', '123456789', '0000000000', 96984),
('55367640def29', '123456789', '0000000000', 96984),
('5536764586924', '123456789', '0000000000', 96984),
('55378ad94c143', '123456789', '0000000000', 96984),
('55378add0d0e7', '123456789', '0000000000', 96984),
('553791d812d86', '123456789', '0000000000', 87285),
('553797f62288b', '123456789', '0000000000', 28167),
('553797fb88323', '123456789', '0000000000', 28167),
('5538e1447fe23', '123456789', '0000000000', 96984);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
