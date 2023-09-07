-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 06:16 PM
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
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` int(11) NOT NULL,
  `airport_name` varchar(60) NOT NULL,
  `icao` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `airport_name`, `icao`) VALUES
(1, 'Bangkok BKK', 'VTBS'),
(2, 'Phnom Penh PNH', 'VDPP'),
(3, 'Delhi DEL', 'VIDP'),
(4, 'Tokyo NRT', 'RJAA'),
(5, 'Singapore SIN', 'WSSS'),
(6, 'Jakarta CGK', 'WIII'),
(7, 'Hong Kong HKG', 'VHHH'),
(8, 'Seoul ICN', 'RKSI'),
(9, 'Melbourne MEL', 'YMML'),
(10, 'Taipei TPE', 'RCTP'),
(11, 'Osaka KIX', 'RJBB'),
(12, 'Sydney SYD', 'YSSY'),
(13, 'Kuala Lumpur KUL', 'WMKK'),
(14, 'Denpasar DPS', 'WADD'),
(15, 'Yangon RGN', 'VYYY'),
(16, 'Beijing PEK', 'ZBAA'),
(17, 'Dhaka DAC', 'VGHS'),
(18, 'Guangzhou CAN', 'ZGGG'),
(19, 'Shanghai PVG', 'ZSPD'),
(20, 'Chengdu TFU', 'ZUTF'),
(21, 'Vientiane VTE', 'VLVT'),
(22, 'Frankfurt FRA', 'EDDF'),
(23, 'London LHR', 'EGLL'),
(24, 'Tokyo HND', 'RJTT'),
(25, 'Manila MNL', 'RPLL'),
(26, 'Zurich ZRH', 'LSZH'),
(27, 'Copenhagen CPH', 'EKCH'),
(28, 'Chennai MAA', 'VOMM'),
(29, 'Lahore LHE', 'OPLA'),
(30, 'Ahmedabad AMD', 'VAAH'),
(31, 'Hyderabad HYD', 'VOHS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_ivao_id` varchar(20) NOT NULL DEFAULT 'None',
  `user_vatsim_id` varchar(20) NOT NULL DEFAULT 'None',
  `birthdate` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
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
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
