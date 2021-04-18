DROP DATABASE eCommerce_website;

CREATE DATABASE eCommerce_website;

USE eCommerce_website;

CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT,
	userName VARCHAR(255) UNIQUE NOT NULL,
    userPassword VARCHAR(255) NOT NULL,
    fullName VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone BIGINT(10) NOT NULL,
    cardType VARCHAR(255) NOT NULL,
    cardNumber VARCHAR(255) NOT NULL,
    cardSecurity VARCHAR(255) NOT NULL,
    cardExp DATETIME NOT NULL,
    street VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    userState VARCHAR(255) NOT NULL,
    zip INT NOT NULL,
    PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;