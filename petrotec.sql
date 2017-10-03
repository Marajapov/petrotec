-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2017 at 11:33 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petrotec`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `refid` int(11) NOT NULL,
  `type` enum('cv','contract','product') NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `refid`, `type`, `url`) VALUES
(3, 1, 'contract', 'logo-06.png'),
(4, 1, 'cv', 'logo-10.png'),
(5, 2, 'cv', 'logo-08.png'),
(6, 2, 'product', 'Arena.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` text NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`, `parent`) VALUES
(1, 'cat1', 0),
(2, 'sub_cat1', 3),
(3, 'cat2', 0),
(4, 'sucat2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`) VALUES
(1, 'company1'),
(2, 'company2'),
(3, 'company3'),
(4, 'company4'),
(5, 'company5');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `fax` text NOT NULL,
  `company` text NOT NULL,
  `mobile` text NOT NULL,
  `billingaddress` text NOT NULL,
  `notes` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `title`, `fname`, `lname`, `email`, `phone`, `fax`, `company`, `mobile`, `billingaddress`, `notes`, `city`, `country`) VALUES
(2, 'Mr.', 'asd', 'dsa', 'asd@as.com', '1231', '213', 'asda', '123', 'asdjkll', 'dasdasd', 'dubai', 'uae');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `visa_status` text NOT NULL,
  `emirates_id` int(11) NOT NULL,
  `designation` text NOT NULL,
  `department` text NOT NULL,
  `employeecode` text NOT NULL,
  `dob` date NOT NULL,
  `emirates_expiry` date NOT NULL,
  `address` text NOT NULL,
  `drivinglisence` text NOT NULL,
  `drivinglisence_expiry` date NOT NULL,
  `passport_no` text NOT NULL,
  `passport_expiration` date NOT NULL,
  `allowance` text NOT NULL,
  `visa_expiry` date NOT NULL,
  `sick_leaves` int(11) NOT NULL,
  `paid_leaves` int(11) NOT NULL,
  `annual_leaves` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `maternity_leaves` int(11) NOT NULL,
  `notice_period` int(11) NOT NULL,
  `joining_date` date NOT NULL,
  `status` enum('hiring','shortlist','hired') NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `companyid`, `title`, `firstname`, `lastname`, `email`, `phone`, `visa_status`, `emirates_id`, `designation`, `department`, `employeecode`, `dob`, `emirates_expiry`, `address`, `drivinglisence`, `drivinglisence_expiry`, `passport_no`, `passport_expiration`, `allowance`, `visa_expiry`, `sick_leaves`, `paid_leaves`, `annual_leaves`, `gender`, `maternity_leaves`, `notice_period`, `joining_date`, `status`, `salary`) VALUES
(1, 1, 'mr.', 'fname', 'lname', 'email', '12332121312', 'visit', 0, '', 'dep', 'empcode', '2017-08-09', '2017-08-23', 'adress', '', '0000-00-00', 'passport', '2017-08-07', '0', '2017-08-07', 123, 43, 36, 'female', 0, 0, '2017-08-22', 'shortlist', 2017),
(2, 3, '', 'Ali', 'Raza', '', '', 'visit', 0, 'Engineer', 'Software', '123', '1991-05-04', '0000-00-00', 'asdjlajdklasd', '', '0000-00-00', 'bp012321', '2017-08-29', '0', '2017-08-31', 3, 5, 30, 'male', 30, 0, '2017-08-30', 'hiring', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `companyid`, `qty`, `productid`) VALUES
(1, 1, 3, 1),
(2, 2, 7, 1),
(3, 3, 0, 1),
(4, 4, 1, 1),
(5, 5, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created_date` date NOT NULL,
  `code` int(11) NOT NULL,
  `note` text NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `pcatid` int(11) NOT NULL,
  `ccatid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `created_date`, `code`, `note`, `supplier_id`, `pcatid`, `ccatid`) VALUES
(1, 'asd', 'asdas', '0000-00-00', 0, 'dasdas', 1, 1, 4),
(2, 'product 2', 'asdas', '2017-09-29', 123, 'asdasd', 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `company` text NOT NULL,
  `shipping_adddress` text NOT NULL,
  `company_address` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `title`, `fname`, `lname`, `email`, `phone`, `company`, `shipping_adddress`, `company_address`, `notes`) VALUES
(1, 'Mrs.', 'asds', 'asd', 'asd', 'asd', 'asd', 'asda', 'asds', 'sdasssa'),
(2, '', 'f2', 'f2', 'f2', 'f2', 'f2', '2', 'f', 'as');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
