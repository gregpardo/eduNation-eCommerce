<?php

// This file allows the administrator to add a non-coffee product.
// This script is created in Chapter 11.

// Require the configuration before any PHP code as configuration controls error reporting.
require ('../includes/config.inc.php');

// Set the page title and include the header:
$page_title = 'View Product Catalog';
include ('./includes/header.php');

// The header file begins the session.

// Require the database connection:
require(MYSQL);

// Need the form functions script, which defines create_form_input():
require ('../includes/form_functions.inc.php');
?>
<div id="home2">
	<div class="grid_2">
		<div id="sidenav">
			<ul>
				<li><h3>Products</h3></li>
				<li><a href="view_products.php">View Products</a></li>
				<li><a href="add_product.php">Add a Product</a></li>
			</ul>
			<ul>
				<li><h3>Categories</h3></li>
				<li><a href="view_categories.php">View Categories</a></li>
				<li><a href="add_category.php">Add a Category</a></li>
			</ul>
			<ul>
				<li><h3>Sales</h3></li>
				<li><a href="view_sales.php">View Sales</a></li>
				<li><a href="add_sale.php">Create Sale</a></li>
			</ul>
			<ul>
				<li><h3>Orders</h3></li>
				<li><a href="view_orders.php">View Orders</a></li>
			</ul>
		</div>
	</div>
	<div class="grid_9">
		<div id="check">
			<h1>Product Catalog</h1>
			<?php 
			$result = mysqli_query ($dbc, "SELECT * FROM products ORDER by name;");
			echo "<table class=\"list_table\">";
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				$productPrice = $row['price'];
				$productLink = '<a href="product.php?product_id='.$row['id'].'">';
				$productName = $row['name'];
				$productBrand = $row['brand'];
				
				?>
				<tr>
					<td><?php echo $productName ?></td>
					<td><?php echo $productBrand ?></td>
					<td><?php echo $productPrice ?></td>
					<td><a href="edit_product.php?product_id=<?php echo $row['id'] ?>">Edit</a></td>
					<td><a href="delete_product.php?product_id=<?php echo $row['id'] ?>">Delete</a></td>
				</tr>
				<?php
			}
			echo "</table>";
			?>
		</div>
	</div>
</div>
<?php // Include the HTML footer:
include ('./includes/footer.php');
?>