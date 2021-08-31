CREATE DATABASE IF NOT EXIST accounts;

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE users
    ADD address VARCHAR(255),
    ADD city VARCHAR(50),
    ADD state VARCHAR(10),
    ADD zip VARCHAR(10),
    ADD flname VARCHAR(255),
    ADD credit VARHCAR(16),
    ADD expiration VARCHAR(5),
    ADD secCode VARCHAR(3)
    
