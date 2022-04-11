-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Mar 2015, 09:01
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykuly`
--

CREATE TABLE IF NOT EXISTS `artykuly` (
  `IDArtykuly` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProducenciID` int(10) unsigned NOT NULL,
  `Model` text,
  `Typ` text,
  `Cena` double DEFAULT NULL,
  `CenaPromocja` double DEFAULT NULL,
  `Opis` longtext,
  PRIMARY KEY (`IDArtykuly`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `artykuly`
--

INSERT INTO `artykuly` (`IDArtykuly`, `ProducenciID`, `Model`, `Typ`, `Cena`, `CenaPromocja`, `Opis`) VALUES
(1, 1, 'K551LB-XX180D', 'Notebook', 2500, 2400, 'Procesor i7, 4GB RAM'),
(2, 1, 'X551CARF-HCL1201L', 'Notebook', 1000, 980, 'Procesor Intel Celeron 1007U, 4GB RAM'),
(3, 2, 'PORTEGE R30-A-17K', 'Notebook', 4200, 3900, 'Procesor i5, 4GB RAM'),
(4, 2, 'Partner 1TB', 'HDD USB', 250, 240, 'USB 3.0, 1TB');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazyn`
--

CREATE TABLE IF NOT EXISTS `magazyn` (
  `IDMagazyn` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Ilosc` int(10) unsigned DEFAULT NULL,
  `CzyZamowic` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDMagazyn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `magazyn`
--

INSERT INTO `magazyn` (`IDMagazyn`, `Ilosc`, `CzyZamowic`) VALUES
(1, 4, 0),
(2, 8, 0),
(3, 0, 1),
(4, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producenci`
--

CREATE TABLE IF NOT EXISTS `producenci` (
  `IDProducenci` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nazwa` text,
  `URL` text,
  PRIMARY KEY (`IDProducenci`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `producenci`
--

INSERT INTO `producenci` (`IDProducenci`, `Nazwa`, `URL`) VALUES
(1, 'Asus', 'asus.pl'),
(2, 'Toshiba', 'toshiba.pl');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

