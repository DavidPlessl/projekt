-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Mrz 2024 um 14:38
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

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
-- Tabellenstruktur für Tabelle `mitglieder`
--

CREATE TABLE `mitglieder` (
  `M_ID` int(11) NOT NULL,
  `vorname` varchar(255) DEFAULT NULL,
  `nachname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fw_nr` int(11) DEFAULT NULL,
  `passwort` varchar(255) DEFAULT NULL,
  `dienstgrad` varchar(50) DEFAULT NULL,
  `bild_pfad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `mitglieder`
--

INSERT INTO `mitglieder` (`M_ID`, `vorname`, `nachname`, `email`, `fw_nr`, `passwort`, `dienstgrad`, `bild_pfad`) VALUES
(14, 'Dominik', 'Santner', 'santner.dominik1@hakspittal.at', 70500, '$2y$10$AYa5CULuB7NlyOeEYLRtZ.2bnF76YZ0yO6plzzS2EvfMAjdtkhpMW', 'Oberbrandinspektor', 'uploads/65e60a05b4f927.65436101_dominik.jpg'),
(18, 'Samuel', 'Schorratz', 'samuelschorratz7@gmail.com', 88, '$2y$10$W2rrv/fgbKEh10/2hz5nBOzvhdhof1.XaMVKssLytRxpFVYm3V2AW', 'Hauptbrandinspektor', 'uploads/65e61abd2e1622.20223603_ffmann1.jpg'),
(19, 'David', 'Plessl', 'dp@gmail.com', 78952, '$2y$10$Flj99uAjwaaEDV3EHdUadu6OF9mPQe/KM/LE4HL7/qX2REI80RhgC', 'Brandinspektor', 'uploads/65e61b15251433.10689928_ffmann2.jpg'),
(20, 'Christoph', 'Hummer', 'hummer@gmail.com', 55664, '$2y$10$ovVeFy85A/IasoBbmTSPa.4mx8bZz.yNWDF61tmlVFePK8QmlA2xq', 'Feuerwehrkurat', 'uploads/65e61beb9aa184.53195238_hummer.jpg'),
(23, 'Lucas', 'Mitterberger', 'mitterberger.lucas@hakspittal.at', 67, '$2y$10$6faEd4HE5Ms2blVptvxlretY5ea/bxEmpCrmwgcgt4vTccKxPsM.S', 'Probefeuerwehrmann', 'uploads/65e6cf4e067468.22040656_Firefly Feuerwehrmannportait 967.jpg'),
(24, 'Corinna', 'Wallner', 'wallner@gmail.com', 55, '$2y$10$64Sv4TUm8r7SUJe2A6uhI.gNKPZWhSE2sKCZs.7dM/FSpKv1Z8wKu', 'Feuerwehrfrau', 'uploads/65e6d65bbe4e82.51441142_Firefly Feuerwehrmannportait 94806.jpg'),
(25, 'Lisa-Marie', 'Steiner', 'steiner@gmail.com', 33, '$2y$10$5GFVoo3hbyvREWQZyI/d3eB22ChONDVdKZssf6ywxSTlNjicBd41O', 'Oberverwalterin', 'uploads/65e6d6c6bb09d1.52824262_Firefly Feuerwehrmannportait 2523.jpg'),
(26, 'Maximilian', 'Pittino', 'max@gmx.net', 29, '$2y$10$g/gRFLkcdYU4OzEM2yfxXOtZyY35tcFbAnkoUZ4Gch2jcE/JInbPC', 'Verwalter', 'uploads/65e6d9c75e0474.07280516_Firefly Feuerwehrmannportait 29939.jpg'),
(27, 'Theresa', 'Wassermann', 'tw@aon.at', 18, '$2y$10$iYBRyAU6sZvVcRQ5.U7G6ese7SoEixMpQTRc6HAv0ch/mixKLcbO.', 'Hauptverwalterin', 'uploads/65e6def1a40d25.85071426_Firefly feuerwehrfrau schwarze haare 96956.jpg'),
(28, 'Susanne', 'Nusser', 'nusa@hakspittal.at', 8, '$2y$10$bbyszy3iHrX/n/FDabx9GuUg1Grp5t2XS9nf5Y4W21S9u796y9LKq', 'Feuerwehrfrau', 'uploads/65e6e0c073fde8.79341315_Firefly feuerwehrfrau mittleres alter 68309.jpg'),
(29, 'Sergio', 'Huainigg ', 'sergio@gmail.com', 89, '$2y$10$FLEhE8lhrCKqinDf9CrxCupH9pB3CTO3NR8pkLYE/xJ/aNJcWTL0O', 'Probefeuerwehrmann', 'uploads/65e6e1e34f0373.54974761_Firefly Feuerwehrmannportait 69989.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  ADD PRIMARY KEY (`M_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
