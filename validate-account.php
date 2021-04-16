<?php
session_start();
require('database.php');

$username = filter_input(INPUT_POST, 'username');
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

if(is_null($name) || $name == false){
    $_SESSION['error']['name_error'] = 'Please enter a name';
}

if (is_null($email) || $email == false){
    $_SESSION['error']['email_error'] = 'Please enter an email address';
}

if (is_null($phone) || $phone == false){
    $_SESSION['error']['phone_error'] = 'Please enter a phone number';
}

if (empty($_SESSION['error'])) {
    $queryRest = 'UPDATE user
                    SET username = :username
                    SET name = :name
                    SET email = :email
                    SET phone = :phone
                    SET cardType = :card_type
                    SET cardNumber = :card_number
                    SET cardSecurity = :card_security
                    SET street = :street
                    SET city = :city
                    SET state = :state
                    SET zip = :zip
                    WHERE username = ' . $_SESSION['username'];
    $statement = $db -> prepare($queryRest);
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
    $_SESSION['username'] = $username;
}
else{
    header("location: account.php");
}

?>