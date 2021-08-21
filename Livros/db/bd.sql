drop database if exists funkos;

create database funkos;

use funkos;

create table users ( 
id int AUTO_INCREMENT PRIMARY KEY,
username varchar(255),
pw varchar(255)
);

create table series (
id int AUTO_INCREMENT PRIMARY KEY,
serie varchar(255)
);

create table funkos (
id int AUTO_INCREMENT PRIMARY KEY,
nome varchar(255),
serie_id int,
user_id int,
foreign key (serie_id) references series(id),
foreign key (user_id) references users(id)  
);