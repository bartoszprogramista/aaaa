-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Gru 2017, 21:24
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep_internetowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `idkategori` int(11) NOT NULL,
  `nazwakategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`idkategori`, `nazwakategori`) VALUES
(1, 'procesor'),
(2, 'ram'),
(3, 'moba'),
(4, 'gpu'),
(5, 'zasilacz'),
(6, 'hdd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `idklienta` int(11) NOT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `miasto` varchar(30) DEFAULT NULL,
  `adres` varchar(40) DEFAULT NULL,
  `telefon` varchar(9) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `haslo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`idklienta`, `imie`, `nazwisko`, `login`, `miasto`, `adres`, `telefon`, `email`, `haslo`) VALUES
(1, 'Bartosz', 'bagosz', 'boskibartek', 'xdhehehe', 'ul. Nowa 22', '123444441', 'aaa@gg.pl', '123asdf!!AA'),
(2, 'Alaksander', 'Kwaśniewski', 'olus123', 'Warszawa', 'ul.Wiesjka 55', '987654321', 'olek40per@hehe.com', 'haslo'),
(3, 'imie', 'nazwisko', 'login', 'miasto', 'adres', 'telefon', 'email', 'haslo'),
(4, 'abbaojce', 'ggg', 'saf', 'asdfgf', 'dgf', 'asdfdfsg', 'asdfdfsg', 'asdfdfg'),
(5, 'Bartosz', 'kosmider', 'polak', 'wielkie', 'ul. Pomorksa 11', '123456789', 'bartekkosmider@gmail.com', 'wielki!213SS'),
(6, 'Kuba', 'Wielki', 'oski111', 'Sosnowiec', 'ul. Zadupna 123', '123456789', 'kuba@nude.pl', '!2345Qwert'),
(7, 'Mirosław', 'Szyper', 'mirek123', 'Poznań', 'ul. Zsk 13', '789845612', 'mirek@gg.com', '!2345Qwert'),
(8, 'Bączyńśki', 'Koźlażź&oacute;', 'qwerty', 'akkak', 'akkaka', '123456789', 'ksksks@ss.com', '!2345Qwert'),
(9, 'Janusz', 'Tracz', 'janusz', 'białystok', 'ul. Nowa 22', '123456789', 'tracz2xkxk@gg.com', '!2345Qwert'),
(10, 'Bogusław', 'Linda', 'malypolak123', 'Lindowo', 'ul. Srogiego Wpierdolu 12', '111222222', 'bolekziomek@k120.com', '!2345Qwert'),
(11, 'asdfasas', 'koask', 'xdddd', 'polska', 'akaskka 123', '123456899', 'bak@gkgk.com', 'asdf'),
(12, 'Jazdkdka', 'lkakljdskl', 'asdf', 'lksdfk', 'sfk', '123456789', 'dkjasfds@ggkj.com', 'asdfsdf!!23AA'),
(13, 'Bartośz', 'Kośmider', 'asdf123AA', 'Miasto', 'lasfkl ..112', '123123456', 'BabbBB123@kk.com', 'asdf123QQ!!'),
(14, 'kakakak', 'kakkask', 'maciek', 'kdsfkadl', 'klsdfakls', '123546789', 'bkka@ks.co', 'sdlaf123AAAfd!!'),
(15, 'Adfs', 'dfkasj', 'asdf123AA', 'dfkask', 'dlskf', '12356789', 'sadfkl@ksdak.com', '123QWQE!@#Aa'),
(16, 'Mirosław', 'Zkkak', 'login123', 'ldasf', 'sf', '123456789', 'ksdaf@gg.co', '!2345Qwert'),
(17, 'Mirosław', 'Zkkak', 'login123', 'ldasf', 'sf', '123456789', 'ksdaf@gg.co', '!2345Qwert'),
(18, 'Mirosław', 'Zkkak', 'login123', 'ldasf', 'sf', '123456789', 'ksdaf@gg.co', '!2345Qwert'),
(19, 'Mirosław', 'Zkkak', 'boskibartek12', 'ldasf', 'sf', '123456789', 'ksdaf@gg.co', '!2345Qwert'),
(20, 'bartek', 'Kśomi', '1234', 'Ezzzz', 'asdlkkl 11', '123456789', 'barrr@gg.com', '!2345Qwrrr');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazyn`
--

CREATE TABLE `magazyn` (
  `idproduktu` int(11) NOT NULL,
  `dostepnailosc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `magazyn`
