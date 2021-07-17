-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2020 at 11:25 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_ticket_reservation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `bus_post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `per_price` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `tour_date` date NOT NULL,
  `payment_type` varchar(200) NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0',
  `paid_alert` tinyint(4) NOT NULL DEFAULT '0',
  `tour_status` tinyint(4) NOT NULL DEFAULT '0',
  `booking_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `bus_post_id`, `user_id`, `per_price`, `person`, `total_price`, `tour_date`, `payment_type`, `paid`, `paid_alert`, `tour_status`, `booking_date`) VALUES
(1, 5, 12, 25000, 2, 50000, '2020-05-30', 'online', 0, 0, 0, '2020-05-12'),
(2, 4, 13, 1800, 1, 1800, '2020-05-01', 'Pay Before Departure Time', 1, 1, 1, '2020-05-12'),
(3, 2, 13, 5000, 1, 5000, '2020-05-30', 'online', 0, 0, 0, '2020-05-12'),
(4, 4, 16, 4500, 10, 45000, '2020-11-30', 'online', 0, 1, 0, '2020-05-12'),
(5, 2, 16, 5000, 2, 10000, '2020-05-27', 'online', 1, 1, 1, '2020-05-12'),
(6, 5, 16, 25000, 1, 25000, '2020-05-29', 'Pay Before Departure Time', 0, 0, 0, '2020-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_post`
--

CREATE TABLE `tbl_bus_post` (
  `bus_post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `bus_image` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `source` varchar(200) NOT NULL,
  `destination` varchar(6000) NOT NULL,
  `days` varchar(200) NOT NULL,
  `nights` varchar(200) NOT NULL,
  `inclusions` text NOT NULL,
  `exclusions` text NOT NULL,
  `per_price` int(11) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bus_post`
--

INSERT INTO `tbl_bus_post` (`bus_post_id`, `category_id`, `type_id`, `title`, `bus_image`, `details`, `source`, `destination`, `days`, `nights`, `inclusions`, `exclusions`, `per_price`, `post_date`) VALUES
(2, 3, 3, 'Lahore To Gilgit', 'images/BUS.png', 'This is the world wrestling. updated\r\nThis is the world wrestling. This is the world wrestling. updated\r\nThis is the world wrestling. This is the world wrestling. updated\r\nThis is the world wrestling. This is the world wrestling. updated\r\nThis is the world wrestling.', 'Lahore', 'Gilgit', '5', '4', 'Water\r\n<br>\r\nFood\r\n<br>\r\n', 'Tax\r\n<br>\r\nFood\r\n<br>\r\nIdea', 5000, '2020-04-06'),
(3, 1, 3, 'Lahore to Peshawar', 'images/BUS - Copy.png', 'N/A', 'Lahore', 'Peshawar', '1', '1', 'Water\r\n<br>\r\nFood\r\n<br>\r\n', 'N/A', 200, '2020-04-06'),
(4, 1, 4, 'Muree To Naran', 'images/vision2.png', 'This is the world wrestling. updated This is the world wrestling. This is the world wrestling. updated This is the world wrestling. This is the world wrestling. updated This is the world wrestling. This is the world wrestling. updated This is the world wrestling.', 'Muree', 'Naran', '10', '0', 'Water\r\n<br>\r\nFood\r\n<br>\r\n', 'Tax\r\n<br>\r\nFood\r\n<br>\r\nIdea', 4500, '2020-04-07'),
(5, 3, 3, 'Faisalbd to Nankana', 'images/vision2 - Copy.png', 'This bus goes to Faisalbad to Nankana and same as the other locations. This is a bus post of 2020. I am Sajid Web Intrenee.', 'Faisalbd', 'Nankana', '20', '20', 'Food<br>\r\nDrink<br>\r\nFood<br>\r\nFood<br>\r\nDrink<br>\r\nFood<br>\r\n', 'N/A<br>\r\nN/A<br>\r\nN/A<br>', 25000, '2020-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `title`) VALUES
(1, 'Daily Buses'),
(3, 'Monthly Buses'),
(4, 'Weekly Buses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `number_of_seats` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `title`, `number_of_seats`) VALUES
(1, 'Mega Bus', '92'),
(3, 'Small Seater', '40'),
(4, 'Mini Bus', '22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `email`, `phone`, `gender`, `image`, `password`, `role`, `join_date`) VALUES
(1, 'admin', 'admin@gmail.com', '0000000000000', 'male', 'images/profile.jpg', 'admin', 'admin', NULL),
(12, 'sajid', 'sajid@gmail.com', '0563610110', 'male', 'images/IMG-20200505-WA0026.jpg', 'user', 'user', '2020-04-05'),
(13, 'Muhammad Husain', 'username@gmil.com', '021000', 'male', 'images/5.png', 'user', 'user', '2020-04-06'),
(14, 'Front Desk', 'frontdesk@gmail.com', '030000000000', 'male', 'images/profile.jpg', 'frontdesk', 'frontdesk', '2020-05-03'),
(15, 'Front Desk Ayesha', 'frontdesk-ayesha@gmail.com', '044747474747', 'female', 'images/maxresdefault.jpg', 'frontdesk', 'frontdesk', '2020-05-03'),
(16, 'VU', 'vu@gmail.com', '056565656', 'male', 'images/1.png', 'user', 'user', '2020-05-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_bus_post`
--
ALTER TABLE `tbl_bus_post`
  ADD PRIMARY KEY (`bus_post_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_bus_post`
--
ALTER TABLE `tbl_bus_post`
  MODIFY `bus_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
