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
-- Estrutura da tabela `communitycentre_facility`
--

CREATE TABLE `communitycentre_facility` (
  `CommunityCentre_Facility_Id` int(11) NOT NULL,
  `CommunityCentre_Id` int(11) NOT NULL,
  `Facility_Id` int(11) NOT NULL,
  `Quantity` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `communitycentre_facility`
--

INSERT INTO `communitycentre_facility` (`CommunityCentre_Facility_Id`, `CommunityCentre_Id`, `Facility_Id`, `Quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 3),
(3, 2, 4, 1),
(4, 2, 2, 2),
(5, 2, 6, 2),
(6, 3, 6, 1),
(7, 4, 8, 2),
(8, 4, 4, 1),
(9, 5, 1, 1),
(10, 5, 2, 1),
(11, 6, 1, 1),
(12, 6, 2, 1),
(13, 7, 6, 1),
(14, 8, 8, 1),
(15, 8, 1, 1),
(16, 8, 4, 1),
(17, 8, 2, 1),
(18, 9, 8, 1),
(19, 9, 1, 1),
(20, 9, 4, 1),
(21, 9, 2, 2),
(22, 9, 23, 1),
(23, 9, 24, 1),
(24, 9, 15, 1),
(25, 10, 1, 1),
(26, 10, 2, 3),
(27, 11, 1, 1),
(28, 11, 3, 1),
(29, 11, 2, 1),
(30, 12, 2, 2),
(31, 13, 2, 1),
(32, 14, 8, 1),
(33, 14, 1, 1),
(34, 14, 4, 1),
(35, 14, 2, 4),
(36, 14, 16, 1),
(37, 15, 1, 1),
(38, 15, 4, 1),
(39, 16, 31, 1),
(40, 17, 4, 1),
(41, 17, 2, 5),
(42, 18, 2, 2),
(43, 19, 1, 1),
(44, 19, 2, 1),
(45, 20, 2, 4),
(46, 20, 5, 1),
(47, 20, 7, 1),
(48, 21, 1, 1),
(49, 22, 2, 3),
(50, 23, 8, 2),
(51, 23, 1, 1),
(52, 23, 2, 3),
(53, 24, 2, 4),
(54, 25, 6, 1),
(55, 26, 8, 1),
(56, 26, 4, 1),
(57, 26, 2, 2),
(58, 27, 1, 1),
(59, 27, 2, 1),
(60, 28, 2, 1),
(61, 28, 6, 1),
(62, 29, 8, 1),
(63, 29, 1, 1),
(64, 29, 2, 1),
(65, 30, 2, 1),
(66, 30, 6, 1),
(67, 31, 6, 2),
(68, 32, 8, 1),
(69, 32, 4, 1),
(70, 32, 21, 1),
(71, 32, 22, 1),
(72, 32, 2, 3),
(73, 32, 6, 1),
(74, 33, 37, 1),
(75, 34, 2, 3),
(76, 35, 8, 2),
(77, 35, 1, 1),
(78, 35, 4, 1),
(79, 35, 2, 4),
(80, 36, 1, 1),
(81, 36, 5, 1),
(82, 37, 17, 1),
(83, 37, 1, 1),
(84, 37, 2, 5),
(85, 37, 18, 1),
(86, 37, 6, 2),
(87, 38, 2, 3),
(88, 38, 6, 1),
(89, 39, 1, 1),
(90, 39, 2, 7),
(91, 39, 5, 1),
(92, 40, 2, 2),
(93, 41, 1, 1),
(94, 41, 4, 1),
(95, 42, 8, 1),
(96, 42, 17, 1),
(97, 42, 1, 1),
(98, 42, 4, 1),
(99, 42, 2, 1),
(100, 43, 28, 1),
(101, 44, 10, 2),
(102, 44, 2, 1),
(103, 45, 2, 3),
(104, 46, 8, 2),
(105, 46, 1, 1),
(106, 46, 22, 1),
(107, 46, 2, 5),
(108, 47, 8, 1),
(109, 47, 1, 1),
(110, 48, 8, 1),
(111, 48, 1, 1),
(112, 48, 2, 2),
(113, 49, 8, 1),
(114, 49, 1, 2),
(115, 49, 4, 2),
(116, 49, 2, 1),
(117, 50, 8, 1),
(118, 50, 17, 1),
(119, 50, 1, 1),
(120, 50, 10, 2),
(121, 50, 2, 3),
(122, 51, 8, 1),
(123, 51, 1, 1),
(124, 51, 2, 7),
(125, 52, 4, 1),
(126, 52, 2, 1),
(127, 53, 8, 1),
(128, 53, 17, 1),
(129, 53, 1, 1),
(130, 53, 2, 2),
(131, 54, 2, 5),
(132, 54, 16, 1),
(133, 55, 1, 1),
(134, 55, 4, 1),
(135, 55, 2, 3),
(136, 56, 1, 1),
(137, 56, 10, 2),
(138, 56, 5, 1),
(139, 56, 7, 1),
(140, 57, 10, 4),
(141, 57, 2, 2),
(142, 57, 5, 1),
(143, 57, 6, 1),
(144, 58, 1, 1),
(145, 58, 2, 3),
(146, 58, 5, 1),
(147, 58, 6, 1),
(148, 59, 2, 5),
(149, 59, 5, 1),
(150, 59, 6, 1),
(151, 60, 8, 2),
(152, 60, 1, 1),
(153, 60, 4, 1),
(154, 60, 2, 1),
(155, 61, 2, 3),
(156, 61, 6, 1),
(157, 62, 4, 1),
(158, 63, 2, 1),
(159, 64, 22, 1),
(160, 64, 2, 4),
(161, 64, 6, 1),
(162, 65, 1, 1),
(163, 65, 5, 1),
(164, 65, 6, 2),
(165, 66, 1, 1),
(166, 66, 4, 1),
(167, 66, 2, 2),
(168, 67, 1, 1),
(169, 67, 2, 1),
(170, 68, 32, 1),
(171, 69, 1, 5),
(172, 69, 2, 7),
(173, 70, 8, 1),
(174, 70, 2, 1),
(175, 70, 5, 1),
(176, 70, 7, 1),
(177, 71, 33, 1),
(178, 72, 13, 2),
(179, 72, 14, 2),
(180, 72, 11, 4),
(181, 72, 23, 1),
(182, 73, 8, 1),
(183, 73, 1, 1),
(184, 73, 2, 3),
(185, 74, 17, 1),
(186, 74, 1, 1),
(187, 74, 4, 2),
(188, 74, 2, 2),
(189, 74, 29, 1),
(190, 75, 2, 3),
(191, 75, 6, 1),
(192, 76, 8, 1),
(193, 76, 17, 1),
(194, 76, 1, 1),
(195, 76, 4, 1),
(196, 76, 2, 1),
(197, 77, 8, 1),
(198, 77, 1, 1),
(199, 77, 4, 1),
(200, 77, 2, 4),
(201, 78, 1, 1),
(202, 78, 2, 1),
(203, 79, 1, 1),
(204, 79, 2, 8),
(205, 80, 2, 1),
(206, 80, 6, 1),
(207, 81, 8, 1),
(208, 81, 1, 1),
(209, 81, 2, 2),
(210, 82, 8, 1),
(211, 82, 1, 1),
(212, 82, 2, 9),
(213, 82, 5, 1),
(214, 82, 29, 1),
(215, 83, 28, 1),
(216, 84, 6, 1),
(217, 85, 8, 2),
(218, 85, 4, 1),
(219, 85, 2, 1),
(220, 86, 1, 1),
(221, 86, 2, 3),
(222, 86, 29, 1),
(223, 86, 6, 2),
(224, 87, 8, 2),
(225, 87, 17, 1),
(226, 87, 1, 1),
(227, 87, 4, 1),
(228, 87, 2, 2),
(229, 88, 8, 1),
(230, 88, 1, 1),
(231, 88, 2, 6),
(232, 89, 8, 1),
(233, 89, 17, 2),
(234, 89, 1, 1),
(235, 89, 4, 1),
(236, 89, 2, 3),
(237, 90, 1, 1),
(238, 91, 2, 2),
(239, 91, 5, 1),
(240, 91, 6, 2),
(241, 92, 8, 1),
(242, 92, 4, 1),
(243, 93, 1, 1),
(244, 93, 2, 1),
(245, 94, 6, 1),
(246, 95, 8, 1),
(247, 95, 1, 1),
(248, 95, 22, 1),
(249, 95, 2, 3),
(250, 95, 5, 1),
(251, 95, 6, 1),
(252, 96, 2, 1),
(253, 97, 1, 1),
(254, 97, 2, 1),
(255, 98, 1, 1),
(256, 98, 4, 1),
(257, 99, 1, 2),
(258, 99, 2, 4),
(259, 100, 8, 1),
(260, 100, 1, 1),
(261, 100, 4, 1),
(262, 100, 2, 2),
(263, 100, 4, 1),
(264, 100, 7, 2),
(265, 101, 8, 1),
(266, 101, 1, 1),
(267, 101, 2, 5),
(268, 101, 5, 1),
(269, 102, 1, 1),
(270, 102, 2, 2),
(271, 102, 5, 1),
(272, 103, 8, 1),
(273, 103, 1, 1),
(274, 103, 2, 2),
(275, 103, 5, 1),
(276, 104, 8, 1),
(277, 104, 17, 1),
(278, 104, 1, 1),
(279, 104, 2, 3),
(280, 104, 5, 1),
(281, 104, 6, 1),
(282, 105, 1, 1),
(283, 105, 10, 2),
(284, 106, 1, 2),
(285, 106, 4, 1),
(286, 106, 2, 5),
(287, 107, 8, 1),
(288, 107, 1, 3),
(289, 107, 22, 1),
(290, 107, 2, 7),
(291, 108, 2, 2),
(292, 109, 6, 1),
(293, 110, 2, 1),
(294, 110, 6, 1),
(295, 111, 10, 4),
(296, 111, 2, 3),
(297, 111, 5, 1),
(298, 111, 18, 1),
(299, 111, 6, 1),
(300, 112, 8, 1),
(301, 112, 1, 1),
(302, 112, 2, 2),
(303, 113, 2, 1),
(304, 114, 4, 3),
(305, 114, 2, 1),
(306, 115, 8, 1),
(307, 115, 1, 1),
(308, 115, 22, 1),
(309, 115, 2, 4),
(310, 116, 1, 1),
(311, 116, 2, 5),
(312, 116, 5, 1),
(313, 116, 6, 1),
(314, 117, 2, 1),
(315, 118, 8, 1),
(316, 118, 17, 1),
(317, 118, 1, 1),
(318, 118, 2, 1),
(319, 118, 29, 1),
(320, 119, 1, 1),
(321, 119, 4, 1),
(322, 119, 2, 1),
(323, 120, 2, 3),
(324, 120, 6, 1),
(325, 121, 1, 1),
(326, 121, 2, 1),
(327, 122, 1, 1),
(328, 123, 8, 2),
(329, 123, 1, 1),
(330, 123, 4, 1),
(331, 123, 21, 2),
(332, 123, 2, 1),
(333, 124, 34, 1),
(334, 125, 22, 1),
(335, 125, 2, 4),
(336, 126, 17, 1),
(337, 126, 2, 1),
(338, 127, 8, 1),
(339, 127, 1, 1),
(340, 127, 4, 1),
(341, 127, 2, 2),
(342, 128, 35, 1),
(343, 129, 28, 1),
(344, 130, 2, 1),
(345, 131, 1, 1),
(346, 131, 2, 6),
(347, 132, 8, 1),
(348, 132, 1, 1),
(349, 132, 4, 3),
(350, 132, 22, 1),
(351, 133, 19, 1),
(352, 133, 8, 2),
(353, 133, 22, 1),
(354, 134, 2, 2),
(355, 135, 8, 2),
(356, 135, 17, 1),
(357, 135, 1, 1),
(358, 135, 4, 1),
(359, 135, 22, 1),
(360, 135, 2, 4),
(361, 136, 2, 1),
(362, 137, 8, 1),
(363, 137, 1, 1),
(364, 137, 4, 1),
(365, 137, 2, 4),
(366, 138, 8, 1),
(367, 138, 1, 1),
(368, 138, 2, 4),
(369, 138, 15, 1),
(370, 138, 20, 1),
(371, 139, 8, 2),
(372, 139, 1, 1),
(373, 139, 2, 5),
(374, 140, 1, 1),
(375, 140, 2, 1),
(376, 141, 36, 1),
(377, 142, 1, 1),
(378, 142, 2, 2),
(379, 142, 12, 2),
(380, 143, 26, 3),
(381, 144, 13, 2),
(382, 144, 27, 7),
(383, 144, 2, 1),
(384, 144, 9, 1),
(385, 144, 24, 1),
(386, 144, 25, 2),
(387, 144, 15, 2),
(388, 144, 20, 1),
(389, 144, 30, 1),
(390, 144, 7, 1),
(391, 145, 8, 1),
(392, 145, 1, 1),
(393, 145, 4, 2),
(394, 145, 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `communitycentre_facility`
--
ALTER TABLE `communitycentre_facility`
  ADD PRIMARY KEY (`CommunityCentre_Facility_Id`),
  ADD KEY `CommunityCentre_Id` (`CommunityCentre_Id`),
  ADD KEY `Facility_Id` (`Facility_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `communitycentre_facility`
--
ALTER TABLE `communitycentre_facility`
  MODIFY `CommunityCentre_Facility_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `communitycentre_facility`
--
ALTER TABLE `communitycentre_facility`
  ADD CONSTRAINT `communitycentre_facility_ibfk_1` FOREIGN KEY (`CommunityCentre_Id`) REFERENCES `communitycentre` (`CommunityCentre_Id`),
  ADD CONSTRAINT `communitycentre_facility_ibfk_2` FOREIGN KEY (`Facility_Id`) REFERENCES `facility` (`Facility_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
