<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Admin Website User Manual";
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
	/* If user is not logged in as Admin, display error */
	if (!$session->isAdmin()) {
		echo ("\t\t\t<h2>Restricted Area</h2>\n");
		echo ("\t\t\t<p>Sorry, but you must be logged in as the Administrator in order to view this page.</p>\n");
	} else {
?>
		<h2>Admin Website User Manual</h2>
        <p>One day, these should be collected into a proper user manual for running the site, but until that happens, the following are just some random notes about running the site.</p>
		<ul>
			<li>The current version of the AK website was originally developed by Brad Ramos (Pi Class) in Spring 2010. Please feel free to direct any questions about the site to him at <a href="mailto:bradleyRamos@gmail.com">bradleyRamos@gmail.com</a> and he will attempt to answer you and help you to the best of his abilities.</li>
			<li>This site utilizes XHTML, PHP, mySQL, JavaScript, and CSS. If you aren't comfortable with any of these scripting lanuages, please please please ask and study before touching the code.</li>
			<li>The entire PHP login system was based on this <a href="http://www.evolt.org/node/60265">PHP Login Script</a>. If you ever want to add or change anything about the login system, please refer to these instructions. There is also, as of this writing, a relatively active comment section on the page where the developer and others familiar with the login system can help you with any problems. I would suggest not touching the login system at all unless you are absolutely sure you understand it, because you could very easily brick the entire site. Good luck!</li>
			<li>All accounts should be set to User Level 1; the ONLY account that should be User Level 9 is the Admin account. Officer privileges are granted if the user account has a value greater than 0 in its "Position" field (i.e. an officer position is set); Admin and Officer priveleges are unrelated. Only the Webmaster, and others as necessary, should have access (i.e. the password) to the Admin account.</li>
			<li><strong class="big">No members should ever be deleted from the database</strong> except for pledges who do not cross. Inactive members should have their member statuses changed to inactive, and according to chapter bylaws, all members, whether active or not, should be converted to Alumni upon graduation from USC.</li>
			<li>Do not attempt to change passwords (and do not touch "userid") directly in the "users" table in mySQL, as these are not stored in plain text, and must be entered through the front end web form in order to be properly hashed and salted. Because passwords are not stored in plain text, there is no possible way for them to be recovered by users or the Admin; passwords can be reset to an automatically-generated random password which is emailed to the user's address on file, and then the user may change the password to one of their choosing.</li>
			<li>Event sign-ups are always treated on a first come, first served basis. Even though the volunteer lists are displayed in alphabetical order, the database is always keeping track of the order in which users sign up for an event. Thus, adding or removing an event cap after people have already signed up for an event will automatically cause the last people to sign up above the participation cap to be pushed off onto the waiting list.</li>
			<li>Great care was taken to make this site both standards compliant and handicap accesible. Please continue to develop the site in this spirit.</li>
		</ul>
		<div class="contentBox">
			<h4>To Do</h4>
			<ul>
				<li>Ability to remove all current officers and set new semester's officers from one page</li>
				<li>Ability to activate/deactivate nominations through a front-end form instead of having to hand code the HTML link</li>
				<li>Ability to set/activate/deactivate special link in top tab navigation (Rush, Yard Sale, etc.)</li>
				<li>Ability to archive all events and reset hours count at the end of each semester</li>
				<li>Ability to convert all pledges to actives at the end of each semester</li>
				<li>Picture of the Week upload form</li>
			</ul>
		</div>
<?php
	}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>