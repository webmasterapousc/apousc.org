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
			<p>If you don't see what you're looking for, just contact Queenie Quan or Lilly Tran!</p>

                <h3>Spring 2022 Information</h3>
                <ul>
                    <li><a href=''>Budget</a></li>
                    <li>Venmo: @apoakusc</li>
                    <li>Email: <a href="mailto:finance.apousc@gmail.com">finance.apousc@gmail.com</a></li>
                </ul>
                
                <h3>Dues</h3>
                <p>Please contact Queenie Quan or Lilly Tran if you need additional financial accommodations for our payment plans.</p>
<!-- 		<h4><b>Actives: $100 regular</b></h4>
                <h4><b>Associates: $55 regular</b></h4> -->
<!-- 		<h4><b>New Members: $150 regular, n/a early</b></h4> -->
<!-- 		<p><b>Actives Payment Plan (Regular)</b></p>	
                <ul>
                    <li>Friday, September 17: $40</li>
                    <li>Friday, October 1: $30</li>
                    <li>Friday, October 15: $30</li>
            	</ul> -->
<!--             	<p><b>Actives Payment Plan (Early)</b></p>	
                <ul>
                    <li>Monday, February 22 (Finish Recruitment Requirements): $30</li>
                	<li>Monday, February 24: $35</li>
                    <li>Monday, March 23: $35</li>
            	</ul> -->
<!--              	<p><b>Associates Payment Plan (Regular)</b></p>	
                <ul>
                    <li>Friday, September 17: $20</li>
                	<li>Friday, October 1: $20</li>
                    <li>Friday, October 15: $15</li>
            	</ul> -->
<!--            	<p><b>Associates Payment Plan (Early)</b></p>	
                <ul>
                    <li>Monday, before February 10: $23</li>
                	<li>Monday, February 24: $13</li>
                    <li>Monday, March 23: $13</li>
            	</ul> -->
<!-- 			<p><b>New Members Payment Plan (Regular)</b></p>	
                <ul>
                    <li>Monday, February 22: $50</li>
                	<li>Monday, March 8: $50</li>
                    <li>Monday, March 22: $50</li>
            	</ul> -->
				<p><b>*If you do not pay your dues and do not communicate with the VPs, we will have to freeze your account until the matter is resolved.</b></p>
				
				<h3>Reimbursements</h3>
				
				<p>In order to get reimbursed, please send your receipts to Queenie Quan or Lilly Tran at finance.apousc@gmail.com.</p>
		<ul>
                    <li><a href='https://forms.gle/yVdbgUXsz2ahTTqT8'>Driver Reimbursement Request Form</a></li>
		    <li><a href='https://forms.gle/AnGrSUY3D7yFGW7N8'>Driver Reimbursement General Information Form</a></li>
		    <li><a href='https://forms.gle/djetcadNP4LsKrzT7'>General APO Reimbursement Form</a></li>
			<li><a href='https://forms.gle/QXumnz4a7fb8QZJi6'>Financial Aid Application</a></li>
			<li><a href='https://docs.google.com/spreadsheets/d/13YhwYRl9CbMReKS98Kb_6XWKXJT8-tWoZs4HRDJEPH0/edit#gid=0'>Dues Breakdown</a></li>
			<li><a href='https://docs.google.com/spreadsheets/d/1x9XIh9mjRXdK5HI4_aqES2yVP0TQ-4vDHp-YxXfPsJo/edit?usp=sharing'>Semester Calendar</a></li>
                </ul>
				
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
