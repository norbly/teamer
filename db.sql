DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(64),
    email VARCHAR(64),
    password VARCHAR(64),
    verification INT(6)
);

DROP TABLE IF EXISTS events;
CREATE TABLE events (
    event_id INT PRIMARY KEY AUTO_INCREMENT,
    creator_id INT,
    event_title VARCHAR(64) NOT NULL,
    event_description VARCHAR(500),
    fixed_date BOOLEAN,
    creation_date DATE,
    creation_time TIME,
    start_date DATE,
    start_time TIME,
    fixed_location BOOLEAN,
    limited_number_of_participants BOOLEAN,
    number_of_participants INT,
    advance_reservation_required BOOLEAN,
    confirm_reservations BOOLEAN 
);

/* default values */
INSERT INTO `users`(`username`, `email`, `password`, `verification`) VALUES ('b','b@b.b','$2y$10$RlpOY0hdA4UbOmKZ23AWz..vh9QDio3qVKdg8KE.Yu1vxRxgdOy2W',342759); /*password = 12345678*/
INSERT INTO `users`(`username`, `email`, `password`, `verification`) VALUES ('norbly','norbly@protonmail.com','$2y$10$RlpOY0hdA4UbOmKZ23AWz..vh9QDio3qVKdg8KE.Yu1vxRxgdOy2W',342759) /*password = 12345678*/