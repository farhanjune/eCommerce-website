<?php

	$dsn = 'mysql:host=localhost;dbname=database';
	$username = 'root';
	$password = '';

	try {
		$dbo = new PDO($dsn, $username, $password);
	} catch (PDOException $e) {
		die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
		$error_message = $e->getMessage();
	}

 if(!isset($_SESSION)) 
    { 
		$lifetime = 60 * 60 * 24 * 14;
		session_set_cookie_params($lifetime, '/');
        session_start(); 
    } 

$sql="SELECT * FROM cart"; 
$tt = "INSERT INTO cart (productID, quantity) VALUES ('5', '10')"; 
echo "<table>
<tr><th>id</th><th>qty</th></tr>";

foreach ($dbo->query($sql) as $row) {
	echo "<tr ><td>$row[productID]</td><td>$row[quantity]</td></tr>";
}
echo "</table>";

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
							<li><a href="index.html">Home</a></li>
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
		<h1>Your Cart</h1>

        <?php if (empty($_SESSION['cart']) ||

                  count($_SESSION['cart']) == 0) : ?>

            <p>There are no items in your cart.</p>

        <?php else: ?>

            <form action="." method="post">

            <input type="hidden" name="action"

                    value="update">

            <table>
                <tr id="cart_header">
                    <th class="left">Item</th>
                    <th class="right">Item Cost</th>
                    <th class="right">Quantity</th>
                    <th class="right">Item Total</th>
                </tr>
			<?php 
				$sql = 'SELECT *, quantity FROM products, cart WHERE products.productID = cart.productID';
				foreach($dbo->query($sql) as $key => $item ) :
					$cost  = number_format($item['listPrice'], 2);					
					$total = $cost * $item['quantity'];
					
            ?>
					<tr>
						<td><?php echo $item['productName']; ?> </td>

						<td class="right">
							$<?php echo $cost; ?> </td>
						<td class="right">
							<?php echo $item['quantity']; ?>
						</td>

						<td class="right">
							$<?php echo $total; ?></td>
					</tr>
					
			<?php endforeach; ?>
				<tr id="cart_footer">
                    <td colspan="3"><b>Subtotal</b></td>
                    <td>$<?php echo get_subtotal(); ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="right">
                        <input type="submit"
                               value="Update Cart"></td>
                </tr>
            </table>
            <p>Click "Update Cart" to update quantities in
               your cart. Enter a quantity of 0 to remove
               an item.</p>
            </form>
        <?php endif; ?>

        <p><a href=".?action=show_add_item">Add Item</a></p>

        <p><a href=".?action=empty_cart">Empty Cart</a></p>

	</body>
</html>