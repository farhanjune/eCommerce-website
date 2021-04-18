<?php
session_start();
require('database.php');
include_once 'numbers-validate.php';
$_SESSION['error'] = array();
$_SESSION['success'] = array();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = phone_validate($_POST['phone']);
$card_type = $_POST['card_type'];
$card_number = card_number_validate($_POST['card_number']);
$card_security = card_security_validate($_POST['card_security']);
$exp_date = new DateTime('01-'.$_POST['month'].'-'.$_POST['year']);
$today = new DateTime('now');
$street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
$zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);

$queryUserByUsername = 'SELECT * FROM users WHERE userName = :username';
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement1 = $db -> prepare($queryUserByUsername);
$statement1 -> bindValue(':username', $username);
$statement1 -> execute();
$userByUsername = $statement1 -> fetch();
$statement1 -> closeCursor();

$queryUserByEmail = 'SELECT * FROM users WHERE email = :email';
$statement2 = $db -> prepare($queryUserByEmail);
$statement2 -> bindValue(':email', $email);
$statement2 -> execute();
$userByEmail = $statement2 -> fetch();
$statement2 -> closeCursor();

/* USERNAME */
if (empty($_POST['username'])){
    $_SESSION['error']['username_error'] = 'Please enter a username';
}
elseif (!$username){
    $_SESSION['error']['username_error'] = 'Invalid entry format';
}
elseif ($userByUsername){
    $_SESSION['error']['username_error'] = 'That username is taken';
}

/* PASSWORD */
if (empty($_POST['password'])){
    $_SESSION['error']['username_error'] = 'Please enter a password';
}
elseif (!$password){
    $_SESSION['error']['username_error'] = 'Invalid entry format';
}

/* CONFIRM PASSWORD */
if (empty($_POST['confirm_password'])){
    $_SESSION['error']['confirm_password_error'] = 'Please re-enter your password';
}
elseif (!$confirm_password){
    $_SESSION['error']['confirm_password_error'] = 'Invalid entry format';
}
elseif ($password !== $confirm_password){
    $_SESSION['error']['confirm_password_error'] = 'Passwords do not match';
}

/* NAME */
if(empty($_POST['name'])){
    $_SESSION['error']['name_error'] = 'Please enter a name';
}
elseif (!$name){
    $_SESSION['error']['name_error'] = 'Invalid entry format';
}

/* EMAIL */
if (is_null($email)){
    $_SESSION['error']['email_error'] = 'Please enter an email address';
}
elseif (empty($_POST['email'])){
    $_SESSION['error']['email_error'] = 'Invalid entry format';
}
elseif ($userByEmail){
    $_SESSION['error']['email_error'] = 'That email is taken';
}

/* PHONE */
if (empty($_POST['phone'])){
    $_SESSION['error']['phone_error'] = 'Please enter a phone number';
}
elseif (!$phone){
    $_SESSION['error']['phone_error'] = 'Invalid entry format';
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

/* STREET */
if (empty($_POST['street'])){
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
    header("location: success.php");
}
else{
    header("location: signup.php");
}
