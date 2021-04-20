<?php
	
require('cart.php');
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');

    if ($action === NULL) {
        $action = 'show_add_item';
    }
}

switch($action) {
    case 'add':
        $product_key = filter_input(INPUT_POST, 'productkey');
		$item_qty = filter_input(INPUT_POST, 'itemqty');
		add_item($product_key, $item_qty);
		include('cart_view.php');
		break;
		
	case 'update':
        $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        foreach($new_qty_list as $key => $qty) {
            if ($_SESSION['cart'][$key]['qty'] != $qty) {
                update_item($key, $qty);
            }
        }
        include('cart_view.php');
        break;

    case 'show_cart':
        include('cart_view.php');
        break;
	case 'empty cart':
		unset($_SESSION['cart']);
		include('cart_view.php');
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
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">Login</a></li>
						</ul>
					</nav>
					<img src="images/cart.png" width="30px" height="30px">
					<img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
				</div>
				<div>
					<nav class="categories">
						<h1>Cart<h1>
					</nav>
				</div>
			</div>
		</div>
		<h1>Add Item</h1>

        <form action="." method="post">
            <input type="hidden" name="action" value="add">
            <label>Name:</label>
            <select name="productkey">
            <?php foreach($dbo->query($sql) as $key => $product) :

                $cost = number_format($product['listPrice'], 2);
                $name = $product['productName'];
                $item = $name . ' ($' . $cost . ')';

            ?>
                <option value="<?php echo $key; ?>">
                    <?php echo $item; ?>
                </option>

            <?php endforeach; ?>
            </select><br>
			<label>Quantity:</label>
            <select name="itemqty">
				<?php for($i = 1; $i <= 10; $i++) : ?>
					<option value="<?php echo $i; ?>">
						<?php echo $i; ?>
					</option>
				<?php endfor; ?>
            </select><br>

            <label>&nbsp;</label>

            <input type="submit" value="Add Item">

        </form>

        <p><a href=".?action=show_cart">View Cart</a></p>  
	</body>
</html>