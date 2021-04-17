<?php
session_start();
require('database.php');
$_SESSION['error'] = array();

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$queryUser = 'SELECT *
                FROM users
                WHERE userName = :username';
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $db -> prepare($queryUser);
$statement -> bindValue(':username', $username);
$statement -> execute();
$user = $statement -> fetch();
$existing_username = $user['userName'];
$password_match = password_verify($password, $user['userPassword']);

if (is_null($username)){
    $_SESSION['error']['username_error'] = 'Please enter a username';
}
elseif (!$username){
    $_SESSION['error']['username_error'] = 'Invalid entry format';
}
elseif (is_null($existing_username)){
    $_SESSION['error']['username_error'] = 'Incorrect username';
}

if (is_null($password) || $password == false){
    $_SESSION['error']['password_error'] = 'Please enter a password';
}
elseif (!$password){
    $_SESSION['error']['username_error'] = 'Invalid entry format';
}
elseif (isset($existing_username) && !$password_match){
    $_SESSION['error']['password_error'] = 'Incorrect password';
}

if (empty($_SESSION['error'])){
    $_SESSION['flag'] = true;
    $_SESSION['username'] = $username;
    header('Location: index.php');
}
else{
    header('Location: login-form.php');
}
