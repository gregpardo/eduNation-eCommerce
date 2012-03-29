<?php 
	require ('../includes/snippets.inc.php');	// Needed for common functions
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<!-- Print either regular title or the page title -->
		<title>
		<?php if (isset($page_title)) {
			echo $page_title;
		} else {
			echo 'eduNation - Group 6';
		}
		?>
		</title>
		<link rel="stylesheet" href="../css/reset.css" />
		<link rel="stylesheet" href="../css/text.css" />
		<link rel="stylesheet" href="../css/960.css" />
   		<link rel="stylesheet" href="../css/styles.css" />
		<link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.8.18.custom.min.js"></script>
	</head>
<body>
<div id="topbar">
	<div class="container_12">
		<p><a href="#"><img src="../img/shopping_cart_2 copy.png" alt="shopping cart" /></a><?php echo getUserNameLink(); ?> | <a href="#">Log out</a></p>
	</div>
</div>
	<div class="container_12">
		<div id="content">
			<div id="header">
				<div class="grid_10">
					<a href="home.php"><img src="../img/EN_logo.png" alt="EduNation logo" /></a>
				</div>
					<div class="grid_5">
						<ul>
							<!-- MENU -->
							<?php // Dynamically create header menus...
							
							// Array of labels and pages (without extensions):
							$pages = array (
								'PRODUCTS' => 'catalog.php',
								'FEATURED ITEMS' => 'featured.php',
								'CONTACT US' => 'contact.php'
							);

							// The page being viewed:
							$this_page = basename($_SERVER['PHP_SELF']);
							
							$tabnum = 1;
							// Create each menu item:
							foreach ($pages as $k => $v) {
								echo '<li><div';
								echo ' class="tab'.$tabnum.'"';
								echo '><a href="' . $v . '">' . $k . '</a></div></li>
								';
								$tabnum++;
							} // End of FOREACH loop.
							
							// For some reason mikes code needs 4 list items to display correctly (quick hack)
							while ($tabnum <= 4) {
								echo '<li></li>';
								$tabnum++;
							}
							
							?>
							<!-- END MENU -->
						</ul>
					</div>
					<div class="grid_7">
						<ul class="right">
							<li>Welcome Back!  You are currently logged in as <?php echo getUserNameLink(); ?>.</li>
							<li><div class= "tab4"><a href="cart.php">CART (3)</a></div></li>
						</ul>
					</div>

			</div>
			<!-- Content goes below -->