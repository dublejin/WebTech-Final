<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="s.css">
	<link rel="icon" href="logo.jpg">
</head>
<body>
	<h2>Checkout</h2>
	<div class="wrapper">
		<form action="bye.html" method="POST">
			<div class="inputs">
				<div class="left">
					<h4>Billing Address</h4>
					<div class="input">
						<input required="required" type="text" name="name" id="name" style="font-family:Arial" placeholder="Full Name">
					</div>
					<div class="input">
						<input required="required" type="email" name="email" id="email" style="font-family:Arial" placeholder="Email">
					</div>
					<div class="input">
						<input required="required" type="text" name="address" id="address" style="font-family:Arial" placeholder="Address">
					</div>
					<div class="input">
						<input required="required" type="tel" name="contact" id="contact" style="font-family:Arial" placeholder="Contact">
					</div>
				</div>
				<div class="right">
					<h4>Payment</h4>
					<div class="input">
						<input required="required" type="text" name="cardName" id="cardName" placeholder="Name On Card">
					</div>
					<div class="input">
						<input required="required" type="number" name="cardNumber" id="cardNumber" placeholder="Card Number">
					</div>
					<div class="input">
						<input required="required" type="month" name="cardExpiry" id="cardExpiry" placeholder="Card Expiry" min="2018-12">
					</div>
					<div class="input">
						<input required="required" type="password" name="cvv" id="cvv" placeholder="CVV">
					</div>
				</div>
			</div>
			<div class="submits">
				<input required="required" type="submit" value="-->" >
				
				
				
				
			</div>
		</form>
		
	</div>

			
</body>
</html>