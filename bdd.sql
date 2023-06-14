create database uml;
use uml;
create table utilisateur(
id int primary key auto_increment not null,
email varchar(50) not null,
password varchar(100) not null
)Engine=InnoDB;