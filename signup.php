<?php
session_start();
$_SESSION['error'] = array();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="login-form.css">
    </head>
    <body>
        <div class="login-box">
            <img src="images/circle_logo.png" class="avatar" alt="Avatar Image">
            <h1>Sign Up!</h1>
            <form action="validate-signup.php" method="post">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" placeholder="Adam Smith">
                <?php
                if(isset($_SESSION['error']['name_error'])){
                    $error = $_SESSION['error']['name_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="email">Email</label>
                <input id="email" name="email" type="text" placeholder="example@mail.com">
                <?php
                if(isset($_SESSION['error']['email_error'])){
                    $error = $_SESSION['error']['email_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="phone">Phone number</label>
                <input id="phone" name="phone" type="text" placeholder="7771980340">
                <?php
                if(isset($_SESSION['error']['phone_error'])){
                    $error = $_SESSION['error']['phone_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="moneyman76">
                <?php
                if(isset($_SESSION['error']['username_error'])){
                    $error = $_SESSION['error']['username_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="password">Password</label>
                <input id="password" name="password" type="password">
                <?php
                if(isset($_SESSION['error']['password_error'])){
                    $error = $_SESSION['error']['password_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="confirm_password">Confirm password</label>
                <input id="confirm_password" name="confirm_password" type="password">
                <?php
                if(isset($_SESSION['error']['confirm_password_error'])){
                    $error = $_SESSION['error']['confirm_password_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="card_type">Card type</label>
                <select id="card_type" name="card_type" >
                    <option value="visa">Visa</option>
                    <option value="mastercard">MasterCard</option>
                    <option value="discover">Discover</option>
                </select>
                <label for="card_number">Card number</label>
                <input id="card_number" name="card_number" type="text">
                <?php
                if(isset($_SESSION['error']['card_number_error'])){
                    $error = $_SESSION['error']['card_number_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="card_security">Security code</label>
                <input id="card_security" name="card_security" type="text">
                <?php
                if(isset($_SESSION['error']['card_security_error'])){
                    $error = $_SESSION['error']['card_security_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="street">Street address</label>
                <input id="street" name="street" type="text">
                <label for="city">City</label>
                <input id="city" name="city" type="text">
                <label for="state">State</label>
                <input id="state" name="state" type="text">
                <label for="zip">Zip/postal code</label>
                <input id="zip" name="zip" type="text">
                <?php
                if(isset($_SESSION['error']['zip_error'])){
                    $error = $_SESSION['error']['zip_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </body>
</html>

<?php
unset($_SESSION['error'])
?>