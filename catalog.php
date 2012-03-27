<?php
	require ('./includes/config.inc.php');
	require (MYSQL);
	include ('./includes/header.php');
	
	if (isset($_GET["category"])) {
		$category = $_GET["category"];
		$result = mysqli_query ($dbc, "SELECT * FROM categories WHERE id=$category ORDER by name;");
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) $categoryName = $row['name'];

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
							echo ' &gt; <a class="current" href="catalog.php?category='.$category.'">'.$categoryName.'</a>';
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
							<?php 

							$result = mysqli_query ($dbc, "SELECT * FROM categories ORDER by name;");
							//trigger_error($result);
							$categories_rows = array();
							while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
							{
								array_push($categories_rows, $row);
								$categoryLink = '<a href="catalog.php?category='.$row['id'].'">';
								echo '<li>'.$categoryLink.$row['name'].'</a></li>';
							}
							?>
						</ul>
					</div>
				</div>
				<?php 
					// Display products in specific category
					if ($category) {
						print "TODO: Show all products in category";
					}
					// Display category links
					else {
						print "No category";
				
						foreach ($categories_rows as $row) {
							$categoryLink = '<a href="catalog.php?category='.$row['id'].'">';
							$image = $row['image'];
							$name = $row['name'];
						?>
				<div class="grid_3">
					<div class="prod">
						<h2><?php echo $categoryLink ?><?php echo $name ?></a></h2>
						<?php echo $categoryLink ?><img src="img/<?php echo $image ?>" alt="<?php echo $name ?>" /></a>
					</div>
				</div>
						<?php
						}
					}
				?>
			</div>
<?php include ('./includes/footer.php'); ?>