<?php
session_start();
require('database.php');
require 'send-email.php';
include_once 'numbers-validate.php';
$_SESSION['error'] = array();

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
                    WHERE productID IN (SELECT * FROM cart WHERE
                                        userName = :userName)';
$statement2 = $db -> prepare($queryCartItems);
$statement2 -> bindValue(':userName', $_SESSION['username']);
$statement2 -> execute();
$items = $statement2 -> fetchAll();
$statement2 -> closeCursor();

$queryQuantities = 'SELECT * FROM cart WHERE
                                        userName = :userName';
$statement3 = $db -> prepare($queryQuantities);
$statement3 -> bindValue(':userName', $_SESSION['username']);
$statement3 -> execute();
$quantities = $statement3 -> fetchAll();
$statement3 -> closeCursor();

$order_items = array();
$i = 0;
foreach ($items as $item){
    $order_items[$i] = array();
    $order_items[$i]['name'] = $item['productName'];
    foreach ($quantities as $quantity){
        if ($item['productID'] == $quantity['productID']){
            $order_items[$i]['quantity'] = $quantity['quantity'];
        }
    }
    $order_items[$i]['price'] = $item['listPrice']*$order_items[$i]['quantity'];
    $i++;
}

/* CARD NUMBER */
if ($card_number == 'null'){
    $_SESSION['error']['card_number_error'] = 'Please enter a card number';
}
elseif (!$card_number){
    $_SESSION['error']['card_number_error'] = 'Invalid entry format';
}

/* CARD SECURITY */
if ($card_security == 'null'){
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
        '<p>Hello '.$user['fullName'].',</p>
        <br><p>Thank you for shopping with us! Below is a copy of
        your order.</p> 
        <p>Order Information</p> 
        <p>Name on card: ' . $user['cardName'].
        '<br>Card type: ' . ucwords($user['cardType']).
        '<br>Card number: ************' . $user['lastFour'].
        '<br>Expiration date: '.$month.'/'.$year.
        '<br>Order items: '.$list.
        '<br>Total: $'.$total.
        '<br><p>- BuyTech Team</p><br>
        <img src="'.$logo.'">';
    send_email($user['email'], $user['fullName'], 'Order Confirmation', $message);
    header("location: confirmation.php");
}
else{
    header("location: checkout.php");
}

?>