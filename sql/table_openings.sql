DROP TABLE IF EXISTS `openings`;

-- Create table
CREATE TABLE `openings` (
  `id` int(11) NOT NULL,
  `date` varchar(10) CHARACTER SET utf8 NOT NULL,
  `from` varchar(5) CHARACTER SET utf8 NOT NULL,
  `to` varchar(5) CHARACTER SET utf8 NOT NULL,
  `special` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Add indexes
ALTER TABLE `openings`
  ADD PRIMARY KEY (`id`);

-- Add autoincrement
ALTER TABLE `openings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
