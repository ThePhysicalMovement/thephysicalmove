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
-- Estrutura da tabela `programtype`
--

CREATE TABLE `programtype` (
  `ProgramType_Id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `programtype`
--

INSERT INTO `programtype` (`ProgramType_Id`, `Name`) VALUES
(1, 'Lane Swim (7yrs and over)'),
(2, 'Leisure Swim'),
(3, 'Leisure Swim (Family)'),
(4, 'Leisure Swim (Female)'),
(5, 'Badminton (Family)'),
(6, 'Fitness Centre (16yrs and over)'),
(7, 'Weight Room (16yrs and over)'),
(8, 'Basketball (14-17yrs)'),
(9, 'Leisure Swim (All Ages)'),
(10, 'Leisure Swim: Indoor Pool'),
(11, 'Youth Night'),
(12, 'Basketball (17-24yrs)'),
(13, 'Cardio (16yrs and Over)'),
(14, 'Body Sculpt (16yrs and Over)'),
(15, 'Skating (All Ages)'),
(16, 'Skate (Family)'),
(17, 'Youth Zone: Basketball (13-18yrs)'),
(18, 'Youth Zone: Beach Volleyball (13-18yrs)'),
(19, 'DROP-IN: Sports (13-24yrs)'),
(20, 'Basketball (12-19yrs)'),
(21, 'Sledge Hockey Open House (5yrs and Over)'),
(22, 'Walking/Running Track - Adult (12yrs and Over)'),
(23, 'Swimming - Youth (13-24yrs)'),
(24, 'Sports - Youth (13-24yrs)'),
(25, 'Leisure Swim (Women/Girls)'),
(26, 'Basketball (10-14yrs)'),
(27, 'Basketball (15-21yrs)'),
(28, 'Soccer (15-21yrs)'),
(29, 'Soccer (10-14yrs)'),
(30, 'Multi-Sport (10-14yrs)'),
(31, 'Volleyball (10-14yrs)'),
(32, 'Ball Hockey (10-14yrs)'),
(33, 'Basketball (13-19yrs) '),
(34, 'Basketball (16-24yrs)'),
(35, 'Sports (13-29yrs)'),
(36, 'Basketball (13-17yrs)'),
(37, 'Walking/Running Track (13yrs and Over)'),
(38, 'Weight Room: Women Only (16yrs and Over)'),
(39, 'Basketball with Family (6yrs and Over)'),
(40, 'Soccer with Family (6yrs and Over)'),
(41, 'Table Tennis with Family (6yrs and Over)'),
(42, 'Basketball (7-12yrs)'),
(43, 'Soccer (7-12yrs)'),
(44, 'Badminton with Family'),
(45, 'Volleyball (13-18yrs)'),
(46, 'Weight Room/Fitness Centre (16-69yrs)'),
(47, 'Lane Swim Patio Pool'),
(48, 'Leisure Swim Patio Pool'),
(49, 'Lane Swim Olympic Pool (7yrs and over)'),
(50, 'Weight Room (16-59yrs)'),
(51, 'Weight Room/Fitness Centre - Adult (16yrs and Over) '),
(52, 'Basketball (12-17yrs)'),
(53, 'Youth Space: Multi-Sport (13-24yrs)'),
(54, 'Weight Room/Fitness Centre - Youth'),
(55, 'Weight Room/Fitness Centre - Women'),
(56, 'Basketball (9-11yrs)'),
(57, 'Basketball (12-13yrs)'),
(58, 'Basketball (14-18yrs)'),
(59, 'Soccer (9-11yrs)'),
(60, 'Soccer (12-13yrs)'),
(61, 'Soccer (14-18yrs)'),
(62, 'Cricket (9-11yrs)'),
(63, 'Volleyball: Girls (13yrs and over)'),
(64, 'Ball Hocket (14-18yrs)'),
(65, 'Badminton (16yrs and over)'),
(66, 'Basketball (16yrs and over)'),
(67, 'Cardio High/Low (16yrs and over)'),
(68, 'Stretch and Strength (16yrs and over)'),
(69, 'Yoga (16yrs and over)'),
(70, 'Bootcamp (16yrs and over)'),
(71, 'Learn to Run (16yrs and over)'),
(72, 'Zumba (16yrs and over)'),
(73, 'Weight Room (16-99yrs)'),
(74, 'Weight Room - Women Only'),
(75, 'Leisure Swim (Male)'),
(76, 'Weight Room (16yrs and over)'),
(77, 'Skateboard (13-24yrs)'),
(78, 'BMX (13-24yrs)'),
(79, 'Gym (6-12yrs)'),
(80, 'Gym (13-18yrs)'),
(81, 'Floor Hockey (6-12yrs)'),
(82, 'Floor Hockey (13-17yrs)'),
(83, 'Sports (13-18yrs)'),
(84, 'Girs Basketball (6-12yrs)'),
(85, 'Girls Basketball (13-18yrs)'),
(86, 'Family Gym (1yr and over)'),
(87, 'Volleyball (13-24yrs)'),
(88, 'Basketball (13-24yrs)'),
(89, 'Badminton (13-24yrs)'),
(90, 'Soccer (13-24yrs)'),
(91, 'Table Tennis (13-24yrs)'),
(92, 'Multi-Sport (15-24yrs)'),
(93, 'Youth Lifeguard Club (8-17yrs)'),
(94, 'Weight Room/Fitness Centre (16yrs and over)'),
(95, 'Lane Swim - Widths'),
(96, 'Badminton (8yrs and over)'),
(97, 'Basketball (13-16yrs)'),
(98, 'Multi-Sport (13-24yrs)'),
(99, 'Width Swim (7yrs and over)'),
(100, 'Leisure Swim : Indoor Pool'),
(101, 'Playmobile (13-24yrs)'),
(102, 'Weight Room/Fitness Centre - Women (16yrs and over)'),
(103, 'Multi-Sport (16-24yrs)'),
(104, 'Swimming - All Ages'),
(105, 'Weight Room (16-24yrs)'),
(106, 'Walking/Running Track (16-99yrs)'),
(107, 'Open Gym Time with Family (6yrs and over)'),
(108, 'Table Tennis with Family'),
(109, 'Weight Room/Fitness Centre - Adult (16-69yrs)'),
(110, 'Walking/Running Track (16yrs and over)'),
(111, 'Climbing Wall Orientation - Child (6-12yrs)'),
(112, 'Climbing Wall Orientation - Youth (13-24yrs)'),
(113, 'Open Gym (13-24yrs)'),
(114, 'Basketball (13-15yrs)'),
(115, 'Ball Hockey (6-9yrs)'),
(116, 'Ball Hockey (10-12yrs)'),
(117, 'Ball Hockey (13-18yrs)'),
(118, 'Weight Room/Fitness Centre - Adult (16-59yrs)'),
(119, 'Family Badminton (6yrs and over)'),
(120, 'Family Table Tennis (6yrs and over)'),
(121, 'Walking/Running Track (4yrs and over)'),
(122, 'Walking and Running Track - Adult (10yrs and over)'),
(123, 'Lane Swim: Women (7yrs and over)'),
(124, 'Badminton: Family and Youth (6yrs and over)'),
(125, 'Table Tennis (8-80yrs)'),
(126, 'Basketball: Family and Youth (6yrs and over)'),
(127, 'Badminton: Family (6yrs and over)'),
(128, 'Weight Room/Fitness Centre - Adult (16yrs and over)'),
(129, 'Weight Room (16-69yrs)'),
(130, 'Basketball (13-18yrs)'),
(131, 'Family Badminton (12yrs and over)'),
(132, 'Weight Room - Women Only (16yrs and over)'),
(133, 'Youth Outdoor Soccer (13-15yrs)'),
(134, 'Youth Volleyball (13-24yrs)'),
(135, 'Youth Badminton (13-24yrs)'),
(136, 'Open Gym (13-24yrs)'),
(137, 'Wading Pool'),
(138, 'Pilates (13-16yrs)'),
(139, 'Yoga (13-16yrs)'),
(140, 'Bootcamp (13-16yrs)'),
(141, 'Body Sculpt (13-16yrs)'),
(142, 'Cardio Mix (13-16yrs)'),
(143, 'Family Fitness (6yrs and over)'),
(144, 'Yoga (9-12yrs)'),
(145, 'Cardio Dance (9-12yrs)'),
(146, 'Cardio High/Low (13-16yrs)'),
(147, 'Family Yoga (6yrs and over)'),
(148, 'Dodgeball (13-16yrs)'),
(149, 'Badminton (6-12yrs)'),
(150, 'Soccer(13-16yrs)'),
(151, 'Badminton - Family (6yrs and over)'),
(152, 'Volleyball (13-16yrs)'),
(153, 'Basketball - Girls (13-16yrs)'),
(154, 'Multi-Sport (6-12yrs)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `programtype`
--
ALTER TABLE `programtype`
  ADD PRIMARY KEY (`ProgramType_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `programtype`
--
ALTER TABLE `programtype`
  MODIFY `ProgramType_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
