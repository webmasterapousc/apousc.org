<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Active Requirements";
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
			<h2>Active Requirements</h2>
			<div class="contentBox">
				<p class="center"><strong>To be considered in good standing, all requirements must be met before the last chapter meeting of each semester. In order to be eligible to run for office, requirements must be fulfilled by the Initiation Ceremony at the end of each semester.</strong></p>
			</div>
			<h3>Requirements</h3>
				<ul>
					<li>Complete <strong>25 Service hours</strong>. Up to 6 of these hours can be from non-APO service events.</li>
					<li>Earn <strong>4 Fellowship points</strong></li>
					<li>Earn <strong>3 Fundraising points</strong></li>
					<li>Earn <strong>2 Interchapter points</strong></li>
					<li>Earn <strong>2 Philanthropy points</strong></li>
					<li>Earn <strong>4 Membership points</strong> (includes Alumni events, Family events, Leadership (i.e. LEADS workshops), and serving on a committee)</li>
					<li>Earn <strong>2 Diversity & Inclusion points</strong></li>
					<li>Attend at least 8 of the general body meetings</li>
					<li>Attend at least 1 eboard meeting or find two hidden words in EBM minutes</li>
					<li>If a member is unable to make an event they have signed up for, said member must notify the chair of that event <em>at least</em> 24 hours before that event. Failure to do so will result in a deduction of hours from said member's total amount of service hours or loss of points for other types of events.</li>
				</ul>
			<h3>Expectations</h3>
				<ul>
					<li>Meet with and interview with pledges</li>
					<li>Help introduce others on campus to Alpha Phi Omega</li>
				</ul>
			<h3>Membership Policies</h3>
				<ul>
					<li>Members who do not pay dues or do not complete their requirements will be listed as Inactive</li>
					<li>If a member is Inactive for 2 consecutive semesters, said member will be removed from the chapter roster</li>
					<li>If a member does not finish their requirements, said member must complete a Probationary Program the following semester of 5 additional service hours.</li>
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