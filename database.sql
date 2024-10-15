-- Active: 1721052888491@@127.0.0.1@3306@zoom_alpin

DROP DATABASE IF EXISTS zoom_alpin;
CREATE DATABASE zoom_alpin;

DROP TABLE IF EXISTS user;

DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS publications;


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

CREATE TABLE publications (
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

ALTER TABLE events ADD COLUMN user_id FOREIGN KEY REFERENCES user(id);
ALTER TABLE publications ADD COLUMN user_id FOREIGN KEY REFERENCES user(id);


INSERT INTO events (title, description, location, zip_code, image, date_start, postedat, type)
VALUES 
('Réunion annuelle des ornithologues', 'Réunion des passionnés d\'ornithologie pour discuter des projets à venir', 'Paris', '75001', 'reunion_ornithologie.jpg', '2024-11-15 09:00:00', '2024-10-07 10:00:00', 'Réunion');

INSERT INTO events (title, description, location, zip_code, image, date_start, postedat, type)
VALUES 
('Conférence sur les oiseaux migrateurs', 'Conférence dédiée aux espèces d\'oiseaux migrateurs en Europe', 'Lyon', '69002', 'conference_oiseaux_migrateurs.jpg', '2024-12-01 14:00:00', '2024-10-07 11:00:00', 'Conférence');

INSERT INTO events (title, description, location, zip_code, image, date_start, postedat, type)
VALUES 
('Exposition photographique sur les rapaces', 'Exposition de photos de rapaces prises par des ornithologues amateurs', 'Marseille', '13001', 'exposition_rapaces.jpg', '2024-10-20 10:00:00', '2024-10-07 12:00:00', 'Exposition');

INSERT INTO events (title, description, location, zip_code, image, date_start, postedat, type)
VALUES 
('Observation des oiseaux du littoral', 'Sortie d\'observation des espèces maritimes en bord de mer', 'Brest', '29200', 'observation_littoral.jpg', '2024-10-28 08:00:00', '2024-10-07 13:00:00', 'Observation');

INSERT INTO events (title, description, location, zip_code, image, date_start, postedat, type)
VALUES 
('Sortie nature à la découverte des oiseaux des forêts', 'Randonnée pour observer les oiseaux forestiers', 'Grenoble', '38000', 'sortie_nature_foret.jpg', '2024-11-05 07:30:00', '2024-10-07 14:00:00', 'Sortie nature');



INSERT INTO publications (title, description, location, zip_code, image, date_start, postedat, type)
VALUES 
('Rencontre autour des espèces protégées', 'Discussion sur la protection des oiseaux rares et menacés', 'Bordeaux', '33000', 'rencontre_especes_protegees.jpg', '2024-10-18 17:00:00', '2024-10-07 15:00:00', 'Rencontre');

INSERT INTO publications (title, description, location, zip_code, image, date_start, postedat, type)
VALUES 
('Observation des oiseaux nocturnes', 'Sortie spéciale pour observer les chouettes et hiboux', 'Nantes', '44000', 'observation_nocturne.jpg', '2024-11-05 19:00:00', '2024-10-07 16:00:00', 'Observation');

INSERT INTO publications (title, description, location, zip_code, image, date_start, postedat, type)
VALUES 
('Conférence sur les oiseaux des montagnes', 'Conférence dédiée aux espèces vivant en haute altitude', 'Annecy', '74000', 'conference_oiseaux_montagne.jpg', '2024-12-12 15:00:00', '2024-10-07 17:00:00', 'Conférence');

INSERT INTO publications (title, description, location, zip_code, image, date_start, postedat, type)
VALUES 
('Exposition : Les migrateurs en Europe', 'Exposition photographique sur les oiseaux migrateurs européens', 'Lille', '59000', 'exposition_migrateurs.jpg', '2024-11-20 10:00:00', '2024-10-07 18:00:00', 'Exposition');

INSERT INTO publications (title, description, location, zip_code, image, date_start, postedat, type)
VALUES 
('Sortie nature : À la découverte des canards sauvages', 'Sortie en milieu aquatique pour observer différentes espèces de canards', 'Strasbourg', '67000', 'sortie_canards_sauvages.jpg', '2024-10-25 09:00:00', '2024-10-07 19:00:00', 'Sortie nature');
