CREATE DATABASE books
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

CREATE USER 'dev'@'localhost';

GRANT ALL ON books.* TO 'dev'@'localhost';

SET password FOR 'dev'@'localhost' = password('dev');