<?php
	require ('./includes/config.inc.php');
	require (MYSQL);
	include ('./includes/header.php');
	
	if (isset($_GET["for"])) {
		$searchFor = $_GET["for"];
		$terms = preg_replace("/\"(.*?)\"/e", "search_transform_term('\$$searchFor')", $searchFor);
		$terms = preg_split("/\s+|,/", $terms);

		$out = array();

		foreach($terms as $term){

			$term = preg_replace("/\{WHITESPACE-([0-9]+)\}/e", "chr(\$searchFor)", $term);
			$term = preg_replace("/\{COMMA\}/", ",", $term);

			$out[] = $term;
		}

		$searchFor = $term;
	}
	else {
		$results = 0;
	}
?>
			<div id="home"> 
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

					$result = mysqli_query ($dbc, "SELECT * FROM products WHERE name LIKE '%$searchFor%' ORDER by name;");

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
			</div>
<?php include ('./includes/footer.php'); ?>