<?php

// This script defines any functions required by the various forms.
// This script is created in Chapter 4.

// This function generates a form INPUT or TEXTAREA tag.
// It takes three arguments:
// - The name to be given to the element.
// - The type of element (text, password, textarea).
// - An array of errors.
function create_form_input($name, $type, $errors) {
	
	// Assume no value already exists:
	$value = false;

	// Check for a value in POST:
	if (isset($_POST[$name])) $value = $_POST[$name];
	
	// Strip slashes if Magic Quotes is enabled:
	if ($value && get_magic_quotes_gpc()) $value = stripslashes($value);

	// Conditional to determine what kind of element to create:
	if ( ($type == 'text') || ($type == 'password') ) { // Create text or password inputs.
		
		// Start creating the input:
		echo '<input type="' . $type . '" name="' . $name . '" id="' . $name . '"';
		
		// Add the value to the input:
		if ($value) echo ' value="' . htmlspecialchars($value) . '"';

		// Check for an error:
		if (array_key_exists($name, $errors)) {
			echo 'class="error" /> <span class="error">' . $errors[$name] . '</span>';
		} else {
			echo ' />';		
		}
		
	} elseif ($type == 'textarea') { // Create a TEXTAREA.
		
		// Display the error first: 
		if (array_key_exists($name, $errors)) echo ' <span class="error">' . $errors[$name] . '</span>';

		// Start creating the textarea:
		echo '<textarea name="' . $name . '" id="' . $name . '" rows="5" cols="75"';
		
		// Add the error class, if applicable:
		if (array_key_exists($name, $errors)) {
			echo ' class="error">';
		} else {
			echo '>';		
		}
		
		// Add the value to the textarea:
		if ($value) echo $value;

		// Complete the textarea:
		echo '</textarea>';
		
	} // End of primary IF-ELSE.

} // End of the create_form_input() function.

// Omit the closing PHP tag to avoid 'headers already sent' errors!