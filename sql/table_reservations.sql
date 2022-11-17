DROP TABLE IF EXISTS `reservations`;

-- Create table
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `openingId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Add indexes
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

-- Add autoincrement
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
