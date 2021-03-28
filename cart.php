<?php
$conn = mysqli_connect("localhost","your_localhost_database_user","your_localhost_database_password","your_localhost_database_db");
$conncart = mysqli_connect("localhost","your_localhost_database_user","your_localhost_database_password","your_localhost_database_db");
$conn = mysqli_connect('localhost', 'root', '',’products’);
$conncart = mysqli_connect('localhost', 'root', '',’cart’);
if ($conn->connect_error) || ($conncart->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
}
$sqlp = "SELECT name, img, price, quantity, id FROM tbl_products";
$presult = $conn->query($sqlp);
$sql = "SELECT id FROM cart_list";
$result = $conncart->query($sql);

$records = mysqli_query($conncart, "select * from cart_list"