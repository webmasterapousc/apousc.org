<?php
include("../include/database.php");

global $database; // The database object

$_POST = json_decode(file_get_contents('php://input'), true);

$subuser = $_POST["username"];
$subeventid = $_POST["eventid"];

/* Set signup timestamp */
$subtime = time();

/* No errors, add the signup to the database */
if($database->signedUp($subeventid, $subuser))	{
	if ($database->removeSignup($subeventid, $subuser)) {
		echo "0"; //Event signup added succesfully
	} else {
		echo "1"; //Event signup attempt failed
	}
} else {
	echo "2";
}


?>