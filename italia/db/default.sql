-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10. Mai, 2019 23:02 PM
-- Server-versjon: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `italia`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `elev`
--

CREATE TABLE `elev` (
  `idelev` int(11) NOT NULL,
  `fornavn` varchar(45) DEFAULT NULL,
  `etternavn` varchar(45) DEFAULT NULL,
  `klasse` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `elev`
--

INSERT INTO `elev` (`idelev`, `fornavn`, `etternavn`, `klasse`) VALUES
(1, 'Mikkel', 'Svartveit', '2STUC'),
(2, 'Ole', 'Olsen', '1IDRA'),
(3, 'Kari', 'Hansen', '3KDAA');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `mat`
--

CREATE TABLE `mat` (
  `matrett_idmatrett` int(11) NOT NULL,
  `elev_idelev` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `mat`
--

INSERT INTO `mat` (`matrett_idmatrett`, `elev_idelev`) VALUES
(1, 1),
(1, 3),
(2, 2),
(4, 2),
(6, 3),
(8, 1),
(9, 1),
(10, 3),
(11, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `matrett`
--

CREATE TABLE `matrett` (
  `idmatrett` int(11) NOT NULL,
  `navn` varchar(100) DEFAULT NULL,
  `informasjon` text,
  `bilde` varchar(255) DEFAULT NULL,
  `pris` int(11) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `matrett`
--

INSERT INTO `matrett` (`idmatrett`, `navn`, `informasjon`, `bilde`, `pris`, `type`) VALUES
(1, 'Bruschetta', 'Sprøstekt brød, oliven, basilikum og hvitløk.', 'bruschetta.jpg', 60, 'f'),
(2, 'Fritert Calamari', 'Frityrstekte ringer av blekksprut.', 'calamari.jpg', 80, 'f'),
(3, 'Mozzarella Sticks', 'Frityrstekte sticks av mozzarella.', 'mozzarellasticks.jpg', 50, 'f'),
(4, 'Cæsarsalat', 'Grønn salat, kylling, bacon, parmesan, krutonger og dressing.', 'ceasarsalat.jpg', 100, 'h'),
(5, 'Pizza Margherita', 'Tomatsaus, mozzarellaost og basilikum.', 'pizza.jpg', 120, 'h'),
(6, 'Pizza Regina', 'Tomatsaus, mozzarellaost, skinke, sopp og oliven.', 'regina.jpg', 130, 'h'),
(7, 'Spaghetti Bolognese', 'Spagetti, kjøttdeig og tomatsaus.', 'bolognese.jpg', 130, 'h'),
(8, 'Spaghetti Carbonara', 'Spagetti, egg, parmesan og bacon.', 'carbonara.jpg', 110, 'h'),
(9, 'Crème Brûlée', 'Crème Brûlée toppet med et lag av karamellisert sukker.', 'cremebrulee.jpg', 60, 'd'),
(10, 'Panna Cotta', 'Panna Cotta av vanilje med bringebærsaus, toppet med friske bær.', 'pannacotta.jpg', 80, 'd'),
(11, 'Tiramisu', 'Fingerkjeks, kaffe og mascarpone-krem.', 'tiramisu.jpg', 70, 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elev`
--
ALTER TABLE `elev`
  ADD PRIMARY KEY (`idelev`);

--
-- Indexes for table `mat`
--
ALTER TABLE `mat`
  ADD PRIMARY KEY (`matrett_idmatrett`,`elev_idelev`),
  ADD KEY `fk_matrett_has_elev_elev1_idx` (`elev_idelev`),
  ADD KEY `fk_matrett_has_elev_matrett_idx` (`matrett_idmatrett`);

--
-- Indexes for table `matrett`
--
ALTER TABLE `matrett`
  ADD PRIMARY KEY (`idmatrett`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elev`
--
ALTER TABLE `elev`
  MODIFY `idelev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `matrett`
--
ALTER TABLE `matrett`
  MODIFY `idmatrett` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `mat`
--
ALTER TABLE `mat`
  ADD CONSTRAINT `fk_matrett_has_elev_elev1` FOREIGN KEY (`elev_idelev`) REFERENCES `elev` (`idelev`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matrett_has_elev_matrett` FOREIGN KEY (`matrett_idmatrett`) REFERENCES `matrett` (`idmatrett`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
