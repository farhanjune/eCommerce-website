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

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  
VALUES ('4', '1', 'Google Nest Audio', '79.99', 'images/product-4.jpeg', 'images/googlenest1.jpg', 'images/goognest2.jpg', 'Meet Nest Audio. Hear music the way it should sound, with crisp vocals and powerful bass that fill the room. Just say, Hey Google to play music or get help.
Features Designed to protect your privacy. Nest Audio comes with privacy built in. You can delete your Assistant history by saying, Hey Google, delete what I just said. Or to turn off the mic, just use the switch on the back.
Its all about sound. Just say, Hey Google, play some music, and crisp vocals and powerful bass fill the room. Nest Audio adapts to your environment and whatever you are listening to, so music sounds better.
Music here. Music there. Music everywhere. Create a home audio system that fills your home with sound.* Nest Audio works together with your other Nest speakers and displays, Chromecast-enabled devices, or compatible speakers.
Connect with family and friends. Use your Nest speakers as an intercom and chat from room to room. And make audio calls with Duo');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  
VALUES ('5', '5', 'Samsung QLED Monitor', '669.99', 'images/product-5.jpeg', 'images/qled1.jpg', 'images/qled2.jpg', 'Enhance your viewing experience with this 34-inch Samsung Thunderbolt monitor. Its 21:9 aspect ratio lets you multitask by browsing various windows and applications side-by-side, and the curved design reduces eyestrain while providing maximum immersion. This Samsung Thunderbolt monitor uses AMD FreeSync technology to deliver smooth frames for gaming and video playback.
3440 x 1440 resolution with 21:9 aspect ratio Delivers more contents on the screen for easier multitasking.
4 ms response time Ensures solid performance for precise gaming and video work. 100Hz refresh rate Provides smoother, silkier mouse sensitivity for enhanced productivity in any application.
34" LED monitor Ensures an accurate and lifelike picture.');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  
VALUES ('6', '6', 'DualShock 4 Controller', '59.99', 'images/ps4.png', 'images/dualshock41.jpg', 'images/dualshock42.jpg', 'Play your favorite video games with this PlayStation 4 DualShock controller. The microUSB port lets you keep it charged and ready to use, and the trigger buttons and controls deliver immediate response on even the most challenging games. This PlayStation 4 DualShock controller has an internal speaker for realistic close-up sound.');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  
VALUES ('7', '7', 'Fire TV Stick 4k', '49.99', 'images/firestick.jpeg', 'images/firestick1.jpg', 'images/firestick2.jpg', 'With more power, a lightning-fast processor, support for 802.11 ac Wi-Fi, and a new antenna design, Fire TV Stick 4K allows you to enjoy a more complete 4K Ultra HD streaming experience. Launch and control all your favorite movies and TV shows with the next-gen Alexa Voice Remote. New power, volume, and mute buttons let you control your TV, sound bar, and receiver.');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  
VALUES ('8', '1', 'Amazon Echo Dot(4th gen)', '49.99', 'images/echodot.jpeg', 'images/echodot1.jpg', 'images/echodot2.jpg', 'Meet the all-new Echo Dot with clock. Round out any room with Alexa. Our most popular smart speaker has a sleek, compact design that fits perfectly into small spaces. It delivers crisp vocals and balanced bass for full sound you can enjoy anywhere in your home. See the time, alarms, and timers on the LED display. Plus, tap the top to snooze an alarm.
');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  
VALUES ('9', '8', 'GoPro - HERO9', '399.99', 'images/gopro.jpeg', 'images/gopro1.jpg', 'images/gopro2.jpg', 'Record captivating vlogs and take brilliant photos with this black GoPro HERO9 camera. The high-quality CMOS sensor captures 5K video and up to 20.0MP images for stunning clarity, and support for a microSD card offers customizable storage space. This water-resistant GoPro HERO9 camera allows for use at the beach or pool.
');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  
VALUES ('10', '1', 'Ring Video Doorbell', '99.99', 'images/ringbell.jpeg', 'images/ring.jpg', 'images/ring2.jpg', '
With 1080p HD video and Two-Way Talk, see, hear and speak to people from your phone, tablet or select Alexa-enabled device.
Customize your motion zone settings to focus on areas you need to protect.
Runs on a built-in, rechargeable battery
Receive real-time mobile notifications when someone is at your door.
Monitor what matters most with infrared technology—even when it’s dark.');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  
VALUES ('11', '4', 'Macbook Air 13.3" - M1 chip', '949.99', 'images/macbook.jpeg', 'images/macbook1.jpg', 'images/macbook2.jpg', 'Apple’s thinnest and lightest notebook gets supercharged with the Apple M1 chip. Tackle your projects with the blazing-fast 8-core CPU. Take graphics-intensive apps and games to the next level with the 7-core GPU. And accelerate machine learning tasks with the 16-core Neural Engine. All with a silent, fanless design and the longest battery life ever — up to 18 hours.¹ MacBook Air. Still perfectly portable. Just a lot more powerful.');

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `listPrice`, `productImage`, `productImage2`, `productImage3`, `description`)  
VALUES ('12', '4', 'iPad Pro 11"(256 GB)', '899.00', 'images/ipad.jpeg', 'images/ipad1.jpg', 'images/ipad2.jpg', 'iPad Pro features the powerful Apple M1 chip with next-level performance and all-day battery life.³ The Liquid Retina display on the 11-inch iPad Pro is not only gorgeous, but super portable.¹ And a front camera with Center Stage keeps you in frame automatically during video calls. iPad Pro has pro cameras and a LiDAR Scanner for stunning photos, videos, and immersive AR. Thunderbolt for connecting to high-performance accessories.

Apple M1 chip for next-level performance

Stunning 11-inch Liquid Retina display¹ with ProMotion, True Tone, and P3 wide color

TrueDepth camera system featuring Ultra Wide front camera with Center Stage

12MP Wide camera, 10MP Ultra Wide camera, and LiDAR Scanner for immersive AR');
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
