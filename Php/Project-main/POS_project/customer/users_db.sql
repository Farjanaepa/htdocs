-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 08:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `city`) VALUES
(1, 'JohnDoe', 'john.doe@example.com', '1234567890', 'New York'),
(2, 'JaneDoe', 'jane.doe@example.com', '0987654321', 'Los Angeles'),
(3, 'Alice', 'alice@example.com', '1112223333', 'Chicago'),
(4, 'Bob', 'bob@example.com', '4445556666', 'Houston'),
(5, 'Charlie', 'charlie@example.com', '7778889999', 'San Francisco'),
(6, 'Eve', 'eve@example.com', '6667778888', 'Seattle'),
(7, 'Peter', 'peter@example.com', '9998887777', 'Boston'),
(8, 'Mary', 'mary@example.com', '3332221111', 'Miami'),
(9, 'David', 'david@example.com', '5554443333', 'Dallas'),
(10, 'Sophia', 'sophia@example.com', '2223334444', 'Denver'),
(11, 'Michael', 'michael@example.com', '8889990000', 'Phoenix'),
(12, 'Olivia', 'olivia@example.com', '7776665555', 'Philadelphia'),
(13, 'William', 'william@example.com', '6665554444', 'Detroit'),
(14, 'Emma', 'emma@example.com', '4443332222', 'Portland'),
(15, 'Benjamin', 'benjamin@example.com', '1110009999', 'San Diego'),
(16, 'Ava', 'ava@example.com', '2221110000', 'Las Vegas'),
(17, 'James', 'james@example.com', '9990001111', 'Austin'),
(18, 'Mia', 'mia@example.com', '3334445555', 'San Antonio'),
(19, 'Alexander', 'alexander@example.com', '5554443333', 'Minneapolis'),
(20, 'Charlotte', 'charlotte@example.com', '7778889999', 'Atlanta'),
(21, 'Daniel', 'daniel@example.com', '8887776666', 'New Orleans'),
(22, 'Emily', 'emily@example.com', '6667778888', 'Orlando'),
(23, 'Jack', 'jack@example.com', '1112223333', 'Nashville'),
(24, 'Madison', 'madison@example.com', '4445556666', 'Seattle'),
(25, 'Noah', 'noah@example.com', '7778889999', 'Chicago'),
(26, 'Grace', 'grace@example.com', '6667778888', 'Los Angeles'),
(27, 'Logan', 'logan@example.com', '9998887777', 'Dallas'),
(28, 'Sofia', 'sofia@example.com', '3332221111', 'Houston'),
(29, 'Ethan', 'ethan@example.com', '5554443333', 'Miami'),
(30, 'Liam', 'liam@example.com', '2223334444', 'San Francisco');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
