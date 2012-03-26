<?php
	require ('./includes/config.inc.php');
	require (MYSQL);
	include ('./includes/header.php');
	
	if (isset($_GET["category"])) {
		$category = $_GET["category"];
	}
	else {
		$category = null;
	}
?>
				<div class="grid_12">
				<p><a href="home.php">Home</a> &gt; 
					<?php
						if ($category) {
							echo '<a href="catalog.php">Products</a>';
							echo '<a class="current" href="catalog.php?category='.$category.'">Products</a>';
						}
						else {
							echo '<a class="current" href="catalog.php">Products</a>';
						}
					?>
				</p>
					<a href="#"><img class="search" src="img/search1.png" alt="search bar" /></a>
						<input class="search" type="text" />
				</div>
				<div class="grid_2">
					<div id="sidenav">
						<ul>
							<!-- 
							<li><a href="arts.php">Arts/Crafts</a></li>
							<li><a href="books.php">Books/DVDs</a></li>
							<li><a href="decor.php">Decorations</a></li>
							<li><a href="games.php">Games</a></li>
							<li><a href="teach.php">Teacher Aids</a></li> -->
						</ul>
					</div>
				</div>
				<div class="grid_3">
					<div class="prod">
						<h2><a href="arts.php">Arts/Crafts</a></h2>
						<a href="arts.php"><img src="img/item2a.png" alt="arts/crafts" /></a>
					</div>
				</div>
				<div class="grid_3">
					<div class="prod">
						<h2><a href="books.php">Books/DVDs</a></h2>
						<a href="books.php"><img class="move" src="img/item5a.png" alt="books/dvds" /></a>
					</div>
				</div>
				<div class="grid_3">
					<div class="prod">
						<h2><a href="decor.php">Decorations</a></h2>
						<a href="decor.php"><img src="img/item9b.png" alt="decorations" /></a>
					</div>
				</div>
				<div class="grid_3">
					<div class="prod">
						<h2><a href="games.php">Games</a></h2>
						<a href="games.php"><img src="img/item1a.png" alt="games" /></a>
					</div>
				</div>
				<div class="grid_3">
					<div class="prod">
						<h2><a href="teach.php">Teacher Aids</a></h2>
						<a href="teach.php"><img src="img/item10b.png" alt="teacher aids" /></a>
					</div>
				</div>
			</div>
<?php include ('./includes/footer.php'); ?>