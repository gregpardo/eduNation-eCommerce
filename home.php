<?php
	$connection = mysql_connect("localhost","mi226092","harrison") or die ("ouchie");
	//$connection = mysql_connect("localhost","root","root") or die ("ouchie");
	mysql_select_db("mi226092", $connection);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>EduNation Home - Michael Harrison</title>
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
					<a href="#"><img class="search" src="img/search1.png" alt="search bar" /></a>
						<input class="search" type="text" />
				</div>
				<div class="grid_8">
					<?php 
						$result = mysql_query ("SELECT * FROM products ORDER BY RAND() LIMIT 1", $connection);
						while ($row = mysql_fetch_array($result))
   						{
					?>
					<div id="adv">
					
					<a href="catalog.php"><img class="display" src="<?php echo 'img/' . $row["productImage"] ?>" alt="Blockers" /></a>
						<h5>Limited Time Only</h5>
						<h1><?php echo $row["productName"] ?></h1>
						<h2><?php echo $row["brandName"] ?></h2>
						<ul>
							<li>Develops:</li>
							<li>- <?php echo $row["feat1"] ?></li>
							<li>- <?php echo $row["feat2"] ?></li>
							<li>- <?php echo $row["feat3"] ?></li>
						</ul>
						<h4>Price: $<?php echo $row["price"] ?></h4>
						<h3><a class="shopnow" href="catalog.php">SALE: $<?php echo $row["salePrice"] ?></a></h3>	
					</div>
					<?php } ?>
				</div>
				<div class="grid_3">
					<div class="adv2">
					<img src="img/item5a.png" alt="Children's Books" />
						<h3>15%-20% off</h3>
						<h4>Books/DVDs <br />K - 5th</h4>
						<a class="shopnow" href="books.php">Shop Now &gt;</a>	
					</div>
					<div class="adv2">
					<img src="img/chalk.png" alt="Children's Books" />
						<h3>New Items</h3>
						<h4>Arts/Crafts <br />Supplies</h4>
						<a class="shopnow" href="arts.php">Shop Now &gt;</a>	
					</div>	
				</div>
				<div class="grid_12">
					<div id="ship">
						<h1><em>Teachers,</em> you may qualify for <em class="under">Free Shipping</em>!</h1>
						<p><a class="shopnow" href="#">Learn More &gt;</a></p>
					</div>
				</div>
				<div class="grid_8">
					<div id="descrip">
						<h1>The Elementary Ed. Supply Headquarters</h1>
						<p><em class="it">EduNation</em> is the place to be if you are looking for the lowest prices on elementary classroom and educational supplies.  Whether you have a little scholar of your own or teach a whole gaggle of them, <em class="it">EduNation</em> has the student and classroom supplies you need to keep their minds active and engaged.  From textbooks to art supplies, we are here to make sure you and your students are on the pinnacle of the current trends in elementary education and classroom experiences.</p>
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