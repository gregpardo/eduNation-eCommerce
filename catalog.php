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
			<div id="home"> 
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
						$result = mysqli_query ($dbc, "SELECT * FROM products WHERE category_id=$category ORDER by name;");

						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
						{
							$productPrice = $row['price'];
							$productLink = '<a href="product.php?product_id='.$row['id'].'">';
							$productName = $row['name'];
							$productBrand = $row['brand'];
							
							?>
							<div class="grid_3">
								<div class="item">
									<h1><?php echo $productLink ?></a><?php echo $productName ?></h1>
									<h2><?php echo $productBrand ?></h2>
									<?php echo $productLink ?><img src="img/<?php echo imageSmall($row['image']) ?>" alt="<?php echo $productName ?>" /></a>
									
							<?php
									$salePrice = productIsOnSale($dbc, $row['id']);
									// On sale display sale price
									if ($salePrice) {
										echo "<h4 class=\"sale\">Price: $productPrice</h4>";
										echo "<h3 class=\"sale\">SALE: $salePrice</h3>";
									}
									else {
										echo "<br /><br /><br /><h3>Price: $productPrice</h3>";
									}
							?>
								</div>
							</div>
							<?php
						}
					}
					// Display category links
					else {
						//print "No category";
				
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