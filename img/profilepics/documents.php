<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Documents";
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
<?php
	// If user is logged in, show documents
	if ($session->logged_in) {
?>
<br />
			<h2>Documents</h2>
			<p>If you don't see what you're looking for, just contact an officer!</p>
				<h3>Election Documents</h3>
                	<ul>
                    	<li><a href="docs/Spring 2013 Elected Officer Questionnaire.docx">Spring 2013 Elected Officer Questionnaire"</a></li>
                        <li><a href="docs/Spring 2013 Appointed Officer Questionnaire.docx">Spring 2013 Appointed Officer Questionnaire"</a></li>
                    </ul>
                
                <h3>Reference Documents</h3>
					<ul>
						<li><a href="https://docs.google.com/spreadsheet/ccc?key=0Auld2RQhIUKqdGlhelhCRE1xcDZrS3lSc2RMNVN0TVE">Master Doc</a> (Fall 2012)</li>
						<li><a href="https://docs.google.com/open?id=0BxfRLWtKBSDTMzgwNzMyOGMtMzJjNC00NTk5LTk0NDUtZmUxYjA3YzI2ZGQ1">GBM Minutes</a></li>
						<?php if($session->status == 0) {echo "<li><a href='https://docs.google.com/open?id=0BxfRLWtKBSDTSG1IdG5TSWdUSnliZmV6clQ0VXR2QQ'>ECM Minutes</a></li>";}; ?>
						<li><a href="https://docs.google.com/a/usc.edu/spreadsheet/ccc?key=0Au3dmYmsttcOdGxvMWkyVXhBZXRuWnhyOWJleGVjalE">Ex Comm Budget</a> (Fall 2012)</li>
						<!--<li><a href="https://docs.google.com/spreadsheet/ccc?key=0AopMUjkTFB44dElnazJ0M2lnVk9pbEdmaGJ5LW9tX3c">Retreat Auction</a> (Spring 2012)</li>-->
						<!--<li><a href="https://docs.google.com/spreadsheet/ccc?key=0Ah4HgwO4Q8xLdFVVbUdPQzdiY0FMNnc4TTVpanB4eUE#gid=0">Team Assassins</a> (Spring 2012)</li>-->
						<li><a href="docs/APO Abroad Newsletter March 2012.pdf">Abroad Newsletter</a> (March 2012)</li>
						<div class="slide1" style="cursor: pointer;"><li>Chapter Policies (Click to Show)</li></div>
							<div class="view1">
								<ul>
									<li><a href="docs/Chapter Bylaws 2012 02 08.pdf">Bylaws</a> (Updated 2012 Feb 8)</li>
									<li><a href="docs/Officer Duties (Updated 4.14.11).pdf">Officer Descriptions</a> (Updated 2011 Apr 14)</li>
									<li><a href="docs/Officer Election Policy (Updated 11.21.11).pdf">Officer Election Policy</a> (Updated 2011 Nov 21)</li>
								</ul>
							</div>
					</ul>
				<h3>Forms</h3>
					<ul>
						<li><a href='docs/APO Fall 2012 Payment Plan.docx'>Fall 2012 Payment Plan</a> This form along with the first payment is due <strong>September 24th, 2012</strong></li>
						<li><a href="docs/Event Sign-In Sheet.pdf">Event Sign-In Sheet</a></li>
						<li><a href="docs/Expense Reimbursement Form.pdf">Expense Reimbursement Form</a></li>
						<li><a href="docs/Service Hours Log.pdf">Outside Service Hours Log</a></li>
						<li><a href="docs/PURCHASEREQ.docx">Purchase Requisition Form</a> (.docx)</li>
						<li><a href="docs/PURCHASEREQ.pdf">Purchase Requisition Form</a> (.pdf)</li>
					</ul>
				
<br />
				<h3>Pledging Documents</h3>
					<ul>
						<li><a href="docs/pledge/Omega Pledge Class Syllabus.pdf">Syllabus</a> (Spring 2012)</li>
						<li><a href="docs/pledge/Omega Pledge Class Calendar.pdf">Calendar</a> (Spring 2012)</li>
						<li><a href="docs/pledge/Omega Pledge Class Officer Descriptions.pdf">Officer Descriptions</a> (Spring 2012)</li>
						<li><a href="docs/pledge/Blank Interview Sheet.pdf">Blank Interview Sheet</a></li>
						<li><a href="docs/pledge/National Pledge Manual.pdf">National Pledge Manual</a> (2011&mdash;2012)</li>
						<li><a href="docs/pledge/National Pledging Standards.pdf">National Pledging Standards</a></li>
					</ul>
				<h3>National Documents</h3>
					<ul>
						<li><a href="docs/APO National Bylaws and Standard Chapter Articles of Association (Updated Spring 2009).pdf">National Bylaws and Standard Chapter Articles of Association</a> (Updated Spring 2009)</li>
						<li><a href="docs/RM_Standard_Policy.pdf">Standard Policy of Risk Management</a> &mdash; national policy on hazing, discrimination, alcohol, etc.</li>
						<li><a href="docs/style_guide.pdf">Style Guide</a> &mdash; official standards and guidelines on usage of APO terms, logos, typography, etc.</li>
					</ul>
			<div class="slide3" style="cursor:pointer"><h3>Archived Documents (Click to Show)</h3></div>
				<div class="view3">
					<ul>
                    	<li><a href='docs/APO Fall 2012 Eboard Application.pdf'>Fall 2012 E-Board Appointed Application</a> </li>
                        <li><a href='https://docs.google.com/spreadsheet/ccc?key=0Aso5TNWHDhPkdEtrVUFSNDEyQVB3WmlYNVpkRXFFTUE'>Initiation Banquet Seating Chart</a></li>
						<?php if($session->status == 0) {echo "
						";};
						?>
						<li><a href="https://docs.google.com/spreadsheet/ccc?key=0Ah2fNhLOPSTydDQzTG1EZS02LTc2TXY3eUd2al93LWc">Web Site Changes</a> (Spring 2012)</li>
						<li><a href="https://docs.google.com/spreadsheet/viewform?formkey=dHpQV3ZQZXhqRV82S3lGR0FvLThYRHc6MQ">Membership Survey</a> (Spring 2012)</li>
						<li><a href="https://docs.google.com/spreadsheet/ccc?key=0ArFFADXkrZwjdEZ6Um9rVHdWUldYekY3bUJnUUdYQnc&hl=en_US">Retreat Auction</a> (Fall 2011)</li>
						<li><a href="docs/APO Abroad Newsletter 11-17-11.pdf">Abroad Newsletter</a> (November 2011)</li>
						<li><a href="docs/APO Spring 2012 Payment Plan.docx">Payment Plan</a> (Spring 2012)</li>
						<li><a href="https://docs.google.com/spreadsheet/viewform?formkey=dF9uMm1YeFFaT25VSWpQc1JxTmFWQmc6MQ#gid=0">Mid Semester Ex Comm Survey</a> (Spring 2012)</li>
						<li><a href="https://docs.google.com/spreadsheet/viewform?formkey=dEM1Y0R0ZmdCQ2hEUXF5bUtkcG04Tnc6MQ">Retreat Auction Sign-Up Form</a> (Spring 2012)</li>
						<li><a href="https://docs.google.com/spreadsheet/viewform?formkey=dGxsVDVUMGJwQWJDTGFrUVZPYkZJZlE6MQ">Alumni Dinner Seating</a> (Spring 2012)</li>
						<li><a href="docs/Tommy's Application (Spring 2012).pdf">Tommy's Application</a> (Spring 2012)</li>
						<li><a href="docs/Panda Express Fundraiser Flyer (March 26, 2012).pdf">Panda Express Fundraiser Flyer</a> (March 26, 2012)</li>
						<?php if($session->status == 0) {echo "
							<li><a href='https://docs.google.com/spreadsheet/viewform?formkey=dGJUNVZ6bzNudTUxWWp2a0ZSX3FtWHc6MQ'>Chapter Letter Order Form</a> (Spring 2012)</li>
						";};
						?>
					</ul>
				</div>
			<p class="bottomNote">Note: <abbr title="Portable Document Format">PDF</abbr> files require the Adobe Reader from Adobe Systems, Incorporated. Adobe and the Adobe logo are trademarks of Adobe Systems, Incorporated. Click on the following link to download.</p>
			<a href="http://get.adobe.com/reader/"><img src="img/get_adobe_reader.png" height="39" width="158" alt="Download Adobe Reader" /></a>
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