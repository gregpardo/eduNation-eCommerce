<?php

// ********************************** //
// ************ SETTINGS ************ //

$live = false;
$contact_email = 'gregpardo@knights.ucf.com';

// ********************************** //
// ************ CONSTANTS *********** //

// Determine location of files and the URL of the site:
define ('BASE_URI', 'private/');
define ('BASE_URL', 'localhost/edunation/');
define ('PDFS_DIR', BASE_URI . 'pdfs/'); // Added in Chapter 5.
define ('MYSQL', BASE_URI . 'mysql.inc.php');

// Start the session:
session_start();


// ****************************************** //
// ************ ERROR MANAGEMENT ************ //

// Function for handling errors.
// Takes five arguments: error number, error message (string), name of the file where the error occurred (string) 
// line number where the error occurred, and the variables that existed at the time (array).
// Returns true.
function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {
	// Need these two vars:
	global $live, $contact_email;
	// Build the error message:
	$message = "An error occurred in script '$e_file' on line $e_line:\n$e_message\n";
	// Add the backtrace:
	$message .= "<pre>" .print_r(debug_backtrace(), 1) . "</pre>\n";
	
	if (!$live) { // Show the error in the browser.
		?>
			<div id="dialog-modal" title="eduNation Developer Error" class="error">
				<p><?php echo nl2br($message); ?></p>
			</div>
			<!-- Jquery popup with error -->
			<script>
			$(function() {
				// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
				$( "#dialog:ui-dialog" ).dialog( "destroy" );
			
				$( "#dialog-modal" ).dialog({
					height: 500,
					width: 700,
					modal: true
				});
			});
			</script>
		<?php
	} else { // Development (print the error).
		// Send the error in an email:
		error_log ($message, 1, $contact_email, 'From:admin@example.com');
		// Only print an error message in the browser, if the error isn't a notice:
		if ($e_number != E_NOTICE) {
			echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div>';
		}
	}
	
	return true; // So that PHP doesn't try to handle the error, too.
}

// Use our error handler:
set_error_handler ('my_error_handler');

// ******************************************* //
// ************ REDIRECT FUNCTION ************ //

// This function redirects invalid users.
// It takes two arguments: 
// - The session element to check
// - The destination to where the user will be redirected. 
function redirect_invalid_user($check = 'user_id', $destination = 'index.php', $protocol = 'http://') {
	// Check for the session item:
	if (!isset($_SESSION[$check])) {
		$url = $protocol . BASE_URL . $destination; // Define the URL.
		header("Location: $url");
		exit(); // Quit the script.
	}
} 


// For debugging
$_SESSION['user_id'] = "Admin";
$_SESSION['user_type'] = 'admin';
