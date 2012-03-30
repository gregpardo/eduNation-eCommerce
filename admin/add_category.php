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
$add_category_errors = array();

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
	$display = "";
	// Check for a name:
	if (empty($_POST['name'])) {
		$add_category_errors['name'] = 'Please enter the name!';
	}
	
	// Check for a description:
	if (empty($_POST['description'])) {
		$add_category_errors['description'] = 'Please enter the description!';
	}
	
	// Check for an image:
	if (is_uploaded_file ($_FILES['image']['tmp_name']) && ($_FILES['image']['error'] == UPLOAD_ERR_OK)) {
		
		$file = $_FILES['image'];
		
		$size = ROUND($file['size']/1024);

		// Validate the file size:
		if ($size > 512) {
			$add_category_errors['image'] = 'The uploaded file was too large.';
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
			$add_category_errors['image'] = 'The uploaded file was not of the proper type.';
		} 
		
		// Move the file over, if no problems:
		if (!array_key_exists('image', $add_category_errors)) {

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
				
				//$large = resize_image($dest, "large");
				//$med = resize_image($dest, "med");
				$small = resize_image($dest, "small");
				
				$info = pathinfo($dest);
				$new_name =  pathinfo($dest);
				$new_name = $new_name['filename'].'.'.$new_name['extension'];
				$_SESSION['image']['new_name'] = imageSmall($new_name);
				$_SESSION['image']['file_name'] = imageSmall($new_name);
				
				// Print a message:
				$display .= '<h4>The file has been uploaded!</h4>';
				
			} else {
				trigger_error('The file could not be moved.');
				if (isset($dest)) unlink ($dest);
				
			}

		} // End of array_key_exists() IF.
		
	} elseif (!isset($_SESSION['image'])) { // No current or previous uploaded file.
		switch ($_FILES['image']['error']) {
			case 1:
			case 2:
				$add_category_errors['image'] = 'The uploaded file was too large.';
				break;
			case 3:
				$add_category_errors['image'] = 'The file was only partially uploaded.';
				break;
			case 6:
			case 7:
			case 8:
				$add_category_errors['image'] = 'The file could not be uploaded due to a system error.';
				break;
			case 4:
			default: 
				$add_category_errors['image'] = 'No file was uploaded.';
				break;
		} // End of SWITCH.

	} // End of $_FILES IF-ELSEIF-ELSE.
	
	if (empty($add_category_errors)) { // If everything's OK.
		
		// Add the category to the database:
		$q = 'INSERT INTO categories (name, description, image) VALUES (?, ?, ?)';

		// Prepare the statement:
		$stmt = mysqli_prepare($dbc, $q);
		
		// For debugging purposes:
		// if (!$stmt) echo mysqli_stmt_error($stmt);

		// Bind the variables:
		mysqli_stmt_bind_param($stmt, 'sss', $name, $desc, $image);
		
		//$desc, $_SESSION['image']['new_name'], $_POST['price'], $_POST['stock']);
		
		// Make the extra variable associations:
		$name = mysqli_real_escape_string($dbc, strip_tags($_POST['name']));
		$desc = mysqli_real_escape_string($dbc, strip_tags($_POST['description']));
		if (isset($_SESSION['image'])) $image = $_SESSION['image']['new_name'];
		else $image = "#";
		// Execute the query:
		mysqli_stmt_execute($stmt);
		
		if (mysqli_stmt_affected_rows($stmt) == 1) { // If it ran OK.
			
			// Print a message:
			$display .= '<h4>The category has been added!</h4>';
		
			// Clear $_POST:
			$_POST = array();
			
			// Clear $_FILES:
			$_FILES = array();
			
			// Clear $file and $_SESSION['image']:
			unset($file, $_SESSION['image']);
			$_POST['added'] = true;
					
		} else { // If it did not run OK.
			trigger_error('The category could not be added due to a system error. We apologize for any inconvenience.');
			unlink ($dest);
		}
				
	} // End of $errors IF.
	else {
		trigger_error("couldn't add it\n");
	}
} else { // Clear out the session on a GET request:
	unset($_SESSION['image']);	
} // End of the submission IF.

// Need the form functions script, which defines create_form_input():
require ('../includes/form_functions.inc.php');
?>	
<div id="home">
	<div class="grid_8">
		<div id="check">
			<?php 
			if (isset($_POST['added'])) {
				echo $display;
				?>
				<a href="index.php">Return to admin.</a>
				<?php
			}
			else {
			?>
			<h1>Enter a New Category:</h1>
			<form enctype="multipart/form-data" action="add_category.php" method="post" accept-charset="utf-8">

				<input type="hidden" name="MAX_FILE_SIZE" value="524288" />
				
				<fieldset><legend>Fill out the form to add a category to the catalog. All fields are required.</legend>
					
						<div class="field"><label for="name"><strong>Name</strong></label><br /><?php create_form_input('name', 'text', $add_category_errors); ?></div>
						
						<div class="field"><label for="description"><strong>Description</strong></label><br /><?php create_form_input('description', 'textarea', $add_category_errors); ?></div>
												
						<div class="field"><label for="image"><strong>Image</strong></label><br /><?php
					
						// Check for an error:
						if (array_key_exists('image', $add_category_errors)) {
							
							echo '<span class="error">' . $add_category_errors['image'] . '</span><br /><input type="file" name="image" class="error" />';
							
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
				
				<div class="field"><input type="submit" value="Add This category" class="button" /></div>
				
				
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