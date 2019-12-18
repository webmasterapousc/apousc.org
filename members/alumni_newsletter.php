<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Alumni Newsletter";
$current_page = "home";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>

<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
			<h2>Alumni Newsletter</h2>
			<img src="img/alumni_dinner.jpg" height="106" width="159" alt="Alumni Dinner" class="floatright border" />
			<p>Hey, Alpha Kappa alumni! Check out our newsletter to keep up-to-date with your favorite chapter and find out about exciting alumni events.</p>
			<h3 class="clear">Newsletter Archives</h3>
			<ul>
				<li><a href="http://us2.campaign-archive.com/?u=30e8b957b539ebca13292c403&amp;id=37f5705e48" rel="external">February 5, 2011</a></li>
			</ul>

<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>