<?php

	$sql="SELECT productID, productName, listPrice, categoryID FROM products"; 

function add_item($key, $quantity) {

    global $products;

    if ($quantity < 1) return;

 

    // If item already exists in cart, update quantity

    if (isset($_SESSION['cart'][$key])) {

        $quantity += $_SESSION['cart'][$key]['quantity'];

        update_item($key, $quantity);

        return;

    }
	$cost = "SELECT listPrice FROM products WHERE 'productID' = $key";

    $total = (double)$cost * (int)$quantity;

    $item = array(

        'name' => $products[$key]['name'],

        'cost' => $cost,

        'qty'  => $quantity,

        'total' => $total

    );

    $_SESSION['cart'][$key] = $item;

}
function update_item($key, $quantity) {

    $quantity = (int) $quantity;

    if (isset($_SESSION['cart'][$key])) {

        if ($quantity <= 0) {

            unset($_SESSION['cart'][$key]);

        } else {

            $_SESSION['cart'][$key]['qty'] = $quantity;

            $total = (double)$_SESSION['cart'][$key]['cost'] *
                     $_SESSION['cart'][$key]['qty'];

            $_SESSION['cart'][$key]['total'] = $total;

        }

    }

}
function get_subtotal() {

    $subtotal = 0;

    foreach ($_SESSION['cart'] as $item) {

        $subtotal += $item['total'];

    }

    $subtotal_f = number_format($subtotal, 2);

    return $subtotal_f;

}
?>