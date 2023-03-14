-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 01, 2023 at 05:07 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pointofsaledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblactivitylog`
--

CREATE TABLE IF NOT EXISTS `tblactivitylog` (
  `activityId` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`activityId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbladjustment`
--

CREATE TABLE IF NOT EXISTS `tbladjustment` (
  `adjustmentId` int(11) NOT NULL AUTO_INCREMENT,
  `adjust_invoice` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `invoiceId` varchar(255) NOT NULL,
  `supplierId` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `inventoryId` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `cost` decimal(25,2) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `adjustment_type` varchar(255) NOT NULL,
  `qty` decimal(25,2) NOT NULL,
  `totalcost` decimal(25,2) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`adjustmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=660 ;

--
-- Dumping data for table `tbladjustment`
--

INSERT INTO `tbladjustment` (`adjustmentId`, `adjust_invoice`, `userId`, `invoiceId`, `supplierId`, `supplier`, `inventoryId`, `productcode`, `productname`, `category`, `unit`, `cost`, `price`, `adjustment_type`, `qty`, `totalcost`, `expirydate`, `status`) VALUES
(650, '224915', 4, '2206271', '19', 'JOHN', 59, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '9.00', '10.00', 'Subtraction', '11111.00', '99999.00', '02/09/2022', 'adjusted'),
(652, '2241499', 4, '2206271', '19', 'JOHN', 59, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '9.00', '10.00', 'Addition', '11111.00', '99999.00', '02/09/2022', 'adjusted'),
(654, '2246429', 4, '2206271', '19', 'JOHN', 59, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '9.00', '10.00', 'Subtraction', '11111.00', '99999.00', '02/09/2022', 'adjusted'),
(655, '2247407', 4, '22010260', '15', 'HAMJA', 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '9.00', '10.00', 'Subtraction', '50.00', '450.00', '02/09/2023', 'adjusted'),
(656, '2247407', 4, '2206271', '19', 'JOHN', 59, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '9.00', '10.00', 'Subtraction', '11111.00', '99999.00', '02/09/2022', 'adjusted'),
(657, '2244246', 4, '22010260', '15', 'HAMJA', 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '9.00', '10.00', 'Subtraction', '50.00', '450.00', '02/09/2023', 'adjusted'),
(658, '2247728', 4, '22010260', '15', 'HAMJA', 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '9.00', '10.00', 'Addition', '50.00', '450.00', '02/09/2023', 'adjusted'),
(659, '', 4, '22439971', '0', 'HAMJA', 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '10.00', '15.00', 'Addition', '1.00', '15.00', '', 'adjusting');

-- --------------------------------------------------------

--
-- Table structure for table `tbladjustment_merge`
--

