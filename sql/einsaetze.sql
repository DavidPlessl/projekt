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

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `einsaetze`
--
ALTER TABLE `einsaetze`
  ADD PRIMARY KEY (`E_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `einsaetze`
--
ALTER TABLE `einsaetze`
  MODIFY `E_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
