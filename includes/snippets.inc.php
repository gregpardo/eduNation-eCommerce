<?php

// Returns user/admin link with the username
function getUserNameLink() {
	if (isset($_SESSION['user_id'])) {
		// Is admin
		if (isset($_SESSION['user_admin'])) {
			return '<a href="admin.php">' . $_SESSION['user_id'] . '</a>';
		}
		// Is regular user
		else {
			return '<a href="client.php">' . $_SESSION['user_id'] . '</a>';
		}
	}
	else require ('login_form.inc.php'); // Show login form if not logged in
}

