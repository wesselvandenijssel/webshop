-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 nov 2021 om 10:10
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `apikey` varchar(56) NOT NULL,
  `user` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `access`
--

INSERT INTO `access` (`id`, `apikey`, `user`) VALUES
(1, 'e8636ea013e682faf61f56ce1cb1ab5c', 'test'),
(2, '098f6bcd4621d373cade4e832627b4f6', 'test2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `basket`
--

CREATE TABLE `basket` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `basket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `sort` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `naam` varchar(256) NOT NULL,
  `beschrijving` text NOT NULL,
  `toegevoegd_op` datetime DEFAULT NULL,
  `gewijzigd_op` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`sort`, `id`, `naam`, `beschrijving`, `toegevoegd_op`, `gewijzigd_op`) VALUES
('Drinks', 1, '', '', NULL, '2021-10-13 08:32:39'),
('Food', 2, '', '', NULL, '2021-10-13 08:32:39'),
('', 4, 'fddfssdf', 'dfsfdssdf', '2021-10-14 12:54:00', '2021-10-14 10:54:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL,
  `prijs` decimal(6,2) NOT NULL,
  `toegevoegd_op` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gewijzigd_op` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `category_id`, `naam`, `beschrijving`, `prijs`, `toegevoegd_op`, `gewijzigd_op`) VALUES
(4, 1, 'dfsfdzzzzz', 'sdfdsdf', '0.00', '2021-10-14 09:47:00', '2021-10-14 09:47:00'),
(5, 1, 'dfsfd', 'sdfdsdf', '0.00', '2021-10-14 09:47:00', '2021-10-14 09:47:00'),
(7, 32, 'dsffdsdf', 'dfsfdssdf', '0.00', '2021-10-14 10:10:00', '2021-10-14 10:10:00'),
(8, 32, 'dsffdsdf', 'dfsfdssdf', '0.00', '2021-10-14 10:10:00', '2021-10-14 10:10:00'),
(9, 32, 'dsffdsdf', 'dfsfdssdf', '0.00', '2021-10-14 10:10:00', '2021-10-14 10:10:00'),
(10, 1, '1', '1', '1.00', '2021-11-11 13:22:09', '2021-11-11 13:22:09'),
(11, 1, '1', '1', '1.00', '2021-11-11 13:22:50', '2021-11-11 13:22:50'),
(12, 1, '1', '1', '1.00', '2021-11-11 13:24:49', '2021-11-11 13:24:49'),
(13, 0, '', '', '0.00', '2021-11-12 09:04:49', '2021-11-12 09:04:49');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_password_hash` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password_hash`) VALUES
(1, 'test', 'test@test.nl', 'test1234'),
(2, 'test1234', 'test1234@test.nl', '$2y$10$rKYsYmg5fzLGjRpF7A96heJmOQeJcq7vIQHrGylA2/TPdD5/nvB4a');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`);

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
