DROP DATABASE IF EXISTS website;

CREATE DATABASE website;

USE website;

CREATE TABLE users (
    id int NOT NULL KEY AUTO_INCREMENT,
    username varchar(10) NOT NULL,
    password varchar(64) NOT NULL,
    salt varchar(256) NOT NULL
);