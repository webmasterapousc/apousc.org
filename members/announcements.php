<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Announcements";
$current_page = "home";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		"use strict";

		// Place all JS to be run on page load in this function
		$(document).ready(function () {
			makeRound(".contentBox", "10", "10", "10", "10");
		});
	//--><!]]>
	</script>
<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
			<h2>Announcements</h2>
			<?php
				include_once("include/convert_text.php"); // Used to convert plain text announcement from database into HTML
				$q = "SELECT * FROM " . TBL_ANNOUNCEMENTS . " ORDER BY ID DESC";
				$result = mysql_query($q);
				$i = 0;
				while ($row = mysql_fetch_array($result)) {
					$id    = $row[0];
					$title = htmlspecialchars($row[1]);
					$date  = date('F j, Y', strtotime($row[2]));
					$body  = convertText($row[3]);
					echo "\t\t\t<div class=\"contentBox\">\n";
					echo "\t\t\t\t<h4>".$title."</h4>\n";
					echo "\t\t\t\t".$body."\n";
					echo "\t\t\t\t<p class=\"date\">".$date."</p>\n";
					if($session->isOfficer()) {
						echo "\t\t\t\t<a href=\"edit_announcement.php?id=".$id."\" title=\"Edit Announcement\"><img src=\"img/edit_icon.gif\" height=\"20\" width=\"20\" alt=\"[Edit]\" /></a> <a href=\"process.php?subdeleteannouncement=1&amp;announcementid=".$id."\" title=\"Delete Announcement\" onclick=\"return confirm('Are you sure you want to delete this announcement?');\"><img src=\"img/minus.png\" height=\"20\" width=\"20\" alt=\"[Delete]\" /></a>\n";
					}
					echo "\t\t\t</div>\n";
				}
			?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>