<?php
// Google Analytics
include_once("include/analytics.php")

// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "About Alpha Kappa Chapter";
$current_page = "about";

// Load header

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>

	<link rel="stylesheet" href="css/styles.css" />


<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>




<h2>Alpha Kappa Chapter Pledge History</h2>
<p>Each pledge class brings something new to the table. Learn more about past pledge classes and what made each unique.</p>
<p><strong>This page is incomplete. You can help by sending additional information to the <a href="mailto:webmaster.apousc@gmail.com">webmaster.</a></strong></p>

<p><a href="#1"><strong>Original Chapter (1934 &mdash; 1989)</strong></a>:
        <a href="#alpha">Alpha</a> | <a href="#beta">Beta</a> | <a href="#gamma">Gamma</a> | <a href="#delta">Delta</a> | <a href="#epsilon">Epsilon</a> |
        <a href="#zeta">Zeta</a> | <a href="#eta">Eta</a>
</p>

<p><a href="#2"><strong>Since Rechartering (1989 &mdash; )</strong></a>:
        <a href="#2alpha">Alpha</a> | <a href="#2beta">Beta</a> | <a href="#2gamma">Gamma</a> | <a href="#2delta">Delta</a> | <a href="#2epsilon">Epsilon</a> |
        <a href="#2zeta">Zeta</a> | <a href="#2eta">Eta</a> | <a href="#2theta">Theta</a> | <a href="#2iota">Iota</a> | <a href="#2kappa">Kappa</a> | <a href="#2lambda">Lambda</a> |
        <a href="#2mu">Mu</a> | <a href="#2nu">Nu</a> | <a href="#2xi">Xi</a> | <a href="#2omicron">Omicron</a> | <a href="#2pi">Pi</a> | <a href="#2rho">Rho</a> |
        <a href="#2sigma">Sigma</a> | <a href="#2tau">Tau</a> | <a href="#2upsilon">Upsilon</a> | <a href="#2phi">Phi</a> | <a href="#2chi">Chi</a> | <a href="#2psi">Psi</a> |
        <a href="#2omega">Omega</a> | <a href="#2alphaalpha">Alpha Alpha</a> | <a href="#2alphabeta">Alpha Beta</a> | <a href="#2alphagamma">Alpha Gamma</a> | <a href="#2alphadelta">Alpha Delta</a> |
        <a href="#2alphaepsilon">Alpha Epsilon</a> | <a href="#2alphazeta">Alpha Zeta</a> | <a href="#2alphaeta">Alpha Eta</a> | <a href="#2alphatheta">Alpha Theta</a> | <a href="#2alphaiota">Alpha Iota</a> | <a href="#2alphakappa">Alpha Kappa</a> | <a href="#2alphalambda">Alpha Lambda</a> | <a href="#2alphamu">Alpha Mu</a> | <a href="#2alphanu">Alpha Nu</a> | <a href="#2alphaxi">Alpha Xi</a> | <a href="#2alphaomicron">Alpha Omicron</a>
</p>

<a name="1"></a>
<h2>Original Chapter (1934 &mdash; 1989)</h2>

<a name="alpha"></a>
<h3>Alpha (A) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: 1934
    </li>
</ul>

<a name="beta"></a>
<h3>Beta (B) Class</h3>
<ul>
</ul>

