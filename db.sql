CREATE TABLE IF NOT EXISTS `users` (
                                       `id` INT(11) NOT NULL AUTO_INCREMENT,
                                       `username` VARCHAR(50) NOT NULL,
                                       `email` VARCHAR(50) NOT NULL,
                                       `password` VARCHAR(255) NOT NULL, -- Use VARCHAR(255) for hashed passwords
                                       `trn_date` DATETIME NOT NULL,
                                       PRIMARY KEY (`id`)
);
