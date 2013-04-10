-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2013 at 07:43 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `commenter`, `offerid`, `time`, `comment`) VALUES
(50, 'vishrut', 73, '2013-04-10 23:14:45', 'hi how are you?'),
(52, 'vishrut', 76, '2013-04-10 23:15:11', 'whats your name?');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `username` varchar(20) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `time` datetime NOT NULL,
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
  `image` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`itemid`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`itemid`, `owner`, `itemname`, `category`, `addedon`, `pricetag`, `description`, `condition`, `image`) VALUES
(15, 'vi', 'itemvi', 'A', '2013-03-26 18:11:01', 100, 'hellos							', 'new', '627102ERD.png'),
(25, 'saheb', 'sahebsitem', 'A', '2013-04-08 00:33:56', 1000, 'This is sahebs item							', 'good', '270413Level1.png'),
(27, 'saheb', 'noti', 'A', '2013-04-10 11:22:33', 25, 'this is an aitem							', 'new', '806164ERD.png'),
(28, 'saheb', 'hudi', 'A', '2013-04-10 12:25:08', 33, '							wadup', 'new', '874908ERD.png'),
(29, 'vishrut', 'vishrutsitem', 'A', '2013-04-10 22:52:21', 4500, 'hi							', 'new', '730548ERD.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationid`, `notificationdetails`, `username`, `viewed`, `time`) VALUES
(9, 'Congratulations! User <b>vish</b> has accepted your offer for the item <b>c</b>.<br>You can find your new transaction in the Offers and Transactions tab.', 'saheb', 1, '2013-04-10 11:40:32'),
(13, 'Sorry! User <b>vish</b> has rejected your offer for the item <b>yitems</b>.<br>You can find your new transaction in the Offers and Transactions tab.', 'saheb', 1, '2013-04-10 11:40:32'),
(14, 'Sorry! User <b>vish</b> has rejected your offer for the item <b>yitems</b>.<br>You can find your new transaction in the Offers and Transactions tab.', 'saheb', 1, '2013-04-10 11:40:32'),
(20, 'Congratulations! User <b>vish</b> has accepted your offer for the item <b>nokia lumia</b>.<br>You can find your new transaction in the Offers and Transactions tab.<br>Seller username: <br>Seller name:  <br>Room number:  <br>Email: ', 'saheb', 1, '2013-04-10 11:56:16'),
(23, 'Congratulations! User <b>vish</b> has accepted your offer for the item <b>erroritem</b>.<br>You can find your new transaction in the Offers and Transactions tab.<br>Seller username: vish<br>Seller name: Vishrutk l<br>Room number: A 117<br>Email: 201001193@daiict.ac.in', 'saheb', 1, '2013-04-10 11:59:09'),
(25, 'Wishlist item edited! User <b>vish</b> has edited the item <b>yitems</b>.<br>You can find the item using the search feature.', 'saheb', 1, '2013-04-10 12:30:13'),
(26, 'Wishlist item edited! User <b>vish</b> has edited the item <b>yitems</b>.<br>You can find the item using the search feature.', 'vi', 0, '2013-04-10 12:30:13'),
(27, 'Transaction status update!<br>Transaction between <b>vish and vish</b><br>User <b>vish</b> has reported the transaction as unsuccessful. <br>User <b>vi</b> has reported the transaction as completed', 'vi', 0, '2013-04-10 12:54:07'),
(30, 'Transaction status update!<br>Transaction between <b>vish and vi</b><br>Both users have reported the transaction as completed', 'vi', 0, '2013-04-10 12:55:22'),
(31, 'Transaction status update!<br>Transaction between <b>saheb and vish</b><br>User <b>vish</b> has reported the transaction as completed', 'saheb', 1, '2013-04-10 12:56:31'),
(33, 'User <b>vish</b> has made an offer for your item <b>hudi</b>', 'saheb', 1, '2013-04-10 14:05:32'),
(34, 'Transaction status update!<br>Transaction between <b>saheb and vish</b><br>User <b>vish</b> has reported the transaction as completed', 'saheb', 1, '2013-04-10 14:11:38'),
(36, 'Transaction status update!<br>Transaction between <b>saheb and vish</b><br>User <b>vish</b> has reported the transaction as completed', 'saheb', 1, '2013-04-10 14:11:43'),
(38, 'User <b>saheb</b> has made an offer for your item <b>itemvi</b>', 'vi', 0, '2013-04-10 16:02:40'),
(39, 'User <b>saheb</b> has made an offer for your item <b>itemvi</b>', 'vi', 0, '2013-04-10 16:12:39'),
(40, 'User <b>vishrut</b> has made an offer for your item <b>hudi</b>', 'saheb', 1, '2013-04-10 22:51:27'),
(41, 'User <b>vishrut</b> has made an offer for your item <b>sahebsitem</b>', 'saheb', 1, '2013-04-10 22:51:54'),
(42, 'User <b>vishrut</b> has made an offer for your item <b>sahebsitem</b>', 'saheb', 1, '2013-04-10 22:52:41'),
(43, 'User <b>vishrut</b> has retracted an offer for your item <b>sahebsitem</b>', 'saheb', 1, '2013-04-10 22:59:09'),
(44, 'User <b>vishrut</b> has made an offer for your item <b>sahebsitem</b>', 'saheb', 1, '2013-04-10 22:59:35'),
(45, 'User <b>saheb</b> has made an offer for your item <b>vishrutsitem</b>', 'vishrut', 1, '2013-04-10 23:06:34'),
(46, 'Congratulations! User <b>vishrut</b> has accepted your offer for the item <b>vishrutsitem</b>.<br>You can find your new transaction in the Offers and Transactions tab.<br>Seller username: vishrut<br>Seller name: Vishrut Patel<br>Room number: F 117<br>Email: vrp101@gmail.com', 'saheb', 1, '2013-04-10 23:21:00'),
(47, 'Congratulations! You have entered a transaction with <b>vishrut</b> for the item <b>vishrutsitem</b>.<br>You can find your new transaction in the Offers and Transactions tab.<br>Buyer username: saheb<br>Buyer name: Saheb Motiani<br>Room number: A 123<br>Email: 201001158@daiict.ac.in', 'vishrut', 1, '2013-04-10 23:21:00'),
(48, 'Transaction status update!<br>Transaction between <b>saheb and vishrut</b><br>User <b>vishrut</b> has reported the transaction as completed', 'saheb', 1, '2013-04-10 23:31:30'),
(49, 'Transaction status update!<br>Transaction between <b>saheb and vishrut</b><br>User <b>vishrut</b> has reported the transaction as completed', 'vishrut', 1, '2013-04-10 23:31:30'),
(50, 'Transaction status update!<br>Transaction between <b>saheb and vishrut</b><br>Both users have reported the transaction as completed', 'saheb', 1, '2013-04-10 23:31:54'),
(51, 'Transaction status update!<br>Transaction between <b>saheb and vishrut</b><br>Both users have reported the transaction as completed', 'vishrut', 1, '2013-04-10 23:31:54'),
(52, 'Congratulations! User <b>saheb</b> has accepted your offer for the item <b>sahebsitem</b>.<br>You can find your new transaction in the Offers and Transactions tab.<br>Seller username: saheb<br>Seller name: Saheb Motiani<br>Room number: A 123<br>Email: 201001158@daiict.ac.in', 'vishrut', 0, '2013-04-11 00:01:32'),
(53, 'Congratulations! You have entered a transaction with <b>saheb</b> for the item <b>sahebsitem</b>.<br>You can find your new transaction in the Offers and Transactions tab.<br>Buyer username: vishrut<br>Buyer name: Vishrut Patel<br>Room number: F 117<br>Email: vrp101@gmail.com', 'saheb', 0, '2013-04-11 00:01:32'),
(54, 'Transaction status update!<br>Transaction between <b>vishrut and saheb</b><br>User <b>saheb</b> has reported the transaction as completed', 'vishrut', 0, '2013-04-11 00:02:14'),
(55, 'Transaction status update!<br>Transaction between <b>vishrut and saheb</b><br>User <b>saheb</b> has reported the transaction as completed', 'saheb', 0, '2013-04-11 00:02:14'),
(56, 'Transaction status update!<br>Transaction between <b>vishrut and saheb</b><br>User <b>vishrut</b> has reported the transaction as unsuccessful. <br>User <b>saheb</b> has reported the transaction as completed', 'vishrut', 0, '2013-04-11 00:02:23'),
(57, 'Transaction status update!<br>Transaction between <b>vishrut and saheb</b><br>User <b>vishrut</b> has reported the transaction as unsuccessful. <br>User <b>saheb</b> has reported the transaction as completed', 'saheb', 0, '2013-04-11 00:02:23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `offerdetails`
--

INSERT INTO `offerdetails` (`offerid`, `buyer`, `seller`, `ssr`, `sellingitem`, `offereditem1`, `offereditem2`, `offereditem3`, `offereditem4`, `cash`, `timestamp`, `accepted`) VALUES
(71, 'saheb', 'vi', 'sell', 15, NULL, NULL, NULL, NULL, 123, '2013-04-10 16:02:39', 0),
(72, 'saheb', 'vi', 'swap', 15, 27, NULL, NULL, NULL, NULL, '2013-04-10 16:12:39', 0),
(73, 'vishrut', 'saheb', 'sell', 28, NULL, NULL, NULL, NULL, 1234, '2013-04-10 22:51:27', 0),
(76, 'vishrut', 'saheb', 'swap', 25, 29, NULL, NULL, NULL, NULL, '2013-04-10 22:59:35', 1),
(77, 'saheb', 'vishrut', 'sell', 29, NULL, NULL, NULL, NULL, 234, '2013-04-10 23:06:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rentdetails`
--

CREATE TABLE IF NOT EXISTS `rentdetails` (
  `offerid` int(10) NOT NULL,
  `startdate` varchar(20) NOT NULL,
  `enddate` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `per` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentdetails`
--

INSERT INTO `rentdetails` (`offerid`, `startdate`, `enddate`, `amount`, `per`) VALUES
(8, '04/08/2013', '04/10/2013', 30, 'Day'),
(17, '04/10/2013', '04/12/2013', 34, 'Day'),
(18, '04/10/2013', '04/12/2013', 34, 'Day'),
(19, '04/09/2013', '04/10/2013', 123, 'Week'),
(20, '04/08/2013', '04/11/2013', 1234, 'Day'),
(36, '04/09/2013', '04/11/2013', 100, 'Day'),
(38, '04/09/2013', '04/12/2013', 34, 'Month'),
(43, '04/09/2013', '04/10/2013', 45, 'Day'),
(45, '04/11/2013', '04/24/2013', 123, 'Day'),
(47, '04/10/2013', '04/11/2013', 45, 'Day'),
(8, '04/08/2013', '04/10/2013', 30, 'Day'),
(17, '04/10/2013', '04/12/2013', 34, 'Day'),
(18, '04/10/2013', '04/12/2013', 34, 'Day'),
(19, '04/09/2013', '04/10/2013', 123, 'Week'),
(20, '04/08/2013', '04/11/2013', 1234, 'Day'),
(36, '04/09/2013', '04/11/2013', 100, 'Day'),
(38, '04/09/2013', '04/12/2013', 34, 'Month'),
(43, '04/09/2013', '04/10/2013', 45, 'Day'),
(45, '04/11/2013', '04/24/2013', 123, 'Day'),
(47, '04/10/2013', '04/11/2013', 45, 'Day'),
(8, '04/08/2013', '04/10/2013', 30, 'Day'),
(17, '04/10/2013', '04/12/2013', 34, 'Day'),
(18, '04/10/2013', '04/12/2013', 34, 'Day'),
(19, '04/09/2013', '04/10/2013', 123, 'Week'),
(20, '04/08/2013', '04/11/2013', 1234, 'Day'),
(36, '04/09/2013', '04/11/2013', 100, 'Day'),
(38, '04/09/2013', '04/12/2013', 34, 'Month'),
(43, '04/09/2013', '04/10/2013', 45, 'Day'),
(45, '04/11/2013', '04/24/2013', 123, 'Day'),
(47, '04/10/2013', '04/11/2013', 45, 'Day'),
(8, '04/08/2013', '04/10/2013', 30, 'Day'),
(17, '04/10/2013', '04/12/2013', 34, 'Day'),
(18, '04/10/2013', '04/12/2013', 34, 'Day'),
(19, '04/09/2013', '04/10/2013', 123, 'Week'),
(20, '04/08/2013', '04/11/2013', 1234, 'Day'),
(36, '04/09/2013', '04/11/2013', 100, 'Day'),
(38, '04/09/2013', '04/12/2013', 34, 'Month'),
(43, '04/09/2013', '04/10/2013', 45, 'Day'),
(45, '04/11/2013', '04/24/2013', 123, 'Day'),
(47, '04/10/2013', '04/11/2013', 45, 'Day'),
(62, '04/11/2013', '04/13/2013', 2400, 'Day'),
(66, '04/10/2013', '04/11/2013', 25, 'Day'),
(67, '04/11/2013', '04/13/2013', 1, 'Day'),
(74, '04/10/2013', '04/11/2013', 45, 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `reportabuse`
--

CREATE TABLE IF NOT EXISTS `reportabuse` (
  `reporter` varchar(20) NOT NULL,
  `abuser` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `time` datetime NOT NULL,
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
(25, 'sell'),
(25, 'swap'),
(25, 'rent'),
(15, 'sell'),
(15, 'swap'),
(15, 'rent'),
(27, 'sell'),
(28, 'sell'),
(29, 'sell');

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

INSERT INTO `transaction` (`transactionid`, `status`, `startdate`, `enddate`) VALUES
(77, 'totalcompleted', '2013-04-10 23:21:00', NULL),
(76, 'bisc', '2013-04-11 00:01:32', NULL);

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
  `rating` float NOT NULL,
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
('abc', 201001199, 'vrp101@gmail.co.in', 'Vishrut', 'Patel', 117, 'A', 5, 'webmail', 0, 1, NULL),
('aman', 201001231, '201001231@daiict.ac.in', 'Aman', 'Jain', 123, 'A', 5, 'amanjain', 1, 1, 13),
('Arun', 201001111, 'arungupta@gmail.com', 'Arun ', 'GUpta', 110, 'A', 5, 'arungupta', 0, 1, NULL),
('saheb', 201001158, '201001158@daiict.ac.in', 'Saheb', 'Motiani', 123, 'A', 3.35715, 'sahebrocks', 1, 14, NULL),
('shikhar', 201001103, 'gshikhri@gmail.com', 'shikhar', 'Gupta', 218, 'A', 5, 'qwerty', 0, 1, NULL),
('vedang', 200801135, 'vrp101@gmail.coms', 'V', 'P', 219, 'A', 5, 'abcdef', 0, 1, NULL),
('vi', 201001194, 'vrp101@gmail.co', 'Vishrut', 'Patel', 117, 'A', 3.66667, 'aaaaaa', 0, 3, NULL),
('vish', 201001010, '201001193@daiict.ac.in', 'Vishrut', 'Patel', 117, 'F', 4, 'aaaaaa', 1, 1, NULL),
('vishrut', 201001193, 'vrp101@gmail.com', 'Vishrut', 'Patel', 117, 'F', 5, 'turhsiv', 1, 3, 620),
('vishrutp', 201000000, 'vishrut103@gmail.com', 'Vishrut', 'Patel', 117, 'A', 5, 'abcdef', 0, 1, NULL);

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

INSERT INTO `wishlist` (`username`, `itemid`) VALUES
('vishrut', 28);

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
