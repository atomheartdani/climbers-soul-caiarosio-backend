DROP TABLE IF EXISTS `users`;

-- Create table
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Add indexes
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

-- Add autoincrement
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
