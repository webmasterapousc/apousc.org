<?php

/* Nikita Zolotykh (07/11/2015)
	nzolotykh@gmail.com
	Experiment to make an APO family tree
*/

require_once "tree.php";

/* AJAX REQUESTS */

$user = trim($_REQUEST['user']);

header("content-type:application/json"); // declare the header

switch($user) {
	case 'all':
		fetchFamilies($user);
	// $resultArr = "HELLO TESTTT";
	// header("content-type:application/json");
	// echo json_encode($resultArr);
		break;
	case 'alpha':
	case 'phi':
	case 'omega':
		fetchFamilies($user);
		break;
	default:
		fetchUserTree($user);
}

function fetchUserTree($user) {
	global $database;

	if (@get_magic_quotes_gpc()) {
		$user = stripslashes($user); // Removes magic_quotes_gpc slashes
	} //@get_magic_quotes_gpc()
	$user = mysql_real_escape_string($user); // Prepends backslashes to special MySQL characters
	$user = (string) $user; // Force $req_user to be a string

	$errors = '';

	if (!$user || strlen($user) === 0 || !eregi("^([0-9a-z])+$", $user) || !$database->usernameTaken($user)) {
		// die("Username not registered");
		$errors = 'Username not registered';
		$send = array('errors' => $errors);
		echo json_encode($send);
		die();
	}
	$resultArr;

	$treeRoot = getTreeRoot($user);
	getDescendants($treeRoot);
	traverseNodes($treeRoot, $resultArr);

	echo json_encode($resultArr);
}


function fetchFamilies($family) {
	global $database;
	global $pledgeClasses;

	$q = "SELECT username, family, fname, lname, year, semester FROM users WHERE big = ''";
	if ($family == 'alpha') {
		$q .= " AND family = 0";
	} else if ($family == 'phi') {
		$q .= " AND family = 1";
	} else if ($family == 'omega') {
		$q .= " AND family = 2";
	}
	$r = $database->query($q);
	$familyMasters;

	while ($result = mysql_fetch_assoc($r)) {
		// going through all the family "heads"
		$username = $result['username'];
		$family = $result['family'];
		$fname = $result['fname'];
		$lname = $result['lname'];
		$pledgeClass = $pledgeClasses[$result['year'].$result['semester']];
		$rootNode = new Node($username, $fname, $lname, $family, $pledgeClass);
		$familyMasters[] = $rootNode;
		getDescendants($rootNode);
	}

	$resultArr;
	foreach ($familyMasters as $master) {
		traverseNodes($master, $resultArr);
	}
	echo json_encode($resultArr);
}

?>