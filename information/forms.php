<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Forms";
$current_page = "home";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
##################################################
?>
<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
<?php
	// If user is logged in, show documents
	if ($session->logged_in) {
?>
<br />
			<h2>Forms</h2>
			<p>If you don't see what you're looking for, just contact an officer!</p>
			<p>If you want to upload or update a document on this page feel free to contact webmaster.apousc@gmail.com!</p>                	
					<ul>
						<li><a href="https://goo.gl/forms/OGDeNB6XsVrpZ5cM2">Anon Evaluation Form</a></li>
		        <li><a href="https://goo.gl/forms/Oqg2mQ0OL2uuEK003">Event Evaluation Form</a></li>
						<li><a href='https://docs.google.com/forms/d/e/1FAIpQLSftdqT-xgSpVWNHtkmo7T4_L4NHbxt3iZlROEMcPVoxzlGUnw/viewform' target = "_blank">Diversity and Inclusion Survey</a></li>
					  <li><a href='https://goo.gl/forms/Ifx0WWwkXjrB4C303' target = "_blank">Diversity & Inclusion Event Reflection Form</a></li>
						<li><a href="https://drive.google.com/file/d/1lNKrfgsSEAuOeZdyZPvuFWw37KZqyM_v/preview?format=pdf" target = "_blank">Outside Service Hours Log</a></li>
            <li><a href="https://www.facebook.com/APO-Compliments-Spring-2020-115121043370901/">APO Compliments Form</a></li>
					</ul>
               	
<br />
				
			
<?php
	// If user is not logged in, display Restricted Area warning
	} else {
		echo "			<h2>Restricted Area</h2>\n";
		echo "			<p>Sorry, but you must be signed in to view this page.</p>\n";
	}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>
