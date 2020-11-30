-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 nov 2020 om 22:00
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `soortArts` varchar(255) NOT NULL,
  `straat` varchar(255) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `plaats` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoonnummer` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `auth`
--

INSERT INTO `auth` (`id`, `voornaam`, `achternaam`, `soortArts`, `straat`, `postcode`, `plaats`, `email`, `telefoonnummer`, `password`, `role`) VALUES
(3, 'Harry', 'Bannink', 'oncoloog', 'Baarnseweg 7', '3500PP', 'Amerongen', 'h.bannink@big.nl', '0644558877', '23a0b5e4fb6c6e8280940920212ecd563859cb3c', 'arts'),
(4, 'Ties', 'Kruise', 'kno arts', 'Amsterdamse straat 81', '3571LL', 'Utrecht', 't.kruis@big.nl', '0612121212', 'a758358b101b15b4f14afe3f2129321bb3613006', 'arts'),
(5, 'Wilma', 'van Tuyl', 'kinderarts', 'Damrak 1', '1000AA', 'Amsterdam', 'w.v.tuyl@big.nl', '0204587458', '9f468ec766842079d75a616826eeeb01cd877a1d', 'arts'),
(6, 'Frankie', 'bla', 'bla', 'bla', 'bla', 'bla', 'hoi@hotmail.com', 'hoi@hotmail.com', '128ecf542a35ac5270a87dc740918404 ', 'arts');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijnen`
--

CREATE TABLE `medicijnen` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `werking` text NOT NULL,
  `bijwerking` text DEFAULT NULL,
  `verzekerd` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medicijnen`
--

INSERT INTO `medicijnen` (`id`, `naam`, `werking`, `bijwerking`, `verzekerd`) VALUES
(1, 'Diclofenac', 'pijnstiller, koortsverlagende werking, ontstekingsremmende werking. Goed bij acute pijn en chronische ziektes zoals reuma en jicht', 'pijn op de borst, kortademingheid, zwarte of zeer donkere ontlasting, ophoesten van bloed, blauwe plekken', 0),
(2, 'Amoxicilline', 'breedspectrum antibioticum, actief tegen grampositieve en gramnegatieve bacteriën', 'braken, buikpijn, diarree, spijsverteringsstoornissen, huidirritaties, maagdarm-stoornissen', 1),
(3, 'Omeprazol', 'remt de productie van overmatig maagzuur. Omeprazol behoort tot de klasse van protonremmers. Omeprazol wordt ingezet ter preventie en behandeling van maagzweren.', 'duizeligheid, verwarring, snelle en onregelmatige hartslag, schokkende spierbewegingen, zich schrikachtig voelen, spierkrampen, spierzwakte of slap gevoel.', 0),
(8, 'Codeine', 'je word lekker high als je het pourt in sprite =)', 'lekker high, verlamde spieren chillen! met een goeie jointje erbij!', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patienten`
--

CREATE TABLE `patienten` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `zknummer` varchar(12) NOT NULL,
  `geboortedatum` varchar(12) NOT NULL,
  `soortverzekering` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `patienten`
--

INSERT INTO `patienten` (`id`, `naam`, `adres`, `woonplaats`, `zknummer`, `geboortedatum`, `soortverzekering`) VALUES
(1541, 'EminBLABLA', 'Blablastraat', 'Den Haag', '13391339', '11-01-1999', 'Basis');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `patienten`
--
ALTER TABLE `patienten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `patienten`
--
ALTER TABLE `patienten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1542;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
