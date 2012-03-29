<?php

/* 

Title: config.inc.php
Created by: Larry E. Ullman of DMC Insights, Inc. 
Contact: LarryUllman@DMCInsights.com, http://www.dmcinsights.com

Configuration file does the following things:
- Has site settings in one location.
- Stores URLs and URIs as constants.
- Sets how errors will be handled.

*** This is the configuration file for the administrative pages. There may be a separate one for the public side. ***

*/

// ********************************** //
// ************ SETTINGS ************ //

// Errors are emailed here.
$contact_email = 'you@example.com'; 

// Determine location of files and the URL of the site. Allows for development on different servers.
// Change the conditional from 1 to NULL to run the scripts using the second set of constants.
if ($_SERVER['HTTP_HOST']=='localhost') {
	$debug = TRUE;
	define ('BASE_URI', '/path/to/htdocs/folder/');
	define ('BASE_URL',	'http://www.address.com/');
	define ('MYSQL', '/path/to/mysql_connect.inc.php');
} else {
	define ('BASE_URI', '/path/to/htdocs/folder/');
	define ('BASE_URL',	'http://www.address.com/');
	define ('MYSQL', '/path/to/mysql_connect.inc.php');
}

/* Most important setting:
 * The $debug variable is used to set error management.
 * To debug a specific page, do this on that page:
 *	$debug = TRUE;
 *	require_once('./includes/config.inc.php');
 * To debug the entire site, do
 *  $debug = TRUE;
 * before this next conditional.
 */
 
$debug = TRUE;
if (!isset($debug)) {
	$debug = FALSE;
}

// ************ SETTINGS ************ //
// ********************************** //


// ****************************************** //
// ************ ERROR MANAGEMENT ************ //

// Create the error handler.
function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {

	global $debug, $contact_email;

	// Build the error message.
	$message = "An error occurred in script '$e_file' on line $e_line: \n<br />$e_message\n<br />";
	
	// Add the date and time.
	$message .= "Date/Time: " . date('n-j-Y H:i:s') . "\n<br />";
	
	// Append $e_vars to the $message.
	$message .= "<pre>" . print_r ($e_vars, 1) . "</pre>\n<br />";
	
	if ($debug) { // Don't show the specific error.
		echo '<div id="Error">' . $message . '</div><br />';
	} else { // Development (print the error).
		error_log ($message, 1, $contact_email); // Send email.
		// Only print an error message if the error isn't a notice.
		if ($e_number != E_NOTICE) {
			echo '<div id="Error">A system error occurred. We apologize for the inconvenience.</div><br />';
		}
	}

} // End of my_error_handler() definition.

// Use my error handler.
set_error_handler ('my_error_handler');

// ************ ERROR MANAGEMENT ************ //
// ****************************************** //

?>