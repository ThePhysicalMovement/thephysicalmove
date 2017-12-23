-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2017 às 03:02
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thephysicalmovement`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `facility`
--

CREATE TABLE `facility` (
  `Facility_Id` int(11) NOT NULL,
  `Type` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `facility`
--

INSERT INTO `facility` (`Facility_Id`, `Type`) VALUES
(1, 'Gymnasium'),
(2, 'Multipurpose Room'),
(3, 'Multipurpose Field'),
(4, 'Indoor Pool'),
(5, 'Outdoor Pool'),
(6, 'Indoor Rink'),
(7, 'Outdoor Rink'),
(8, 'Fitness/Weight Rooms'),
(9, 'Outdoor Fitness Equipment'),
(10, 'Indoor Bocce Court'),
(11, 'Bocce Courts'),
(12, 'Outdoor Bocce Courts'),
(13, 'Baseball Diamond'),
(14, 'Soccer Pitch'),
(15, 'Playground'),
(16, 'Playroom'),
(17, 'Games Room'),
(18, 'ProShop'),
(19, 'Fieldhouse'),
(20, 'Sport Field'),
(21, 'Indoor Squash Court'),
(22, 'Indoor Track'),
(23, 'Outdoor Basketball Court'),
(24, 'Outdoor Table Tennis'),
(25, 'Outdoor Tennis Courts'),
(26, 'Bowling Greens'),
(27, 'Bike Trails'),
(28, 'Curling Rink'),
(29, 'Skateboard Area'),
(30, 'Wading Pool'),
(31, 'Nearby Berner Trail Park'),
(32, 'Nearby Connorvale Park'),
(33, 'Nearby Michael Power Park'),
(34, 'Nearby Stan Wadlow Park'),
(35, 'Nearby Tall Pines Park'),
(36, 'Nearby West Rouge Park'),
(37, 'Nearby Botany Hill Park');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`Facility_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `Facility_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
