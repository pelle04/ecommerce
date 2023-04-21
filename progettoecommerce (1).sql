-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 21, 2023 alle 12:56
-- Versione del server: 10.4.25-MariaDB
-- Versione PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progettoecommerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `Codice` int(11) NOT NULL,
  `Titolo` varchar(32) NOT NULL,
  `Autore` varchar(32) NOT NULL,
  `Marca` varchar(32) NOT NULL,
  `Prezzo` float NOT NULL,
  `Descrizione` text NOT NULL,
  `Quantita` int(11) NOT NULL,
  `IDCategoria` int(11) NOT NULL,
  `DataAggiunta` date NOT NULL,
  `IMG` text NOT NULL,
  `Video` varchar(100) NOT NULL,
  `DataUp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`Codice`, `Titolo`, `Autore`, `Marca`, `Prezzo`, `Descrizione`, `Quantita`, `IDCategoria`, `DataAggiunta`, `IMG`, `Video`, `DataUp`) VALUES
(17, 'rolex daytona 41mm', 'Rolex', 'Rolex', 31000, 'oro acciaio', 10, 6, '2023-04-18', 'daytonaOroAcciaio.jpg', '', '2023-04-18'),
(18, 'rolex submariner acciaio 41mm', 'Rolex', 'Rolex', 12000, 'submariner acciaio nero', 10, 7, '2023-04-21', 'submarinerNero.jpg', '', '2023-04-21'),
(19, 'Rolex submariner hulk', 'Rolex', 'Rolex', 35000, 'hulk', 10, 7, '0000-00-00', 'submarinerHulk.jpg', '', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `carrelli`
--

CREATE TABLE `carrelli` (
  `ID` int(11) NOT NULL,
  `Datac` date NOT NULL,
  `IDUtente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`ID`, `Nome`) VALUES
(6, 'cronografo'),
(7, 'subaqueo');

-- --------------------------------------------------------

--
-- Struttura della tabella `commento`
--

CREATE TABLE `commento` (
  `IDcom` int(11) NOT NULL,
  `Testo` text NOT NULL,
  `Voto` float NOT NULL,
  `IDArticolo` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `contiene`
--

CREATE TABLE `contiene` (
  `QuantitaContiene` int(11) NOT NULL,
  `Commento` text DEFAULT NULL,
  `IDArticolo` int(11) NOT NULL,
  `IDCarrello` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `ID` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Prezzo` int(11) NOT NULL,
  `IDCarrello` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `Nome` varchar(32) NOT NULL,
  `Cognome` varchar(32) NOT NULL,
  `Admin` int(11) NOT NULL DEFAULT 0,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `DataNascita` date NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`Nome`, `Cognome`, `Admin`, `Password`, `Email`, `DataNascita`, `ID`) VALUES
('marco', 'pellegrino', 0, 'f5888d0bb58d611107e11f7cbc41c97a', 'pellegrinomarco04@gmail.com', '0000-00-00', 6),
('davide', 'sarli', 0, '446fca5553df49ad9c6348cf1ff71d51', 'davisarli04@gmail.com', '0000-00-00', 7);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`Codice`),
  ADD KEY `CategoriaArticolo` (`IDCategoria`);

--
-- Indici per le tabelle `carrelli`
--
ALTER TABLE `carrelli`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CarrelloUtente` (`IDUtente`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `commento`
--
ALTER TABLE `commento`
  ADD PRIMARY KEY (`IDcom`),
  ADD KEY `CommentoArticolo` (`IDArticolo`),
  ADD KEY `CommentoUtente` (`IDUtente`);

--
-- Indici per le tabelle `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`IDArticolo`,`IDCarrello`),
  ADD KEY `CarrelloAcquisto` (`IDCarrello`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrdineCarrello` (`IDCarrello`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articoli`
--
ALTER TABLE `articoli`
  MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2475;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `commento`
--
ALTER TABLE `commento`
  MODIFY `IDcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `articoli`
--
ALTER TABLE `articoli`
  ADD CONSTRAINT `CategoriaArticolo` FOREIGN KEY (`IDCategoria`) REFERENCES `categoria` (`ID`);

--
-- Limiti per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  ADD CONSTRAINT `CarrelloUtente` FOREIGN KEY (`IDUtente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `commento`
--
ALTER TABLE `commento`
  ADD CONSTRAINT `CommentoArticolo` FOREIGN KEY (`IDArticolo`) REFERENCES `articoli` (`Codice`),
  ADD CONSTRAINT `CommentoUtente` FOREIGN KEY (`IDUtente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `ArticoloAcquisto` FOREIGN KEY (`IDArticolo`) REFERENCES `articoli` (`Codice`),
  ADD CONSTRAINT `CarrelloAcquisto` FOREIGN KEY (`IDCarrello`) REFERENCES `carrelli` (`ID`);

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `OrdineCarrello` FOREIGN KEY (`IDCarrello`) REFERENCES `carrelli` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
