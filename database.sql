CREATE DATABASE usersdb;
use usersdb;

CREATE TABLE role (
    roleid INT AUTO_INCREMENT PRIMARY KEY,
    namee VARCHAR(255) NOT NULL
);
CREATE TABLE users (
    usersid INT AUTO_INCREMENT PRIMARY KEY,
    usersname VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    roleid int NOT NULL,
    FOREIGN KEY (roleid) REFERENCES role(roleid)
);