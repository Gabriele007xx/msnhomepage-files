-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Ago 26, 2024 alle 22:08
-- Versione del server: 8.0.26
-- Versione PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_msnhomepage`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `eene_ep_rating`
--

CREATE TABLE `eene_ep_rating` (
  `id` int NOT NULL,
  `rating` float NOT NULL,
  `number` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `eene_ep_rating`
--

INSERT INTO `eene_ep_rating` (`id`, `rating`, `number`) VALUES
(1, 3, 1),
(2, 5, 1),
(3, 4, 1),
(4, 5, 1),
(5, 4, 1),
(6, 3, 1),
(7, 3, 1),
(8, 4, 1),
(9, 5, 1),
(10, 4, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `eene_ep_rating`
--
ALTER TABLE `eene_ep_rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `eene_ep_rating`
--
ALTER TABLE `eene_ep_rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
