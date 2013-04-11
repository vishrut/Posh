-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2013 at 09:22 AM
-- Server version: 5.5.27
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poshdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `commenter` varchar(20) NOT NULL,
  `offerid` int(10) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`commentid`),
  KEY `commenter` (`commenter`),
  KEY `offerid` (`offerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `commenter`, `offerid`, `time`, `comment`) VALUES
(54, 'aman', 81, '2013-04-11 14:49:16', 'Awesome T! Hope you are a rolling stones fan!'),
(55, 'amandeep', 84, '2013-04-11 14:51:52', '15000 is my final offer.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `username` varchar(20) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `itemid` int(10) NOT NULL AUTO_INCREMENT,
  `owner` varchar(20) NOT NULL,
  `itemname` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pricetag` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `condition` varchar(20) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`itemid`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`itemid`, `owner`, `itemname`, `category`, `addedon`, `pricetag`, `description`, `condition`, `image`) VALUES
(38, 'vishrut', 'Samsung Galaxy S3', 'Electronics', '2013-04-11 14:05:14', 25000, 'Used Galaxy S3. Looks as good as new!\r\n\r\nKey Features:\r\n    Android v4.0 (Ice Cream Sandwich) OS\r\n    8 MP Primary Camera\r\n    1.9 MP Secondary Camera\r\n    4.8-inch Super AMOLED Capacitive Touchscreen\r\n    1.4 GHz Quad Core Processor\r\n    Wi-Fi Enabled\r\n    Expandable Storage Capacity of 64 GB\r\n\r\n							', 'new', '367851samsung-galaxy-s3-400x400-imadjrcxfjdvvrrc.jpeg'),
(39, 'vishrut', 'Game Of Thrones: Ice and Fire', 'Books', '2013-04-11 14:09:52', 500, 'Here is the first volume in George R. R. Martin''s magnificent cycle of novels that includes A Clash of Kings and A Storm of Swords. As a whole, this series comprises a genuine masterpiece of modern fantasy, bringing together the best the genre has to offer. 							', 'acceptable', '34727a-game-of-thrones-book-one-of-songs-of-fire-and-ice.jpg'),
(40, 'vishrut', 'GM County Star Cricket Ball', 'Sports', '2013-04-11 14:12:06', 700, 'Perfectly new, unused GM County Star Cricket Ball. Packed.							', 'new', '674173gm-cricket-ball-county-star-400x400-imadcnhfwggurfg5.jpeg'),
(41, 'vishrut', 'Giorgio Armani Acqua Di Gio', 'Daily-Needs', '2013-04-11 14:14:24', 500, 'For Men. A luxury scent that brings together the energising components of sun, sea and nature in perfect harmony for the intense and passionate man. The harmonious blend of rich and revitalising elements gives you the inspiring scent that is Giorgio Armani Acqua Di Gio.							', 'new', '806746eau-de-toilette-men-giorgio-armani-100-acqua-di-gio-homme-275x275-imad8bd5ayeyqmkd.jpeg'),
(42, 'vishrut', 'Sony PS3 500 GB', 'Entertainment', '2013-04-11 14:16:56', 20000, 'Used product. Works fine.\r\n \r\nKey Features\r\n    USB 2.0\r\n    HDMI Output\r\n    Ethernet Connection\r\n\r\n							', 'good', '270607275x275-imadeujge5ynkax5.jpeg'),
(43, 'amandeep', 'Omron HEM 7201 Bp Monitor', 'Healthcare', '2013-04-11 14:21:05', 1200, ' Key Features\r\n\r\n    Movement Indicator\r\n    Pulse Rate Indicator\r\n    Average of 3 Readings\r\n    60 Readings Memory\r\n    Automatic Inflation and Deflation\r\n    IntelledSense TM Technology\r\n    146 x 446 mm Cuff Size\r\n    22 - 32 cm Medium Cuff\r\n\r\n							', 'used', '44329omron-upper-arm-hem-7201-275x275-imad24y92x36kayb.jpeg'),
(44, 'amandeep', 'T-Shirt The Doors', 'Apparels', '2013-04-11 14:22:25', 600, 'The Doors T-Shirt for the fans. Brand new!							', 'new', '511862mt0bdo03white-the-doors-xxl-700x700-imadjyshcxfkqt8w.jpeg'),
(45, 'amandeep', 'Canon PowerShot A2300 Point & Shoot', 'Electronics', '2013-04-11 14:24:53', 5000, 'From Canonâ€™s highly successful range of PowerShot A-series digital cameras, comes the A2300 point and shoot camera. This highly capable mid-level digital camera with an array of significant features and functions makes an ideal pick for hobbyists and beginners looking to explore the basic techniques in digital photography.							', 'used', '344370canon-a2300-400x400-imad8syb7hhpupsp.jpeg'),
(46, 'amandeep', 'Btwin Sport Helmet 5 Cycling Helmet', 'Sports', '2013-04-11 14:27:02', 700, 'When playing any sport it is important to take the necessary precautions to ensure the players safety. Prepare for cycling with a helmet and pads for your knees and elbows. Use your cycle to travel short to medium distances easily without taking your car out.							', 'good', '830894btwin-sport-helmet-5-400x400-imaddd849qfuexvn.jpeg'),
(47, 'amandeep', 'Inferno  - Dan Brown', 'Books', '2013-04-11 14:30:28', 1000, 'Unreleased in India							', 'verygood', '573157inferno-the-new-robert-langdon-thriller-700x700-imadgccf5srhzrqk.jpeg'),
(48, 'aman', 'Guitar Lessons', 'Services', '2013-04-11 14:36:04', 1000, 'Guitar Lessons from an experienced guitar player. 							', 'new', '475708fg700s_01.jpg'),
(49, 'aman', 'Legend: Bob Marley Vinyl LP', 'Entertainment', '2013-04-11 14:39:08', 150, 'This newly remastered version of the best-selling reggae album of all time now features 2 additional bonus tracks.Upgraded packaging features 28 page booklet with lyrics and photos.							', 'verygood', '907961legend.jpg'),
(50, 'aman', 'Vicks Thermometer', 'Healthcare', '2013-04-11 14:40:54', 300, 'You can save yourself the time from visiting a clinic, as the professional accuracy of Vicks V901N digital thermometer gives precise readings with optimum results. The Buzzer alarm that is set up in this Vicks thermometer alerts the user with a fever signal that beeps to indicate elevated temperatures. 							', 'new', '894568vicks-v901f-400x400-imadbgg7yrgndztj.jpeg'),
(51, 'aman', 'Rolling Stones T-Shirt', 'Apparels', '2013-04-11 14:42:29', 300, 'Team the casual wear with a pair of jeans and loafers and enjoy hanging out with your friends at the coffee shop. Pay homage to one of the greatest rock bands by flaunting the upbeat T-shirts from Rolling Stones that are crafted for those trend-savvy men who believe in giving themselves an impeccable attire.							', 'new', '420133roll.jpeg'),
(52, 'aman', 'Samsung Laptop', 'Electronics', '2013-04-11 14:44:26', 30000, 'I am using this laptop for one month now and it is great. Very less heating issue unlike seris 5 models. Although I am not muh into gaming, but graphics of games like Max payne are good. One con is viewing angle is not that good. 							', 'acceptable', '60795samsung-notebook-np350v5c-s06in-400x400-imadhh2n67gathvz.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notificationid` int(10) NOT NULL AUTO_INCREMENT,
  `notificationdetails` varchar(500) NOT NULL,
  `username` varchar(20) NOT NULL,
  `viewed` int(5) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notificationid`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationid`, `notificationdetails`, `username`, `viewed`, `time`) VALUES
