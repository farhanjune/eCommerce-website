<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BuyTech | Electronics</title>
		<link rel="stylesheet" href="style.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
						<h1>Welcome to BuyTech!</h1>
						<p>
							Enjoy a safe, convenient shopping experience
						</p>
						<a href="#" class="btn">Explore Now &#8594;</a>
					</div>
					<div class="col-2">
						<img src="images/image1.png">
					</div>
				</div>
			</div>
		</div>
		<div class="categories">
			<div class="small-container">
				<div class="row">
					<div class="col-3">
						<img src="images/category-1.png">
					</div>
					<div class="col-3">
						<img src="images/category-2.png">
					</div>
					<div class="col-3">
						<img src="images/category-3.png">
					</div>
				</div>
			</div>
		</div>
		<div class="small-container">
			<h2 class="title">Featured Products</h2>
			<div class="row">
				<div class="col-4">
				<a href="apple-watch.html">
					<img src="images/product-1.jpeg">
					<h4>Apple Watch Series 5</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star-o fa-fw"></i>
					</div>
					<p>$279.99</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="1" value="1">
					</form>
				</div>
				<div class="col-4">
					<a href="airpods-pro.html">
						<img src="images/product-2.jpeg">
					</a>
					<h4>Airpods Pro</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star-half-o fa-fw"></i>
					</div>
					<p>$249.00</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="2" value="2">
					</form>
				</div>
				<div class="col-4">
					<img src="images/product-3.jpeg">
					<h4>Lenovo YOGA</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star-o fa-fw"></i>
                        <i class="fa fa-star-o fa-fw"></i>
					</div>
					<p>$899.99</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="3" value="3">
					</form>
				</div>
				<div class="col-4">
					<img src="images/product-4.jpeg">
					<h4>Google Nest Audio</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star-o fa-fw"></i>
					</div>
					<p>$79.99</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="4" value="4">
					</form>
				</div>
			</div>
			<h2 class="title">Latest Products</h2>
			<div class="row">
				<div class="col-4">
					<img src="images/product-5.jpeg">
					<h4>Samsung QLED Monitor</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star-half-o fa-fw"></i>
					</div>
					<p>$669.99</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="6" value="6">
					</form>
				</div>
				<div class="col-4">
					<img src="images/ps4.png">
					<h4>DualShock 4 Controller</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
					</div>
					<p>$59.99</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="6" value="6">
					</form>
				</div>
				<div class="col-4">
					<img src="images/firestick.jpeg">
					<h4>Fire TV Stick 4k</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star-half-o fa-fw"></i>
						<i class="fa fa-star-o fa-fw"></i>
					</div>
					<p>$49.99</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="6" value="6">
					</form>
				</div>
				<div class="col-4">
					<img src="images/echodot.jpeg">
					<h4>Amazon Echo Dot (4th Gen)</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star-o fa-fw"></i>
					</div>
					<p>$49.99</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="6" value="6">
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<img src="images/gopro.jpeg">
					<h4>GoPro - HERO9</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star-o fa-fw"></i>
					</div>
					<p>$399.99</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="6" value="6">
					</form>
				</div>
				<div class="col-4">
					<img src="images/ringbell.jpeg">
					<h4>Ring Video Doorbell</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
					</div>
					<p>$99.99</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="6" value="6">
					</form>
				</div>
				<div class="col-4">
					<img src="images/macbook.jpeg">
					<h4>Macbook Air 13.3" - M1 chip</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star fa-fw"></i>
						<i class="fa fa-star-o fa-fw"></i>
					</div>
					<p>$949.99</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="6" value="6">
					</form>
				</div>
				<div class="col-4">
					<img src="images/ipad.jpeg">
					<h4>iPad Pro 11" (256GB)</h4>
					<div class="rating">
						<i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star fa-fw"></i>
                        <i class="fa fa-star-half-o fa-fw"></i>
						<i class="fa fa-star-o fa-fw"></i>
					</div>
					<p>$899.00</p>
					<form action="cart.html" method="post" action="database.php" ); >
						<form action="cart.html">
						<input type="Submit" value="Add to Cart"/>
						</form>
						<input type="hidden" name="id" id="6" value="6">
					</form>
				</div>
			</div>
		</div>
		<div class="offer">
			<div class="small-container">
				<div class="row">
					<div class="col-2">
						<img src="images/exclusive.png" class="offer-img">
					</div>
					<div class="col-2">
						<h2>Exclusively Available on BuyTech</h2>
						<h1>Apple Watch Hermès Series 6</h1>
						<small>Apple Watch Hermès is the ultimate union of heritage and innovation.</small>
						<br>
						<medium>A bright new standard.</medium>
						<br>
						<small>Apple Watch Hermès debuts vibrant colors that transform the watch into a centerpiece, or a beautiful complement to any outfit.</small>
						<br>
						<a href="#" class="btn">Buy Now &#8594;</a>
					</div>
				</div>
			</div>
		</div>
		<div class="testimonial">
			<div class="small-container">
				<div class="row">
					<div class="col-3">
						<i class="fa fa-quote-left fa-fw"></i>
						<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus quaerat nam omnis nostrum dolore nulla saepe unde. Consectetur ad voluptate odit ipsam voluptatum, voluptatem reiciendis soluta pariatur tempore illo adipisci.</p>
						
						<div class="rating">
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
						</div>
						<img src="images/nopic.png">
						<h3>Frank González</h3>
					</div>
					<div class="col-3">
						<i class="fa fa-quote-left fa-fw"></i>
						<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus quaerat nam omnis nostrum dolore nulla saepe unde. Consectetur ad voluptate odit ipsam voluptatum, voluptatem reiciendis soluta pariatur tempore illo adipisci.</p>
						
						<div class="rating">
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
						</div>
						<img src="images/nopic.png">
						<h3>Sol P</h3>
					</div>
					<div class="col-3">
						<i class="fa fa-quote-left fa-fw"></i>
						<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus quaerat nam omnis nostrum dolore nulla saepe unde. Consectetur ad voluptate odit ipsam voluptatum, voluptatem reiciendis soluta pariatur tempore illo adipisci.</p>
						
						<div class="rating">
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
						</div>
						<img src="images/nopic.png">
						<h3>Nahiyaan Sheikh</h3>
					</div>
					<div class="col-3">
						<i class="fa fa-quote-left fa-fw"></i>
						<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus quaerat nam omnis nostrum dolore nulla saepe unde. Consectetur ad voluptate odit ipsam voluptatum, voluptatem reiciendis soluta pariatur tempore illo adipisci.</p>
						
						<div class="rating">
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
							<i class="fa fa-star fa-fw"></i>
						</div>
						<img src="images/nopic.png">
						<h3>Farhan Juneja</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="brands">
			<div class="small-container">
				<div class="row">
					<div class="col-5">
						<img src="images/logo-samsung.png">
					</div>
					<div class="col-5">
						<img src="images/logo-oppo.png">
					</div>
					<div class="col-5">
						<img src="images/logo-apple.png">
					</div>
					<div class="col-5">
						<img src="images/logo-paypal.png">
					</div>
					<div class="col-5">
						<img src="images/logo-philips.png">
					</div>
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