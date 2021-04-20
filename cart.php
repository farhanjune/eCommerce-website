<?php
	$dsn = 'mysql:host=localhost;dbname=database';
	$username = 'root';
	$password = '';
	if (empty($_SESSION['cart'])) {
		$lifetime = 60 * 60 * 24 * 14;
		session_set_cookie_params($lifetime, '/');
		session_start();
	}
	$dbo = new PDO($dsn, $username, $password);
	

function add_item($key, $quantity, $dbo) {
	
   

    if ($quantity < 1) return;

 

    // If item already exists in cart, update quantity

   for ($i = 1; $i <= $quantity; $i++) {
	   update_item($key, $dbo);
   }
	
	
}
function update_item($key, $dbo) {
	$username = $_SESSION['username'];
    $insert = "INSERT INTO cart (productID, userId) VALUES ('$key', '$username')";
	if ($dbo->query($insert) == TRUE) {
		  echo "New record created successfully";

	} else {
		echo "Error: " . $insert . "<br>" . $dbo->error;
	}
    $item = array(
        'productID' => $key,
        'userID' => $username,
    );

    $_SESSION['cart'][] = $item;
}
function get_subtotal($dbo) {

    $subtotal = 0;

    foreach ($_SESSION['cart'] as $item) {

        $subtotal += $item['total'];

    }

    $subtotal_f = number_format($subtotal, 2);

    return $subtotal_f;

}
?>