<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div id="header"></div><br />
				<script>
				$("#header").load("header.php");
				</script>
            </div>
            <div class="row">
                <div class="contact col-1">
                    <h1>Contact Us!</h1><br>
                    <h2>We'd love to hear from you.</h2><br>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="validate-contact.php" method="post">
            <h3>Please fill out this form</h3><br>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <?php
            if(isset($_SESSION['error']['name_error'])){
                $error = $_SESSION['error']['name_error'];
                echo "<span>$error</span><br>";
            }
            ?>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Enter your email"><br>
            <?php
            if(isset($_SESSION['error']['email_error'])){
                $error = $_SESSION['error']['email_error'];
                echo "<span>$error</span><br>";
            }
            ?>
            <label for="phone">Phone number:</label>
            <input type="text" name="phone" id="phone" placeholder="Enter your phone">
            <?php
            if(isset($_SESSION['error']['phone_error'])){
                $error = $_SESSION['error']['phone_error'];
                echo "<span>$error</span><br>";
            }
            ?>
            <label id="comment_label" for="comment">Comment:</label>
            <textarea name="comment" id="comment" placeholder="Anything you want to tell us"></textarea><br>
            <?php
            if(isset($_SESSION['error']['comment_error'])){
                $error = $_SESSION['error']['comment_error'];
                echo "<span>$error</span><br>";
            }
            ?>
            <input type="submit" id="submit" value="Submit">
            <input type="reset" id="clear" value="Clear">
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