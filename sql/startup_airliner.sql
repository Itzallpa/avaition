-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 11:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startupairliner`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE `aircraft` (
  `aircraft_id` int(11) NOT NULL,
  `aircraft_name` varchar(60) NOT NULL DEFAULT 'Unknow',
  `aircraft_type` varchar(30) NOT NULL DEFAULT 'None',
  `aircraft_reg` varchar(30) NOT NULL DEFAULT 'XX-XXX',
  `aircraft_add_date` varchar(30) NOT NULL DEFAULT current_timestamp(),
  `aircraft_add_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(11) NOT NULL,
  `airport_name` varchar(60) NOT NULL,
  `icao` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `flight_callsign` varchar(10) NOT NULL DEFAULT 'BNY-NONE',
  `flight_aircraft` int(11) NOT NULL DEFAULT 1,
  `flight_dep` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'ZZZZ',
  `flight_arr` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'ZZZZ',
  `flight_dep_time` varchar(10) NOT NULL DEFAULT '0000',
  `flight_arr_time` varchar(10) NOT NULL DEFAULT '0000',
  `flight_remark` longtext NOT NULL DEFAULT 'None',
  `flight_route` text NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rank_pilot`
--

CREATE TABLE `rank_pilot` (
  `rank_id` int(11) NOT NULL,
  `rank_name` varchar(50) NOT NULL DEFAULT 'Unknow',
  `rank_hour` int(11) NOT NULL DEFAULT 5,
  `rank_note` text NOT NULL DEFAULT '-not request-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rank_pilot`
--

INSERT INTO `rank_pilot` (`rank_id`, `rank_name`, `rank_hour`, `rank_note`) VALUES
(1, 'Student Pilot', 0, '-not request-'),
(2, 'First Officer', 10, '-not request-'),
(3, 'Senior First Officer', 25, '-not request-'),
(4, 'Captain', 50, '-not request-'),
(5, 'Senior Captain', 100, '-not request-');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `log_id` int(11) NOT NULL,
  `log_user` varchar(60) NOT NULL DEFAULT 'Unknow',
  `log_role` varchar(20) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `log_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `server_post`
--

CREATE TABLE `server_post` (
  `id` int(11) NOT NULL,
  `pilot_train_docs` text NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `server_post`
--

INSERT INTO `server_post` (`id`, `pilot_train_docs`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL DEFAULT 'None',
  `email` varchar(255) NOT NULL DEFAULT 'None',
  `user_role` varchar(60) NOT NULL DEFAULT 'Member',
  `rank` int(11) NOT NULL DEFAULT 1,
  `flight_hour` int(11) NOT NULL DEFAULT 0,
  `flight_flow` int(11) NOT NULL DEFAULT 0,
  `user_ivao_id` varchar(20) NOT NULL DEFAULT 'None',
  `user_vatsim_id` varchar(20) NOT NULL DEFAULT 'None',
  `birthdate` varchar(60) NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `profile_picture` longtext NOT NULL DEFAULT 'None',
  `user_comment` varchar(120) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`aircraft_id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `rank_pilot`
--
ALTER TABLE `rank_pilot`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `server_post`
--
ALTER TABLE `server_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircraft`
--
ALTER TABLE `aircraft`
  MODIFY `aircraft_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rank_pilot`
--
ALTER TABLE `rank_pilot`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `server_post`
--
ALTER TABLE `server_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
