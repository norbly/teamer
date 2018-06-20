DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(64),
    email VARCHAR(64),
    password VARCHAR(64),
    verification INT(64)
);