<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Finance";
$current_page = "home";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
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
			<h2>Finance</h2>
			<p>If you don't see what you're looking for, just contact Lindsey Yu or Felicia Tejawinata!</p>

                <h3>Spring 2021 Information</h3>
                <ul>
                    <li><a href='https://docs.google.com/spreadsheets/d/1o3LOmUChGxSRILlPCeNK2OertuMHmrQjFfw9-JjTyfM/edit#gid=1809411573'>Budget</a></li>
                    <li>Venmo: @apoakusc</li>
                    <li>Email: <a href="mailto:finance.apousc@gmail.com">finance.apousc@gmail.com</a></li>
                </ul>
                
                <h3>Dues</h3>
                <p>Please contact Lindsey Yu or Felicia Tejawinata if you need additional financial accommodations for our payment plans.</p>
                <b>
			<h4>Actives: $150 regular, $135 early</h4>
                	<h4>Associates: $55 regular, $49 early</h4>
			<h4>New Members: $325 regular, n/a early</h4>
		</b>
		<b><p>Actives Payment Plan (Regular)</p></b>	
                <ul>
                    <li>Monday, February 10: $70</li>
                	<li>Monday, March 2: $40</li>
                    <li>Monday, March 30: $40</li>
            	</ul>
            	<b><p>Actives Payment Plan (Early)</p></b>	
                <ul>
                    <li>Monday, before February 10: $65</li>
                	<li>Monday, February 24: $35</li>
                    <li>Monday, March 23: $35</li>
            	</ul>
            	<b><p>Associates Payment Plan (Regular)</p></b>	
                <ul>
                    <li>Monday, February 10: $25</li>
                	<li>Monday, March 2: $15</li>
                    <li>Monday, March 30: $10</li>
            	</ul>
            	<b><p>Associates Payment Plan (Early)</p></b>	
                <ul>
                    <li>Monday, before February 10: $23</li>
                	<li>Monday, February 24: $13</li>
                    <li>Monday, March 23: $13</li>
            	</ul>
				<b><p>*If you do not pay your dues and do not communicate with the VPs, we will have to freeze your account until the matter is resolved.</p></b>
				
				<h3>Reimbursements</h3>
				
				<p>In order to get reimbursed, please send your receipts to Lindsey Yu, Felicia Tejawinata, or finance.apousc@gmail.com.</p>
				
<br />
				

			
			<p class="bottomNote">Note: <abbr title="Portable Document Format">PDF</abbr> files require the Adobe Reader from Adobe Systems, Incorporated. Adobe and the Adobe logo are trademarks of Adobe Systems, Incorporated. Click on the following link to download.</p>
			<a href="http://get.adobe.com/reader/"><img src="img/get_adobe_reader.png" height="39" width="158" alt="Download Adobe Reader" /></a>
<?php
	// If user is not logged in, display Restricted Area warning
	} else {
		echo "			<h2>Restricted Area</h2>¥n";
		echo "			<p>Sorry, but you must be signed in to view this page.</p>¥n";
	}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>