--

INSERT INTO `magazyn` (`idproduktu`, `dostepnailosc`) VALUES
(1, 8),
(2, 1),
(3, 5),
(4, 5),
(5, 0),
(6, 8),
(7, 50),
(8, 97),
(9, 48),
(10, 49),
(11, 50),
(12, 50),
(13, 50),
(14, 50),
(15, 50),
(16, 50),
(17, 50),
(18, 49),
(19, 48),
(20, 50),
(21, 50),
(22, 50),
(23, 50),
(24, 50),
(25, 40),
(26, 40),
(27, 50),
(28, 50),
(29, 50),
(30, 66),
(31, 66);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `idproduktu` int(11) NOT NULL,
  `nazwaproduktu` varchar(100) NOT NULL,
  `cena` float NOT NULL,
  `idkategori` int(11) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `produkt`
--

INSERT INTO `produkt` (`idproduktu`, `nazwaproduktu`, `cena`, `idkategori`, `link`) VALUES
(0, 'MSI B250M PRO-VDH', 279.99, 3, 'pliki/moba4.jpg'),
(1, 'Nvidia GTX 750Ti', 599.99, 4, 'pliki/gtx.jpg'),
(2, 'Intel i5 4670', 799.99, 1, 'pliki/intel.jpg'),
(3, 'Kingston HyperX Fury DDR3 2x4GB', 199.99, 2, 'pliki/kingston.jpg'),
(4, 'MSI G43-Z87', 199.99, 3, 'pliki/moba.jpg'),
(5, 'Deus G1 500W', 250, 5, 'pliki/deus.jpg'),
(6, 'WD xd 1TB', 199.99, 6, 'pliki/hdd.jpg'),
(7, 'SSD Kingston SSDNow UV400 240GB', 449.99, 6, 'pliki/hdd2.jpg'),
(8, 'MSI X99A GAMING 7 DDR4 LGA 2011', 899.99, 3, 'pliki/moba2.jpg'),
(9, 'MSI GTX 1080 Ti GAMING X 11GB', 3699.99, 4, 'pliki/gpu2.jpg'),
(10, 'Intel i7-6800K 3.40GHz', 1599.99, 1, 'pliki/intel2.jpg'),
(11, 'Gigabyte GeForce GT 730 2GB GDDR5', 250, 4, 'pliki/gpu7.jpg'),
(12, 'MSI GeForce GTX 1070 GAMING X 8GB GDDR5', 1999.99, 4, 'pliki/gpu4.jpg'),
(13, 'Gigabyte Karta graficzna Gigabyte Radeon RX 570 GAMING 4GB GDDR5', 1349.99, 4, 'pliki/gpu5.jpg'),
(14, 'MSI Radeon RX 580 GAMING X 8GB GDDR5', 1799.99, 4, 'pliki/gpu6.jpg'),
(15, 'Gigabyte GeForce GTX 1060 Aorus Xtreme 6G, 6GB GDDR5', 1499.99, 4, 'pliki/gpu3.jpg'),
(16, 'Ballistix DDR4 Sport LT 8GB/2400(2*4GB)', 399.99, 2, 'pliki/ram1.jpg'),
(17, 'HyperX Predator DDR4, 2x8GB, 3000MHz, CL15', 899.99, 2, 'pliki/ram2.jpg'),
(18, 'GoodRam Play DDR3 4GB 1600MHz CL9', 149.99, 2, 'pliki/ram3.jpg'),
(19, 'G.Skill Ripjaws V DDR4, 2x8GB, 3200MHz, CL16', 849, 2, 'pliki/ram4.jpg'),
(20, 'Gigabyte GA-H110M-S2V', 190, 3, 'pliki/moba3.jpg'),
(21, 'MSI B250M PRO-VDH', 279.99, 3, 'pliki/moba4.jpg'),
(22, 'MSI Z370 GAMING PLUS', 499.99, 3, 'pliki/moba5.jpg'),
(23, 'MSI B350 TOMAHAWK', 384, 3, 'pliki/moba6.jpg'),
(24, 'Intel Core i5-7400, 3GHz, 6MB', 700, 1, 'pliki/cpu1.jpg'),
(25, 'AMD Ryzen 7 1700X 3.4GHz, 16MB', 1500, 1, 'pliki/cpu2.jpg'),
(26, 'AMD Ryzen 5 1400, 3.2GHz, 8MB', 659.99, 1, 'pliki/cpu3.jpg'),
(27, 'Intel Core i7-7700K, 4.2GHz, 8MB', 1400, 1, 'pliki/cpu4.jpg'),
(28, 'Intel Celeron G3900, 2.80GHz, 2MB', 120, 1, 'pliki/cpu5.jpg'),
(29, 'SilentiumPC Vero L2 600W', 220.5, 5, 'pliki/zasilacz1.jpg'),
(30, 'Thermaltake Smart SE 630W ', 250, 5, 'pliki/zasilacz2.jpg'),
(31, 'be quiet! Pure Power 9 600W', 400, 5, 'pliki/zasilacz3.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `idzamowienia` int(11) NOT NULL,
  `idklienta` int(11) NOT NULL,
  `datazamowienia` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`idzamowienia`, `idklienta`, `datazamowienia`) VALUES
