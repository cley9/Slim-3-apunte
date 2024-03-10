create database tech;

create table user(
    id int(11) auto_increment,
    name varchar(50) not null, 
    email varchar(50) not null, 
    password varchar(90) not null, 
    rol varchar(50) not null, 
    primary key(id)
);


CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL, 
    apellido VARCHAR(90) NOT NULL, 
    edad INT NOT NULL, 
    fecha_de_nacimiento DATE NOT NULL, 
    dni INT NOT NULL
) ENGINE=InnoDB;


-- mysql 8 script

create table user(
    id int(11) auto_increment primary key,
    name varchar(50) not null, 
    email varchar(50) not null, 
    password varchar(90) not null, 
    rol varchar(50) not null, 
) ENGINE=InnoDB;

CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL, 
    apellido VARCHAR(90) NOT NULL, 
    edad int(9) NOT NULL, 
    fecha_de_nacimiento DATE NOT NULL, 
    dni varchar(9) NOT NULL
)ENGINE=InnoDB;