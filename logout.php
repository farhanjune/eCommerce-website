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
        <link rel="stylesheet" href="logout-form.css">
    </head>
    <body>
        <div>
            <h1>You've been logged out!</h1>
            <h2><a href="login-form.php">Log back in</a></h2>
        </div>
    </body>
</html>
