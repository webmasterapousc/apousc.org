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
		                
		<h3> Extra Opportunities for Actives </h3>
			<ul>

                		<li><a href = "https://docs.google.com/spreadsheets/d/1lT8l32kg6FfBfsFvoYTcIy421BEHDnBdhaQ0cHjytI0/edit?usp=sharing" target = "_blank">Spring 2022 Point Opportunities</a></li>
                	</ul>
                	<ul>

                		<li><a href = "https://docs.google.com/document/d/1pn-ziU0mPktuEIpjjbMkLmPAZUX9Ac1o_Uuv8bcNs74/edit?usp=sharing" target = "_blank"> D&I Opportunities</a></li>
                	</ul>
                	<ul>

                		<li><a href = "https://docs.google.com/spreadsheets/d/1lCCRz0nA3raejqXYLtyp9kCoU0Ifqsjh-GvsyyR458U/htmlview" target = "_blank"> Service + Phil Opportunities (Fall 2021)</a></li>
                	</ul>
			<ul>

                		<li><a href = "https://docs.google.com/spreadsheets/d/1NBAvysusEPn8agwXS8lZ4WF--uXYqezRno5sYKE1zBs/edit?fbclid=IwAR1MelaIzhfud9yR-QK2g7oElZHz1UftqafDcrV7Q-Ndczo1yr_1yWQ6K5c#gid=0" target = "_blank"> IC GBMs </a></li>
                	</ul>

		<h3>Forms </h3>
			<ul>
<!-- 						<li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeO9JlApSE76RKqHGlITzFm-WjwCDc41TDNuSz6bIQWVyMkYA/viewform">Open Evaluation Form</a></li>
				<li><a href="https://docs.google.com/forms/d/e/1FAIpQLSd8_c4TqemjrAvio0DxwyMUFv-q9fcNhhzd85PrclDFJz7MJw/viewform">Event Evaluation Form</a></li>
				<li><a href='https://docs.google.com/forms/d/e/1FAIpQLSftdqT-xgSpVWNHtkmo7T4_L4NHbxt3iZlROEMcPVoxzlGUnw/viewform' target = "_blank">Diversity and Inclusion Survey</a></li>
				<li><a href='https://forms.gle/jhC3w4TQ5X8grg1C7' target = "_blank">Diversity & Inclusion Event Reflection Form</a></li>
				<li><a href="https://drive.google.com/file/d/1lNKrfgsSEAuOeZdyZPvuFWw37KZqyM_v/preview?format=pdf" target = "_blank">Outside Service Hours Log</a></li> -->
				<li><a href="https://forms.gle/myvywQUroWRXGGvF9" target = "_blank">APO Service Feedback (Fall 2021)</a></li>
				<li><a href="https://www.facebook.com/APO-Compliments-Spring-2020-115121043370901/" target = "_blank">APO Compliments Form</a></li>
				<li><a href="https://docs.google.com/forms/d/e/1FAIpQLSdPnubmuQwhKJhf4JtFFxzTDjkflzsvxbmO2DUSQHdlkOI6PA/viewform" target = "_blank">TOWNHALL - Bylaw Changes Form</a></li>
				<li><a href="https://forms.gle/wjtJziux5ufDEyvr8" target = "_blank">Open Evaluations Form</a></li>
			</ul>

		 <h3>Academic Documents</h3>
			<ul>
				<li><a href="https://forms.gle/4jdZvNKVDNULs8BH8" target="_blank">APO Chegg Request Form</a></li>
				<li><a href="https://docs.google.com/spreadsheets/d/1T4rq8Lrn3aT7DWqzACcQPGi55NcQQBjDebeICYm2kYY/edit?usp=sharing" target = "_blank">APO Rate My Professor</a></li>
				<p style="margin-left: 40px"><a href="https://forms.gle/oBa42a5yPwRn5ei96" target = "_blank">  Rate My Professor Submission Form</a></p>
				<li><a href="https://skydrive.live.com/"  target = "_blank">Test Bank</a> (<b>username:</b> membership.apousc@gmail.com <b>PW:</b> Forgetmenot)</li>
				<p style="margin-left: 40px"><a href="https://forms.gle/y178F7JZfAx1G4eq9" target = "_blank">  Test Bank Submission Form</a></p>	
				<li><a href="https://docs.google.com/spreadsheets/d/1iM_FjljVmDGYxuDT_VGWVCiKi0I0lhMDaiXMAdskcv4/edit#gid=0" target = "_blank">Mentoring Resources</a></li>
			</ul>

