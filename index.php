<?php
session_start();
require('database.php');
if (isset($_SESSION['flag'])) {
	if ($_SESSION['flag']==true) {
		if (isset($_SESSION['username'])) {
			$userID = $_SESSION['username'];
		}
	} else {
		$cart = array();
		$_SESSION['username'] = 'guest';
	}
} else {
	$cart = array();
		$_SESSION['username'] = 'guest';
}
require_once('cart.php');
	$action = filter_input(INPUT_POST, 'action');
	if ($action === NULL) {
		$action = filter_input(INPUT_GET, 'action');
		if ($action === NULL) {
			$action = 'show_add_item';
		}
	}
switch($action) {
    case 'add':
		require('database.php');
        $product_key = filter_input(INPUT_POST, 'productkey');
		$item_qty = filter_input(INPUT_POST, 'itemqty');
		add_item($product_key, $item_qty, $db);
		break;
	
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
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
				<div id="header"></div><br />
				<script>
				$("#header").load("header.php");
				</script>
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
				<?php
					$userID = $_SESSION['username'];
					$sql = "SELECT p.*
							FROM products p
							GROUP BY productID";
					foreach($db->query($sql) as $key => $item ) :
					?>
						<div class="col-4">
						<a href="apple-watch.html">
							<img src="<?php echo $item['productImage']?>">
							<h4><?php echo $item['productName']?></h4>
							<div class="rating">
								<i class="fa fa-star fa-fw"></i>
								<i class="fa fa-star fa-fw"></i>
								<i class="fa fa-star fa-fw"></i>
								<i class="fa fa-star fa-fw"></i>
								<i class="fa fa-star-o fa-fw"></i>
							</div>
							<p><?php echo $item['listPrice']?></p>
							<form action="." method="post"); >
								<input type="hidden" name="action" value="add"></input>
								<input type="hidden" name="productkey" id="<?php echo $item['productID']?>" value="<?php echo $item['productID']?>">
								<input type="hidden" name="itemqty" id="1" value="1">
								<input type="Submit" value="Add to Cart"/>
							</form>
						</div>
				<?php endforeach; ?>
			
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
