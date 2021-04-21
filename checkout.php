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
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      <p><a href="#">Product 1</a> <span class="price">$15</span></p>
      <p><a href="#">Product 2</a> <span class="price">$5</span></p>
      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
      <p><a href="#">Product 4</a> <span class="price">$2</span></p>
      <!---<hr>--->
      <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
    </div>
  </div>


</body>
</html>
