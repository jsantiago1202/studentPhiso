-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 06:04 PM
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
(11, 'katzuki fushimi', '', 'eyow watchup', 3, 'Decline'),
(38, 'katzuki fushimi', '73375602_2747093611980959_5995787908722720768_o.jpg', 'saddd', 3, 'Ok'),
(40, 'katzuki fushimi', 'Enrique-Gil-as-Lakas20180305.jpg', 'saddd', 3, 'Ok');

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
(5, 'katzuki fushimi', '02000023142', 'STI College Caloocan', 9281727402, 'Valenzuela City', '07/29/2020', 'sadddddddd', 3, 'Pending', 'Pending', 'Pending');

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
(20, 35.5, 85.2, 'N/A', 'Yes', '2020-12-10', 'Biogesic', 'Yes', 'asd', 'a', 'b', 12, 'c', 'd', 123, 12345, 'e', 123456, 1234567, 24);

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
  `value` int(11) NOT NULL,
  `studID` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_studentpay`
--

INSERT INTO `tbl_studentpay` (`id`, `name`, `username`, `school`, `contact`, `address`, `reference`, `value`, `studID`, `status`) VALUES
(3, 'katzuki fushimi', '02000023142', 'STI College Caloocan', 9281727402, 'Valenzuela City', '00123456', 0, 3, 'Ok'),
(4, 'katzuki fushimi', '02000023142', 'STI College Caloocan', 9281727402, 'Valenzuela City', '159', 0, 3, 'Ok'),
(5, 'Romel Gaugano', '020', 'STI', 963123, 'Meycauyan ', '0000', 0, 2, 'Decline');

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
  `status` varchar(255) NOT NULL,
  `points` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `school`, `schoolyear`, `semester`, `receipt`, `paymentType`, `password`, `contact`, `address`, `image`, `access`, `status`, `points`) VALUES
(1, 'katzuki', 'katz', '', '0', '', '', '', 'katz', 0, 'asdwq1', '', 'admin', 'Ok', 0),
(3, 'katzuki fushimi', '02000023142', 'STI College Caloocan', '0', '', '', '', '07291999', 9281727402, 'Valenzuela City', '73375602_2747093611980959_5995787908722720768_o.jpg', 'user', 'Ok', 0);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_studentconsultation`
--
ALTER TABLE `tbl_studentconsultation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_studentdeclaration`
--
ALTER TABLE `tbl_studentdeclaration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_studentpay`
--
ALTER TABLE `tbl_studentpay`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
