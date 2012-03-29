<?php
	require ('./includes/config.inc.php');
	require (MYSQL);
	include ('./includes/header.php');
	
	if (isset($_GET["product_id"])) {
		$productID = $_GET["product_id"];
	}
	else {
		$productID = null;
	}
?>
			<div id="home"> 
				<div class="grid_12">
				
				
				<p><a href="home.php">Home</a> &gt; 
					<?php
						// This code does Products -> Category -> Current Product Name
						if ($productID) {
							echo '<a href="catalog.php">Products</a>';
							$result = mysqli_query ($dbc, "SELECT category_id,name FROM products WHERE id=$productID;");
							$row = mysqli_fetch_assoc($result);
							$productName = $row['name'];
							$categoryID = $row['category_id'];
							
							$result = mysqli_query ($dbc, "SELECT id,name FROM categories WHERE id=$categoryID;");
							$row = mysqli_fetch_assoc($result);
							
							$categoryName = $row['name'];
							$categoryID = $row['id'];
							
							echo ' &gt; <a href="catalog.php?category='.$categoryID.'">'.$categoryName.'</a>';
							echo ' &gt; <a class="current" href="product.php?product_id='.$productID.'">'.$productName.'</a>';
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
					if (!$productID) {
						print "Please select a product first.";
					}
					// Display category links
					else {
						$result = mysqli_query ($dbc, "SELECT * FROM products WHERE id=$productID");

						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
						{
							$productPrice = $row['price'];
							$productLink = '<a href="product.php?product_id='.$row['id'].'">';
							$productName = $row['name'];
							$productBrand = $row['brand'];
							$productDesc = $row['description'];
							$image = $row['image'];
						?>
				<div class="grid_4 suffix_1">
					<div id="item">
						<?php 
						echo "<h1>".$productName."</a></h1>";
						echo "<h2>".$productBrand."</h2>";
						echo "<img src=\"img/".imageLarge($image)."\" alt=\"$productName\" />";
						?>
					</div>
				</div>
				<div class="grid_3">
					<div id="itemright">
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
						<p>Qty:<input type="text" /></p>
						<p><?php echo $productDesc ?></p>
						<div class="tab4"><a href="#">Add to Cart</a></div>
					</div>
				</div>
						<?php
						}
					}
				?>
				<!-- 
				<div class="grid_4 suffix_1">
					<div id="item">
						<h1>Jumbo Chalk</h1>
						<h2>Melissa &amp; Doug</h2>
						<img src="img/item2.jpg" alt="jumbo chalk" />
					</div>
				</div>
				<div class="grid_3">
					<div id="itemright">
						<h4>Price: $2.55</h4>
						<h3>SALE: $2.00</h3>
						<p>Qty:<input type="text" /></p>
						<p>10 ct. Colorful, chunky, triangular chalk sticks are easy to grasp and won't roll away! Non-toxic chalk is great inside for chalkboards or paper, or outside for sidewalk fun! The unique shape will help develop the preferred grip for later writing skills.</p>
						<div class="tab4"><a href="#">Add to Cart</a></div>
					</div>
				</div>
				-->
			</div>
<?php include ('./includes/footer.php'); ?>