DROP TABLE IF EXISTS `openings`;

-- Create table
CREATE TABLE `openings` (
  `id` int NOT NULL,
  `date` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `from` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `to` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `special` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `maxReservations` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Add indexes
ALTER TABLE `openings`
  ADD PRIMARY KEY (`id`);

-- Add autoincrement
ALTER TABLE `openings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
