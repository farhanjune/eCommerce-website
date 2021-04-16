<?php
session_start();
require('database.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$confirm_password = filter_input(INPUT_POST, 'confirm_password');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
$card_type = filter_input(INPUT_POST, 'card_type');
$card_number = filter_input(INPUT_POST, 'card_number', FILTER_VALIDATE_INT);
$card_security = filter_input(INPUT_POST, 'card_security', FILTER_VALIDATE_INT);
$street = filter_input(INPUT_POST, 'street');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);

$query = 'SELECT * FROM users WHERE username = ' . $username;
$data = $db -> query($query);

if (is_null($username) || $username == false){
    $_SESSION['error']['username_error'] = 'Please enter a username';
}
elseif ($data -> rowCount() > 0){
    $_SESSION['error']['username_error'] = 'That username is taken';
}

if (is_null($password) || $password == false){
    $_SESSION['error']['password_error'] = 'Please enter a password';
}

if (is_null($confirm_password) || $confirm_password == false){
    $_SESSION['error']['confirm_password_error'] = 'Please re-enter your password';
}

if ($password !== $confirm_password){
    $_SESSION['error']['confirm_password_error'] = "Passwords don't match";
}

if(is_null($name) || $name == false){
    $_SESSION['error']['name_error'] = 'Please enter a name';
}

if (is_null($email) || $email == false){
    $_SESSION['error']['email_error'] = 'Please enter an email address';
}

if (is_null($phone) || $phone == false){
    $_SESSION['error']['phone_error'] = 'Please enter a phone number';
}

if ($card_number == false){
    $_SESSION['error']['card_number_error'] = 'Please enter a valid card number or leave blank';
}

if ($card_security == false){
    $_SESSION['error']['card_security_error'] = 'Please enter a valid security code or leave blank';
}

if ($zip == false){
    $_SESSION['error']['zip_error'] = 'Please enter a valid zip/postal code or leave blank';
}

if (empty($_SESSION['error'])){
    $queryNewUser = 'INSERT INTO users
                        (username, password, name, email, phone, 
                        cardType, cardNumber, cardSecurity, street,
                        city, state, zip)
                        VALUES (:username, :password, :name, :email, :phone, 
                        :card_type, :card_number, :card_security, :street,
                        :city, :state, :zip)';
    $statement = $db -> prepare($queryNewUser);
    $statement -> bindValue(':username', $username);
    $statement -> bindValue(':name', $name);
    $statement -> bindValue(':email', $email);
    $statement -> bindValue(':phone', $phone);
    $statement -> bindValue(':card_type', $card_type);
    $statement -> bindValue(':card_number', $card_number);
    $statement -> bindValue(':card_security', $card_security);
    $statement -> bindValue(':street', $street);
    $statement -> bindValue(':city', $city);
    $statement -> bindValue(':state', $state);
    $statement -> bindValue(':zip', $zip);
    $statement -> execute();
    $statement -> closeCursor();
    header("location: login-form.html");

}
else{
    header("location: signup.php");
}

?>