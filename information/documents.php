<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

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
                		<li><a href = "https://drive.google.com/file/d/10ydVPO2SDNtRN2Qm1reGctIRPRrhDrBw/preview?format=pdf" target = "_blank"> Blank Interview Sheets </a></li>
                		<li><a href = "https://drive.google.com/file/d/1kBPXWm8lNFj9dTl36pkNpidgaxm7jB4n/preview?format=pdf" target = "_blank"> Alpha Omicron Syllabus </a></li>
                		<li><a href = "https://drive.google.com/file/d/1TzmfE78hs3lSIz19GTjHFwouAXbJr0tM/preview?format=pdf" target = "_blank"> Enrichment Points and Strikes</a></li>

                	</ul>
                	
                	<h3>Forms</h3>
					<ul>
					    <li><a href='https://goo.gl/forms/Ifx0WWwkXjrB4C303' target = "_blank">Diversity & Inclusion Event Reflection Form</a></li>
						<li><a href='https://goo.gl/forms/WSKRJVfLLx9VMTWv2' target = "_blank">Anonymous Evaluations</a></li>
						<li><a href='https://goo.gl/forms/qcs2n3Vayuoa5Aly1' target = "_blank">Event Evaluations</a></li>
						<li><a href="https://drive.google.com/file/d/1lNKrfgsSEAuOeZdyZPvuFWw37KZqyM_v/preview?format=pdf" target = "_blank">Outside Service Hours Log</a></li>
						<li><a href='https://docs.google.com/forms/d/e/1FAIpQLSftdqT-xgSpVWNHtkmo7T4_L4NHbxt3iZlROEMcPVoxzlGUnw/viewform' target = "_blank">Diversity and Inclusion Survey</a></li>
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
						<p style="margin-left: 40px"><a href="https://forms.gle/1XxgyWA1FUUc2TCm7" target = "_blank">  Rate My Professor Submission Form</a></p>
						<li><a href="https://skydrive.live.com/"  target = "_blank">Test Bank</a> (<b>username:</b> membership.apousc@gmail.com <b>PW:</b> Forgetmenot)</li>
						<p style="margin-left: 40px"><a href="https://forms.gle/Z5ZLmXJahH3hQo75A" target = "_blank">  Test Bank Submission Form</a></p>
					</ul>
					
                <h3>Reference Documents</h3>
					<ul>
						<li><a href="docs/F18_DeclReq.pdf" target = "_blank">Declining Requirement Policy</a></li>
						<li><a href="https://docs.google.com/spreadsheets/d/127ov46_ZDQnMvgfN4MlC-XS2SOIWMHb6xNXJ-hFuL2k/edit?usp=sharing" target = "_blank">Past Semester Standings</a></li>
						<li><a href="https://drive.google.com/file/d/1Rc7qMa0AZRMHBiirImLnB1_dFfigAEks/preview?format=pdf">Alpha Kappa Letterhead</a></li>

						<div class="slide1" style="cursor: pointer;"><li>Chapter Policies (Click to Show)</li></div>
							<div class="view1">
								<ul>
									<!-- Updated Spring 2020 -->
									<li><a href="https://drive.google.com/file/d/13ebg2IfQ2B013lQxT5ZO1FjwKA4g-4k9/preview?format=pdf" target = "_blank">Bylaws</a></li>
									<!-- Updated Spring 2015 -->
									<li><a href="https://drive.google.com/file/d/1oyHvE_AcHis1i_HdOB7jGNKrtJc4tUGS/preview?format=pdf" target = "_blank">Officer Descriptions</a> </li>
									<!-- Updated Spring 2015 -->
									<li><a href="https://drive.google.com/file/d/1b-4t8zc7_i8f9V_H0hqRt6zFd956RbDu/preview?format=pdf" target = "_blank">Officer Election Policy</a></li>
									<li><a href="https://drive.google.com/file/d/1OZJRnf2h5TdKSRN4--Hwiv8Cd32Lenie/preview?format=pdf" target = "_blank">Driver Reimbursement Policy</a></li>
								</ul>
							</div>
					</ul>			
<br />
				<h3>National Documents</h3>
					<ul>
						<li><a href="docs/APOBylaws.pdf">Alpha Kappa Bylaws</a>(Updated January 27, 2019)</li>
						<li><a href="docs/RM_Standard_Policy.pdf">Standard Policy of Risk Management</a> &mdash; national policy on hazing, discrimination, alcohol, etc.</li>
						<li><a href="docs/style_guide.pdf">Style Guide</a> &mdash; official standards and guidelines on usage of APO terms, logos, typography, etc.</li>
					</ul>
				
			
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