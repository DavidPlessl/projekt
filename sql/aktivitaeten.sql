-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Mrz 2024 um 10:24
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `projekt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aktivitaeten`
--

CREATE TABLE `aktivitaeten` (
  `A_ID` int(11) NOT NULL,
  `datum` date NOT NULL,
  `aktivitaet` varchar(255) NOT NULL,
  `ort` varchar(255) NOT NULL,
  `beschreibung` text NOT NULL,
  `erstellt_von` varchar(255) NOT NULL,
  `bestaetigt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `aktivitaeten`
--

INSERT INTO `aktivitaeten` (`A_ID`, `datum`, `aktivitaet`, `ort`, `beschreibung`, `erstellt_von`, `bestaetigt`) VALUES
(1, '2024-09-28', 'Chefe Samuel Schorratzo Geburtstag', 'Semslach', 'Schorratzo wird 18 SUIIII!', 'Chefe Samuel Schorratzo', 1),
(2, '2024-02-03', 'Feuerwehrball FF St.Schmorell', 'Ballsaal St. Schmorell', 'Wir laden ein zum Feuerwehrball', 'Chefe Samuel Schorratzo', 1),
(3, '2024-02-05', 'Bewerbsübung', 'Feuerwehrhaus St. Schmorell', 'Übung für Bewerb', 'Chefe Samuel Schorratzo', 1),
(6, '2024-02-24', 'Außschusssitzung', 'Feuerwehrhaus Seeboden', 'Regelkonforme Besprechung der Tagesordnung, usw. ', 'David Plessl', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `aktivitaeten`
--
ALTER TABLE `aktivitaeten`
  ADD PRIMARY KEY (`A_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `aktivitaeten`
--
ALTER TABLE `aktivitaeten`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
