<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Add Polls";
$current_page = "add_polls";

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
			<h2>Add Survey</h2>

			<form id='add_poll_form' method='POST' action='add_poll_action.php'>
				Survey Name: <input type='text' name='poll_name'> <br/><br> 
				<!-- Poll Type (int): <input type='text' name='poll_type'> <br/> -->

				Survey URL: <input type='text' name='poll_url'> <br/><br>
				<input type='submit'> 
			</form>

<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>