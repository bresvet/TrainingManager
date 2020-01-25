-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Czas generowania: 25 Sty 2020, 18:51
-- Wersja serwera: 8.0.18
-- Wersja PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bartek`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id_activity` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type` text NOT NULL,
  `id_gym` int(11) NOT NULL,
  `id_trainer` int(11) NOT NULL,
  PRIMARY KEY (`id_activity`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `activity`
--

INSERT INTO `activity` (`id_activity`, `date`, `type`, `id_gym`, `id_trainer`) VALUES
(1, '2020-01-31', 'Push', 1, 1),
(2, '2020-02-20', 'ABS', 2, 3),
(3, '2020-01-22', 'Pull', 3, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id_address` int(11) NOT NULL AUTO_INCREMENT,
  `city` text NOT NULL,
  `street` text NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`id_address`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `address`
--

INSERT INTO `address` (`id_address`, `city`, `street`, `code`) VALUES
(1, 'Kraków', 'Bratysławska 4', '31-201'),
(2, 'Kraków', 'Aleja Pokoju 16', '31-564'),
(3, 'Kraków', 'Stawowa 61', '31-464'),
(4, 'Poznań', 'Bonusa 12', '54-098');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gym`
--

DROP TABLE IF EXISTS `gym`;
CREATE TABLE IF NOT EXISTS `gym` (
  `id_gym` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `id_address` int(11) NOT NULL,
  PRIMARY KEY (`id_gym`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `gym`
--

INSERT INTO `gym` (`id_gym`, `name`, `id_address`) VALUES
(1, 'Platinium Bratysławska', 1),
(2, 'Platinium Aleja Pokoju', 2),
(3, 'Platinium Bronowice', 3),
(4, 'Poznań Dworzec', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trainer`
--

DROP TABLE IF EXISTS `trainer`;
CREATE TABLE IF NOT EXISTS `trainer` (
  `id_trainer` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  PRIMARY KEY (`id_trainer`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `trainer`
--

INSERT INTO `trainer` (`id_trainer`, `name`, `surname`) VALUES
(1, 'Milka', 'Gymfreak'),
(2, 'Filip', 'Witek'),
(3, 'Bartłomiej', 'Światłoń');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `training`
--

DROP TABLE IF EXISTS `training`;
CREATE TABLE IF NOT EXISTS `training` (
  `id_training` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_activity` int(11) NOT NULL,
  PRIMARY KEY (`id_training`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `training`
--

INSERT INTO `training` (`id_training`, `id_user`, `id_activity`) VALUES
(52, 6, 3),
(51, 6, 2),
(50, 2, 3),
(49, 2, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `name`, `surname`, `email`, `password`, `role`) VALUES
(5, 'Julka', 'Sałek', '', '', 'ROLE_USER'),
(3, 'Admin', 'ADMIN', 'admin@pk.pl', 'admin', 'ROLE_ADMIN');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
