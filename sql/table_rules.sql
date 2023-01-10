DROP TABLE IF EXISTS `rules`;

-- Create table
CREATE TABLE `rules` (
  `id` int NOT NULL,
  `order` int NOT NULL,
  `content` text NOT NULL,
  `parentId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Add indexes
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

-- Add autoincrement
ALTER TABLE `rules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
