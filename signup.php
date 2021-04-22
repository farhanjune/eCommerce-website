<?php
session_start();
if (isset($_SESSION['flag'])){
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="signup.css">
    </head>
    <body>
        <div class="signup-box">
            <!---<img src="images/circle_logo.png" class="avatar" alt="Avatar Image">--->
			<a href="index.php">
			<img src="images/circle_logo.png" class="avatar" alt="Avatar Image">
			</a>
            <h1>Sign Up!</h1>
            <form action="validate-signup.php" method="post">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" placeholder="Adam Smith"><br>
                <?php
                if(isset($_SESSION['error']['name_error'])){
                    $error = $_SESSION['error']['name_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="email">Email</label>
                <input id="email" name="email" type="text" placeholder="example@mail.com"><br>
                <?php
                if(isset($_SESSION['error']['email_error'])){
                    $error = $_SESSION['error']['email_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="phone">Phone number</label>
                <input id="phone" name="phone" type="text" placeholder="7771980340"><br>
                <?php
                if(isset($_SESSION['error']['phone_error'])){
                    $error = $_SESSION['error']['phone_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="moneyman76"><br>
                <?php
                if(isset($_SESSION['error']['username_error'])){
                    $error = $_SESSION['error']['username_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="password">Password</label>
                <input id="password" name="password" type="password"><br>
                <?php
                if(isset($_SESSION['error']['password_error'])){
                    $error = $_SESSION['error']['password_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="confirm_password">Confirm password</label>
                <input id="confirm_password" name="confirm_password" type="password"><br>
                <?php
                if(isset($_SESSION['error']['confirm_password_error'])){
                    $error = $_SESSION['error']['confirm_password_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="card_type">Card type</label>
                <select id="card_type" name="card_type">
                    <option value="visa">Visa</option>
                    <option value="mastercard">MasterCard</option>
                    <option value="discover">Discover</option>
                </select><br>
                <label for="card_number" id="card_typelabel">Card number</label>
                <input id="card_number" name="card_number" type="text"><br>
                <?php
                if(isset($_SESSION['error']['card_number_error'])){
                    $error = $_SESSION['error']['card_number_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="card_name" id="card_typelabel">Name on card</label>
                <input id="card_name" name="card_name" type="text"><br>
                <?php
                if(isset($_SESSION['error']['card_name_error'])){
                    $error = $_SESSION['error']['card_name_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="card_security">Security code</label>
                <input id="card_security" name="card_security" type="text"><br>
                <?php
                if(isset($_SESSION['error']['card_security_error'])){
                    $error = $_SESSION['error']['card_security_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="month" id="monthlabel">Expiration month</label>
                <select id="month" name="month">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12" >12</option>
                </select>
                <label for="year" id="yearlabel">Expiration year</label>
                <select id="year" name="year">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
                <?php
                if(isset($_SESSION['error']['exp_date_error'])){
                    $error = $_SESSION['error']['exp_date_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="street">Street address</label>
                <input id="street" name="street" type="text"><br>
                <?php
                if(isset($_SESSION['error']['street_error'])){
                    $error = $_SESSION['error']['street_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="city">City</label>
                <input id="city" name="city" type="text"><br>
                <?php
                if(isset($_SESSION['error']['city_error'])){
                    $error = $_SESSION['error']['city_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="state">State</label>
                <input id="state" name="state" type="text"><br>
                <?php
                if(isset($_SESSION['error']['state_error'])){
                    $error = $_SESSION['error']['state_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <label for="zip">Zip/postal code</label>
                <input id="zip" name="zip" type="text"><br>
                <?php
                if(isset($_SESSION['error']['zip_error'])){
                    $error = $_SESSION['error']['zip_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </body>
</html>

<?php
unset($_SESSION['error']);
?>