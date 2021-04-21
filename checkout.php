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
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="checkout.css">

</head>
<body>

	
	<div class="checkout-box">
	<h2>Checkout</h2>
		<div id="billinginfo">
			<img src="images/circle_logo.png" class="avatar" alt="Avatar Image">
		
            <h3>Billing Address</h3>
			
            <label for="name"><i class=""></i>Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="John Doe"><br>
			
            <label for="email"><i class=""></i>Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com"><br>
			
            <label for="adr"><i class=""></i>Address</label>
            <input type="text" id="adr" name="address" placeholder="1000 Lakeside Dr"><br>
			
            <label for="city"><i class=""></i>City</label>
            <input type="text" id="city" name="city" placeholder="Athens"><br>

			<label for="state">State</label>
			<input type="text" id="state" name="state" placeholder="GA"><br>

			<label for="zip">Zip</label>
			<input type="text" id="zip" name="zip" placeholder="10001"><br>
			
		</div>
		
		<div id="paymentinfo">
            <h3>Payment</h3>
            <!---
			<label for="fname">Accepted Cards</label>
			--->
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div><br>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe"><br>
			
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"><br>
			
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September"><br>
         
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018"><br>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352"><br>
              </div>
		<!---
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
		--->
		</div>
		
        <input type="submit" value="Submit" class="btn">
  </div>
  <!--- Cart items here --->
  <div class="cart">
    <table>
                <tr id="cart_header">
                    <th class="left">Item</th>
                    <th class="right">Item Cost</th>
                    <th class="right">Quantity</th>
                    <th class="right">Item Total</th>
                </tr>
				<?php 
					$totalcart = 0;
					$sql = "SELECT p.*, COUNT(c.productID) AS quantity 
							FROM products p LEFT JOIN cart c ON (c.userId = ('guest')) 
							WHERE c.productID = p.productID
							GROUP BY productID";
					foreach($dbo->query($sql) as $key => $item ) :
						$cost  = number_format($item['listPrice'], 2);					
						$total = $cost * $item['quantity'];
						$totalcart += $total;
						
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
                    <td>$<?php echo $totalcart; ?></td>
                </tr>
            </table>
  </div>


</body>
</html>
