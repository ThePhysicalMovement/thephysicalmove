CREATE TABLE `Program` (
  `Program_Id` int(11) NOT NULL,
  `CommunityCentre_Id` int(11) NOT NULL,
  `ProgramType_Id` int(11) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `StartDate` DATE DEFAULT NULL,
  `EndDate` DATE DEFAULT NULL,
  `StartHour` int(2) DEFAULT NULL,
  `EndHour` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `communitycentre_facility`
--
ALTER TABLE `Program`
  ADD PRIMARY KEY (`Program_Id`),
  ADD KEY `CommunityCentre_Id` (`CommunityCentre_Id`),
  ADD KEY `ProgramType_Id` (`ProgramType_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `communitycentre_facility`
--
ALTER TABLE `Program`
  MODIFY `Program_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `communitycentre_facility`
--
ALTER TABLE `Program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`CommunityCentre_Id`) REFERENCES `communitycentre` (`CommunityCentre_Id`),
  ADD CONSTRAINT `program_ibfk_2` FOREIGN KEY (`ProgramType_Id`) REFERENCES `programtype` (`ProgramType_Id`);
