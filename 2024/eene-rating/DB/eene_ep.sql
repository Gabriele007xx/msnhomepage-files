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
-- Struttura della tabella `eene_ep`
--

CREATE TABLE `eene_ep` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `eene_ep`
--

INSERT INTO `eene_ep` (`id`, `title`, `description`) VALUES
(1, 'The Ed-Touchables', 'When children suspect someone is touching their stuff, Eddy devises a plan to catch the culprit.'),
(2, 'Nagged to Ed', 'The Kanker Sisters capture and take care of the Eds in their mobile home.'),
(3, 'Pop Goes the Ed', 'The Eds try to show off at Nazz\'s summertime sprinkler party.'),
(4, 'Over Your Ed', 'Eddy decides that he and Edd should teach Ed social graces.'),
(5, 'Sir Ed-a-Lot', 'Edd and Eddy help Ed babysit Jimmy and Sarah.'),
(6, 'A Pinch to Grow an Ed', 'Eddy\'s dislike of being shorter than most of the other kids inspires Ed and Edd to try to make him taller.'),
(7, 'Dawn of the Eds', 'The Eds\' imaginations run amok on their way to a sci-fi movie.'),
(8, 'Virt-Ed-Go', 'When the Eds construct a tree house, the Kankers take it over. Undaunted, the Eds try to get it back.'),
(9, 'Read All About Ed', 'Edd takes on a paper route to save up for an electron microscope. Eddy is immediately lured by the prospect of big money.'),
(10, 'Quick Shot Ed', 'The Eds come across an old camera. They then decide to take pictures of all the cul-de-sac kids, put them in a calendar, and sell it back to them.');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `eene_ep`
--
ALTER TABLE `eene_ep`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `eene_ep`
--
ALTER TABLE `eene_ep`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
