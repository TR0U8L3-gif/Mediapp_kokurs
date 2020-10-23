-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Paź 2020, 22:40
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mediapp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `phone_nr` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` text NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `allergies` longtext NOT NULL,
  `diseases` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `info`
--

INSERT INTO `info` (`id`, `username`, `phone_nr`, `age`, `sex`, `weight`, `height`, `allergies`, `diseases`) VALUES
(3, 'RaSien', 737598190, 17, 'male', 66.6, 1.82, '', ''),
(4, 'Jaca', 0, 0, '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `username`, `password`, `admin`) VALUES
(7, 'Radoslaw', 'Sienkiewicz', 'rsienkiewicz88@gmail.com', 'RaSien', '$2y$10$e7YWStdlDtt4IAJEGKm04.197URhDG3pXObdyl7FdgvDXBsJi6UFW', 1),
(8, 'Jacek', 'Cichosz', 'chaoz@poczta.fm', 'Jaca', '$2y$10$BlZFbFldIJjomCBnax1CXu6L582pSeWO.2TqQa9pSzx22CrKeHIDu', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
