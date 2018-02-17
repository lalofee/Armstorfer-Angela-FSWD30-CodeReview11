-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Feb 2018 um 11:08
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_armstorfer_angela_php_car_rental`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cars`
--

CREATE TABLE `cars` (
  `carId` int(11) NOT NULL,
  `fk_locationId` int(11) NOT NULL,
  `car_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `color` varchar(20) COLLATE utf8_bin NOT NULL,
  `ps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `cars`
--

INSERT INTO `cars` (`carId`, `fk_locationId`, `car_name`, `color`, `ps`) VALUES
(1, 3, 'BMW 1', 'grey', 120),
(2, 4, 'Dogde 1', 'blue', 90),
(3, 5, 'Alfa Romeo 1', 'silver', 130),
(4, 6, 'Honda 1', 'green', 75),
(5, 3, 'Jaguar 1', 'black', 0),
(6, 4, 'Ferrari 1', 'red', 400),
(7, 4, 'Bentley 1', 'creme', 180),
(8, 5, 'Lotus 1', 'lightblue', 220),
(9, 6, 'Maserati 1', 'darkred', 160),
(10, 3, 'Lamborghini 1', 'yellow', 340),
(11, 5, 'Volvo 1', 'green', 55),
(12, 5, 'Mercedes 1', 'white', 180);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `location`
--

CREATE TABLE `location` (
  `locationId` int(11) NOT NULL,
  `location_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `street` varchar(255) COLLATE utf8_bin NOT NULL,
  `PLZ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `location`
--

INSERT INTO `location` (`locationId`, `location_name`, `street`, `PLZ`) VALUES
(3, 'Landstrasse', 'Landstrasse 3', 1030),
(4, 'Favoriten', 'Reumannplatz 1', 1100),
(5, 'Wetbahnhof', 'Europaplatz 1', 1150),
(6, 'Spittelau', 'Spittelau 5', 1090);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rental`
--

CREATE TABLE `rental` (
  `reservationId` int(11) NOT NULL,
  `fk_userId` int(11) NOT NULL,
  `fk_carId` int(11) NOT NULL,
  `fk_pick_up_locationId` int(11) NOT NULL,
  `fk_drop_off_locationId` int(11) NOT NULL,
  `pickup_time` datetime NOT NULL,
  `return_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'test', 'test@web.de', 'ae5deb822e0d71992900471a7199d0d95b8e7c9d05c40a8245a281fd2c1d6684');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carId`),
  ADD UNIQUE KEY `carId` (`carId`);

--
-- Indizes für die Tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationId`);

--
-- Indizes für die Tabelle `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`reservationId`),
  ADD UNIQUE KEY `fk_userId` (`fk_userId`),
  ADD UNIQUE KEY `fk_carId` (`fk_carId`),
  ADD UNIQUE KEY `fk_officeId` (`fk_pick_up_locationId`),
  ADD UNIQUE KEY `fk_drop_off_locationId` (`fk_drop_off_locationId`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cars`
--
ALTER TABLE `cars`
  MODIFY `carId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `location`
--
ALTER TABLE `location`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `rental`
--
ALTER TABLE `rental`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`fk_userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_ibfk_2` FOREIGN KEY (`fk_carId`) REFERENCES `cars` (`carId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_ibfk_3` FOREIGN KEY (`fk_pick_up_locationId`) REFERENCES `location` (`locationId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_ibfk_4` FOREIGN KEY (`fk_drop_off_locationId`) REFERENCES `location` (`locationId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
