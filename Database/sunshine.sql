-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 02:54 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunshine`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditorium_details`
--

CREATE TABLE `auditorium_details` (
  `Aud_ID` int(100) NOT NULL,
  `Aud_name` varchar(200) NOT NULL,
  `Aud_capacity` int(200) NOT NULL,
  `Aud_rate` varchar(100) NOT NULL,
  `Aud_about` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditorium_details`
--

INSERT INTO `auditorium_details` (`Aud_ID`, `Aud_name`, `Aud_capacity`, `Aud_rate`, `Aud_about`) VALUES
(1, 'Sunshark', 600, '1000', 'Well polished seats with AC ,all arrangements will be done for parties weddings and other functions'),
(2, 'Rivera', 1500, '1250', 'Best in class ambiance with all perfect lighting systems and economical price'),
(3, 'Pioneer', 3000, '4000', 'Pioneer is the most vibrant wedding destination wit all the things that need  to keep you going with the daylight '),
(4, 'Silverway', 1000, '800', 'Bring the best in your time with the silver-way auditorium\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `aud_temp`
--

CREATE TABLE `aud_temp` (
  `Aud_ID` int(50) NOT NULL,
  `User_id` int(50) NOT NULL,
  `Date` date NOT NULL,
  `Start_time` int(100) NOT NULL,
  `End_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `date_table`
--

CREATE TABLE `date_table` (
  `Transaction_ID` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Start_time` int(100) NOT NULL,
  `End_time` int(100) NOT NULL,
  `Aud_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date_table`
--

INSERT INTO `date_table` (`Transaction_ID`, `Date`, `Start_time`, `End_time`, `Aud_ID`) VALUES
(1, '2019-04-02', 10, 12, 4),
(1, '2019-04-03', 10, 16, 4),
(2, '2019-04-02', 10, 16, 3),
(2, '2019-04-03', 10, 16, 3),
(3, '2019-04-02', 14, 20, 4),
(3, '2019-04-03', 17, 20, 4),
(4, '2019-04-02', 10, 12, 2),
(4, '2019-04-03', 10, 12, 2),
(5, '2019-04-03', 10, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Transaction_ID` int(100) NOT NULL,
  `User_ID` int(100) NOT NULL,
  `Aud_ID` int(100) NOT NULL,
  `Total_cost` float(30,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_ID`, `User_ID`, `Aud_ID`, `Total_cost`) VALUES
(1, 1, 4, 6400.000),
(2, 1, 3, 48000.000),
(3, 2, 4, 7200.000),
(4, 2, 2, 5000.000),
(5, 2, 1, 2000.000);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Email_id` varchar(300) NOT NULL,
  `Phone_number` int(255) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `User_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`First_name`, `Last_name`, `Email_id`, `Phone_number`, `Password`, `User_ID`) VALUES
('Arjun', 'S', 'ajs@gmail.com', 2147483647, 'arjun123', 1),
('Abhijith', 'DDMCA', 'abhijithddmca@gmail.com', 2147483647, '1234567', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditorium_details`
--
ALTER TABLE `auditorium_details`
  ADD PRIMARY KEY (`Aud_ID`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `User_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
