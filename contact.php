<?php
	require ('./includes/config.inc.php');
	require (MYSQL);
	include ('./includes/header.php');
	
?>
			<div id="home">
				<div class="grid_12">
				<p><a href="home.php">Home</a> &gt; <a class="current" href="contact.php">Contact Us</a></p>
					<a href="#"><img class="search" src="img/search1.png" alt="search bar" /></a>
						<input class="search" type="text" />
				</div>
			
				<div class="grid_8">
					<div id="contactus">
						<h1>We'd Like to Hear From You!</h1>
					<form action="">
						<fieldset>
							<p>Name: <input type="text" name="firstname" size="20px" /> 
							Email: <input type="text" name="lastname" size="45px"/></p>
						</fieldset>
						<fieldset>
							<p>Subject: <input type="text" name="subject" size="73px"/></p>
							<textarea rows="15" cols="70"></textarea>
						</fieldset>
					</form> 
					</div>
				</div>
				
				<div class="grid_3">
					<div id="contact">
						<h2>In Store Pick-up?</h2>
						<ul>
							<li>4000 Central Florida Blvd</li>
							<li>Orlando, FL 32816</li>
							<li>1-555-EDU-CATE</li>
							<li>&nbsp;</li>
							<li><h5>Questions/Comments?</h5></li>
							<li><a class="shopnow" href="contact.php">Contact us</a> via email or give us a call between <em class="it">9am-6pm M-F</em>.</li>
						</ul>
					</div>
				</div>
				
			</div>
			<div class="grid_9 prefix_2 suffix_1">
				<div id="footer">
				<p>This site is not official and is an assignment for a UCF Digital Media course - <em class="it">designed by Michael Harrison</em></p>
			</div>
		</div>
<?php include ('./includes/footer.php'); ?>