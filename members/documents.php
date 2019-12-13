<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Documents";
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
			<h2>Documents</h2>
			<p>If you don't see what you're looking for, just contact an officer!</p>
			<p>If you want to upload or update a document on this page feel free to contact webmaster.apousc@gmail.com!</p>
				<!-- COMMENTED SECTION-->
				<!-- <h3>Election Documents</h3>
                	<ul>
                    	<li><a href="docs/Spring 2015 Elected Officer Application.docx">Spring 2015 Elected Officer Application</a></li>
                        <li><a href="docs/Spring 2015 Appointed Officer Application.docx">Spring 2015 Appointed Officer Application</a></li>
                    </ul> -->
                
                <h3> Pledge Documents </h3>
                	<ul>

                		<li><a href = "https://forms.gle/75MvMvQSqcWpSgv36" target = "_blank"> Lead Form </a></li>
                		<li><a href = "docs/AlphaOmicronInterviewSheets.pdf" target = "_blank"> Blank Interview Sheets </a></li>
                		<li><a href = "docs/Alpha-Omicron-Syllabus.docx-1.pdf" target = "_blank"> Alpha Omicron Syllabus </a></li>
                		<li><a href = "docs/Alpha-Omicron-Enrichment-Points-and-Strikes.pdf" target = "_blank"> Enrichment Points and Strikes</a></li>

                	</ul>
                	
                	<h3>Forms</h3>
					<ul>
					    <li><a href='https://goo.gl/forms/Ifx0WWwkXjrB4C303'>Diversity & Inclusion Event Reflection Form</a></li>
						<li><a href='https://goo.gl/forms/WSKRJVfLLx9VMTWv2'>Anonymous Evaluations</a></li>
						<li><a href='https://goo.gl/forms/qcs2n3Vayuoa5Aly1'>Event Evaluations</a></li>
						<!--<li><a href='https://docs.google.com/forms/d/1ELFf8AvVKaxRHJET-XWvsYpuTG1F-e8odMcSBMUk5pQ/viewform?c=0&w=1'>Weekly Service Form</a></li>-->
						<!--<li><a href="docs/Event Sign-In Sheet.pdf">Event Sign-In Sheet</a></li>-->
						<li><a href="docs/Service Hours Log.pdf">Outside Service Hours Log</a></li>
						<li><a href='https://docs.google.com/forms/d/e/1FAIpQLSftdqT-xgSpVWNHtkmo7T4_L4NHbxt3iZlROEMcPVoxzlGUnw/viewform'>Diversity and Inclusion Survey</a></li>
					</ul>
                	
                <h3>Requirements</h3>

			<p>View the requirements for various types of members in Alpha Phi Omega.</p>
			<ul>
						<li><a href="requirements_a.php">Actives</a></li>
						<li><a href="requirements_p.php">Pledges</a></li>
						<li><a href="requirements_assoc.php">Associates</a></li>
			</ul>
                	
                <h3>Academic Documents</h3>
					<ul>
						<li><a href="https://docs.google.com/spreadsheets/d/1T4rq8Lrn3aT7DWqzACcQPGi55NcQQBjDebeICYm2kYY/edit?usp=sharing">APO Rate My Professor</a></li>
						<p style="margin-left: 40px"><a href="https://forms.gle/1XxgyWA1FUUc2TCm7">  Rate My Professor Submission Form</a></p>
						<!--
						Original Rate my Professor
						https://docs.google.com/spreadsheet/ccc?key=0AigJIHhDKQW8dFA1RmlrRzJFbnZRVzRzMzFHY05fcFE&usp=sharing
						-->
						<li><a href="https://skydrive.live.com/">Test Bank</a> (<b>username:</b> membership.apousc@gmail.com <b>PW:</b> Forgetmenot)</li>
						<p style="margin-left: 40px"><a href="https://forms.gle/Z5ZLmXJahH3hQo75A">  Test Bank Submission Form</a></p>
					</ul>
					
                <h3>Reference Documents</h3>
					<ul>
						<!-- <li><a href="https://docs.google.com/spreadsheets/d/1EDrMQ5FyLnP7a4u2GfGDOieZcqIflkS84bChskD_7bo/edit?usp=sharing">Master Doc</a> (Spring 2015)</li> -->
						<!--<li><a href="https://docs.google.com/spreadsheets/d/1S-tHyh8JoUO19f97kj2WdPlSkEohcEDoyG-TGrPnm7A/edit?usp=sharing">Retreat Auction</a> (Fall 2015)</li>-->
						<!-- <li><a href="https://drive.google.com/folderview?id=0B0P6FwFOSi_kVVRheTJTWlRFSlE&usp=sharing">GBM Minutes</a></li>
						<li><a href="https://drive.google.com/folderview?id=0B0P6FwFOSi_kcE5ONTU3QVRRVW8&usp=sharing">EBM Minutes</a></li> -->
						<!--<li><a href="docs/GBMCalendarFall18.pdf" target = "_blank"> Fall 2018 GBM Calendar</a></li>-->
						<!--li><a href="https://drive.google.com/folderview?id=0B0P6FwFOSi_kNGNRR2xsS2c2V1U&usp=sharing">Pledge Meeting Minutes</a></li-->
						<!--<li><a href = "https://docs.google.com/spreadsheets/d/1YWOFZ_VaYEEfvDT5XW6IM_Notbvs1yQiw7QTiJf1bWA/edit?ts=57d77f12#gid=0" target ="_blank"> Chapter's Items </a></li>-->
						<li><a href="docs/F18_DeclReq.pdf" target = "_blank">Declining Requirement Policy</a></li>
						
						<!--<li><a href="https://docs.google.com/spreadsheets/d/1a-QbkxXarq_28CEN1Sy9t_6vMumizxFyvYkeVm-QTww/edit#gid=1809411573" target = "_blank">Fall 2018 Ex Comm Budget</a></li>-->
						<!--li><a href="docs/ExComm Goals Spring 2016.pdf">ExComm Goals</a> (Spring 2016)</li-->
						<li><a href="https://docs.google.com/spreadsheets/d/127ov46_ZDQnMvgfN4MlC-XS2SOIWMHb6xNXJ-hFuL2k/edit?usp=sharing" target = "_blank">Past Semester Standings</a></li>
						<li><a href="docs/Header & Footer.docx">Alpha Kappa Letterhead</a></li>

						<div class="slide1" style="cursor: pointer;"><li>Chapter Policies (Click to Show)</li></div>
							<div class="view1">
								<ul>
									<!-- Updated Spring 2017 -->
									<li><a href="docs/APOBylaws.pdf.docx">Bylaws</a></li>
									<!-- <li><a href="docs/Edited Bylaws.docx">Proposed Edited Bylaws</a> (Updated 2013 Oct 23)</li> -->
									<!-- Updated Spring 2015 -->
									<li><a href="docs/APOAKOfficer-Descriptions.pdf">Officer Descriptions</a> </li>
									<!-- Updated 2015 July 6 -->
									<li><a href="docs/Officer Election Policy (updated 7.6.15).pdf">Officer Election Policy</a></li>
									<li><a href="docs/Driver Reimbursement Policy.pdf">Driver Reimbursement Policy</a></li>
								</ul>
							</div>
					</ul>

				
