<?php
	session_start();
	require('database.php');
	$productID = $_GET['productID'];
	$q = $db->prepare("SELECT * FROM products WHERE productID = '$productID'");
	$q->execute();
	$data = $q->fetch();
	$q->closeCursor();
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
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BuyTech | Electronics</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="productview.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="productview.js"></script> 
		
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
			<div class="container">
				
				<div>
				</div>
			</div>
		</div>
		<div class="product-container">
			<div class="product">
				<div class="product-media">
					<div class ="product-image">
						<img class="active" src=<?php echo $data['productImage']?> alt="..." id="active">
					</div>
					<div class="product-thumbnails">
						<div class="thumb">
							<img src=<?php echo $data['productImage']?> alt="..." id="thumbimg" onclick="changeImage('<?php echo $data['productImage']?>')">
						</div>
						<div class="thumb">
							<img src=<?php echo $data['productImage2']?> alt="..." id="thumbimg" onclick="changeImage('<?php echo $data['productImage2']?>')">
						</div>
						<div class="thumb">
							<img src=<?php echo $data['productImage3']?> alt="..." id="thumbimg" onclick="changeImage('<?php echo $data['productImage3']?>')">
						</div>
					</div>
					
				</div>
				
				<div class="product-description">
					<div class="desc-head">
						<h1><?php echo $data['productName']?></h1>
						<h2><?php echo $data['listPrice']?></h2>
					</div>	
					<div class="desc-content"> 
						<p><?php echo $data['description']?></p>
					</div>
					<div class="purchase">
						<form action="." method="post"); >
								<input type="hidden" name="action" value="add"></input>
								<input type="hidden" name="productkey" id="<?php echo $data['productID']?>" value="<?php echo $data['productID']?>">
								<input type="hidden" name="itemqty" id="1" value="1">
								<input type="Submit" value="Add to Cart"/>
							</form>
					</div>
					
				</div>
				
			</div>
		</div>
		
	</body>
</html>