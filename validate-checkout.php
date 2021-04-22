<?php

session_start();
require('database.php');
include_once 'numbers-validate.php';
$_SESSION['error'] = array();
$_SESSION['success'] = array();
/*
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$state = state_validate($_POST('state');
$zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);

$ccname = card_name_validate();
$ccnumber = card_number_validate();
$expmonth = 
$expyear = 
$cvv = 
*/

$card_name = filter_input(INPUT_POST, 'cardname', FILTER_SANITIZE_STRING);
$card_type = $_POST['card_type'];
$card_number = card_number_validate($_POST['cardnumber']);
$card_security = card_security_validate($_POST['cvv']);
$exp_date = new DateTime('01-'.$_POST['month'].'-'.$_POST['year']);
$today = new DateTime('now');


$queryUserByEmail = 'SELECT * FROM users WHERE userName = :userName';
$statement2 = $db -> prepare($queryUserByEmail);
$statement2 -> bindValue(':userName', $_SESSION['username']);
$statement2 -> execute();
$userByEmail = $statement2 -> fetch();
$statement2 -> closeCursor();


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
    $queryNewUser = 'INSERT INTO users
                        (userName, userPassword, fullName, email, phone, 
                        cardType, cardNumber, cardSecurity, lastFour, cardExp, street,
                        city, userState, zip)
                        VALUES (:username, :password, :name, :email, :phone, 
                        :card_type, :card_number, :card_security, :last_four, :exp_date, :street,
                        :city, :state, :zip)';
    $statement3 = $db->prepare($queryNewUser);
    $statement3 -> bindValue(':username', $username);
    $statement3 -> bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
    $statement3 -> bindValue(':name', $name);
    $statement3 -> bindValue(':email', $email);
    $statement3 -> bindValue(':phone', $phone);
    $statement3 -> bindValue(':card_type', $card_type);
    $statement3 -> bindValue(':card_number', password_hash($card_number, PASSWORD_DEFAULT));
    $statement3 -> bindValue(':card_security', password_hash($card_security, PASSWORD_DEFAULT));
    $statement3 -> bindValue(':last_four', substr($_POST['card_number'], strlen($_POST['card_number'])-4));
    $statement3 -> bindValue(':exp_date', $exp_date -> format('Y-m-d H:i:s'));
    $statement3 -> bindValue(':street', $street);
    $statement3 -> bindValue(':city', $city);
    $statement3 -> bindValue(':state', $state);
    $statement3 -> bindValue(':zip', $zip);
    $statement3 -> execute();
    $statement3 -> closeCursor();
    $_SESSION['success']['message'] = 'Your account has been set up!';
    $_SESSION['success']['link'] = 'login';
    header("location: confirmation.php");
}
else{
    header("location: checkout.php");
}

?>