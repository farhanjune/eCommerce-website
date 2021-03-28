
CREATE DATABASE IF NOT EXISTS `products` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `products`;

DROP TABLE IF EXISTS 'tbl_products';
CREATE TABLE IF NOT EXISTS 'tbl_products' (
'name' varchar(80) NOT NULL,
'img' varchar(200) NOT NULL,
'price' double(100,2) NOT NULL,
'quantity'int(100) NOT NULL,
'id' int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO 'tbl_products' (name, img, price, quantity, id)
VALUES ('Apple Watch Series 5', 'images/product-1.jpeg', '300.00', '20', '1');

DROP TABLE IF EXISTS 'cart_list';
CREATE TABLE IF NOT EXISTS 'cart_list' (
'cartid' int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE 'tbl_contact'
ADD PRIMARY KEY ('id');


ALTER TABLE 'tbl_contact'
MODIFY 'id' int(100) NOT NULL AUTO_INCREMENT;