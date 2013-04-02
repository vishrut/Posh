-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2013 at 05:31 PM
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
  `commenter` varchar(20) NOT NULL,
  `offerid` int(10) NOT NULL,
  `time` datetime NOT NULL,
  KEY `commenter` (`commenter`),
  KEY `offerid` (`offerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`itemid`, `owner`, `itemname`, `category`, `addedon`, `pricetag`, `description`, `condition`, `image`) VALUES
(9, 'vish', 'newfile', 'A', '2013-03-26 10:49:16', 100, 'new file upload button							', 'new', '28895ERD.png'),
(11, 'vish', 'newitemagain', 'A', '2013-03-26 11:19:58', 100, 'yo							', 'new', '33288ERD.png'),
(13, 'vish', 'aaa', 'A', '2013-03-26 18:07:20', 100, 'ho							', 'new', '49737ERD.png'),
(14, 'vish', 'hi', 'A', '2013-03-26 18:08:21', 123, 'hi							', 'new', '689260ERD.png'),
(15, 'vi', 'itemvi', 'A', '2013-03-26 18:11:01', 100, 'hellos							', 'new', '627102ERD.png'),
(16, 'vish', 'aa', 'A', '2013-03-26 19:08:01', 100, 'des							', 'new', '167306ERD.png'),
(17, 'vish', 'b', 'A', '2013-03-26 19:08:23', 100, 'nnini							', 'new', '592518ERD.png'),
(18, 'vish', 'c', 'A', '2013-03-26 19:08:44', 100, 'mkmk							', 'new', '906973ERD.png'),
(20, 'vish', 'xitem', 'B', '2013-03-28 21:50:36', 100, 'this is item X							', 'new', '231435DFD.jpg'),
(21, 'vish', 'yitems', 'A', '2013-03-28 22:07:27', 4123, 'hi shello							', 'new', '842272ERD.png'),
(22, 'vish', 'nokia lumia', 'A', '2013-03-30 16:33:17', 2000, 'Nokia lumia phone							', 'used', '322691lumia.jpg'),
(23, 'vish', 'poshitem', 'C', '2013-03-31 17:27:45', 1000, '							New item', 'new', '130423pics 024.gif'),
(24, 'vish', 'Computer', 'A', '2013-04-02 14:16:01', 5000, 'New dell computer for sale							', 'good', '495659images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notificationid` int(10) NOT NULL AUTO_INCREMENT,
  `notificationdetails` varchar(500) NOT NULL,
  `username` varchar(20) NOT NULL,
  `viewed` int(5) NOT NULL,
  PRIMARY KEY (`notificationid`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `notifications`
--


-- --------------------------------------------------------

--
-- Table structure for table `offerdetails`
--

CREATE TABLE IF NOT EXISTS `offerdetails` (
  `offerid` int(10) NOT NULL AUTO_INCREMENT,
  `buyer` varchar(20) NOT NULL,
  `seller` varchar(20) NOT NULL,
  `ss` varchar(10) NOT NULL,
  `sellingitem` int(10) NOT NULL,
  `offereditem1` int(10) NOT NULL,
  `offereditem2` int(10) NOT NULL,
  `offereditem3` int(10) NOT NULL,
  `offereditem4` int(10) NOT NULL,
  `cash` int(10) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`offerid`),
  KEY `seller` (`seller`),
  KEY `offereditem1` (`offereditem1`),
  KEY `offereditem2` (`offereditem2`),
  KEY `offereditem3` (`offereditem3`),
  KEY `offereditem4` (`offereditem4`),
  KEY `sellingitem` (`sellingitem`),
  KEY `buyer` (`buyer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `offerdetails`
--


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
(14, 'sell'),
(14, 'swap'),
(15, 'sell'),
(15, 'swap'),
(15, 'rent'),
(22, 'swap'),
(22, 'rent'),
(23, 'sell'),
(23, 'rent'),
(9, 'sell'),
(9, 'swap'),
(11, 'sell'),
(11, 'rent'),
(13, 'sell'),
(13, 'swap'),
(13, 'rent'),
(16, 'sell'),
(16, 'rent'),
(17, 'sell'),
(18, 'sell'),
(18, 'swap'),
(18, 'rent'),
(20, 'sell'),
(20, 'swap'),
(20, 'rent'),
(21, 'sell'),
(21, 'swap'),
(24, 'sell'),
(24, 'swap');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionid` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
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
  `rating` float NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirmed` int(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `studentid`, `email`, `firstname`, `lastname`, `roomno`, `wing`, `rating`, `password`, `confirmed`) VALUES
('abc', 201001199, 'vrp101@gmail.co.in', 'Vishrut', 'Patel', 117, 'A', 5, 'webmail', 0),
('Arun', 201001111, 'arungupta@gmail.com', 'Arun ', 'GUpta', 110, 'A', 5, 'arungupta', 0),
('vedang', 200801135, 'vrp101@gmail.coms', 'V', 'P', 219, 'A', 5, 'abcdef', 0),
('vi', 201001194, 'vrp101@gmail.co', 'Vishrut', 'Patel', 117, 'A', 5, 'aaaaaa', 0),
('vish', 201001195, '201001193@daiict.ac.in', 'Vishrutk', 'l', 117, 'A', 5, 'abcdef', 0),
('vishrut', 201001193, 'vrp101@gmail.com', 'Vishrut', 'Patel', 117, 'F', 5, 'aaaaaa', 1);

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
  ADD CONSTRAINT `offerdetails_ibfk_10` FOREIGN KEY (`offereditem1`) REFERENCES `inventory` (`itemid`),
  ADD CONSTRAINT `offerdetails_ibfk_11` FOREIGN KEY (`offereditem2`) REFERENCES `inventory` (`itemid`),
  ADD CONSTRAINT `offerdetails_ibfk_12` FOREIGN KEY (`offereditem3`) REFERENCES `inventory` (`itemid`),
  ADD CONSTRAINT `offerdetails_ibfk_13` FOREIGN KEY (`offereditem4`) REFERENCES `inventory` (`itemid`),
  ADD CONSTRAINT `offerdetails_ibfk_14` FOREIGN KEY (`sellingitem`) REFERENCES `inventory` (`itemid`),
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
