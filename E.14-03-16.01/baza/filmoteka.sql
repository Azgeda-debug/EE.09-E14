-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Kwi 2022, 12:19
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `filmoteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE `filmy` (
  `IDFilm` int(10) UNSIGNED NOT NULL,
  `Tytul` text DEFAULT NULL,
  `Gatunek` text DEFAULT NULL,
  `RezyserID` int(10) UNSIGNED DEFAULT NULL,
  `RecenzjaID` int(10) UNSIGNED DEFAULT NULL,
  `Link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`IDFilm`, `Tytul`, `Gatunek`, `RezyserID`, `RecenzjaID`, `Link`) VALUES
(1, 'Matrix', 'SF', 1, 1, NULL),
(2, 'Gwiezdne Wojny', 'SF', 2, 2, NULL),
(3, 'Indiana Jones i Ostatnia Krucjata', 'Przygodowy', 3, 3, NULL),
(4, 'Jurassic Park', 'Przygodowy', 3, 4, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recenzje`
--

CREATE TABLE `recenzje` (
  `IDRecenzja` int(10) UNSIGNED NOT NULL,
  `Ocena` int(10) UNSIGNED DEFAULT NULL,
  `Tresc` longtext DEFAULT NULL,
  `Recenzent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `recenzje`
--

INSERT INTO `recenzje` (`IDRecenzja`, `Ocena`, `Tresc`, `Recenzent`) VALUES
(1, 5, 'Dobry film', 'Jan Nowak'),
(2, 4, 'Klasyka gatunku', 'Jan Nowak'),
(3, 4, 'Ciekawy', 'Andrzej Kowalski'),
(4, 3, 'Dinozaury i ludzie', 'Andrzej Kowalski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezyserzy`
--

CREATE TABLE `rezyserzy` (
  `IDRezyser` int(10) UNSIGNED NOT NULL,
  `Imie` text DEFAULT NULL,
  `Nazwisko` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rezyserzy`
--

INSERT INTO `rezyserzy` (`IDRezyser`, `Imie`, `Nazwisko`) VALUES
(1, 'Andy', 'Wachowski'),
(2, 'George', 'Lucas'),
(3, 'Steven', 'Spielberg'),
(4, 'Andrzej ', 'Wajda');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`IDFilm`);

--
-- Indeksy dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD PRIMARY KEY (`IDRecenzja`);

--
-- Indeksy dla tabeli `rezyserzy`
--
ALTER TABLE `rezyserzy`
  ADD PRIMARY KEY (`IDRezyser`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `filmy`
--
ALTER TABLE `filmy`
  MODIFY `IDFilm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  MODIFY `IDRecenzja` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `rezyserzy`
--
ALTER TABLE `rezyserzy`
  MODIFY `IDRezyser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
