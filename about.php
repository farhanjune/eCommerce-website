<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>About</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="about.css">
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
                    <div class="col-2">
                        <img class="about image" src="images/about.png">
                    </div>
                    <div class="about col-2">
                        <h1>About Us</h1><br>
                        <h2>Here at BuyTech, we've come a long way in order to provide
                            the best products the technology world has to offer.</h2><br>
                        <h3>Learn about our journey.</h3><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-container">
            <div class="row">
                <div class="col-1 top">
                    <h2>Our Story</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <img src="images/uga.jpg" id="img1">
                    <img src="images/startup.jpg" id="img3">
                </div>
                <div class="col-3">
                    <p class="timeline">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </p>
                    <p class="timeline">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </p>
                    <p class="timeline">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </p>
                    <p class="timeline">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="col-3">
                    <img src="images/class.jpg" id="img2">
                    <img src="images/tech.png" id="img4">
                </div>
            </div>
            <div class="row">
                <div class="col-1 middle">
                    <h2>The Dream Team</h2>
                </div>
            </div>
            <div class="row personal">
                <div class="col-2 portrait">
                    <img src="images/idris.png">
                </div>
                <div class="col-2">
                    <h2>Farhan Juneja</h2><br>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </h3><br><br>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>
            <div class="row personal">
                <div class="col-2 portrait">
                    <img src="images/pedro.webp">
                </div>
                <div class="col-2">
                    <h2>Frank González</h2><br>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </h3><br><br>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>
            <div class="row personal">
                <div class="col-2 portrait" >
                    <img src="images/dev.jpg">
                </div>
                <div class="col-2">
                    <h2>Sol P</h2><br>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </h3><br><br>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>
            <div class="row personal">
                <div class="col-2 portrait">
                    <img src="images/matthew.jpg">
                </div>
                <div class="col-2">
                    <h2>Nahiyaan Sheikh</h2><br>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </h3><br><br>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>
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