<?php
	$connection = mysql_connect("localhost","mi226092","harrison") or die ("ouchie");
	//$connection = mysql_connect("localhost","root","root") or die ("ouchie");
	mysql_select_db("mi226092", $connection);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>EduNation Featured Items - Michael Harrison</title>
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
							<li class="act"><div class= "tab2"><a href="featured.php">FEATURED ITEMS</a></div></li>
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
			<div id="home2">
				<div class="grid_12">
				<p><a href="home.php">Home</a> &gt; <a class="current" href="featured.php">Featured Items</a></p>
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
				<div class="grid_3">
					<div class="item">
						<h1><a href="art1.php">Jumbo Chalk</a></h1>
						<h2>Melissa &amp; Doug</h2>
						<a href="art1.php"><img src="img/item2a.png" alt="jumbo chalk" /></a>
						<h4>Price: $2.55</h4>
						<h3>SALE: $2.00</h3>
					</div>
				</div>
				<div class="grid_3">
					<div class="item">
						<h1><a href="art2.php">Crayola Classpack</a></h1>
						<h2>Crayola LLC</h2>
						<a href="art2.php"><img src="img/item3a.png" alt="crayola classpack" /></a>
						<h4>Price: $68.15</h4>
						<h3>SALE: $60.50</h3>
					</div>
				</div>	
				<div class="grid_3">
					<div class="item">
						<h1><a href="art3.php">Brain Noodles</a></h1>
						<h2>Brain Noodles</h2>
						<a href="art3.php"><img class="brain" src="img/item4a.png" alt="brain noodles" /></a>
						<h4>Price: $96.95</h4>
						<h3>SALE: $79.50</h3>
					</div>
				</div>
				<div class="grid_3">
					<div class="item">
						<h1><a href="books1.php">Bizarre Animals</a></h1>
						<h2>Carson Dellosa</h2>
						<a href="books1.php"><img class="brain1" src="img/item5b.png" alt="Bizarre Animals" /></a>
						<h4>Price: $15.00</h4>
						<h3>SALE: $12.10</h3>
					</div>
				</div>
				<div class="grid_3">
					<div class="item">
						<h1><a href="books2.php">Ben's Dream</a></h1>
						<h2>Houghton Mifflin</h2>
						<a href="books2.php"><img class="brain2" src="img/item6a.png" alt="crayola classpack" /></a>
						<h4>Price: $15.15</h4>
						<h3>SALE: $12.25</h3>
					</div>
				</div>	
				<div class="grid_3">
					<div class="item">
						<h1><a href="books3.php">Animal Babies</a></h1>
						<h2>Macmillan/Mps</h2>
						<a href="books3.php"><img class="brain2" src="img/item7a.png" alt="Animal Babies" /></a>
						<h4>Price: $5.95</h4>
						<h3>SALE: $4.50</h3>
					</div>
				</div>
				<div class="grid_3 prefix_2">
					<div class="item2">
						<h1><a href="games1.php">200 Brain Games</a></h1>
						<h2>Teacher Created</h2>
						<a href="games1.php"><img class="brain2" src="img/item8a.png" alt="200 Brain Games" /></a>
						<h4>Price: $16.45</h4>
						<h3>SALE: $13.70</h3>
					</div>
				</div>
				<div class="grid_3">
					<div class="item2">
						<h1><a href="games2.php">Blockers!</a></h1>
						<h2>Briarpatch Inc.</h2>
						<a href="games2.php"><img class="brain1" src="img/item1b.png" alt="Blockers!" /></a>
						<h4>Price: $31.35</h4>
						<h3>SALE: $25.50</h3>
					</div>
				</div>
				<div class="grid_3">
					<div class="item2">
						<h1><a href="teach1.php">Shelf Organizer</a></h1>
						<h2>Pacon Corporation</h2>
						<a href="teach1.php"><img class="brain3" src="img/item10a.png" alt="Shelf Organizer" /></a>
						<h4>Price: $30.15</h4>
						<h3>SALE: $25.50</h3>
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