(1, 1, '2017-11-25 14:00:42'),
(2, 2, '2017-11-25 14:01:36'),
(6, 8, '2017-12-04 18:10:55'),
(7, 1, '2017-12-04 18:30:15'),
(38, 1, '2017-12-04 19:14:52'),
(39, 1, '2017-12-04 19:14:52'),
(40, 1, '2017-12-04 19:14:54'),
(41, 1, '2017-12-04 19:14:54'),
(42, 1, '2017-12-04 19:18:00'),
(43, 1, '2017-12-04 19:18:01'),
(44, 1, '2017-12-04 19:18:13'),
(45, 1, '2017-12-04 19:18:57'),
(46, 1, '2017-12-04 19:19:23'),
(47, 1, '2017-12-04 19:20:37'),
(48, 1, '2017-12-04 19:23:01'),
(49, 1, '2017-12-04 19:23:54'),
(50, 3, '2017-12-04 19:28:37'),
(51, 3, '2017-12-04 19:33:13'),
(52, 1, '2017-12-04 19:35:27'),
(53, 1, '2017-12-04 19:35:31'),
(54, 1, '2017-12-04 19:36:33'),
(55, 1, '2017-12-04 19:38:20'),
(56, 1, '2017-12-04 19:39:21'),
(57, 9, '2017-12-04 22:26:24'),
(58, 1, '2017-12-05 19:08:50'),
(59, 3, '2017-12-05 19:27:09'),
(60, 3, '2017-12-05 20:06:04'),
(61, 3, '2017-12-05 22:16:33'),
(62, 10, '2017-12-05 22:28:47'),
(63, 1, '2017-12-05 22:33:11'),
(64, 3, '2017-12-08 18:30:58'),
(65, 1, '2017-12-09 18:29:19'),
(66, 1, '2017-12-10 14:24:27'),
(67, 3, '2017-12-10 17:52:53'),
(68, 6, '2017-12-10 23:47:35'),
(69, 6, '2017-12-10 23:48:30'),
(70, 3, '2017-12-11 17:45:26'),
(71, 3, '2017-12-11 17:47:14'),
(72, 3, '2017-12-11 17:52:55'),
(73, 3, '2017-12-11 17:54:01'),
(74, 3, '2017-12-11 18:04:00'),
(75, 3, '2017-12-11 18:05:30'),
(76, 3, '2017-12-11 18:11:27'),
(77, 3, '2017-12-11 18:13:18'),
(78, 3, '2017-12-11 18:14:31'),
(79, 3, '2017-12-11 18:14:53'),
(80, 3, '2017-12-11 18:15:44'),
(81, 3, '2017-12-11 18:15:58'),
(82, 3, '2017-12-11 18:23:06'),
(83, 3, '2017-12-11 18:27:42'),
(84, 3, '2017-12-11 18:31:05'),
(85, 3, '2017-12-11 20:38:25'),
(86, 3, '2017-12-11 21:23:53');

