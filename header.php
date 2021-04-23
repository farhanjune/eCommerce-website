<?php
require('database.php');
if(!isset($_SESSION['cart'])) 
    { 
		$lifetime = 60 * 60 * 24 * 14;
		session_set_cookie_params($lifetime, '/');
        session_start(); 
    }
require_once('cart.php');
?>
<!DOCTYPE html>
<html>
    <div class="navbar">
        <div class="logo">
            <img src="images/logo.png" class="branding-logo">
        </div>
        <nav>
            <ul id="menu-items">
                <li><div class="menuhover"><a href="index.php">Home</a></div></li>
                <li>
                    <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">Categories</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="category_view.php?category=1" id="category_view">Home & Security</a>
                        <a href="category_view.php?category=2" id="category_view">Audio</a>
                        <a href="category_view.php?category=3" id="category_view">Smartwatches</a>
                        <a href="category_view.php?category=4" id="category_view">Laptops & Tablets</a>
                        <a href="category_view.php?category=5" id="category_view">Displays</a>
                        <a href="category_view.php?category=6" id="category_view">Gaming</a>
                        <a href="category_view.php?category=7" id="category_view">Streaming</a>
                        <a href="category_view.php?category=8" id="category_view">Cameras</a>
                    </div>
                    </div>
                </li>
                <li><div class="menuhover"><a href="about.php">About</a></div></li>
                <li><div class="menuhover"><a href="contact.php">Contact</a></div></li>
                <?php
                    if (!isset($_SESSION['flag'])) {
                        echo '<li><div class="menuhover"><a href="login-form.php">Login</a></div></li>';
                    }
                    else{
                        echo '<li><div class="menuhover"><a href="account.php">Account</a></div></li>';
                        echo '<li><div class="menuhover"><a href="logout.php">Logout</a></div></li>';
                    }
                ?>
            </ul>
        </nav>
        <a href="cart_view.php">
            <img src="images/cart.png" width="30px" height="30px">
        </a>
        <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>
    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
    </script>
</html>