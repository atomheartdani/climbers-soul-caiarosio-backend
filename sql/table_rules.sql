DROP TABLE IF EXISTS `rules`;

-- Create table
CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `content` text NOT NULL,
  `parentId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Add indexes
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

-- Add autoincrement
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
