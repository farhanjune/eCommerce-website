<?php
session_start();
	require('database.php');
	


require_once('cart.php');
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');

    if ($action === NULL) {
        $action = 'show_add_item';
    }
}

switch($action) {
	case 'empty_cart':
		require('database.php');
		include('cart.php');
		empty_cart($db);
		include('cart_view.php');
		break;
	case 'update':
        $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        foreach($new_qty_list as $key => $qty) {
            if ($_SESSION['cart'][$key]['quantity'] < $qty) {
                update_item($key, $qty, $db);
            } else if ($_SESSION['cart'][$key]['quantity'] > $qty) {
				unset($_SESSION['cart'][$key]);
				$delsql = "DELETE FROM cart WHERE productID = ('$key')";
				if ($db->query($delsql) === TRUE) {
				  echo "Record deleted successfully";
				} else {
				  echo "Error deleting record: " . $db->error;
				}
				add_item($key, $qty, $db);
			}
        }
        include('cart_view.php');
        break;
}

echo $_SESSION['username'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
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
			</div>
		</div>
		<main>
		<h1 style="text-align:center;padding:30px;">Your Cart</h1>

        <?php if (empty($_SESSION['cart']) ||

                  count($_SESSION['cart']) == 0) : ?>

            <p>There are no items in your cart.</p>

        <?php else: ?>

            <form action="." method="post">
			<div class="carttable">
            <table style="border: 1px solid black;borer-collapse:collapse;width:70%;margin-left:250px;">
                <tr id="cart_header" style="background-color:black;color:white;">
                    <th class="left">Item</th>
					<th class="right"></th>
                    <th class="right">Item Cost</th>
                    <th class="right">Quantity</th>
                    <th class="right">Item Total</th>
                </tr>
				<?php 
					$totalcart = 0;
					$userID = $_SESSION['username'];
					$sql = "SELECT p.*, COUNT(c.productID) AS quantity 
							FROM products p LEFT JOIN cart c ON (c.userId = ('$userID')) 
							WHERE c.productID = p.productID
							GROUP BY productID";
					foreach($db->query($sql) as $key => $item ) :
						$cost  = number_format($item['listPrice'], 2);					
						$total = $cost * $item['quantity'];
						$totalcart += $total;
						
				?>
					<tr>
						<td><?php echo $item['productName']; ?> </td>
						
						<td><?php echo '<img src="' . $item['productImage'] . '" width="90px" height="90px">';?></td>
						<td class="right">
							$<?php echo $cost; ?> </td>
						<td class="right">
							<input type="text" name="newqty[<?php echo $key; ?>]" value="<?php echo $item['quantity']; ?>">
						</td>

						<td class="right">
							$<?php echo $total; ?></td>
					</tr>
					
				<?php endforeach; ?>
				<tr id="cart_footer" style="padding:30px;">
                    <td colspan="4"style="padding:30px;"><b>Subtotal</b></td>
                    <td style="padding:30px;">$<?php echo $totalcart; ?></td>
                </tr>
                
            </table>
			</div>
            <p>Click "Update Cart" to update quantities in
               your cart. Enter a quantity of 0 to remove
               an item.</p>
			   <p><a href=".?action=show_add_item">Add Item</a></p>
			   
			</form>
			<form action="." method="post">
				<input type="hidden" name="action" value="empty_cart"></input>
				<input type="Submit" value="Empty"/>
			</form>
			<p><a href="checkout.php">Checkout</a></p>
        <?php endif; ?>
		</main>
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