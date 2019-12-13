<?php
// Initiate connection to database and user login session
include("include/session.php");
$user = $_GET['user'];

// escape special chars, etc.
if (@get_magic_quotes_gpc()) {
	$user = stripslashes($user); // Removes magic_quotes_gpc slashes
} //@get_magic_quotes_gpc()
$user = mysql_real_escape_string($user); // Prepends backslashes to special MySQL characters
$user = (string) $user; // Force $req_user to be a string

$families = array('alpha', 'phi', 'omega', 'all');

$USER_STYLE = 'style="display:none"';
$ALPHA_STYLE = 'style="display:none"';
$PHI_STYLE = 'style="display:none"';
$OMEGA_STYLE = 'style="display:none"';
$HR_STYLE = 'style="display:none"';
$ERROR_STYLE = 'style="display:none"';

if ($user == 'alpha') {
	$ALPHA_STYLE = '';
} else if ($user == 'phi') {
	$PHI_STYLE = '';
} else if ($user == 'omega') {
	$OMEGA_STYLE = '';
} else if ($user == 'all') {
	$ALPHA_STYLE = '';
	$PHI_STYLE = '';
	$OMEGA_STYLE = '';
	$HR_STYLE = '';
} else {
	if (!$user || strlen($user) === 0 || !eregi("^([0-9a-z])+$", $user) || !$database->usernameTaken($user)) {
		// user doesn't exist, so on
		$ERROR_STYLE = '';
		$ERROR_MESSAGE = "Username does not exist.";
	} else {
		$USER_STYLE = '';
		$userinfo = $database->getUserInfo($user);
		$USER_NAME = $userinfo['fname'];
	}
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en-us" />
	<title>Family Tree</title>
	<meta name="language" content="English" />
	<meta name="description" content="Official website of the Alpha Kappa Chapter of Alpha Phi Omega national service fraternity at the University of Southern California." />
	<meta name="author" content="Nikita Zolotykh" />
	<meta name = "viewport" content = "width = device-width">
	<link rel="home" title="Alpha Phi Omega - Alpha Kappa" href="http://www.apousc.com/" />
	<link rel="shortcut icon" href="img/favicon.gif" type="image/gif" />
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="family_tree/family_tree.js"></script>
	<link rel="stylesheet" type="text/css" href="family_tree/family_tree.css">
</head>
<body>
<div class="logo"><a href="home.php"><img src="img/torchbanner.jpg"></a></div>

<div class="mainContent shadow">
	<div <?= $ERROR_STYLE ?>><?= $ERROR_MESSAGE?></div>
	<div class="family-name" <?= $USER_STYLE ?>><?= $USER_NAME ?>'s Family Tree</div>
	<div id="user_chart_div" class="treeContent" <?= $USER_STYLE ?>></div>
	<div class="family-name" <?= $ALPHA_STYLE ?>>Alpha Family Tree</div>
	<div id="alpha_chart_div" class="treeContent" <?= $ALPHA_STYLE ?>></div>
	<hr <?= $HR_STYLE ?>>
	<div class="family-name" <?= $PHI_STYLE ?>>Phi Family Tree</div>
	<div id="phi_chart_div" class="treeContent" <?= $PHI_STYLE ?>></div>
	<hr <?= $HR_STYLE ?>>
	<div class="family-name" <?= $OMEGA_STYLE ?>>Omega Family Tree</div>
	<div id="omega_chart_div" class="treeContent" <?= $OMEGA_STYLE ?>></div>
</div>
<div id="bottomCap">
	<p class="small"><strong>National Disclaimer:</strong> This electronic document is intended for public viewing and is solely for personal reference. It should not be considered an authoritative source nor an official publication of <a class="red-link" href="http://www.apo.org/" rel="external">Alpha Phi Omega</a>. Inquiries regarding Alpha Phi Omega and its official publications may be directed to: Alpha Phi Omega, 14901 E. 42nd Street, Independence, <abbr title="Missouri">MO</abbr>, 64055 &ndash; USA. &quot;Alpha Phi Omega&quot; is a copyrighted, registered trademark in the USA. All rights reserved.</p>
</div>

<div id="footer">
	<p>&copy; 2015, Alpha Phi Omega&mdash;Alpha Kappa</p>
	<p>Design adapted from "Time Manager" template by <a href="http://www.templateworld.com/" rel="external">Template World</a>.</p>
</div>
</body>
</html>