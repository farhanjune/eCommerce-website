<?php
session_start();
if (!isset($_SESSION['flag'])){
    header('Location: login-form.html');
}
else{
    require('database.php');
    $username = $_SESSION['username'];
    $queryUser = 'SELECT *
                FROM users
                WHERE username = :username';
    $statement1 = $db->prepare($queryUser);
    $statement1->bindValue(':username', $username);
    $statement1->execute();
    $user = $statement1->fetch();
    $password = $user['password'];
    $name = $user['name'];
    $email = $user['email'];
    $phone = $user['phone'];
    $card_type = $user['card_type'];
    $card_number = $user['card_number'];
    $card_security = $user['card_security'];
    $street = $user['street'];
    $city = $user['city'];
    $state = $user['state'];
    $zip = $user['zip'];
    $statement1->closeCursor();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Account</title>
        <link rel="stylesheet" href="login-form.css">
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <img src="images/logo.png" class="branding-logo">
                    </div>
                    <nav>
                        <ul id="menu-items">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <?php
                            if (!isset($_SESSION['flag'])) {
                                echo '<li><a href="login-form.html">Login</a></li>';
                            }
                            else{
                                echo '<li><a href="account.php">Account</a></li>';
                                echo '<li><a href="logout.php">Logout</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                    <a href="cart.html">
                        <img src="images/cart.png" width="30px" height="30px">
                    </a>
                    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
                </div>
                <div class="row">
                    <div class="col-2">
                        <h1>Account Information</h1>
                        <p>
                            Please update any information and click save.
                        </p>
                    </div>
                    <div class="col-2">
                        <img src="images/image1.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="login-box">
            <img src="images/circle_logo.png" class="avatar" alt="Avatar Image">
            <form action="validate-account.php" method="post">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" value="<?php echo $name; ?>">
                <?php
                if(isset($_SESSION['error']['name_error'])){
                    $error = $_SESSION['error']['name_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="email">Email</label>
                <input id="email" name="email" type="text" value="<?php echo $email; ?>">
                <?php
                if(isset($_SESSION['error']['email_error'])){
                    $error = $_SESSION['error']['email_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="phone">Phone number</label>
                <input id="phone" name="phone" type="text" value="<?php echo $phone; ?>">
                <?php
                if(isset($_SESSION['error']['phone_error'])){
                    $error = $_SESSION['error']['phone_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" value="<?php echo $username; ?>">
                <?php
                if(isset($_SESSION['error']['username_error'])){
                    $error = $_SESSION['error']['username_error'];
                    echo "<span>$error</span>";
                }
                ?>
                <label for="card_type">Card type</label>
                <select id="card_type" name="card_type" >
                    <option value="visa" <?php if($card_type == 'visa'){echo 'selected';} ?>>Visa</option>
                    <option value="mastercard" <?php if($card_type == 'mastercard'){echo 'selected';} ?>>MasterCard</option>
                    <option value="discover"<?php if($card_type == 'discover'){echo 'selected';} ?>>Discover</option>
                </select>
                <label for="card_number">Card number</label>
                <input id="card_number" name="card_number" type="text">
                <label for="card_security">Security code</label>
                <input id="card_security" name="card_security" type="text">
                <label for="street">Street address</label>
                <input id="street" name="street" type="text" value="<?php if (isset($street)){ echo $street;} ?>">
                <label for="city">City</label>
                <input id="city" name="city" type="text" value="<?php if (isset($city)){ echo $city;} ?>">
                <label for="state">State</label>
                <input id="state" name="state" type="text" value="<?php if (isset($state)){ echo $state;} ?>">
                <label for="zip">Zip/postal code</label>
                <input id="zip" name="zip" type="number" value="<?php if (isset($zip)){ echo $zip;} ?>">
                <input type="submit" value="Save">
                <a href="">Change password</a><br>
            </form>
        </div>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Useful Links</h3>
                        <ul>
                            <li>Coupons</li>
                            <li>Blog Post</li>
                            <li>Return Policy</li>
                        </ul>
                    </div>
                    <div class="footer-col-2">
                        <img src="images/logo.png">
                        <p>Our mission is to make electronics accessible to everyone.</p>
                    </div>
                    <div class="footer-col-3">
                        <h3>Follow Us</h3>
                        <ul>
                            <li>Facebook</li>
                            <li>Instagram</li>
                            <li>Twitter</li>
                            <li>YouTube</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <p class="copyright">Copyright 2021 - BuyTech</p>
            </div>
        </div>
    </body>
</html>

<?php
unset($_SESSION['error'])
?>