<?php
session_start();
require('database.php');
$_SESSION['error'] = array();
$_SESSION['success'] = array();

function int_or_null($var){
    if (is_integer($var)){
        return $var;
    }
    elseif (empty($var)){
        return 'null';
    }
    else{
        return false;
    }
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
$card_type = $_POST['card_type'];
$card_number = int_or_null(filter_input(INPUT_POST, 'card_number',
    FILTER_VALIDATE_REGEXP, '^(\s{0}|\d{16})$'));
$card_security = int_or_null(filter_input(INPUT_POST, 'card_security',
    FILTER_VALIDATE_REGEXP, '^(\s{0}|\d{3,4})$'));
$street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
$zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);

$queryUserByUsername = 'SELECT * FROM users WHERE userName = :username';
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement1 = $db -> prepare($queryUserByUsername);
$statement1 -> bindValue(':username', $username);
$statement1 -> execute();
$userWithUsername = $statement1 -> fetch();
$same_username = ($userWithUsername['userName'] == $_SESSION['username']);
$same_username_email = $userWithUsername['email'];
$statement1 -> closeCursor();

$queryUserByEmail = 'SELECT * FROM users WHERE email = :email';
$statement2 = $db -> prepare($queryUserByEmail);
$statement2 -> bindValue(':email', $email);
$statement2 -> execute();
$userWithEmail = $statement2 -> fetch();
$same_email = ($userWithEmail['email'] == $same_username_email);
$statement2 -> closeCursor();

if (is_null($username)){
    $_SESSION['error']['username_error'] = 'Please enter a username';
}
elseif (!$username){
    $_SESSION['error']['username_error'] = 'Invalid entry format';
}
elseif (!$same_username){
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
elseif (!$same_email){
    $_SESSION['error']['email_error'] = 'That email is taken';
}

if (is_null($phone)){
    $_SESSION['error']['phone_error'] = 'Please enter a phone number';
}
elseif (!$phone){
    $_SESSION['error']['phone_error'] = 'Invalid entry format';
}

if (!$card_number){
    $_SESSION['error']['card_number_error'] = 'Invalid entry format';
}
elseif ($card_number == 'null'){
    $card_number = null;
}

if (!$card_security){
    $_SESSION['error']['card_security_error'] = 'Invalid entry format';
}
elseif ($card_security == 'null'){
    $card_security = null;
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

if (empty($_SESSION['error'])) {
    $queryUpdateAccount = 'UPDATE users
                            SET userName = :new_username,
                            fullName = :name,
                            email = :email,
                            phone = :phone,
                            cardType = :card_type,
                            street = :street,
                            city = :city,
                            userState = :state,
                            zip = :zip
                            WHERE userName = :old_username';
    $statement3 = $db -> prepare($queryUpdateAccount);
    $statement3 -> bindValue(':new_username', $username);
    $statement3 -> bindValue(':old_username', $_SESSION['username']);
    $statement3 -> bindValue(':name', $name);
    $statement3 -> bindValue(':email', $email);
    $statement3 -> bindValue(':phone', $phone);
    $statement3 -> bindValue(':card_type', $card_type);
    $statement3 -> bindValue(':street', $street);
    $statement3 -> bindValue(':city', $city);
    $statement3 -> bindValue(':state', $state);
    $statement3 -> bindValue(':zip', $zip);
    $statement3 -> execute();
    $statement3 -> closeCursor();
    $_SESSION['username'] = $username;
    $_SESSION['success']['message'] = 'Your account information has been updated!';
    $_SESSION['success']['link'] = 'index';

    if (isset($card_number)){
        $queryUpdateCardNumber = 'UPDATE users 
                                    SET cardNumber = :card_number
                                    WHERE userName = ' . $_SESSION['username'];
        $statement4 = $db -> prepare($queryUpdateCardNumber);
        $statement4 -> bindValue(':card_number', $card_number);
        $statement4 -> execute();
        $statement4 -> closeCursor();
    }

    if (isset($card_security)){
        $queryUpdateCardSecurity = 'UPDATE users 
                                    SET cardSecurity = :card_security
                                    WHERE userName = ' . $_SESSION['username'];
        $statement5 = $db -> prepare($queryUpdateCardSecurity);
        $statement5 -> bindValue(':card_security', $card_security);
        $statement5 -> execute();
        $statement5 -> closeCursor();
    }

    header("location: success.php");
}
else{
    header("location: account.php");
}

