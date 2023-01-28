CREATE DATABASE `volunteerDB`;

-- tables

CREATE table `volunteerDB`.`events` (
    `eventID` INT NOT NULL AUTO_INCREMENT,
    `UserID` INT NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `longitude` DOUBLE(19, 16),
    `latitude` DOUBLE(19, 16),
    `time` DATE NOT NULL,
    `description` BLOB,
    `organizstion` VARCHAR(100),
    `author` VARCHAR(100) NOT NULL,
    `event_name` VARCHAR(100) NOT NULL,
    `status` BOOLEAN NOT NULL,
    PRIMARY KEY (`eventID`)
);

CREATE table `volunteerDB`.`users` (
    `UserID` INT NOT NULL AUTO_INCREMENT,
    `userName` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `longitude` DOUBLE(19, 16),
    `latitude` DOUBLE(19, 16),
    `email` VARCHAR(100) NOT NULL,
    `phoneNumber` CHAR(12),
    `dateJoined` DATE NOT NULL,
    `description` BLOB,
    PRIMARY KEY (`UserID`)
);

CREATE TABLE `volunteerDB`.`volunteered` (
    `Index` INT NOT NULL AUTO_INCREMENT,
    `UserID` INT NOT NULL,
    `eventID` INT NOT NULL,
    PRIMARY KEY (`Index`)
);

CREATE INDEX `idx_UID`
ON `volunteerDB`.`volunteered` (`UserID`);

CREATE INDEX `idx_EID`
ON `volunteerDB`.`volunteered` (`eventID`);

CREATE INDEX `idx_EUID`
ON `volunteerDB`.`events` (`UserID`);

-- views

CREATE VIEW `volunteerDB`.`userProfile` AS 
SELECT `volunteerDB`.`users`.`UserID`, `volunteerDB`.`users`.`userName`, `volunteerDB`.`users`.`email`, `volunteerDB`.`users`.`phoneNumber`, `volunteerDB`.`users`.`dateJoined`, `volunteerDB`.`users`.`description`
FROM `volunteerDB`.`users`;

CREATE VIEW `volunteerDB`.`hostedEvents` AS
SELECT `volunteerDB`.`users`.`UserID`, `volunteerDB`.`events`.`eventID`, `volunteerDB`.`events`.`status`, `volunteerDB`.`events`.`time`
FROM `volunteerDB`.`users` INNER JOIN `volunteerDB`.`events` ON `volunteerDB`.`users`.`UserID` = `volunteerDB`.`events`.`UserID`
ORDER BY `volunteerDB`.`events`.`status`;

CREATE VIEW `volunteerDB`.`volunteeredEvents` AS
SELECT `volunteerDB`.`volunteered`.`UserID`, `volunteerDB`.`volunteered`.`eventID`, `volunteerDB`.`events`.`description`, `volunteerDB`.`events`.`event_name` AS `name`, `volunteerDB`.`events`.`organizstion`, `volunteerDB`.`events`.`author`, `volunteerDB`.`events`.`time` AS `date`
FROM `volunteerDB`.`volunteered` LEFT JOIN `volunteerDB`.`events` ON `volunteerDB`.`volunteered`.`eventID` = `volunteerDB`.`events`.`eventID`;

CREATE VIEW `volunteerDB`.`eventVolunteers` AS
SELECT `volunteerDB`.`events`.`eventID`, `volunteerDB`.`volunteered`.`UserID`, `volunteerDB`.`users`.`userName`, `volunteerDB`.`users`.`email`, `volunteerDB`.`users`.`phoneNumber`
FROM ((`volunteerDB`.`volunteered` INNER JOIN `volunteerDB`.`users` ON `volunteerDB`.`volunteered`.`UserID` = `volunteerDB`.`users`.`UserID`) INNER JOIN `volunteerDB`.`events` ON `volunteerDB`.`volunteered`.`eventID` = `volunteerDB`.`events`.`eventID`);

-- use openMap api for geocoding
