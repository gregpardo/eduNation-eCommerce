<?php
	$connection = mysql_connect("localhost","mi226092","harrison") or die ("ouchie");
	//$connection = mysql_connect("localhost","root","root") or die ("ouchie");
	mysql_select_db("mi226092", $connection);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>EduNation Client - Michael Harrison</title>
		<link rel="stylesheet" href="css/reset.css" />
		<link rel="stylesheet" href="css/text.css" />
		<link rel="stylesheet" href="css/960.css" />
   		<link rel="stylesheet" href="css/styles.css" />

	</head>
<body>
<div id="topbar">
	<div class="container_12">
	<p><a href="#"><img src="img/shopping_cart_2 copy.png" alt="shopping cart" /></a><a href="admin.php">Admin</a> | <a href="#">Log out</a></p> 
	</div>
</div>
	<div class="container_12">
		<div id="content">
			<div id="header">
				<div class="grid_10">
					<a href="home.php"><img src="img/EN_logo.png" alt="EduNation logo" /></a>
				</div>
					<div class="grid_5">

						<ul>
							<li><div class= "tab1"><a href="catalog.php">PRODUCTS</a></div></li>
							<li><div class= "tab2"><a href="featured.php">FEATURED ITEMS</a></div></li>
							<li><div class= "tab3"><a href="contact.php">CONTACT US</a></div></li>
							<li></li>
						</ul>
					</div>
					<div class="grid_7">
						<ul class="right">
							<li>Welcome Back!  You are currently logged in as <a href="admin.php">Admin</a>.</li>
							<li class="act"><div class= "tab4"><a href="cart.php">CART (3)</a></div></li>
						</ul>
					</div>

			</div>
			<div id="home">
				<div class="grid_12">
				<p><a href="home.php">Home</a> &gt; <a href="cart.php">Cart</a> &gt; <a class="current" href="client.php">Checkout</a></p>
					<a href="#"><img class="search" src="img/search1.png" alt="search bar" /></a>
						<input class="search" type="text" />
				</div>
			
				<div class="grid_8">
					<div id="check">
						<h1>Please enter your information:</h1>
						<h2><em class="it">Shipping:</em></h2>
					<form action="">
						<fieldset>
							<p><input type="text" name="fullname" size="45px" /> Full Name</p>
							<p><input type="text" name="address1" size="45px" /> Address 1</p>
							<p><input type="text" name="address2" size="45px" /> Address 2</p>
							<p><input type="text" name="city" size="25px" /> City</p>
							<p><input type="text" name="state" size="25px" /> State</p>
							<p><input type="text" name="zip" size="10px" /> Zip</p>
							<p><input type="text" name="country" size="20px" /> Country</p>
							<p><input type="text" name="phone" size="20px" /> Phone</p>
						</fieldset>
					<h2><em class="it">Payment Method:</em></h2>
						<fieldset>
							<p><input type="text" name="cardname" size="45px" /> Name on Card</p>
							<p><input type="text" name="cardnumber" size="45px" /> Card Number</p>
							<p><input type="text" name="cardcvc" size="5px" /> CVC</p>
							<p><input type="text" name="expdate" size="5px" /> Exp. Date</p>
							<p><input type="text" name="cardtype" size="20px" /> Card Type</p>
						</fieldset>
					</form> 
					<p>Or use <a href="http://www.paypay.com"><img src="img/paypal.png" alt="paypal" /></a></p>
					</div>
					
				</div>
				
				<div class="grid_3">
					<div id="contact">
						<h2>In Store Pick-up?</h2>
						<ul>
							<li>4000 Central Florida Blvd</li>
							<li>Orlando, FL 32816</li>
							<li>1-555-EDU-CATE</li>
							<li>&nbsp;</li>
							<li><h5>Questions/Comments?</h5></li>
							<li><a class="shopnow" href="contact.php">Contact us</a> via email or give us a call between <em class="it">9am-6pm M-F</em>.</li>
						</ul>
					</div>
				</div>
				
			</div>
			<div class="grid_9 prefix_2 suffix_1">
				<div id="footer">
				<p>This site is not official and is an assignment for a UCF Digital Media course - <em class="it">designed by Michael Harrison</em></p>
			</div>
			</div>
		</div>
	</div>

</body>
</html>