<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Requirements :: Actives";
$current_page = "requirements";

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
	<style type="text/css" media="screen">
	<!--
		#mainContent .contentBox ul.eventDetails {list-style-type:none;margin-left:0;}
	-->
	</style>
<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
<?php
if(!$session->logged_in) {
	echo ("<h2>Restricted Area</h2>\n<p>Sorry, but you must signed-in to view this page.</p>\n");
} else {
?>
		<h2>Requirements :: Actives</h2>
		<table cellpadding="0" cellspacing="0" border="0" class="pretty">
			<thead>
				<tr>
					<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
					<th scope="col"><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>?order=first&amp;sort=<?php echo $ascdesc; ?>">First</a> <a href="<?php echo $_SERVER["REQUEST_URI"]; ?>?order=last&amp;sort=<?php echo $ascdesc; ?>">Last</a></th>
					<th scope="col"><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>?order=service&amp;sort=<?php echo $ascdesc; ?>">Service</a></th>
					<th scope="col"><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>?order=fellowship&amp;sort=<?php echo $ascdesc; ?>">Fellowship</a></th>
					<th scope="col"><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>?order=fundraising&amp;sort=<?php echo $ascdesc; ?>">Fundraising</a></th>
					<th scope="col"><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>?order=interchapter&amp;sort=<?php echo $ascdesc; ?>">Interchapter</a></th>
					<th scope="col"><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>?order=membership&amp;sort=<?php echo $ascdesc; ?>">Membership</a></th>

				</tr>
			</thead>
			<tbody>
<tr><td><em>Required</em></td><td><em>25</em></td><td><em>5</em></td><td><em>3</em></td><td><em>2</em></td><td><em>2</em></td></tr>
<?php
	$sortorders = array(
		"first"  => "fname",
		"last"   => "lname",
		"family" => "family",
		"service"  => "totalSer",
		"fellowship"  => "totalFel",
		"fundraising"  => "totalFund",
		"interchapter"  => "totalInt",
		"membership"  => "totalMem"
	);
	$direction = $directions[$ascdesc];
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
	$sortorder2_default = "totalSer DESC";
	if ($sortorders[$_GET["order"]] == "totalSer") {
		$sortorder2 = "lname ASC";
	} else {
		$sortorder2 = $sortorder2_default;
	}
	$q = "SELECT S.username, U.fname, U.lname, U.family, SUM(CASE WHEN (E.type = 0 || E.type = 13) THEN weight*hours ELSE 0 END) AS totalSer, SUM(CASE WHEN E.type = 1 THEN weight ELSE 0 END) AS totalFel, SUM(CASE WHEN E.type = 2 THEN weight ELSE 0 END) AS totalFund, SUM(CASE WHEN (E.type = 3 || E.type = 13) THEN weight ELSE 0 END) AS totalInt, SUM(CASE WHEN (E.type = 4 || E.type = 6 || E.type = 10 || E.type = 11 || E.type = 12) THEN weight ELSE 0 END) AS totalMem FROM `" . TBL_SIGNUPS . "` AS S, `" . TBL_USERS . "` AS U, `" . TBL_EVENTS . "` AS E WHERE U.status = 0 AND E.end < NOW() AND S.eventid = E.ID AND S.username = U.username AND `start` >= '2014-01-12 00:00:00' GROUP BY S.username ORDER BY {$sortorder} {$direction}, {$sortorder2}";
	$result = $database->query($q);
	$i = 0; // Counter used for alternating table row colors
	while ($row = mysql_fetch_array($result)) {
		echo "\t\t\t\t<tr class='border'>\n";
		echo "\t\t\t\t\t<td><a href=\"userinfo.php?user=$row[username]\">$row[fname] $row[lname]</a></td>\n";
		if ($row[totalSer] >= 25) {echo "<td class='comp'>";} else {echo "<td class='incomp'>";};
			echo round($row[totalSer],2)."</td>\n";
		if ($row[totalFel] >= 5) {echo "<td class='comp'>";} else {echo "<td class='incomp'>";};
			echo round($row[totalFel],2)."</td>\n";
		if ($row[totalFund] >= 3) {echo "<td class='comp'>";} else {echo "<td class='incomp'>";};
			echo round($row[totalFund],2)."</td>\n";
		if ($row[totalInt] >= 2) {echo "<td class='comp'>";} else {echo "<td class='incomp'>";};
			echo round($row[totalInt],2)."</td>\n";
		if ($row[totalMem] >= 2) {echo "<td class='comp'>";} else {echo "<td class='incomp'>";};
			echo round($row[totalMem],2)."</td>\n";
		echo "\t\t\t\t</tr>\n";
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