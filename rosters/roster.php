<?php
// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Alpha Kappa Roster";
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
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<h2>Restricted Area</h2>\n";
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view this page.\n";
	} else {
?>
			<h2>Current Roster</h2>
			<div id= "rosterTableContainer" style= "overflow: scroll; height: 90%">
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="roster.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="roster.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<th scope="col"><a href="roster.php?order=status&amp;sort=<?php echo $ascdesc; ?>">Status</a></th>
						<!--<th scope="col"><a href="roster.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th> -->
						<th scope="col"><a href="roster.php?order=pledge&amp;sort=<?php echo $ascdesc; ?>">Pledge Semester</a></th> 
						<?php if ($session->logged_in) {echo "<th scope='col' width='100'>Phone Number</th>";}; ?>

					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						"status" => "status",
						"family" => "family",
						"pledge" => "year"
					);
					$sortorder_default = "lname";
					if (isset($sortorders[$_GET["order"]])) {
						$sortorder = $sortorders[$_GET["order"]];
					} else {
						$sortorder = $sortorder_default;
					}
					$directions = array(
						"up"   => "ASC",
						"down" => "DESC"
					);
					$direction_default = "ASC";
					if (isset($directions[$_GET["sort"]])) {
						$direction = $directions[$ascdesc];
					} else {
						$direction = $direction_default;
					}
					$sortorder2_default = "lname ASC";
					if ($sortorders[$_GET["order"]] == "lname" || !isset($_GET["sort"])) {
						$sortorder2 = "fname ASC";
					} else if ($sortorders[$_GET["order"]] == "year" && $directions[$_GET["sort"]] == "DESC") {
						$sortorder2 = "semester DESC, lname ASC";
					} else if ($sortorders[$_GET["order"]] == "year" && $directions[$_GET["sort"]] == "ASC") {
						$sortorder2 = "semester ASC, lname ASC";
					} else {
						$sortorder2 = $sortorder2_default;
					}
					$q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						if ($row['status'] == 0 || $row['status'] == 1 || $row['status'] == 2 || $row['status'] == 7) {	
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							echo "<tr" . $zebra . ">\n";
							echo "\t<td><a href=\"../members/userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
							echo "\t<td><a href=\"../members/userinfo.php?user=" . $row['username'] . "\">" .  $row['lname'] . "</a></td>\n";
							echo "\t<td>" . $memberStatus[$row['status']] . "</td>\n";
							//echo "\t<td>" . $families[$row['family']] . "</td>\n";
							echo "\t<td>" . $pledgeClasses[$row['year'].$row['semester']] . "</td>\n";
								if ($session->logged_in) {
									echo "\t\t\t\t\t\t<td>";
										echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $row['phone']);
									echo "</td>\n";}
							echo "</tr>\n";
							$i++;
						}
					}
					?>
				</tbody>
			</table>
			</div>
<?php
	}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>