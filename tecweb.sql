-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 01, 2021 alle 23:34
-- Versione del server: 10.1.38-MariaDB
-- Versione PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tecweb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `domande`
--

CREATE TABLE `domande` (
  `idQ` int(30) NOT NULL,
  `domanda` varchar(100) NOT NULL,
  `punti` int(30) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `domande`
--

INSERT INTO `domande` (`idQ`, `domanda`, `punti`, `tipo`) VALUES
(1, 'Come si chiama la figlia di Pam?', 2, 'text'),
(2, 'Qual\'e\' il cognome di kelly? ', 2, 'radio'),
(3, 'Come si chiama la squadra notturna di Dwight?', 2, 'select'),
(4, 'quali dei seguenti sono amici storici di dwight?', 4, 'checkbox');

-- --------------------------------------------------------

--
-- Struttura della tabella `risposte`
--

CREATE TABLE `risposte` (
  `idA` int(30) NOT NULL,
  `risposta` varchar(30) NOT NULL,
  `idDomanda` int(30) NOT NULL,
  `risultato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `risposte`
--

INSERT INTO `risposte` (`idA`, `risposta`, `idDomanda`, `risultato`) VALUES
(1, 'cece', 1, 2),
(2, 'Cece', 1, 2),
(1, 'kepor', 2, 0),
(2, 'kukun', 2, 0),
(3, 'kapoor', 2, 2),
(1, 'pharao of the night ', 3, 0),
(2, 'knights of the night', 3, 2),
(3, 'kings of the night', 3, 0),
(4, 'donuts of the night', 3, 0),
(1, 'Kevin malone', 4, 0),
(2, 'Rolf Ahl', 4, 2),
(3, 'Jim Halpert', 4, 0),
(4, 'Trevor Bortmen', 4, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(30) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `nome`, `password`) VALUES
(1, 'sara', 'sara'),
(2, 'maren', 'maren');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `domande`
--
ALTER TABLE `domande`
  ADD PRIMARY KEY (`idQ`) USING BTREE;

--
-- Indici per le tabelle `risposte`
--
ALTER TABLE `risposte`
  ADD KEY `ID_domanda` (`idDomanda`) USING BTREE;

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `risposte`
--
ALTER TABLE `risposte`
  ADD CONSTRAINT `risposte_ibfk_2` FOREIGN KEY (`idDomanda`) REFERENCES `domande` (`idQ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
