CREATE DATABASE `database` DEFAULT CHARACTER SET utf8mb4;


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `productID` int NULL DEFAULT NULL AUTO_INCREMENT,
  `categoryID` int NULL DEFAULT NULL,
  `productCode` varchar(10) NULL DEFAULT NULL,
  `productName` varchar(255) NULL DEFAULT NULL,
  `listPrice` decimal(10,2) NULL DEFAULT NULL,
  `productImage` varchar(200) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `products` (`productID`, `categoryID`, `productCode`, `productName`, `listPrice`, `productImage`) VALUES ('4', '10', 'airpods', 'Airpods Pro', '249.00', 'airpods.jpg');
INSERT INTO `products` (`productID`, `categoryID`, `productCode`, `productName`, `listPrice`, `productImage`) VALUES ('5', '9', 'applewatch5', 'Apple Watch Series 5', '279.99', 'product-1.jpeg');
CREATE TABLE `categories` (
  `categoryID` int NULL DEFAULT NULL PRIMARY KEY AUTO_INCREMENT,
  `categoryName` varchar(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cart` (
  `productID` int NULL DEFAULT NULL,
  `userId` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `cart` (`productID`, `quantity) VALUES ('4', '10');

