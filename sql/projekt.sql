-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Mai 2024 um 11:13
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einsaetze`
--

CREATE TABLE `einsaetze` (
  `E_ID` int(11) NOT NULL,
  `datum` date NOT NULL,
  `stichwort` varchar(255) NOT NULL,
  `einsatzart` varchar(255) NOT NULL,
  `einsatzort` varchar(255) NOT NULL,
  `fahrzeuge` varchar(255) NOT NULL,
  `weitere_kraefte` varchar(255) NOT NULL,
  `beschreibung` text NOT NULL,
  `erstellt_von` varchar(255) NOT NULL,
  `bestaetigt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `einsaetze`
--

INSERT INTO `einsaetze` (`E_ID`, `datum`, `stichwort`, `einsatzart`, `einsatzort`, `fahrzeuge`, `weitere_kraefte`, `beschreibung`, `erstellt_von`, `bestaetigt`) VALUES
(1, '2024-01-30', 'B3', 'Gebäudebrand (Heimrauchmelder mit Branrauch/Geruch)', '9800 Spittal an der Drau\r\nPonauer Straße', 'KDOF; LFB; TLF-A 4000/1; TLF-A 4000/2; DLK 30', 'Polizei; Rauchfangkehrer; Rotes Kreuz', 'Mehrere Heimrauchmelder haben in einer Wohnung im 4.Obergeschoss eines Mehrparteienwohnhauses ausgelöst. Aufgrund wahrzunehmender Rauchentwicklung wurde nach der Erkundung durch den  Einsatzleiter vor Ort Sirenenalarm für die Feuerwehr Spittal an der Drau ausgelöst sowie vorsorglich der Rettungsdienst alarmiert.\r\n\r\nNach Öffnen der versperrten Wohnungstüre konnte die unter Rauch stehende Wohnung durch einen Atemschutztrupp nach einem Brandherd sowie darin befindlicher Personen durchsucht werden. Glücklicherweise wurde keine Person gefunden.\r\n\r\nAls Ursache für die starke Rauchentwicklung konnte eine Fehlbedienung des Holzofens in der Wohnung ausgemacht werden. Aufgrund dessen wurde ebenso ein Rauchfangkehrer an den Einsatzort beordert, um die Situation gemeinsam mit den Einsatzkräften der Feuerwehr zu kontrollieren.\r\n\r\nNach rund einer Stunde konnte der Einsatz beendet werden. Die Feuerwehr St. Schmorell stand mit 6 Fahrzeugen und 35 Kräften im Einsatz. Weiters vor Ort waren ein Rettungswagen sowie eine Polizeistreife.\r\n\r\n', 'Samuel Schorratzo', 1),
(2, '2024-01-07', 'T PERSON 1', 'Türöffnung (Tür/​Wohnung öffnen Person in Gefahr)', '9800 Spittal an der Drau\r\nVillacher Straße', 'KDOF; LFB-A; DLK 30', 'Polizei; Rotes Kreuz', 'Dringende Wohnungsöffnung für Polizei und Rotes Kreuz', 'Chefe Samuel Schorratzo', 1),
(3, '2023-01-07', 'B5', 'Gebäudebrand (Brand Gebäude)', '9800 Spittal an der Drau\r\nEdlinger Straße', 'KDOF; LFB-A; TLF-A 4000/1', 'Feuerwehr Olsach/Molzbichl; Feuerwehr Seeboden; Feuerwehr St. Peter / Spittal; Polizei; Rotes Kreuz\r\n', 'Kerze löste Brand in einem Blumengeschäft aus\r\n\r\nAm Donnerstag, dem 07.12.20223 um 22:47 Uhr wurden die drei Feuerwehren der Stadtgemeinde Spitta/Drau – Spittal/Drau, St.Peter-Spittal und Olsach/Molzbichl – zu einem vermeintlich ausgedehnten Brand in einem Geschäftslokal in der Edlingerstraße alarmiert.\r\nNach ersten Meldungen von Anrufern bei der Landesalarm- und Warnzentrale soll es sich um einen massiven Brand handeln. Aus diesem Grund wurde auch die FF Seeboden hinzualarmiert.\r\nBeim Eintreffen der Einsatzkräfte vor Ort konnte festgesellt werden, dass im Inneren eines Blumengeschäftes ein Kleinbrand ausgebrochen war.\r\nUm rasch zum Brandherd zu kommen, musste im Bereich der Auslage eine Tür aufgebrochen werden.\r\nDie brennende Adventdekoration auf einem Tisch konnte mit einem Pulverlöscher gelöscht werden.\r\nDurch den raschen Einsatz der Feuerwehren konnte vermutlich ein weit größerer Schaden verhindert werden.\r\n\r\nIm Einsatz standen 4 Feuerwehren mit 95 Mann.', 'Chefe Samuel Schorratzo', 1),
(4, '2023-10-14', 'T VU 3 (VU Person eingeklemmt)', 'Verkehrsunfall', '9800 KULMAX Spittal/​Drau\r\nVillacher Straße', 'KDOF; LFB-A; TLF-A 4000/2; GSF; SRF-K', 'Abschleppdienst; First Responder; Polizei; Rotes Kreuz', 'Zu einem Verkehrsunfall mit mehreren Fahrzeugen und vermutlich eingeklemmter Personen wurde die Feuerwehr St. Schmorell Samstagabend mittels Sirenenalarm auf die B100 Drautal-Bundesstraße Höhe Einkaufszentrum “KULMAX” alarmiert.\r\nVor Ort wurde folgende Situation festgestellt: Drei Fahrzeuge waren im Kreuzungsbereich B100/St.Sigmundstraße miteinander kollidiert und ineinander verkeilt. Glücklicherweise wurde keine der beteiligten Personen eingeklemmt.\r\nDurch die Feuerwehr St. Schmorell wurde in erster Linie ein Brandschutz aufgebaut, die Fahrzeuge gesichert sowie die anwesenden Ersthelfer bei der Personen- und Patientenbetreuung unterstützt. Weiters wurden alle Fahrzeuge stromlos gemacht und die ausgetretenen Betriebsmittel gebunden.\r\nInsgesamt wurden Acht Personen, darunter mehrere Kinder, durch den anwesenden Rettungsdienst versorgt und in weiterer Folge zur Kontrolle ins Krankenhaus verbracht.\r\nNach der Unfallaufnahme durch die Polizei konnte die Unfallstelle geräumt und gereinigt werden.\r\nDie Feuerwehr St. Schmorell stand mit insgesamt 32 Einsatzkräfte und 5 Fahrzeugen rund eineinhalb Stunden im Einsatz. Weiters waren mehrere Rettungswagen, mehrere Polizeistreifen sowie ein privates Abschleppunternehmen vor Ort.\r\n\r\n', 'Chefe Samuel Schorratzo', 0),
(21, '2024-02-22', 'T PERSON 1', 'Türöffnung', 'Seeboden - Alte Straße', 'kdof; tlfa4000_1', 'Polizei, Rettung', 'Alte Dame stürzte, deshalb musste Tür geöffnet werden.', 'Samuel Schorratz', 1),
(22, '2024-01-02', 'T VU 3 Person eingeklemmt', 'Verkehrsunfall mit eingeklemmter Person im PKW (unter 3,5 t)', 'L17a Kleindombra Straße KM 7', 'kdof; tlfa4000_1; srfk; lfb; rlf', 'Abschleppdienst Kapeller, Polizei, Rettung,  Asfinag, FF Milstatt, FF Laubendorf', 'Auf der Landesstraße ist ein PKW von der Fahrbahn abgekommen und hat sich überschlagen. Zwei Personen wurden vom Roten Kreuz Erstversorgt und ins Krankenhaus gebracht. Das Fahrzeug wurde von einem Abschleppdienst geborgen, die Unfallstelle wurde von Mitarbeitern der Asfinag gereinigt.', 'Dominik Santner', 1),
(24, '2024-02-28', 'T VU 4 Person eingeklemmt', 'Verkehrsunfall mit eingeklemmter Person im PKW (unter 3,5 t)', 'Markplatz 5 9872 Millstatt', 'kdof; tlfa4000_1; srfk; lfb; rlf; mtf', 'Polizei, Rettung, FF Milstatt, FF Laubendorf, FF Obermilstatt', 'Der Fahrzeuglenker kam von der Straße ab, überschlug sich und prallte gegen ein Gebäude. Daraufhin wurde er im Fahrzeug eingeklemmt und musste befreit werden.', 'Dominik Santner', 1);

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
-- Indizes für die Tabelle `aktivitaeten`
--
ALTER TABLE `aktivitaeten`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indizes für die Tabelle `einsaetze`
--
ALTER TABLE `einsaetze`
  ADD PRIMARY KEY (`E_ID`);

--
-- Indizes für die Tabelle `geraete`
--
ALTER TABLE `geraete`
  ADD PRIMARY KEY (`G_ID`);

--
-- Indizes für die Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  ADD PRIMARY KEY (`M_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `aktivitaeten`
--
ALTER TABLE `aktivitaeten`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `einsaetze`
--
ALTER TABLE `einsaetze`
  MODIFY `E_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `geraete`
--
ALTER TABLE `geraete`
  MODIFY `G_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