--
-- Wyzwalacze `zamowienia`
--
DELIMITER $$
CREATE TRIGGER `ustawdate` BEFORE INSERT ON `zamowienia` FOR EACH ROW SET NEW.datazamowienia = now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia_szczegoly`
--

CREATE TABLE `zamowienia_szczegoly` (
  `idzamowienia` int(11) NOT NULL,
  `idproduktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zamowienia_szczegoly`
--

INSERT INTO `zamowienia_szczegoly` (`idzamowienia`, `idproduktu`, `ilosc`, `cena`) VALUES
(7, 5, 3, 123),
(7, 5, 3, 123),
(7, 1, 1, 123),
(38, 2, 1, 799.99),
(40, 2, 1, 799.99),
(42, 2, 1, 799.99),
(43, 2, 1, 799.99),
(44, 2, 1, 799.99),
(45, 1, 1, 599.99),
(46, 1, 1, 599.99),
(46, 9, 1, 3699.99),
(47, 1, 1, 599.99),
(47, 9, 1, 3699.99),
(47, 3, 3, 199.99),
(48, 1, 1, 599.99),
(48, 9, 1, 3699.99),
(48, 3, 3, 199.99),
(49, 1, 1, 599.99),
(49, 9, 1, 3699.99),
(49, 3, 3, 199.99),
(50, 1, 1, 599.99),
(50, 9, 1, 3699.99),
(50, 5, 2, 250),
(51, 4, 2, 199.99),
(52, 2, 2, 799.99),
(53, 2, 2, 799.99),
(54, 4, 2, 199.99),
(55, 3, 4, 199.99),
(56, 3, 4, 199.99),
(57, 4, 2, 199.99),
(57, 8, 1, 899.99),
(57, 2, 2, 799.99),
(58, 3, 2, 199.99),
(59, 2, 1, 799.99),
(59, 10, 1, 1599.99),
(59, 6, 1, 199.99),
(59, 4, 1, 199.99),
(59, 8, 1, 899.99),
(59, 9, 1, 3699.99),
(59, 7, 2, 449.99),
(60, 30, 1, 250),
(60, 29, 1, 220.5),
(61, 12, 1, 1999.99),
(61, 0, 2, 279.99),
(62, 28, 1, 120),
(62, 4, 1, 199.99),
(62, 17, 3, 899.99),
(62, 9, 1, 3699.99),
(63, 1, 3, 599.99),
(63, 12, 1, 1999.99),
(63, 14, 2, 1799.99),
(64, 2, 2, 799.99),
(64, 9, 1, 3699.99),
(65, 6, 2, 199.99),
(65, 13, 1, 1349.99),
(65, 14, 1, 1799.99),
(65, 28, 2, 120),
(66, 0, 2, 279.99),
(66, 10, 1, 1599.99),
(66, 2, 1, 799.99),
(67, 2, 3, 799.99),
(67, 5, 2, 250),
(68, 3, 1, 199.99),
(68, 19, 1, 849),
(68, 21, 1, 279.99),
(68, 22, 2, 499.99),
(69, 9, 1, 3699.99),
(69, 7, 2, 449.99),
(77, 5, 2, 250),
(81, 29, 1, 220.5),
(82, 10, 1, 1599.99),
(83, 8, 2, 899.99),
(83, 4, 1, 199.99),
(84, 18, 1, 149.99),
(84, 19, 2, 849),
(85, 6, 2, 199.99),
(86, 9, 2, 3699.99);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`idklienta`);

--
-- Indexes for table `magazyn`
--
ALTER TABLE `magazyn`
  ADD PRIMARY KEY (`idproduktu`);

--
-- Indexes for table `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`idproduktu`),
  ADD KEY `assdsfasdf` (`idkategori`);

--
-- Indexes for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`idzamowienia`),
  ADD KEY `idklienta` (`idklienta`);

--
-- Indexes for table `zamowienia_szczegoly`
--
ALTER TABLE `zamowienia_szczegoly`
  ADD KEY `key1` (`idzamowienia`),
  ADD KEY `key2` (`idproduktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `idklienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `idzamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `magazyn`
--
ALTER TABLE `magazyn`
  ADD CONSTRAINT `magazyn_ibfk_1` FOREIGN KEY (`idproduktu`) REFERENCES `produkt` (`idproduktu`);

--
-- Ograniczenia dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD CONSTRAINT `assdsfasdf` FOREIGN KEY (`idkategori`) REFERENCES `kategorie` (`idkategori`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`idklienta`) REFERENCES `klienci` (`idklienta`);

--
-- Ograniczenia dla tabeli `zamowienia_szczegoly`
--
ALTER TABLE `zamowienia_szczegoly`
  ADD CONSTRAINT `key1` FOREIGN KEY (`idzamowienia`) REFERENCES `zamowienia` (`idzamowienia`),
  ADD CONSTRAINT `key2` FOREIGN KEY (`idproduktu`) REFERENCES `produkt` (`idproduktu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
