<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Pledge Requirements";
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
		#mainContent ul ul {list-style:circle; margin-left:2.0em;}
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
			<h2>Pledge Requirements</h2>
			<div class="contentBox">
				<p class="center"><strong>All requirements must be met on, or before, the Initiation Ceremony at the end of each semester.</strong></p>
			</div>
			<h3>Requirements</h3>
				<ul>
					<li>Complete <strong>25 Service hours</strong>. Up to 6 of these hours can be from non-APO service events.</li>
					<li>Earn <strong>4 Fellowship points</strong></li>
					<li>Earn <strong>3 Fundraising points</strong></li>
					<li>Earn <strong>2 Interchapter points</strong></li>
					<li>Earn <strong>4 Membership points</strong></li>
					<li>Earn <strong>2 Philanthropy points</strong></li>
					<li>Earn <strong>2 Diversity & Inclusion points</strong></li>
					<li>Attend <strong>2 Pledge Class events</strong></li>
					<li>Attend <strong>the pledge mission and funtivity</strong></li>
					<li>Earn <strong>5 Enrichment points</strong></li>
					<li>100% <strong>Attendance</strong> at General Body Meetings (including pledge meetings)</li>
					<li>Attend at least 1 eboard meeting or find two hidden words in EBM minutes</li>
					<li>Interview 25 Actives, 3 Associates, the Big 4, one IC brother and all fellow Pledge Brothers</li>
					<li>Wear your pledge pin at all times</li>
					<li>If a pledge is unable to make an event they have signed up for, said pledge must notify the chair of that event at least 24 hours before that event. Failure to do so will result in a deduction of hours from their total amount of service hours or loss of points for other types of events, as well as a strike.</li>
				</ul>
<?php
	// If user is not logged in, display Restricted Area warning
	} else {
		echo "			<h2>Restricted Area</h2>\n";
		echo "				<p>Sorry, but you must be signed in to view this page.</p>\n";
	}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>