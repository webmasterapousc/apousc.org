<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Requirements";
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
			<h3>Requirements</h3>

			<p>View the requirements for various types of members in Alpha Phi Omega.</p>
			<ul>
						<li><a href="requirements_a.php">Actives</a></li>
						<li><a href="requirements_p.php">Pledges</a></li>
						<li><a href="requirements_assoc.php">Associates</a></li>
			</ul>

<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>