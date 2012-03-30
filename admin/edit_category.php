<?php

// This file allows the administrator to add a non-coffee category.
// This script is created in Chapter 11.

// Require the configuration before any PHP code as configuration controls error reporting.
require ('../includes/config.inc.php');

// Set the page title and include the header:
$page_title = 'Add a category';
include ('./includes/header.php');

// The header file begins the session.

// Require the database connection:
require(MYSQL);

// For storing errors:
$edit_category_errors = array();



// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
	$display = "";
	// Check for a id:
	if (!isset($_POST['id']) || !filter_var($_POST['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
		$edit_category_errors['id'] = 'Please select an ID!';
	}
	
	// Check for a category:
	if (!isset($_POST['category_id']) || !filter_var($_POST['category_id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
		$edit_category_errors['category_id'] = 'Please select a category!';
	}

	// Check for a price:
	if (empty($_POST['price']) || !filter_var($_POST['price'], FILTER_VALIDATE_FLOAT) || ($_POST['price'] <= 0)) {
		$edit_category_errors['price'] = 'Please enter a valid price!';
	}
	
	// Check for a cost:
	if (empty($_POST['cost']) || !filter_var($_POST['cost'], FILTER_VALIDATE_FLOAT) || ($_POST['cost'] <= 0)) {
		$edit_category_errors['cost'] = 'Please enter a valid cost!';
	}
	
	// Check for a stock:
	if (empty($_POST['stock']) || !filter_var($_POST['stock'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
		$edit_category_errors['stock'] = 'Please enter the quantity in stock!';
	}

	// Check for a feature:
	if (empty($_POST['feat1'])) {
		$edit_category_errors['feat1'] = 'Please enter a feature here!';
	}
	// Check for a feature:
	if (empty($_POST['feat2'])) {
		$edit_category_errors['feat2'] = 'Please enter a feature here!';
	}
	// Check for a feature:
	if (empty($_POST['feat3'])) {
		$edit_category_errors['feat3'] = 'Please enter a feature here!';
	}
	
	// Check for a name:
	if (empty($_POST['name'])) {
		$edit_category_errors['name'] = 'Please enter the name!';
	}
	
	// Check for a description:
	if (empty($_POST['description'])) {
		$edit_category_errors['description'] = 'Please enter the description!';
	}

	// Check for a is_featured:
	if (!isset($_POST['is_featured'])) {
		$edit_category_errors['is_featured'] = 'Please choose if the category should be featured!';
	}
	
	// Check for an image:
	if (is_uploaded_file ($_FILES['image']['tmp_name']) && ($_FILES['image']['error'] == UPLOAD_ERR_OK)) {
		
		$file = $_FILES['image'];
		
		$size = ROUND($file['size']/1024);

		// Validate the file size:
		if ($size > 512) {
			$edit_category_errors['image'] = 'The uploaded file was too large.';
		} 

		// Validate the file type:
		$allowed_mime = array ('image/gif', 'image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		$allowed_extensions = array ('.jpg', '.gif', '.png', 'jpeg');
		$image_info = getimagesize($file['tmp_name']);

		
		$ext = substr($file['name'], -4);
		if ( (!in_array($file['type'], $allowed_mime)) 
		||   (!in_array($image_info['mime'], $allowed_mime) ) 
		||   (!in_array($ext, $allowed_extensions) ) 
		) {
			$edit_category_errors['image'] = 'The uploaded file was not of the proper type.';
		} 
		
		// Move the file over, if no problems:
		if (!array_key_exists('image', $edit_category_errors)) {

			// Create a new name for the file:
			//$new_name = (string) sha1($file['name'] . uniqid('',true));

			// Add the extension:
			//$new_name .= ((substr($ext, 0, 1) != '.') ? ".{$ext}" : $ext);
			
			// Move the file to its proper folder but add _tmp, just in case:
			$dest =  "../img/".$file['name'];
			
			if (move_uploaded_file($file['tmp_name'], $dest)) {
				
				// Store the data in the session for later use:
				//$_SESSION['image']['new_name'] = $new_name;
				//$_SESSION['image']['file_name'] = $new_name;
				
				$large = resize_image($dest, "large");
				$med = resize_image($dest, "med");
				$small = resize_image($dest, "small");
				
				$info = pathinfo($dest);
				$new_name =  pathinfo($dest);
				$new_name = $new_name['filename'].'.'.$new_name['extension'];
				//$_SESSION['image']['new_name'] = $new_name;
				//$_SESSION['image']['file_name'] = $new_name;
				$_SESSION['image'] = $new_name;
				
				// Print a message:
				$display .= '<h4>Image upload successful!</h4><br />';
				
			} else {
				trigger_error('The file could not be moved.');
				unlink ($dest);
				
			}

		} // End of array_key_exists() IF.
		
	} elseif (!isset($_SESSION['image'])) { // No current or previous uploaded file.
		switch ($_FILES['image']['error']) {
			case 1:
			case 2:
				$edit_category_errors['image'] = 'The uploaded file was too large.';
				break;
			case 3:
				$edit_category_errors['image'] = 'The file was only partially uploaded.';
				break;
			case 6:
			case 7:
			case 8:
				$edit_category_errors['image'] = 'The file could not be uploaded due to a system error.';
				break;
			case 4:
			default: 
				$edit_category_errors['image'] = 'No file was uploaded.';
				break;
		} // End of SWITCH.

	} // End of $_FILES IF-ELSEIF-ELSE.
	

	if (empty($edit_category_errors)) { // If everything's OK.
		$id = $_POST['id'];
		
		// Add the category to the database:
		//$q = "UPDATE categories SET category_id=?, name=?, brand=?, description=?, price=?, cost=?, feat1=?, feat2=?, feat3=?, image=?, is_featured=?, stock=? WHERE id=$id";
		$q = "UPDATE categories SET name=?, brand=?, description=? WHERE id=?";
		
		// Prepare the statement:
		//$stmt = mysqli_prepare($dbc, $q);
		
		// For debugging purposes:
		//if (!$stmt) echo mysqli_stmt_error($stmt);

		// Bind the variables:
		//mysqli_stmt_bind_param($stmt, 'isssddssssii', $_POST['category_id'], $name, $brand, $desc, $_POST['price'], $_POST['cost'], $feat1, $feat2, $feat3, $_SESSION['image']['new_name'], $isFeatured, $_POST['stock']);
		//mysqli_stmt_bind_param($stmt, 'sssi', $name, $brand, $desc, $id);
		
		//$desc, $_SESSION['image']['new_name'], $_POST['price'], $_POST['stock']);
		
		// Make the extra variable associations:
		$category = $_POST['category_id'];
		$name = mysqli_real_escape_string($dbc, strip_tags($_POST['name']));
		$brand = mysqli_real_escape_string($dbc, strip_tags($_POST['brand']));
		$desc = mysqli_real_escape_string($dbc, strip_tags($_POST['description']));
		$feat1 = mysqli_real_escape_string($dbc, strip_tags($_POST['feat1']));
		$feat2 = mysqli_real_escape_string($dbc, strip_tags($_POST['feat2']));
		$feat3 = mysqli_real_escape_string($dbc, strip_tags($_POST['feat3']));
		$price = (double)$_POST['price'];
		$cost = (double)$_POST['cost'];
		//if (isset($_SESSION['image']['new_name'])) $image = $_SESSION['image']['new_name'];
		if (isset($_SESSION['image'])) $image = $_SESSION['image'];
		else $image = "#";
		
		$stock = $_POST['stock'];
		
		if ($_POST['is_featured'] == "yes") $isFeatured = true;
		else if ($_POST['is_featured'] == "no") $isFeatured = false;
	
		// Execute the query:
		//mysqli_stmt_execute($stmt);
		$q = "UPDATE categories SET category_id='$category', name='$name', brand='$brand', description='$desc', price='$price', cost='$cost', 
			feat1='$feat1', feat2='$feat2', feat3='$feat3', image='$image', is_featured='$isFeatured', stock='$stock' WHERE id=$id";
			
		mysqli_query($dbc, $q);
		//trigger_error(mysqli_affected_rows($dbc). $q);
		if (mysqli_affected_rows($dbc) > -1) { // If it ran OK.
			
			// Print a message:
			$display .= '<h4>The category has been updated!</h4><br />';
		
			// Clear $_POST:
			$_POST = array();
			
			// Clear $_FILES:
			$_FILES = array();
			
			// Clear $file and $_SESSION['image']:
			unset($file, $_SESSION['image']);
			$_POST['uploaded'] = true;
					
		} else { // If it did not run OK.
			trigger_error("Something went wrong.".mysqli_error($dbc) );
			//trigger_error('The category could not be added due to a system error. We apologize for any inconvenience.');
			//trigger_error(mysqli_stmt_error($stmt));
			//trigger_error(mysqli_error($dbc));
			//trigger_error(mysqli_connect_error());
			if (isset($dest)) unlink ($dest);
		}
				
	} // End of $errors IF.
	else {
		trigger_error("couldn't add it\n");
	}
} else { // Clear out the session on a GET request:
	//unset($_SESSION['image']);	
	if (isset($_GET['category_id'])) {
		$categoryID = $_GET['category_id'];
		$result = mysqli_query ($dbc, "SELECT * FROM categories WHERE id=$categoryID ORDER by name;");

		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{	
			$_POST['id'] = $row['id'];
			$_POST['category_id'] = $row['category_id'];
			$_POST['name'] = $row['name'];
			$_POST['brand'] = $row['brand'];
			$_POST['price'] = $row['price'];
			$_POST['cost'] = $row['cost'];
			$_POST['feat1'] = $row['feat1'];
			$_POST['feat2'] = $row['feat2'];
			$_POST['feat3'] = $row['feat3'];
			$_SESSION['image'] = $row['image'];
			$_SESSION['image'] = $row['image'];
			$_POST['description'] = $row['description'];
			$_POST['is_featured'] = $row['is_featured'];
			$_POST['stock'] = $row['stock'];

		}
	}
	else {
		echo "Invalid ID.";
	}
} // End of the submission IF.

// Need the form functions script, which defines create_form_input():
require ('../includes/form_functions.inc.php');
?>	
<div id="home">
	<div class="grid_11">
		<div id="check">
			<?php 
			if (isset($_POST['uploaded'])) {
				echo $display;
				?>
				<a href="index.php">Return to admin.</a>
				<?php
			}
			else {
			?>
			<h1>Editing category:</h1>
			<form enctype="multipart/form-data" action="edit_category.php" method="post" accept-charset="utf-8">
				
				<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
				
				<fieldset><legend>Fill out the form to edit the category. All fields are required.</legend>
					<?php
						if (isset($_SESSION['image'])) {
							echo '<img src="../img/' . $_SESSION['image'] . '" alt="#" style="float:right;" />';
						} ?>
					<div class="field"><label for="id"><strong>category ID</strong></label><br /><?php create_form_input('id', 'text', $edit_category_errors); ?></div>
					
					<div class="field"><label for="category_id"><strong>Category</strong></label><br /><select name="category_id"<?php if (array_key_exists('category_id', $edit_category_errors)) echo ' class="error"'; ?>>
						<option>Select One</option>
						
						
						<?php // Retrieve all the categories and add to the pull-down menu:
						$q = 'SELECT id, name FROM categories ORDER BY name ASC';		
						$r = mysqli_query ($dbc, $q);
							while ($row = mysqli_fetch_array ($r, MYSQLI_NUM)) {
								echo "<option value=\"$row[0]\"";
								// Check for stickyness:
								if (isset($_POST['category_id']) && ($_POST['category_id'] == $row[0]) ) echo ' selected="selected"';
								echo ">$row[1]</option>\n";
							}
						?>
						</select><?php if (array_key_exists('category_id', $edit_category_errors)) echo ' <span class="error">' . $edit_category_errors['category_id'] . '</span>'; ?></div>
					
						<div class="field"><label for="name"><strong>Name</strong></label><br /><?php create_form_input('name', 'text', $edit_category_errors); ?></div>
						
						<div class="field"><label for="brand"><strong>Brand</strong></label><br /><?php create_form_input('brand', 'text', $edit_category_errors); ?></div>
						
						<div class="field"><label for="price"><strong>Price</strong></label><br /><?php create_form_input('price', 'text', $edit_category_errors); ?> <small>Without the dollar sign.</small></div>
						
						<div class="field"><label for="cost"><strong>Cost</strong></label><br /><?php create_form_input('cost', 'text', $edit_category_errors); ?> <small>Without the dollar sign.</small></div>
						
						<div class="field"><label for="feat1"><strong>Feature 1</strong></label><br /><?php create_form_input('feat1', 'text', $edit_category_errors); ?></div>
						<div class="field"><label for="feat2"><strong>Feature 2</strong></label><br /><?php create_form_input('feat2', 'text', $edit_category_errors); ?></div>
						<div class="field"><label for="feat3"><strong>Feature 3</strong></label><br /><?php create_form_input('feat3', 'text', $edit_category_errors); ?></div>
						
						<div class="field"><label for="stock"><strong>Initial Quantity in Stock</strong></label><br /><?php create_form_input('stock', 'text', $edit_category_errors); ?></div>
						
						<div class="field"><label for="description"><strong>Description</strong></label><br /><?php create_form_input('description', 'textarea', $edit_category_errors); ?></div>
						
						<div class="field"><label for="is_featured"><strong>Featured?</strong></label><br />
							<select name="is_featured"<?php if (array_key_exists('is_featured', $edit_category_errors)) echo ' class="error"'; ?>>
								<option value="no" <?php if (isset($_POST['is_featured']) && ($_POST['is_featured'] == $row[0]) ) echo ' selected="selected"'; ?>>No</option>
								<option value="yes" <?php if (isset($_POST['is_featured']) && ($_POST['is_featured'] == $row[0]) ) echo ' selected="selected"'; ?>>Yes</option>
							</select><?php if (array_key_exists('is_featured', $edit_category_errors)) echo ' <span class="error">' . $edit_category_errors['is_featured'] . '</span>'; ?>
						</div>
												
						<div class="field"><label for="image"><strong>Image</strong></label><br /><?php
						// Check for an error:
						if (array_key_exists('image', $edit_category_errors)) {
							
							echo '<span class="error">' . $edit_category_errors['image'] . '</span><br /><input type="file" name="image" class="error" />';
							
						} else { // No error.

							echo '<input type="file" name="image" />';

							// If the file exists (from a previous form submission but there were other errors),
							// store the file info in a session and note its existence:		
							/*if (isset($_SESSION['image'])) {
								echo "<br />Currently '{$_SESSION['image']['file_name']}'";
							}*/

						} // end of errors IF-ELSE.
						
					 ?></div>
				
				<br clear="all" />
				
				<div class="field"><input type="submit" value="Update This category" class="button" /></div>
				
				
				</fieldset>

			</form> 
			
			<?php 
			}
			?>
		</div>
	</div>
</div>
<?php // Include the HTML footer:
include ('./includes/footer.php');
?>