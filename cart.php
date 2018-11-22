<?php
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
include_once 'connect.php';
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cart</title>
	<link rel="stylesheet" href="s.css">
	<link rel="icon" href="logo.jpg">
</head>

<body>
	<h2>Cart</h2>
	<div class="wrapper">
		<div class="cart">
			<div class="header">
				<div class="name-h">Item</div>
				<div class="desc-h">Name</div>
				<div class="qty-h">Qty</div>
				<div class="rate-h">Rate (&#x20b9;)</div>
				<div class="amt-h">Amount (&#x20b9;)</div>
			</div>
			<div class="items">
				<?php
				if (!isset($_SESSION['cart'])) {
					echo '<p class="empty-cart">Cart is empty</p>';
				}
				else {
					foreach ($_SESSION['cart'] as $id => $qty) {
						$query = "SELECT * FROM products where id like '$id'";
						$result = mysqli_query($connect, $query);
						$p = mysqli_fetch_assoc($result);
						
				?>
				<div class="item">
					<div class="img"><img src="<?php echo $p['image']?>" alt="<?php echo $p['name']?>"></div>
					<div class="desc">
						<div class="name"><?php echo $p['name']?></div>
						<!-- <div class="spec">(Set of 5)</div> -->
					</div>
					<div class="qty"><?php echo $qty?></div>
					<div class="rate"><?php echo $p['price']?></div>
					<?php
					$amt = ($qty * $p['price']);
					$total += $amt;
					?>
					<div class="amt"><?php echo $amt?></div>
				</div>
				<?php
				}
			}
				?>
			</div>
			<div class="footer">
				<div class="tot-amt-h">Total Amount- </div>
				<div class="tot-amt-h">&#x20b9;<?php echo $total ?></div>
			</div>
		</div>
		<div class="cart-btns">
			<a href="index.php" class="checkout-btn">Continue Shopping</a>
			<a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
			<a href="clearcart.php" class="checkout-btn">Clear Cart</a>
		</div>
	</div>
</body>

</html>