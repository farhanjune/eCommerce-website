<?php
session_start();
require('database.php');
$_SESSION['error'] = array();
$_SESSION['success'] = array();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_VALIDATE_REGEXP, '/^([a-z.\s\-]+)$/');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
$card_type = filter_input(INPUT_POST, 'card_type');
$card_number = filter_input(INPUT_POST, 'card_number', FILTER_VALIDATE_INT);
$card_security = filter_input(INPUT_POST, 'card_security', FILTER_VALIDATE_INT);
$street = filter_input(INPUT_POST, 'street', FILTER_VALIDATE_REGEXP, '/^([0-9a-z.\s\-]+)$/');
$city = filter_input(INPUT_POST, 'city', FILTER_VALIDATE_REGEXP, '/^([a-z.\s\-]+)$/');
$state = filter_input(INPUT_POST, 'state', FILTER_VALIDATE_REGEXP, '/^([a-z.\s\-]+)$/');
$zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);

$queryUserByUsername = 'SELECT * FROM users WHERE userName = :username';
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement1 = $db -> prepare($queryUserByUsername);
$statement1 -> bindValue(':username', $username);
$statement1 -> execute();
$user = $statement1 -> fetch();
$existing_username = $user['userName'];
$statement1 -> closeCursor();

$queryUserByEmail = 'SELECT * FROM users WHERE email = :email';
$statement2 = $db -> prepare($queryUserByEmail);
$statement2 -> bindValue(':email', $email);
$statement2 -> execute();
$user = $statement2 -> fetch();
$existing_email = $user['email'];
$statement2 -> closeCursor();

if (is_null($username)){
    $_SESSION['error']['username_error'] = 'Please enter a username';
}
elseif (!$username){
    $_SESSION['error']['username_error'] = 'Invalid entry format';
}
elseif (isset($existing_username)){
    $_SESSION['error']['username_error'] = 'That username is taken';
}

if(is_null($name)){
    $_SESSION['error']['name_error'] = 'Please enter a name';
}
elseif (!$name){
    $_SESSION['error']['name_error'] = 'Invalid entry format';
}

if (is_null($email)){
    $_SESSION['error']['email_error'] = 'Please enter an email address';
}
elseif (!$email){
    $_SESSION['error']['email_error'] = 'Invalid entry format';
}
elseif (isset($existing_email)){
    $_SESSION['error']['email_error'] = 'That email is taken';
}

if (is_null($phone)){
    $_SESSION['error']['phone_error'] = 'Please enter a phone number';
}
elseif (!$phone){
    $_SESSION['error']['phone_error'] = 'Invalid entry format';
}

if (is_null($card_number)){
    $_SESSION['error']['card_number_error'] = 'Please enter a valid card number';
}
elseif (!$card_number){
    $_SESSION['error']['card_number_error'] = 'Invalid entry format';
}

if (is_null($card_security)){
    $_SESSION['error']['card_security_error'] = 'Please enter a valid security code';
}
elseif (!$card_security){
    $_SESSION['error']['card_security_error'] = 'Invalid entry format';
}

if (is_null($street)){
    $_SESSION['error']['street_error'] = 'Please enter a street address';
}
elseif (!$street){
    $_SESSION['error']['street_error'] = 'Invalid entry format';
}

if (is_null($city)){
    $_SESSION['error']['city_error'] = 'Please enter a city';
}
elseif (!$city){
    $_SESSION['error']['city_error'] = 'Invalid entry format';
}

if (is_null($state)){
    $_SESSION['error']['state_error'] = 'Please enter a state';
}
elseif (!$state){
    $_SESSION['error']['state_error'] = 'Invalid entry format';
}

if (is_null($zip)){
    $_SESSION['error']['zip_error'] = 'Please enter a valid zip/postal code';
}
elseif (!$zip){
    $_SESSION['error']['zip_error'] = 'Invalid entry format';
}


if (empty($_SESSION['error'])){
    $queryNewUser = 'INSERT INTO users
                        (userName, userPassword, fullName, email, phone, 
                        cardType, cardNumber, cardSecurity, street,
                        city, userState, zip)
                        VALUES (:username, :password, :name, :email, :phone, 
                        :card_type, :card_number, :card_security, :street,
                        :city, :state, :zip)';
    $statement = $db -> prepare($queryNewUser);
    $statement -> bindValue(':username', $username);
    $statement -> bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
    $statement -> bindValue(':name', $name);
    $statement -> bindValue(':email', $email);
    $statement -> bindValue(':phone', $phone);
    $statement -> bindValue(':card_type', $card_type);
    $statement -> bindValue(':card_number', password_hash($card_number, PASSWORD_DEFAULT));
    $statement -> bindValue(':card_security', password_hash($card_security, PASSWORD_DEFAULT));
    $statement -> bindValue(':street', $street);
    $statement -> bindValue(':city', $city);
    $statement -> bindValue(':state', $state);
    $statement -> bindValue(':zip', $zip);
    if ($statement -> execute()) {
        $statement->closeCursor();
        $_SESSION['success']['message'] = 'Your account has been set up!'. password_hash($password, PASSWORD_DEFAULT);
        $_SESSION['success']['link'] = 'login';
        header("location: success.php");
    }
    else{
        header("location: database-error.php");
    }
}
else{
    header("location: signup.php");
}
