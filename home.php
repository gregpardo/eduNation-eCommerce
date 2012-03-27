<?php
	require ('./includes/config.inc.php');
	require (MYSQL);
	include ('./includes/header.php');
?>
			<div id="home"> 
				<div class="grid_12">
					<a href="#"><img class="search" src="img/search1.png" alt="search bar" /></a>
						<input class="search" type="text" />
				</div>
				<div class="grid_8">
					<?php 
						
						$result = mysqli_query ($dbc, "SELECT * FROM products WHERE is_featured=1 ORDER BY RAND() LIMIT 1");
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
   						{
					?>
					<div id="adv">
					
					<a href="catalog.php"><img class="display" src="<?php echo 'img/' . $row["image"] ?>" alt="Blockers" /></a>
						<h5>Limited Time Only</h5>
						<h1><?php echo $row["name"] ?></h1>
						<h2><?php echo $row["brand"] ?></h2>
						<ul>
							<li>Develops:</li>
							<li>- <?php echo $row["feat1"] ?></li>
							<li>- <?php echo $row["feat2"] ?></li>
							<li>- <?php echo $row["feat3"] ?></li>
						</ul>
						<h4>Price: $<?php echo $row["price"] ?></h4>
						<!-- Removed sale price until code is working -->
						<!-- <h3><a class="shopnow" href="catalog.php">SALE: $<?php echo $row["salePrice"] ?></a></h3>	-->
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
<?php include ('./includes/footer.php'); ?>