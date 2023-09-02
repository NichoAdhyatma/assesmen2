-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 06:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assesment`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `usia` int(64) NOT NULL,
  `pendidikan_terakhir` varchar(64) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `usia`, `pendidikan_terakhir`, `updated_at`, `created_at`) VALUES
(3, 'a', '$2y$10$VxvDrOePfDEVnsA8bAKivel3e6gTzA.Ej.UY70gYFOxqKkAQxbnZu', 'a', 0, 0, '', '2023-08-31 18:41:10', '2023-08-31 18:41:10'),
(4, 'aa', '$2y$10$jd2/wnB5jxwyuYrCCZz7LeCHwe71RUhyPvhiFOR92SnMUoAoTe7F.', 'aa', 0, 0, '', '2023-08-31 18:42:56', '2023-08-31 18:42:56'),
(5, 'aas', '$2y$10$fo6DJMnTdKjza2CV3Mbd6ONApIpWXb5UXx8Kg9Biog7VOZYjzO9Ny', 'aas', 0, 0, '', '2023-08-31 18:44:18', '2023-08-31 18:44:18'),
(6, 'a', '$2y$10$9P66z.pfe8.uWIlezRUa9eOoIMuEUK8as4CuiJiMYf7wpCNEREQui', 'a', 1, 0, '', '2023-08-31 18:47:36', '2023-08-31 18:47:36'),
(7, 'admin', '$2y$10$BazmkAabIWjkO6AX8YT3cuYhYgKIA5P72nYQbQMkyFt01Uo10vuDa', 'admin', 1, 0, '', '2023-08-31 19:19:27', '2023-08-31 19:19:27'),
(8, 'toro', '$2y$10$GjREOIIVE4XOzgTVMR7GQu3s05ewaMSNbi3xHVicndCSi8EeLrV9q', 'ko Toro', 1, 0, '', '2023-08-31 19:27:34', '2023-08-31 19:27:34'),
(9, 'a', '$2y$10$FXLp.4LzEMyzWS5waJ0MJuC1yIB.T8J6K4k4ilAe1HjZmuoI4ZdHW', 'a', 1, 23, 'S1', '2023-08-31 20:09:50', '2023-08-31 20:09:50');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