(59, 'User <b>vishrut</b> has made an offer for your item <b>Samsung Laptop</b>', 'aman', 0, '2013-04-11 14:46:32'),
(60, 'User <b>vishrut</b> has made an offer for your item <b>Inferno  - Dan Brown</b>', 'amandeep', 1, '2013-04-11 14:47:16'),
(61, 'User <b>vishrut</b> has made an offer for your item <b>Btwin Sport Helmet 5 Cycling Helmet</b>', 'amandeep', 1, '2013-04-11 14:47:59'),
(62, 'User <b>aman</b> has made an offer for your item <b>T-Shirt The Doors</b>', 'amandeep', 1, '2013-04-11 14:48:50'),
(63, 'User <b>aman</b> has made an offer for your item <b>Canon PowerShot A2300 Point & Shoot</b>', 'amandeep', 1, '2013-04-11 14:49:50'),
(64, 'User <b>amandeep</b> has made an offer for your item <b>Vicks Thermometer</b>', 'aman', 0, '2013-04-11 14:50:54'),
(65, 'User <b>amandeep</b> has made an offer for your item <b>Sony PS3 500 GB</b>', 'vishrut', 0, '2013-04-11 14:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `offerdetails`
--

CREATE TABLE IF NOT EXISTS `offerdetails` (
  `offerid` int(10) NOT NULL AUTO_INCREMENT,
  `buyer` varchar(20) NOT NULL,
  `seller` varchar(20) NOT NULL,
  `ssr` varchar(10) NOT NULL,
  `sellingitem` int(10) NOT NULL,
  `offereditem1` int(10) DEFAULT NULL,
  `offereditem2` int(10) DEFAULT NULL,
  `offereditem3` int(10) DEFAULT NULL,
  `offereditem4` int(10) DEFAULT NULL,
  `cash` int(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted` int(3) DEFAULT '0',
  PRIMARY KEY (`offerid`),
  KEY `seller` (`seller`),
  KEY `offereditem1` (`offereditem1`),
  KEY `offereditem2` (`offereditem2`),
  KEY `offereditem3` (`offereditem3`),
  KEY `offereditem4` (`offereditem4`),
  KEY `sellingitem` (`sellingitem`),
  KEY `buyer` (`buyer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `offerdetails`
--

INSERT INTO `offerdetails` (`offerid`, `buyer`, `seller`, `ssr`, `sellingitem`, `offereditem1`, `offereditem2`, `offereditem3`, `offereditem4`, `cash`, `timestamp`, `accepted`) VALUES
(78, 'vishrut', 'aman', 'swap', 52, 38, NULL, NULL, NULL, NULL, '2013-04-11 14:46:32', 0),
(79, 'vishrut', 'amandeep', 'sell', 47, NULL, NULL, NULL, NULL, 800, '2013-04-11 14:47:16', 0),
(80, 'vishrut', 'amandeep', 'rent', 46, NULL, NULL, NULL, NULL, NULL, '2013-04-11 14:47:59', 0),
(81, 'aman', 'amandeep', 'swap', 44, 51, NULL, NULL, NULL, NULL, '2013-04-11 14:48:50', 0),
(82, 'aman', 'amandeep', 'rent', 45, NULL, NULL, NULL, NULL, NULL, '2013-04-11 14:49:50', 0),
(83, 'amandeep', 'aman', 'swap', 50, 43, NULL, NULL, NULL, NULL, '2013-04-11 14:50:54', 0),
(84, 'amandeep', 'vishrut', 'sell', 42, NULL, NULL, NULL, NULL, 15000, '2013-04-11 14:51:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rentdetails`
--

CREATE TABLE IF NOT EXISTS `rentdetails` (
  `offerid` int(10) NOT NULL,
  `startdate` varchar(20) NOT NULL,
  `enddate` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `per` varchar(10) NOT NULL,
  KEY `offerid` (`offerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentdetails`
--

INSERT INTO `rentdetails` (`offerid`, `startdate`, `enddate`, `amount`, `per`) VALUES
(80, '04/11/2013', '04/18/2013', 30, 'Day'),
(82, '04/11/2013', '04/25/2013', 100, 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `reportabuse`
--

CREATE TABLE IF NOT EXISTS `reportabuse` (
  `reporter` varchar(20) NOT NULL,
  `abuser` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `reporter` (`reporter`),
  KEY `abuser` (`abuser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportabuse`
--


-- --------------------------------------------------------

--
-- Table structure for table `ssritem`
--

CREATE TABLE IF NOT EXISTS `ssritem` (
  `itemid` int(10) NOT NULL,
  `ssr` varchar(10) NOT NULL,
  KEY `itemid` (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ssritem`
--

INSERT INTO `ssritem` (`itemid`, `ssr`) VALUES
(38, 'sell'),
(39, 'sell'),
(39, 'swap'),
(39, 'rent'),
(40, 'sell'),
(40, 'swap'),
(40, 'rent'),
(41, 'sell'),
(42, 'sell'),
(42, 'swap'),
(42, 'rent'),
(43, 'sell'),
(43, 'swap'),
(44, 'sell'),
(44, 'swap'),
(45, 'sell'),
(45, 'swap'),
(45, 'rent'),
(46, 'swap'),
(46, 'rent'),
(47, 'sell'),
(47, 'swap'),
(47, 'rent'),
(48, 'sell'),
(48, 'swap'),
(48, 'rent'),
(49, 'swap'),
(49, 'rent'),
(50, 'sell'),
(50, 'swap'),
(51, 'sell'),
(51, 'swap'),
(52, 'sell'),
(52, 'swap'),
(52, 'rent');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionid` int(10) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `startdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `enddate` timestamp NULL DEFAULT NULL,
  KEY `transactionid` (`transactionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `studentid` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `roomno` int(3) NOT NULL,
  `wing` varchar(1) NOT NULL,
  `rating` float NOT NULL DEFAULT '5',
  `password` varchar(20) NOT NULL,
  `confirmed` int(1) NOT NULL,
  `ratingno` int(11) DEFAULT '1',
  `random` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `studentid`, `email`, `firstname`, `lastname`, `roomno`, `wing`, `rating`, `password`, `confirmed`, `ratingno`, `random`) VALUES
('aman', 201001231, '201001231@daiict.ac.in', 'Aman', 'Jain', 209, 'G', 5, '123456', 1, 1, NULL),
('amandeep', 201001236, '201001236@daiict.ac.in', 'Amandeep', 'Ghai', 209, 'G', 5, '123456', 1, 1, NULL),
('apurva', 201001197, '201001197@daiict.ac.in', 'Apurva', 'Singhai', 123, 'J', 5, '123456', 1, 1, NULL),
('harsh', 201001225, '201001225@daiict.ac.in', 'Harsh', 'Thakkar', 207, 'G', 5, '123456', 1, 1, NULL),
('naman', 201001206, '201001206@daiict.ac.in', 'Naman', 'Gupta', 106, 'H', 5, '123456', 1, 1, NULL),
('rohan', 201001226, '201001226@daiict.ac.in', 'Rohan', 'Kohli', 105, 'G', 5, '123456', 1, 1, NULL),
('suyashi', 201001234, '201001234@daiict.ac.in', 'Suyashi', 'Purwar', 123, 'J', 5, '123456', 1, 1, NULL),
('vani', 201001220, '201001220@daiict.ac.in', 'Vani Alamkrutha', 'Mogili', 123, 'J', 5, '123456', 1, 1, NULL),
('vishrut', 201001193, '201001193@daiict.ac.in', 'Vishrut', 'Patel', 117, 'F', 5, '123456', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `username` varchar(20) NOT NULL,
  `itemid` int(10) NOT NULL,
  KEY `username` (`username`),
  KEY `itemid` (`itemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`commenter`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`offerid`) REFERENCES `offerdetails` (`offerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offerdetails`
--
ALTER TABLE `offerdetails`
  ADD CONSTRAINT `offerdetails_ibfk_1` FOREIGN KEY (`buyer`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offerdetails_ibfk_14` FOREIGN KEY (`sellingitem`) REFERENCES `inventory` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offerdetails_ibfk_15` FOREIGN KEY (`offereditem1`) REFERENCES `inventory` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offerdetails_ibfk_16` FOREIGN KEY (`offereditem2`) REFERENCES `inventory` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offerdetails_ibfk_17` FOREIGN KEY (`offereditem3`) REFERENCES `inventory` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offerdetails_ibfk_18` FOREIGN KEY (`offereditem4`) REFERENCES `inventory` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offerdetails_ibfk_2` FOREIGN KEY (`seller`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rentdetails`
--
ALTER TABLE `rentdetails`
  ADD CONSTRAINT `rentdetails_ibfk_1` FOREIGN KEY (`offerid`) REFERENCES `offerdetails` (`offerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reportabuse`
--
ALTER TABLE `reportabuse`
  ADD CONSTRAINT `reportabuse_ibfk_1` FOREIGN KEY (`reporter`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reportabuse_ibfk_2` FOREIGN KEY (`abuser`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ssritem`
--
ALTER TABLE `ssritem`
  ADD CONSTRAINT `ssritem_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `inventory` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`transactionid`) REFERENCES `offerdetails` (`offerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `inventory` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_3` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
