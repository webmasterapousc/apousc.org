<?php
// Google Analytics
include_once("include/analytics.php")

// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Polls";
$current_page = "polls";

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
			<h2>Surveys</h2>

			<table cellpadding="0" cellspacing="0" border="0" class="pretty">
				<thead>
				<tr>
					<th scope="col">Survey Name</th>
				</tr>
			</thead>
				<?php
					$polls = $database->getPolls();
					while($row = mysql_fetch_array($polls)){
						echo "
							<tr class='border'>
								<td> <a href='{$row['poll_url']}' target='_blank'>{$row['poll_name']}</a></td>


							</tr>
						";
					}
				?>
			</table>

<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>