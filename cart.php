<?php
	require('database.php');
	

function add_item($key, $quantity, $db) {
	
   

    if ($quantity < 1) return;

 

    // If item already exists in cart, update quantity

   for ($i = 1; $i <= $quantity; $i++) {
	   update_item($key, $db);
   }
	
	
}
function update_item($key, $db) {
	$username = $_SESSION['username'];
    $insert = "INSERT INTO cart (productID, userId) VALUES ('$key', '$username')";
	if ($db->query($insert) == TRUE) {
		  echo "New record created successfully";

	} else {
		echo "Error: " . $insert . "<br>" . $db->error;
	}
    $item = array(
        'productID' => $key,
        'userID' => $username,
    );

    $_SESSION['cart'][] = $item;
}
function get_subtotal($db) {

    $subtotal = 0;

    foreach ($_SESSION['cart'] as $item) {

        $subtotal += $item['total'];

    }

    $subtotal_f = number_format($subtotal, 2);

    return $subtotal_f;

}
?>