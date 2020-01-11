<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Support Systems";
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
			<h3><b>Support Systems: </b></h3>

			<p><b>Student Health Counseling Services - (213) 740-7711 – 24/7 on call </b></p>

			<br>
			<p><b>National Suicide Prevention Lifeline </b>	- 1 (800) 273-8255 – 24/7 on call </p>

			<p>suicidepreventionlifeline.org </p>

			<p>Free and confidential emotional support to people in suicidal crisis or emotional distress 24 hours a day, 7 days a week. </p>

			<br>
			<p><b>Relationship and Sexual Violence Prevention Services (RSVP)</b> - (213) 740-4900 – 24/7 on call </p>

			<p>engemannshc.usc.edu/rsvp </p>

			<p>Free and confidential therapy services, workshops, and training for situations related to gender-based harm. </p>

			<br>
			<p><b>Office of Equity and Diversity (OED) | Title IX </b>- (213) 740-5086 </p>

			<p>equity.usc.edu, titleix.usc.edu </p>

			<p>Information about how to get help or help a survivor of harassment or discrimination, rights of protected classes, reporting options, and additional resources for students, faculty, staff, visitors, and applicants. The university prohibits discrimination or harassment based on the following protected characteristics: race, color, national origin, ancestry, religion, sex, gender, gender identity, gender expression, sexual orientation, age, physical disability, medical condition, mental disability, marital status, pregnancy, veteran status, genetic information, and any other characteristic which may be specified in applicable laws and governmental regulations. </p>

			<br>
			<p><b>The Office of Disability Services and Programs</b> - (213) 740-0776 </p>

			<p>dsp.usc.edu </p>

			<p>Support and accommodations for students with disabilities. Services include assistance in providing readers/notetakers/interpreters, special accommodations for test taking needs, assistance with architectural barriers, assistive technology, and support for individual needs. </p>

			<br>
			<br>
			<p><b>USC Support and Advocacy </b>- (213) 821-4710 </p>

			<p>studentaffairs.usc.edu/ssa </p>

			<p>Assists students and families in resolving complex personal, financial, and academic issues adversely affecting their success as a student. </p>

			<br>
			<p><b>USC Emergency - UPC</b>: (213) 740-4321, HSC: (323) 442-1000 – 24/7 on call </p>

			<p>dps.usc.edu, emergency.usc.edu </p>

			<p>Emergency assistance and avenue to report a crime. Latest updates regarding safety, including ways in which instruction will be continued if an officially declared emergency makes travel to campus infeasible. </p>

			<p><b>USC Department of Public Safety - UPC</b>: (213) 740-6000, HSC: (323) 442-120 – 24/7 on call </p>

			<br>

<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>