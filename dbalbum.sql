-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 12:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbalbum`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumname`
--

CREATE TABLE `albumname` (
  `an_id` int(10) NOT NULL,
  `an_name` varchar(100) NOT NULL,
  `an_detail` varchar(1000) NOT NULL,
  `an_status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albumname`
--

INSERT INTO `albumname` (`an_id`, `an_name`, `an_detail`, `an_status`) VALUES
(1, 'เทศกาลลอยกระทง', 'การจัดกิจกรรมวันลอยกระทง วันที่ 19 พฤศจิกายน 2564 ณ จ.เชียงราย', 'Y'),
(2, 'กิจกรรมวันขึ้นปีใหม่', 'การจัดกิจกรรมส่งท้ายปีเก่า ต้อนรับปีใหม่ วันที่ 31 ธันวาคม 2564', 'Y'),
(7, 'วันคริสต์มาส', 'วันเสาร์, 25 ธันวาคม', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `pic_id` int(10) NOT NULL,
  `pic_name` varchar(100) NOT NULL,
  `an_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`pic_id`, `pic_name`, `an_id`) VALUES
(42, '1_ae451ede-4aff-40bf-b9af-4b121313be77.jpg', 1),
(43, '1_download.jpg', 1),
(44, '1_unnamed.jpg', 1),
(45, '2_bangkok-nye-fireworks.jpg', 2),
(46, '2_unnamed (1).jpg', 2),
(47, '2_unnamed.jpg', 2),
(48, '2_you09p1-1.jpg', 2),
(49, '7_562000012630201.jpg', 7),
(50, '7_hand-drawn-christmas-background-with-santa-claus_23-2148298265.jpg', 7),
(51, '7_line-christmas-keyword-effect-02.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_username` varchar(16) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` enum('ON','OFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_status`) VALUES
(1, 'nawapons', 'nawapons', 'ON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albumname`
--
ALTER TABLE `albumname`
  ADD PRIMARY KEY (`an_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albumname`
--
ALTER TABLE `albumname`
  MODIFY `an_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `pic_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
