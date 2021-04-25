DROP DATABASE IF EXISTS eCommerce_website;

CREATE DATABASE eCommerce_website;

USE eCommerce_website;

CREATE TABLE users (
                       `userId` INT NULL DEFAULT NULL AUTO_INCREMENT,
                       `userName` VARCHAR(255) UNIQUE NULL DEFAULT NULL,
                       `userPassword` VARCHAR(255) NULL DEFAULT NULL,
                       `fullName` VARCHAR(255) NULL DEFAULT NULL,
                       `email` VARCHAR(255) UNIQUE NULL DEFAULT NULL,
                       `phone` BIGINT(10) NULL DEFAULT NULL,
                       `cardType` VARCHAR(255) NULL DEFAULT NULL,
                       `cardNumber` VARCHAR(255) NULL DEFAULT NULL,
                       `cardSecurity` VARCHAR(255) NULL DEFAULT NULL,
                       `cardExp` DATETIME NULL DEFAULT NULL,
                       `cardName` VARCHAR(255) NULL DEFAULT NULL,
                       `lastFour` INT NULL DEFAULT NULL,
                       `street` VARCHAR(255) NULL DEFAULT NULL,
                       `city` VARCHAR(255) NULL DEFAULT NULL,
                       `userState` VARCHAR(255) NULL DEFAULT NULL,
                       `zip` INT NULL DEFAULT NULL,
                       PRIMARY KEY(`userId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (userName, userPassword, fullName, email, phone, cardType, cardNumber, cardSecurity, cardExp, cardName, lastFour, street, city, userState, zip) VALUES ('admin', '$2y$10$lf5ZC8kmk2uPrxgmlGs3yOHbK6YY.tCIUUcFaJAl9zB37uMQGonPq', 'Administrator', 'admin@buytech.com','1234567890', 'visa', '$2y$10$TWp5Wpwof95UpCXxnAt7qOp0.sCa1i9COf7.38Txxm8A.co3QGQMW', '$2y$10$sONOyF.rWfTCL2l57st/Zuan0Iwlo21pMJaMdZNWPgIHdBCAqC0RG', '2022-01-01 00:00:00', 'Administrator', '4444', '404 Tech Dr.', 'Internet City', 'State of the Art', '12345');

CREATE TABLE contacts (
                          `contactId` INT NULL DEFAULT NULL AUTO_INCREMENT,
                          `contactName` VARCHAR(255) NULL DEFAULT NULL,
                          `contactEmail` VARCHAR(255) NULL DEFAULT NULL,
                          `contactPhone` BIGINT(10) NULL DEFAULT NULL,
                          `contactComment` BLOB NULL DEFAULT NULL,
                          PRIMARY KEY(`contactId`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
                            `productID` int NULL DEFAULT 0,
                            `categoryID` int NULL DEFAULT NULL,
                            `productName` varchar(255) NULL DEFAULT NULL,
                            `listPrice` decimal(10,2) NULL DEFAULT NULL,
                            `productImage` varchar(200) NULL DEFAULT NULL,
                            `productImage2` varchar(200) NULL DEFAULT NULL,
                            `productImage3` varchar(200) NULL DEFAULT NULL,
                            `description` varchar(2000) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`) VALUES ('1', '2', 'Airpods Pros', '249.49', 'images/product-2-1.jpg', 'images/product-2-2.jpg', 'images/product-2-4.jpg', 'AirPods Pro are the only in-ear headphones with active noise cancellation that continually adapts to your ear and the fit of the ear tips. An outward-facing microphone detects external sound, the AirPods Pro then counter it with equal anti-noise, cancelling. Noise cancellation is continuously adjusted at 200 times per second for truly immersive sound.');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  VALUES ('2', '3', 'Apple Watch Series 5', '500.50', 'images/product-1.jpeg', 'images/product-2.jpeg', 'images/watch1.jpeg', 'Apple Watch SE has the same larger display size Retina display as Series 6, so you can see more at a glance. Advanced sensors to track all your fitness and workout goals. And powerful features to keep you healthy and safe. The Sleep app lets you set a bedtime routine and track your sleep. And you also get calls, messages, and music right on your wrist. It is a lot of watch for a lot less than you expected.');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  VALUES ('3', '4', 'Lenovo Yoga', '899.99', 'images/product-3.jpeg', 'images/Lenovo2.jpg', 'images/LenovoYoga1.jpg', 'Premium 9th Gen Intel Core processors
Enhanced graphics cards from NVIDIA let you excel at creating, playing & entertaining
Convenient 15.6 touchscreen with stunning visuals, 4K VESA display
Redesigned rotating soundbar and 2 additional speakers make everything from meetings to your favorite music crystal clear
Enhanced webcam security with TrueBlock Privacy Shutte');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`)  VALUES ('4', '1', 'Google Nest Audio', '79.99', 'images/product-4.jpeg');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`)  VALUES ('5', '5', 'Samsung QLED Monitor', '669.99', 'images/product-5.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`)  VALUES ('6', '6', 'DualShock 4 Controller', '59.99', 'images/ps4.png');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`)  VALUES ('7', '7', 'Fire TV Stick 4k', '49.99', 'images/firestick.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`)  VALUES ('8', '1', 'Amazon Echo Dot(4th gen)', '49.99', 'images/echodot.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`)  VALUES ('9', '8', 'GoPro - HERO9', '399.99', 'images/gopro.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`)  VALUES ('10', '1', 'Ring Video Doorbell', '99.99', 'images/ringbell.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`)  VALUES ('11', '4', 'Macbook Air 13.3" - M1 chip', '949.99', 'images/macbook.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`)  VALUES ('12', '4', 'iPad Pro 11"(256 GB)', '899.00', 'images/ipad.jpeg');

CREATE TABLE `categories` (
                              `categoryID` int NULL DEFAULT NULL,
                              `categoryName` varchar(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES ('1', 'Home & Security');
INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES ('2', 'Audio');
INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES ('3', 'Smartwatches');
INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES ('4', 'Laptops & Tablets');
INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES ('5', 'Displays');
INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES ('6', 'Gaming');
INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES ('7', 'Streaming');
INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES ('8', 'Cameras');

CREATE TABLE `cart` (
                        `productID` int NULL DEFAULT 0,
                        `quantity` int NULL DEFAULT NULL,
                        `userId` varchar(255) NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;