-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 02:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `product` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_doc`
--

CREATE TABLE `booking_doc` (
  `id` int(20) NOT NULL,
  `doc_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `paitent_email` varchar(30) NOT NULL,
  `age` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time_slot` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_doc`
--

INSERT INTO `booking_doc` (`id`, `doc_name`, `email`, `patient_name`, `paitent_email`, `age`, `gender`, `date`, `time_slot`, `status`) VALUES
(1, 'Dr. Farwa', 'farwariaz20@gmail.com', 'razia', 'test@gmail.com', '45', 'Female', '2020-11-15', '10:00AM', 'Approved'),
(2, 'Dr. Farwa', 'farwariaz20@gmail.com', 'razia', 'test@gmail.com', '45', 'Female', '2020-11-15', '10:00AM', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `user_mail` varchar(30) NOT NULL,
  `pro_name` varchar(30) NOT NULL,
  `dis` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_mail`, `pro_name`, `dis`, `price`, `status`) VALUES
(24, 'test@gmail.com', 'Omega', 'Stomach', '50', 'Approved'),
(25, 'farwariaz20@gmail.com', 'Panadol', 'Fever', '50', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `doc_email` varchar(30) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `id` int(20) NOT NULL,
  `disease` varchar(30) NOT NULL,
  `pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `disease`, `pic`) VALUES
(9, 'Gynecologist', 'image/gaina.JPG'),
(10, 'Child Specialist', 'image/child.JPG'),
(11, 'Skin Care', 'image/skin.JPG'),
(12, 'Orthopedic', 'image/Orthopedic Surgeon.JPG'),
(13, 'ENT Specialist', 'image/ENT Specialist.JPG'),
(14, 'Diagnostics', 'image/Diagnostics.JPG'),
(15, 'Eye Specialist', 'image/eye.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `pmdc` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `specialty` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`pmdc`, `name`, `email`, `specialty`, `password`, `status`) VALUES
(9876, 'Dr. zubair', '123@gmail.com', 'Child Specialist', '7861', 'Approved'),
(12345, 'Dr. Farwa', 'farwariaz20@gmail.com', 'skin care MBBS', '786', 'Approved'),
(45678, 'Dr. Fahad', 'fahad@gmail.com', 'Heart Specialist ', '786', 'Approved'),
(50987, 'Dr. Adil', 'adil@gmail.com', 'Skin care', '7861', 'Approved'),
(56789, 'Dr. Alia', 'ali@gmail.com', 'gainacologist', '7861', 'Approved'),
(60987, 'Dr. neyaz', 'neyaz@gmail.com', 'Skin Care', '786', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_profile`
--

CREATE TABLE `doctor_profile` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `specialty` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `rank` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_profile`
--

INSERT INTO `doctor_profile` (`id`, `name`, `email`, `phone_no`, `specialty`, `location`, `address`, `pic`, `rank`) VALUES
(3, 'Dr. Farwa', 'farwariaz20@gmail.com', '0300000', 'skin care MBBS', 'Pakpattan', 'Pakpattan City Hospital', 'image/doc4.jpg', '**'),
(4, 'Dr. Fahad', 'fahad@gmail.com', '030000', 'Heart Specialist ', 'Pakpattan', 'pakpattan', 'image/doc2.jpg', '***'),
(5, 'Dr. Alia', 'ali@gmail.com', '030000', 'Gynecologist', 'Faislabad', 'Faislabad', 'image/doct1.png', '*'),
(7, 'Dr. zubair', '123@gmail.com', '0300000', 'Child Specialist', 'Lahore', 'Lahore Jinah Hospital', 'image/doctor1.jpg', '*'),
(8, 'Dr. Adil', 'adil@gmail.com', '030000000000', 'Skin care', 'Sahiwal', 'Sahiwal ', 'image/doc2.jpg', '*'),
(9, 'Dr. neyaz', 'neyaz@gmail.com', '0300000', 'Skin Care', 'lahore', 'lahore', 'image/download.jpg', '*');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) NOT NULL,
  `doc_email` varchar(20) NOT NULL,
  `feedback` varchar(20) NOT NULL,
  `rank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `doc_email`, `feedback`, `rank`) VALUES
(11, 'fahad@gmail.com', 'good', ''),
(12, 'farwariaz20@gmail.co', 'Choose feedback', '2'),
(13, 'farwariaz20@gmail.co', 'Choose feedback', '2'),
(14, 'farwariaz20@gmail.co', 'Choose feedback', '2'),
(15, 'farwariaz20@gmail.co', 'fair', '2'),
(16, 'farwariaz20@gmail.co', 'fair', '2'),
(17, 'farwariaz20@gmail.co', 'fair', '2'),
(18, 'fahad@gmail.com', 'good', '3');

-- --------------------------------------------------------

--
-- Table structure for table `health_pro`
--

CREATE TABLE `health_pro` (
  `id` int(20) NOT NULL,
  `product` varchar(30) NOT NULL,
  `disease` varchar(30) NOT NULL,
  `pic` varchar(150) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_pro`
--

INSERT INTO `health_pro` (`id`, `product`, `disease`, `pic`, `price`) VALUES
(1, 'Panadol', 'Fever', 'image/download.jpg', '50'),
(2, 'Omega', 'Stomach', 'image/download (1).jpg', '50');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(20) NOT NULL,
  `medicine` varchar(30) NOT NULL,
  `disease` varchar(30) NOT NULL,
  `pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `title`, `address`, `latitude`, `longitude`, `created`, `modified`, `status`) VALUES
(1, 'Lahore', 'Punjab South Area', '220000', '300000', '2020-11-27 04:11:15', '2020-11-25 00:00:00', 1),
(2, 'Pakpatan', 'Pakpatan Punjab', '220000', '300000', '2020-11-27 04:11:15', '2020-11-25 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(8) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `phone`, `password`, `status`) VALUES
(1, 'test', 'test@gmail.com', '0300000000', '786', 'Approved'),
(2, 'fahad', 'fahad@gmail.com', '897489324', '7861', 'pending'),
(3, 'tst1', 'tst1@gmail.com', '76437384683', '7861', 'pending'),
(4, 'farwa', 'farwa@gmail.com', '76875476', '78612', 'pending'),
(5, 'riaz', 'riaz@gmail.com', '03000000', '7861', 'pending'),
(6, 'asad', '123@gmail.com', '7698709', '786', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `disease` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `pic` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_doc`
--
ALTER TABLE `booking_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`pmdc`);

--
-- Indexes for table `doctor_profile`
--
ALTER TABLE `doctor_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_pro`
--
ALTER TABLE `health_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_doc`
--
ALTER TABLE `booking_doc`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `pmdc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60988;

--
-- AUTO_INCREMENT for table `doctor_profile`
--
ALTER TABLE `doctor_profile`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `health_pro`
--
ALTER TABLE `health_pro`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
