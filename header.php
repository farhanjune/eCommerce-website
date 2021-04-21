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
					<a href="cart_view.php">
                        <img src="images/cart.png" width="30px" height="30px">
                    </a>
					<img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
				</div>
				
</html>