<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
`<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="login-form.css">
</head>
<body>
<div class="login-box">
    <img src="images/circle_logo.png" class="avatar" alt="Avatar Image">
    <h1>Reset Password</h1>
    <form action="validate-reset-password.php" method="post">
        <label for="code">Code</label>
        <input id="code" name="code" type="code" placeholder="Enter code">
        <?php
        if(isset($_SESSION['error']['code_error'])){
            $error = $_SESSION['error']['code_error'];
            echo "<span>$error</span>";
        }
        ?>
        <label for="new_password">New password</label>
        <input id="new_password" name="new_password" type="password" placeholder="Enter new password">
        <?php
        if(isset($_SESSION['error']['new_password_error'])){
            $error = $_SESSION['error']['new_password_error'];
            echo "<span>$error</span>";
        }
        ?>
        <label for="confirm_password">Confirm new password</label>
        <input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm new password">
        <?php
        if(isset($_SESSION['error']['confirm_password_error'])){
            $error = $_SESSION['error']['confirm_password_error'];
            echo "<span>$error</span>";
        }
        ?>
        <input type="submit" value="Submit">
        <a href="forgot-password.php">Didn't get a code?</a>
    </form>
</div>
</body>
</html>

<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
?>