DROP TABLE IF EXISTS `reservations`;

-- Create table
CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `openingId` int NOT NULL,
  `userId` int NOT NULL,
  `reservePartner` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Add indexes
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

-- Add autoincrement
ALTER TABLE `reservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
