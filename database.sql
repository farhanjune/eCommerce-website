CREATE DATABASE `database` DEFAULT CHARACTER SET utf8mb4;


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
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('1', '2', 'Airpods Pros', '249.49', 'product-2.jpeg');
INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`) VALUES ('2', '3', 'Apple Watch Series 5', '500.50', 'product-1.jpeg');
CREATE TABLE `categories` (
  `categoryID` int NULL DEFAULT NULL,
  `categoryName` varchar(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cart` (
  `productID` int NULL DEFAULT 0,
  `quantity` int NULL DEFAULT NULL,
  `userId` varchar(200) NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
