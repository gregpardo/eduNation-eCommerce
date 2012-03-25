<?php
	$connection = mysql_connect("localhost","mi226092","harrison") or die ("ouchie");
	//$connection = mysql_connect("localhost","root","root") or die ("ouchie");
	mysql_select_db("mi226092", $connection);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>EduNation Cart - Michael Harrison</title>
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
				<p><a href="home.php">Home</a> &gt; <a class="current" href="cart.php">Cart</a></p>
					<a href="#"><img class="search" src="img/search1.png" alt="search bar" /></a>
						<input class="search" type="text" />
				</div>
				<div id="cart">
					<div class="grid_3">
						<div class="item">
						<a href="#"><img src="img/remove1.png" alt="remove" /></a>
							<h1><a href="art1.php">Jumbo Chalk <em class="qty">x2</em></a></h1>
							<h2>Melissa &amp; Doug</h2>
							<a href="art1.php"><img src="img/item2a.png" alt="jumbo chalk" /></a>
							<h4>Price: $2.55</h4>
							<h3>SALE: $2.00</h3>
						</div>
					</div>
					<div class="grid_3">
						<div class="item">
						<a href="#"><img src="img/remove1.png" alt="remove" /></a>
							<h1><a href="teach1.php">Shelf Organizer</a></h1>
							<h2>Pacon Corporation</h2>
							<a href="teach1.php"><img class="brain" src="img/item10b.png" alt="Shelf Organizer" /></a>
							<h4>Price: $30.15</h4>
							<h3>SALE: $25.50</h3>
						</div>
					</div>	
					<div class="grid_3">
						<div class="item">
						<a href="#"><img src="img/remove1.png" alt="remove" /></a>
							<h1><a href="games2.php">Blockers! <em class="qty">x35</em></a></h1>
							<h2>Briarpatch Inc.</h2>
							<a href="games2.php"><img class="brain1" src="img/item1a.png" alt="Blockers!" /></a>
							<h4>Price: $31.35</h4>
							<h3>SALE: $25.50</h3>
						</div>
					</div>
				</div>
					<div class="grid_2">
						<div id="contact2">
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
				<div class="grid_3 prefix_3">
						<div id="checkout">
							<h2><a href="client.php">Checkout</a></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="grid_9 prefix_2 suffix_1">
				<div id="footer">
				<p>This site is not official and is an assignment for a UCF Digital Media course - <em class="it">designed by Michael Harrison</em></p>
			</div>
			</div>
		
	</div>

</body>
</html>