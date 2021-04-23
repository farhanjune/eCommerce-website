<?php
session_start();
require('database.php');
include_once 'numbers-validate.php';
$_SESSION['error'] = array();
$_SESSION['success'] = array();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$phone = phone_validate($_POST['phone']);
$card_type = $_POST['card_type'];
$card_number = card_number_validate($_POST['card_number']);
$card_name = filter_input(INPUT_POST, 'card_name', FILTER_SANITIZE_STRING);
$card_security = card_security_validate($_POST['card_security']);
$exp_date = new DateTime('01-'.$_POST['month'].'-'.$_POST['year']);
$today = new DateTime('now');
$street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
$zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);

$queryUser = 'SELECT * FROM users WHERE userName = :username';
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement1 = $db -> prepare($queryUser);
$statement1 -> bindValue(':username', $_SESSION['username']);
$statement1 -> execute();
$user = $statement1 -> fetch();
$statement1 -> closeCursor();

/* USERNAME */
if (empty($_POST['username'])){
    $_SESSION['error']['username_error'] = 'Please enter a username';
}
elseif (!$username){
    $_SESSION['error']['username_error'] = 'Invalid entry format';
}
elseif ($username !== $user['userName']){
    $query = 'SELECT * FROM users WHERE userName = :username';
    $statement = $db -> prepare($query);
    $statement -> bindValue(':username', $username);
    $statement -> execute();
    $user_by_username = $statement -> fetch();
    if ($user_by_username){
        $_SESSION['error']['username_error'] = 'That username is taken';
    }
}

/* NAME */
if(empty($_POST['name'])){
    $_SESSION['error']['name_error'] = 'Please enter a name';
}
elseif (!$name){
    $_SESSION['error']['name_error'] = 'Invalid entry format';
}

/* EMAIL */
if (empty($_POST['email'])){
    $_SESSION['error']['email_error'] = 'Please enter an email address';
}
elseif (!$email){
    $_SESSION['error']['email_error'] = 'Invalid entry format';
}
elseif ($email !== $user['email']){
    $query = 'SELECT * FROM users WHERE email = :email';
    $statement = $db -> prepare($query);
    $statement -> bindValue(':email', $email);
    $statement ->execute();
    $user_by_email = $statement -> fetch();
    if ($user_by_email){
        $_SESSION['error']['email_error'] = 'That email is taken';
    }
}

/* PHONE */
if (empty($_POST['phone'])){
    $_SESSION['error']['phone_error'] = 'Please enter a phone number';
}
elseif (!$phone){
    $_SESSION['error']['phone_error'] = 'Invalid entry format';
}

/* CARD NUMBER */
if (!$card_number){
    $_SESSION['error']['card_number_error'] = 'Invalid entry format';
}
elseif ($card_number == 'null'){
    $card_number = null;
}

/* CARD NAME */
if(empty($_POST['card_name'])){
    $_SESSION['error']['card_name_error'] = 'Please enter a name on card';
}
elseif (!$card_name){
    $_SESSION['error']['card_name_error'] = 'Invalid entry format';
}

/* CARD SECURITY */
if (!$card_security){
    $_SESSION['error']['card_security_error'] = 'Invalid entry format';
}
elseif ($card_security == 'null'){
    $card_security = null;
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
    $queryUpdateAccount = 'UPDATE users
                            SET userName = :new_username,
                            fullName = :name,
                            email = :email,
                            phone = :phone,
                            cardType = :card_type,
                            cardName = :card_name,
                            cardExp = :exp_date,
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
    $statement3 -> bindValue(':card_name', $card_name);
    $statement3 -> bindValue(':exp_date', $exp_date -> format('Y-m-d H:i:s'));
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
                                    SET lastFour = :last_four
                                    WHERE userName = ' . $_SESSION['username'];
        $statement4 = $db -> prepare($queryUpdateCardNumber);
        $statement4 -> bindValue(':card_number', password_hash($card_number, PASSWORD_DEFAULT));
        $statement4 -> bindValue(':last_four', substr($_POST['card_number'],
            strlen($_POST['card_number'])-4));
        $statement4 -> execute();
        $statement4 -> closeCursor();
    }

    if (isset($card_security)){
        $queryUpdateCardSecurity = 'UPDATE users 
                                    SET cardSecurity = :card_security
                                    WHERE userName = ' . $_SESSION['username'];
        $statement5 = $db -> prepare($queryUpdateCardSecurity);
        $statement5 -> bindValue(':card_security', password_hash($card_security, PASSWORD_DEFAULT));
        $statement5 -> execute();
        $statement5 -> closeCursor();
    }
    header("location: success.php");
}
else{
    header("location: account.php");
}

