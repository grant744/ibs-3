
CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(64) NOT NULL,
    `middle_name` VARCHAR(64) NOT NULL,
    `last_name` VARCHAR(64) NOT NULL,
    `login` VARCHAR(64) NOT NULL,
    `password` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT `users` (`first_name`, `middle_name`, `last_name`, `login`, `password`) 
VALUES 
('Борисов', 'Борис', 'Борисович', 'boris', '123456'),
('Алексеев', 'Алексей', 'Алекеевич', 'alexey', '123456'),
('Иванов', 'Иван', 'Иванович', 'ivan', '123456');