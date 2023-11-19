CREATE DATABASE garage_app;
USE garage_app;

CREATE TABLE users (
	id integer PRIMARY KEY AUTO_INCREMENT,
	userid varchar(50) NOT NULL,
	password varchar(255) NOT NULL,
	lastname varchar(25),
	firstname varchar(25),
	access varchar(50) NOT NULL
	);

CREATE TABLE service (
	id integer PRIMARY KEY AUTO_INCREMENT,
	title varchar(25) NOT NULL,
	descr_short varchar(255) NOT NULL,
	descr_long varchar (2000),
    img varchar(255)
	);    

CREATE TABLE annonce (
	id integer PRIMARY KEY AUTO_INCREMENT,
    status varchar(25) NOT NULL,
	brand varchar(25) NOT NULL,
	model varchar(25) NOT NULL,
	price integer NOT NULL,
	year integer NOT NULL,
	image_link varchar(255) NOT NULL,
	km integer NOT NULL,
	fuel_type varchar(10),
	gearbox_type varchar(10),
	client_id integer,
	FOREIGN KEY (client_id) REFERENCES users(id)
	);    

CREATE TABLE magasin (
	id integer PRIMARY KEY AUTO_INCREMENT,
	name varchar(25) NOT NULL,
	adresse varchar(255) NOT NULL,
	num_tel varchar(10),
	mail_contact varchar(10),
	);

CREATE TABLE schedule (
	day varchar(10) NOT NULL,
	status varchar(10) NOT NULL,
	time_open_am varchar(5) NOT NULL,
	time_close_am varchar(5) NOT NULL,
	time_open_pm varchar(5) NOT NULL,
	time_close_pm varchar(5) NOT NULL
);

INSERT INTO schedule (day, status, time_open_am, time_close_am, time_open_pm,time_close_pm)
VALUES
('Lundi', 'Ouvert', '00:00', '00:00', '00:00', '00:00'),
('Mardi', 'Ouvert', '00:00', '00:00', '00:00', '00:00'),
('Mercredi', 'Ouvert', '00:00', '00:00', '00:00', '00:00'),
('Jeudi', 'Ouvert', '00:00', '00:00', '00:00', '00:00'),
('Vendredi', 'Ouvert', '00:00', '00:00', '00:00', '00:00'),
('Samedi', 'Ouvert', '00:00', '00:00', '00:00', '00:00'),
('Dimanche', 'Fermé', '00:00', '00:00', '00:00', '00:00');

CREATE TABLE temoignage (
	id integer PRIMARY KEY AUTO_INCREMENT,
	nom varchar(10) NOT NULL,
	note integer NOT NULL,
	comment varchar(2000) NOT NULL
);