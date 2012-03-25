<?php
	$connection = mysql_connect("localhost","mi226092","harrison") or die ("ouchie");
	//$connection = mysql_connect("localhost","root","root") or die ("ouchie");
	mysql_select_db("mi226092", $connection);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>EduNation Arts/Crafts - Michael Harrison</title>
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
							<li class="act"><div class= "tab1"><a href="catalog.php">PRODUCTS</a></div></li>
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
				<p><a href="home.php">Home</a> &gt; <a href="catalog.php">Products</a> &gt; <a class="current" href="arts.php">Arts/Crafts</a></p>
					<a href="#"><img class="search" src="img/search1.png" alt="search bar" /></a>
						<input class="search" type="text" />
				</div>
				<div class="grid_2">
					<div id="sidenav">
						<ul>
							<li><a href="arts.php">Arts/Crafts</a></li>
							<li><a href="books.php">Books/DVDs</a></li>
							<li><a href="decor.php">Decorations</a></li>
							<li><a href="games.php">Games</a></li>
							<li><a href="teach.php">Teacher Aids</a></li>
						</ul>
					</div>
				</div>
				<div class="grid_4 suffix_1">
					<div id="item">
						<h1>Crayon Classpack</h1>
						<h2>Crayola LLC</h2>
						<img src="img/item3.jpg" alt="Crayola Classpack" />
					</div>
				</div>
				<div class="grid_3">
					<div id="itemright">
						<h4>Price: $68.15</h4>
						<h3>SALE: $60.50</h3>
						<p>Qty:<input type="text" /></p>
						<p>Crayola crayon Classpacks are the economical, organized way to bring Crayola quality to every class. They provide multiple crayon sets for convenient classroom and group use. Crayons provide true color, no piling, build up, or erasing of crayon layers, good lay down. Tip and barrel strong, durable, long lasting and economical. Double wrapped for added strength with the color name on the label. Large size crayons measure 4" x 7/16" and are available in a sturdy, compartmentalized, convenient, re-usable Classpack. Traditional crayon colors perfect for teaching color mixing. Non-toxic.</p>					
						<div class="tab4"><a href="#">Add to Cart</a></div>
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