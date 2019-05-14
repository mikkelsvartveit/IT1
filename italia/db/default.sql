-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14. Mai, 2019 19:02 p.m.
-- Server-versjon: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `italia`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `elev`
--

CREATE TABLE IF NOT EXISTS `elev` (
  `idelev` int(11) NOT NULL AUTO_INCREMENT,
  `fornavn` varchar(45) NOT NULL,
  `etternavn` varchar(45) NOT NULL,
  `trinn` varchar(6) NOT NULL,
  `ukedag` varchar(7) NOT NULL,
  PRIMARY KEY (`idelev`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dataark for tabell `elev`
--

INSERT INTO `elev` (`idelev`, `fornavn`, `etternavn`, `trinn`, `ukedag`) VALUES
(1, 'Mikkel', 'Svartveit', 'vg2', 'onsdag'),
(2, 'Ole', 'Olsen', 'ansatt', 'fredag'),
(3, 'Kari', 'Nordmann', 'vg1', 'tirsdag');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `mat`
--

CREATE TABLE IF NOT EXISTS `mat` (
  `matrett_idmatrett` int(11) NOT NULL,
  `elev_idelev` int(11) NOT NULL,
  PRIMARY KEY (`matrett_idmatrett`,`elev_idelev`),
  KEY `fk_matrett_has_elev_elev1_idx` (`elev_idelev`),
  KEY `fk_matrett_has_elev_matrett_idx` (`matrett_idmatrett`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `mat`
--

INSERT INTO `mat` (`matrett_idmatrett`, `elev_idelev`) VALUES
(1, 1),
(8, 1),
(9, 1),
(2, 2),
(4, 2),
(11, 2),
(1, 3),
(5, 3),
(10, 3);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `matrett`
--

CREATE TABLE IF NOT EXISTS `matrett` (
  `idmatrett` int(11) NOT NULL AUTO_INCREMENT,
  `navn` varchar(100) NOT NULL,
  `informasjon` text,
  `bilde` varchar(255) NOT NULL,
  `pris` int(11) NOT NULL,
  `type` varchar(1) NOT NULL,
  PRIMARY KEY (`idmatrett`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `mat`
--
ALTER TABLE `mat`
  ADD CONSTRAINT `fk_matrett_has_elev_matrett` FOREIGN KEY (`matrett_idmatrett`) REFERENCES `matrett` (`idmatrett`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matrett_has_elev_elev1` FOREIGN KEY (`elev_idelev`) REFERENCES `elev` (`idelev`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
