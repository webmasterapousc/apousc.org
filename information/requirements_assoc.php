<?php
// Google Analytics
include_once("include/analytics.php")

// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Associate Requirements";
$current_page = "home";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		"use strict";

		// Place all JS to be run on page load in this function
		$(document).ready(function () {
			makeRound(".contentBox", "10", "10", "10", "10");
		});
	//--><!]]>
	</script>
	<style type="text/css">
	<!--
		#mainContent ul {list-style:disc; margin-left:2.0em;}
	-->
	</style>
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
			<h2>Associate Requirements</h2>
			<div class="contentBox">
				<p class="center"><strong>To be considered in good standing, all requirements must be met before the last chapter meeting of each semester. In order to be eligible to run for office, requirements must be fulfilled by the Initiation Ceremony at the end of each semester.</strong></p>
			</div>
			<h3>Requirements</h3>
				<ul>
					<li>Must submit a written request with appropriate reasons to <?php echo email_link("apo@usc.edu","apo@usc.edu"); ?>.</li>
					<li>Complete 10 Service hours, from at least 3 events. No outside hours.</li>
					<li>Earn 2 Fellowship points.</li>
					<li>Earn 1 Fundraising point.</li>
					<li>Earn 3 Membership points.</li>
					<li>Attend 3 General Body Meetings.</li>
				</ul>
			<h3>Expectations</h3>
				<ul>
					<li>Meet with and interview with pledges.</li>
					<li>Help introduce others on campus to Alpha Phi Omega.</li>
				</ul>
			<h3>Membership Policies</h3>
				<ul>
					<li>Members may only be Associate for a maximum of 2 semesters. To appeal for a 3rd semester of associate standing, a member must submit a written request with appropriate reasons to <?php echo email_link("apo@usc.edu","apo@usc.edu"); ?></li>
					<li>Members who do not pay dues or do not complete their requirements will be listed as Inactive.</li>
					<li>If a member is Inactive for 2 consecutive semesters, said member will be removed from the chapter roster.</li>
					<li>If a member does not finish their requirements, said member must complete a Probationary Program the following semester of 5 additional service hours.</li>
				</ul>
<?php
	// If user is not logged in, display Restricted Area warning
	} else {
		echo "\t\t\t<h2>Restricted Area</h2>\n";
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view this page.</p>\n";
	}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>