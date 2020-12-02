-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 02:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_philam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentblog`
--

CREATE TABLE `tbl_studentblog` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `studID` int(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_studentblog`
--

INSERT INTO `tbl_studentblog` (`id`, `name`, `image`, `post`, `studID`, `status`) VALUES
(45, 'katzuki fushimi', '73375602_2747093611980959_5995787908722720768_o.jpg', 'id 3', 3, 'Ok'),
(46, 'katzuki fushimi', 'download.jpg', 'id 3.1', 3, 'Ok');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentconsultation`
--

CREATE TABLE `tbl_studentconsultation` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `contact` bigint(255) NOT NULL,
  `address` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `concern` text NOT NULL,
  `studID` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `acceptBy` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_studentconsultation`
--

INSERT INTO `tbl_studentconsultation` (`id`, `name`, `username`, `school`, `contact`, `address`, `date`, `concern`, `studID`, `status`, `acceptBy`, `comment`) VALUES
(4, 'katzuki fushimi', '02000023142', 'STI College Caloocan', 9281727402, 'Valenzuela City', '07/29/2020', 'asd', 3, 'Ok', 'Roberto Magulang', 'ok punta ka dito'),
(5, 'katzuki fushimi', '02000023142', 'STI College Caloocan', 9281727402, 'Valenzuela City', '07/29/2020', 'sadddddddd', 3, 'Ok', 'Pending', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentdeclaration`
--

CREATE TABLE `tbl_studentdeclaration` (
  `id` int(11) NOT NULL,
  `height` double NOT NULL,
  `weight` double NOT NULL,
  `healthCondition` varchar(255) NOT NULL,
  `hospitalized` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `vitamins` varchar(255) NOT NULL,
  `disablities` varchar(255) NOT NULL,
  `disablitiesType` varchar(255) NOT NULL,
  `smother` varchar(255) NOT NULL,
  `smotherwork` varchar(255) NOT NULL,
  `smotherincome` int(11) NOT NULL,
  `sfather` varchar(255) NOT NULL,
  `sfatherwork` varchar(255) NOT NULL,
  `sfatherincome` int(11) NOT NULL,
  `syearlyincome` int(11) NOT NULL,
  `studwork` varchar(255) NOT NULL,
  `studincome` int(11) NOT NULL,
  `studyearlyincome` int(11) NOT NULL,
  `studID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_studentdeclaration`
--

INSERT INTO `tbl_studentdeclaration` (`id`, `height`, `weight`, `healthCondition`, `hospitalized`, `date`, `vitamins`, `disablities`, `disablitiesType`, `smother`, `smotherwork`, `smotherincome`, `sfather`, `sfatherwork`, `sfatherincome`, `syearlyincome`, `studwork`, `studincome`, `studyearlyincome`, `studID`) VALUES
(18, 35.5, 85.2, 'N/A', 'Yes', '2020-11-11', 'Biogesic', 'Yes', 'asd', '', '', 0, '', '', 0, 0, '', 0, 0, 22),
(19, 35.5, 85.2, 'N/A', 'Yes', '2020-11-11', 'Biogesic', 'Yes', 'asd', '', '', 0, '', '', 0, 0, '', 0, 0, 22),
(20, 35.5, 85.2, 'N/A', 'Yes', '2020-12-10', 'Biogesic', 'Yes', 'asd', 'a', 'b', 12, 'c', 'd', 123, 12345, 'e', 123456, 1234567, 24),
(21, 10, 230.3, 'asd', 'Yes', '2020-12-17', 'biogesic', 'Yes', 'katarantaduhan', 'asd', 'asd', 123, 'asd', 'asd', 123, 12345, 'asd', 123, 12345, 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentpay`
--

CREATE TABLE `tbl_studentpay` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `contact` bigint(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `savings` int(11) NOT NULL,
  `studID` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_studentpay`
--

INSERT INTO `tbl_studentpay` (`id`, `name`, `username`, `school`, `contact`, `address`, `reference`, `receipt`, `value`, `savings`, `studID`, `status`) VALUES
(3, 'katzuki fushimi', '02000023142', 'STI College Caloocan', 9281727402, 'Valenzuela City', '00123456', '', 0, 500, 3, 'Ok'),
(23, 'katzuki fushimi', '02000023142', 'STI College Caloocan', 9281727402, 'Valenzuela City', '123123', '', 123123, 1500, 3, 'Ok'),
(24, 'Rommel Corpuz', '012', 'STI College Caloocan', 9090909, 'dalandanan', '00123456', '', 500, 100, 28, 'Ok'),
(25, 'Rommel Corpuz', '012', 'STI College Caloocan', 9090909, 'dalandanan', '00123456', '', 500, 0, 28, 'Pending'),
(26, 'katzuki fushimi', '02000023142', 'STI College Caloocan', 9281727402, 'Valenzuela City', '1254', '', 1000, 2500, 3, 'Ok');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentpoints`
--

CREATE TABLE `tbl_studentpoints` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `points` double NOT NULL,
  `studID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_studentpoints`
--

INSERT INTO `tbl_studentpoints` (`id`, `name`, `points`, `studID`) VALUES
(15, 'katzuki fushimi', 5, 3),
(16, 'katzuki fushimi', 5, 3),
(17, 'katzuki fushimi', 5, 3),
(18, 'katzuki fushimi', 5, 3),
(19, 'Justine Cute', 5, 26),
(20, 'katzuki fushimi', 5, 3),
(21, 'katzuki fushimi', 5, 3),
(22, 'Justine Cute', 5, 26),
(23, 'katzuki fushimi', 5, 3),
(24, 'katzuki fushimi', 5, 3),
(25, 'katzuki fushimi', 5, 3),
(26, 'katzuki fushimi', 5, 3),
(27, 'katzuki fushimi', 5, 3),
(28, 'Rommel Corpuz', 5, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `paymentType` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` bigint(255) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `school`, `schoolyear`, `semester`, `receipt`, `paymentType`, `password`, `contact`, `address`, `image`, `access`, `status`) VALUES
(1, 'katzuki', 'Admin', '', '0', '', '', '', 'admin', 0, 'asdwq1', '', 'admin', 'Ok'),
(3, 'katzuki fushimi', '02000023142', 'STI College Caloocan', '0', '', '', 'cash', '07291999', 9281727402, 'Valenzuela City', '73375602_2747093611980959_5995787908722720768_o.jpg', 'user', 'Ok'),
(26, 'Justine Cute', '000', 'asd', '123', '2yr1sem', 'WIN_20200527_22_23_49_Pro.jpg', 'cash', '000', 0, 'asd', 'WIN_20201113_16_37_15_Pro.jpg', 'user', 'Pending'),
(27, 'Rommel Corpuz', 'mel', 'asd', '123', '123', '', '', 'mel', 123, '123asd', '', 'user', 'Waiting'),
(28, 'Rommel Corpuz', '012', 'STI College Caloocan', '2019-2020', '3yr1sem', 'download.jpg', 'installment', '012', 9090909, 'dalandanan', 'Assessment.png', 'user', 'Ok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_studentblog`
--
ALTER TABLE `tbl_studentblog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_studentconsultation`
--
ALTER TABLE `tbl_studentconsultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_studentdeclaration`
--
ALTER TABLE `tbl_studentdeclaration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_studentpay`
--
ALTER TABLE `tbl_studentpay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_studentpoints`
--
ALTER TABLE `tbl_studentpoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_studentblog`
--
ALTER TABLE `tbl_studentblog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_studentconsultation`
--
ALTER TABLE `tbl_studentconsultation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_studentdeclaration`
--
ALTER TABLE `tbl_studentdeclaration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_studentpay`
--
ALTER TABLE `tbl_studentpay`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_studentpoints`
--
ALTER TABLE `tbl_studentpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
