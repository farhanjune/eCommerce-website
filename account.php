<?php
session_start();
if (!isset($_SESSION['flag'])){
    header('Location: login-form.php');
}
else{
    require('database.php');
    $username = $_SESSION['username'];
    $queryUser = 'SELECT *
                    FROM users
                    WHERE userName = :username';
    $statement = $db -> prepare($queryUser);
    $statement -> bindValue(':username', $username);
    $statement -> execute();
    $user = $statement -> fetch();
    $name = $user['fullName'];
    $email = $user['email'];
    $phone = $user['phone'];
    $card_type = $user['cardType'];
    $card_name = $user['cardName'];
    $month = date('m', strtotime($user['cardExp']));
    $year = date('Y', strtotime($user['cardExp']));
    $street = $user['street'];
    $city = $user['city'];
    $state = $user['userState'];
    $zip = $user['zip'];
    $statement -> closeCursor();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <meta charset="utf-8">
        <title>Account</title>
        <link rel="stylesheet" href="account.css">
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div id="header"></div><br />
				<script>
				$("#header").load("header.php");
				</script>
            </div>
        </div>
        <div class="account-box">
            <div class="small-container">
                <div class="row">
                        <div class="col-2">
                            <h1>Account Information</h1>
                            <p>
                                Please update any information and click save.
                            </p>
                        </div>
                    </div>
                <form action="validate-account.php" method="post">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" value="<?php echo $name; ?>"><br>
                    <?php
                    if(isset($_SESSION['error']['name_error'])){
                        $error = $_SESSION['error']['name_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" value="<?php echo $email; ?>"><br>
                    <?php
                    if(isset($_SESSION['error']['email_error'])){
                        $error = $_SESSION['error']['email_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="phone">Phone number</label>
                    <input id="phone" name="phone" type="text" value="<?php echo $phone; ?>"><br>
                    <?php
                    if(isset($_SESSION['error']['phone_error'])){
                        $error = $_SESSION['error']['phone_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" value="<?php echo $username; ?>"><br>
                    <?php
                    if(isset($_SESSION['error']['username_error'])){
                        $error = $_SESSION['error']['username_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="card_type">Card type</label>
                    <select id="card_type" name="card_type">
                        <option value="visa" <?php if($card_type == 'visa'){echo 'selected';} ?>>Visa</option>
                        <option value="mastercard" <?php if($card_type == 'mastercard'){echo 'selected';} ?>>MasterCard</option>
                        <option value="discover"<?php if($card_type == 'discover'){echo 'selected';} ?>>Discover</option>
                    </select><br>
                    <label for="card_name">Name on Card</label>
                    <input type="text" id="card_name" name="card_name" value="<?php if (isset($user)){echo $user['cardName'];}?>"><br>
                    <?php
                    if(isset($_SESSION['error']['card_name_error'])){
                        $error = $_SESSION['error']['card_name_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="card_number">Card number</label>
                    <input id="card_number" name="card_number" autocomplete="new-password" type="password" placeholder="New or leave blank"><br>
                    <?php
                    if(isset($_SESSION['error']['card_number_error'])){
                        $error = $_SESSION['error']['card_number_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="card_security">Security code</label>
                    <input id="card_security" name="card_security" type="password" autocomplete="off" placeholder="New or leave blank"><br>
                    <?php
                    if(isset($_SESSION['error']['card_security_error'])){
                        $error = $_SESSION['error']['card_security_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="month">Expiration month</label>
                    <select id="month" name="month">
                        <option value="01" <?php if($month == '01'){echo 'selected';} ?>>01</option>
                        <option value="02" <?php if($month == '02'){echo 'selected';} ?>>02</option>
                        <option value="03" <?php if($month == '03'){echo 'selected';} ?>>03</option>
                        <option value="04" <?php if($month == '04'){echo 'selected';} ?>>04</option>
                        <option value="05" <?php if($month == '05'){echo 'selected';} ?>>05</option>
                        <option value="06" <?php if($month == '06'){echo 'selected';} ?>>06</option>
                        <option value="07" <?php if($month == '07'){echo 'selected';} ?>>07</option>
                        <option value="08" <?php if($month == '08'){echo 'selected';} ?>>08</option>
                        <option value="09" <?php if($month == '09'){echo 'selected';} ?>>09</option>
                        <option value="10" <?php if($month == '10'){echo 'selected';} ?>>10</option>
                        <option value="11" <?php if($month == '11'){echo 'selected';} ?>>11</option>
                        <option value="12" <?php if($month == '12'){echo 'selected';} ?>>12</option>
                    </select>
                    <label for="year">Expiration year</label>
                    <select id="year" name="year">
                        <option value="2021" <?php if($year == '2021'){echo 'selected';} ?>>2021</option>
                        <option value="2022" <?php if($year == '2022'){echo 'selected';} ?>>2022</option>
                        <option value="2023" <?php if($year == '2023'){echo 'selected';} ?>>2023</option>
                        <option value="2024" <?php if($year == '2024'){echo 'selected';} ?>>2024</option>
                        <option value="2025" <?php if($year == '2025'){echo 'selected';} ?>>2025</option>
                        <option value="2026" <?php if($year == '2026'){echo 'selected';} ?>>2026</option>
                        <option value="2027" <?php if($year == '2027'){echo 'selected';} ?>>2027</option>
                        <option value="2028" <?php if($year == '2028'){echo 'selected';} ?>>2028</option>
                        <option value="2029" <?php if($year == '2029'){echo 'selected';} ?>>2029</option>
                        <option value="2030" <?php if($year == '2030'){echo 'selected';} ?>>2030</option>
                    </select><br>
                    <?php
                    if(isset($_SESSION['error']['exp_date_error'])){
                        $error = $_SESSION['error']['exp_date_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="street">Street address</label>
                    <input id="street" name="street" type="text" value="<?php if (isset($street)){ echo $street;} ?>"><br>
                    <?php
                    if(isset($_SESSION['error']['street_error'])){
                        $error = $_SESSION['error']['street_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="city">City</label>
                    <input id="city" name="city" type="text" value="<?php if (isset($city)){ echo $city;} ?>"><br>
                    <?php
                    if(isset($_SESSION['error']['city_error'])){
                        $error = $_SESSION['error']['city_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="state">State</label>
                    <input id="state" name="state" type="text" value="<?php if (isset($state)){ echo $state;} ?>"><br>
                    <?php
                    if(isset($_SESSION['error']['state_error'])){
                        $error = $_SESSION['error']['state_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <label for="zip">Zip/postal code</label>
                    <input id="zip" name="zip" type="number" value="<?php if (isset($zip)){ echo $zip;} ?>"><br>
                    <?php
                    if(isset($_SESSION['error']['zip_error'])){
                        $error = $_SESSION['error']['zip_error'];
                        echo "<span>$error</span>";
                    }
                    ?>
                    <input type="submit" value="Save">
                    <a href="change-password.php">Change password</a><br><br>
                </form>
            </div>
        </div>
        <div class="footer">
		<div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Links</h3>
                    <ul>
                        <li>Discounts</li>
                        <li>Blog</li>
                        <li>Policy</li>
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
                        <li>Twitter</li>
                        <li>Pinterest</li>
                    </ul>
                </div>
            </div>
				<p class="copyright">Copyright 2021 - BuyTech</p>
			</div>
		</div>
		<script>
			var menu_items = document.getElementById('menu-items');

			menu_items.style.maxHeight = "0px";

			function menutoggle() {
				if(menu_items.style.maxHeight == "0px"){
					menu_items.style.maxHeight = "200px";
				}else{
					menu_items.style.maxHeight = "0px";
				}
			}
		</script>
    </body>
</html>

<?php
unset($_SESSION['error']);
?>