<a name="gamma"></a>
<h3>Gamma (&#915) Class</h3>
<ul>
</ul>

<a name="delta"></a>
<h3>Delta (&#916) Class</h3>
<ul>
</ul>

<a name="epsilon"></a>
<h3>Epsilon (E) Class</h3>
<ul>
</ul>

<a name="zeta"></a>
<h3>Zeta (Z) Class</h3>
<ul>
</ul>

<a name="eta"></a>
<h3>Eta (H) Class</h3>
<ul>
</ul>

<a name="2"></a>
<h2>Since Rechartering (1989 &mdash; )</h2>

<a name="2alpha"></a>
<h3>Alpha (A) Class</h3>

<a name="2beta"></a>
<h3>Beta (B) Class</h3>

<a name="2gamma"></a>
<h3>Gamma (&#915) Class</h3>

<a name="2delta"></a>
<h3>Delta (&#916) Class</h3>

<a name="2epsilon"></a>
<h3>Epsilon (E) Class</h3>

<a name="2zeta"></a>
<h3>Zeta (Z) Class</h3>

<a name="2eta"></a>
<h3>Eta (H) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: Fall 2003
    </li>
    <li>
        <strong>Initiated Pledges</strong>
        <ul>
            <li>
                Ryan	Dumouchelle
            </li>
        </ul>
    </li>
</ul>

<a name="2theta"></a><h3>Theta (&#920) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: Spring 2004
    </li>
</ul>

<a name="2iota"></a>
<h3>Iota (I) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: Fall 2004
    </li>
    <li>
        <strong>Initiated Pledges</strong>
        <ul>
            <li>
                Alex	Vejnoska
            </li>
        </ul>
    </li>
</ul>

<a name="2kappa"></a>
<h3>Kappa (K) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: Spring 2005
    </li>
</ul>


<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2005 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>


<a name="2lambda"></a>
<h3>Lambda (&#923) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: Fall 2005
    </li>
</ul>


<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2005 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>


<a name="2mu"></a>
<h3>Mu (M) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: Spring 2006
    </li>
</ul>


<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2006 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n;
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>


<a name="2nu"></a>
<h3>Nu (N) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: Fall 2006
    </li>
</ul>


<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q 		= "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2006 ORDER BY {$sortorder} {$direction}, {$sortorder2}";	
					
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>


<a name="2xi"></a>
<h3>Xi (&#926) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: Spring 2007
    </li>
</ul>


<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q     = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2007 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>


<a name="2omicron"></a>
<h3>Omicron (O) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: Fall 2007
    </li>
</ul>


<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2007 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>


<a name="2pi"></a>
<h3>Pi (&#928) Class</h3>
<ul>
    <li>
        <strong>Semester</strong>: Spring 2008
    </li>
</ul>


<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2008 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>


<a name="2rho"></a>
<h3>Rho (P) Class</h3>
<!-- <img src="/pledge/17_rho/08_pinning.jpg" width=550px>
<p>Fall 2008</p>
<img src="/pledge/17_rho/110918_pinning.JPG" width=550px>
<p>Fall 2011</p> -->
<ul>
    <li>
        <strong>Semester</strong>: Fall 2008
    </li>
    <li>
        <strong>Pinning Ceremony</strong>: Sunday, September 7, 2008 outside Mudd Hall of Philosophy <!--(img 321.jpg)-->
    </li>
    <li>
        <strong>Pledge Class E-Board</strong>
        <ul>
            <li>
                <em>Pledge Master</em>: Richard Dang
            </li>
            <li>
                <em>Pledge Uncles</em>: Henry Ho and John Kim
            </li>
            <li>
                <em>Pledge President</em>: Gaby Roffe
            </li>
            <li>
                <em>Pledge VP of Service</em>: Felecia Hunter
            </li>
            <li>
                <em>Pledge VP of Fellowship</em>: Talia Friedman
            </li>
            <li>
                <em>Pledge VP of Fundraising</em>: Michael Esposito
            </li>
            <li>
                <em>Pledge Historian</em>: Conrad Culling
            </li>
            <li>
                <em>Pledge Sergeant-at-Arms</em>: Kasey Ryan
            </li>
            <li>
                <em>Pledge Secretary</em>: Geena Haney
            </li>
        </ul>
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul> 

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2008 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2sigma"></a>
<h3>Sigma (&#931) Class</h3>
<!--<img src="/pledge/18_sigma/09_pinning.jpg" width=550px>
<p>Spring 2009</p>
<img src="/pledge/18_sigma/110918_pinning.JPG" width=550px>
<p>Fall 2011</p> -->
<ul>
    <li>
        <strong>Semester</strong>: Spring 2009
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2009 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2tau"></a>
<h3>Tau (T) Class</h3>
<!-- <img src="/pledge/19_tau/110918_pinning.JPG" width=550px> -->

<ul>
    <li>
        <strong>Semester</strong>: Fall 2009
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2009 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2upsilon"></a>
<h3>Upsilon (Y) Class</h3>
<!-- <img src="/pledge/20_upsilon/10_pinning.jpg" width=550px> -->
<!-- <p>Spring 2010</p> -->
<!-- <img src="/pledge/20_upsilon/110918_pinning.JPG" width=550px> -->
<!-- <p>Fall 2011</p> -->
<ul>
    <li>
        <strong>Semester</strong>: Spring 2010
    </li>
    <li>
        <strong>Pinning Ceremony</strong>: Sunday, January 31, 2010 at 5:00pm outside Mudd Hall of Philosophy
    </li>
    <li>
        <strong>Initiation Ceremony</strong>: Saturday, May 1, 2010
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2010 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2phi"></a><h3>Phi (&#934) Class</h3>
<!-- <img src="/pledge/21_phi/110918_pinning.JPG" width=550px> -->
<ul>
    <li>
        <strong>Semester</strong>: Fall 2010
    </li>
    <li>
        <strong>Pinning Ceremony</strong>: Sunday, September 12, 2010 at 5:00pm
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2010 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2chi"></a>
<h3>Chi (X) Class</h3>
<!-- <img src="/pledge/22_chi/110918_pinning.JPG" width=550px> -->
<ul>
    <li>
        <strong>Semester</strong>: Spring 2011
    </li>
    <li>
        <strong>Pledge Class E-Board</strong>
        <ul>
            <li><em>President</em>: Steven Keem</li>
            <li><em>VP of Service</em>: Vincent Tsao</li>
            <li><em>VP of Fellowship</em>: Allison Lee</li>
            <li><em>Fundraising Chair</em>: Christy Yun</li>
            <li><em>Interchapter Chair</em>: Jackie Chou</li>
            <li><em>Mini Myrtle</em>: Jeffrey Kuan</li>
            <li><em>Secretary</em>: Vanessa Woghiren</li>
            <li><em>Historian</em>: Angela Oh</li>
            <li><em>Sergeant-at-Arms</em>: Sandy Lee</li>
        </ul>
    </li>
    <li>
        <strong>Pinning Ceremony</strong>: Sunday, February 6, 2011 at 4:00pm
    </li>
    <!--<li>
        <strong>Big / Little Appreciation</strong>: Tandem Biking at Santa Monica (Saturday, April 23, 2011)
    </li>-->
    <li>
        <strong>Initiation Ceremony</strong>: April 2011
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2011 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2psi"></a>
<h3>Psi (&#936) Class</h3>
<!-- <img src="/pledge/23_psi/110918_pinning_serious.JPG" width=100%> -->
<ul>
    <li>
        <strong>Semester</strong>: Fall 2011
    </li>
    <li>
        <strong>Number of Initiated Pledges</strong>: 37
    </li>
    <li>
        <strong>Pledge Class E-Board</strong>
            <ul>
                <li>
                    <em>Pledge Master</em>: Eduardo "Papa Psi" Gonzalez (Upsilon Class)
                </li>
                <li>
                    <em>Pledge Aunt</em>: Brooke "Lady Luck" Briody (Phi Class)
                </li>
                <li>
                    <em>Pledge Uncle</em>: Steven "Skeem" Keem (Chi Class)
                </li>
                <li>
                    <em>Pledge Class President</em>: Eric "Boba Destroyer" Chao
                </li>
                <li>
                    <em>Pledge Class VP of Service</em>: Evelyn "Owl" Kolim
                </li>
                <li>
                    <em>Pledge Class VP of Fellowship</em>: William "Toast" Tzeng
                </li>
                <li>
                    <em>Pledge Class Secretary</em>: Casey "Highlighter" Penk
                </li>
                <li>
                    <em>Pledge Class Fundraising Chair</em>: Arkar "Waffles" Kyaw
                </li>
                <li>
                    <em>Pledge Class Interchapter Chair</em>: Michael "Nerts" Tran
                </li>
                <li>
                    <em>Pledge Class Historian</em>: Shabnam "Shooter" Ferdowsi
                </li>
            </ul>
    </li>
    <li>
        <strong>Events</strong>
        <ul>
            <li>
                <em>Pinning Ceremony</em>: Sunday, September 18, 2011 at 4:00pm outside Mudd Hall of Philosophy
            </li>
            <li>
                <em>DTA</em>: Friday, September 30, 2011 at 5:00pm
            </li>
            <li>
                <em>Pledge Service Projects</em>: Prostate Cancer 5K (Sunday, November 6, 2011 at 6:30am on the USC campus) and TreePeople Tree Planting (Saturday, November 19, 2011 at 8:15am in Lake Balboa Park)
            </li>
            <li>
                <em>Pledge Interchapter Event</em>: Park Day with Chi Chapter Pledges (Sunday, November 20, 2011 at 1:15pm at Almansor Park in Alhambra)
            </li>
            <!--<li>
                <em>Big / Little Appreciation</em>: Dinner and Bowling (Friday, November 11, 2011 in Arcadia)
            </li>-->
            <li>
                <em>Initiation Ceremony</em>: Sunday, December 4, 2011 at 5:00pm at Anoush Restaurant in Glendale
            </li>
        </ul>
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>
<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2011 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2omega"></a>
<h3>Omega (&#937) Class</h3>
<ul>
	<li>
	<strong>Semester:</strong> Spring 2012
	</li>
    <li>
        <strong>Pledge Master</strong>: Christina Lee
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>
<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2012 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2alphaalpha"></a>
<h3>Alpha Alpha (AA) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Fall 2012
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2012 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2alphabeta"></a>
<h3>Alpha Beta (AB) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Spring 2013
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					$q      = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2013 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2alphagamma"></a>
<h3>Alpha Gamma (A&#915) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Fall 2013
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					// $q = SELECT *  FROM `users` WHERE `semester` = 0 AND `year` = 2013;
					// = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2013 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					// $q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . 4 . " AND `semester` <> " . 0 . " AND `year` <> " . 2013 . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<a name="2alphadelta"></a>
<h3>Alpha Delta (A&#916) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Spring 2014
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					// $q = SELECT *  FROM `users` WHERE `semester` = 0 AND `year` = 2013;
					// = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2014 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					// $q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . 4 . " AND `semester` <> " . 0 . " AND `year` <> " . 2013 . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>


<a name="2alphaepsilon"></a>
<h3>Alpha Epsilon (AE) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Fall 2014
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					// $q = SELECT *  FROM `users` WHERE `semester` = 0 AND `year` = 2013;
					// = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2014 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					// $q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . 4 . " AND `semester` <> " . 0 . " AND `year` <> " . 2013 . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>


<!-- Start copy and paste  -->
<a name="2alphazeta"></a>
<h3>Alpha Zeta (AZ) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Spring 2015
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					// $q = SELECT *  FROM `users` WHERE `semester` = 0 AND `year` = 2013;
					// = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2015 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					// $q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . 4 . " AND `semester` <> " . 0 . " AND `year` <> " . 2013 . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>
<!-- End copy and paste -->
<!-- Start copy and paste  -->
<a name="2alphaeta"></a>
<h3>Alpha Eta (AE) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Fall 2015
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					// $q = SELECT *  FROM `users` WHERE `semester` = 0 AND `year` = 2013;
					// = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2015 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					// $q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . 4 . " AND `semester` <> " . 0 . " AND `year` <> " . 2013 . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>
<!-- End copy and paste -->
<!-- Start copy and paste  -->
<a name="2alphatheta"></a>
<h3>Alpha Theta (AT) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Spring 2016
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					// $q = SELECT *  FROM `users` WHERE `semester` = 0 AND `year` = 2013;
					// = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2016 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					// $q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . 4 . " AND `semester` <> " . 0 . " AND `year` <> " . 2013 . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>
<!-- End copy and paste -->
<!-- Start copy and paste  -->
<a name="2alphaiota"></a>
<h3>Alpha Iota (AI) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Fall 2016
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					// $q = SELECT *  FROM `users` WHERE `semester` = 0 AND `year` = 2013;
					// = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2016 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					// $q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . 4 . " AND `semester` <> " . 0 . " AND `year` <> " . 2013 . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>

<!-- Start copy and paste  -->
<a name="2alphakappa"></a>
<h3>Alpha Kappa (AK) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Spring 2017
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					// $q = SELECT *  FROM `users` WHERE `semester` = 0 AND `year` = 2013;
					// = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2017 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					// $q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . 4 . " AND `semester` <> " . 0 . " AND `year` <> " . 2013 . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 0) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>
<!-- End copy and paste -->
<!-- Start copy and paste  -->
<a name="2alphalambda"></a>
<h3>Alpha Lambda (A&#923) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Fall 2017
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					// $q = SELECT *  FROM `users` WHERE `semester` = 1 AND `year` = 2017;
					// = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2017 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					// $q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . 4 . " AND `semester` <> " . 0 . " AND `year` <> " . 2013 . " AND `userlevel` <> " . ADMIN_LEVEL . " ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 0) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>
<!-- End copy and paste -->
<!-- Start copy and paste  -->
<a name="2alphamu"></a>
<h3>Alpha Mu (AM) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Spring 2018
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2018 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 0) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>
<!-- End copy and paste -->
<!-- Start copy and paste  -->
<a name="2alphanu"></a>
<h3>Alpha Nu (AN) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Fall 2018
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 1 . " AND `year` = 2018 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 0) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>
<!-- End copy and paste -->
<!-- Start copy and paste  -->
<a name="2alphaxi"></a>
<h3>Alpha Xi (A&#926) Class</h3>
<ul>
    <li>
        <strong>Semester:</strong> Spring 2019
    </li>
    <li>
        <strong>Initiated Pledges</strong>
    </li>
</ul>

<?php
	// If user is logged in, show roster
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to view the member list.\n";
	} else {
?>
			<table id="rosterTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; ?>
						<th scope="col"><a href="history_pledge.php?order=first&amp;sort=<?php echo $ascdesc; ?>">First Name</a></th>
						<th scope="col"><a href="history_pledge.php?order=last&amp;sort=<?php echo $ascdesc; ?>">Last Name</a></th>
						<!--<th scope="col"><a href="history_pledge.php?order=family&amp;sort=<?php echo $ascdesc; ?>">Family</a></th>-->
					</tr>
				</thead>
				<tbody>
					<?php
					$sortorders = array(
						"first"  => "fname",
						"last"   => "lname",
						//"family" => "family",
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
					
					$q  = "SELECT * FROM ". TBL_USERS ." WHERE `semester` <> "  . 0 . " AND `year` = 2019 ORDER BY {$sortorder} {$direction}, {$sortorder2}";
					
					$result = $database->query($q);
					$i = 0; // Counter used for alternating table row colors
					while ($row = mysql_fetch_array($result)) {
						$zebra = ($i % 2 == 0) ? " class=\"zebra\"" : "";
						echo "<tr" . $zebra . ">\n";
						echo "\t<td><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "</a></td>\n";
						echo "\t<td>" . $row['lname'] . "</td>\n";
						//echo "\t<td>" . $families[$row['family']] . "</td>\n";
						echo "</tr>\n";
						$i++;
					}
					?>
				</tbody>
			</table>
<?php
	}
?>
<!-- End copy and paste -->
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>

