DROP TABLE IF EXISTS `ClimbersSoulReservations`;

-- Create table
CREATE TABLE `ClimbersSoulReservations` (
  `id` int NOT NULL,
  `openingId` int NOT NULL,
  `userId` int NOT NULL,
  `reservePartner` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Add indexes
ALTER TABLE `ClimbersSoulReservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `openingUser` (`openingId`,`userId`);

-- Add constraints
ALTER TABLE `ClimbersSoulReservations`
  ADD CONSTRAINT `openingsFK` FOREIGN KEY (`openingId`) REFERENCES `ClimbersSoulOpenings` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `usersFK` FOREIGN KEY (`userId`) REFERENCES `ClimbersSoulUsers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Add autoincrement
ALTER TABLE `ClimbersSoulReservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
