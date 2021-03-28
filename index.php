<?php
$con = mysqli_connect("localhost","your_localhost_database_user","your_localhost_database_password","your_localhost_database_db");
$con = mysqli_connect('localhost', 'root', '',’products’);
$con = mysqli_connect('localhost', 'root', '',’cart’);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$cartid = $_POST['id'];

$sql = "INSERT INTO 'cart_list' ('cartid') VALUES ('cartid')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Added to cart";
}

?>