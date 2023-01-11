DROP TABLE IF EXISTS `ClimbersSoulOpenings`;

-- Create table
CREATE TABLE `ClimbersSoulOpenings` (
  `id` int NOT NULL,
  `date` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `from` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `to` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `special` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `maxReservations` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Add indexes
ALTER TABLE `ClimbersSoulOpenings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`date`);

-- Add autoincrement
ALTER TABLE `ClimbersSoulOpenings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
