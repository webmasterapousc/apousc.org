<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Page Not Found - 404 Error";
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
			<h2>Page Not Found</h2>
			<img src="img/yuknow404.jpg" width="560" height="373" alt="404 Error Message: Page Not Found" class="border" />
			<p>We apologize for the inconvenience, but the file you were trying to access may have been moved, renamed, or is temporarily unavailable. Please use the links at the top of the page <?php if($session->logged_in){echo "or in the sidebar ";} ?>to find what your were looking for! If you are having any problems, please feel free to <a href="contact.php">contact the Webmaster</a>.</p>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>