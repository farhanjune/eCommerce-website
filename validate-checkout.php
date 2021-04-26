<?php
session_start();
require('database.php');
require 'send-email.php';
include_once 'numbers-validate.php';
$_SESSION['error'] = array();

$name = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
$street = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
$zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$card_name = filter_input(INPUT_POST, 'cardname', FILTER_SANITIZE_STRING);
$card_type = $_POST['card_type'];
$card_number = card_number_validate($_POST['cardnumber']);
$card_security = card_security_validate($_POST['cvv']);
$exp_date = new DateTime('01-'.$_POST['month'].'-'.$_POST['year']);
$month = $_POST['month'];
$year = $_POST['year'];
$today = new DateTime('now');

$queryUserByUsername = 'SELECT * FROM users WHERE userName = :userName';
$statement1 = $db -> prepare($queryUserByUsername);
$statement1 -> bindValue(':userName', $_SESSION['username']);
$statement1 -> execute();
$user = $statement1 -> fetch();
$statement1 -> closeCursor();

$queryCartItems = 'SELECT * FROM products 
                    WHERE productID IN (SELECT productID FROM cart WHERE
                                        userId = :userName)';

$statement2 = $db -> prepare($queryCartItems);
$statement2 -> bindValue(':userName', $_SESSION['username']);
$statement2 -> execute();
$items = $statement2 -> fetchAll();
$statement2 -> closeCursor();

$order_items = array();
$i = 0;
$totalcart = 0;
$username = $_SESSION['username'];
foreach ($items as $item){
    $order_items[$i] = array();
    $order_items[$i]['name'] = $item['productName'];
	$sql = "SELECT p.productID, COUNT(c.productID) AS quantity 
	FROM products p LEFT JOIN cart c ON (c.userId = ('$username')) 
	WHERE c.productID = p.productID
	GROUP BY productID";
    foreach ($db->query($sql) as $key => $qty){
        if ($item['productID'] == $qty['productID']){
            $order_items[$i]['quantity'] = $qty['quantity'];
        }
    }
    $order_items[$i]['price'] = $item['listPrice']*$order_items[$i]['quantity'];
    $i++;
}

/* NAME */
if(empty($_POST['fullname'])){
    $_SESSION['error']['name_error'] = 'Please enter a name';
}
elseif (!$name){
    $_SESSION['error']['name_error'] = 'Invalid entry format';
}

/* STREET */
if (empty($_POST['address'])){
    $_SESSION['error']['street_error'] = 'Please enter a street address';
}
elseif (!$street){
    $_SESSION['error']['street_error'] = 'Invalid entry format';
}

/* CITY */
if (empty($_POST['city'])){
    $_SESSION['error']['city_error'] = 'Please enter a city';
}
elseif (!$city){
    $_SESSION['error']['city_error'] = 'Invalid entry format';
}

/* STATE */
if (empty($_POST['state'])){
    $_SESSION['error']['state_error'] = 'Please enter a state';
}
elseif (!$state){
    $_SESSION['error']['state_error'] = 'Invalid entry format';
}

/* ZIP */
if (empty($_POST['zip'])){
    $_SESSION['error']['zip_error'] = 'Please enter a valid zip/postal code';
}
elseif (!$zip){
    $_SESSION['error']['zip_error'] = 'Invalid entry format';
}

/* EMAIL */
if (empty($_POST['email'])){
    $_SESSION['error']['email_error'] = 'Please enter an email address';
}
elseif (!$email){
    $_SESSION['error']['email_error'] = 'Invalid entry format';
}

/* CARD NAME */
if(empty($_POST['cardname'])){
    $_SESSION['error']['card_name_error'] = 'Please enter a name on card';
}
elseif (!$card_name){
    $_SESSION['error']['card_name_error'] = 'Invalid entry format';
}

/* CARD NUMBER */
if (empty($_POST['cardnumber'])){
    $_SESSION['error']['card_number_error'] = 'Please enter a card number';
}
elseif (!$card_number){
    $_SESSION['error']['card_number_error'] = 'Invalid entry format';
}

/* CARD SECURITY */
if (empty($_POST['cvv'])){
    $_SESSION['error']['card_security_error'] = 'Please enter a security code';
}
elseif (!$card_security){
    $_SESSION['error']['card_security_error'] = 'Invalid entry format';
}

/* EXP DATE */
if($exp_date < $today){
    $_SESSION['error']['exp_date_error'] = 'Invalid expiration date';
}

if (empty($_SESSION['error'])) {
    $total = 0;
    $list = '';
    for ($i = 0; $i < sizeof($order_items); $i++){
        $list .= '<br>'.$order_items[$i]['name'].
            ', '.$order_items[$i]['quantity'].', $'.
        $order_items[$i]['price'];
        $total += $order_items[$i]['price'];
    }


    $logo = file_get_contents('logo.txt');
    $message =
        '<p>Hello '.$name.',</p>
        <br><p>Thank you for shopping with us! Below is a copy of
        your order.</p> 
        <p>Order Information</p>
        <p>Shipping Address: <br>'.$street.'<br>'.$city.'<br>'.$state.', '.$zip.'</p>
        <p>Name on card: ' .$card_name.
        '<br>Card type: ' .ucwords($card_type).
        '<br>Card number: ************'.substr($_POST['cardnumber'], strlen($_POST['cardnumber'])-4).
        '<br>Expiration date: '.$month.'/'.$year.
        '<br>Order items: '.$list.
        '<br>Total: $'.$total.
        '<br><p>- BuyTech Team</p><br>
        <img src="'.$logo.'">';
    send_email($email, $name, 'Order Confirmation', $message);
    header("location: confirmation.php");
}
else{
    header("location: checkout.php");
}
