<?php
/**
 * Admin.php
 *
 * This is the Admin Center page. Only administrators
 * are allowed to view this page. This page displays the
 * database table of users and banned users. Admins can
 * choose to delete specific users, delete inactive users,
 * ban users, update user levels, etc.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 *
 * Modified by: Brad Ramos (bradleyRamos@gmail.com)
 * Last Updated: November 2011
 */
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title   = "Administrative Center";
$current_page = "home";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
//#################################################
?>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<link type="text/css" rel="stylesheet" href="css/dataTables.css" />
	<script type="text/javascript">
		$(document).ready(function() {
			$('#userTable').dataTable({
				"bJQueryUI": true,
				"sScrollX": 560
			})
		});
	</script>
<?php
//#################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
//#################################################

/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
function displayUsers()
{
	global $database, $memberStatus;
	$q        = "SELECT username,userlevel,status,email,timestamp,fname,lname,family,semester,year,position,big,phone,uscid,address,shirt_size FROM " . TBL_USERS . " ORDER BY userlevel DESC,username";
	$result   = $database->query($q);
	/* Error occurred, return given name by default */
	$num_rows = mysql_numrows($result);
	if (!$result || ($num_rows < 0)) {
		echo "Error displaying info";
		return;
	}
	if ($num_rows == 0) {
		echo "Database table empty";
		return;
	}
	/* Display table contents */
	echo "<table id=\"userTable\" cellspacing=\"0\">\n";
	echo "\t<thead>\n\t\t<tr>\n\t\t\t<th scope=\"col\"></th>\n\t\t\t<th scope=\"col\">Username</th>\n\t\t\t<th scope=\"col\">User Level</th>\n\t\t\t<th scope=\"col\">Status</th>\n\t\t\t<th scope=\"col\">E-mail</th>\n\t\t\t<th scope=\"col\">Last Login</th>\n\t\t\t<th scope=\"col\">First</th>\n\t\t\t<th scope=\"col\">Last</th>\n\t\t\t<th scope=\"col\">Family</th>\n\t\t\t<th scope=\"col\">Semester</th>\n\t\t\t<th scope=\"col\">Position</th>\n\t\t\t<th scope=\"col\">Big</th>\n\t\t\t<th scope=\"col\">Phone</th>\n\t\t\t<th scope=\"col\">USC ID</th>\n\t\t\t<th scope=\"col\">Address</th>\n\t\t\t<th scope=\"col\">Shirt Size</th>\n\t\t</tr>\n\t</thead>\n\t<tbody>\n";
	while ($row = mysql_fetch_array($result)) {
		echo "\t\t<tr" . $zebra . ">\n";
		echo "\t\t\t<td><a href=\"admin_useredit.php?user=".$row['username']."\"><img src=\"img/edit.png\" height=\"16\" width=\"16\" alt=\"Edit\" /></a></td>\n";
		echo "\t\t\t<td>" . $row['username'] . "</td>\n";
		echo "\t\t\t<td>" . $row['userlevel'] . "</td>\n";
		echo "\t\t\t<td>" . $memberStatus[$row['status']] . "</td>\n";
		echo "\t\t\t<td>" . $row['email'] . "</td>\n";
		if ($row['timestamp'] == 0) {
			$timestamp = "";
		} else {
			$timestamp = date("n/j/y H:i",$row['timestamp']);
		}
		echo "\t\t\t<td>" . $timestamp . "</td>\n";
		echo "\t\t\t<td>" . $row['fname'] . "</td>\n";
		echo "\t\t\t<td>" . $row['lname'] . "</td>\n";
		echo "\t\t\t<td>" . $row['family'] . "</td>\n";
		echo "\t\t\t<td>" . $row['semester'] . " " . $row['year'] . "</td>\n";
		echo "\t\t\t<td>" . $row['position'] . "</td>\n";
		echo "\t\t\t<td>" . $row['big'] . "</td>\n";
		echo "\t\t\t<td>" . $row['phone'] . "</td>\n";
		echo "\t\t\t<td>" . $row['uscid'] . "</td>\n";
		echo "\t\t\t<td>" . $row['address'] . "</td>\n";
		echo "\t\t\t<td>" . $row['shirt_size'] . "</td>\n";
	}
	echo "\t</tbody>\n</table>\n";
}

/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if (!$session->isAdmin()) {
	echo "<h2>Restricted Area</h2>\n";
	echo "<p>Sorry, but this page is a restricted area. You must be logged in as the site administrator in order to gain access.</p>\n";
} else {
	/**
	 * Administrator is viewing page, so display all
	 * forms.
	 */
?>
	<h2>Administrative Center</h2>
    <div class="contentBox">
        <h4>Note to Webmaster/Admin</h4>
        <p>User info can be edited from this page on an individual basis. However, batch user editing (for example, converting all pledges to actives at the end of the semester) could be more quickly accomplished by accessing the <a href="https://mysqladmin2.secureserver.net/m50/53/">phpMyAdmin</a> interface.</p>
	</div>
	<h3>Users</h3>
	<?php displayUsers(); ?>
<?php
}
?>
<?php
//#################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>