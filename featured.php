<?php
	require ('./includes/config.inc.php');
	require (MYSQL);
	include ('./includes/header.php');
	
?>
			<div id="home2"> 
				<div class="grid_12">
				<p><a href="home.php">Home</a> &gt; <a class="current" href="featured.php">Featured Items</a></p>
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
				$result = mysqli_query ($dbc, "SELECT * FROM products WHERE is_featured=1 ORDER by name;");

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
				?>
				<!-- <div class="grid_3">
					<div class="item">
						<h1><a href="art1.php">Jumbo Chalk</a></h1>
						<h2>Melissa &amp; Doug</h2>
						<a href="art1.php"><img src="img/item2a.png" alt="jumbo chalk" /></a>
						<h4>Price: $2.55</h4>
						<h3>SALE: $2.00</h3>
					</div>
				</div> -->
				
			</div>
<?php include ('./includes/footer.php'); ?>