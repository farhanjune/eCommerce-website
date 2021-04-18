DROP DATABASE eCommerce_website;

CREATE DATABASE eCommerce_website;

USE eCommerce_website;

CREATE TABLE users (
    userId INT NOT NULL AUTO_INCREMENT,
	userName VARCHAR(255) UNIQUE NOT NULL,
    userPassword VARCHAR(255) NOT NULL,
    fullName VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone BIGINT(10) NOT NULL,
    cardType VARCHAR(255) NOT NULL,
    cardNumber VARCHAR(255) NOT NULL,
    cardSecurity VARCHAR(255) NOT NULL,
    cardExp DATETIME NOT NULL,
    lastFour INT NOT NULL,
    street VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    userState VARCHAR(255) NOT NULL,
    zip INT NOT NULL,
    PRIMARY KEY(userId)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE contacts (
   contactId INT NOT NULL AUTO_INCREMENT,
   contactName VARCHAR(255) UNIQUE NOT NULL,
   contactEmail VARCHAR(255) UNIQUE NOT NULL,
   contactPhone BIGINT(10) NOT NULL,
   contactComment BLOB NOT NULL,
   PRIMARY KEY(contactId)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

