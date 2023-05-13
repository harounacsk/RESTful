CREATE DATABASE IF NOT EXISTS testDB;
use testDB;
CREATE TABLE IF NOT EXISTS article(
   id INT NOT NULL AUTO_INCREMENT,
    name varchar(50),
    price float,
    backup boolean,
    PRIMARY KEY(id)
);