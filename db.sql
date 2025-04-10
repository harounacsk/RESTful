CREATE DATABASE IF NOT EXISTS restful_db;
use restful_db;
CREATE TABLE IF NOT EXISTS article(
   id INT NOT NULL AUTO_INCREMENT,
    name varchar(50),
    price float,
    backup boolean,
    PRIMARY KEY(id)
);

INSERT INTO article(name,price,backup) VALUES
('Computer',987.97,1),
('Laptop',1299.90,0);