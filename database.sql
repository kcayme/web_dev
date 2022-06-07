-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 08:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contactdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id_number` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `province` varchar(50) NOT NULL,
  `citytown` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `time_in` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id_number`, `name`, `province`, `citytown`, `barangay`, `number`, `email`, `time_in`) VALUES
('19101367', 'Miguel Edwin Salubre', 'Cebu', 'Cebu City', 'Talamban', '09186198764', 'migster.salubre@gmai', '2022-06-07 13:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `name` varchar(30) NOT NULL,
  `province` varchar(50) NOT NULL,
  `citytown` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `time_in` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`name`, `province`, `citytown`, `barangay`, `number`, `email`, `time_in`) VALUES
('wakin', 'cebu', 'lacion', 'jugan', '696969420', 'wakin@gmail.com', '2022-05-31 23:57:20'),
('wakin', 'cebu', 'lacion', 'jugan', '213123', 'wakin@gmail.com', '2022-06-01 00:02:28'),
('wakin', 'cebu', 'lacion', 'jugan', '213123', 'wakin@gmail.com', '2022-06-01 00:13:57'),
('wakin', 'cebu', 'lacion', 'jugan', '213123', 'wakin@gmail.com', '2022-06-01 00:18:42'),
('wakin', 'cebu', 'lacion', 'jugan', '213123', 'wakin@gmail.com', '2022-06-01 00:19:20'),
('Karl Jensen Cayme', 'Cebu', 'Liloan', 'Tayud', '2147483647', 'kcayme@gmail.com', '2022-06-07 13:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id_number` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `province` varchar(50) NOT NULL,
  `citytown` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `time_in` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_number`, `name`, `province`, `citytown`, `barangay`, `number`, `email`, `time_in`) VALUES
('17100056', 'Joaquin Angelo A. Resus', 'Cebu', 'Consolacion', 'Jugan ', '09202550120', 'joaquinresus2@gmail.', '2022-06-07 13:41:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `id_number` (`id_number`) USING BTREE,
  ADD KEY `number` (`number`) USING BTREE,
  ADD KEY `email` (`email`) USING BTREE,
  ADD KEY `name` (`name`),
  ADD KEY `address` (`province`),
  ADD KEY `time_in` (`time_in`),
  ADD KEY `citytown` (`citytown`),
  ADD KEY `barangay` (`barangay`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD KEY `number` (`number`) USING BTREE,
  ADD KEY `email` (`email`) USING BTREE,
  ADD KEY `name` (`name`),
  ADD KEY `address` (`province`),
  ADD KEY `time_in` (`time_in`),
  ADD KEY `citytown` (`citytown`),
  ADD KEY `barangay` (`barangay`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `id_number` (`id_number`) USING BTREE,
  ADD KEY `number` (`number`) USING BTREE,
  ADD KEY `email` (`email`) USING BTREE,
  ADD KEY `name` (`name`),
  ADD KEY `address` (`province`),
  ADD KEY `time_in` (`time_in`),
  ADD KEY `citytown` (`citytown`),
  ADD KEY `barangay` (`barangay`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