CREATE TABLE IF NOT EXISTS `tbladjustment_merge` (
  `adjustment_mergeId` int(11) NOT NULL AUTO_INCREMENT,
  `adjustby` varchar(255) NOT NULL,
  `invoiceId` varchar(255) NOT NULL,
  `adjustmentdate` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `totalitem` int(11) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `totalcost` decimal(25,2) NOT NULL,
  PRIMARY KEY (`adjustment_mergeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbladjustment_merge`
--

INSERT INTO `tbladjustment_merge` (`adjustment_mergeId`, `adjustby`, `invoiceId`, `adjustmentdate`, `reference`, `details`, `totalitem`, `totalqty`, `totalcost`) VALUES
(26, '4', '224915', '02-04-2022', '', '', 1, 23, '207.00'),
(27, '4', '2241499', '02-04-2022', '', '', 1, 10, '90.00'),
(28, '4', '2246429', '02-04-2022', '', '', 1, 10, '90.00'),
(29, '4', '2247407', '02-04-2022', '', '', 2, 5, '45.00'),
(30, '4', '2244246', '02-04-2022', '', '', 1, 23, '207.00'),
(31, '4', '2247728', '02-09-2022', '', '', 1, 50, '450.00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE IF NOT EXISTS `tblcart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `cashierId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `cost` decimal(25,2) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(25,2) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`cartId`, `cashierId`, `productId`, `productcode`, `productname`, `category`, `unit`, `cost`, `price`, `qty`, `subtotal`, `expirydate`) VALUES
(1, 4, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '12.00', '25.00', 1, '25.00', '02/01/2022'),
(2, 4, 75, '919123241211.1', 'BUTTER COCONUT 14G', 'GENERAL', 'PCS', '25.00', '30.50', 1, '30.50', ''),
(3, 4, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '25.00', '30.25', 3, '90.75', ''),
(4, 4, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '10.00', '15.00', 2, '30.00', ''),
(5, 4, 77, 'jan0102', 'BURGER ', 'BREAD', 'PCS', '1.00', '2.50', 2, '5.00', '05/26/2022');

-- --------------------------------------------------------

--
-- Table structure for table `tblcartreturn`
--

CREATE TABLE IF NOT EXISTS `tblcartreturn` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `cashierId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(25,2) NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblcashregister`
--

CREATE TABLE IF NOT EXISTS `tblcashregister` (
  `cashregisterId` int(11) NOT NULL AUTO_INCREMENT,
  `cashierId` int(11) NOT NULL,
  `cash_drawer` decimal(25,2) NOT NULL,
  `cash_sales` decimal(25,2) NOT NULL,
  `subtotal_sale` decimal(25,2) NOT NULL,
  `discount_sales` decimal(25,2) NOT NULL,
  `credit_sale` decimal(25,2) NOT NULL,
  `total_sale` decimal(25,2) NOT NULL,
  `total_expense` decimal(25,2) NOT NULL,
  `return_sale` decimal(25,2) NOT NULL,
  `total_cash` decimal(25,2) NOT NULL,
  `actual_cash` decimal(25,2) NOT NULL,
  `variance` decimal(25,2) NOT NULL,
  `sales_note` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`cashregisterId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tblcashregister`
--

INSERT INTO `tblcashregister` (`cashregisterId`, `cashierId`, `cash_drawer`, `cash_sales`, `subtotal_sale`, `discount_sales`, `credit_sale`, `total_sale`, `total_expense`, `return_sale`, `total_cash`, `actual_cash`, `variance`, `sales_note`, `start_date`, `end_date`, `status`) VALUES
(8, 4, '1000.00', '30.00', '120.00', '1.00', '0.00', '119.00', '0.00', '0.00', '119.00', '0.00', '119.00', 'Sales note!', '02/17/2022', '03/02/2022', 'cashout'),
(9, 4, '100.00', '30.00', '120.00', '1.00', '0.00', '119.00', '0.00', '0.00', '119.00', '0.00', '119.00', 'Sales note!', '03/01/2022', '03/02/2022', 'cashout'),
(10, 4, '150.00', '30.00', '120.00', '1.00', '0.00', '119.00', '0.00', '0.00', '119.00', '0.00', '119.00', 'Sales note!', '03/02/2022', '03/02/2022', 'cashout'),
(11, 4, '90.00', '30.00', '120.00', '1.00', '0.00', '119.00', '0.00', '0.00', '119.00', '0.00', '119.00', 'Sales note!', '03/02/2022', '03/02/2022', 'cashout'),
(12, 4, '900.00', '858.00', '1758.00', '1.00', '0.00', '1757.00', '0.00', '0.00', '1757.00', '1757.00', '0.00', 'Sales note!', '03/02/2022', '03/02/2022', 'cashout'),
(13, 4, '100.00', '886.00', '986.00', '1.00', '0.00', '985.00', '0.00', '0.00', '985.00', '985.00', '0.00', 'Sales note!', '03/02/2022', '03/03/2022', 'cashout'),
(14, 4, '100.00', '108.00', '208.00', '0.00', '0.00', '208.00', '0.00', '0.00', '208.00', '1000.00', '-792.00', 'Sales note!', '03/03/2022', '03/03/2022', 'cashout'),
(15, 4, '100.00', '108.00', '208.00', '0.00', '0.00', '208.00', '0.00', '0.00', '208.00', '208.00', '0.00', 'Sales note!', '03/03/2022', '03/03/2022', 'cashout'),
(16, 4, '0.00', '108.00', '208.00', '0.00', '0.00', '208.00', '0.00', '0.00', '208.00', '3950.00', '3742.00', 'Sales note!', '03/03/2022', '03/09/2022', 'cashout'),
(17, 4, '-1.00', '108.00', '208.00', '0.00', '0.00', '208.00', '0.00', '0.00', '208.00', '3950.00', '3742.00', 'Sales note!', '03/03/2022', '03/09/2022', 'cashout'),
(18, 4, '-1.00', '108.00', '208.00', '0.00', '0.00', '208.00', '0.00', '0.00', '208.00', '3950.00', '3742.00', 'Sales note!', '03/03/2022', '03/09/2022', 'cashout'),
(19, 4, '100.00', '108.00', '208.00', '0.00', '0.00', '208.00', '0.00', '0.00', '208.00', '3950.00', '3742.00', 'Sales note!', '03/03/2022', '03/09/2022', 'cashout'),
(20, 4, '1000.00', '100.00', '1100.00', '0.00', '0.00', '1100.00', '0.00', '0.00', '1100.00', '6261.00', '5161.00', 'Sales note!', '03/09/2022', '03/09/2022', 'cashout'),
(21, 4, '100.00', '950.00', '1050.00', '0.00', '0.00', '1050.00', '0.00', '0.00', '1050.00', '1700.00', '650.00', 'Sales note!', '03/09/2022', '03/15/2022', 'cashout'),
(22, 4, '100.00', '1207.25', '1307.25', '0.00', '0.00', '1307.25', '0.00', '0.00', '1307.25', '12312312000.00', '12312310692.75', 'Sales note!', '03/15/2022', '03/15/2022', 'cashout'),
(23, 4, '100.00', '70.75', '170.75', '0.00', '0.00', '170.75', '0.00', '0.00', '170.75', '500.00', '329.25', 'Sales note!', '03/15/2022', '03/15/2022', 'cashout'),
(24, 4, '900.00', '651.25', '1551.25', '0.00', '0.00', '1551.25', '0.00', '0.00', '1551.25', '2800.00', '1248.75', 'Sales note!', '03/15/2022', '03/22/2022', 'cashout'),
(25, 4, '1000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '03/22/2022', '', 'cashin');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE IF NOT EXISTS `tblcategory` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `categoryStatus` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`categoryId`, `category`, `code`, `categoryStatus`) VALUES
(1, 'FRUITS', 'J0001231', 'Active'),
(2, 'BREAD', 'J1231', 'Active'),
(3, 'MILK', '0120312', ''),
(4, 'DIAPER', 'J01230123', ''),
(5, 'GENERAL', 'J87238', ''),
(6, 'MEDICINE', 'J53596', ''),
(7, 'APPLIANCES', 'J83692', ''),
(8, 'TOOLS', 'J32913', ''),
(9, 'SCHOOL', 'J1393', ''),
(10, 'COFFEE', 'J35835', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcredititem`
--

CREATE TABLE IF NOT EXISTS `tblcredititem` (
  `credititemId` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceId` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  PRIMARY KEY (`credititemId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblcredititem_merge`
--

CREATE TABLE IF NOT EXISTS `tblcredititem_merge` (
  `credititem_mergeId` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `invoiceId` int(11) NOT NULL,
  `invoicesold` varchar(255) NOT NULL,
  `customerId` int(11) NOT NULL,
  `cashierId` int(11) NOT NULL,
  `paying_balance` decimal(25,2) NOT NULL,
  `cash_tender` decimal(25,2) NOT NULL,
  `amountpaid` decimal(25,2) NOT NULL,
  `balance` decimal(25,2) NOT NULL,
  `onchange` decimal(25,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`credititem_mergeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tblcredititem_merge`
--

INSERT INTO `tblcredititem_merge` (`credititem_mergeId`, `date`, `invoiceId`, `invoicesold`, `customerId`, `cashierId`, `paying_balance`, `cash_tender`, `amountpaid`, `balance`, `onchange`, `status`) VALUES
(2, '01-09-2022', 22094837, '670737', 0, 0, '10.50', '7.00', '7.00', '3.50', '0.00', 'Active'),
(3, '01-09-2022', 2209337, '670737', 6, 0, '3.50', '1.00', '1.00', '2.50', '0.00', 'Active'),
(4, '01-09-2022', 22015537, '634432', 6, 0, '3.50', '3.50', '0.00', '0.00', '0.00', 'Active'),
(5, '01-09-2022', 22071437, '639335', 6, 0, '3.50', '3.50', '0.00', '0.00', '0.00', 'Active'),
(6, '01-09-2022', 22096937, '639335', 6, 0, '3.50', '3.50', '0.00', '0.00', '0.00', 'Active'),
(7, '01-09-2022', 22016837, '639335', 6, 0, '3.50', '0.00', '-3.50', '0.00', '0.00', 'Active'),
(8, '01-09-2022', 22096437, '639335', 6, 0, '7.00', '2.00', '2.00', '5.00', '0.00', 'Active'),
(9, '01-09-2022', 22078037, '670737', 6, 0, '2.50', '1.00', '1.00', '1.50', '0.00', 'Active'),
(10, '01-09-2022', 22029139, '637739', 6, 0, '3.50', '3.00', '3.00', '0.50', '0.00', 'Active'),
(11, '01-09-2022', 22036239, '637739', 6, 0, '0.50', '5.00', '4.50', '0.00', '4.50', 'Active'),
(12, '03-09-2022', 22077989, '22495', 2, 0, '4.00', '5.00', '1.00', '0.00', '1.00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE IF NOT EXISTS `tblcustomer` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `maxbalance` decimal(25,2) NOT NULL,
  `remainingbalance` decimal(25,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`customerId`, `fullname`, `gender`, `address`, `number`, `maxbalance`, `remainingbalance`, `status`, `date`) VALUES
(1, 'Anisa, Abdulkadir', 'Female', 'Lamitan', '090090', '1000.00', '0.00', 'Active', ''),
(2, 'Jakilan, Hamja', 'Male', 'Rizal Avenue', '09066689657', '1000.00', '0.00', 'active', ''),
(3, 'asd', 'asda', 'asdas', '34344', '4343.00', '0.00', 'Deleted', ''),
(4, 'asd', 'asdas', 'dasdasd', '323', '23232.00', '0.00', 'Deleted', ''),
(6, 'Parhana A. Jakilan', 'FEMALE', 'Lamitna', '09090900', '1000.00', '1000.00', 'Active', '04-01-2022'),
(7, 'Vincent', 'MALE', 'Lamitan city', '09066689651', '1000.00', '1000.00', 'Active', '05-02-2022'),
(8, 'Walk-in', '', '', '', '0.00', '0.00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE IF NOT EXISTS `tblexpense` (
  `expId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `createdby` varchar(255) NOT NULL,
  `Details` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `amount` decimal(25,2) NOT NULL,
  `dateofexp` varchar(255) NOT NULL,
  `expstatus` varchar(255) NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`expId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`expId`, `userId`, `createdby`, `Details`, `category`, `amount`, `dateofexp`, `expstatus`, `Active`) VALUES
(1, 4, 'Hamja Jakilan1', ' sadas', 'Other', '100.00', '02/12/2022', 'added', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblholditem`
--

CREATE TABLE IF NOT EXISTS `tblholditem` (
  `holdId` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `holdname` varchar(255) NOT NULL,
  `cashierId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `cost` decimal(25,2) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(25,2) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  `onhold` int(11) NOT NULL,
  PRIMARY KEY (`holdId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tblholditem`
--

INSERT INTO `tblholditem` (`holdId`, `date`, `holdname`, `cashierId`, `productId`, `productcode`, `productname`, `category`, `unit`, `cost`, `price`, `qty`, `subtotal`, `expirydate`, `onhold`) VALUES
(32, 'May 24, 2022, 2:43 pm', 'hold#1', 4, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '25.00', '30.25', 1, '30.25', '', 0),
(33, 'May 24, 2022, 2:43 pm', 'hold#1', 4, 75, '919123241211.1', 'BUTTER COCONUT 14G', 'GENERAL', 'PCS', '25.00', '30.50', 1, '30.50', '', 0),
(34, 'May 24, 2022, 2:43 pm', 'hold#1', 4, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '12.00', '25.00', 1, '25.00', '02/01/2022', 0),
(35, 'May 26, 2022, 9:26 am', 'hold#123', 4, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '25.00', '30.25', 1, '30.25', '', 0),
(36, 'May 26, 2022, 9:26 am', 'hold#123', 4, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '10.00', '15.00', 1, '15.00', '', 0),
(37, 'May 26, 2022, 9:26 am', 'hold#123', 4, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '12.00', '25.00', 1, '25.00', '02/01/2022', 0),
(38, 'June 10, 2022, 2:22 pm', 'HOLD#101', 4, 75, '919123241211.1', 'BUTTER COCONUT 14G', 'GENERAL', 'PCS', '25.00', '30.50', 1, '30.50', '', 0),
(39, 'June 10, 2022, 2:22 pm', 'HOLD#101', 4, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '12.00', '25.00', 1, '25.00', '02/01/2022', 0),
(40, 'June 10, 2022, 2:22 pm', 'HOLD#101', 4, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '25.00', '30.25', 1, '30.25', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblholditem_merge`
--

CREATE TABLE IF NOT EXISTS `tblholditem_merge` (
  `holditem_mergeId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `invoiceId` int(11) NOT NULL,
  `cashierId` int(11) NOT NULL,
  `hold_date` varchar(255) NOT NULL,
  `totalitem` int(11) NOT NULL,
  `totalprice` decimal(25,2) NOT NULL,
  `discount` decimal(25,2) NOT NULL,
  `grandtotal` decimal(25,2) NOT NULL,
  `totaldue` decimal(25,2) NOT NULL,
  `amountpaid` decimal(25,2) NOT NULL,
  `balance` decimal(25,2) NOT NULL,
  `holdstatus` varchar(255) NOT NULL,
  PRIMARY KEY (`holditem_mergeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE IF NOT EXISTS `tblinventory` (
  `inventoryId` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceId` varchar(255) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `batchnumber` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `cost` decimal(25,2) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `soldqty` int(11) NOT NULL,
  `remainingqty` int(11) NOT NULL,
  `totalcost` decimal(25,2) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`inventoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`inventoryId`, `invoiceId`, `supplierId`, `supplier`, `reference`, `batchnumber`, `productcode`, `productname`, `category`, `unit`, `cost`, `price`, `totalqty`, `soldqty`, `remainingqty`, `totalcost`, `expirydate`, `status`) VALUES
(60, '22010260', 0, '', 'OR#5', 1, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '9.00', '10.00', 51, -1390, 0, '432.00', '02/09/2023', 'stockin'),
(61, '22489561', 0, '', 'OR#7', 1, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '2.00', '3.00', 2, -10, 0, '5.00', '06/30/2022', 'stockin'),
(63, '22451563', 20, 'CARL', '', 1, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '12.00', '25.00', 25, -3, 0, '300.00', '02/01/2022', 'stockin'),
(64, '22483564', 0, '', '', 1, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '9.00', '10.00', 100, 58, 0, '900.00', '02/09/2023', 'stockin'),
(65, '22483564', 0, '', '', 1, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '2.00', '3.00', 100, -154, 0, '200.00', '06/30/2022', 'stockin'),
(66, '22483564', 0, '', '', 1, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '12.00', '25.00', 1000, -490, 726, '12000.00', '02/01/2022', 'stockin'),
(67, '22488567', 0, '', '', 231, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '2.50', '3.00', 20, -60, 0, '50.00', '03/25/2022', 'stockin'),
(68, '22488567', 0, '', '', 145, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '9.00', '10.00', 1, 1, 0, '9.00', '02/09/2023', 'stockin'),
(69, '22419469', 0, '', '23123', 0, 'jan0102', 'BURGER ', 'BREAD', 'PCS', '1.00', '2.50', 20, -18, 0, '20.00', '04/24/2022', 'editing'),
(70, '22419469', 0, '', '23123', 0, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '2.50', '3.00', 33, -33, 0, '82.50', '03/25/2022', 'editing'),
(71, '22439971', 0, '', 'J-0001', 0, '67910', 'TAWAS 50G', 'Other', 'PCS', '10.00', '15.00', 100, 36, 64, '1000.00', '', 'stockin'),
(72, '2245872', 0, '', 'OR#123', 24565, '89111', 'HAIR WAX LIGHTNESS 100ML', 'GENERAL', 'PCS', '50.25', '70.75', 10, 2, 0, '502.50', '', 'stockin'),
(73, '22429973', 0, '', 'OR0123', 0, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '25.00', '30.25', 55, 11, 20, '1375.00', '', 'stockin'),
(75, '22480075', 0, '', 'OR#123', 0, '919123241211.1', 'BUTTER COCONUT 14G', 'GENERAL', 'PCS', '25.00', '30.50', 500, -9, 509, '12500.00', '', 'stockin'),
(76, '22474676', 0, '', 'OR#1234', 0, 'jan0102', 'BURGER ', 'BREAD', 'PCS', '1.00', '2.50', 10, 0, 10, '10.00', '', 'stockin'),
(77, '22468477', 0, '', 'OR#124_1', 0, 'jan0102', 'BURGER ', 'BREAD', 'PCS', '1.00', '2.50', 20, 4, 16, '20.00', '05/26/2022', 'stockin');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory_merge`
--

CREATE TABLE IF NOT EXISTS `tblinventory_merge` (
  `inventorymergeId` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceId` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `purchasedate` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `supId` int(11) NOT NULL,
  `supname` varchar(255) NOT NULL,
  `totalitem` int(11) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `totalcost` decimal(25,2) NOT NULL,
  `discount` decimal(25,2) NOT NULL,
  `grandtotal` decimal(25,2) NOT NULL,
  `amountpaid` decimal(25,2) NOT NULL,
  `paid` decimal(25,2) NOT NULL,
  `balance` decimal(25,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `purchaseBy` varchar(255) NOT NULL,
  PRIMARY KEY (`inventorymergeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tblinventory_merge`
--

INSERT INTO `tblinventory_merge` (`inventorymergeId`, `invoiceId`, `reference`, `purchasedate`, `description`, `supId`, `supname`, `totalitem`, `totalqty`, `totalcost`, `discount`, `grandtotal`, `amountpaid`, `paid`, `balance`, `status`, `purchaseBy`) VALUES
(25, '2204991', 'OR#2', '02-02-2022', '', 17, 'asdsasd', 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', '20.00', 'Receive', '0'),
(26, '22093458', 'asds', '02-02-2022', 'asd', 19, 'JOHN', 1, 1, '2.00', '0.00', '2.00', '0.00', '0.00', '2.00', 'Pending', '0'),
(27, '2206271', 'OR#1', '02-03-2022', '', 19, 'JOHN', 1, 100, '900.00', '0.00', '900.00', '0.00', '0.00', '3726.00', 'Order', '0'),
(28, '22010260', 'OR#5', '02-03-2022', '', 15, 'HAMJA', 1, 5, '45.00', '0.00', '45.00', '0.00', '0.00', '432.00', 'Order', '0'),
(29, '22489561', 'OR#7', '02-04-2022', '', 19, 'JOHN', 1, 1, '2.00', '0.00', '2.00', '0.00', '0.00', '5.00', 'Receive', '0'),
(30, '22461462', 'ORE#90909', '02-04-2022', '', 19, 'JOHN', 1, 1, '9.00', '0.00', '9.00', '0.00', '0.00', '9.00', 'Pending', '4'),
(31, '22451563', '', '02-06-2022', '', 20, 'CARL', 0, 25, '300.00', '0.00', '300.00', '300.00', '0.00', '0.00', 'Receive', '4'),
(32, '22483564', '', '02-11-2022', '', 0, '', 3, 1200, '13100.00', '0.00', '13100.00', '0.00', '0.00', '13100.00', 'Order', '4'),
(33, '22488567', '01230', '03-08-2022', '', 15, 'HAMJA', 0, 21, '59.00', '0.00', '59.00', '59.00', '0.00', '0.00', 'Receive', '4'),
(34, '22419469', '23123', '03-09-2022', '', 0, 'HAMJA', 2, 53, '102.50', '0.00', '102.50', '0.00', '0.00', '102.50', 'Pending', '4'),
(35, '22439971', 'J-0001', '03-09-2022', 'DEMO PURCHASE', 0, 'HAMJA', 1, 100, '1000.00', '0.00', '1000.00', '0.00', '0.00', '1000.00', 'Receive', '4'),
(36, '2245872', 'OR#123', '03-15-2022', '', 0, 'JOHN', 1, 10, '502.50', '0.00', '502.50', '0.00', '0.00', '502.50', 'Receive', '4'),
(37, '22429973', 'OR0123', '03-16-2022', '', 0, 'JOHN', 1, 55, '1375.00', '0.00', '1375.00', '0.00', '0.00', '1375.00', 'Receive', '4'),
(39, '22480075', 'OR#123', '05-08-2022', '', 19, 'JOHN', 1, 500, '12500.00', '0.00', '12500.00', '0.00', '0.00', '12500.00', 'Receive', '4'),
(40, '22474676', 'OR#1234', '05-08-2022', 'details', 15, 'HAMJA', 1, 10, '10.00', '0.00', '10.00', '0.00', '0.00', '10.00', 'Receive', '4'),
(41, '22468477', 'OR#124_1', '05-08-2022', '', 15, 'HAMJA', 1, 20, '20.00', '0.00', '20.00', '0.00', '0.00', '20.00', 'Receive', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment_history`
--

CREATE TABLE IF NOT EXISTS `tblpayment_history` (
  `paymentId` int(11) NOT NULL AUTO_INCREMENT,
  `paidby` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `total` decimal(25,2) NOT NULL,
  `cashtend` decimal(25,2) NOT NULL,
  `paid` decimal(25,2) NOT NULL,
  `balance` decimal(25,2) NOT NULL,
  PRIMARY KEY (`paymentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblpayment_history`
--

INSERT INTO `tblpayment_history` (`paymentId`, `paidby`, `supplier`, `payment_type`, `reference`, `date`, `total`, `cashtend`, `paid`, `balance`) VALUES
(1, '0', '', 'Purchase', 'Ref#1', '01-21-2022', '0.00', '1.00', '1.00', '199.00'),
(2, '0', '', 'Purchase', 'Ref#1', '01-21-2022', '0.00', '2.00', '2.00', '197.00'),
(3, '0', '', 'Purchase', 'Ref#1', '01-21-2022', '0.00', '1.00', '1.00', '196.00'),
(4, '0', '', 'Purchase', 'Ref#1', '01-21-2022', '0.00', '34.00', '34.00', '162.00'),
(5, '0', '', 'Purchase', 'Ref#1', '01-21-2022', '162.00', '23.00', '23.00', '139.00'),
(6, '0', '', 'Purchase', 'Ref#1', '01-21-2022', '139.00', '100.00', '100.00', '39.00'),
(7, '0', '', 'Purchase', 'Ref#1', '01-22-2022', '39.00', '12.00', '12.00', '27.00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpincode`
--

CREATE TABLE IF NOT EXISTS `tblpincode` (
  `pinId` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`pinId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblpincode`
--

INSERT INTO `tblpincode` (`pinId`, `code`, `status`) VALUES
(1, '123', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE IF NOT EXISTS `tblproduct` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `supId` varchar(11) NOT NULL,
  `supname` varchar(255) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `proname` varchar(255) NOT NULL,
  `secondname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `prounit` varchar(255) NOT NULL,
  `cost` decimal(25,2) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `alertqty` int(11) NOT NULL,
  `expiredate` varchar(255) NOT NULL,
  `proimage` varchar(255) NOT NULL,
  `productstatus` varchar(255) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`productId`, `supId`, `supname`, `productcode`, `proname`, `secondname`, `category`, `prounit`, `cost`, `price`, `quantity`, `alertqty`, `expiredate`, `proimage`, `productstatus`) VALUES
(2, '####', 'JANN BAKERY MERCHANDISE', 'JAN0101', 'PANDESAL(S)', 'BAKE', 'BREAD', 'BOX', '2.50', '3.00', 0, 100, '03/25/2022', 'blankpicture.png', 'Updated'),
(3, '####', 'JAN MERCHANDISE', 'jan0102', 'BURGER ', 'BREAD', 'BREAD', 'PCS', '1.00', '2.50', 0, 50, '05/27/2022', 'blankpicture.png', 'Added'),
(4, '####', '', 'COKE001', 'COCA-COLA 12oz', 'Other', 'Other', 'PCS', '9.00', '10.00', 0, 50, '02/09/2023', 'noproduct.png', 'Updated'),
(5, '0', '0', 'J0001', 'MAGGI KARI', 'MAGGI KARI', 'Other', 'PCS', '12.00', '25.00', 0, 10, '02/01/2022', 'noproduct.png', 'Added'),
(9, '0', '0', '8850007010852', 'JOHNSON 100G', 'POWDER', 'Other', 'PCS', '15.50', '30.50', 0, 25, '04/30/2022', 'noproduct.png', 'Added'),
(10, '####', '', 'TAWAS 50G', 'TAWAS', 'Other', 'Other', 'PCS', '10.00', '15.00', 0, 100, '0', 'noproduct.png', 'Updated'),
(11, '0', '0', '89111', 'HAIR WAX LIGHTNESS 100ML', 'LIGHTNESS ', 'GENERAL', 'PCS', '50.25', '70.75', 0, 100, '0', 'noproduct.png', 'Added'),
(12, '####', '', '919123241211.1', 'BUTTER COCONUT 14G', 'BUTTER ', 'GENERAL', 'PCS', '25.00', '30.50', 0, 100, '0', 'noproduct.png', 'Updated'),
(13, '0', '0', '74213', 'QUICKIE INSTANT CUP MAMI', 'QUICKIE', 'GENERAL', 'PCS', '25.00', '30.25', 0, 10, '0', 'noproduct.png', 'Added');

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchase`
--

CREATE TABLE IF NOT EXISTS `tblpurchase` (
  `purchaseId` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseBy` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `supId` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `cost` decimal(12,2) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `soldqty` int(11) NOT NULL,
  `remainingqty` int(11) NOT NULL,
  `totalcost` decimal(25,2) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  `batchnumber` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`purchaseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblpurchase`
--

INSERT INTO `tblpurchase` (`purchaseId`, `purchaseBy`, `reference`, `supId`, `productcode`, `productname`, `category`, `unit`, `cost`, `price`, `totalqty`, `soldqty`, `remainingqty`, `totalcost`, `expirydate`, `batchnumber`, `status`) VALUES
(5, 4, '', 1, 'jan0102', 'BURGER ', 'BREAD', 'PCS', '1.00', '2.50', 1, 0, 1, '1.00', '05/27/2022', '', 'Adding'),
(6, 4, '', 1, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '2.50', '3.00', 1, 0, 1, '2.50', '', '', 'Adding');

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchase_return`
--

CREATE TABLE IF NOT EXISTS `tblpurchase_return` (
  `purchaseId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productdescription` varchar(255) NOT NULL,
  PRIMARY KEY (`purchaseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblreturnitem`
--

CREATE TABLE IF NOT EXISTS `tblreturnitem` (
  `returnId` int(11) NOT NULL AUTO_INCREMENT,
  `cashierId` int(11) NOT NULL,
  `invoiceId` varchar(255) NOT NULL,
  `invoicesold` int(11) NOT NULL,
  `inventoryId` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(25,2) NOT NULL,
  `date` varchar(255) NOT NULL,
  `stockstatus` varchar(255) NOT NULL,
  PRIMARY KEY (`returnId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblreturnitem`
--

INSERT INTO `tblreturnitem` (`returnId`, `cashierId`, `invoiceId`, `invoicesold`, `inventoryId`, `productcode`, `productname`, `category`, `unit`, `expirydate`, `price`, `qty`, `subtotal`, `date`, `stockstatus`) VALUES
(6, 0, '224-3815', 224741, 0, 'COKE001', 'COCA-COLA 12oz', '', 'PCS', '', '10.00', 1, '10.00', '08/02/2022', 'Returning'),
(7, 4, '224-4710', 224841, 0, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '', '10.00', 1, '10.00', '08/02/2022', 'Returning'),
(8, 4, '224-684', 224220, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '10.00', 1, '10.00', '08/02/2022', 'Returning'),
(9, 4, '224-6930', 224491, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '10.00', 1, '10.00', '08/02/2022', 'Returning'),
(10, 4, '224-3958', 224222, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '10.00', 2, '20.00', '02/12/2022', 'Returning'),
(11, 4, '224-7751', 224222, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '10.00', 1, '10.00', '02/12/2022', 'Returning');

-- --------------------------------------------------------

--
-- Table structure for table `tblreturnitem_merge`
--

CREATE TABLE IF NOT EXISTS `tblreturnitem_merge` (
  `returnitem_mergeId` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceId` varchar(255) NOT NULL,
  `invoicesold` varchar(255) NOT NULL,
  `customerId` int(11) NOT NULL,
  `cashierId` int(11) NOT NULL,
  `returndate` varchar(255) NOT NULL,
  `totalitem` int(11) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `totalrefund` decimal(25,2) NOT NULL,
  `previousbalance` decimal(25,2) NOT NULL,
  `amountrefund` decimal(25,2) NOT NULL,
  `balance` decimal(25,2) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`returnitem_mergeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblreturnitem_merge`
--

INSERT INTO `tblreturnitem_merge` (`returnitem_mergeId`, `invoiceId`, `invoicesold`, `customerId`, `cashierId`, `returndate`, `totalitem`, `totalqty`, `totalrefund`, `previousbalance`, `amountrefund`, `balance`, `reason`, `status`, `Active`) VALUES
(6, '224-3815', '', 0, 4, '08/02/2022', 1, 1, '10.00', '0.00', '10.00', '0.00', '', 'Active', 0),
(7, '224-4710', '', 0, 4, '08/02/2022', 1, 1, '10.00', '0.00', '10.00', '0.00', '', 'Active', 0),
(8, '224-684', '', 0, 4, '08/02/2022', 1, 1, '10.00', '0.00', '10.00', '0.00', '', 'Active', 0),
(9, '224-6930', '', 0, 4, '08/02/2022', 1, 1, '10.00', '0.00', '10.00', '0.00', 'change of item', 'Active', 0),
(10, '224-3958', '224222', 0, 4, '02/12/2022', 1, 2, '20.00', '0.00', '20.00', '0.00', '', 'Active', 0),
(11, '224-7751', '224222', 0, 4, '02/12/2022', 1, 1, '10.00', '0.00', '10.00', '0.00', '', 'Active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsolditem`
--

CREATE TABLE IF NOT EXISTS `tblsolditem` (
  `solditemId` int(11) NOT NULL AUTO_INCREMENT,
  `cashierId` int(11) NOT NULL,
  `inventoryId` int(11) NOT NULL,
  `invoiceId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `expirydate` varchar(255) NOT NULL,
  `cost` decimal(25,2) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(25,2) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `revenue` decimal(25,2) NOT NULL,
  `totalcost` decimal(25,2) NOT NULL,
  `margin` decimal(25,2) NOT NULL,
  `date` varchar(255) NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`solditemId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=184 ;

--
-- Dumping data for table `tblsolditem`
--

INSERT INTO `tblsolditem` (`solditemId`, `cashierId`, `inventoryId`, `invoiceId`, `productId`, `productcode`, `productname`, `category`, `unit`, `expirydate`, `cost`, `price`, `qty`, `subtotal`, `payment_type`, `revenue`, `totalcost`, `margin`, `date`, `Active`) VALUES
(18, 0, 0, 224741, 60, 'COKE001', 'COCA-COLA 12oz', '', 'PCS', '02/09/2023', '0.00', '10.00', 4, '40.00', '', '50.00', '45.00', '5.00', '08-02-2022', 0),
(19, 0, 0, 2241, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '0.00', '10.00', 1, '10.00', '', '10.00', '9.00', '1.00', '08-02-2022', 0),
(20, 0, 0, 224841, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 0, '0.00', '', '0.00', '0.00', '0.00', '08-02-2022', 0),
(21, 0, 0, 224220, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 2, '40.00', '', '20.00', '9.00', '11.00', '08-02-2022', 0),
(22, 0, 0, 22431, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 4, '80.00', '', '30.00', '0.00', '30.00', '08-02-2022', 0),
(23, 0, 0, 22431, 63, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 4, '200.00', '', '75.00', '0.00', '75.00', '08-02-2022', 0),
(24, 0, 0, 224491, 59, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/06/2022', '9.00', '10.00', 2, '20.00', '', '20.00', '18.00', '2.00', '08-02-2022', 0),
(25, 0, 0, 224491, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 0, '10.00', '', '0.00', '0.00', '0.00', '08-02-2022', 0),
(26, 0, 0, 224644, 63, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', '', '25.00', '12.00', '13.00', '08-02-2022', 0),
(27, 0, 0, 22468, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '20.00', '', '0.00', '0.00', '0.00', '08-02-2022', 0),
(28, 0, 0, 22468, 63, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 11, '275.00', '', '275.00', '132.00', '143.00', '08-02-2022', 0),
(29, 0, 0, 22468, 61, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 8, '24.00', '', '24.00', '16.00', '8.00', '08-02-2022', 0),
(30, 0, 0, 224799, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 2, '20.00', '', '20.00', '18.00', '2.00', '08-02-2022', 0),
(31, 0, 0, 224799, 59, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/06/2022', '9.00', '10.00', 5, '50.00', '', '50.00', '45.00', '5.00', '08-02-2022', 0),
(32, 0, 0, 224799, 63, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 2, '50.00', '', '50.00', '24.00', '26.00', '08-02-2022', 0),
(33, 0, 0, 224799, 61, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 2, '6.00', '', '6.00', '4.00', '2.00', '08-02-2022', 0),
(34, 0, 0, 224788, 63, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 2, '50.00', '', '50.00', '24.00', '26.00', '09-02-2022', 0),
(35, 0, 0, 224894, 63, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', '', '25.00', '12.00', '13.00', '09-02-2022', 0),
(36, 0, 0, 22443, 63, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 2, '50.00', '', '50.00', '24.00', '26.00', '09-02-2022', 0),
(37, 0, 0, 224493, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 2, '20.00', '', '20.00', '18.00', '2.00', '09/02/2022', 0),
(38, 0, 0, 224799, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '09/02/2022', 0),
(39, 0, 0, 224449, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 23, '230.00', 'Cash', '230.00', '207.00', '23.00', '09/02/2022', 0),
(40, 0, 0, 224454, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Credit', '10.00', '9.00', '1.00', '09/02/2022', 0),
(41, 0, 0, 224663, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Credit', '10.00', '9.00', '1.00', '09/02/2022', 0),
(46, 0, 0, 224344, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 2, '20.00', 'Cash', '20.00', '18.00', '2.00', '02/10/2022', 0),
(47, 0, 0, 224296, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/10/2022', 0),
(48, 0, 0, 224622, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Credit', '10.00', '9.00', '1.00', '02/10/2022', 0),
(49, 0, 0, 22495, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '30.00', 'Credit', '10.00', '-9.00', '19.00', '02/10/2022', 0),
(50, 0, 0, 224826, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/11/2022', 0),
(51, 0, 0, 224985, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/11/2022', 0),
(52, 0, 0, 224845, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/11/2022', 0),
(53, 0, 0, 224892, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/11/2022', 0),
(54, 0, 0, 224431, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/11/2022', 0),
(55, 0, 0, 224344, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/11/2022', 0),
(56, 0, 0, 224911, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/11/2022', 0),
(57, 0, 0, 224641, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/11/2022', 0),
(58, 0, 0, 224135, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/11/2022', 0),
(59, 0, 0, 224170, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/11/2022', 0),
(60, 0, 0, 2244, 60, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 3, '30.00', 'Cash', '30.00', '27.00', '3.00', '02/11/2022', 0),
(61, 0, 0, 2244, 63, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '02/11/2022', 0),
(62, 0, 0, 224276, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '30.00', 'Cash', '20.00', '0.00', '20.00', '02/11/2022', 0),
(63, 0, 0, 224276, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 2, '9.00', 'Cash', '3.00', '2.00', '1.00', '02/11/2022', 0),
(64, 0, 0, 224276, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 0, '50.00', 'Cash', '25.00', '0.00', '25.00', '02/11/2022', 0),
(65, 0, 0, 224627, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 0, '3.00', 'Cash', '0.00', '0.00', '0.00', '02/11/2022', 0),
(66, 0, 0, 224823, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 0, '20.00', 'Cash', '10.00', '-9.00', '19.00', '02/12/2022', 0),
(67, 0, 0, 224676, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '20.00', 'Cash', '10.00', '9.00', '1.00', '02/12/2022', 0),
(68, 0, 0, 2249, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 3, '30.00', 'Cash', '30.00', '27.00', '3.00', '02/12/2022', 0),
(69, 0, 0, 224222, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 0, '40.00', 'Cash', '30.00', '-9.00', '39.00', '02/12/2022', 0),
(70, 0, 0, 224887, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 6, '18.00', 'Cash', '18.00', '12.00', '6.00', '02/13/2022', 0),
(71, 0, 0, 224887, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 5, '50.00', 'Cash', '50.00', '45.00', '5.00', '02/13/2022', 0),
(72, 0, 0, 224835, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/14/2022', 0),
(73, 0, 0, 224238, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 1, '3.00', 'Cash', '3.00', '2.00', '1.00', '02/14/2022', 0),
(74, 0, 0, 224238, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/14/2022', 0),
(75, 0, 0, 224286, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 1, '3.00', 'Cash', '3.00', '2.00', '1.00', '02/15/2022', 0),
(76, 0, 0, 224286, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/15/2022', 0),
(77, 0, 0, 224164, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 52, '520.00', 'Cash', '520.00', '468.00', '52.00', '02/17/2022', 0),
(78, 0, 0, 224164, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 13, '325.00', 'Cash', '325.00', '156.00', '169.00', '02/17/2022', 0),
(79, 0, 0, 224164, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 18, '54.00', 'Cash', '54.00', '36.00', '18.00', '02/17/2022', 0),
(80, 0, 0, 224815, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 20, '200.00', 'Cash', '200.00', '180.00', '20.00', '02/18/2022', 0),
(81, 0, 0, 224815, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 15, '375.00', 'Cash', '375.00', '180.00', '195.00', '02/18/2022', 0),
(82, 0, 0, 224815, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 13, '39.00', 'Cash', '39.00', '26.00', '13.00', '02/18/2022', 0),
(83, 0, 0, 224919, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 1, '3.00', 'Cash', '3.00', '2.00', '1.00', '02/18/2022', 0),
(84, 0, 0, 224919, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '02/18/2022', 0),
(85, 0, 0, 224233, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 1, '3.00', 'Cash', '3.00', '2.00', '1.00', '02/18/2022', 0),
(86, 0, 0, 224903, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 7, '175.00', 'Cash', '175.00', '84.00', '91.00', '02/22/2022', 0),
(87, 0, 0, 224903, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 9, '27.00', 'Cash', '27.00', '18.00', '9.00', '02/22/2022', 0),
(88, 0, 0, 224903, 64, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 8, '80.00', 'Cash', '80.00', '72.00', '8.00', '02/22/2022', 0),
(89, 0, 0, 224692, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 106, '2650.00', 'Cash', '2650.00', '1272.00', '1378.00', '03/02/2022', 0),
(90, 0, 0, 224543, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 1, '3.00', 'Cash', '3.00', '2.00', '1.00', '03/02/2022', 0),
(91, 0, 0, 22475, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/02/2022', 0),
(92, 0, 0, 224217, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/02/2022', 0),
(93, 0, 0, 22487, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 15, '375.00', 'Cash', '375.00', '180.00', '195.00', '03/02/2022', 0),
(94, 0, 0, 224160, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 15, '375.00', 'Cash', '375.00', '180.00', '195.00', '03/02/2022', 0),
(95, 0, 0, 224681, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/02/2022', 0),
(96, 0, 0, 224682, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 1, '3.00', 'Cash', '3.00', '2.00', '1.00', '03/02/2022', 0),
(97, 0, 0, 224352, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/02/2022', 0),
(98, 0, 0, 224985, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/02/2022', 0),
(99, 0, 0, 224985, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 1, '3.00', 'Cash', '3.00', '2.00', '1.00', '03/02/2022', 0),
(100, 0, 0, 224534, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/03/2022', 0),
(101, 0, 0, 224497, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 1, '3.00', 'Cash', '3.00', '2.00', '1.00', '03/03/2022', 0),
(102, 0, 0, 224497, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/03/2022', 0),
(103, 0, 0, 224156, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/03/2022', 0),
(104, 0, 0, 224218, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 10, '30.00', 'Cash', '30.00', '20.00', '10.00', '03/03/2022', 0),
(105, 0, 0, 224580, 65, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '06/30/2022', '2.00', '3.00', 32, '96.00', 'Cash', '96.00', '64.00', '32.00', '03/09/2022', 0),
(106, 0, 0, 224580, 69, 'jan0102', 'BURGER ', 'BREAD', 'PCS', '04/24/2022', '1.00', '2.50', 20, '50.00', 'Cash', '50.00', '20.00', '30.00', '03/09/2022', 0),
(107, 0, 0, 224580, 67, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '03/25/2022', '0.00', '3.00', 20, '60.00', 'Cash', '60.00', '50.00', '10.00', '03/09/2022', 0),
(108, 0, 0, 224580, 70, 'JAN0101', 'PANDESAL(S)', 'BREAD', 'BOX', '03/25/2022', '0.00', '3.00', 33, '99.00', 'Cash', '99.00', '82.50', '16.50', '03/09/2022', 0),
(109, 0, 0, 224984, 68, 'COKE001', 'COCA-COLA 12oz', 'Other', 'PCS', '02/09/2023', '9.00', '10.00', 1, '10.00', 'Cash', '10.00', '9.00', '1.00', '03/09/2022', 0),
(110, 0, 0, 224984, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 13, '325.00', 'Cash', '325.00', '156.00', '169.00', '03/09/2022', 0),
(111, 0, 0, 224691, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 2, '50.00', 'Cash', '50.00', '24.00', '26.00', '03/09/2022', 1),
(112, 0, 0, 224873, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/09/2022', 1),
(113, 0, 0, 224754, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/09/2022', 1),
(114, 0, 0, 224626, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 0, '25.00', 'Cash', '0.00', '0.00', '0.00', '03/09/2022', 1),
(115, 0, 0, 224657, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/09/2022', 1),
(116, 0, 0, 224332, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 0, '15.00', 'Cash', '0.00', '0.00', '0.00', '03/10/2022', 1),
(117, 0, 0, 224885, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/14/2022', 1),
(118, 0, 0, 224885, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 5, '125.00', 'Cash', '125.00', '60.00', '65.00', '03/14/2022', 1),
(119, 0, 0, 22424, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/15/2022', 1),
(120, 0, 0, 224712, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 3, '75.00', 'Cash', '75.00', '36.00', '39.00', '03/15/2022', 1),
(121, 0, 0, 224896, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/15/2022', 1),
(122, 0, 0, 224319, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/15/2022', 1),
(123, 0, 0, 224719, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/15/2022', 1),
(124, 0, 0, 224524, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/15/2022', 1),
(125, 0, 0, 224945, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/15/2022', 1),
(126, 0, 0, 224788, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/15/2022', 1),
(127, 0, 0, 224993, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 2, '50.00', 'Cash', '50.00', '24.00', '26.00', '03/15/2022', 1),
(128, 0, 0, 224806, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/15/2022', 1),
(129, 0, 0, 224806, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 3, '45.00', 'Cash', '45.00', '30.00', '15.00', '03/15/2022', 1),
(130, 0, 0, 224226, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(131, 0, 0, 22457, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(132, 0, 0, 224262, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(133, 0, 0, 224597, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(134, 0, 0, 224495, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(135, 0, 0, 224590, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(136, 0, 0, 224245, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(137, 0, 0, 224421, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(138, 0, 0, 224115, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(139, 0, 0, 224873, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(140, 0, 0, 2247, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(141, 0, 0, 224773, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(142, 0, 0, 224554, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(143, 0, 0, 224324, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(144, 0, 0, 224561, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(145, 0, 0, 224244, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(146, 0, 0, 224797, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(147, 0, 0, 224442, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(148, 0, 0, 224715, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(149, 0, 0, 224715, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '03/15/2022', 1),
(150, 0, 0, 224715, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(151, 0, 0, 224296, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(152, 0, 0, 224394, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(153, 0, 0, 224679, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/15/2022', 1),
(154, 0, 0, 22430, 72, '89111', 'HAIR WAX LIGHTNESS 100ML', 'GENERAL', 'PCS', '', '50.25', '70.75', 2, '141.50', 'Cash', '141.50', '100.50', '41.00', '03/15/2022', 1),
(155, 0, 0, 224662, 72, '89111', 'HAIR WAX LIGHTNESS 100ML', 'GENERAL', 'PCS', '', '50.25', '70.75', 1, '70.75', 'Cash', '70.75', '50.25', '20.50', '03/15/2022', 1),
(156, 4, 0, 224607, 72, '89111', 'HAIR WAX LIGHTNESS 100ML', 'GENERAL', 'PCS', '', '50.25', '70.75', 1, '70.75', 'Cash', '70.75', '50.25', '20.50', '03/15/2022', 0),
(157, 4, 0, 224429, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 1, '30.25', 'Cash', '30.25', '25.00', '5.25', '03/16/2022', 0),
(158, 4, 0, 224666, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '03/16/2022', 0),
(159, 4, 0, 224666, 72, '89111', 'HAIR WAX LIGHTNESS 100ML', 'GENERAL', 'PCS', '', '50.25', '70.75', 1, '70.75', 'Cash', '70.75', '50.25', '20.50', '03/16/2022', 0),
(160, 4, 0, 224666, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 3, '90.75', 'Cash', '90.75', '75.00', '15.75', '03/16/2022', 0),
(161, 4, 0, 224742, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 1, '30.25', 'Cash', '30.25', '25.00', '5.25', '03/16/2022', 0),
(162, 4, 0, 224789, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 0, '60.50', 'Cash', '30.25', '0.00', '30.25', '03/16/2022', 0),
(163, 4, 0, 224789, 72, '89111', 'HAIR WAX LIGHTNESS 100ML', 'GENERAL', 'PCS', '', '50.25', '70.75', 4, '353.75', 'Cash', '283.00', '201.00', '82.00', '03/16/2022', 0),
(164, 0, 0, 224207, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 1, '30.25', 'Credit', '30.25', '25.00', '5.25', '03/22/2022', 0),
(165, 4, 0, 224517, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 3, '75.00', 'Cash', '75.00', '36.00', '39.00', '05/04/2022', 1),
(166, 4, 0, 224517, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 1, '30.25', 'Cash', '30.25', '25.00', '5.25', '05/04/2022', 1),
(167, 0, 0, 224964, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '05/04/2022', 0),
(168, 4, 0, 224748, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 10, '250.00', 'Cash', '250.00', '120.00', '130.00', '05/06/2022', 1),
(169, 4, 0, 224748, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 3, '90.75', 'Cash', '90.75', '75.00', '15.75', '05/06/2022', 1),
(170, 4, 0, 224748, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 2, '30.00', 'Cash', '30.00', '20.00', '10.00', '05/06/2022', 1),
(171, 4, 0, 224546, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 9, '225.00', 'Cash', '225.00', '108.00', '117.00', '05/06/2022', 1),
(172, 0, 0, 224161, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 1, '30.25', 'Cash', '30.25', '25.00', '5.25', '05/06/2022', 0),
(173, 4, 0, 224542, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 20, '500.00', 'Cash', '500.00', '240.00', '260.00', '05/06/2022', 1),
(174, 4, 0, 224772, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 10, '302.50', 'Cash', '302.50', '250.00', '52.50', '05/07/2022', 1),
(175, 4, 0, 224927, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 1, '30.25', 'Cash', '30.25', '25.00', '5.25', '05/07/2022', 1),
(176, 4, 0, 224675, 75, '919123241211.1', 'BUTTER COCONUT 14G', 'GENERAL', 'PCS', '', '25.00', '30.50', 2, '61.00', 'Cash', '61.00', '50.00', '11.00', '05/08/2022', 1),
(177, 4, 0, 224675, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '05/08/2022', 1),
(178, 4, 0, 224675, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 1, '30.25', 'Cash', '30.25', '25.00', '5.25', '05/08/2022', 1),
(179, 4, 0, 224675, 71, '67910', 'TAWAS 50G', 'Other', 'PCS', '', '10.00', '15.00', 1, '15.00', 'Cash', '15.00', '10.00', '5.00', '05/08/2022', 1),
(180, 4, 0, 224595, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 2, '60.50', 'Cash', '60.50', '50.00', '10.50', '07/02/2022', 1),
(181, 4, 0, 224263, 75, '919123241211.1', 'BUTTER COCONUT 14G', 'GENERAL', 'PCS', '', '25.00', '30.50', 1, '30.50', 'Cash', '30.50', '25.00', '5.50', '09/01/2022', 1),
(182, 4, 0, 224263, 73, '74213', 'QUICKIE INSTANT CUP MAMI', 'GENERAL', 'PCS', '', '25.00', '30.25', 2, '60.50', 'Cash', '60.50', '50.00', '10.50', '09/01/2022', 1),
(183, 4, 0, 224825, 66, 'J0001', 'MAGGI KARI', 'Other', 'PCS', '02/01/2022', '12.00', '25.00', 1, '25.00', 'Cash', '25.00', '12.00', '13.00', '12/25/2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsolditem_merge`
--

CREATE TABLE IF NOT EXISTS `tblsolditem_merge` (
  `solditem_merge` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `invoiceId` int(11) NOT NULL,
  `solddate` varchar(255) NOT NULL,
  `cashierId` int(11) NOT NULL,
  `totalitem` int(11) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `totalprice` decimal(25,2) NOT NULL,
  `discount` decimal(25,2) NOT NULL,
  `amountdue` decimal(25,2) NOT NULL,
  `cashtender` decimal(25,2) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `balance` decimal(25,2) NOT NULL,
  `soldchange` decimal(25,2) NOT NULL,
  `paid` decimal(25,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `duedate` varchar(255) NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`solditem_merge`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `tblsolditem_merge`
--

INSERT INTO `tblsolditem_merge` (`solditem_merge`, `customerId`, `invoiceId`, `solddate`, `cashierId`, `totalitem`, `totalqty`, `totalprice`, `discount`, `amountdue`, `cashtender`, `payment_type`, `balance`, `soldchange`, `paid`, `status`, `time`, `duedate`, `Active`) VALUES
(16, 8, 224741, '08-02-2022', 4, 1, 5, '50.00', '0.00', '50.00', '100.00', '', '0.00', '50.00', '40.00', 'Sold', '', '', 0),
(17, 8, 2241, '08-02-2022', 4, 1, 1, '10.00', '0.00', '10.00', '23.00', '', '0.00', '13.00', '10.00', 'Sold', '', '', 0),
(18, 8, 224841, '08-02-2022', 4, 1, 1, '10.00', '0.00', '10.00', '12.00', '', '0.00', '2.00', '0.00', 'Sold', '', '', 0),
(19, 8, 224220, '08-02-2022', 4, 1, 3, '30.00', '0.00', '30.00', '100.00', '', '0.00', '70.00', '20.00', 'Sold', '', '', 0),
(20, 8, 22431, '08-02-2022', 4, 2, 8, '140.00', '0.00', '140.00', '200.00', '', '0.00', '60.00', '140.00', 'Sold', '', '', 0),
(21, 8, 224491, '08-02-2022', 4, 2, 3, '30.00', '0.00', '30.00', '50.00', '', '0.00', '20.00', '20.00', 'Sold', '', '', 0),
(22, 6, 224644, '08-02-2022', 4, 1, 1, '25.00', '0.00', '25.00', '50.00', '', '0.00', '25.00', '25.00', 'Sold', '', '', 0),
(23, 8, 22468, '08-02-2022', 4, 3, 20, '309.00', '0.00', '309.00', '500.00', '', '0.00', '191.00', '309.00', 'Sold', '', '', 0),
(24, 8, 224799, '08-02-2022', 4, 4, 11, '126.00', '0.00', '126.00', '200.00', '', '0.00', '74.00', '126.00', 'Sold', '', '', 0),
(25, 8, 224788, '09-02-2022', 4, 1, 2, '50.00', '0.00', '50.00', '100.00', '', '0.00', '50.00', '50.00', 'Sold', '', '', 0),
(26, 2, 224894, '09-02-2022', 4, 1, 1, '25.00', '0.00', '25.00', '50.00', '', '0.00', '25.00', '25.00', 'Sold', '', '', 0),
(27, 7, 22443, '09-02-2022', 4, 1, 2, '30.00', '20.00', '30.00', '50.00', '', '0.00', '20.00', '30.00', 'Sold', '', '', 0),
(28, 4, 224493, '09/02/2022', 4, 1, 2, '20.00', '0.00', '20.00', '50.00', '', '0.00', '30.00', '20.00', 'Sold', '', '', 0),
(29, 8, 224799, '09/02/2022', 4, 1, 1, '10.00', '0.00', '10.00', '50.00', '', '0.00', '40.00', '10.00', 'Sold', '', '', 0),
(30, 6, 224449, '09/02/2022', 4, 1, 23, '229.00', '0.00', '229.00', '301.00', 'Cash', '0.00', '72.00', '229.00', 'Sold', '', '', 0),
(31, 1, 224454, '09/02/2022', 4, 1, 1, '10.00', '0.00', '10.00', '1.00', 'Credit', '9.00', '0.00', '1.00', 'Sold', '', '', 0),
(32, 3, 224663, '09/02/2022', 4, 1, 1, '10.00', '0.00', '10.00', '9.00', 'Credit', '1.00', '0.00', '9.00', 'Sold', '', '', 0),
(33, 8, 224376, '10/02/2022', 4, 1, 1, '10.00', '0.00', '10.00', '50.00', 'Cash', '0.00', '40.00', '10.00', 'Sold', '', '', 0),
(37, 8, 224344, '02/10/2022', 4, 1, 2, '20.00', '0.00', '20.00', '50.00', 'Cash', '0.00', '30.00', '20.00', 'Sold', '', '', 0),
(38, 8, 224296, '02/10/2022', 4, 1, 1, '10.00', '5.00', '5.00', '20.00', 'Cash', '0.00', '15.00', '5.00', 'Sold', '', '', 0),
(39, 2, 224622, '02/10/2022', 4, 1, 1, '10.00', '1.00', '9.00', '8.00', 'Credit', '1.00', '0.00', '8.00', 'Sold', '', '', 0),
(40, 2, 22495, '02/10/2022', 4, 1, 1, '10.00', '1.00', '9.00', '5.00', 'Credit', '3.00', '0.00', '6.00', 'Sold', '', '', 0),
(41, 8, 224826, '02/11/2022', 4, 1, 1, '10.00', '0.00', '10.00', '10.00', 'Cash', '0.00', '0.00', '10.00', 'Sold', '', '', 0),
(42, 8, 224985, '02/11/2022', 4, 1, 1, '10.00', '0.00', '10.00', '10.00', 'Cash', '0.00', '0.00', '10.00', 'Sold', '', '', 0),
(43, 8, 224845, '02/11/2022', 4, 1, 1, '10.00', '0.00', '10.00', '10.00', 'Cash', '0.00', '0.00', '10.00', 'Sold', '', '', 0),
(44, 8, 224892, '02/11/2022', 4, 1, 1, '10.00', '0.00', '10.00', '20.00', 'Cash', '0.00', '10.00', '10.00', 'Sold', '', '', 0),
(45, 8, 224431, '02/11/2022', 4, 1, 1, '10.00', '0.00', '10.00', '20.00', 'Cash', '0.00', '10.00', '10.00', 'Sold', '', '', 0),
(46, 8, 224344, '02/11/2022', 4, 1, 1, '10.00', '0.00', '10.00', '20.00', 'Cash', '0.00', '10.00', '10.00', 'Sold', '', '', 0),
(47, 8, 224911, '02/11/2022', 4, 1, 1, '10.00', '0.00', '10.00', '20.00', 'Cash', '0.00', '10.00', '10.00', 'Sold', '', '', 0),
(48, 8, 224641, '02/11/2022', 4, 1, 1, '10.00', '0.00', '10.00', '56.00', 'Cash', '0.00', '46.00', '10.00', 'Sold', '', '', 0),
(49, 8, 224135, '02/11/2022', 4, 1, 1, '10.00', '0.00', '10.00', '50.00', 'Cash', '0.00', '40.00', '10.00', 'Sold', '', '', 0),
(50, 8, 224170, '02/11/2022', 4, 1, 1, '10.00', '0.00', '10.00', '20.00', 'Cash', '0.00', '10.00', '10.00', 'Sold', '', '', 0),
(51, 8, 2244, '02/11/2022', 4, 2, 4, '55.00', '0.00', '55.00', '100.00', 'Cash', '0.00', '45.00', '55.00', 'Sold', '', '', 0),
(52, 8, 224276, '02/11/2022', 4, 3, 6, '76.00', '1.00', '75.00', '100.00', 'Cash', '0.00', '25.00', '75.00', 'Sold', '', '', 0),
(53, 8, 224627, '02/11/2022', 4, 1, 1, '3.00', '0.00', '3.00', '50.00', 'Cash', '0.00', '47.00', '3.00', 'Sold', '', '', 0),
(54, 8, 224823, '02/12/2022', 4, 1, 1, '10.00', '3.00', '7.00', '10.00', 'Cash', '0.00', '3.00', '7.00', 'Sold', '', '', 0),
(55, 8, 224676, '02/12/2022', 4, 1, 2, '20.00', '3.00', '17.00', '20.00', 'Cash', '0.00', '3.00', '17.00', 'Sold', '', '', 0),
(56, 8, 2249, '02/12/2022', 4, 1, 3, '30.00', '0.00', '30.00', '50.00', 'Cash', '0.00', '20.00', '30.00', 'Sold', '', '', 0),
(57, 8, 224222, '02/12/2022', 4, 1, 3, '30.00', '9.00', '21.00', '50.00', 'Cash', '0.00', '29.00', '-9.00', 'Sold', '', '', 0),
(58, 8, 224887, '02/13/2022', 4, 2, 11, '68.00', '0.00', '68.00', '500.00', 'Cash', '0.00', '432.00', '68.00', 'Sold', '', '', 0),
(59, 8, 224835, '02/14/2022', 4, 1, 1, '10.00', '0.00', '10.00', '50.00', 'Cash', '0.00', '40.00', '10.00', 'Sold', '', '', 0),
(60, 8, 224238, '02/14/2022', 4, 2, 2, '13.00', '0.00', '13.00', '15.00', 'Cash', '0.00', '2.00', '13.00', 'Sold', '', '', 0),
(61, 8, 224286, '02/15/2022', 4, 2, 2, '13.00', '0.00', '13.00', '20.00', 'Cash', '0.00', '7.00', '13.00', 'Sold', '', '', 0),
(62, 0, 224164, '02/17/2022', 4, 3, 83, '899.00', '0.00', '899.00', '2000.00', 'Cash', '0.00', '1101.00', '899.00', 'Sold', '', '', 0),
(65, 0, 224233, '02/18/2022', 4, 1, 1, '3.00', '0.00', '3.00', '20.00', 'Cash', '0.00', '17.00', '3.00', 'Sold', '', '', 0),
(66, 0, 224903, '02/22/2022', 4, 3, 24, '282.00', '0.00', '282.00', '1000.00', 'Cash', '0.00', '718.00', '282.00', 'Sold', '', '', 0),
(67, 0, 224692, '03/02/2022', 4, 1, 106, '2.00', '0.00', '2650.00', '3000.00', 'Cash', '0.00', '350.00', '2650.00', 'Sold', '', '', 0),
(68, 2, 224543, '03/02/2022', 4, 1, 1, '3.00', '0.00', '3.00', '5.00', 'Cash', '0.00', '2.00', '3.00', 'Sold', '', '', 0),
(69, 0, 22475, '03/02/2022', 4, 1, 1, '25.00', '1.00', '24.00', '90.00', 'Cash', '0.00', '66.00', '24.00', 'Sold', '', '', 0),
(70, 0, 224217, '03/02/2022', 4, 1, 1, '25.00', '0.00', '25.00', '50.00', 'Cash', '0.00', '25.00', '25.00', 'Sold', '', '', 0),
(71, 0, 22487, '03/02/2022', 4, 1, 15, '375.00', '0.00', '375.00', '1000.00', 'Cash', '0.00', '625.00', '375.00', 'Sold', '', '', 0),
(72, 0, 224160, '03/02/2022', 4, 1, 15, '375.00', '0.00', '375.00', '1000.00', 'Cash', '0.00', '625.00', '375.00', 'Sold', '', '', 0),
(73, 0, 224681, '03/02/2022', 4, 1, 1, '25.00', '0.00', '25.00', '1000.00', 'Cash', '0.00', '975.00', '25.00', 'Sold', '', '', 0),
(74, 0, 224682, '03/02/2022', 4, 1, 1, '3.00', '0.00', '3.00', '1000.00', 'Cash', '0.00', '997.00', '3.00', 'Sold', '', '', 0),
(75, 0, 224352, '03/02/2022', 4, 1, 1, '25.00', '0.00', '25.00', '40.00', 'Cash', '0.00', '15.00', '25.00', 'Sold', '', '', 0),
(76, 0, 224985, '03/02/2022', 4, 2, 2, '28.00', '0.00', '28.00', '28.00', 'Cash', '0.00', '0.00', '28.00', 'Sold', '', '', 0),
(77, 0, 224534, '03/03/2022', 4, 1, 1, '25.00', '0.00', '25.00', '25.00', 'Cash', '0.00', '0.00', '25.00', 'Sold', '', '', 0),
(78, 0, 224497, '03/03/2022', 4, 2, 2, '28.00', '0.00', '28.00', '28.00', 'Cash', '0.00', '0.00', '28.00', 'Sold', '', '', 0),
(79, 0, 224156, '03/03/2022', 4, 1, 1, '25.00', '0.00', '25.00', '25.00', 'Cash', '0.00', '0.00', '25.00', 'Sold', '', '', 0),
(80, 0, 224218, '03/03/2022', 4, 1, 10, '30.00', '0.00', '30.00', '500.00', 'Cash', '0.00', '470.00', '30.00', 'Sold', '', '', 0),
(81, 0, 224580, '03/09/2022', 4, 4, 105, '305.00', '0.00', '305.00', '500.00', 'Cash', '0.00', '195.00', '305.00', 'Sold', '', '', 0),
(82, 0, 224984, '03/09/2022', 4, 2, 14, '335.00', '0.00', '335.00', '900.00', 'Cash', '0.00', '565.00', '335.00', 'Sold', '', '', 0),
(83, 0, 224691, '03/09/2022', 4, 1, 2, '50.00', '0.00', '50.00', '100.00', 'Cash', '0.00', '50.00', '50.00', 'Sold', '', '', 0),
(84, 0, 224873, '03/09/2022', 4, 1, 1, '25.00', '0.00', '25.00', '25.00', 'Cash', '0.00', '0.00', '25.00', 'Sold', '', '', 0),
(85, 0, 224754, '03/09/2022', 4, 1, 1, '25.00', '0.00', '25.00', '50.00', 'Cash', '0.00', '25.00', '25.00', 'Sold', '', '', 0),
(86, 0, 224626, '03/09/2022', 4, 1, 1, '25.00', '0.00', '25.00', '50.00', 'Cash', '0.00', '25.00', '25.00', 'Sold', '', '', 0),
(87, 0, 224657, '03/09/2022', 4, 1, 1, '25.00', '0.00', '25.00', '50.00', 'Cash', '0.00', '25.00', '25.00', 'Sold', '', '', 0),
(88, 0, 220626, '09-03-2022', 0, 0, 0, '0.00', '0.00', '3.00', '5.00', '', '0.00', '2.00', '3.00', 'Active', '', '', 0),
(89, 0, 220405, '09-03-2022', 0, 0, 0, '0.00', '0.00', '10.00', '20.00', '', '0.00', '10.00', '10.00', 'Active', '', '', 0),
(90, 0, 224332, '03/10/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(91, 0, 224885, '03/14/2022', 4, 2, 6, '140.00', '0.00', '140.00', '900.00', 'Cash', '0.00', '760.00', '140.00', 'Sold', '', '', 0),
(92, 0, 22424, '03/15/2022', 4, 1, 1, '25.00', '0.00', '25.00', '40.00', 'Cash', '0.00', '15.00', '25.00', 'Sold', '', '', 0),
(93, 0, 224712, '03/15/2022', 4, 1, 3, '75.00', '0.00', '75.00', '1000.00', 'Cash', '0.00', '925.00', '75.00', 'Sold', '', '', 0),
(94, 8, 224896, '03/15/2022', 4, 1, 1, '25.00', '0.00', '25.00', '50.00', 'Cash', '0.00', '25.00', '25.00', 'Sold', '', '', 0),
(95, 1, 224319, '03/15/2022', 4, 1, 1, '25.00', '0.00', '25.00', '40.00', 'Cash', '0.00', '15.00', '25.00', 'Sold', '', '', 0),
(96, 8, 224719, '03/15/2022', 4, 1, 1, '25.00', '0.00', '25.00', '500.00', 'Cash', '0.00', '475.00', '25.00', 'Sold', '', '', 0),
(97, 8, 224524, '03/15/2022', 4, 1, 1, '25.00', '0.00', '25.00', '1000.00', 'Cash', '0.00', '975.00', '25.00', 'Sold', '', '', 0),
(98, 8, 224945, '03/15/2022', 4, 1, 1, '25.00', '0.00', '25.00', '1000.00', 'Cash', '0.00', '975.00', '25.00', 'Sold', '', '', 0),
(99, 8, 224788, '03/15/2022', 4, 1, 1, '25.00', '0.00', '25.00', '500.00', 'Cash', '0.00', '475.00', '25.00', 'Sold', '', '', 0),
(100, 8, 224993, '03/15/2022', 4, 1, 2, '50.00', '0.00', '50.00', '500.00', 'Cash', '0.00', '450.00', '50.00', 'Sold', '', '', 0),
(101, 8, 224806, '03/15/2022', 4, 2, 4, '70.00', '0.00', '70.00', '1000.00', 'Cash', '0.00', '930.00', '70.00', 'Sold', '', '', 0),
(102, 8, 224226, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(103, 8, 22457, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '1000.00', 'Cash', '0.00', '985.00', '15.00', 'Sold', '', '', 0),
(104, 8, 224262, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '500.00', 'Cash', '0.00', '485.00', '15.00', 'Sold', '', '', 0),
(105, 8, 224597, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '1000.00', 'Cash', '0.00', '985.00', '15.00', 'Sold', '', '', 0),
(106, 8, 224495, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '1000.00', 'Cash', '0.00', '985.00', '15.00', 'Sold', '', '', 0),
(107, 8, 224590, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '1000.00', 'Cash', '0.00', '985.00', '15.00', 'Sold', '', '', 0),
(108, 8, 224245, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(109, 8, 224421, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(110, 8, 224115, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(111, 8, 224873, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '20.00', 'Cash', '0.00', '5.00', '15.00', 'Sold', '', '', 0),
(112, 8, 2247, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '20.00', 'Cash', '0.00', '5.00', '15.00', 'Sold', '', '', 0),
(113, 8, 224773, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '40.00', 'Cash', '0.00', '25.00', '15.00', 'Sold', '', '', 0),
(114, 8, 224554, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '1000.00', 'Cash', '0.00', '985.00', '15.00', 'Sold', '', '', 0),
(115, 8, 224324, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(116, 8, 224561, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '100.00', 'Cash', '0.00', '85.00', '15.00', 'Sold', '', '', 0),
(117, 8, 224244, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(118, 8, 224797, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(119, 8, 224442, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(120, 8, 224715, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(121, 8, 224715, '03/15/2022', 4, 2, 2, '40.00', '0.00', '40.00', '100.00', 'Cash', '0.00', '60.00', '40.00', 'Sold', '', '', 0),
(122, 8, 224296, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '100.00', 'Cash', '0.00', '85.00', '15.00', 'Sold', '', '', 0),
(123, 8, 224394, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '50.00', 'Cash', '0.00', '35.00', '15.00', 'Sold', '', '', 0),
(124, 8, 224679, '03/15/2022', 4, 1, 1, '15.00', '0.00', '15.00', '100.00', 'Cash', '0.00', '85.00', '15.00', 'Sold', '', '', 0),
(125, 8, 22430, '03/15/2022', 4, 1, 2, '141.50', '0.00', '141.50', '147.00', 'Cash', '0.00', '5.50', '141.50', 'Sold', '', '', 0),
(126, 8, 224662, '03/15/2022', 4, 1, 1, '70.75', '0.00', '70.75', '72.00', 'Cash', '0.00', '1.25', '70.75', 'Sold', '', '', 0),
(127, 8, 224607, '03/15/2022', 4, 1, 1, '70.75', '0.00', '70.75', '500.00', 'Cash', '0.00', '429.25', '70.75', 'Sold', '', '', 0),
(128, 8, 224429, '03/16/2022', 4, 1, 1, '30.25', '0.00', '30.25', '50.00', 'Cash', '0.00', '19.75', '30.25', 'Sold', '', '', 0),
(129, 8, 224666, '03/16/2022', 4, 3, 5, '176.50', '0.00', '176.50', '500.00', 'Cash', '0.00', '323.50', '176.50', 'Sold', '', '', 0),
(130, 8, 224742, '03/16/2022', 4, 1, 1, '30.25', '0.00', '30.25', '50.00', 'Cash', '0.00', '19.75', '30.25', 'Sold', '', '', 0),
(131, 8, 224789, '03/16/2022', 4, 2, 7, '414.25', '0.00', '414.25', '500.00', 'Cash', '0.00', '85.75', '414.25', 'Sold', '', '', 0),
(132, 2, 224207, '03/22/2022', 4, 1, 1, '30.25', '0.00', '30.25', '10.00', 'Credit', '20.25', '0.00', '10.00', 'Sold', '', '', 0),
(133, 8, 224517, '05/04/2022', 4, 2, 4, '105.25', '0.00', '105.25', '500.00', 'Cash', '0.00', '394.75', '105.25', 'Sold', '', '', 1),
(134, 2, 224964, '05/04/2022', 4, 1, 1, '25.00', '0.00', '25.00', '100.00', 'Cash', '0.00', '75.00', '25.00', 'Sold', '', '', 0),
(135, 8, 224748, '05/06/2022', 4, 3, 15, '370.75', '0.00', '370.75', '600.00', 'Cash', '0.00', '229.25', '370.75', 'Sold', '', '', 1),
(136, 8, 224546, '05/06/2022', 4, 1, 9, '225.00', '0.00', '225.00', '1000.00', 'Cash', '0.00', '775.00', '225.00', 'Sold', '', '', 1),
(137, 3, 224161, '05/06/2022', 4, 1, 1, '30.25', '0.00', '30.25', '500.00', 'Cash', '0.00', '469.75', '30.25', 'Sold', '', '', 0),
(138, 8, 224542, '05/06/2022', 4, 1, 20, '500.00', '0.00', '500.00', '500.00', 'Cash', '0.00', '0.00', '500.00', 'Sold', '', '', 1),
(139, 8, 224772, '05/07/2022', 4, 1, 10, '302.50', '0.00', '302.50', '1000.00', 'Cash', '0.00', '697.50', '302.50', 'Sold', '', '', 1),
(140, 8, 224927, '05/07/2022', 4, 1, 1, '30.25', '0.00', '30.25', '100.00', 'Cash', '0.00', '69.75', '30.25', 'Sold', '', '', 1),
(141, 8, 224675, '05/08/2022', 4, 4, 5, '131.25', '0.00', '131.25', '600.00', 'Cash', '0.00', '468.75', '131.25', 'Sold', '', '', 1),
(142, 8, 224595, '07/02/2022', 4, 1, 2, '60.50', '0.00', '60.50', '1000.00', 'Cash', '0.00', '939.50', '60.50', 'Sold', '', '', 1),
(143, 8, 224263, '09/01/2022', 4, 2, 3, '91.00', '0.00', '91.00', '820.00', 'Cash', '0.00', '729.00', '91.00', 'Sold', '', '', 1),
(144, 8, 224825, '12/25/2022', 4, 1, 1, '25.00', '0.00', '25.00', '30.00', 'Cash', '0.00', '5.00', '25.00', 'Active', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE IF NOT EXISTS `tblsupplier` (
  `supId` int(11) NOT NULL AUTO_INCREMENT,
  `supname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact_number` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`supId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`supId`, `supname`, `address`, `gender`, `contact_number`, `date`, `status`) VALUES
(15, 'HAMJA', 'LAMITAN CITY', '', '', '28-12-2021', 'Active'),
(16, 'sad', 'asd', '', '23', '28-12-2021', 'Pending'),
(17, 'asdsasd', 'sadasd', '', '242', '28-12-2021', 'Active'),
(18, 'asd', '', 'Optional', '', '28-12-2021', 'Active'),
(19, 'JOHN', 'LAMITAN CITY', 'MALE', '09066689657', '28-12-2021', 'Active'),
(20, 'CARL', 'ISABELA', 'MALE', '09053656', '06-02-2022', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `userstatus` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userId`, `image`, `fullname`, `contact_number`, `gender`, `address`, `username`, `password`, `position`, `userstatus`, `date`) VALUES
(4, 'images1', 'Hamja Jakilan1', '', 'Male1', 'Rizal avenue1', 'admin1', 'admin1', 'Admin1', 'active1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblvoideitem_merge`
--

CREATE TABLE IF NOT EXISTS `tblvoideitem_merge` (
  `voiditem_mergeId` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceId` int(11) NOT NULL,
  `cashierId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `voiddate` varchar(255) NOT NULL,
  `totalitem` int(11) NOT NULL,
  `totalqty` int(11) NOT NULL,
  `totalprice` decimal(25,2) NOT NULL,
  `discount` decimal(25,2) NOT NULL,
  `grandtotal` decimal(25,2) NOT NULL,
  `amountpaid` decimal(25,2) NOT NULL,
  `balance` decimal(25,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`voiditem_mergeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblvoiditem`
--

CREATE TABLE IF NOT EXISTS `tblvoiditem` (
  `voiditem` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceId` int(11) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`voiditem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
