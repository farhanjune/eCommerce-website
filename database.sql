DROP DATABASE eCommerce_website;

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

CREATE TABLE contacts (
  `contactId` INT NULL DEFAULT NULL AUTO_INCREMENT,
  `contactName` VARCHAR(255) UNIQUE NULL DEFAULT NULL,
  `contactEmail` VARCHAR(255) UNIQUE NULL DEFAULT NULL,
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
  `productImage` varchar(200) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('1', '2', 'Airpods Pros', '249.49', 'images/product-2.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('2', '3', 'Apple Watch Series 5', '500.50', 'images/product-1.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('3', '4', 'Lenovo Yoga', '899.99', 'images/product-3.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('4', '1', 'Google Nest Audio', '79.99', 'images/product-4.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('5', '5', 'Samsung QLED Monitor', '669.99', 'images/product-5.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('6', '6', 'DualShock 4 Controller', '59.99', 'images/ps4.png');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('7', '7', 'Fire TV Stick 4k', '49.99', 'images/firestick.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('8', '1', 'Amazon Echo Dot(4th gen)', '49.99', 'images/echodot.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('9', '8', 'GoPro - HERO9', '399.99', 'images/gopro.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('10', '1', 'Ring Video Doorbell', '99.99', 'images/ringbell.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('11', '4', 'Macbook Air 13.3" - M1 chip', '949.99', 'images/macbook.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('12', '4', 'iPad Pro 11"(256 GB)', '899.00', 'images/ipad.jpeg');

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
