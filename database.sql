-- Active: 1721052888491@@127.0.0.1@3306@zoom_alpin

DROP DATABASE IF EXISTS zoom_alpin;
CREATE DATABASE zoom_alpin;

DROP TABLE IF EXISTS user;

DROP TABLE IF EXISTS events;


CREATE TABLE user (
    id int(11)NOT NULL AUTO_INCREMENT,
    firstname varchar(255) DEFAULT NULL,
    lastname varchar(255) DEFAULT NULL,
    email varchar(255) UNIQUE DEFAULT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    password varchar(255) DEFAULT NULL,
    PRIMARY KEY (id)    
)

CREATE TABLE events (
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(255) DEFAULT NULL,
    description varchar(255) DEFAULT NULL,
    location varchar(255) DEFAULT NULL,
    zip_code varchar(255) DEFAULT NULL,    
    image varchar(255) DEFAULT NULL,
    date_start datetime DEFAULT NULL,
    postedat datetime DEFAULT NULL,
    type ENUM('Réunion', 'Conférence', 'Exposition', 'Observation', 'Rencontre', 'Sortie nature'),   
    PRIMARY KEY (id) 
    
)

ALTER TABLE user ADD COLUMN role ENUM('admin', 'user') NOT NULL DEFAULT 'user';
