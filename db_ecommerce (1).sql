-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 19, 2023 alle 08:21
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(32) NOT NULL,
  `data` date NOT NULL,
  `IdUtente` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`id`, `data`, `IdUtente`) VALUES
(3, '2023-05-12', 4),
(4, '2023-05-19', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `idc` int(32) NOT NULL,
  `nome` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`idc`, `nome`) VALUES
(5, 'Cronografo'),
(6, 'gmt'),
(8, 'acciaio');

-- --------------------------------------------------------

--
-- Struttura della tabella `commento`
--

CREATE TABLE `commento` (
  `id` int(32) NOT NULL,
  `text` varchar(256) NOT NULL,
  `stelle` int(1) NOT NULL,
  `IdUtente` int(32) NOT NULL,
  `IdProdotto` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `commento`
--

INSERT INTO `commento` (`id`, `text`, `stelle`, `IdUtente`, `IdProdotto`) VALUES
(14, 'molto bello ma sono povero', 5, 5, 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `contiene`
--

CREATE TABLE `contiene` (
  `id` int(32) NOT NULL,
  `IdCarrello` int(32) NOT NULL,
  `IdProdotto` int(32) NOT NULL,
  `quantita` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `contiene`
--

INSERT INTO `contiene` (`id`, `IdCarrello`, `IdProdotto`, `quantita`) VALUES
(6, 3, 7, 1),
(8, 3, 7, 1),
(11, 4, 7, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `foto`
--

CREATE TABLE `foto` (
  `idf` int(32) NOT NULL,
  `path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `foto`
--

INSERT INTO `foto` (`idf`, `path`) VALUES
(6, 'prod_images\\Rolex Daytona 116503.jpg'),
(7, 'uploads/'),
(8, 'uploads/'),
(9, 'uploads/'),
(10, 'prod_images\\APCrono.jpg'),
(11, 'prod_images\\royalOak.jpg'),
(13, 'prod_images\\patek.jpg'),
(14, 'prod_images\\patekCrono.jpg'),
(15, 'prod_images\\gmt.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `id` int(32) NOT NULL,
  `data` date NOT NULL,
  `prezzo` int(32) NOT NULL,
  `IdCarrello` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `id` int(32) NOT NULL,
  `titolo` varchar(256) NOT NULL,
  `descrizione` text NOT NULL,
  `venditore` varchar(256) NOT NULL,
  `quantitaMag` varchar(256) NOT NULL,
  `prezzo` int(32) NOT NULL,
  `IdCategoria` int(32) NOT NULL,
  `IdFoto` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`id`, `titolo`, `descrizione`, `venditore`, `quantitaMag`, `prezzo`, `IdCategoria`, `IdFoto`) VALUES
(7, 'Rolex Daytona 116503', 'Sinonimo di eccellenza e affidabilità, gli orologi Rolex sono progettati per essere indossati ogni giorno e, a seconda del modello, sono assolutamente adatti per praticare numerosi sport e altre attività. Costruiti per durare, questi orologi sono caratterizzati da un’estetica inconfondibile e senza tempo.\r\n\r\n', 'Rolex', '3', 24000, 5, 6),
(8, 'Rolex gmt pepsi ', 'Rolex gmt pepsi con cinturino oyster', 'Rolex', '10', 22000, 6, 15),
(9, 'Audemars Piguet Royal Oak Chrono', 'AP Chrono limited edition', 'Audemars Piguet', '3', 80000, 5, 10),
(10, 'patek philippe nautilus 5711', 'nautilus acciao , fondello vetro , 5711 ', 'Patek Philippe', '3', 70000, 8, 13),
(11, 'patek philippe chrono 5712', 'nautilus acciao , fondello vetro , 5712, chrono ', 'patek philippe', '5', 120000, 5, 14);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(32) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `cognome` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `indirizzo` varchar(256) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nome`, `cognome`, `email`, `password`, `indirizzo`, `admin`) VALUES
(4, 'admin', 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 1),
(5, 'marco ', 'pellegrino', 'pellegrinomarco04@gmail.com', 'f5888d0bb58d611107e11f7cbc41c97a', 'via fratelli rosselli', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKUtente` (`IdUtente`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idc`);

--
-- Indici per le tabelle `commento`
--
ALTER TABLE `commento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKUtente2` (`IdUtente`),
  ADD KEY `FKProdotto` (`IdProdotto`);

--
-- Indici per le tabelle `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKCarrello2` (`IdCarrello`),
  ADD KEY `FKProdotto2` (`IdProdotto`);

--
-- Indici per le tabelle `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`idf`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKCarrello` (`IdCarrello`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKFoto` (`IdFoto`),
  ADD KEY `FKCategoria` (`IdCategoria`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idc` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `commento`
--
ALTER TABLE `commento`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `contiene`
--
ALTER TABLE `contiene`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `foto`
--
ALTER TABLE `foto`
  MODIFY `idf` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `FKUtente` FOREIGN KEY (`IdUtente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `commento`
--
ALTER TABLE `commento`
  ADD CONSTRAINT `FKProdotto` FOREIGN KEY (`IdProdotto`) REFERENCES `prodotto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKUtente2` FOREIGN KEY (`IdUtente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `FKCarrello2` FOREIGN KEY (`IdCarrello`) REFERENCES `carrello` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKProdotto2` FOREIGN KEY (`IdProdotto`) REFERENCES `prodotto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `FKCarrello` FOREIGN KEY (`IdCarrello`) REFERENCES `carrello` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `FKCategoria` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`idc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKFoto` FOREIGN KEY (`IdFoto`) REFERENCES `foto` (`idf`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
