<?php
	$connection = mysql_connect("localhost","mi226092","harrison") or die ("ouchie");
	//$connection = mysql_connect("localhost","root","root") or die ("ouchie");
	mysql_select_db("mi226092", $connection);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>EduNation Admin - Michael Harrison</title>
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
							<li><div class= "tab4"><a href="cart.php">CART (3)</a></div></li>
						</ul>
					</div>

			</div>
			<div id="home">
				<div class="grid_12">
				<p><a href="home.php">Home</a> &gt; <a class="current" href="admin.php">Admin</a></p>
					<a href="#"><img class="search" src="img/search1.png" alt="search bar" /></a>
						<input class="search" type="text" />
				</div>
			
				<div class="grid_8">
					<div id="check">
						<h1>Enter a New Item:</h1>
					<form action="">
						<fieldset>
							<p><input type="text" name="productID" size="45px" /> Product ID</p>
							<p><input type="text" name="productName" size="20px" /> Product Name</p>
							<p><input type="text" name="brandName" size="45px" /> Brand Name</p>
							<p><input type="text" name="description" size="45px" /> Description</p>
							<p><input type="text" name="feat1" size="35px" /> Feature 1</p>
							<p><input type="text" name="feat2" size="35px" /> Feature 2</p>
							<p><input type="text" name="feat3" size="30px" /> Feature 3</p>
							<p><input type="text" name="category" size="20px" /> Category</p>
							<p><input type="text" name="sku" size="25px" /> SKU</p>
							<p><input type="text" name="stock" size="25px" /> Stock</p>
							<p><input type="text" name="cost" size="10px" /> Cost</p>
							<p><input type="text" name="price" size="10px" /> Price</p>
							<p><input type="text" name="salePrice" size="10px" /> Sale Price</p>
							<p><input type="text" name="productImage" size="45px" /> Product Image</p>
						</fieldset>
					</form>
					<h1>Or check an item's stock: </h1> 
					<p><input type="text" name="productImage" size="45px" /> (enter Product ID)</p>
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