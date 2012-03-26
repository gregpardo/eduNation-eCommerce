<?php
	require ('./includes/config.inc.php');
	require (MYSQL);
	include ('./includes/header.php');
?>
				<div class="grid_12">
				<p><a href="home.php">Home</a> &gt; <a href="catalog.php">Products</a> &gt; <a class="current" href="books.php">Books/DVDs</a></p>
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
			
				
			</div>
			<div class="grid_9 prefix_2 suffix_1">
				<div id="footer">
					<p>This site is not official and is an assignment for a UCF Digital Media course - <em class="it">designed by Michael Harrison</em></p>
				</div>
			</div>
<?php include ('./includes/footer.php'); ?>