<!--                 <h3> New Member Documents </h3> -->
<!--                 	<ul>

                		<li><a href = "https://docs.google.com/forms/d/e/1FAIpQLSeddzN3u2WXBybN7SEL1V_c1TdnOUGd0PR1xrSNxB1bQ41pkA/viewform?vc=0&c=0&w=1" target = "_blank"> Lead Form </a></li>
                		<li><a href = "https://drive.google.com/file/d/1EvoK6dl5HQ4yPwsXTYqdhZVnzQOvoqc8/preview?format=pdf" target = "_blank"> Blank Interview Sheets </a></li>
                		<li><a href = "https://drive.google.com/file/d/1R3BGfeqEDDnIcHU9EKX3cdo6Nw0hi8LW/preview?format=pdf" target = "_blank"> Alpha Pi Syllabus </a></li>
                		<li><a href = "https://drive.google.com/file/d/1b5YOGHgOC53KTs1uY7-7b__caCzI33qvbJ3qEMAlsXs/preview?format=pdf" target = "_blank"> Enrichment Points and Strikes</a></li>

                	</ul> -->

<!--                 <h3>Requirements</h3>

			<p>View the requirements for various types of members in Alpha Phi Omega.</p>
			<ul>
						<li><a href="requirements_a.php">Actives</a></li>
						<li><a href="requirements_p.php">New Members</a></li>
						<li><a href="requirements_assoc.php">Associates</a></li>
			</ul> -->
                	
                <h3>Reference Documents</h3>
					<ul>
<!-- 						<li><a href="https://docs.google.com/document/d/1_NwPwC5hdDuhlNMXvF916Hz3B_9rZxPi9g-rOCR1lBY/edit?usp=sharing">APO Chapter Project Meeting Notes</a></li> -->
						<li><a href="docs/F18_DeclReq.pdf" target = "_blank">Declining Requirement Policy</a></li>
						<li><a href="https://docs.google.com/spreadsheets/d/127ov46_ZDQnMvgfN4MlC-XS2SOIWMHb6xNXJ-hFuL2k/edit?usp=sharing" target = "_blank">Past Semester Standings</a></li>
						<li><a href="https://drive.google.com/file/d/1Rc7qMa0AZRMHBiirImLnB1_dFfigAEks/preview?format=pdf">Alpha Kappa Letterhead</a></li>

<!-- 						<div class="slide1" style="cursor: pointer;"><li>Chapter Policies (Click to Show)</li></div> -->
						<div><li>Chapter Policies</li></div>
<!-- 							<div class="view1"> -->
								<div>
								<ul>
									<!-- Updated Spring 2021 -->
									<li><a href="https://drive.google.com/file/d/1dUqkdHWUW7_R-rRHxBXHyqERWM4dHlf4/view?usp=sharing" target = "_blank">Bylaws</a></li>
									<!-- Updated Spring 2015 -->
									<li><a href="https://drive.google.com/file/d/1oyHvE_AcHis1i_HdOB7jGNKrtJc4tUGS/preview?format=pdf" target = "_blank">Officer Descriptions</a> </li>
									<!-- Updated Spring 2015 -->
									<li><a href="https://drive.google.com/file/d/1b-4t8zc7_i8f9V_H0hqRt6zFd956RbDu/preview?format=pdf" target = "_blank">Officer Election Policy</a></li>
					
								</ul>
							</div>
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
