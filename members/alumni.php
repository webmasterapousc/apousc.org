<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Alumni Roster";
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
// Only if user is logged in, show roster
if (!$session->logged_in) {
	echo ("\t\t\t<h2>Restricted Area</h2>\n");
	echo ("\t\t\t<p>Sorry, but you must be logged in in order to view this page.</p>\n");
} else {
?>
			<h2>Alumni Roster</h2>
			<h4><a href = "https://airtable.com/shrl0bWZ6eINW28Ec" target = "_blank">Alumni Networking Database</a></h4>
			    
			<table cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "DESC") ? "ASC" : "DESC"; ?>
						<th scope="col"><a href="alumni.php?order=fname&sort=<?php echo $ascdesc; ?>">First</a></th>
						<th scope="col"><a href="alumni.php?order=lname&sort=<?php echo $ascdesc; ?>">Last</a></th>
						<th scope="col"><a href="alumni.php?order=year&sort=<?php echo $ascdesc; ?>">Class</a></th>
						<th scope="col"><a href="alumni.php?order=email&sort=<?php echo $ascdesc; ?>">E-mail</a></th>
						<!--<th scope="col"><a href="alumni.php?order=family&sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
			<?php
				$orderby = "lname";
				if ($_GET["order"] !== NULL) {
					$orderby = $_GET["order"];
				}
				$q      = "SELECT * FROM `".TBL_USERS."` WHERE `status` = ".ALUMNI_MEMBER." ORDER BY year DESC, semester ASC, $orderby $ascdesc";
				$result = $database->query($q);
				$i      = 0; // Counter used for alternating table row colors
				while ($row = mysql_fetch_array($result)) {
					$username = $row[0];
					$last     = $row[9];
					$first    = $row[8];
					$email    = $row[5];
					$family   = $row[9];
					$zebra    = ($i % 2 == 1) ? " class=\"zebra\"" : "";
					echo "<tr$zebra>\n";
					echo "\t<td><a href=\"userinfo.php?user=$username\">$first</a></td>\n";
					echo "\t<td><a href=\"userinfo.php?user=$username\">$last</a></td>\n";
					echo "\t<td>".$pledgeClasses[$row['year'].$row['semester']]."</td>\n";
					echo "\t<td><a href=\"mailto:$email\">$email</a></td>\n";

					# echo "\t<td>$families[$family]</td>\n";
					echo "</tr>\n";
					$i++;
				}
			?>
				</tbody>
			</table>
<?php
}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>