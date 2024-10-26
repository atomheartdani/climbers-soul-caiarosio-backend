-- Script to generate insert statements for Openings
-- Remember to manually remove holidays

WITH recursive openings AS (
         SELECT CONCAT(year(curdate()), '-10-01') AS opening -- October 1st of current year
         UNION ALL
         SELECT opening + INTERVAL 1 day
           FROM openings
          WHERE opening < CONCAT(year(curdate()) + 1, '-04-30')) -- April 30th of next year
  SELECT 'INSERT INTO `ClimbersSoulOpenings` (`date`, `from`, `to`, `special`, `maxReservations`) VALUES'
  UNION
  SELECT CONCAT('(', opening, ', `19:15`, `21:00`, NULL, 8),')
    FROM openings
   WHERE weekday(opening) IN (1, 3)
