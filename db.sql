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
    creator_id INT REFERENCES users(id),
    event_title VARCHAR(64) NOT NULL,
    event_description VARCHAR(1000),
    fixed_date BOOLEAN,
    creation_date DATE,
    creation_time TIME,
    start_date DATE,
    start_time TIME,
    fixed_location BOOLEAN,
    limited_number_of_participants BOOLEAN,
    max_number_of_participants INT,
    advance_reservation_required BOOLEAN,
    confirm_reservations BOOLEAN
);
DROP TABLE IF EXISTS user_participates_at_event;
CREATE TABLE user_participates_at_event (
    event_id INT REFERENCES events(event_id),
    user_id INT REFERENCES users(id),
    CONSTRAINT user_participates_at_event_PK PRIMARY KEY (event_id, user_id)
);

DROP TABLE IF EXISTS label;
CREATE TABLE label (
    label_id INT PRIMARY KEY AUTO_INCREMENT,
    label_name VARCHAR(64) NOT NULL
);

DROP TABLE IF EXISTS event_has_label;
CREATE TABLE event_has_label (
    label_id INT REFERENCES events(event_id), 
    event_id INT REFERENCES label(label_id),
    CONSTRAINT event_has_label_PK PRIMARY KEY (label_id, event_id)
);

/* default values */
INSERT INTO `users`(`username`, `email`, `password`, `verification`) VALUES ('b','b@b.b','$2y$10$RlpOY0hdA4UbOmKZ23AWz..vh9QDio3qVKdg8KE.Yu1vxRxgdOy2W',342759); /*password = 12345678*/
INSERT INTO `users`(`username`, `email`, `password`, `verification`) VALUES ('Bjarne','bjarne.kopplin@gmail.com','$2y$10$RlpOY0hdA4UbOmKZ23AWz..vh9QDio3qVKdg8KE.Yu1vxRxgdOy2W',342759); /*password = 12345678*/
INSERT INTO `users`(`username`, `email`, `password`, `verification`) VALUES ('norbly','norbly@protonmail.com','$2y$10$RlpOY0hdA4UbOmKZ23AWz..vh9QDio3qVKdg8KE.Yu1vxRxgdOy2W',342759); /*password = 12345678*/
INSERT INTO events (creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,
                    fixed_location, limited_number_of_participants, 
                    advance_reservation_required, confirm_reservations)
                   VALUES (1, "Zeichnen mit Aquarell", "Wenn du Lust hast, gemeinsam zu Zeichnen, dann komm! Ich schlage vor irgendwo in die Natur zu gehen, da gibts schöne Gegenstände zum abzeichnen",
                    "2018-07-01", "14:45:00","2018-07-09", "17:25:00", 0,0,0,0);
INSERT INTO events (creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,
                    fixed_location, limited_number_of_participants, 
                    advance_reservation_required, confirm_reservations)
                   VALUES (1,"esse molestie consequat", "Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. ",
                    "2018-07-01", "14:45:00","2018-07-09", "17:25:00", 0,0,0,0);
INSERT INTO events (creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,
                    fixed_location, limited_number_of_participants, 
                    advance_reservation_required, confirm_reservations)
                   VALUES (1, "suscipit lobortis nisl ut ", "Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.",
                    "2018-07-01", "14:45:00","2018-07-09", "17:25:00", 0,0,0,0);
INSERT INTO events (creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,
                    fixed_location, limited_number_of_participants, 
                    advance_reservation_required, confirm_reservations)
                   VALUES (1, "vel illum", "Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. ",
                    "2018-07-01", "14:45:00","2018-07-09", "17:25:00", 0,0,0,0);
INSERT INTO events (creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,
                    fixed_location, limited_number_of_participants, 
                    advance_reservation_required, confirm_reservations)
                   VALUES (1, "132 dolore magna ", "At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. ",
                    "2018-07-01", "14:45:00","2018-07-09", "17:25:00", 0,0,0,0);
INSERT INTO events (creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,
                    fixed_location, limited_number_of_participants, 
                    advance_reservation_required, confirm_reservations)
                   VALUES (1, "Demo gegen Pflanzenfresser", "ich habe es satt (man beachte das Wortspiel), dass Menschen ohne Grund unschuldige Pflanzen töten. Hild mit, damit muss schluss sein. Eine andere Lösung anstelle von Pflanzen ist es, dass wir anfangen zu lernen, Photosynthese zu betreiben",
                    "2018-07-01", "14:45:00","2018-07-09", "17:25:00", 0,0,0,0);
INSERT INTO events (creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,
                    fixed_location, limited_number_of_participants, 
                    advance_reservation_required, confirm_reservations)
                   VALUES (1, "Kanutour Warnow", "\/Hallo\/ ich suche noch ein paar Leute, die Lust haben, am Montag eine Kanutour zu machen",
                    "2018-07-01", "14:45:00","2018-07-09", "17:25:00", 0,0,0,0); 
INSERT INTO events (creator_id, event_title, event_description, creation_date, creation_time, start_date, start_time,
                    fixed_location, limited_number_of_participants,max_number_of_participants, 
                    advance_reservation_required, confirm_reservations)
                   VALUES (3, "132 dolore magna ", "At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. ",
                    "2018-07-01", "14:45:00","2018-07-09", "17:25:00", 0,1,12,1,0);     

INSERT INTO label (label_name) VALUES ('tag_outdoor');
INSERT INTO label (label_name) VALUES ('tag_sport');
INSERT INTO label (label_name) VALUES ('tag_hiking');
INSERT INTO label (label_name) VALUES ('tag_music'); 

INSERT INTO event_has_label (label_id, event_id) VALUES (1,1);
INSERT INTO event_has_label (label_id, event_id) VALUES (2,1);
INSERT INTO event_has_label (label_id, event_id) VALUES (3,1);
INSERT INTO event_has_label (label_id, event_id) VALUES (3,2);
INSERT INTO event_has_label (label_id, event_id) VALUES (1,3);                                                                                                                 
                   