/*
This is a temporary file to store sql modification until a next release
When a new release is pushed, this file should be emptied and the modifications should be consolidated into the proper file
*/

-- Add new tosConsent field to ClimbersSouluser
ALTER TABLE `ClimbersSoulUsers` ADD COLUMN `tosConsent` tinyint(1) NOT NULL DEFAULT '0' AFTER `email`;
