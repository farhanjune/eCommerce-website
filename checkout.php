<?php
require('database.php');
session_start();
$queryUserByUsername = 'SELECT * FROM users WHERE userName = :userName';
$statement1 = $db -> prepare($queryUserByUsername);
$statement1 -> bindValue(':userName', $_SESSION['username']);
$statement1 -> execute();
$user = $statement1 -> fetch();
$statement1 -> closeCursor();
$month = date('m', strtotime($user['cardExp']));
$year = date('Y', strtotime($user['cardExp']));
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
            <input type="text" id="fname" name="fullname" value="<?php echo $user['fullName']?>"><br>
			
            <label for="email"><i class=""></i>Email</label>
            <input type="text" id="email" name="email" value="<?php echo $user['email']?>"><br>
			
            <label for="adr"><i class=""></i>Address</label>
            <input type="text" id="adr" name="address" value="<?php echo $user['street']?>"><br>
			
            <label for="city"><i class=""></i>City</label>
            <input type="text" id="city" name="city" value="<?php echo $user['city']?>"><br>

			<label for="state">State</label>
			<input type="text" id="state" name="state" value="<?php echo $user['userState']?>"><br>

			<label for="zip">Zip</label>
			<input type="text" id="zip" name="zip" value="<?php echo $user['zip']?>"><br>
			
		</div>
		
		<div id="paymentinfo">
		<form action="validate-checkout.php" method="post">
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
            <input type="text" id="cname" name="cardname" value="<?php echo $user['cardName']?>"><br>

            <label for="card_type">Card type</label>
            <select id="card_type" name="card_type">
                <option value="visa"
                    <?php if($user['cardType'] == 'visa'){echo 'selected';} ?>>Visa</option>
                <option value="mastercard"
                    <?php if($user['cardType'] == 'mastercard'){echo 'selected';} ?>>MasterCard</option>
                <option value="discover"
                    <?php if($user['cardType'] == 'discover'){echo 'selected';} ?>>Discover</option>
            </select><br>

            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="Enter card number"><br>
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
                    <option value="01" <?php if($month == '01'){echo 'selected';} ?>>01</option>
                    <option value="02" <?php if($month == '02'){echo 'selected';} ?>>02</option>
                    <option value="03" <?php if($month == '03'){echo 'selected';} ?>>03</option>
                    <option value="04" <?php if($month == '04'){echo 'selected';} ?>>04</option>
                    <option value="05" <?php if($month == '05'){echo 'selected';} ?>>05</option>
                    <option value="06" <?php if($month == '06'){echo 'selected';} ?>>06</option>
                    <option value="07" <?php if($month == '07'){echo 'selected';} ?>>07</option>
                    <option value="08" <?php if($month == '08'){echo 'selected';} ?>>08</option>
                    <option value="09" <?php if($month == '09'){echo 'selected';} ?>>09</option>
                    <option value="10" <?php if($month == '10'){echo 'selected';} ?>>10</option>
                    <option value="11" <?php if($month == '11'){echo 'selected';} ?>>11</option>
                    <option value="12" <?php if($month == '12'){echo 'selected';} ?>>12</option>
                </select>
                <label for="year" id="yearlabel">Expiration year</label>
                <select id="year" name="year">
                    <option value="2021" <?php if($year == '2021'){echo 'selected';} ?>>2021</option>
                    <option value="2022" <?php if($year == '2022'){echo 'selected';} ?>>2022</option>
                    <option value="2023" <?php if($year == '2023'){echo 'selected';} ?>>2023</option>
                    <option value="2024" <?php if($year == '2024'){echo 'selected';} ?>>2024</option>
                    <option value="2025" <?php if($year == '2025'){echo 'selected';} ?>>2025</option>
                    <option value="2026" <?php if($year == '2026'){echo 'selected';} ?>>2026</option>
                    <option value="2027" <?php if($year == '2027'){echo 'selected';} ?>>2027</option>
                    <option value="2028" <?php if($year == '2028'){echo 'selected';} ?>>2028</option>
                    <option value="2029" <?php if($year == '2029'){echo 'selected';} ?>>2029</option>
                    <option value="2030" <?php if($year == '2030'){echo 'selected';} ?>>2030</option>
                </select>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="Enter cvv"><br>
              </div>
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
