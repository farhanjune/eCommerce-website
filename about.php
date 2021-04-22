<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <meta charset="UTF-8">
        <title>About</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="about.css">
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div id="header"></div><br />
				<script>
				$("#header").load("header.php");
				</script>
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
                    <h3>Farhan is a second-year undergraduate pursuing computer science at the University of Georgia. He is involved in many
                    organizations and loves working with big data and analytics.    
                    </h3><br><br>
                    <p>
                        Aside from being a full time student, he loves boxing and trading.
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
                    <h3>Sol is a 4th year Computer Science student at the University of Georgia.
						He grew up in Norcross, Georgia and worked a few years after graduating
						highschool before attending the University.
                    </h3><br><br>
                    <p>
                        Besides programming, he ballroom dances, hikes, and recently picked up
						running on trails in the beginning of 2021!
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