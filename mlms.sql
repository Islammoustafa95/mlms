-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 10:01 AM
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
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `username`, `password`) VALUES
(1, NULL, 'Sistema', 'sistema@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 1, 'Giorgi', 'giorgicb@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 1, 'Ana Paula', 'anapaula@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 3, 'Bruna', 'bruna@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 3, 'Isis Bastos', 'isis@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 4, 'maria', 'maria@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 6, 'Jose', 'jose@gmail.com', '202cb962ac59075b964b07152d234b70'),
(8, 7, 'Paulo', 'paulo@gmail.com', '202cb962ac59075b964b07152d234b70'),
(9, 1, 'gilmar@gmail.com', 'gilmar@gmail.com', '202cb962ac59075b964b07152d234b70'),
(10, 1, 'fabricio@gmail.com', 'fabricio@gmail.com', '202cb962ac59075b964b07152d234b70'),
(11, 1, 'ricardo@gmail.com', 'ricardo@gmail.com', '202cb962ac59075b964b07152d234b70'),
(12, 1, 'fernanda@gmail.com', 'fernanda@gmail.com', '202cb962ac59075b964b07152d234b70'),
(13, 1, 'fabio@gmail.com', 'fabio@gmail.com', '202cb962ac59075b964b07152d234b70'),
(14, 2, 'tom@gmail.com', 'tom@gmail.com', '202cb962ac59075b964b07152d234b70'),
(15, 2, 'moacir@gmail.com', 'moacir@gmail.com', '202cb962ac59075b964b07152d234b70'),
(16, 2, 'andreia@gmail.com', 'andreia@gmail.com', '202cb962ac59075b964b07152d234b70'),
(17, 2, 'julio@gmail.com', 'julio@gmail.com', '202cb962ac59075b964b07152d234b70');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
