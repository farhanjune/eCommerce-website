<?php
	require('database.php');
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
			<a href="index.php">
			<img src="images/circle_logo.png" class="avatar" alt="Avatar Image">
			</a>
            <h3>Billing Address</h3>
			
            <label for="name"><i class=""></i>Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="John Doe"><br>
			<?php
                if(isset($_SESSION['error']['name_error'])){
                    $error = $_SESSION['error']['name_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
				
            <label for="email"><i class=""></i>Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com"><br>
			<?php
                if(isset($_SESSION['error']['email_error'])){
                    $error = $_SESSION['error']['email_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
			
            <label for="adr"><i class=""></i>Address</label>
            <input type="text" id="adr" name="address" placeholder="1000 Lakeside Dr"><br>
			<?php
                if(isset($_SESSION['error']['street_error'])){
                    $error = $_SESSION['error']['street_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
			
            <label for="city"><i class=""></i>City</label>
            <input type="text" id="city" name="city" placeholder="Athens"><br>
			<?php
                if(isset($_SESSION['error']['city_error'])){
                    $error = $_SESSION['error']['city_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
				
			<label for="state">State</label>
			<input type="text" id="state" name="state" placeholder="GA"><br>
			<?php
                if(isset($_SESSION['error']['state_error'])){
                    $error = $_SESSION['error']['state_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
				
			<label for="zip">Zip</label>
			<input type="text" id="zip" name="zip" placeholder="10001"><br>
			<?php
			if(isset($_SESSION['error']['zip_error'])){
                    $error = $_SESSION['error']['zip_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
		</div>
		
		<div id="paymentinfo">
		<form action="validate-checkout.php" method=post>
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
            <input type="text" id="ccnum" name="card_number" placeholder="1111-2222-3333-4444"><br>
			<?php
                if(isset($_SESSION['error']['card_number_error'])){
                    $error = $_SESSION['error']['card_number_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
				
			<!---
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September"><br>
         
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018"><br>
              </div>
			  --->
		  <label for="month" id="monthlabel">Expiration month</label>
			<select id="month" name="month">
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12" >12</option>
			</select>
			<label for="year" id="yearlabel">Expiration year</label>
			<select id="year" name="year">
				<option value="2021">2021</option>
				<option value="2022">2022</option>
				<option value="2023">2023</option>
				<option value="2024">2024</option>
				<option value="2025">2025</option>
				<option value="2026">2026</option>
				<option value="2027">2027</option>
				<option value="2028">2028</option>
				<option value="2029">2029</option>
				<option value="2030">2030</option>
			</select>
			<?php
                if(isset($_SESSION['error']['exp_date_error'])){
                    $error = $_SESSION['error']['exp_date_error'];
                    echo "<span>$error</span>";
                }
                ?>
		  <div class="col-50">
			<label for="cvv">CVV</label>
			<input type="text" id="cvv" name="cvv" placeholder="352"><br>
		  </div>
			<?php
                if(isset($_SESSION['error']['card_security_error'])){
                    $error = $_SESSION['error']['card_security_error'];
                    echo "<span>$error</span><br>";
                }
                ?>
		  
		<!---
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
		--->
		</div>
		
        <input type="submit" value="Submit" class="btn">
		</form>
  </div>
  <!--- Cart items here --->
  <div class="cart">
    <table id="carttable">
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
					foreach($db->query($sql) as $key => $item ) :
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
