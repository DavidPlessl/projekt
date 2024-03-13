-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Mrz 2024 um 11:40
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
-- Tabellenstruktur für Tabelle `geraete`
--

CREATE TABLE `geraete` (
  `G_ID` int(11) NOT NULL,
  `name1` varchar(50) NOT NULL,
  `baujahr` int(11) NOT NULL,
  `funktion` varchar(255) NOT NULL,
  `bild` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `geraete`
--

INSERT INTO `geraete` (`G_ID`, `name1`, `baujahr`, `funktion`, `bild`) VALUES
(4, 'MZFA', 2009, 'Das MZFA ist ein geländegängiges Feuerwehrfahrzeug für vielseitige Einsatzszenarien.\r\n', 'bildergeraete/mzfa.jpg'),
(5, 'TLFA', 2015, 'Ausgerüstet mit Allradantrieb und einem 4000-Liter-Wassertank ermöglicht es der Feuerwehr eine schnelle und leistungsstarke Reaktion auf Brände in verschiedenen Umgebungen.', 'bildergeraete/tlfa.jpg'),
(6, 'ASF', 2005, 'Das Atemschutzfahrzeug ist ein spezialisiertes Feuerwehrfahrzeug, das Atemschutzgeräte transportiert und an Ort und Stelle auffüllen kann.', 'bildergeraete/asf.jpg'),
(7, 'LFB', 2000, 'Das LFB ist ein Löschgruppenfahrzeug, eine Feuerwehrfahrzeugkategorie, die für Brandbekämpfung und einfache technische Hilfeleistungen konzipiert ist.', 'bildergeraete/lfb.jpg'),
(8, 'DLK 30', 1998, 'Eine DLK ist eine Drehleiter mit Korb, die für Rettungsaktionen in der Höhe und Brandbekämpfung in schwer zugänglichen Bereichen verwendet wird.', 'bildergeraete/dlk.jpg'),
(9, 'RLF', 2011, 'Das RLF ist ein Rüstlöschfahrzeug, ein spezialisiertes Feuerwehrfahrzeug, das für technische Hilfeleistungen oder Verkehrsunfällen und Brandbekämpfung ausgerüstet ist.', 'bildergeraete/rlf.jpg'),
(10, 'BOOT', 1995, 'Ein Feuerwehrboot ist ein spezialisiertes Wasserfahrzeug, das von Feuerwehren für Brandbekämpfung und Rettungseinsätze auf Gewässern genutzt wird.', 'bildergeraete/boot.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `geraete`
--
ALTER TABLE `geraete`
  ADD PRIMARY KEY (`G_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `geraete`
--
ALTER TABLE `geraete`
  MODIFY `G_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
