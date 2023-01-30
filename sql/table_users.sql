DROP TABLE IF EXISTS `ClimbersSoulUsers`;

-- Create table
CREATE TABLE `ClimbersSoulUsers` (
  `id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tosConsent` tinyint(1) NOT NULL DEFAULT '0',
  `isCaiArosio` tinyint(1) NOT NULL DEFAULT '0',
  `updatePassword` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `canManageOpenings` tinyint(1) NOT NULL DEFAULT '0',
  `canManageUsers` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Add indexes
ALTER TABLE `ClimbersSoulUsers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

-- Add autoincrement
ALTER TABLE `ClimbersSoulUsers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