<br />
				<!--h3>Pledging Documents</h3>
					<ul>
						<li><a href="https://docs.google.com/forms/d/1t9Q0kIhbEA-nPfEFTx-OwZbpGBYFHBx6_iBqlzIHEfU/viewform?usp=send_form" >Event Leader Form (Leads Form)</a></li>
						<li><a href="docs/pledgingdocs/S16 Pledge Officer Descriptions.docx">Pledge Officer Descriptions</a> (Spring 2016)</li>
						< <li><a href="docs/pledgingdocs/Blank Interview Sheet.pdf">Blank Interview Sheet</a></li> >
						<li><a href="docs/pledgingdocs/AlphaThetaInterviewSheets.pdf">Blank Interview Sheet</a></li>
						<li><a href="www.apo.org/Support/DownloadFile/188">National Pledge Manual</a> (2013&mdash;2014)</li>
						<li><a href="docs/pledgingdocs/National Pledging Standards.pdf">National Pledging Standards</a></li>
					</ul-->
				<h3>National Documents</h3>
					<ul>
						<li><a href="docs/APOBylaws.pdf">Alpha Kappa Bylaws</a>(Updated January 27, 2019)</li>
						<li><a href="docs/RM_Standard_Policy.pdf">Standard Policy of Risk Management</a> &mdash; national policy on hazing, discrimination, alcohol, etc.</li>
						<li><a href="docs/style_guide.pdf">Style Guide</a> &mdash; official standards and guidelines on usage of APO terms, logos, typography, etc.</li>
					</ul>
				
			<div class="slide3" style="cursor:pointer"><h3>Archived Documents (Click to Show)</h3></div>
				<div class="view3">
					<ul>
						<?php if($session->status == 0) {echo "
						";};
						?>
						<li><a href='https://www.cognitoforms.com/APOUSC1/ΑΦΩExpenseReimbursementForm'>Expense Reimbursement Form</a> (Fall 2017)</li>
					    <li><a href="docs/Expense Report Submission Instructions.docx">Expense Report Submission Instructions</a> (Fall 2017)</li>
						<li><a href="https://docs.google.com/spreadsheet/ccc?key=0Ah2fNhLOPSTydDQzTG1EZS02LTc2TXY3eUd2al93LWc">Web Site Changes</a> (Spring 2012)</li>
						<li><a href="https://docs.google.com/spreadsheet/viewform?formkey=dHpQV3ZQZXhqRV82S3lGR0FvLThYRHc6MQ">Membership Survey</a> (Spring 2012)</li>
						<li><a href="https://docs.google.com/spreadsheet/ccc?key=0ArFFADXkrZwjdEZ6Um9rVHdWUldYekY3bUJnUUdYQnc&hl=en_US">Retreat Auction</a> (Fall 2011)</li>
						<li><a href="docs/APO Spring 2012 Payment Plan.docx">Payment Plan</a> (Spring 2012)</li>
						<li><a href="https://docs.google.com/spreadsheet/viewform?formkey=dF9uMm1YeFFaT25VSWpQc1JxTmFWQmc6MQ#gid=0">Mid Semester Ex Comm Survey</a> (Spring 2012)</li>
						<li><a href="https://docs.google.com/spreadsheet/viewform?formkey=dEM1Y0R0ZmdCQ2hEUXF5bUtkcG04Tnc6MQ">Retreat Auction Sign-Up Form</a> (Spring 2012)</li>
						<li><a href="docs/Tommy's Application (Spring 2012).pdf">Tommy's Application</a> (Spring 2012)</li>
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