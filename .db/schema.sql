CREATE TABLE event (
   id INT UNSIGNED AUTO_INCREMENT NOT NULL,
   title VARCHAR(255) NOT NULL,
   event_time TIMESTAMP DEFAULT NULL,
   event_place VARCHAR(255) DEFAULT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
   updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY(id)
);
