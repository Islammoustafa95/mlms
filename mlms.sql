-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 04:31 PM
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
-- Database: `mlms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `upline` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `dateRegistered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `upline`, `name`, `username`, `password`, `activated`, `dateRegistered`) VALUES
(1, NULL, 'Sistema', 'sistema@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(2, 1, 'Giorgi', 'giorgicb@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(3, 1, 'Ana Paula', 'anapaula@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(4, 3, 'Bruna', 'bruna@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(5, 3, 'Isis Bastos', 'isis@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(6, 4, 'maria', 'maria@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(7, 6, 'Jose', 'jose@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(8, 7, 'Paulo', 'paulo@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(9, 1, 'gilmar@gmail.com', 'gilmar@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(10, 1, 'fabricio@gmail.com', 'fabricio@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(11, 1, 'ricardo@gmail.com', 'ricardo@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(12, 1, 'fernanda@gmail.com', 'fernanda@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(13, 1, 'fabio@gmail.com', 'fabio@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(14, 2, 'tom@gmail.com', 'tom@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(15, 2, 'moacir@gmail.com', 'moacir@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(16, 2, 'andreia@gmail.com', 'andreia@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(17, 2, 'julio@gmail.com', 'julio@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '2019-12-29 14:45:50'),
(23, 1, 'asdasd', 'asdasd', '*033325B717C9347C9FD49BA1F76B0D3', 0, '2019-12-29 14:45:50'),
(24, 1, 'asdasda', 'asdasda', '*033325B717C9347C9FD49BA1F76B0D3', 0, '2019-12-29 14:45:50'),
(26, 23, 'asdasd', 'asd', '*033325B717C9347C9FD49BA1F76B0D3', 0, '2019-12-29 15:23:23'),
(27, 23, 'Abraham Guerrero', 'abraham28', '*96852F71D6F4BD293CB9FC162ABB2DE', 0, '2019-12-29 15:27:19'),
(28, 23, 'Abraham Guerrero', 'abraham28z', '*96852F71D6F4BD293CB9FC162ABB2DE', 0, '2019-12-29 15:28:16'),
(29, 27, 'Student of Future', 'admin', '*E56A114692FE0DE073F9A1DD68A00EE', 0, '2019-12-29 15:28:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
