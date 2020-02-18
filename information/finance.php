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
			<p>If you don't see what you're looking for, just contact Angela Chuang or Matthew Lee!</p>

                <h3>Fall 2019 Information</h3>
                <ul>
                    <li><a href='https://docs.google.com/spreadsheets/d/1o3LOmUChGxSRILlPCeNK2OertuMHmrQjFfw9-JjTyfM/edit#gid=1809411573'>Budget</a></li>
                    <li>Venmo: @apoakusc</li>
                    <li>Email: <a href="mailto:finance.apousc@gmail.com">finance.apousc@gmail.com</a></li>
                </ul>
                
                <h3>Dues</h3>
                <p>Please contact Matthew and Angela if you need additional financial accommodations for our payment plans.</p>
                <h4>Actives: $150</h4>
                <p>Payment Plan</p>
                <ul>
                    <li>Sep 23 - $65</li>
                	<li><strong>Oct 21 - $30</strong></li>
                    <li>Nov 18 - $55</li>
            	</ul>

                <h4>Pledges: $350</h4>
                <p>Payment Plan</p>
                <ul>
                    <li>Sep 30 - $130</li>
                	<li><strong>Oct 28 - $90</strong></li>
                    <li>Nov 11 - $70</li>
                    <li>Nov 21 - $60</li>
            	</ul>
                
                <h4>Associates: $55</h4>
				
				<p>*If you do not pay your dues and do not communicate with the VPs, we will have to freeze your account until the matter is resolved.</p>
				
				<h3>Reimbursements</h3>
				
				<p>In order to get reimbursed, please send your receipts to Matthew Lee, Angela Chuang, or finance.apousc@gmail.com.</p>
				
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