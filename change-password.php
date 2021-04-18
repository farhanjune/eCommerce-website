<?php
session_start();
if (!isset($_SESSION['flag'])){
    header('Location: login-form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Change Password</title>
        <link rel="stylesheet" href="login-form.css">
    </head>
    <body>
        <div class="login-box">
            <h1>Change your password</h1>
            <form action="validate-change-password.php" method="post">
                <label for="current_password">Current password</label>
                <input id="current_password" autocomplete="new-password" name="current_password" type="password">
                <?php
                if(isset($_SESSION['error']['current_password_error'])){
                    $error = $_SESSION['error']['current_password_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="new_password">New password</label>
                <input id="new_password" name="new_password" type="password">
                <?php
                if(isset($_SESSION['error']['new_password_error'])){
                    $error = $_SESSION['error']['new_password_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="confirm_password">Confirm new password</label>
                <input id="confirm_password" name="confirm_password" type="password">
                <?php
                if(isset($_SESSION['error']['confirm_password_error'])){
                    $error = $_SESSION['error']['confirm_password_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <input type="submit" name="submit_button" value="Submit">
                <a href="forgot-password.php">Forgot your password?</a><br>
            </form>
        </div>
    </body>
</html>

<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
?>


