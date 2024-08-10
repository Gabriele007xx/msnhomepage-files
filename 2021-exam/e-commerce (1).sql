-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 16, 2021 alle 12:36
-- Versione del server: 10.1.38-MariaDB
-- Versione PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `compra`
--

CREATE TABLE `compra` (
  `username` varchar(45) NOT NULL,
  `idprodotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `compra`
--

INSERT INTO `compra` (`username`, `idprodotto`) VALUES
('a', 1),
('x', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id` int(11) NOT NULL,
  `Venditore` varchar(45) NOT NULL,
  `Nome_prodotto` varchar(45) NOT NULL,
  `Prezzo` int(11) NOT NULL,
  `Scadenza` varchar(45) NOT NULL,
  `Immagine` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id`, `Venditore`, `Nome_prodotto`, `Prezzo`, `Scadenza`, `Immagine`) VALUES
(0, 'Jeff', 'aaaaaa', 12, 'a', 'a'),
(1, 'Jeff', 'cannavazzo', 300, 'mai', 'ciao'),
(2, 'Jeff', 'aaaaa', 9, 'aaaaa', 'aaaaaaa'),
(3, 'Jeff', 'ventilatore', 10, 'aaaa', '/images/lol'),
(4, 'Jeff', 'telefono', 1111, '1111', '1111'),
(5, 'DJ', 'Pezzo Musicale', 999, '12-12-2021', '/u'),
(6, 'DJ', 'Pezzo Musicale', 12, '12-09-2021', '/url/kk');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `datar` varchar(45) NOT NULL,
  `ul` varchar(45) NOT NULL,
  `NumeroAcquisti` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `username`, `password`, `datar`, `ul`, `NumeroAcquisti`) VALUES
(1, 'a', '0cc175b9c0f1b6a831c399e269772661', '19/5/2021', '19/5/2021 10:19:27', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `venditore`
--

CREATE TABLE `venditore` (
  `idVenditore` int(10) NOT NULL,
  `VenditoreUsername` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cognome` varchar(45) NOT NULL,
  `Azienda` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `venditore`
--

INSERT INTO `venditore` (`idVenditore`, `VenditoreUsername`, `pass`, `Nome`, `Cognome`, `Azienda`) VALUES
(1, 'Jeff', '0cc175b9c0f1b6a831c399e269772661', 'Jeff', 'Bezos', 'Amazon.com'),
(2, 'Virgola', '0cc175b9c0f1b6a831c399e269772661', 'lol', 'haha', 'microsoft');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`username`),
  ADD KEY `idprodotto` (`idprodotto`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`,`username`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `venditore`
--
ALTER TABLE `venditore`
  ADD PRIMARY KEY (`idVenditore`),
  ADD UNIQUE KEY `VenditoreUsername` (`VenditoreUsername`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `venditore`
--
ALTER TABLE `venditore`
  MODIFY `idVenditore` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idprodotto`) REFERENCES `prodotto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
