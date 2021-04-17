<?php
session_start();
require('database.php');
$_SESSION['error'] = array();
$_SESSION['success'];

$old_password = filter_input(INPUT_POST, 'old_password', FILTER_SANITIZE_STRING);
$new_password = filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_STRING);
$confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

$queryUserPassword = 'SELECT userPassword
                FROM users
                WHERE userName = ' . $_SESSION['username'];
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement1 = $db -> prepare($queryUserPassword);
$statement1 -> execute();
$existing_password = $statement1 -> fetch();
$password_match =
$statement1 -> closeCursor();

if (is_null($old_password)){
    $_SESSION['error']['old_password_error'] = 'Please enter your current password';
}
elseif (!$old_password){
    $_SESSION['error']['old_password_error'] = 'Invalid entry format';
}
elseif (!password_verify($old_password, $existing_password)){
    $_SESSION['error']['old_password_error'] = 'Incorrect password';
}

if (is_null($new_password)){
    $_SESSION['error']['new_password_error'] = 'Please enter a new password';
}
elseif (!$new_password){
    $_SESSION['error']['new_password_error'] = 'Invalid entry format';
}

if (is_null($confirm_password)){
    $_SESSION['error']['confirm_password_error'] = 'Please re-enter your new password';
}
elseif (!$confirm_password){
    $_SESSION['error']['new_password_error'] = 'Invalid entry format';
}

if ($new_password !== $confirm_password){
    $_SESSION['error']['confirm_password_error'] = 'New passwords do not match';
}

if (empty($_SESSION['error'])){
    $queryPasswordChange = 'UPDATE users
                                SET userPassword = :new_password
                                WHERE userName = :username';
    $statement2 = $db -> prepare($queryPasswordChange);
    $statement2 -> bindValue(':new_password', password_hash($new_password, PASSWORD_DEFAULT));
    $statement2 -> bindValue(':username', $_SESSION['username']);
    $statement2 -> execute();
    $statement2 -> closeCursor();
    $_SESSION['success']['message'] = 'Your password has been changed!';
    $_SESSION['success']['link'] = 'index';
    header("location: success.php");
}
else{
    header("location: change-password.php");
}
