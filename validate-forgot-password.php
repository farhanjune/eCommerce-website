<?php
session_start();
require('database.php');
include_once 'send-email.php';
$_SESSION['error'] = array();
$_SESSION['success'] = array();

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
    $code = rand(1000, 9999);
    $message =
        '<p>Hello ' . $name . ',</p>
        <br><p>To reset your password, 
        please provide the following code in the prompt at the link below.</p><br> 
        <p>Code: ' . $code . '</p>
        <p>Link: <a href="http://localhost/eCommerce-website/reset-password.php">Click here</a><p><br>
        <p>- BuyTech Team</p>';
    send_email($email, $name, 'Reset Password', $message);

    $queryCode = 'UPDATE users
                    SET userPassword = :code
                    WHERE email = :email';
    $statement = $db -> prepare($queryCode);
    $statement -> bindValue(':code', $code);
    $statement -> bindValue(':email', $email);
    $statement -> execute();
    $statement -> closeCursor();
    $_SESSION['success']['message'] = 'Instructions to reset your password have been sent to your email.';
    $_SESSION['success']['link'] = 'index';
    header("location: success.php");
}
else{
    header("location: forgot-password.php");
}