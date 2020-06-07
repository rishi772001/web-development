-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:33
-- Generation Time: Feb 20, 2020 at 06:35 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyx_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `name` varchar(100) NOT NULL,
  `phno` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`name`, `phno`, `email`, `addr`, `link`) VALUES
('Rishi Raj', '08681913204', 'rishi772001@gmail.com', 'No.41/28, Vasantha nagar 1st street, Thiruvottiyur', 'www.rishirajstud.blogspot.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phno` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `phno`, `password`, `id`) VALUES
('rishi', 'rishi@gmail.com', 2147483647, 'rishi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
