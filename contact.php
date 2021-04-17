<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
    <script src="contact.js"></script>
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
                            echo '<li><a href="login-form.php">Login</a></li>';
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
                <div class="contact col-1">
                    <h1>Contact Us!</h1><br>
                    <h2>We'd love to hear from you.</h2><br>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="validate-contact.php">
            <h3>Please fill out this form</h3><br>
            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Enter your name"><span id="em1">*</span><br>
            <label for="email">Email:</label>
            <input type="text" id="email" placeholder="Enter your email"><span id="em2">*</span><br>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" placeholder="Enter your phone"><span id="em3">*</span><br>
            <label id="comment_label" for="comment">Comment:</label>
            <textarea id="comment" placeholder="Anything you want to tell us"></textarea><br>
            <input type="button" id="submit" value="Submit">
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