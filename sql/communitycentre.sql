-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2017 às 03:00
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
-- Estrutura da tabela `communitycentre`
--

CREATE TABLE `communitycentre` (
  `CommunityCentre_Id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `WebsiteURL` varchar(100) DEFAULT NULL,
  `Photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `communitycentre`
--

INSERT INTO `communitycentre` (`CommunityCentre_Id`, `Name`, `Address`, `PhoneNumber`, `WebsiteURL`, `Photo`) VALUES
(1, 'Adam Beck CC', '79 Lawlor Avenue M4E 3L8', '416-392-0741', NULL, NULL),
(2, 'Agincourt Recreation Centre', '31 Glen Watford Dr M1S 2B7', '416-396-4037', NULL, NULL),
(3, 'Albion Arena', '1501 Albion Rd M9V 1B2', '416-394-8690', NULL, NULL),
(4, 'Albion Pool and Health Club', '1485 Albion Rd M9V 1B2', '416-394-8676', NULL, NULL),
(5, 'Amesbury CC', '1507 Lawrence Ave W M6L 1A8', '416-395-0145', NULL, NULL),
(6, 'Ancaster CC', '41 Ancaster Rd M3K 1S7', '416-395-6057', NULL, NULL),
(7, 'Angela James Arena', '165 Grenoble Dr M3C 1E3', NULL, NULL, NULL),
(8, 'Annette Community Recreation Centre', '333 Annette St M6P 1R3', '416-392-0736', NULL, NULL),
(9, 'Antibes CC', '140 Antibes Dr M2R 3J3', '416-395-0096', NULL, NULL),
(10, 'Armour Heights CC', '2140 Avenue Rd M5M 4M7', '416-395-7848', NULL, NULL),
(11, 'Balmy Beach Community Recreation Centre', '14 Pine Ave M4E 1L6', '416-392-6972', NULL, NULL),
(12, 'Banbury CC', '120 Banbury Rd M3B 2L3', '416-395-6101', NULL, NULL),
(13, 'Barbara Frum CC', '20 Covington Rd M6A 3C1', '416-395-6123', NULL, NULL),
(14, 'Beaches Recreation Centre', '6 Williamson Rd M4E 1K5', '416-392-0740', NULL, NULL),
(15, 'Bedford Park CC', '81 Ranleigh Ave M4N 1X2', '416-392-0618', NULL, NULL),
(16, 'Berner Trail CC', '120 Berner Trail', '416-396-4054', NULL, NULL),
(17, 'Birchmount CC', '93 Birchmount Rd M1T 2M5', '416-396-4311', NULL, NULL),
(18, 'Birkdale CC', '1299 Ellesmere Rd M1P 2Y2', '416-396-4069', NULL, NULL),
(19, 'Bob Abate Community Recreation Centre', '485 Montrose Ave M6G 3H2', '416-392-0744', NULL, NULL),
(20, 'Broadlands CC', '19 Castlegrove Blvd M3A 1K9', '416-395-7966', NULL, NULL),
(21, 'Brown CC', '454 Avenue Rd M5M 4M7', '416-392-6826', NULL, NULL),
(22, 'Burrow Hall CC', '1081 Progress Ave M1B 5Z6', '416-396-4670', NULL, NULL),
(23, 'Carmino Stefano CC', '3100 Weston Rd M9M 2S7', '416-395-6127', NULL, NULL),
(24, 'Cedarbrook CC', '91 Eastpark Blvd M1H 1C6', '416-396-4028', NULL, NULL),
(25, 'Centennial Park Arena', '156 Centennial Park Rd M9C 5N3', '416-394-8756', NULL, NULL),
(26, 'Centennial Recreation Centre - Scarborough', '1967 Ellesmere Rd M1H 2W5', '416-396-4057', NULL, NULL),
(27, 'Centennial Recreation Centre West', '2694 Eglingtion Ave W M6M 1T9', '416-394-2717', NULL, NULL),
(28, 'Central Arena', '50 Montgomery Rd M8X 1Z4', '416-394-5439', NULL, NULL),
(29, 'Chalkfarm CC', '180 Chalkfarm Dr M3L 2H8', '416-395-7802', NULL, NULL),
(30, 'Chris Tonks Arena', '95 Black Creek Dr M6N 2K6', '416-394-2733', NULL, NULL),
(31, 'Commander Recreation Centre', '140 Commander Blvd M1S 3H7', '416-394-4024', NULL, NULL),
(32, 'Cummer Park CC', '6000 Leslie St M2H 1J9', '416-395-7803', NULL, NULL),
(33, 'Curran Hall CC', '277 Orton Park Rd M1G 3T4', '416-396-5156', NULL, NULL),
(34, 'David Appleton Community Recreation', '33 Pritchard Ave M9N 1T4', '416-394-2896', NULL, NULL),
(35, 'Dennis R. Timbrell Resource Centre', '29 St Dennis Dr M3C 3J3', '416-395-7972', NULL, NULL),
(36, 'Domenico Di Luca Community Recreation Centre', '25 Stanley Rd M3N 1C2', '416-395-6673', NULL, NULL),
(37, 'Don Montgomery CC', '2467 Eglinton Ave E M1K 2R1', '416-396-4043', NULL, NULL),
(38, 'Downsview Arena', '1633 Wilson Ave M3L 1A5', '416-395-7831', NULL, NULL),
(39, 'Driftwood Community Recreation Centre', '4401 Jane St M3N 2K3', '416-395-7944', NULL, NULL),
(40, 'Earl Bale CC', '4169 Bathurst St M3H 3P7', '416-395-7873', NULL, NULL),
(41, 'Earl Beatty CC', '455 Blebeholme Blvd M4C 1V3', '416-392-0752', NULL, NULL),
(42, 'East York CC', '1081 1/2 Pape Ave', '416-396-2880', NULL, NULL),
(43, 'East York Curling Club', '901 Cosburn Ave M4C 2W7', '416-396-2816', NULL, NULL),
(44, 'Edenbridge Centre', '235 Edenbridge Dr M9A 3G9', '416-392-2451', NULL, NULL),
(45, 'Edgehill House', '61 Edgehill Rd M9A 4N1', '416-392-2724', NULL, NULL),
(46, 'Edithvale CC', '131 Finch Ave W M2N 2H8', '416-395-6164', NULL, NULL),
(47, 'Ellesmere CC', '20 Canadian Rd M1R 4B4', '416-396-5536', NULL, NULL),
(48, 'Elmbank CC', '10 Rampart Rd M9V 4L9', '416-394-8671', NULL, NULL),
(49, 'Etobicoke Olympium', '590 Rathburn Rd M9C 3T3', '416-394-8111', NULL, NULL),
(50, 'Fairbank Memorial CC', '2213 Dufferin St M6E 3S2', '416-394-2473', NULL, NULL),
(51, 'Fairfield Seniors\' Centre', '80 Lothian Ave M8Z 4K5', '416-394-8687', NULL, NULL),
(52, 'Fairmount Park CC', '1757 Gerrard St E M4L 2B3', '416-392-7060', NULL, NULL),
(53, 'Falstaff CC', '50 Falstaff Ave M6L 2C7', '416-395-7924', NULL, NULL),
(54, 'Flemingdon CC and Playground Paradise', '150 Grenoble Dr M3C 3E7', '416-395-6014', NULL, NULL),
(55, 'Frankland CC', '816 Logan Ave M4K 3E1', '416-392-0749', NULL, NULL),
(56, 'Glen Long CC', '35 Glen Long Ave M6B 2M1', '416-395-7961', NULL, NULL),
(57, 'Gord and Irene Risk CC', '2650 Finch Ave W M2N 2H8', '416-395-0355', NULL, NULL),
(58, 'Goulding CC', '45 Goulding Ave M2M 1K8', '416-395-0123', NULL, NULL),
(59, 'Grandravine Community Recreation Centre', '23 Grandravine Dr M3N 1J4', '416-395-6171', NULL, NULL),
(60, 'Gus Ryder Pool and Health Club', '1 Faustina Dr M8V 3L9', '416-394-8726', NULL, NULL),
(61, 'Habitant Arena', '3383 Weston Rd', '416-395-7949', NULL, NULL),
(62, 'Harrison Pool', '15 Stephanie St M5T 1B1', '416-392-7984', NULL, NULL),
(63, 'Harwood Hall', '85 Cayuga Ave M6N 2G4', '416-394-2747', NULL, NULL),
(64, 'Herbert H. Carbegie Centennial Centre', '580 Finch Ave W M9M 3A3', '416-395-6067', NULL, NULL),
(65, 'Heron Park CC', '292 Manse Rd M1E 3V4', '416-396-4035', NULL, NULL),
(66, 'Hillcrest CC', '1339 Bathurst St', '416-392-0746', NULL, NULL),
(67, 'Holy Family CC', '141 Close Ave M6K 2V6', '416-392-6695', NULL, NULL),
(68, 'Horner Avenue Seniors Centre', '320 Horner Ave M8W 2C2', '416-394-6000', NULL, NULL),
(69, 'Humberwood CC', '850 Humberwood Blvd M9W 7A6', '416-394-5700', NULL, NULL),
(70, 'Irving W. Chapley CC', '205 Wilmington Ave M3H 6B3', '416-395-0453', NULL, NULL),
(71, 'Islington Seniors\' Centre', '4968 Dundas St W M9A 1B7', '416-231-3431', NULL, NULL),
(72, 'Jack Goodlad CC', '929 Kennedy Rd', '416-936-7566', NULL, NULL),
(73, 'Jenner Jean-Marie CC', '48 Thorncliffe Park Dr M4H 1J7', '416-396-2874', NULL, NULL),
(74, 'Jimmie Simpson Recreation Centre', '870 Queen St E M4M 3G9', '416-392-0751', NULL, NULL),
(75, 'John Booth Memorial Arena', '230 Gosford Blvd M3N 2H1', '416-395-7942', NULL, NULL),
(76, 'John Innes Community Recreation Centre', '150 Sherbourne St M5A 2R6', '416-392-6779', NULL, NULL),
(77, 'Joseph J. Piccininni CC', '1369 St Clair Ave W M6E 1C5', '416-392-0036', NULL, NULL),
(78, 'Keele CC', '181 Glenlake Ave M6P 4B6', '416-392-0695', NULL, NULL),
(79, 'Ken Cox CC', '28 Colonel Samuel Smith Park Dr M8V 4B6', '416-392-6355', NULL, NULL),
(80, 'Lambton Arena', '4100 Dundas St W M6S 2T7', '416-394-2735', NULL, NULL),
(81, 'L\'Amoreaux Commnity Recreation Centre', '2000 McNicoll Ave M1V 5E9', '416-396-4510', NULL, NULL),
(82, 'Lawrence Heights CC', '5 Replin Rd M6A 2M8', '416-395-6118', NULL, NULL),
(83, 'Leaside Curling Club', '1075 Millwood Rd M4G 1X6', '647-748-2875', NULL, NULL),
(84, 'Long Branch Arena ', '75 Arcadian Cir M8W 2Z5', '416-394-8694', NULL, NULL),
(85, 'Main Square CC', '245 Main St M4C 5TC', '416-392-1070', NULL, NULL),
(86, 'Malvern Recreation Centre', '30 Sewells Rd M1B 3G5', '416-396-4054', NULL, NULL),
(87, 'Mary McCormick Recreation Centre', '66 Sheridan Ave M6K 2G9', '416-392-0742', NULL, NULL),
(88, 'Masaryk - Cowan CC', '220 Cowan Ave M6K 2N6', '416-392-6928', NULL, NULL),
(89, 'Matty Eckler Recreation Centre', '953 Gerrard St E M4M 1Z4', '416-392-0750', NULL, NULL),
(90, 'Maurice Cody CC', '181 Cleveland St M4S 3C1', '416-392-0747', NULL, NULL),
(91, 'McGregor Park CC', '2231 Lawrence Ave E M1C 3B2', '416-396-4023', NULL, NULL),
(92, 'Memorial Pool and Health Club', '44 Montgomery Rd M8X 1Z4', '416-394-8731', NULL, NULL),
(93, 'Milliken Park Community Recreation Centre', '4325 McCowan Rd M1V 4P1', '416-396-7757', NULL, NULL),
(94, 'Mimico Arena ', '31 Drummond St', '416-394-8695', NULL, NULL),
(95, 'Mitchell Field CC', '89 Church Ave M2N 6C9', '416-395-0262', NULL, NULL),
(96, 'Mount Dennis Community Hall', '4 Hollis St M6M 4M9', '416-394-2747', NULL, NULL),
(97, 'New Toronto Seniors\' Centre', '105 Fourth St M8V 2Y4', '416-394-8684', NULL, NULL),
(98, 'Norseman Coomunity School and Pool', '105 Morseman St M8Z 2R1 ', '416-394-8719', NULL, NULL),
(99, 'North Kipling CC', '2 Rowntree Rd M9V 5C7', '416-394-8679', NULL, NULL),
(100, 'North Toronto Memorial CC', '200 Eglinton Ave W M4R 1A7', '416-392-6591', NULL, NULL),
(101, 'Northwood CC', '15 Clubhouse Crt M3L 2L7', '416-395-7876', NULL, NULL),
(102, 'OakDale CC', '350 Grandravine Dr M3J 1B3', '416-395-0484', NULL, NULL),
(103, 'O\'Connor CC', '1386 Victoria Park Ave M4A 2L8', '416-395-7957', NULL, NULL),
(104, 'Oriole CC', '2975 Don Mills Rd W M2J 3B7', '416-395-6005', NULL, NULL),
(105, 'Ourland CC', '18 Ourland Ave M8Z 4C9', '416-394-8673', NULL, NULL),
(106, 'Parkdale Community Recreation Centre ', '74 Lansdowne Ave M6K 2W1', '416-392-6696', NULL, NULL),
(107, 'Parkway Forest CC', '55 Forest Manor Rd M2J 0C2', '416-392-6383', NULL, NULL),
(108, 'Pelmo Park CC', '171 Pellatt Ave M9N 2P5', '416-394-2747', NULL, NULL),
(109, 'Phil White Arena', '443 Arlington Ave M6C 3A4', '416-394-2734', NULL, NULL),
(110, 'Pine Point Arena ', '15 Grierson Rd M9W 3R2', '416-394-8692', NULL, NULL),
(111, 'Pleasantview CC', '545 Van Horne Ave M2J 4S8', '416-395-6006', NULL, NULL),
(112, 'Port Union Community Recreation Centre', '5450 Lawrence Ave E M!C 3B2', '416-396-4031', NULL, NULL),
(113, 'Power House Recreation Centre', '65 Colonel Samuel Smith Park Dr M8V 4B6', '416-338-1081', NULL, NULL),
(114, 'Regent Park Aquatic Centre', '640 Dundas St E M5A 2B8', '416-338-2237', NULL, NULL),
(115, 'Regent Park CC', '402 Shuter St', '416-392-5490', NULL, NULL),
(116, 'Roding CC', '600 Roding St M3M 2A5', '416-395-7964', NULL, NULL),
(117, 'Roywood Park R.C. Clubhouse', '7 Roywood Dr', '416-395-0143', NULL, NULL),
(118, 'S.H. Armstrong CC', '56 Woodfield Rd M4L 2W6', '416-392-0734', NULL, NULL),
(119, 'Scadding CourtCC', '707 Dundas St W M5T 2W6', '416-392-0335', NULL, NULL),
(120, 'Scarborough Village Recreation Centre', '3600 Kingston Rd M1M 1R9', '416-396-4048', NULL, NULL),
(121, 'Secord CC', '91 Barrington Ave M4C 4Y9', '416-396-2857', NULL, NULL),
(122, 'Seneca Village CC', '1700 Finch Ave E M2J 4X8', '416-395-7671', NULL, NULL),
(123, 'St. Lawrence Community Recreation Centre', '230 The Esplanade M5A 4J6', '416-392-1347', NULL, NULL),
(124, 'Stan Wadlow Clubhouse', '373 Cedarvale Ave M4C 4K7', '416 396-2842', NULL, NULL),
(125, 'Stephen Leacock Community Recreation Centre', '2500 Birchmount Rd M1T 2M5', '416-396-4184', NULL, NULL),
(126, 'Stephen Leacock Seniors CC', '2520 Birchmount Rd M1T 2M5', '416-396-4040', NULL, NULL),
(127, 'Swansea Community Recreation Centre', '15 Waller Ave M6S 4Z9', '416 392-6796', NULL, NULL),
(128, 'Tall Pines CC', '64 Rylander Blvd M1B 4X3', '416-396-4350', NULL, NULL),
(129, 'Tam Heather Curling and Tennis Club', '730 Military Trl MiE 4P7', '416-284-3690', NULL, NULL),
(130, 'Terry Fox Recreation Centre', '2 Gledhill Ave M4C 5K6', '416-396-2842', NULL, NULL),
(131, 'Thistletown CC', '925 Albion Rd M9V 1A6', '416-394-8717', NULL, NULL),
(132, 'Toronto Pan Am Sports Centre', '875 Morningside Ave M1C 0C7', '416-283-5222', NULL, NULL),
(133, 'Toronto Track and Field Centre', '4700 Keele St M3J 1P3', '416-392-2812', NULL, NULL),
(134, 'Trace Manes Park CC', '110 Rumsey Rd M4G 1P2', '416-396-2853', NULL, NULL),
(135, 'Trinity Community Recreation Centre', '155 Crawford St M6J 2V5', '416-392-0743', NULL, NULL),
(136, 'Viewmount CC', '169 Viewmount Ave M6B 1T5', '416-395-6021', NULL, NULL),
(137, 'Wallace Emerson CC', '1260 Dufferin St M6H 4C3', '416-392-0039', NULL, NULL),
(138, 'Warden Hilltop CC', '25 Mendelssohn St M1L 0G6', '416-392-7640', NULL, NULL),
(139, 'Wellesley CC', '495 Sherbourne St M4X 1K7', '416-392-0227', NULL, NULL),
(140, 'West Acres Senior Centre ', '65 Hinton Rd M9W 6Z8', '416-394-8680', NULL, NULL),
(141, 'West Rouge CC', '270 Rouge Hills Dr M1C 2Z1', '416-396-4147', NULL, NULL),
(142, 'West Scarborough Neighbourhood Centre', '313 Pharmacy Ave M1L 3E7', '416-755-9215', NULL, NULL),
(143, 'Willowdale Lawn Bowling Club', '150 Beecroft Rd M2N 5Z5', '416-221-6362', NULL, NULL),
(144, 'Withrow Park and Clubhouse', '725 Logan Ave', 'N/A', NULL, NULL),
(145, 'York Recreation Centre', '115 Black Creek Dr', '416-392-9675', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `communitycentre`
--
ALTER TABLE `communitycentre`
  ADD PRIMARY KEY (`CommunityCentre_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `communitycentre`
--
ALTER TABLE `communitycentre`
  MODIFY `CommunityCentre_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
