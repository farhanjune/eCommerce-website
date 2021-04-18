<?php
session_start();
require('database.php');
$_SESSION['error'] = array();
$_SESSION['success'] = array();

$code = filter_input(INPUT_POST, 'code', FILTER_VALIDATE_INT);
$new_password = filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_STRING);
$confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

$queryUser = 'SELECT *
                FROM users
                WHERE userPassword = :code';
$statement1 = $db -> prepare($queryUser);
$statement1 -> bindValue(':code', $code);
$statement1 -> execute();
$user = $statement1 -> fetch();
$existing_code = $user['userPassword'];
$username = $user['userName'];
$statement1 -> closeCursor();

if (empty($_POST['code'])){
    $_SESSION['error']['code_error'] = 'Please enter your code';
}
elseif (!$code){
    $_SESSION['error']['code_error'] = 'Invalid entry format';
}
elseif (is_null($existing_code)){
    $_SESSION['error']['code_error'] = 'Incorrect code';
}

if (empty($_POST['new_password'])){
    $_SESSION['error']['new_password_error'] = 'Please enter a new password';
}
elseif (!$new_password){
    $_SESSION['error']['new_password_error'] = 'Invalid entry format';
}

if (empty($_POST['confirm_password'])){
    $_SESSION['error']['confirm_password_error'] = 'Please re-enter your new password';
}
elseif (!$confirm_password){
    $_SESSION['error']['confirm_password_error'] = 'Invalid entry format';
}

if ($new_password !== $confirm_password){
    $_SESSION['error']['confirm_password_error'] = 'Passwords do not match';
}

if (empty($_SESSION['error'])){
    $queryPasswordReset = 'UPDATE users
                            SET userPassword = :new_password
                            WHERE userName = :username';
    $statement2 = $db -> prepare($queryPasswordReset);
    $statement2 -> bindValue(':new_password', password_hash($new_password, PASSWORD_DEFAULT));
    $statement2 -> bindValue(':username', $username);
    $statement2 -> execute();
    $statement2 -> closeCursor();
    $_SESSION['success']['message'] = 'Your password has been reset!';
    $_SESSION['success']['link'] = 'index';
    header("location: success.php");
}
else{
    header("location: reset-password.php");
}
