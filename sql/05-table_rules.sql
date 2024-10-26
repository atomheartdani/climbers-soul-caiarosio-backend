DROP TABLE IF EXISTS `ClimbersSoulRules`;

-- Create table
CREATE TABLE `ClimbersSoulRules` (
  `id` int NOT NULL,
  `order` int NOT NULL,
  `parentOrder` int DEFAULT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Add indexes
ALTER TABLE `ClimbersSoulRules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idOrder` (`id`,`order`);

-- Add autoincrement
ALTER TABLE `ClimbersSoulRules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
