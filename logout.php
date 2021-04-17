<?php
session_start();
unset($_SESSION['flag']);
unset($_SESSION['username']);
unset($_SESSION['error']);
unset($_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Logout</title>
        <link rel="stylesheet" href="login-form.css">
    </head>
    <body>
        <div>
            <h1>You've been logged out!</h1>
            <a href="login-form.php">Log back in</a>
        </div>
    </body>
</html>
