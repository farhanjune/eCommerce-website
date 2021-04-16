<?php
session_start();
require('database.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if ($username == NULL){

}

$query = 'SELECT * FROM users 
            WHERE username = ' . $username .
            ' AND password = ' . $password;

$data = $db -> query($query);

if ($data -> rowCount() > 0){

    $_SESSION['flag'] = true;
    $_SESSION['username'] = $username;
    header('Location: index.php');
}
else{
    header('Location: login-form.html');
}

?>
