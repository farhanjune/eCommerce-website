<?php
session_start();
require('database.php');
include_once 'send-email.php';
$_SESSION['error'] = array();

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$queryUser = 'SELECT *
                FROM users
                where email = :email';
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $db->prepare($queryUser);
$statement -> bindValue(':email', $email);
$statement->execute();
$user = $statement->fetch();
$name = $user['fullName'];
$statement->closeCursor();

if (is_null($email)){
    $_SESSION['error']['email_error'] = 'Please enter an email address';
}
elseif (!$email){
    $_SESSION['error']['email_error'] = 'Invalid entry format';
}
elseif (is_null($user)){
    $_SESSION['error']['email_error'] = 'No account associated with that email address';
}

if (empty($_SESSION['error'])) {
    $code = rand(10000000, 99999999);
    $logo = file_get_contents('logo.txt');
    $message =
        '<p>Hello '.$name.',</p>
        <br><p>To reset your password, 
        please provide the following code when prompted.</p><br> 
        <p>Code: ' . $code .
        '<p>- BuyTech Team</p><br>
        <img src="'.$logo.'">';
    send_email($email, $name, 'Reset Password', $message);
    $_SESSION['email'] = $email;
    $queryCode = 'UPDATE users
                    SET userPassword = :code
                    WHERE email = :email';
    $statement = $db -> prepare($queryCode);
    $statement -> bindValue(':code', $code);
    $statement -> bindValue(':email', $email);
    $statement -> execute();
    $statement -> closeCursor();
    header("location: reset-password.php");
}
else{
    header("location: forgot-password.php");
}