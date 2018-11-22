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

  if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    if (isset($_SESSION['cart'][$pid])) {
      $_SESSION['cart'][$pid] = $_SESSION['cart'][$pid] + $_POST['qty'];
    } else {
      $_SESSION['cart'][$pid] = $_POST['qty'];
    }
    echo "<script>window.alert('Added ".($_POST['qty'])." to cart')</script>";
  }
?>

<?php
include_once 'connect.php'
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="logo.jpg">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header" id="myheader">
	<h2 style="text-align:center">The Mech Store</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    <div class="user">
    	<p style="text-align:right">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p style="text-align:right" class="cart-btn"> <a href="cart.php">View Cart</a> </p>
		<p style="text-align:right" class="cart-btn"> <a href="contact.html">Contact Us</a> </p>
		<p style="text-align:right" class="cart-btn"> <a href="about.html">About Us</a> </p>
    	<p style="text-align:right" class="logout-btn"> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
    </div>
    <?php endif ?>
</div>
<!-- SHREYAS, write your home page code from here, include all this stuff to continue within the same session -->

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myheader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

<style>
     @import url("productstyle.css");
</style>

<?php
$sql = "SELECT * FROM products;";
$result = mysqli_query($connect,$sql);
$resultCheck =mysqli_num_rows($result);
$p = mysqli_fetch_assoc($result);
?>
<div class="content">

<h2 style="text-align:center">Products</h2>

<div class="row">
<?php
  while ($p) {
?>
<div class="column">
<div class="card">
  <img src=<?php echo $p['image']?> alt=<?php echo $p['name']?> style="width:100%">
  <h1><?php echo $p['name']?></h1>
  <p class="price">&#x20b9;<?php echo $p['price']?></p>
  <p><?php echo nl2br(htmlspecialchars($p['dsc']));?></p>
  <form action="" class="add-to-cart" method="POST">
    <input type="number" name="qty" required min="0" placeholder="Quantity">
    <input type="hidden" name="pid" value="<?php echo $p['id']?>">
    <input type="submit" value="Add to Cart">
  </form>
</div>
</div>
<?php
 $p = mysqli_fetch_assoc($result);
}
?>
</div>
</div>
<!--End my code-->		
</body>
</html>